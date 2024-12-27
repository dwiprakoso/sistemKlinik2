<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    
    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    // Relasi ke tabel pasiens
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
