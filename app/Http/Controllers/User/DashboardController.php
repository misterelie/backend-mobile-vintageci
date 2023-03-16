<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NewAnnonceEmail;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Mail\PasswordResetedMail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\SousCategory;
use App\Models\Commune;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\Helpers\Stat;
use App\Helpers\User;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    public function __construct()
    {
         parent::boot();
    }
    public function index()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Mon compte client";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.compte.home", compact(["page_title", "categories", "communes"]));
    }



    public function annonces()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Mes annonces | Tableau de bord ";
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])
        ->where(["user_id" => User::user()->id, "retire" => false ])->latest()
        ->paginate(10);

        $annonce = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where(['id' => 2])->first();
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.annonces.all", compact(["page_title", "annonces", "categories", "communes"]));
    }




    public function profil()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Mon profil | Tableau de bord ";
        $annonces = Annonce::with(["category", "sousCategory", "commune", "cover", "photos"])->where("user_id", User::user()->id)->paginate(10);

        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->oldest("commune")->get();
        return view("seller.compte.setting", compact(["page_title", "annonces", "categories", "communes"]));
    }


    public function setting(Request $request, UserModel $user)
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $array = [
            "user_firstname" => !is_null($request->user_firstname) ? $request->user_firstname : $user->user_firstname,
            "user_lastname" => !is_null($request->user_lastname) ? $request->user_lastname : $user->user_lastname,
            "user_city" => $request->user_city,
            "user_phone" => $request->user_phone,
            "user_whatsapp" => $request->user_whatsapp,
        ];
        if ($user->update($array)) {
            return redirect()->back()->with("success", "Votre profil a bien été mis à jour.");
        } else {
            return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
        }
    }





    /**
     * Réinitialiser les mot de passe:
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function resetPassword(Request $request, UserModel $user)
    {
        if ($request->password != null) {
            if ($request->password_confirmation != $request->password) {
                return redirect()->back()->with("error", "Les mots de passe ne correspondent pas.");
            }
            
            $array = [
                "password" => Hash::make($request->password),
                "user_credentials" => $request->password
            ];

            if ($user->update($array)) {
                $url = url("/annonces");
                Mail::to($user->user_email)->send(new PasswordResetedMail($user, $url));
                return redirect()->back()->with("success", "Votre mot de mot de passe a bien été mis à jour.");
            } else {
                return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
            }
        }

        return redirect()->back()->with("error", "Une erreur inconnue est survenue.");
    }
}
