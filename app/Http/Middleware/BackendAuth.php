<?php

namespace App\Http\Middleware;

use App\Helpers\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BackendAuth
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
        if (!User::activeSession() || User::getUserType() != 1) {
            return redirect()->to(url('backend/login'));
        }
        return $next($request);
    }
}
