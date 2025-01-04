<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Atmosphere extends Model
{
    protected $table = 'atmospheres';

    protected $fillable = [
        'humidity',
        'pressure',
        'visibility',
        'sea_level',
        'grnd_level',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
