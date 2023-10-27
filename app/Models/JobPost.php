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
        'min_salary',
        'max_salary',
        'job_type',
        'job_shift',
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
        'jobType',
        'company',
        'created_ by'
    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }
}
