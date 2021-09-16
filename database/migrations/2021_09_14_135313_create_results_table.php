<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id('resultId');
            $table->integer('raceId')->default(0);
            $table->foreign('raceId')->references('raceId')->on('races');
            $table->integer('driverId')->default(0);
            $table->foreign('driverId')->references('driverId')->on('drivers');
            $table->integer('constructorId')->default(0);
            $table->foreign('constructorId')->references('constructorId')->on('constructors');
            $table->integer('number')->nullable();
            $table->integer('grid')->default(0);
            $table->integer('position')->nullable();
            $table->string('positionText');
            $table->integer('positionOrder')->default(0);
            $table->float('points')->default(0);
            $table->integer('laps')->default(0);
            $table->string('time')->nullable();
            $table->integer('milliseconds')->nullable();
            $table->integer('fastestLap')->nullable();
            $table->integer('rank')->nullable()->default(0);
            $table->string('fastestLapTime')->nullable();
            $table->string('fastestLapSpeed')->nullable();
            $table->string("statusId")->default(0);

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
        Schema::dropIfExists('results');
    }
}
