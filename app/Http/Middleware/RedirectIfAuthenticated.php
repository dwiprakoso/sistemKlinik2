<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->check()) {
        return redirect()->back();
    }

    return $next($request);
}
}
