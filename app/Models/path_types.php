<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class path_types extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    public function paths()
    {
        return $this->hasMany(paths::class);
    }
}
