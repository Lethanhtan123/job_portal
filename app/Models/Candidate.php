<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory, Sluggable;

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
        'gender',
        'country',
        'city',
        'district',
        'phone_one',
        'phone_two',
        'email',
        'address'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }

    function skills() : HasMany {
        return $this->hasMany(CandidateSkill::class,'candidate_id','id');
    }

    function languages(): HasMany
    {
        return $this->hasMany(CandidateLanguage::class, 'candidate_id', 'id');
    }

    function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }

    function candidateExperience(): HasMany
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_id', 'id')->orderBy('id','DESC');
    }

    function candidateEducation(): HasMany
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_id', 'id')->orderBy('id', 'DESC');
    }

    function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    function candidateCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    function candidateCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    function candidateDistrict(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district', 'id');
    }

    function industryType(): BelongsTo
    {
        return $this->belongsTo(IndustryType::class, 'industry_type_id', 'id');
    }
}
