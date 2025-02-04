<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Pasien;
use App\Models\DaftarPoli;
use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasien.dashboard');
        
    }
    public function admin()
    {
        $pasiens = Pasien::paginate(5);
        return view('admin.pasien', [
            'pasiens' => $pasiens
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.createPasien');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:1000',
            'no_hp' => 'required|string|max:1000',
        ]);

        // Pasien diambil dari model
        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/admin/pasien')->with('status', 'Pasien created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function daftarPoli(Request $request)
    {
        $user = Auth::guard('pasien')->user();
        $polis = Poli::all();

        if ($request->ajax()) {
            $id_poli = $request->input('id_poli');
            $jadwalDokters = [];

            if ($id_poli) {
                $jadwalDokters = JadwalPeriksa::with('dokter.poli')
                    ->whereHas('dokter', function ($query) use ($id_poli) {
                        $query->where('id_poli', $id_poli);
                    })
                    ->get();

                // Debugging - pastikan data yang diterima
                dd($jadwalDokters); // Periksa apakah jadwal dokter sudah ada
            }

            return response()->json($jadwalDokters);
        }

        return view('pasien.daftarPoli', compact('user', 'polis'));
    }




    public function show(string $id)
    {
        //
    }

    public function riwayatPasien()
    {
        return view('dokter.riwayatPasien');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        
        return view('admin.form.editPasien', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_ktp' => 'required|string|max:1000',
            'no_hp' => 'required|string|max:1000',
        ]);

        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp
        ]);

        return redirect('/admin/pasien')->with('status', 'Pasien Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect('/admin/pasien')->with('status', 'Pasien deleted successfully.');
    }
}
