<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProductoresCatamarcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_productoresCatamarca', function (Blueprint $table) {
            
            
            
            $table->id();
            $table->integer('id_formulario_alta')->nullable()->default(null);

                $table->string('gestor_nombre_apellido',256)->nullable()->default(null);
                $table->boolean('gestor_nombre_apellido_correcto')->nullable()->default(null);
                $table->string('obs_gestor_nombre_apellido', 200)->nullable()->default(null);


                $table->bigInteger('gestor_dni')->nullable()->default(null);
                $table->boolean('gestor_dni_correcto')->nullable()->default(null);
                $table->string('obs_gestor_dni',200)->nullable()->default(null);


                $table->string('gestor_profesion',50)->nullable()->default(null);
                $table->boolean('gestor_profesion_correcto')->nullable()->default(null);
                $table->string('obs_gestor_profesion',200)->nullable()->default(null);


                $table->string('gestor_telefono',50)->nullable()->default(null);
                $table->boolean('gestor_telefono_correcto')->nullable()->default(null);
                $table->string('obs_gestor_telefono',200)->nullable()->default(null);


                $table->boolean('gestor_notificacion',256)->nullable()->default(null);
                $table->boolean('gestor_notificacion_correcto')->nullable()->default(null);
                
                
                $table->string('gestor_email',256)->nullable()->default(null);
                $table->boolean('gestor_email_correcto')->nullable()->default(null);
                $table->string('obs_gestor_email',200)->nullable()->default(null);


                $table->string('primer_hoja_dni',256)->nullable()->default(null);
                $table->string('segunda_hoja_dni',80)->nullable()->default(null);
                $table->string('obs_hoja_dni',200)->nullable()->default(null);
                $table->boolean('hoja_dni_correcto')->nullable()->default(null);


                $table->string('foto_4x4', 12)->nullable()->default(null);
                $table->boolean('foto_4x4_correcto')->nullable()->default(null);
                $table->string('obs_foto_4x4',200)->nullable()->default(null);


                $table->string('constancia_afip',80)->nullable()->default(null);
                $table->boolean('constancia_afip_correcto')->nullable()->default(null);
                $table->string('obs_constancia_afip',200)->nullable()->default(null);


                $table->string('autorizacion_gestor',256)->nullable()->default(null);
                $table->boolean('autorizacion_gestor_correcto')->nullable()->default(null);
                $table->string('obs_autorizacion_gestor',200)->nullable()->default(null);

                
                $table->float('paso_aprobado',3,2)->nullable()->default(null);
                $table->float('paso_reprobado',3,2)->nullable()->default(null);
                $table->float('paso_progreso',3,2)->nullable()->default(null);

                
                $table->integer('created_by',256)->nullable()->default(null);
                $table->integer('updated_by',256)->nullable()->default(null);
                $table->timestamps();
                $table->softDeletes($column = 'deleted_at', $precision = 0);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_alta_productores_catamarca');
    }
}
