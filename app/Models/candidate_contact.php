<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidate_contact extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'email', 'website', 'telephone', 'instagram', 'linkedin', 'facebook', 'whatsapp'];

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }
}
