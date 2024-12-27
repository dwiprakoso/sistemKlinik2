<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dokter.dashboard');
        
    }
    public function admin()
    {
        $dokters = Dokter::paginate(5);
        return view('admin.dokter', [
            'dokters' => $dokters
        ]);
    }
    public function viewJadwal(){
        return view('dokter.jadwalPeriksa');
    }

    public function createJadwal()
    {
        return view('dokter.jadwalPeriksa');
    }
    /**
     * Show the form for creating a new resource.
     */

     public function editProfil()
     {
         // Ambil user yang login
         $user = Auth::guard('dokter')->user();
 
         return view('dokter.form.updateProfil', compact('user'));
     }
     public function updateProfil(Request $request)
    {
        $user = Auth::user();

        // Validasi data input
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        // Update data tanpa perlu mengatur password di sini
        $user->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('dokter.dashboard')->with('status', 'Profil berhasil diupdate');
    }

     public function create()
    {
        $polis = Poli::all();
        return view('admin.form.createDokter', compact('polis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->id_poli);
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|min:10',
            'id_poli' => 'required|exists:polis,id'
        ]);

        // Pasien diambil dari model
        Dokter::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli
            // dd('id_poli')
        ]);


        return redirect('/admin/dokter')->with('status', 'Do created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter)
    {

        $polis = Poli::all();

    // Pastikan relasi 'poli' ikut dimuat dalam data dokter
        $dokter->load('poli');

    // Kirim data pasien dan poli ke view
        return view('form.editDokter', compact('dokter', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'id_poli' => 'required|exists:polis,id'
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli

        ]);

        return redirect('/dokter')->with('status', 'Dokter Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect('/dokter')->with('status', 'Post deleted successfully.');
    }
}
