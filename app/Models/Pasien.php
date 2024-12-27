<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    use Notifiable;

    protected $guard = 'pasien';
    protected $guarded = ['no_rm'];

    protected static function booted()
    {
        static::creating(function ($pasien) {
            $currentDate = now()->format('Ym');  // Format tahun dan bulan
            $latestNoRm = self::where('no_rm', 'like', $currentDate . '%')->latest()->first();

            // Menentukan ID berdasarkan yang terakhir, atau mulai dari 1 jika belum ada
            $latestId = self::max('id') + 1; // Ambil ID terbaru

            // Menyusun no_rm dengan format 'tahunbulan-id'
            $pasien->no_rm = $currentDate . '-' . str_pad($latestId, STR_PAD_LEFT);
        });

        static::saving(function ($pasien) {
            // Jika kolom password belum di-set, maka generate berdasarkan kolom username
            if (!$pasien->password) {
                $pasien->password = Hash::make($pasien->alamat); // mengenkripsi username sebagai password
            }
        });
    }
    public function pasiens()
    {
        return $this->hasMany(DaftarPoli::class);
    }
}
