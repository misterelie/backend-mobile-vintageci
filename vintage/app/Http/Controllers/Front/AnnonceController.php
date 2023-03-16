<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function index()
    {
        $page_title = "Toutes les annonces | Vintage";
        return view("front.annonces.all", compact(["page_title"]));
    }
}
