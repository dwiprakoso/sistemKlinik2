<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivot_candidate_languange extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'language_id'];

    public function candidate()
    {
        return $this->belongsTo(candidates::class);
    }

    public function language()
    {
        return $this->belongsTo(Candidates_language::class);
    }
}
