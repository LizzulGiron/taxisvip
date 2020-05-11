<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
   	protected $fillable = ['zone_id', 'vehicle_id', 'person_id', 'state_conductor','payment','percentage','daily_mileage'];

   	
}
