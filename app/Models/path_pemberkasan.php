<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_pemberkasan extends Model
{
    use HasFactory;

    protected $fillable = ['path_id', 'deskripsi', 'rentang_waktu', 'lampiran'];

    public function path()
    {
        return $this->belongsTo(paths::class);
    }

    public function submissionPemberkasan()
    {
        return $this->hasMany(submission_pemberkasan::class);
    }
}
