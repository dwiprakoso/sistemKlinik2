<?php

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RegisterMiddleware;
use App\Http\Middleware\SaveSelectedTabMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => CheckRole::class,
            'guest' => RedirectIfAuthenticated::class,
            'save.selected.tab' => SaveSelectedTabMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
