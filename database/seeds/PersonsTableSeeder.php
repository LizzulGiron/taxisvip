<?php

use App\Persons;
use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persons::create(['first_name'=>'Bruno','last_name'=>'Ramos','identity'=>'0801200540889','phone'=>'98631000','role'=>'D']);
        Persons::create(['first_name'=>'Paul','last_name'=>'Silva','identity'=>'0801200540336','phone'=>'93631000','role'=>'D']);
        Persons::create(['first_name'=>'Alexander','last_name'=>'García','identity'=>'0714240540889','phone'=>'93631800','role'=>'D']);
        Persons::create(['first_name'=>'Cesar','last_name'=>'García','identity'=>'0714240540000','phone'=>'97801000','role'=>'D']);
        Persons::create(['first_name'=>'Carlos','last_name'=>'Hernadez','identity'=>'0614240540889','phone'=>'33121000','role'=>'D']);
        Persons::create(['first_name'=>'Maria','last_name'=>'Hernadez','identity'=>'0714196940111','phone'=>'98784021','role'=>'C']);
        Persons::create(['first_name'=>'Angelica','last_name'=>'Ramos','identity'=>'0801200011479','phone'=>'99784021','role'=>'C']);
        Persons::create(['first_name'=>'Jennifer','last_name'=>'Acosta','identity'=>'0801199620779','phone'=>'98780021','role'=>'C']);
    }
}
