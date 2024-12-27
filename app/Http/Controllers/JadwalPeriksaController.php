<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;

class JadwalPeriksaController extends Controller
{
     // Menampilkan jadwal dokter
     public function index()
     {
         $jadwals = JadwalPeriksa::where('id_dokter', Auth::id())->get();
         return view('dokter.jadwalPeriksa', compact('jadwals'));
        //  
     }
     public function create()
    {
        return view('dokter.form.createJadwal');
    }
    // Menyimpan jadwal baru ke dalam database
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
    ]);

    // Mengambil id_dokter dari sesi auth
    $validated['id_dokter'] = Auth::user()->id;

    // Membuat objek JadwalPeriksa baru dan menetapkan status
    $jadwal = new JadwalPeriksa($validated);

    // Menetapkan status default menjadi Non-Aktif
    $jadwal->status = 'Non-Aktif';

    // Menyimpan jadwal baru
    $jadwal->save();

    // Redirect ke halaman jadwal dengan pesan
    return redirect()->route('dokter.jadwal')->with('status', 'Jadwal berhasil dibuat!');
}

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        return view('dokter.form.editJadwal', compact('jadwal'));
    }


    public function update(Request $request, $id)
    {
        // Validasi untuk update status
        $request->validate([
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        // Temukan jadwal berdasarkan ID
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Ambil status dari request
        $status = $request->status;

        // Jika status diubah menjadi 'Aktif', nonaktifkan semua jadwal lainnya untuk dokter ini
        if ($status == 'Aktif') {
            // Nonaktifkan semua jadwal yang lainnya untuk dokter ini (kecuali jadwal yang sedang diubah)
            JadwalPeriksa::where('id_dokter', $jadwal->id_dokter)
                ->where('id', '!=', $jadwal->id) // Pastikan jadwal yang sedang diubah tidak terkena perubahan
                ->update(['status' => 'Non-Aktif']); // Update status jadi Non-Aktif
        }

        // Update status jadwal yang sedang diubah
        $jadwal->status = $status;

        // Update kolom lain yang terkait seperti hari, jam_mulai, jam_selesai
        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        // Redirect ke halaman jadwal dengan pesan
        return redirect()->route('dokter.jadwal')->with('status', 'Status jadwal berhasil diperbarui!');
    }







}
