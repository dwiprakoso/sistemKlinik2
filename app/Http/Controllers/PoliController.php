<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.poli');
    }
    public function admin()
    {
        $polis = Poli::paginate(5);
        return view('admin.poli', [
            'polis' => $polis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.createPoli');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        // Poli diambil dari model
        Poli::create([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan

        ]);

        return redirect('/admin/poli')->with('status', 'Poli created successfully.');
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
    public function edit(Poli $poli)
    {
        return view('admin.form.editPoli', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poli $poli)
    {
        $request->validate([
            'nama_poli' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $poli->update([
            'nama_poli' => $request->nama_poli,
            'keterangan' => $request->keterangan

        ]);

        return redirect('/admin/poli')->with('status', 'Poli Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect('/admin/poli')->with('status', 'Poli deleted successfully.');
    }
}
