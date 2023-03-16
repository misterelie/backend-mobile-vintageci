<?php

namespace App\Http\Controllers\User;

use App\Helpers\Notification;
use App\Helpers\Site;
use App\Models\User;
use App\Models\Commune;
use App\Models\Category;
use App\Models\OffreCredit;
use Illuminate\Http\Request;
use App\Helpers\User as UserHelper;
use App\Http\Controllers\Controller;
use App\Mail\PurchaseCreditAlertToUser;
use App\Mail\UserVipAnnoncNotification;
use App\Models\Annonce;
use App\Models\AnnonceVip;
use App\Models\OffreVip;
use App\Models\PurchaseCredit;
use App\Models\SousCategory;
use App\Models\VipPurchaseList;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckOutController extends Controller
{
    public function __construct()
    {
        parent::boot();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseCredit(Request $request)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Achéter du crédit";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();

        //* Sélection du crédit en URL:
        $credit = OffreCredit::where(['deleted' => 0, "slug" => $request->buy_credit])->latest("title")->first();

        //* Sélection des Crédits:
        $credits = OffreCredit::where(['deleted' => 0])->latest("title")->get();

        //dd($request->all());
        return view("seller.credit.purchase", compact(["page_title", "categories", "communes", "credit", "credits"]));
    }





    public function storeCreditPurchase(Request $request)
    {
        $User = UserHelper::user();
        
        $exp = explode("-",trim($request->provider));
        (string )$provider = $exp[0];
        (array) $providerKey = Site::providers()[$exp[1]];

        if(!isset($exp[0]) && !isset($exp[1])){
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }

        //* Vérifions si l'utilisateur n'a pas d'achat non-terminé:
        $userInvalidPurchases = PurchaseCredit::where(['user_id' => $User->id, 'statut' => 0])->count();

        if($userInvalidPurchases > 0)
        {
            return redirect()->back()->with('error', "Désolé ! Vous avez un achat en attente de confirmation.? Veuillez d'abord terminé le premier achat, pour demander un autre.");
        }

        if(is_null($request->credit_id) || is_null($request->provider))
        {
            return redirect()->back()->with('error', "Désolé ! Veuillez sélectionner une offre et un moyen de paiement valide. Puis ressayez");
        }

       

        //* On crè un nouvel achat de l'utilisateur:
        $purchase = PurchaseCredit::create([
            'credit_id' => $request->credit_id,
            'provider' => $provider,
        ]);

        if($purchase)
        {
            //* 1 - Création de l'activité d'Achat de Crédits
            $userLog = Notification::makeLog("Achat de crédit", "Vous avez achété du crédit ce ".date('d/m/Y')." à ". date('H:i'));

            //* Notification par Email au client
            Notification::make($userLog, UserHelper::userId());

            //* Notification par Email aux Admin
            Mail::to($User->user_email)->send(new PurchaseCreditAlertToUser($User, $purchase->credit, $providerKey));

            return redirect()->to(url('/purchase/credit'))->with('success', "Félicitation ! Votre achat a été pris en compte. Veuillez finaliser le rechargement de votre solde en effectuant le paiement via <b>".Str::upper($providerKey['nom'])." Money </b> au: <b> ".$providerKey['numero']." </b>
            ");
        }else{
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOut($pk = null)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        if(is_null($pk) || empty($pk)){
            return redirect()->to('/account/mes-annonces')->with('error', "Une erreur inconnue est survenue");
        }
        $annonce = Annonce::where("pk", $pk)->first();

        if(is_null($annonce)){
            return redirect()->to('/account/mes-annonces')->with('error', "Nous ne pouvons donner suite à votre requête.");
        }
        //* Datas
        $page_title = "Booster mon annonce | ". config('app.name');
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        
        $vips = OffreVip::where(['deleted' => 0])->latest()->get();
        return view("seller.purchase.vip", compact(["page_title", "categories", "sous_categories", "communes", "annonce", 'vips']));
    }


    public function payementVip(Request $request)
    {
        $annonce = Annonce::where('id', $request->annonce_id)->first();
        $offre = OffreVip::where(["id"=> $request->offre_id])->first();
        $debitQuery = null;

        // if(is_null($request->credit_id)){
        //     return redirect()->back()->with('error', "Veuillez sélectionner une offre pour valider l'opération");
        // }
        if(is_null($annonce)){
            return redirect()->to(url('/account/mes-annonces'))->with('error', "Une erreur inconnue est survenue. Veuillez réssayer");
        }
        //* Vérifier le solde du client par rapport au montant de l'offre choisie:
        if(UserHelper::solde() < $offre->montant){
            return redirect()->to(url('/account/mes-annonces'))->with('error', "Votre solde est insuffisant pour cette offre. Veuillez achéter du crédit");
        }
        
        //* Vérifier si l'annonce a déjà été mise en VIP:
            $vipDatas = ["duree" => $offre->nbre_jour, "offre_id" => $request->offre_id, "date" => Carbon::now()];
            $vip = new AnnonceVip($vipDatas);

            $payListDatas = ["annonce_id" => $annonce->id, "offre_id" => $request->offre_id, "date" => Carbon::now(), "duree" => $offre->nbre_jour];
            $payList = new VipPurchaseList($payListDatas);

            //* Mettre l'annonce dans la Table VIP:
            if(is_null($annonce->vip)){
                $query =  $annonce->vip()->save($vip);
            }else{
                $vipDatas = 
                ["duree" => $annonce->vip->duree + $offre->nbre_jour, "offre_id" => $request->offre_id];
                $query =  $annonce->vip()->update($vipDatas);
            }
            //* Débiter le solde du client
            if($query){
                $debitQuery = UserHelper::debiterSolde($offre->montant);
                //Enregistrer une historique de payement:
                UserHelper::user()->payementsList()->save($payList);

                //* Envoyer un Email de notification au client:
                Mail::to($annonce->user->user_email)->send(new UserVipAnnoncNotification($annonce));

                //* Créer une activité Utilisateur:
                Notification::makeLog("Annonce VIP", "Vous avez mis votre annonce ". $annonce->titre." en VIP", $annonce->id);
                //* Informer de la réussite de l'opération:
                Notification::notificate("Annonce VIP", "Votre annonce " . $annonce->titre ." est maintenant VIP", $annonce);

                //* Informer sur le solde Débité:
                Notification::notificate("Solde débité", "Votre solde vient d'être débité d'un monatnt de  " . $offre->montant ." pour le boost de votre annonce.", $annonce);
            }
        
        
        if($query && $debitQuery){
                
            return redirect()->to(url('/account/mes-annonces'))->with('success', "Félicitation ! Votre annonce a bien été mis en VIP. Vous recevrez un Email de confirmation.");
        }else{
            return redirect()->back()->with('error', "Une erreur inconnue est survenue. Veuillez ressayer");
        }
    }


}
