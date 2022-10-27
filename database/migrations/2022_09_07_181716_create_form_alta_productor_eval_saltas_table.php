<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProductorEvalSaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_productoresEvalSalta', function (Blueprint $table) {
                $table->id();
                $table->integer('id_formulario_alta_salta');
                $table->boolean('correccion_tipo')->nullable()->default(null);
                $table->string('observacion_tipo',256)->nullable()->default(null);

                
                $table->boolean('correccion_representante_legal_nombre')->nullable()->default(null);
                $table->string('observacion_representante_legal_nombre',256)->nullable()->default(null);

                $table->boolean('correccion_representante_legal_apellido')->nullable()->default(null);
                $table->string('observacion_representante_legal_apellido',256)->nullable()->default(null);
                $table->boolean('correccion_representante_legal_dni')->nullable()->default(null);
                $table->string('observacion_representante_legal_dni',256)->nullable()->default(null);
                $table->boolean('correccion_representante_legal_email')->nullable()->default(null);
                $table->string('observacion_representante_legal_email',256)->nullable()->default(null);
                $table->boolean('correccion_representante_legal_cargo')->nullable()->default(null);
                $table->string('observacion_representante_legal_cargo',256)->nullable()->default(null);
                $table->boolean('correccion_representante_legal_domicilio')->nullable()->default(null);
                $table->string('observacion_representante_legal_domicilio',256)->nullable()->default(null);

                $table->boolean('correccion_nacionalidad')->nullable()->default(null);
                $table->string('observacion_nacionalidad',256)->nullable()->default(null);
                $table->boolean('correccion_telefono')->nullable()->default(null);
                $table->string('observacion_telefono',256)->nullable()->default(null);

                $table->boolean('correccion_superficie_mina')->nullable()->default(null);
                $table->string('observacion_superficie_mina',256)->nullable()->default(null);
                $table->boolean('correccion_volumenes_de_extraccion_periodo_anterior')->nullable()->default(null);
                $table->string('observacion_volumenes_de_extraccion_periodo_anterior',256)->nullable()->default(null);
    
                //TABLAS en el formulario impreso
                $table->boolean('correccion_n_resolucion_iia')->nullable()->default(null);
                $table->string('observacion_n_resolucion_iia',256)->nullable()->default(null);
                $table->boolean('correccion_etapa_de_exploracion')->nullable()->default(null);
                $table->string('observacion_etapa_de_exploracion',256)->nullable()->default(null);
                $table->boolean('correccion_n_resolucion_aprobacion_informe')->nullable()->default(null);
                $table->string('observacion_n_resolucion_aprobacion_informe',256)->nullable()->default(null);
                $table->boolean('correccion_etapa_de_exploracion_avanzada')->nullable()->default(null);
                $table->string('observacion_etapa_de_exploracion_avanzada',256)->nullable()->default(null);

                $table->boolean('correccion_volumenes_anuales_de_materias_primas')->nullable()->default(null);
                $table->string('observacion_volumenes_anuales_de_materias_primas',256)->nullable()->default(null);
                $table->boolean('correccion_material_obtenido')->nullable()->default(null);
                $table->string('observacion_material_obtenido',256)->nullable()->default(null);
                $table->boolean('correccion_autorizacion_extractivas_exploratorias')->nullable()->default(null);
                $table->string('observacion_autorizacion_extractivas_exploratorias',256)->nullable()->default(null);

                //Fin tablas

                $table->boolean('correccion_responsable_nombre')->nullable()->default(null);
                $table->string('observacion_responsable_nombre',256)->nullable()->default(null);
                $table->boolean('correccion_responsable_apellido')->nullable()->default(null);
                $table->string('observacion_responsable_apellido',256)->nullable()->default(null);
                $table->boolean('correccion_responsable_dni')->nullable()->default(null);
                $table->string('observacion_responsable_dni',256)->nullable()->default(null);
                $table->boolean('correccion_responsable_titulo')->nullable()->default(null);
                $table->string('observacion_responsable_titulo',256)->nullable()->default(null);
                $table->boolean('correccion_responsable_matricula')->nullable()->default(null);
                $table->string('observacion_responsable_matricula',256)->nullable()->default(null);

                
                //ley 24196
                $table->boolean('correccion_ley_24196_numero')->nullable()->default(null);
                $table->string('observacion_ley_24196_numero',256)->nullable()->default(null);
                $table->boolean('correccion_ley_24196_inscripcion_renar')->nullable()->default(null);
                $table->string('observacion_ley_24196_inscripcion_renar',256)->nullable()->default(null);
                $table->boolean('correccion_ley_24196_explosivos')->nullable()->default(null);
                $table->string('observacion_ley_24196_explosivos',256)->nullable()->default(null);
                $table->boolean('correccion_ley_24196_propiedad')->nullable()->default(null);
                $table->string('observacion_ley_24196_propiedad',256)->nullable()->default(null);

                //ARCHIVOS - DOCUMENTACION
                $table->boolean('correccion_estado_contable')->nullable()->default(null);
                $table->string('observacion_estado_contable',256)->nullable()->default(null);
                $table->boolean('correccion_listado_de_maquinaria')->nullable()->default(null);
                $table->string('observacion_listado_de_maquinaria',256)->nullable()->default(null);
                $table->boolean('correccion_regalias')->nullable()->default(null);
                $table->string('observacion_regalias',256)->nullable()->default(null);
                $table->boolean('correccion_personas_afectadas')->nullable()->default(null);
                $table->string('observacion_personas_afectadas',256)->nullable()->default(null);
                $table->boolean('correccion_multas')->nullable()->default(null);
                $table->string('observacion_multas',256)->nullable()->default(null);

                $table->boolean('correccion_empresas')->nullable()->default(null);
                $table->string('observacion_empresas',256)->nullable()->default(null);


                $table->integer('created_by')->nullable()->default(0);
                $table->integer('updated_by')->nullable()->default(0);
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
        Schema::dropIfExists('form_alta_productoresEvalSalta');
    }
}
