<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Helpers\User;

class AlreadyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //* Rédiriger l'utilisateur ver l'acceuil s'il est déjà connecté
        if (session()->has("user_id") && session()->get("user_id") != "" || Cookie::has('user_type')) {
            
            if(User::getUserType() === 0){
                return redirect()->to(url('/mon-compte')); die;
            }   
            if(User::getUserType() === 1){
                return redirect()->to(url('/back-office')); die;
            }
        }
        return $next($request);
    }
}
