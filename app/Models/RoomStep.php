<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStep extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'room_id',
        'step_number',
        'step_type',
        'step_name',
        'step_description',
        'location_link',
        'start_date',
        'end_date',
        'attachment_path'
    ];
}