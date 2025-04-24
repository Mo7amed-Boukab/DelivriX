<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLivreur
{
    public function handle(Request $request, Closure $next)
    {
       if (Auth::check() && Auth::user()->role === 'livreur') {
           return $next($request);
       }
       abort(403);
    }
}

