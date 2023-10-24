<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateCertification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'certificate_description',
        'certificate_start_date',
        'certificate_end_date',
        'certificate_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
