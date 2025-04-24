<?php

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsClient;
use App\Http\Middleware\IsLivreur;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
         'guest' => RedirectIfAuthenticated::class,
         'isAdmin' => IsAdmin::class,
         'isClient' => IsClient::class,
         'isLivreur' => IsLivreur::class,
     ]);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


