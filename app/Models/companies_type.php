<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies_type extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function companies()
    {
        return $this->belongsToMany(companies::class, 'pivot_companies_types');
    }
}
