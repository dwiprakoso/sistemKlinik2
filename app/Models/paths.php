<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paths extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'path_name', 'path_type_id'];

    public function room()
    {
        return $this->belongsTo(rooms::class);
    }

    public function pathType()
    {
        return $this->belongsTo(path_types::class);
    }

    public function pathPemberkasan()
    {
        return $this->hasOne(path_pemberkasan::class, 'path_id', 'id');
    }

    public function pathMeetingInvitation()
    {
        return $this->hasOne(path_meeting_invitation::class, 'path_id', 'id');
    }

    public function pathChallange()
    {
        return $this->hasOne(path_challange::class, 'path_id', 'id');
    }

    public function pathDetails()
    {
        return $this->hasMany(path_details::class);
    }

    public function pathCandidates()
    {
        return $this->hasMany(path_candidate::class);
    }
}
