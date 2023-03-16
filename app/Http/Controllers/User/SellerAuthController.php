<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PasswordReset;
use App\Models\Commune;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Mail\PasswordResetedMail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Agent;
use Illuminate\Support\Facades\Cookie;

class SellerAuthController extends Controller
{
    public function login()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Connectez-vous à votre compte";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("interface.login", compact(["page_title", "categories", "communes"]));
    }


    public function register()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Inscrivez-vous sur Vintage.ci";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("interface.register", compact(["page_title", "categories", "communes"]));
    }


    //* Forgot Password:
    public function forgot()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        } // Comptage des visiteurs:
        $page_title = "Mot de passe oublié | Vintage.ci";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("interface.reset_password", compact(["page_title", "categories", "communes"]));
    }






    public function forgotCheck(Request $request)
    {
        $user = User::where(["user_email" => $request->user_email])->first();
        //* Sinon, on affiche une alerte.
        if(!$user){
            return redirect()->back()->with("error", "Désolé. Nous parvenons pas à trouver ce compte."); die;
        }
        //* Créer les valeurs:
        $resetArray = ['token' => Str::random(24)];
        if(is_null($user->reset)){
        $resetArray = new PasswordReset(["token" => Str::random(24)]);
            $user->reset()->save($resetArray);
        }else{
            $user->reset()->update($resetArray);
        }

        //* Si on a trouvé un compte, on envoi l'Email de récupération
        $url = url("/reset-account/".$user->token);
        Mail::to($user->user_email)->send(new ForgotPasswordMail($url));
        return redirect()->to(url('/password/notification'));
    }


    //* Réinitialiser le mot de passe:
    public function reset($token)
    {
        $user = User::where(["token" => $token])->first();
        if(!$token || !$user)
        {
           return redirect()->to(url("register/notification"))->with("error", "Une erreur inconnue est survenue. Veuillez contactez l'Administration.");die;
        }

         if((int) (Carbon::now()->diffInMinutes($user->reset->updated_at)) > 15){
            return redirect()->to(url("/timeout/notification"))->with("error", "<strong> Email expiré </strong> <br> 
             Le lien de récupération a expiré. Veuillez à nouveau demander la récupération de votre compte en cliquant  ". '<a href="'. url("/forgot") .'" target="_blank" rel="noopener noreferrer"><b> ici </b></a>');die;
         }
        $page_title = "Réinitialiser mon mot de passe";

        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("interface.reinitialise_mot_pwd", compact(["page_title", "categories", "communes", "user"]));
    }



    public function reinitialiser(Request $request, User $user)
    {
        $validated = $request->validate([
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password|min:8",
        ]);

        //* L'utilisateur a saisi
        if($validated)
        {
            $array = [
                "password" => Hash::make($request->password) ,
                "user_credentials" => $request->password,
            ];

            if($user->update($array)){

                //* Envoyer l'Email de confirmation de compte:
                $url = url("/annonces");
                Mail::to($user->user_email)->send(new PasswordResetedMail($user,$url));
                return redirect()->to(url('/connexion'))->with("success", "Votre mot de passe a bien été réinitialisé. Veuillez vous connecter.");
            }else{
                return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
            }
        }else{
            return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez renseigner correctement les champs obligatoires.");
        }
    }
}
