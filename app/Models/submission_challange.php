<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submission_challange extends Model
{
    use HasFactory;

    protected $fillable = ['path_challange_id', 'candidate_id', 'berkas', 'keterangan_tambahan', 'status'];

    public function pathChallange()
    {
        return $this->belongsTo(path_challange::class);
    }

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }
}
