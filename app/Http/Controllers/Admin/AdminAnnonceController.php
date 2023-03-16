<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Notification;
use App\Helpers\Site;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmationMail;
use App\Models\Category;
use App\Models\Commune;
use App\Models\SousCategory;
use App\Models\Annonce;
use App\Helpers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminAnnonceController extends Controller
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
        $page_title = "Nouvelle annonces";
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 0, "statut"=> 0])->paginate(25);
        return view("admin.annonces.liste", compact(["page_title", "annonces"]));
    }



    public function annonces()
    {
        $page_title = "Les Annonces en ligne";
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 0, "statut" => 1])->paginate(25);
        return view("admin.annonces.online", compact(["page_title", "annonces"]));
    }

    public function rejetes()
    {
        $page_title = "Les annonces rejetées ";
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 0, "statut" => 2])->paginate(25);
        return view("admin.annonces.rejete", compact(["page_title", "annonces"]));
    }

    public function supprimes()
    {
        $page_title = "Les annonces supprimées ";
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 1, "statut" => 3])->paginate(25);
        return view("admin.annonces.rejete", compact(["page_title", "annonces"]));
    }



    /**
     * Annonces Retirées du site:
     */
    public function retires()
    {
        $page_title = "Les annonces retirées ";
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["retire" => true])->paginate(25);
        return view("admin.annonces.retire", compact(["page_title", "annonces"]));
    }




    public function single($pk)
    {
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonce = Annonce::where("pk", $pk)->first();
        $page_title = $annonce->titre. " | Vintage";
        return view("admin.annonces.single", compact(["page_title", "annonce", "categories"]));
    }

    
    public function decision(Request $request, Annonce $annonce)
    {
        $array = [
            'statut'=> $request->decision,
        ];
        
        if($annonce->update($array))
        {

            //*Envoyer le mail de notification à l'utilisateur
            if (!is_null($annonce->user)) {
                Mail::to($annonce->user->user_email)
                ->send(new ConfirmationMail(Site::confirmationAlert($request->decision, $annonce)));
            }
            //* Notification à l'utilisateur
            Notification::confirmation($request->decision, $annonce);
            
            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès. L'utilisateur recevra un Email de notification sur votre décision");
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    public function destroy(Annonce $annonce)
    {
        $query = ["deleted" => 1, "statut" => 3];
        if($annonce->update($query))
        {
            return redirect()->back()->with('success', 'Annonce supprimée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }




    
}
