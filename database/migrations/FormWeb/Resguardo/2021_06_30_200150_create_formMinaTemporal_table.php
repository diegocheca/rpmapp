<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormMinaTemporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formMinaTemporal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_mina');
            $table->string('descubrimient_directo');
            $table->string('muestra');//en la manifestacion de descubrimiento acompaña con muestra
            $table->string('provincia_mina');
            $table->string('departamento_mina');
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
        Schema::dropIfExists('formMinaTemporal'); //form_mina_temporals
    }
}
