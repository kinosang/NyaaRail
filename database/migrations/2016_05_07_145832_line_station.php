<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class LineStation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line_station', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('line_id')->unsigned();
            $table->integer('station_id')->unsigned();
            $table->integer('station_no')->unsigned()->index();
            $table->timestamps();

            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('line_id')->references('id')->on('lines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line_station');
    }
}
