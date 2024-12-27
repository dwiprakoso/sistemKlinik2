<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'polis';
    protected $fillable = [
        'nama_poli',
        'keterangan'
    ];
    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }
}
