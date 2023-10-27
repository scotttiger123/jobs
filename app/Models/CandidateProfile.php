<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'headline',
        'phone',
        'email',
        'city',
        'country',
        'address',
        'profile_image',
        'postal_code',
        'summary',
    ];

}
