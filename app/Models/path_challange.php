<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_challange extends Model
{
    use HasFactory;

    protected $fillable = ['path_id', 'deskripsi', 'link_lampiran_challange', 'rentang_waktu', 'lampiran'];

    public function path()
    {
        return $this->belongsTo(paths::class);
    }

    public function submissionChallange()
    {
        return $this->hasMany(submission_challange::class);
    }
}
