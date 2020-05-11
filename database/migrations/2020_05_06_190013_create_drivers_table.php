<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('zone_id')->unsigned(); 
            $table->foreign('zone_id')->references('id')->on('zones');
            $table->bigInteger('vehicle_id')->unsigned(); 
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->bigInteger('person_id')->unsigned(); 
            $table->foreign('person_id')->references('id')->on('persons');
            $table->string('state_conductor',1);
            $table->string('payment',20);
            $table->double('percentage', 3, 2);
            $table->float('daily_mileage');
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
        Schema::dropIfExists('drivers');
    }
}