<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\NewAnnonceEmail;
use App\Models\Category;
use App\Models\Photo;
use App\Models\SousCategory;
use App\Models\Commune;
use App\Models\Annonce;
use App\Helpers\Stat;
use App\Helpers\Site;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Helpers\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AnnonceController extends Controller
{
    public function __construct()
    {
         parent::boot();
    }

    /**
     * Toutes les annoncdes
     *
     * @return void
     */
    public function index()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Toutes les annonces | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])
        ->where(["deleted" => 0, "statut" => 1, "retire" => false])
        ->latest()
        ->paginate(30);
        
        //* Jointure
        $vips = Site::vipAnnonces();

        return view("interface.annonce-product", compact(["page_title", 'annonces', "categories", "communes", "vips"]));
    }





    /**
     * Annonces VIP
     */
    public function boosted($boost)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Toutes les annonces VIP | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $annonces = Site::vipAnnonces();
        return view("interface.annonce_vip", compact(["page_title", 'annonces', "categories", "communes"]));
    }


    /**
     * Les annonces par Catégories
     *
     * @param string|int $category
     * @param string|int $id
     * @return void
     */
    public function group($category, $id)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $category = Category::where("id", $id)->first();
        $page_title = "Les annonces dans: $category->category | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();

        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 0, "statut" => 1, "category_id" => $id])->latest()->paginate(25);
        return view("interface.annonce_category", compact(["page_title", 'annonces', "categories", "communes", "category"]));
    }



    public function communesGroup($commune, $id)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $commune = Commune::where("id", $id)->first();
        $page_title = "Les annonces à : $commune->commune | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();

        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(["deleted" => 0, "statut" => 1, "commune_id" => $id])->latest()->paginate(25);
        //dd($annonces);
        return view("interface.commune_annonce", compact(["page_title", 'annonces', "categories", "communes", "commune"]));
    }


    public function single($pk)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $annonce = Annonce::where(["pk"=> $pk])->first();
        if (!$annonce) {
            return redirect()->back()->with('error', 'Cette annonce n\'exite pas');
        }
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        
        $communes = Commune::select("id", "commune")->latest()->get();
        //* Titre de la page
        //dd($annonce);
        $page_title = $annonce->titre. " | Vintage";
        
        //* Incrementer les Vues:
        Stat::incrementView($annonce);
        return view("interface.detail_annonce", compact(["page_title", "annonce", "categories","communes"]));
    } //front.annonces.single

 
    public function search(Request $request)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $annonces  = Site::search($request->q, $request->cat);
        $cat  = !is_null($request->cat) ? $request->cat : null;
        $query  = !is_null($request->q) ? $request->q : null;
        $count = !is_null($annonces) ? count($annonces) : 0;
        //* Titre de page */
        $page_title =  $count. " Résultat".($count > 1 ? 's': '') ." trouvé". ($count > 1 ? 's': '');
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();

        //* Vue
        return view("front.annonces.search", compact(['annonces', 'categories', 'communes', 'page_title','cat', 'query', 'count']));
    }
}
