<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Commune;
use App\Models\SousCategory;
use App\Models\Annonce;
use App\Helpers\User;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackendUserController extends Controller
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
        $page_title = "Gestion des annonceurs";
        $users = ModelsUser::with(["annonces"])->where('user_type', 0)->paginate(12);
        return view("admin.users.liste", compact(["page_title", "users"]));
    }

    public function editeurs()
    {
        $page_title = "Gestion des Editeurs";
        $users = ModelsUser::with(["annonces"])->where('user_type', 1)->paginate(12);
        return view("admin.users.editor", compact(["page_title", "users"]));
    }

  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = "Gestion des annonceurs";
        $user = ModelsUser::where("id", $id)->first();
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where("user_id", $id)->paginate(8);

        return view("admin.users.single", compact(["page_title", "user", "annonces"]));
    }

   
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsUser $user)
    {
        $query = $user->delete();
        if($query)
        {
            return redirect()->back()->with('success', 'Opération effectuée avec succès !');
        }else{
            return redirect()->back()->with('error', 'Une erreur inconnue est survenue !');
        }
    }



    public function store(Request $request)
    {
        if(Helpers::validate([$request->user_email, $request->password])){
            return redirect()->back()->with("error", "Veuillez renseigner les champs obligatoire");
        }
        if(Helpers::existThis("users","user_email",$request->user_email)){
            return redirect()->back()->with("error", "Echec ! Cette adresse Email existe déjà.");
        }
        if($request->photo){
            $photo =  Helpers::uploadFile($request,"uploads/general/users/", $request->user_nom,"photo");
        }else{
            $photo = null;
        }
        $array = [
            "avatar" => $photo,
            "user_firstname" => $request->user_firstname,
            "user_lastname" => $request->user_lastname,
            "user_email" => $request->user_email,
            "password" => Hash::make($request->password),
            "user_credentials" => $request->password,
            "user_role" => $request->user_role,
            "user_type" => 1,
            "user_validated" => 1,
        ];

        
          $user = ModelsUser::create($array);
        if($user){
            return redirect()->back()->with("success", "Réussite ! Les données ont été enregistrées");
        }else{
            return redirect()->back()->with("error", "Echec ! Une erreur inconnue est survenue");
        }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsUser $user)
    {
        if(Helpers::validate([$request->user_email])){
            return redirect()->back()->with("error", "Veuillez renseigner les champs obligatoire");
        }

        $array = [
            "user_firstname" => $request->user_firstname,
            "user_lastname" => $request->user_lastname,
            "user_role" => $request->user_role,
            "user_email" => $request->user_email,
            "password" => Hash::make($request->password),
            "user_credentials" => $request->password,
        ];

        if($request->photo){
            $photo =  Helpers::uploadFile($request,"uploads/general/users/", $request->user_nom,"photo");
            $array = array_merge($array, ["avatar" => !is_null($photo) ? $photo : null,]);
        }

        if($user->update($array)){
            return redirect()->back()->with("success", "Réussite ! Les données ont été mises à jour");
        }else{
            return redirect()->back()->with("error", "Echec ! Une erreur inconnue est survenue");
        }
    }


   


    public function toggle(ModelsUser $user)
    {
        $array = [
            "user_validated" => ! (bool) $user->user_validated,
        ];
        if($user->update($array)){
            return redirect()->back()->with("success", "Réussite! Le statut a été modifié avec succès");
        }else{
            return redirect()->back()->with("error", "Echec ! Une erreur inconnue est survenue");
        }
    }
}
