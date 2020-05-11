<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonies extends Model
{
    protected $fillable = ['name', 'initial_hour', 'final_hour', 'zone_id'];
}
