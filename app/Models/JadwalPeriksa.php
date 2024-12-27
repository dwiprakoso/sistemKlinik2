<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $fillable = [
        'id_dokter', 'hari', 'jam_mulai', 'jam_selesai'
    ];

    // Menambahkan status sebagai atribut yang dihitung
    protected $appends = ['status'];


    // Relasi ke dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}

