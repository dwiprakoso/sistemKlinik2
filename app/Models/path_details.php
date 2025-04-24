<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_details extends Model
{
    use HasFactory;

    protected $fillable = ['path_id', 'label_id', 'value'];

    public function path()
    {
        return $this->belongsTo(paths::class);
    }

    public function label()
    {
        return $this->belongsTo(path_labels::class);
    }
}
