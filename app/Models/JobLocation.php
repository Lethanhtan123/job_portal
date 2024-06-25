<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobLocation extends Model
{
    use HasFactory;

    function country() : BelongsTo {
        return $this->belongsTo(Country::class);
    }

    function city() : BelongsTo {
        return $this->belongsTo(City::class);
    }

    function district() : BelongsTo {
        return $this->belongsTo(District::class);
    }
}
