<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates_language extends Model
{
    use HasFactory;

    protected $fillable = ['languange_name', 'percentage'];

    public function candidates()
    {
        return $this->belongsToMany(candidates::class, 'pivot_candidate_languages');
    }
}
