<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RoleVerification
{
    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();
        $isLogged = Session::get('is_logged', false);
        $role = Session::get('role', 'user'); // 'user', 'membre', 'webmaster', 'admin'

        // Non connecté : accès uniquement à Accueil
        if (!$isLogged && $route !== 'accueil') {
            return redirect()->route('accueil');
        }

        // Membre (user) : accès uniquement à Accueil
        if ($role === 'user' && $route !== 'accueil') {
            return redirect()->route('accueil');
        }

        // Membre (membre) : accès à Accueil et Articles (liste et show)
        if ($role === 'membre' && !in_array($route, ['accueil', 'articles.index', 'articles.show'])) {
            return redirect()->route('accueil');
        }

        // Webmaster : accès à Accueil, Articles (site et backoffice), mais PAS users
        if ($role === 'webmaster') {
            if ($route === 'users.index') {
                return redirect()->route('accueil');
            }
            if (in_array($route, [
                'accueil', 'articles.index', 'articles.show',
                'articles.create', 'articles.store', 'articles.edit', 'articles.update', 'articles.destroy'
            ])) {
                return $next($request);
            }
            return redirect()->route('accueil');
        }

        // Admin : accès partout
        if ($role === 'admin') {
            return $next($request);
        }

        return $next($request);
    }
}