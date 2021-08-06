<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRolPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formRolPersona', function (Blueprint $table) {
            $table->id();

           // $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('tiporol_id');

           //$table->foreign('persona_id')->references('id')->on('persona');        

            $table->foreign('tiporol_id')->references('id')->on('fromTipoRol');
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
        Schema::dropIfExists('formRolPersona');
    }
}
