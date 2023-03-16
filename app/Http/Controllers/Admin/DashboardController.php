<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Stat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Commune;
use App\Models\SousCategory;
use App\Models\Annonce;
use App\Helpers\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::boot();
        //parent::incrementVisite();
    }

    public function index()
    {
        if(Cookie::get('type') != "admin") {
            parent::incrementVisite();
        }
        $page_title = "Tableau de bord";
        $annnoncesAttente = Stat::annnoncesAttente();
        $courbeAnnonces = Stat::courbeAnnonces();
        $currentsMonths = Stat::currentsMonths();

        Stat::fillDates();
        return view("admin.home.index", compact(["page_title", "annnoncesAttente", "courbeAnnonces", "currentsMonths"]));
    }

}
