<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public function driver(){
    	return $this->hasOne('App\Drivers','person_id');
    }

    protected $fillable = ['url', 'driver_id', 'price', 'mileage','state','person_id','starting_place','arrival_place','user_id'];
}
