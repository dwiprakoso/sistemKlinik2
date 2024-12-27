<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    public function jadwals()
    {
        return $this->hasMany(JadwalPeriksa::class, 'id_poli');
    }
}
