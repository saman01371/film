<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ProfileCompletionion;
use App\Http\Middleware\RoleMiddlware;
use App\Http\Middleware\AuthMiddlware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

       // $middleware->append(ProfileCompletionion::class);
     /*   $middleware->use([
          RoleMiddlware::class
        ]);*/

          //  $middleware->append(RoleMiddlware::class);


        ->withMiddleware(function (Middleware $middleware) {
           $middleware->alias([
               'role' => RoleMiddlware::class,
               'auth'=>AuthMiddlware::class,
               'profile'=>ProfileCompletionion::class,
           ]);


    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
