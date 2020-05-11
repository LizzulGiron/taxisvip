<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    protected $fillable = ['brand_id', 'model_id', 'year', 'register','color'];
}
