<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateWorkExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'job_title',
        'start_date',
        'end_date',
        'description',
        'user_id', 
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
