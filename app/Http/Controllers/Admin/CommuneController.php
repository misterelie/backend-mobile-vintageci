<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CommuneController extends Controller
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
        $page_title = "Gérer les communes ";
        $communes = Commune::latest()->paginate(10);
        return view("admin/group/commune", compact(["page_title", "communes"]));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commune = Commune::create([
            'commune'=> ($request->commune),
        ]);
        if($commune)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commune $commune)
    {
        $array = [
            'commune'=> Str::lower($request->commune),
        ];
        
        if($commune->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        $query = $commune->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
