<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'jobTitle',
        'jobDescription',
        'skillsRequired',
        'careerLevel',
        'numPositions',
        'jobLocation',
        'min_salery',
        'max_salery',
        'salaryVisibility',
        'genderPreference',
        'apply_by_date',
        'qualification',
        'specificDegreeTitle',
        'minExperience',
        'maxExperience',
        'experienceInfo',
        'minAge',
        'maxAge',
    ];
}
