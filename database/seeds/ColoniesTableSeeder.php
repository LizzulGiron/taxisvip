<?php

use App\Colonies;
use Illuminate\Database\Seeder;

class ColoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colonies::create(['name'=>'Barrio Morazán','initial_hour'=>'06:00:00','final_hour'=>'23:00:00','zone_id'=>'1']);
        Colonies::create(['name'=>'Barrio El Chile','initial_hour'=>'06:00:00','final_hour'=>'23:00:00','zone_id'=>'1']);
        Colonies::create(['name'=>'El Prado','initial_hour'=>'06:00:00','final_hour'=>'20:00:00','zone_id'=>'1']);
        Colonies::create(['name'=>'El Bosque','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'1']);
        Colonies::create(['name'=>'Buenos Aires','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'1']);
        Colonies::create(['name'=>'Cerro Grande','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'2']);
        Colonies::create(['name'=>'Carrizal','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'2']);
        Colonies::create(['name'=>'Lomas del Norte','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'2']);
        Colonies::create(['name'=>'Torocagua','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'2']);
        Colonies::create(['name'=>'Pedregalito','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'2']);
        Colonies::create(['name'=>'Loarque','initial_hour'=>'06:00:00','final_hour'=>'18:00:00','zone_id'=>'3']);
        Colonies::create(['name'=>'Las Hadas','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'3']);
        Colonies::create(['name'=>'Los Hidalgos','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'3']);
        Colonies::create(['name'=>'La Cañada','initial_hour'=>'06:00:00','final_hour'=>'19:00:00','zone_id'=>'3']);
        Colonies::create(['name'=>'La Kennedy','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'3']);
        Colonies::create(['name'=>'Florencia Sur','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'4']);
        Colonies::create(['name'=>'Suyapa','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'4']);
        Colonies::create(['name'=>'La Era','initial_hour'=>'06:00:00','final_hour'=>'19:00:00','zone_id'=>'4']);
        Colonies::create(['name'=>'La San Miguel','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'4']);
        Colonies::create(['name'=>'Lomas del Guijarro','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'4']);
        Colonies::create(['name'=>'Centro Ámerica','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'5']);
        Colonies::create(['name'=>'Quezada','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'5']);
        Colonies::create(['name'=>'Flor del Campo','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'5']);
        Colonies::create(['name'=>'Los Laureles','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'5']);
        Colonies::create(['name'=>'San Francisco','initial_hour'=>'06:00:00','final_hour'=>'21:00:00','zone_id'=>'5']);
    }
}
