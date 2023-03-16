<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Gestion des titres de page ";
        $page = Page::where('pk', 2022)->first();
        return view("admin/about/pages", compact(["page_title", "page"]));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = Page::where('pk', 2022)->first();

        if(is_null($request->contact) || is_null($request->cgu) || is_null($request->propriete)  || is_null($request->mention) || is_null($request->faq)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }

        $array = [
            'contact'=> !is_null($request->contact) ? $request->contact : $page->contact,
            "cgu" => !is_null($request->cgu) ? $request->cgu : $page->cgu,
            "mention" => !is_null($request->mention) ? $request->mention : $page->mention,
            "propriete" => !is_null($request->propriete) ? $request->propriete : $page->propriete,
            "faq" => !is_null($request->faq) ? $request->faq : $page->faq,
            "pricing" => !is_null($request->pricing) ? $request->pricing : $page->pricing,
        ];

        if(!is_null($page)){
            $page->update($array);
        }else{
            $page = Page::create($array);
        }

        if($page)
        {
            return redirect()->back()->with('success', 'Réussite ! Coordonnées mises à jour avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

   
}
