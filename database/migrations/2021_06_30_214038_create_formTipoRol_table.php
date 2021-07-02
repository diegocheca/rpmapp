<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTipoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formTipoRol', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rol');
        // Schema::create('formEstadoTerreno_Terreno', function (Blueprint $table) {
        //     $table->integer('id_terreno');
        //     $table->integer('id_estadoTerreno');
        //     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formTipoRol');
        // Schema::dropIfExists('formEstadoTerreno_Terreno');
    }
}
