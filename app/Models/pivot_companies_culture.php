<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivot_companies_culture extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'culture_id'];

    public function company()
    {
        return $this->belongsTo(companies::class);
    }

    public function culture()
    {
        return $this->belongsTo(companies_culture::class);
    }
}
