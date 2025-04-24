<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class traces_of_experience extends Model
{
    use HasFactory;

    protected $fillable = ['tittle', 'candidate_id', 'position', 'description', 'photo_path', 'year_in', 'year_out'];

    // Model EducationalHistory
    public function candidate()
    {
        return $this->belongsTo(candidates::class, 'candidate_id');
    }
}
