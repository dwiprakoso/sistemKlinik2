<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectionStep extends Model
{
    protected $fillable = [
        'room_id', 
        'step_type', 
        'step_name', 
        'step_description', 
        'step_location', 
        'step_start_date', 
        'step_end_date', 
        'step_attachment_path',
        'step_order'
    ];

    public function room()
    {
        return $this->belongsTo(rooms::class);
    }
}