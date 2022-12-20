<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
