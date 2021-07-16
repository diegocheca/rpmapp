<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEstadoTerrenoMinaTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formEstadoTerreno_MinaTemporal', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('estadoterreno_id');
            $table->unsignedBigInteger('minatemporal_id');

             $table->foreign('estadoterreno_id')->references('id')->on('formEstadoTerreno');
             $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');
            

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
        Schema::dropIfExists('formEstadoTerreno_MinaTemporal');
    }
}
