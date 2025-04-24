<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_companies extends Model
{
    use HasFactory;

    protected $table = 'roles_company';

    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_user_company', 'roles_company_id', 'company_user_id');
    }
}
