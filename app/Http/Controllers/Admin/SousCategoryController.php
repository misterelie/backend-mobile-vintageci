<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SousCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SousCategoryController extends Controller
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
        $page_title = "Gérer les sous catégories d'article et d'annonces";
        $souscategories = SousCategory::latest()->paginate(10);
        $categories = Category::latest()->get();
        return view("admin/group/souscategory", compact(["page_title", "souscategories", "categories"]));
    }

    
    public function store(Request $request)
    {
        $category = SousCategory::create([
            'category_id'=> Str::lower($request->category_id),
            'sous_category'=>$request->sous_category,
        ]);
        if($category)
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


   
    public function update(Request $request, SousCategory $souscategory)
    {
        $array = [
            'category_id'=> ($request->category_id),
            'sous_category'=>$request->sous_category,
        ];
        
        if($souscategory->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategory  $sousCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousCategory $souscategory)
    {
        $query = $souscategory->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
