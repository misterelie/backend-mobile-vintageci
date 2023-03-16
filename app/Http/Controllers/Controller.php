<?php

namespace App\Http\Controllers;

use App\Helpers\Agent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Stat;
use App\Helpers\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function boot(){
        Stat::vipAnnoncesFilter();
    }

    
    public function incrementVisite(){
        Agent::visiteCount(); // La méthode de mon Helper Agent()
    }
}
