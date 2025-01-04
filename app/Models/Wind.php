<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Wind extends Model
{
    protected $table = 'winds';

    protected $fillable = [ 'speed', 'deg', 'gust' ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
