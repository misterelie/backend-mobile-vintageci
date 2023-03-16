<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Mail\ConfirmAccountEmail;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Commune;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserNotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afterRegister()
    {
        $page_title = "Notification | Vintage.ci";
         $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.notifications.after-register", compact(["page_title",  "categories", "communes"]));
    }


    public function timeout()
    {
        $page_title = "Notification | Vintage.ci";
         $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.notifications.timeout", compact(["page_title",  "categories", "communes"]));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function afterPoste()
    {
        $page_title = "Notification de poste | Vintage.ci";
         $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.notifications.after-poste", compact(["page_title",  "categories", "communes"]));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function afterValidation()
    {
        $page_title = "Notification | Vintage.ci";
         $categories = Category::select("id", "category")->latest()->get();
            $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.notifications.after-validation", compact(["page_title",  "categories", "communes"]));
        //after-validation.blade.php
    }



    public function passwordReset()
    {
        $page_title = "Réinitialisation de mot de passe";
         $categories = Category::select("id", "category")->latest()->get();
        $communes = Commune::select("id", "commune")->latest()->get();
        return view("seller.notifications.reset-password", compact(["page_title",  "categories", "communes"]));
    }
    
}
