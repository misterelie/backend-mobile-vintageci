<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commune;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ConfirmAccountEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        $page_title = "Créez un compte Administrateur";
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("auth/signup", compact(["page_title", "categories", "communes"]));
    }

    public function inscription()
    {
        $page_title = "Créez un compte | Espace utilisateur";

        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("auth/register", compact(["page_title",  "categories", "communes"]));
    }



    /**
     * Page de Notification
     */
    public function notification(){
        $page_title = "Notification";
         $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("auth/alert", compact(["page_title",  "categories", "communes"]));
    }

    /**
     * Enregistrer l'administrateur:
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            "user_firstname" => "required|min:3",
            "user_lastname" => "required|min:3",
            "user_email" => "required|email|unique:users",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password|min:8"
        ]);

        //* L'utilisateur a saisi
        if($validated)
        {
            $admin = User::create([
                "user_firstname" => $request->user_firstname,
                "user_lastname" => $request->user_lastname,
                "user_email" => $request->user_email,
                "password" => Hash::make($request->password) ,
                "user_credentials" => $request->password,
                "user_validated" => 1,
                "user_type" => 1,
                "token" => Str::random(24),
            ]);

            if($admin){
                return redirect()->to('/connexion')->with("success", "Votre compte a bien été créé. Veuillez-vous authentifiez.");
            }else{
                return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
            }
        }else{
            return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez renseigner correctement les champs obligatoires.");
        }
        //dd($request->all());
    }


    /**
     * Enregistrer les Utilisateurs:
     *
     * @param Request $request
     * @return void
     */
    public function save(Request $request)
    {
        $validated = $request->validate([
            "user_firstname" => "required|min:3",
            "user_lastname" => "required|min:3",
            "user_email" => "required|email|unique:users",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password|min:8",
            "user_phone" => 'required|min:8|unique:users',
            "cgu" => 'required',
        ]);

        //* L'utilisateur a saisi
        if($validated)
        {
            $user = User::create([
                "user_firstname" => $request->user_firstname,
                "user_lastname" => $request->user_lastname,
                "user_email" => $request->user_email,
                "password" => Hash::make($request->password) ,
                "user_credentials" => $request->password,
                "user_phone" => $request->user_phone,
                "user_whatsapp" => $request->user_whatsapp,
                "user_type" => 0,
                "token" => Str::random(24),
            ]);

            if($user){

                //*- Définir la session de l'utilisateur
                Session::put('user_email', $user->user_email);
                Session::put('user_id', $user->id);
                Session::put('user_type', $user->user_type);


                //* Envoyer l'Email de confirmation de compte:
                $url = url("account/validate/".$user->token);
                Mail::to($user->user_email)->send(new ConfirmAccountEmail($user,$url));
                //return redirect()->to(url('/register/notification'));
                return redirect()->to(url('/mon-compte'))
                ->with("success", 
                "Votre compte a bien été créé. Vérifiez votre boîte de messagerie, un <strong> Email de confirmation </strong> vous a été envoyé. <br> Si vous le recevez pas, fouiller vos spams.<br> Le mail expire dans <strong> 15 </strong> minutes. ");
            }else{
                return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
            }
        }else{
            return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez renseigner correctement les champs obligatoires.");
        }
    }


    /**
     * Activer le compte de l'utilisateur
     */
     public function setAccount($token)
     {
        $user = User::where("token", $token)->first();
        if(!$token || !$user)
        {
           return redirect()->to(url("register/notification"))->with("error", "Une erreur inconnue est survenue. Veuillez contactez l'Administration.");die;
        }
    
        if((int) (Carbon::now()->diffInDays($user->created_at)) > 14){
           return redirect()->to(url("/confirmation/notification"))->with("error", "<strong> Email expiré </strong> <br> 
            Le lien de confirmation a expiré. Veuillez vous inscrire à nouveau sur <strong> ". config("app.name")."</strong> en cliquant  ". '<a href="'. url("/inscription") .'" target="_blank" rel="noopener noreferrer"><b> ici </b></a>');die;
        }
        $array= ["user_validated" => 1, "updated_at" => date("Y-m-d H:i:s")];
        $user->update($array);
        return redirect()->to(url("/connexion"))->with("success", "Votre compte a été activé avec succès. Veuillez vous authentifier !");die;
     }

     

     public function resendEmail(Request $request, User $user){
        $url = url("account/validate/".$user->token);
        Mail::to($user->user_email)->send(new ConfirmAccountEmail($user,$url));
        return redirect()->back()
                ->with("success", 
                "Email envoyé avec succès. Vérifiez votre boîte de messagerie. ");
     }
    
}
