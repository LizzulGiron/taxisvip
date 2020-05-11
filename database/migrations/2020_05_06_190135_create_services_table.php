<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url',1000);
            $table->bigInteger('driver_id')->unsigned(); 
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->double('price', 20, 5);
            $table->double('mileage', 20, 5);
            $table->string('state',1);
            $table->bigInteger('person_id')->unsigned(); 
            $table->foreign('person_id')->references('id')->on('persons');
            $table->bigInteger('starting_place')->unsigned(); 
            $table->foreign('starting_place')->references('id')->on('colonies');
            $table->bigInteger('arrival_place')->unsigned(); 
            $table->foreign('arrival_place')->references('id')->on('colonies');
            $table->bigInteger('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}