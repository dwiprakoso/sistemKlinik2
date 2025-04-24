<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    use HasFactory;

    protected $fillable = ['company_name', 'logo', 'banner', 'company_address', 'company_type', 'company_website', 'company_motto', 'company_description'];

    public function contact()
    {
        return $this->hasOne(companies_contact::class, 'company_id');
    }

    public function cultures()
    {
        return $this->belongsToMany(companies_culture::class, 'pivot_companies_cultures');
    }

    public function types()
    {
        return $this->belongsToMany(companies_type::class, 'pivot_companies_types');
    }

    public function benefits()
    {
        return $this->belongsToMany(companies_benefit::class, 'pivot_companies_benefits', 'company_id', 'benefit_id'); // Sesuaikan kolom kunci asing yang digunakan
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id');
    }

    public function rooms()
    {
        return $this->hasMany(rooms::class);
    }
}
