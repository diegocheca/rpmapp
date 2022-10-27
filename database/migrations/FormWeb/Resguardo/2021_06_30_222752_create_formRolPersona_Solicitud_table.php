<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormRolPersonaSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formRolPersona_Solicitud', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('rolpersona_id');

            //$table->foreign('solicitud_id')->references('id')->on('formSolicitud');
            //$table->foreign('rolpersona_id')->references('id')->on('formRolPersona');

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
        Schema::dropIfExists('formRolPersona_Solicitud');
    }
}
