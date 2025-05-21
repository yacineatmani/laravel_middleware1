<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // If the user is not authenticated, allow access only to the Accueil page
            if ($request->path() !== 'accueil') {
                return redirect('accueil');
            }
        }

        return $next($request);
    }
}