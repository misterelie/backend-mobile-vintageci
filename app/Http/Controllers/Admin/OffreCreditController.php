<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffreCredit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OffreCreditController extends Controller
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
        $page_title = "Gérer les offres de crédits ";
        $credits = OffreCredit::where(['deleted' => 0])->latest()->paginate(10);
        return view("admin/credit/index", compact(["page_title", "credits"]));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oldoffre = OffreCredit::where('title', $request->title)->first();
        if($oldoffre){
            return redirect()->back()->with('error', 'Cette formule existe déjà');
        }
        $offreCredit = OffreCredit::create([
            'title'=> ($request->title),
            "montant" => $request->montant,
            "bonus" => $request->bonus,
            "couleur" => $request->couleur,
            "slug" => Str::slug($request->title),
        ]);
        if($offreCredit)
        {
            return redirect()->back()->with('success', "Réussite ! L'offre a bien été créée.");
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OffreCredit  $offreCredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OffreCredit $credit)
    {
        $array = [
            'title'=> ($request->title),
            "montant" => $request->montant,
            "bonus" => $request->bonus,
            "couleur" => $request->couleur,
        ];
        if ($request->title != $credit->title) {
           $array = array_merge($array, ["slug" => Str::slug($request->title),]);
        }
        if($credit->update($array))
        {
            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès");
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OffreCredit  $offreCredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffreCredit $credit)
    {
        $array = [
            'deleted'=> 1,
        ];
        if($credit->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
