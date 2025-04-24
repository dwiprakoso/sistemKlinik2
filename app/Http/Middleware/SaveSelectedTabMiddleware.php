<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SaveSelectedTabMiddleware
{
    public function handle($request, Closure $next)
    {
        $selectedTab = $request->input('selected_tab'); // Ambil tab terakhir yang dipilih dari request

        // Simpan tab terakhir yang dipilih dalam session
        Session::put('selected_tab', $selectedTab);

        return $next($request);
    }
}
