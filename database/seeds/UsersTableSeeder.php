<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'admin',
        	'last_name'=>'admin',
        	'phone'=>'98757293',
        	'identity'=>'0714199320654',
        	'email'=>'admin@gmail.com',
        	'password' => Hash::make('asd.4567')
        ]);
    }
}
