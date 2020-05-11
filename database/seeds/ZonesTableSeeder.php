<?php

use App\Zones;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zones::create(['name'=>'Zona Centro']);
        Zones::create(['name'=>'Zona Norte']);
        Zones::create(['name'=>'Zona Sur']);
        Zones::create(['name'=>'Zona Este']);
        Zones::create(['name'=>'Zona Oeste']);
    }
}
