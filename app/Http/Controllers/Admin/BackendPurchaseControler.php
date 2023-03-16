<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Dates;
use App\Helpers\Notification;
use App\Helpers\Site;
use App\Http\Controllers\Controller;
use App\Models\PurchaseCredit;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\User as UserHelper;
use App\Mail\PurchaseCreditAlertToUser;
use App\Models\UserSolde;
use App\Models\VipPurchaseList;
use Illuminate\Support\Facades\Mail;

class BackendPurchaseControler extends Controller
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
    public function index()
    {
        $page_title = "Gestion des Achats de Crédits ";
        $purchases = PurchaseCredit::where(['deleted' => 0])->latest()->paginate(10);
        return view("admin/purchase/index", compact(["page_title", "purchases"]));
    }

    public function vipPurchases()
    {
        $page_title = "Gestion des Achats de Boosts ";
        $purchases = VipPurchaseList::where(['deleted' => 0])->latest()->paginate(10);
        return view("admin/purchase/vip", compact(["page_title", "purchases"]));
    }

   public function boostedAnnonces(){
        $page_title = "Annonces VIP ";
        $annonces = Site::boostedAnnonces();//->paginate(10);
        return view("admin/purchase/boosted", compact(["page_title", "annonces"]));
   }


    public function confirm(PurchaseCredit $purchase)
    {
       
        //* Le propriétaire:
        $user = $purchase->user;
        //* Formule:
        $credit = $purchase->credit;

        //* Données:
        $array = [
            "validated_by" => UserHelper::userId(),
            'validated_at' => date('Y-m-d H:i:s'),
            'statut'        => 1,
        ];

        //* Ajouter le solde du client:
        $soldeDatas = [
            "montant" => UserHelper::addSolde($user->id) + $credit->montant + $credit->bonus,
            'last_action' => 'Recharge',
        ];
        if(is_null($user->solde)){
            $modelSolde = new UserSolde($soldeDatas);
           $solde  = $user->solde()->save($modelSolde);
        }else{
           $solde =  $user->solde()->update($soldeDatas);
        }
        

        if($purchase->update($array) && $solde)
        {
            //* 1 - Création de l'activité d'Achat de Crédits
           
            //* Notification par Email au client
            //Notification::make($userLog, $user->id);

            //* Notification par Email à l'utilisateur
            //Mail::to($User->user_email)->send(new PurchaseCreditAlertToUser($User, $purchase->credit));

            return redirect()->back()->with('success', "Félicitation ! Opération effectuée avec succès. Le client recevra un Email de notification.
            ");
        }else{
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }
    }
    


    public function cancel(PurchaseCredit $purchase)
    {
        //* Le propriétaire:
        $user = $purchase->user;
        //* Formule:
        $credit = $purchase->credit;
        //* Données:
        $array = [
            'statut'        => 2,
        ];
        if($purchase->update($array))
        {
            //* 1 - Création de l'activité d'Achat de Crédits
           
            //* Notification par Email au client
            //Notification::make($userLog, $user->id);

            //* Notification par Email à l'utilisateur
            //Mail::to($User->user_email)->send(new PurchaseCreditAlertToUser($User, $purchase->credit));

            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. Le client recevra un Email de notification.
            ");
        }else{
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseCredit  $purchaseCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseCredit $purchase)
    {
        //* Le propriétaire:
        $user = $purchase->user;
        //* Formule:
        $credit = $purchase->credit;
        //* Données:
        $array = [
            'statut'  => 3,
            'deleted' => 1,
        ];
        if($purchase->update($array))
        {
            //* 1 - Création de l'activité d'Achat de Crédits
           
            //* Notification par Email au client
            //Notification::make($userLog, $user->id);

            //* Notification par Email à l'utilisateur
            //Mail::to($User->user_email)->send(new PurchaseCreditAlertToUser($User, $purchase->credit));

            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. Le client recevra un Email de notification.
            ");
        }else{
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }
    }


    public function removePurchaseVip(VipPurchaseList $purchase)
    {
        //dd($purchase);
        $array = [
            'deleted' => 1,
        ];
        if($purchase->update($array))
        {
            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès.
            ");
        }else{
            return redirect()->back()->with('error', "Désolé ! Une erreur inconnue esst survenue.");
        }
    }
}
