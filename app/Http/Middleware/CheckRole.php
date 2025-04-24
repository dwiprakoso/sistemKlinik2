<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Jika pengguna tidak login, arahkan ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();

        // Periksa apakah pengguna memiliki peran yang sesuai
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // Jika tidak memiliki peran yang sesuai, arahkan ke halaman yang sesuai (misalnya dashboard default)
        return redirect()->back();
    }
}
