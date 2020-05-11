<?php

use App\Brands;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brands::create(['name'=>'Toyota']);
        Brands::create(['name'=>'Nissan']);
        Brands::create(['name'=>'Mazda']);
        Brands::create(['name'=>'Honda']);
        Brands::create(['name'=>'Kia']);
    }
}
