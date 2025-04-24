<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_user_company extends Model
{
    use HasFactory;

    protected $table = 'roles_user_company';

    public function companyUser()
    {
        return $this->belongsTo(company_user::class);
    }

    public function rolesCompany()
    {
        return $this->belongsTo(roles_companies::class);
    }
}
