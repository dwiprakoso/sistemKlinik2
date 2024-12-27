<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    
    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
