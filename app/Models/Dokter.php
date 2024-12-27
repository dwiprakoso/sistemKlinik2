<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dokter extends Authenticatable
{
    use Notifiable;

    protected $guard = 'dokter';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'id_poli',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected static function booted()
    {
        static::saving(function ($dokter) {
            // Cek apakah alamat berubah, jika iya, hash alamat menjadi password
            if ($dokter->isDirty('alamat')) {
                $dokter->password = Hash::make($dokter->alamat);
            }
        });
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
    public function jadwals()
    {
        return $this->hasMany(JadwalPeriksa::class);
    }
}
