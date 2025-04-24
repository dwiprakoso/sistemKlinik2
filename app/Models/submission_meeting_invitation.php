<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submission_meeting_invitation extends Model
{
    use HasFactory;

    protected $fillable = ['path_meeting_invitation_id', 'candidate_id', 'konfirmasi_kehadiran', 'keterangan_tambahan', 'status'];

    public function pathMeetingInvitation()
    {
        return $this->belongsTo(path_meeting_invitation::class);
    }

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }
}
