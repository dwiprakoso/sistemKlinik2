<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submission_pemberkasan extends Model
{
    use HasFactory;

    protected $fillable = ['path_pemberkasan_id', 'candidate_id', 'berkas', 'keterangan_tambahan', 'status'];

    public function pathPemberkasan()
    {
        return $this->belongsTo(path_pemberkasan::class);
    }

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }
}
