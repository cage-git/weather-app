<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [ 'country', 'city', 'latitude', 'longitude', 'sunrise', 'sunset' ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
