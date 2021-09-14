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
            $table->integer('raceId');
            $table->integer('driverId');
            $table->integer('constructorId');
            $table->integer('number')->nullable();
            $table->integer('grid');
            $table->integer('position')->nullable();
            $table->string('positionText');
            $table->integer('positionOrder');
            $table->float('points');
            $table->integer('laps');
            $table->string('time')->nullable();
            $table->integer('milliseconds')->nullable();
            $table->integer('fastesLap')->nullable();
            $table->integer('rank')->nullable();
            $table->string('fastesLapTime')->nullable();
            $table->string('fastesLapSpeed')->nullable();

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
