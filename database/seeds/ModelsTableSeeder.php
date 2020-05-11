<?php

use App\Models;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Models::create(['name'=>'Toyota Corolla','brand_id'=>'1']);
        Models::create(['name'=>'Toyota Rav4','brand_id'=>'1']);
        Models::create(['name'=>'Toyota Yaris','brand_id'=>'1']);
        Models::create(['name'=>'Nissan Micra','brand_id'=>'2']);
        Models::create(['name'=>'Nissan Leaf','brand_id'=>'2']);
        Models::create(['name'=>'Nissan Versa','brand_id'=>'2']);
        Models::create(['name'=>'Mazda3','brand_id'=>'3']);
        Models::create(['name'=>'Mazda5','brand_id'=>'3']);
        Models::create(['name'=>'Mazda6','brand_id'=>'3']);
        Models::create(['name'=>'Honda Civic','brand_id'=>'4']);
        Models::create(['name'=>'Honda Accord','brand_id'=>'4']);
        Models::create(['name'=>'Honda Fit','brand_id'=>'4']);
        Models::create(['name'=>'Kia Rio','brand_id'=>'5']);
        Models::create(['name'=>'Kia Picanto','brand_id'=>'5']);
    }
}
