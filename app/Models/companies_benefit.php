<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies_benefit extends Model
{
    use HasFactory;

    protected $fillable = ['benefit', 'svg'];

    public function companies()
    {
        return $this->belongsToMany(companies::class, 'pivot_companies_benefits');
    }
}
