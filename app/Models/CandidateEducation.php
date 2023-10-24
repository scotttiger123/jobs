<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    use HasFactory;
    protected $table = 'candidate_educations'; 
    protected $fillable = [
        'edu_level_of_education',
        'edu_field_of_study',
        'edu_school',
        'edu_country',
        'edu_city',
        'edu_start_date',
        'edu_end_date',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
