<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Agent;
use App\Helpers\Site;
use App\Helpers\User;
use App\Models\Photo;
use App\Models\Adresse;
use App\Models\Annonce;
use App\Models\Commune;
use App\Models\Mention;
use App\Helpers\Helpers;
use App\Helpers\Stat;
use App\Models\Category;
use App\Models\Question;
use App\Models\OffreCredit;
use App\Models\SousCategory;
use Illuminate\Http\Request;
use App\Mail\NewAnnonceEmail;
use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function __construct()
    {
         parent::boot();
    }


    public function index()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:

        
        $page_title = "Bienvenue sur Vintage.ci: vendez et achetez vos articles.";
        $categories = Category::select("id", "category", "photo")->oldest()->paginate(12);
        $communes = Commune::select("id", "commune")->latest()->get();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])
        ->where(["deleted" => 0, "statut" => 1, "retire" => false])
        ->latest()
        ->paginate(20);
        //* Jointure
        $vips = Site::vipAnnonces();
        $helps = Help::latest()->limit(2)->get();
        Stat::fillDates(); // to remove
        return view("interface.index", compact(["page_title" , "categories", "annonces", "vips", "helps"]));
    }



    public function categoryGroup()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Toutes les catégories d'annonces.";
        $categories = Category::select("id", "category", "photo")->oldest()->paginate(30);
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("interface.all-category-product", compact(["page_title" , "categories", ]));
    }


    public function communesGroup()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Annonces par communes.";
        $categories = Category::select("id", "category", "photo")->oldest()->paginate(30);
        $communes = Commune::select("id", "commune")->oldest("commune")->get();
        return view("interface.commune", compact(["page_title" , "categories", "communes"]));
    }

    public function contact()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Contactez-nous | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $adresse = Adresse::where('pk', 2022)->first();
        return view("interface.contact", compact(["page_title", "categories", "adresse", "communes"]));
    }


    public function faq()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Questions posée fréquemment | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $questions = Question::latest()->paginate(10);
        return view("front.faq", compact(["page_title", "categories", "communes", "questions"]));
    }


    public function Aide()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Aide & Bases de connaissances sur Vintage.ci | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $questions = Question::latest()->paginate(10);
        $helps = Help::latest()->paginate(12);
        return view("interface.mediatheque_aide", compact(["page_title", "categories", "communes", "questions", "helps"]));
    }

    public function conditions()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Nos mentions légales | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $mention = Mention::where('pk', 2022)->first();
        return view("front.conditions", compact(["page_title","categories", "communes", "mention"]));
    }


    public function cgu()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Nos Conditions Générales d'Utilisation | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $mention = Mention::where('pk', 2022)->first();
        return view("front.cgu", compact(["page_title","categories", "communes", "mention"]));
    }

    public function propriete()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Initialisation de la method du Controller principal


        $page_title = "La propriété intellectuelle | Vintage";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $mention = Mention::where('pk', 2022)->first();
        return view("front.propriete", compact(["page_title","categories", "communes", "mention"]));
    }


    public function pricings()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:


        $page_title = "Nos formules de crédit ";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->oldest("commune")->get();
        $adresse = Adresse::where('pk', 2022)->first();
        $credits = OffreCredit::where(['deleted' => 0])->oldest("created_at")->get();
        return view("interface.buy_credit", compact(["page_title", "categories", "adresse", "communes", "credits"]));
    }


}
