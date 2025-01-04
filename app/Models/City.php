<?php

namespace App\Models;

use App\Models\Wind;
use App\Models\Location;
use App\Models\Atmosphere;
use App\Models\Temperature;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name','uid'
    ];

    // public function locations()
    // {
    //     return $this->hasOne(Location::class);
    // }

    public function temperatures()
    {
        return $this->hasOne(Temperature::class);
    }

    public function atmospheres()
    {
        return $this->hasOne(Atmosphere::class);
    }

    // public function winds()
    // {
    //     return $this->hasOne(Wind::class);
    // }

    // app/Models/City.php
public function locations()
{
    return $this->hasOne(Location::class);
}

public function winds()
{
    return $this->hasOne(Wind::class);
}
}
