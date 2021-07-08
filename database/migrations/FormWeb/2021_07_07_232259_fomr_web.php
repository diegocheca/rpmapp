<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FomrWeb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('formRazonSocial', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 200);           
            $table->string('cuit', 13)->nullable(); 

            $table->timestamps();
        }); 

        Schema::create('formSolicitud', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nroexpediente', 100);
            $table->unsignedInteger('terreno_id')->nullable(); //id tabla terreno
            $table->string('plazo_solicitado', 50)->nullable();
            $table->string('programa_trabajo', 50)->nullable();
            $table->string('periodo_trabajo', 50)->nullable();
            $table->unsignedInteger('tiposolicitud_id')->nullable(); //id tipo solicitudes
            $table->integer('cant_UM_otorgada')->nullable();
            $table->unsignedInteger('mina_id')->nullable(); //id de mina
            $table->unsignedInteger('razonsocial_id')->nullable(); //id tabla terreno

            $table->foreign('terreno_id')->references('id')->on('formTerreno');
            $table->foreign('tiposolicitud_id')->references('id')->on('formTipoSolicitud');
            $table->foreign('mina_id')->references('id')->on('formMinaTemporal');
            $table->foreign('razonsocial_id')->references('id')->on('formRazonSocial');

            $table->timestamps();
        });

        Schema::create('formTipoSolicitud', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->default(null);
            
            $table->timestamps();
        });

        Schema::create('formTerreno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoria_mineral');
            $table->string('superficie');
            $table->string('provincia');
            $table->string('departamento');
            $table->string('localidad');
            
            $table->timestamps();
        });

        Schema::create('formEstadoTerreno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_estado');
            $table->timestamps();
        });

        Schema::create('formEstadoTerreno_Terreno', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('terreno_id');
            $table->unsignedBigInteger('estadoterreno_id');

            $table->foreign('terreno_id')->references('id')->on('formTerreno');
            $table->foreign('estadoterreno_id')->references('id')->on('formEstadoTerreno');

            $table->timestamps();
        });

        Schema::create('formMinaTemporal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_mina');
            $table->string('descubrimient_directo');
            $table->string('muestra'); //en la manifestacion de descubrimiento acompaña con muestra
            $table->string('provincia_mina');
            $table->string('departamento_mina');
            $table->timestamps();
        });

        Schema::create('formMinaTemporal_Mineral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado_mineral');

            $table->unsignedBigInteger('minatemporal_id');
            $table->unsignedBigInteger('mineral_id');

            $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');
            $table->foreign('mineral_id')->references('id')->on('mineral');

            $table->timestamps();
        });

        Schema::create('formEstadoTerreno_MinaTemporal', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('estadoterreno_id');
            $table->unsignedBigInteger('minatemporal_id');

            $table->foreign('estadoterreno_id')->references('id')->on('formEstadoTerreno');
            $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');


            $table->timestamps();
        });

        Schema::create('formTipoRol', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_rol');
        });

        Schema::create('formPersona', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dni', 10);            
            $table->string('nombre', 50)->nullable();
            $table->string('sexo', 50)->nullable();
            $table->string('apellido', 50)->nullable();
            $table->string('tipo_doc', 50)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('nacionalidad', 50)->nullable();
            $table->string('profesion', 50)->nullable();
            $table->string('estado_civil', 50)->nullable();
            $table->string('domi_legal', 50)->nullable();
            $table->string('prov_domi_legal', 50)->nullable();
            $table->string('dpto_domi_legal', 50)->nullable();
            $table->string('domi_real', 50)->nullable();
            $table->string('prov_domi_real', 50)->nullable();
            $table->string('dpto_domi_real', 50)->nullable(); 

            $table->timestamps();
        });

        Schema::create('formRolPersona', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('tiporol_id');

            $table->foreign('persona_id')->references('id')->on('persona');  
            $table->foreign('tiporol_id')->references('id')->on('fromTipoRol');
            $table->timestamps();
        });

        Schema::create('formRolPersona_Solicitud', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('rolpersona_id');

            $table->foreign('solicitud_id')->references('id')->on('formSolicitud');
            $table->foreign('rolpersona_id')->references('id')->on('formRolPersona');

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
        Schema::dropIfExists('formTipoSolicitud');
        Schema::dropIfExists('formTerreno');
        Schema::dropIfExists('formEstadoTerreno');
        Schema::dropIfExists('formEstadoTerreno_Terreno');
        Schema::dropIfExists('formMinaTemporal'); //form_mina_temporals
        Schema::dropIfExists('formMinaTemporal_Mineral');
        Schema::dropIfExists('formEstadoTerreno_MinaTemporal');
        Schema::dropIfExists('formTipoRol');
        Schema::dropIfExists('formPersona');
        Schema::dropIfExists('formRolPersona');
        Schema::dropIfExists('formRolPersona_Solicitud');
    }
}
