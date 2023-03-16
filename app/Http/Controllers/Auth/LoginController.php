<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Notification;
use App\Helpers\User as HelpersUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Helpers\User as UserHelper;
use App\Models\UserLog;
use App\Helpers\Agent;

class LoginController extends Controller
{
    public function index()
    {
        $page_title = "Veuillez vous connecter";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("auth/login", compact(["page_title", "categories", "communes"]));
    }



    public function auth(Request $request)
    {
        //dd($request->all());
         $request->validate([
            "user_email" => "required",
            "password" => "required",
        ]);

        //* Vérifier si le compte existe
        $user = User::where(["user_email" => $request->user_email])->first();
        if(!$user){
            return redirect()->back()->with('error', " Ce compte n'existe pas.");
        }

        //* Vérifier si le mot de passe est le bon
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->with('error', " Email ou mot de passe incorrecte. Veuillez réssayer.");
        }

        //* Vérifier si le compte est activé
        if(!(bool)($user->user_validated)){
            return redirect()->back()->with('error', " Votre compte est incatif. Vérifiez votre boîte de messagerie pour l'activer.");
        }

        //* Définir la Session et les cookies de l'utilisateur:

            //* Définir le cookie:
            if(trim($request->remember) != null){
                Cookie::queue('user_email', $user->user_email, 1440); // Durée de 24H
                Cookie::queue('user_id', $user->id, 1440); // Durée de 24H
                Cookie::queue('user_type', $user->user_type, 1440); // Durée de 24H
            }

            //*- Définir la session de l'utilisateur
            Session::put('user_email', $user->user_email);
            Session::put('user_id', $user->id);
            Session::put('user_type', $user->user_type);

            //* Activité utilisateur:
            $array = new UserLog(Notification::userLog("connexion à votre compte", "Vous vous êtes connecté à votre compte de ". date('d/m/Y à H:i'). " sur ". Agent::plateform(). " ". Agent::version(Agent::plateform()), ));
            $logs = $user->logs()->save($array);
            Notification::make($logs);


        //* Vérifier le type de l'utilisateur
        if(self::isAdmin($user)){
            //redirection admin
            Cookie::queue('type',"admin", 1440);
            return redirect()->to(url("/back-office"));
        }else{
            // redirection Utilisateur
            Cookie::queue('type',"client", 1440);
            return redirect()->to(url("/mon-compte"));
        }
    }



    public function logout(){
        //if(UserHelper::withCookie()){
        Cookie::queue(Cookie::forget('user_email'));
        Cookie::queue(Cookie::forget('user_id'));
        Cookie::queue(Cookie::forget('user_type'));
        //* Vider la Session
        Session::pull('user_email');
        Session::pull('user_id');
        Session::pull('user_type');
        Session::pull('user_ip');
        //* Rédirection vers la page de connexion:
        return redirect()->to(url('/'));
    }


    public static function isAdmin(User $user){
        if($user->user_type === 1){
            return true;
        }else{
            return false;
        }
    }
}
