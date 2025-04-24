<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'full_name', 'photo_path', 'bio', 'address', 'headline', 'skills', 'experience'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Candidates_skill::class, 'pivot_candidate_skills');
    }

    public function languages()
    {
        return $this->belongsToMany(Candidates_language::class, 'pivot_candidate_languages');
    }


    public function experiences()
    {
        return $this->hasMany(traces_of_experience::class, 'candidate_id');
    }

    // Relasi dengan model CandidateContact
    public function contact()
    {
        return $this->hasOne(candidate_contact::class, 'candidate_id');
    }


    public function educationalHistories()
    {
        return $this->hasMany(educational_history::class, 'candidate_id');
    }

    public function rooms()
    {
        return $this->belongsToMany(rooms::class, 'room_candidates')->withPivot('status');
    }
}
