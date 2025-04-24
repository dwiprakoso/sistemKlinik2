<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivot_candidate_skill extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'skill_id'];

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }

    public function skill()
    {
        return $this->belongsTo(Candidates_skill::class);
    }
}
