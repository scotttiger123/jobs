<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'apply_job_first_name',
        'apply_job_last_name',
        'apply_job_email',
        'apply_job_phone',
        'cv_saved',
        'cv_upload',
        
    ];

    public function JobPost()
    {
        return $this->belongsTo(JobPost::class, 'job_id', 'id');
    }
}
