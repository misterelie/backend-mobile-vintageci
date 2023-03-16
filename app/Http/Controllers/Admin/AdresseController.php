<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Adresse;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Gestion des coordonnées ";
        $adresse = Adresse::where('pk', 2022)->first();
        return view("admin/about/adresse", compact(["page_title", "adresse"]));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adresse = Adresse::where('pk', 2022)->first();

        if(is_null($request->email_one) || is_null($request->phone_one)){
            return redirect()->back()->with('error', 'Veuillez compléter les champs.');
        }
        $array = [
            'email_one'=> !is_null($request->email_one) ? $request->email_one : $adresse->email_one,
            "email_label" => !is_null($request->email_label) ? $request->email_label : $adresse->email_label,
            "phone_one" => !is_null($request->phone_one) ? $request->phone_one : $adresse->phone_one,
            "phone_label" => !is_null($request->phone_label) ? $request->phone_label : $adresse->phone_label,
            "adresse" => !is_null($request->adresse) ? $request->adresse : $adresse->adresse,
            "adresse_label" => !is_null($request->adresse_label) ? $request->adresse_label : $adresse->adresse_label,
        ];

        if(!is_null($adresse)){
            $adresse->update($array);
        }else{
            $adresse = Adresse::create($array);
        }

        if($adresse)
        {
            return redirect()->back()->with('success', 'Réussite ! Coordonnées mises à jour avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adresse  $adresse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adresse)
    {
        //
    }
}
