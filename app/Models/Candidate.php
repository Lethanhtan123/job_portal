<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cv',
        'image',
        'full_name',
        'title',
        'experience_id',
        'website',
        'birth_date',
        'profession_id',
        'marital_status',
        'status',
        'bio',
        'gender'
    ];

    function skills() : HasMany {
        return $this->hasMany(CandidateSkill::class,'candidate_id','id');
    }

    function languages(): HasMany
    {
        return $this->hasMany(CandidateLanguage::class, 'candidate_id', 'id');
    }
}
