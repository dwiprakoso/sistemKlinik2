<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm($role)
    {
        $role = strtolower($role);
        if (!in_array($role, ['admin', 'dokter', 'pasien'])) {
            abort(404, 'Role not found');
        }
        return view('auth.login', compact('role'));
    }

    public function login(Request $request, $role)
    {
        $role = strtolower($role);
        if (!in_array($role, ['admin', 'dokter', 'pasien'])) {
            abort(404, 'Role not found');
        }

        $credentials = $request->only('nama', 'password');

        // Define guards based on role
        $guards = $role === 'dokter' ? ['admin', 'dokter'] : ($role === 'pasien' ? ['admin', 'pasien'] : ['admin']);

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->attempt($credentials)) {
                return redirect()->route($guard . '.dashboard');
            }
        }

        return back()->withErrors(['nama' => 'Invalid credentials'])->withInput();
    }
    // Fungsi Logout
    public function logout(Request $request)
    {
        // Melakukan logout untuk semua guard
        Auth::logout();

        // Redirect ke halaman utama atau halaman login setelah logout
        return redirect('/');
    }

}
