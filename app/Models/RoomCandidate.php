<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCandidate extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function candidate()
    {
        return $this->belongsTo(candidates::class, 'candidates_id');
    }

    public function rooms()
    {
        return $this->belongsTo(rooms::class, 'rooms_id');
    }
}
