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
use App\Models\Annonce;
use App\Models\SousCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{



    public function dropAccount()
    {
        $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        $sous_categories = SousCategory::select("id", "sous_category")->latest()->get();
        $page_title = "Supprimer mon compte utilisateur | Vintage";
        return view("seller.compte.drop", compact(["page_title", "categories"]));
    }



    public function remove(Request $request, UserModel $user){ 
        if(Session::get('user_id') != $user->id){
            return redirect()->back()->with("error", "Erreur ! Vousne pouvez pas supprimer cecompte."); die;
        }
        //* Vider la sesssion:
        Session::pull('user_email');
        Session::pull('user_id');
        Session::pull('user_type');

        $deleteArray = ['deleted' => 1];
        if ($user->update($deleteArray)) {
            return redirect()->to(url('/'))->with("success", "Votre compte a été supprimé avec succès.");
        } else {
            return redirect()->back()->with("error", "Une erreur inconnue est survenue. Veuillez réssayer.");
        }
    }
}
