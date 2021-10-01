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
            $table->string('muestra', 2)->nullable();
            $table->string('user_nom')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        }); 

        // Schema::create('formEstadoSolicitud', function(Blueprint $table){
            
        //     $table->bigIncrements('id');
        //     $table->string('nom_estado_solicitud')->nullable(); 
        //     $table->unsignedBigInteger('solicitud_id')->nullable();
        //     $table->foreign('solicitud_id')->references('id')->on('formSolicitud');
        // });
        
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
            $table->string('paraje')->nullable();

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

        Schema::create('formMina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_mina')->nullable();
            $table->unsignedBigInteger('terreno_id')->nullable();        
            $table->timestamps();

            $table->foreign('terreno_id')->references('id')->on('formTerreno');
        });
       
        Schema::create('form_mina_minerales', function (Blueprint $table) {

            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('form_mina_id')->nullable();
            $table->unsignedBigInteger('minerales_id')->nullable();
            $table->string('categoria')->nullable();

            $table->foreign('form_mina_id')->references('id')->on('formMina');
            $table->foreign('minerales_id')->references('id')->on('Minerales');
           
            $table->timestamps();
        });

         Schema::create('form_estado_terreno_form_mina', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_estado_terreno_id')->nullable();
            $table->unsignedBigInteger('form_mina_id')->nullable();

            $table->foreign('form_estado_terreno_id')->references('id')->on('formEstadoTerreno');
            $table->foreign('form_mina_id')->references('id')->on('formMina');


            $table->timestamps();
        });

        Schema::create('form_terreno_minerales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_terreno_id')->nullable();
            $table->unsignedBigInteger('minerales_id')->nullable();

            $table->foreign('form_terreno_id')->references('id')->on('formTerreno');
            $table->foreign('minerales_id')->references('id')->on('mineral');

            $table->timestamps();
        });

        Schema::create('formMCProvisoria', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('PD_X')->nullable();
            $table->string('PD_Y')->nullable();           

            $table->unsignedBigInteger('terreno_id')->nullable();
            $table->unsignedBigInteger('mina_id')->nullable();
            
            $table->foreign('terreno_id')->references('id')->on('formTerreno'); 
            $table->foreign('mina_id')->references('id')->on('formMina');          

            $table->timestamps();
        });
        
        
        Schema::create('formInforme', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('declaracion_jurada')->nullable(); 
            $table->string('informe_catastral')->nullable();
            $table->unsignedBigInteger('solicitud_id')->nullable();
            
            $table->foreign('solicitud_id')->references('id')->on('formSolicitud');                        

            $table->timestamps();
        }); 

        Schema::create('formMinaColindante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_mina')->nullable();
            $table->string('mineral')->nullable(); 
            $table->string('nom_propietario')->nullable();                   
            $table->timestamps();          
        }); 

        Schema::create('form_mina_form_mina_colinadante', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_mina_id')->nullable();
            $table->unsignedBigInteger('form_mina_colindante_id')->nullable();

            $table->foreign('form_mina_id')->references('id')->on('formMina');
            $table->foreign('form_mina_colindante_id')->references('id')->on('formMinaColindante');

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
        Schema::dropIfExists('formTipoDocumento');
        Schema::dropIfExists('formPersona');
        Schema::dropIfExists('form_persona_form_solicitud');
        Schema::dropIfExists('formTerreno');
        Schema::dropIfExists('form_estado_terreno_form_terreno');
        Schema::dropIfExists(' form_terreno_minerales');
        Schema::dropIfExists('formMatriculaCatastral');
        Schema::dropIfExists('formCoordenadassPoligonal');
        Schema::dropIfExists('formMina');
        Schema::dropIfExists('Minerales'); 
        Schema::dropIfExists('form_mina_minerales'); 
        Schema::dropIfExists('form_estado_terreno_mina'); 
        Schema::dropIfExists('form_terreno_minerales'); 
        Schema::dropIfExists('formMCProvisoria'); 
        Schema::dropIfExists('formInforme'); 
        Schema::dropIfExists('formEstadoSolicitud');
        Schema::dropIfExists('form_estado_solicitud_form_solicitud');

    }
}
