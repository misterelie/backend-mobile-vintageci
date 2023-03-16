<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\VipHelper;
use App\Http\Controllers\Controller;
use App\Models\OffreVip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OffreVipController extends Controller
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
        $vips = OffreVip::where(['deleted' => 0])->latest()->paginate(10);
        return view("admin/vip/index", compact(["page_title", "vips"]));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(VipHelper::reduction($request->reduction, $request->cout_par_jour));
        $oldoffre = OffreVip::where('title', $request->title)->first();
        if($oldoffre){
            return redirect()->back()->with('error', 'Cette formule existe déjà');
        }

        
        $OffreVip = OffreVip::create([
            'title'=> ($request->title),
            'montant' => VipHelper::netApayer($request->reduction,$request->cout_par_jour, $request->nbre_jour),
            "cout_par_jour" => $request->cout_par_jour,
            'nbre_jour'=> $request->nbre_jour,
            "reduction" => $request->reduction,
            "couleur" => $request->couleur,
        ]);
        if($OffreVip)
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
     * @param  \App\Models\OffreVip  $offreVip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OffreVip $vip)
    {
        $array = [
            'title'=> ($request->title),
            'montant' => VipHelper::netApayer($request->reduction,$request->cout_par_jour, $request->nbre_jour),
            "cout_par_jour" => $request->cout_par_jour,
            'nbre_jour'=> $request->nbre_jour,
            "reduction" => $request->reduction,
            "couleur" => $request->couleur,
        ];
        if ($request->title != $vip->title) {
           $array = array_merge($array, ["slug" => Str::slug($request->title),]);
        }
        if($vip->update($array))
        {
            return redirect()->back()->with('success', "Réussite ! Opération effectuée avec succès");
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OffreVip  $offreVip
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffreVip $vip)
    {
        $array = [
            'deleted'=> 1,
        ];
        if($vip->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
