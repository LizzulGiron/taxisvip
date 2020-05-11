<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
        $this->call(ColoniesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(PersonsTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        

    }
}

