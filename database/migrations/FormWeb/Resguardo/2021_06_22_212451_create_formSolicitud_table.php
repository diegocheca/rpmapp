<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateformSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formSolicitud', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nroexpediente',100);
            $table->unsignedInteger('id_terreno')->nullable(); //id tabla terreno
            $table->string('plazo_solicitado',50)->nullable();
            $table->string('programa_trabajo',50)->nullable();
            $table->string('periodo_trabajo',50)->nullable();
            $table->unsignedInteger('tiposolicitud_id')->nullable(); //id tipo solicitudes
            $table->integer('cant_UM_otorgada')->nullable();
            $table->unsignedInteger('id_mina')->nullable(); //id de mina
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
        Schema::dropIfExists('formSolicitud');
    }
}
