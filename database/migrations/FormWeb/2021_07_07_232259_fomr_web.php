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
        Schema::create('formSolicitud', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('tipo_solicitud')->nullable(); 
            $table->string('plazo_solicitado', 50)->nullable();
            $table->string('programa_trabajo', 50)->nullable();
            $table->string('periodo_trabajo', 50)->nullable();
            $table->string('nro_expediente', 100)->nullable();
            $table->string('des_directo', 2)->nullable();                       
                       

            $table->timestamps();
        });       

        Schema::create('formTipoSolicitud', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre', 100)->default(null);

            $table->timestamps();
        });  

        Schema::create('formTipoDocumento', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre')->nullable();

            $table->timestamps();
        });

        Schema::create('formPersona', function (Blueprint $table) {

            $table->bigIncrements('id');           
           
            $table->string('nombre', 50)->nullable();  
            $table->string('razon_social', 50)->nullable();                    
            $table->string('apellido', 50)->nullable(); 
            $table->string('dni',15)->nullable(); 
            $table->string('sexo', 50)->nullable();         
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nacionalidad', 50)->nullable();
            $table->string('profesion', 50)->nullable();           

            $table->string('estado_civil', 50)->nullable(); 
            $table->string('domicilioLegal', 50)->nullable();
            $table->string('provinciaLegal', 50)->nullable();
            $table->string('departamentoLegal', 50)->nullable();
            $table->string('localidadLegal', 50)->nullable();

            $table->string('domicilio', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('localidad', 50)->nullable();
            $table->string('tipo_solicitud', 50)->nullable();
            $table->unsignedBigInteger('tipodocumento_id')->nullable();

             $table->foreign('tipodocumento_id')->references('id')->on('formTipoDocumento');

            $table->timestamps();
        });

        Schema::create('form_persona_form_solicitud', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_persona_id')->nullable();           
            $table->unsignedBigInteger('form_solicitud_id')->nullable();
            $table->string('rol')->nullable();
            $table->string('tipo_persona', 50)->nullable(); 

             $table->foreign('form_persona_id')->references('id')->on('formPersona');
             $table->foreign('form_solicitud_id')->references('id')->on('formSolicitud');
        
            $table->timestamps();
        });

        Schema::create('formTerreno', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->string('superficie')->nullable();
            $table->string('provincia')->nullable();
            $table->string('departamento')->nullable();
            $table->string('localidad')->nullable();
            $table->unsignedBigInteger('solicitud_id')->nullable();

            $table->foreign('solicitud_id')->references('id')->on('formSolicitud');

            $table->timestamps();
        });

        Schema::create('formEstadoTerreno', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre_estado')->nullable();

            $table->timestamps();
        });

        Schema::create('form_estado_terreno_form_terreno', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_terreno_id')->nullable();
            $table->unsignedBigInteger('form_estado_terreno_id')->nullable();

             $table->foreign('form_terreno_id')->references('id')->on('formTerreno');
             $table->foreign('form_estado_terreno_id')->references('id')->on('formEstadoTerreno');

            $table->timestamps();
        });        

        Schema::create('form_terreno_minerales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('minerales_id')->nullable();           
            $table->unsignedBigInteger('form_terreno_id')->nullable();

            $table->string('categoria_mineral')->nullable();

             $table->foreign('minerales_id')->references('id')->on('mineral');
             $table->foreign('form_terreno_id')->references('id')->on('formTerreno');
        
            $table->timestamps();
        });       

        Schema::create('formMatriculaCatastral', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('NE_X')->nullable();
            $table->string('NE_Y')->nullable();
            $table->string('SO_X')->nullable();
            $table->string('SO_Y')->nullable();

            $table->unsignedBigInteger('terreno_id')->nullable();
            
             $table->foreign('terreno_id')->references('id')->on('formTerreno');          

            $table->timestamps();
        });

        Schema::create('formCoordenadasPoligonal', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('X')->nullable();
            $table->string('Y')->nullable();            

            $table->unsignedBigInteger('terreno_id')->nullable();

           $table->foreign('terreno_id')->references('id')->on('formTerreno');          

            $table->timestamps();
        });

        

        // Schema::create('formMinaTemporal', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre_mina')->nullable();
        //     $table->string('descubrimient_directo')->nullable();
        //     $table->string('muestra')->nullable(); //en la manifestacion de descubrimiento acompaña con muestra
        //     $table->string('provincia_mina')->nullable();
        //     $table->string('departamento_mina')->nullable();
        //     $table->timestamps();
        // });

        // Schema::create('formMinaTemporal_Mineral', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('estado_mineral')->nullable();

        //     $table->unsignedBigInteger('minatemporal_id')->nullable();
        //     $table->unsignedBigInteger('mineral_id')->nullable();

        //     // $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');
        //     // $table->foreign('mineral_id')->references('id')->on('mineral');

        //     $table->timestamps();
        // });

        //  Schema::create('formEstadoTerreno_MinaTemporal', function (Blueprint $table) {
        //     $table->bigIncrements('id');

        //     $table->unsignedBigInteger('estadoterreno_id')->nullable();
        //     $table->unsignedBigInteger('minatemporal_id')->nullable();

        //     //  $table->foreign('estadoterreno_id')->references('id')->on('formEstadoTerreno');
        //     //  $table->foreign('minatemporal_id')->references('id')->on('formMinaTemporal');


        //     $table->timestamps();
        // });
       
        // Schema::create('formTipoRol', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('tipo_rol')->nullable();           

        //     $table->timestamps();
        // });

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
        Schema::dropIfExists('formTipoDocumento');
        Schema::dropIfExists('formPersona');
        Schema::dropIfExists('form_persona_form_solicitud');
        Schema::dropIfExists('formTerreno');
        Schema::dropIfExists('form_estado_terreno_form_terreno');
        Schema::dropIfExists(' form_terreno_minerales');
        Schema::dropIfExists('formMatriculaCatastral');
        Schema::dropIfExists('formCoordenadassPoligonal');

        
        //Schema::dropIfExists('formMinaTemporal'); //form_mina_temporals
        //Schema::dropIfExists('formMinaTemporal_Mineral');
        //Schema::dropIfExists('formEstadoTerreno_MinaTemporal');
               
        
    }
}
