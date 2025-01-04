<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $table = 'temperatures';

    protected $fillable = [ 'temp', 'feels_like', 'min_temp', 'max_temp', 'weather' ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
