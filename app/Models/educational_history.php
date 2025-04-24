<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educational_history extends Model
{
    use HasFactory;

    protected $fillable = ['institution_name', 'candidate_id', 'major', 'year_in', 'year_out'];


    // Model EducationalHistory
    public function candidate()
    {
        return $this->belongsTo(candidates::class, 'candidate_id');
    }
}
