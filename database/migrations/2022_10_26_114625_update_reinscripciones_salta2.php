<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReinscripcionesSalta2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reinscripciones', function( Blueprint $table) {
            $table->string('email_evaluacion',256)->nullable()->default(null);
            $table->string('email_comentario',256)->nullable()->default(null);
            $table->string('telefono_evaluacion',256)->nullable()->default(null);
            $table->string('telefono_comentario',256)->nullable()->default(null);
            $table->string('domicilio_provincia_evaluacion',256)->nullable()->default(null);
            $table->string('domicilio_provincia_comentario',256)->nullable()->default(null);
            $table->string('domicilio_administracion_evaluacion',256)->nullable()->default(null);
            $table->string('domicilio_administracion_comentario',256)->nullable()->default(null);
            $table->string('laboreos_mineros_evaluacion')->nullable()->default(null);
            $table->string('laboreos_mineros_comentario')->nullable()->default(null);
            $table->string('maquinarias_herramientas_evaluacion')->nullable()->default(null);
            $table->string('maquinarias_herramientas_comentario')->nullable()->default(null);
            $table->string('huellas_mineras_caminos_evaluacion')->nullable()->default(null);
            $table->string('huellas_mineras_caminos_comentario')->nullable()->default(null);
            $table->string('recurso_humano_evaluacion')->nullable()->default(null);
            $table->string('recurso_humano_comentario')->nullable()->default(null);
            $table->string('otros_evaluacion')->nullable()->default(null);
            $table->string('otros_comentario')->nullable()->default(null);
            $table->string('nombre_apellido_responsable_evaluacion',256)->nullable()->default(null);
            $table->string('nombre_apellido_responsable_comentario',256)->nullable()->default(null);
            $table->string('documento_identidad_responsable_evaluacion',256)->nullable()->default(null);
            $table->string('documento_identidad_responsable_comentario',256)->nullable()->default(null);
            $table->string('titulo_matricula_responsable_evaluacion',256)->nullable()->default(null);
            $table->string('titulo_matricula_responsable_comentario',256)->nullable()->default(null);
            $table->string('inscripcion_ley_24196_evaluacion',256)->nullable()->default(null);
            $table->string('inscripcion_ley_24196_comentario',256)->nullable()->default(null);
            $table->string('uso_explosivos_evaluacion',256)->nullable()->default(null);
            $table->string('uso_explosivos_comentario',256)->nullable()->default(null);
            $table->string('constancia_canon_evaluacion',256)->nullable()->default(null);
            $table->string('constancia_canon_comentario',256)->nullable()->default(null);
            $table->string('regularizacion_fiscal_evaluacion',256)->nullable()->default(null);
            $table->string('regularizacion_fiscal_comentario',256)->nullable()->default(null);
            $table->string('contrato_social_evaluacion',256)->nullable()->default(null);
            $table->string('contrato_social_comentario',256)->nullable()->default(null);
            $table->string('listado_maquinas_vehiculos_evaluacion',256)->nullable()->default(null);
            $table->string('listado_maquinas_vehiculos_comentario',256)->nullable()->default(null);
            $table->string('pago_multas_evaluacion',256)->nullable()->default(null);
            $table->string('pago_multas_comentario',256)->nullable()->default(null);
            $table->string('variedad_evaluacion',256)->nullable()->default(null);
            $table->string('variedad_comentario',256)->nullable()->default(null);
            $table->string('produccion_evaluacion',256)->nullable()->default(null);
            $table->string('produccion_comentario',256)->nullable()->default(null);
            $table->string('unidades_evaluacion',256)->nullable()->default(null);
            $table->string('unidades_comentario',256)->nullable()->default(null);
            $table->string('precio_venta_evaluacion',256)->nullable()->default(null);
            $table->string('precio_venta_comentario',256)->nullable()->default(null);
            $table->string('empresa_compradora_evaluacion',256)->nullable()->default(null);
            $table->string('empresa_compradora_comentario',256)->nullable()->default(null);
            $table->string('direccion_empresa_compradora_evaluacion',256)->nullable()->default(null);
            $table->string('direccion_empresa_compradora_comentario',256)->nullable()->default(null);
            $table->string('actividad_empresa_compradora_evaluacion',256)->nullable()->default(null);
            $table->string('actividad_empresa_compradora_comentario',256)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
