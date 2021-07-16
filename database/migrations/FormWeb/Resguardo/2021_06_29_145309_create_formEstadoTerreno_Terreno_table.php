<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormEstadoTerrenoTerrenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formEstadoTerreno_Terreno', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('terreno_id');
            $table->unsignedBigInteger('estadoterreno_id');

            $table->foreign('terreno_id')->references('id')->on('formTerreno');
            $table->foreign('estadoterreno_id')->references('id')->on('formEstadoTerreno');

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
        Schema::dropIfExists('formEstadoTerreno_Terreno');
    }
}
