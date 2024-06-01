<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['id','city_id','created_at','updated_at'];

     /** City Relation */
     function City() : BelongsTo {
        return $this->belongsTo(City::class);
    }
}
