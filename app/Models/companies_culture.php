<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies_culture extends Model
{
    use HasFactory;

    protected $fillable = ['culture_name', 'svg'];

    public function companies()
    {
        return $this->belongsToMany(companies::class, 'pivot_companies_cultures');
    }
}
