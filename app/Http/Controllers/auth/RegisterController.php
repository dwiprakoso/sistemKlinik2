<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;  // Tambahkan import untuk Auth

class RegisterController extends Controller
{
    public function showPasienRegisterForm()
    {
        return view('auth.register');
    }

    public function registerPasien(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_ktp' => 'required|string|min:16',
            'no_hp' => 'required|string|min:10',
        ]);

        // Membuat hash dari alamat untuk password
        $hashedAlamat = Hash::make($request->alamat);

        // Menyimpan data pasien
        $pasien = Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'password' => $hashedAlamat, // Menggunakan alamat yang di-hash sebagai password
        ]);

        // Login otomatis setelah registrasi
        Auth::guard('pasien')->login($pasien);

        // Redirect ke halaman dashboard pasien setelah login otomatis
        return redirect()->route('pasien.dashboard');
    }
}

