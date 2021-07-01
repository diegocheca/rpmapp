<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormMinaTemporalMineralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formMinaTemporal_Mineral', function (Blueprint $table) {
            $table->id();
            $table->string('estado_mineral');

            $table->unsignedBigInteger('minatemporal_id');
            $table->unsignedBigInteger('mineral_id');

            $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');
            $table->foreign('mineral_id')->references('id')->on('mineral');

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
        Schema::dropIfExists('formMinaTemporal_Mineral');
    }
}
