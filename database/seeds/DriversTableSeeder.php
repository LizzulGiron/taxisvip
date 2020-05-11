<?php

use App\Drivers;
use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drivers::create(['zone_id'=>'1','vehicle_id'=>'1','person_id'=>'1','state_conductor'=>'A','payment'=>'1','percentage'=>'0.15','daily_mileage'=>'0']);
        Drivers::create(['zone_id'=>'2','vehicle_id'=>'2','person_id'=>'2','state_conductor'=>'A','payment'=>'2','percentage'=>'0.15','daily_mileage'=>'0']);
        Drivers::create(['zone_id'=>'3','vehicle_id'=>'3','person_id'=>'3','state_conductor'=>'A','payment'=>'1','percentage'=>'0.15','daily_mileage'=>'10']);
        Drivers::create(['zone_id'=>'4','vehicle_id'=>'4','person_id'=>'4','state_conductor'=>'A','payment'=>'3','percentage'=>'0.15','daily_mileage'=>'0']);
        Drivers::create(['zone_id'=>'5','vehicle_id'=>'5','person_id'=>'5','state_conductor'=>'A','payment'=>'3','percentage'=>'0.15','daily_mileage'=>'7']);
    }
}
