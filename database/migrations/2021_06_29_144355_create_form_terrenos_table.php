<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTerrenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formTerreno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria_mineral');
            $table->string('superficie');
            $table->string('provincia');
            $table->string('departamento');
            $table->string('localidad');
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
        Schema::dropIfExists('formTerreno');
    }
}
