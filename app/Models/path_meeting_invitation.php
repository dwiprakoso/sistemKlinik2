<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_meeting_invitation extends Model
{
    use HasFactory;

    protected $fillable = ['path_id', 'deskripsi', 'lokasi_link_meet', 'rentang_waktu', 'lampiran'];

    public function path()
    {
        return $this->belongsTo(paths::class);
    }

    public function submissionMeetingInvitation()
    {
        return $this->hasMany(submission_meeting_invitation::class);
    }
}
