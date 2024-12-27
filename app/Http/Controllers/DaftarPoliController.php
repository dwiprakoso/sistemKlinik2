<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;

class DaftarPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokter.daftarPasien');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data poli
        $polis = Poli::all();  // Pastikan model Poli sudah ada dan memiliki data yang tepat

        // Ambil jadwal yang aktif
        $jadwals = JadwalPeriksa::where('status', 'Aktif')->get(); // Ambil jadwal yang aktif

        return view('daftar_poli.create', compact('polis', 'jadwals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_poli' => 'required|exists:polis,id', // Pastikan poli ada
            'id_jadwal' => 'required|exists:jadwal_periksas,id', // Pastikan jadwal ada
            'keluhan' => 'required|string',
        ]);

        // Menyusun nomor antrian
        $noAntrian = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count() + 1;

        // Menyimpan pendaftaran poli
        DaftarPoli::create([
            'id_pasien' => Auth::id(),  // Ambil id pasien dari Auth
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        // Redirect ke halaman pendaftaran dengan pesan
        return redirect()->route('daftar_poli.index')->with('status', 'Pendaftaran poli berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarPoli $daftarPoli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarPoli $daftarPoli)
    {
        //
    }
}
