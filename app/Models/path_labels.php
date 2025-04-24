<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_labels extends Model
{
    use HasFactory;

    protected $fillable = ['path_type_id', 'label_name', 'input_type'];

    public function pathType()
    {
        return $this->belongsTo(path_types::class);
    }

    public function pathDetails()
    {
        return $this->hasMany(path_details::class);
    }
}
