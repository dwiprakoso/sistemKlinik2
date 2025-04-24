<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivot_companies_benefit extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'benefit_id'];

    public function company()
    {
        return $this->belongsTo(companies::class);
    }

    public function benefit()
    {
        return $this->belongsTo(companies_benefit::class);
    }
}
