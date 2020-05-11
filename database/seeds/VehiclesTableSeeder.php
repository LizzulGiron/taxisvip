<?php

use App\Vehicles;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicles::create(['brand_id'=>'1','model_id'=>'1','year'=>'2006','register'=>'PBM4229','color'=>'Rojo']);
        Vehicles::create(['brand_id'=>'1','model_id'=>'2','year'=>'2007','register'=>'PBM4029','color'=>'Azul']);
        Vehicles::create(['brand_id'=>'2','model_id'=>'6','year'=>'2007','register'=>'PBM4929','color'=>'Negro']);
        Vehicles::create(['brand_id'=>'3','model_id'=>'9','year'=>'2006','register'=>'PBM4909','color'=>'Gris']);
        Vehicles::create(['brand_id'=>'1','model_id'=>'3','year'=>'2009','register'=>'PBM0009','color'=>'Gris']);

    }
}
