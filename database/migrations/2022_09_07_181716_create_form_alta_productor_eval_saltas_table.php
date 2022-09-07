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
                $table->boolean('correccion_tipo')->default(null);
                $table->string('observacion_tipo',256)->default(null);

                $table->boolean('correccion_representante_legal_apellido')->default(null);
                $table->string('observacion_representante_legal_apellido',256)->default(null);
                $table->boolean('correccion_representante_legal_dni')->default(null);
                $table->string('observacion_representante_legal_dni',256)->default(null);
                $table->boolean('correccion_representante_legal_email')->default(null);
                $table->string('observacion_representante_legal_email',256)->default(null);
                $table->boolean('correccion_representante_legal_cargo')->default(null);
                $table->string('observacion_representante_legal_cargo',256)->default(null);
                $table->boolean('correccion_representante_legal_domicilio')->default(null);
                $table->string('observacion_representante_legal_domicilio',256)->default(null);

                $table->boolean('correccion_nacionalidad')->default(null);
                $table->string('observacion_nacionalidad',256)->default(null);
                $table->boolean('correccion_telefono')->default(null);
                $table->string('observacion_telefono',256)->default(null);

                $table->boolean('correccion_superficie_mina')->default(null);
                $table->string('observacion_superficie_mina',256)->default(null);
                $table->boolean('correccion_volumenes_de_extraccion_periodo_anterior')->default(null);
                $table->string('observacion_volumenes_de_extraccion_periodo_anterior',256)->default(null);
    
                //TABLAS en el formulario impreso
                $table->boolean('correccion_n_resolucion_iia')->default(null);
                $table->string('observacion_n_resolucion_iia',256)->default(null);
                $table->boolean('correccion_etapa_de_exploracion')->default(null);
                $table->string('observacion_etapa_de_exploracion',256)->default(null);
                $table->boolean('correccion_n_resolucion_aprobacion_informe')->default(null);
                $table->string('observacion_n_resolucion_aprobacion_informe',256)->default(null);
                $table->boolean('correccion_etapa_de_exploracion_avanzada')->default(null);
                $table->string('observacion_etapa_de_exploracion_avanzada',256)->default(null);

                $table->boolean('correccion_volumenes_anuales_de_materias_primas')->default(null);
                $table->string('observacion_volumenes_anuales_de_materias_primas',256)->default(null);
                $table->boolean('correccion_material_obtenido')->default(null);
                $table->string('observacion_material_obtenido',256)->default(null);
                $table->boolean('correccion_autorizacion_extractivas_exploratorias')->default(null);
                $table->string('observacion_autorizacion_extractivas_exploratorias',256)->default(null);

                //Fin tablas

                $table->boolean('correccion_responsable_nombre')->default(null);
                $table->string('observacion_responsable_nombre',256)->default(null);
                $table->boolean('correccion_responsable_apellido')->default(null);
                $table->string('observacion_responsable_apellido',256)->default(null);
                $table->boolean('correccion_responsable_dni')->default(null);
                $table->string('observacion_responsable_dni',256)->default(null);
                $table->boolean('correccion_responsable_titulo')->default(null);
                $table->string('observacion_responsable_titulo',256)->default(null);
                $table->boolean('correccion_responsable_matricula')->default(null);
                $table->string('observacion_responsable_matricula',256)->default(null);

                
                //ley 24196
                $table->boolean('correccion_ley_24196_numero')->default(null);
                $table->string('observacion_ley_24196_numero',256)->default(null);
                $table->boolean('correccion_ley_24196_inscripcion_renar')->default(null);
                $table->string('observacion_ley_24196_inscripcion_renar',256)->default(null);
                $table->boolean('correccion_ley_24196_explosivos')->default(null);
                $table->string('observacion_ley_24196_explosivos',256)->default(null);
                $table->boolean('correccion_ley_24196_propiedad')->default(null);
                $table->string('observacion_ley_24196_propiedad',256)->default(null);

                //ARCHIVOS - DOCUMENTACION
                $table->boolean('correccion_estado_contable')->default(null);
                $table->string('observacion_estado_contable',256)->default(null);
                $table->boolean('correccion_listado_de_maquinaria')->default(null);
                $table->string('observacion_listado_de_maquinaria',256)->default(null);
                $table->boolean('correccion_regalias')->default(null);
                $table->string('observacion_regalias',256)->default(null);
                $table->boolean('correccion_personas_afectadas')->default(null);
                $table->string('observacion_personas_afectadas',256)->default(null);
                $table->boolean('correccion_multas')->default(null);
                $table->string('observacion_multas',256)->default(null);

                $table->timestamp('created_by')->useCurrent = true;
                $table->integer('updated_by');
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
