<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Mention;
use Illuminate\Http\Request;

class MentionController extends Controller
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
        $page_title = "Gestion des mentions légales";
        $mention = Mention::where('pk', 2022)->first();
        return view("admin/about/mention", compact(["page_title", "mention"]));
    }


    public function cgu()
    {
        $page_title = "Gestion des Conditions générales d'utilisation";
        $mention = Mention::where('pk', 2022)->first();
        return view("admin/about/cgu", compact(["page_title", "mention"]));
    }

    public function pi()
    {
        $page_title = "Gestion de la propriété intellectuelle";
        $mention = Mention::where('pk', 2022)->first();
        return view("admin/about/pi", compact(["page_title", "mention"]));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mention = Mention::where('pk', 2022)->first();
        if(is_null($request->content)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }
        $array = ['content'=> Helpers::encodeText($request->content)];

        if(!is_null($mention)){
            $mention->update($array);
        }else{
            $mention = Mention::create($array);
        }

        if($mention)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    public function updateCgu(Request $request)
    {
        $mention = Mention::where('pk', 2022)->first();
        if(is_null($request->cgu)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }
        $array = ['cgu'=> Helpers::encodeText($request->cgu)];

        if(!is_null($mention)){
            $mention->update($array);
        }else{
            $mention = Mention::create($array);
        }

        if($mention)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    public function updatePi(Request $request)
    {
        $mention = Mention::where('pk', 2022)->first();
        if(is_null($request->pi)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }
        $array = ['pi'=> Helpers::encodeText($request->pi)];

        if(!is_null($mention)){
            $mention->update($array);
        }else{
            $mention = Mention::create($array);
        }

        if($mention)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

}
