<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class RoleVerification
{
    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();
        $isLogged = Session::get('is_logged', false);
        $role = Session::get('role', null);

        // Si pas connecté, accès uniquement à l'accueil
        if (!$isLogged && $route !== 'accueil') {
            return redirect()->route('accueil');
        }

        // Si connecté mais pas admin, accès seulement à accueil et article
        if ($isLogged && $role !== 'admin' && !in_array($route, ['accueil', 'article'])) {
            return redirect()->route('accueil');
        }

        return $next($request);
    }
}