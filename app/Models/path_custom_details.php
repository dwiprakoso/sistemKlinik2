<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_custom_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_id',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    // Relasi dengan path
    public function path()
    {
        return $this->belongsTo(paths::class, 'path_id');
    }
}