<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'banner',
        'name',
        'bio',
        'website',
        'establishment_date',
        'email',
        'phone',
        'country',
        'address',
        'map_link'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    function companyCountry() : BelongsTo {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
    function companyState() : BelongsTo {
        return $this->belongsTo(State::class, 'state', 'id');
    }
    function companyCity() : BelongsTo {
        return $this->belongsTo(City::class, 'city', 'id');
    }
    function industryType() : BelongsTo {
        return $this->belongsTo(IndustryType::class, 'industry_type_id', 'id');
    }
}

