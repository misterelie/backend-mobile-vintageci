<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marque;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use Illuminate\Support\Str;

class MarqueController extends Controller
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
        $page_title = "Gérer les marques ";
        $marques = Marque::latest()->paginate(10);
        return view("admin/group/marque", compact(["page_title", "marques"]));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = null;
        if($request->photo != null){
            $photo = Helpers::uploadFile($request, 'Categories', Helpers::filterstring($request->category), 'photo' );
          
        }
        $marque = Marque::create([
            'marque'=> ($request->marque),
            "photo" => $photo,
        ]);
        if($marque)
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
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
        $array = [
            'marque'=> Str::lower($request->marque),
        ];
        
        if($request->photo != null){
            $photo = Helpers::uploadFile($request, 'Categories', Helpers::filterstring($request->category), 'photo' );
            $array = array_merge($array,["photo" => $photo]);
        }

        if($marque->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        $query = $marque->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
