<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_title = "Mon compte client";
        return view("seller.compte.home", compact(["page_title"]));
    }



    public function login()
    {
        $page_title = "Mon compte client";
        return view("seller.auth.login", compact(["page_title"]));
    }

    public function register()
    {
        $page_title = "Mon compte client";
        return view("seller.auth.register", compact(["page_title"]));
    }
}
