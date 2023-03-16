<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = "Bienvenue sur Vintage: vendez, achetez vos articles à moindre coût";
        return view("front.index", compact(["page_title"]));
    }




    public function contact()
    {
        $page_title = "Contactez-nous | Vintage";
        return view("front.contact", compact(["page_title"]));
    }


    public function faq()
    {
        $page_title = "Questions posée fréquemment | Vintage";
        return view("front.faq", compact(["page_title"]));
    }

    public function conditions()
    {
        $page_title = "Nos conditions d'utilisation | Vintage";
        return view("front.conditions", compact(["page_title"]));
    }
}
