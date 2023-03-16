<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $page_title = "Gérer les catégories d'article et d'annonces";
        $categories = Category::latest()->paginate(10);
        return view("admin/group/category", compact(["page_title", "categories"]));
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
        $category = Category::create([
            'category'=> Str::lower($request->category),
            'photo'=> $photo,
        ]);
        if($category)
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $array = [
            'category'=> ($request->category),
        ];

        if($request->photo != null){
            $photo = Helpers::uploadFile($request, 'Categories', Helpers::filterstring($request->category), 'photo' );
            $array = array_merge($array,["photo" => $photo]);
        }
        
        if($category->update($array))
        {
            return redirect()->back()->with('success', 'Réussite ! Opération effectuée avec succès.');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $query = $category->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }
}
