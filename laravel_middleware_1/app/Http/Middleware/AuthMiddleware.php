<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Autoriser tout le monde sur la page d'accueil
        if ($request->route()->getName() === 'accueil') {
            return $next($request);
        }

        // Si l'utilisateur n'est pas "connecté", le rediriger vers l'accueil
        if (!Session::get('is_logged', false)) {
            return redirect()->route('accueil');
        }

        return $next($request);
    }
}