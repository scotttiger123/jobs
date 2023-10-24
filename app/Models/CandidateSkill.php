<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'skill_name',
        'year_of_experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
