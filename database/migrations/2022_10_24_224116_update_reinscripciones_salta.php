<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReinscripcionesSalta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reinscripciones', function( Blueprint $table) {
            $table->string('email',256)->nullable()->default(null);
            $table->string('telefono',256)->nullable()->default(null);
            $table->string('domicilio_provincia',256)->nullable()->default(null);
            $table->string('domicilio_administracion',256)->nullable()->default(null);
            $table->integer('laboreos_mineros')->nullable()->default(null);
            $table->integer('maquinarias_herramientas')->nullable()->default(null);
            $table->integer('huellas_mineras_caminos')->nullable()->default(null);
            $table->integer('recurso_humano')->nullable()->default(null);
            $table->integer('otros')->nullable()->default(null);
            $table->string('nombre_apellido_responsable',256)->nullable()->default(null);
            $table->string('documento_identidad_responsable',256)->nullable()->default(null);
            $table->string('titulo_matricula_responsable',256)->nullable()->default(null);
            $table->string('inscripcion_ley_24196',256)->nullable()->default(null);
            $table->string('uso_explosivos',256)->nullable()->default(null);
            $table->string('constancia_canon',256)->nullable()->default(null);
            $table->string('regularizacion_fiscal',256)->nullable()->default(null);
            $table->string('contrato_social',256)->nullable()->default(null);
            $table->string('listado_maquinas_vehiculos',256)->nullable()->default(null);
            $table->string('pago_multas',256)->nullable()->default(null);
            $table->string('variedad',256)->nullable()->default(null);
            $table->string('produccion',256)->nullable()->default(null);
            $table->string('unidades',256)->nullable()->default(null);
            $table->string('precio_venta',256)->nullable()->default(null);
            $table->string('empresa_compradora',256)->nullable()->default(null);
            $table->string('direccion_empresa_compradora',256)->nullable()->default(null);
            $table->string('actividad_empresa_compradora',256)->nullable()->default(null);

            $table->string("id_productor_evaluacion")->nullable()->default(null);
            $table->string("id_productor_comentario")->nullable()->default(null);
            $table->string("id_mina_evaluacion")->nullable()->default(null);
            $table->string("id_mina_comentario")->nullable()->default(null);
            $table->boolean("production_checkbox")->nullable()->default();
            $table->string("production_checkbox_evaluacion")->nullable()->default(null);
            $table->string("production_checkbox_comentario")->nullable()->default(null);
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
