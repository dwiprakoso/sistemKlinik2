<?php

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DaftarPoliController;
use App\Http\Controllers\JadwalPeriksaController;
use App\Models\DaftarPoli;

Route::get('/', function () {
    return view('welcome'); // The default page with card options
});

// Routes for Patient Registration
Route::get('/register-pasien', [RegisterController::class, 'showPasienRegisterForm'])->name('register.pasien');
Route::post('/register-pasien', [RegisterController::class, 'registerPasien']);

// Dynamic Login Form
Route::get('/login/{role}', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/{role}', [LoginController::class, 'login']);

// Proteksi untuk route admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/obat', [ObatController::class, 'admin'])->name('admin.obat');
    Route::get('/admin/obat/create', [ObatController::class, 'create'])->name('admin.obat.create');
    Route::post('/admin/obat/store', [ObatController::class, 'store'])->name('admin.obat.store');
    Route::get('/admin/obat/edit/{obat}', [ObatController::class, 'edit'])->name('admin.obat.edit');
    Route::put('/admin/obat/update/{obat}', [ObatController::class, 'update'])->name('admin.obat.update');
    Route::get('/admin/obat/destroy/{obat}', [ObatController::class, 'destroy'])->name('admin.obat.destroy');
    Route::get('/admin/pasien', [PasienController::class, 'admin'])->name('admin.pasien');
    Route::get('/admin/pasien/create', [PasienController::class, 'create'])->name('admin.pasien.create');
    Route::post('/admin/pasien/store', [PasienController::class, 'store'])->name('admin.pasien.store');
    Route::get('/admin/pasien/edit/{pasien}', [PasienController::class, 'edit'])->name('admin.pasien.edit');
    Route::put('/admin/pasien/update/{pasien}', [PasienController::class, 'update'])->name('admin.pasien.update');
    Route::delete('/admin/pasien/destroy/{pasien}', [PasienController::class, 'destroy'])->name('admin.pasien.destroy');
    Route::get('/admin/dokter', [DokterController::class, 'admin'])->name('admin.dokter');
    Route::get('/admin/dokter/create', [DokterController::class, 'create'])->name('admin.dokter.create');
    Route::post('/admin/dokter/store', [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::get('/admin/dokter/edit/{poli}', [DokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/admin/dokter/update/{poli}', [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/dokter/destroy/{poli}', [DokterController::class, 'destroy'])->name('admin.dokter.destroy');
    Route::get('/admin/poli', [PoliController::class, 'admin'])->name('admin.poli');
    Route::get('/admin/poli/create', [PoliController::class, 'create'])->name('admin.poli.create');
    Route::post('/admin/poli/store', [PoliController::class, 'store'])->name('admin.poli.store');
    Route::get('/admin/poli/edit/{poli}', [PoliController::class, 'edit'])->name('admin.poli.edit');
    Route::put('/admin/poli/update/{poli}', [PoliController::class, 'update'])->name('admin.poli.update');
    Route::delete('/admin/poli/destroy/{poli}', [PoliController::class, 'destroy'])->name('admin.poli.destroy');
});

// Proteksi untuk route dokter
Route::middleware('auth:dokter')->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
    Route::get('/dokter/jadwal', [JadwalPeriksaController::class, 'index'])->name('dokter.jadwal');
    Route::get('/dokter/jadwal/create', [JadwalPeriksaController::class, 'create'])->name('dokter.jadwal.create');
    Route::post('/dokter/jadwal/store', [JadwalPeriksaController::class, 'store'])->name('dokter.jadwal.store');
    Route::get('/dokter/jadwal/{id}/edit', [JadwalPeriksaController::class, 'edit'])->name('dokter.jadwal.edit');
    Route::put('/dokter/jadwal/{id}', [JadwalPeriksaController::class, 'update'])->name('dokter.jadwal.update');
    Route::get('/dokter/profil', [DokterController::class, 'editProfil'])->name('dokter.editProfil');
    Route::put('/dokter/profil', [DokterController::class, 'updateProfil'])->name('dokter.updateProfil');
    Route::get('/dokter/riwayat', [PasienController::class, 'riwayatPasien'])->name('dokter.riwayatPasien');
    Route::get('/dokter/periksa', [DaftarPoliController::class, 'index'])->name('dokter.periksaPasien');
});

// Proteksi untuk route pasien
Route::middleware('auth:pasien')->group(function () {
    Route::get('/pasien/dashboard', [PasienController::class, 'index'])->name('pasien.dashboard');
    // Route untuk menangani request AJAX
    Route::get('/pasien/daftar-poli', [PasienController::class, 'daftarPoli'])->name('pasien.daftarPoli');
});

// Route logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


