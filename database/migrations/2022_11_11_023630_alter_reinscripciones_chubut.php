<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterReinscripcionesChubut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reinscripciones', function( Blueprint $table) {
            $table->string('sustancia',256)->nullable()->default(null);
            $table->string('sustancia_evaluacion',256)->nullable()->default(null);
            $table->string('sustancia_comentario',256)->nullable()->default(null);
            $table->string('sustancia_macro',256)->nullable()->default(null);
            $table->string('sustancia_macro_evaluacion',256)->nullable()->default(null);
            $table->string('sustancia_macro_comentario',256)->nullable()->default(null);
            $table->string('unidades_cateo',256)->nullable()->default(null);
            $table->string('unidades_cateo_evaluacion',256)->nullable()->default(null);
            $table->string('unidades_cateo_comentario',256)->nullable()->default(null);
            $table->string('registro',256)->nullable()->default(null);
            $table->string('registro_evaluacion',256)->nullable()->default(null);
            $table->string('registro_comentario',256)->nullable()->default(null);
            $table->date('fecha_registro')->nullable()->default(null);
            $table->date('fecha_registro_evaluacion')->nullable()->default(null);
            $table->date('fecha_registro_comentario')->nullable()->default(null);
            $table->date('fecha_pet_men')->nullable()->default(null);
            $table->date('fecha_pet_men_evaluacion')->nullable()->default(null);
            $table->date('fecha_pet_men_comentario')->nullable()->default(null);
            $table->string('pertenencias',256)->nullable()->default(null);
            $table->string('pertenencias_evaluacion',256)->nullable()->default(null);
            $table->string('pertenencias_comentario',256)->nullable()->default(null);
            $table->string('edicto',256)->nullable()->default(null);
            $table->string('edicto_evaluacion',256)->nullable()->default(null);
            $table->string('edicto_comentario',256)->nullable()->default(null);
            $table->string('mensura',256)->nullable()->default(null);
            $table->string('mensura_evaluacion',256)->nullable()->default(null);
            $table->string('mensura_comentario',256)->nullable()->default(null);
            $table->string('titulo',256)->nullable()->default(null);
            $table->string('titulo_evaluacion',256)->nullable()->default(null);
            $table->string('titulo_comentario',256)->nullable()->default(null);
            $table->string('inspeccion',256)->nullable()->default(null);
            $table->string('inspeccion_evaluacion',256)->nullable()->default(null);
            $table->string('inspeccion_comentario',256)->nullable()->default(null);
            $table->string('situacion_legal',256)->nullable()->default(null);
            $table->string('situacion_legal_evaluacion',256)->nullable()->default(null);
            $table->string('situacion_legal_comentario',256)->nullable()->default(null);
            $table->string('fecha_vac',256)->nullable()->default(null);
            $table->string('fecha_vac_evaluacion',256)->nullable()->default(null);
            $table->string('fecha_vac_comentario',256)->nullable()->default(null);
            $table->string('fecha_tf',256)->nullable()->default(null);
            $table->string('fecha_tf_evaluacion',256)->nullable()->default(null);
            $table->string('fecha_tf_comentario',256)->nullable()->default(null);
            $table->string('caja',256)->nullable()->default(null);
            $table->string('caja_evaluacion',256)->nullable()->default(null);
            $table->string('caja_comentario',256)->nullable()->default(null);
            $table->string('superficiarios',256)->nullable()->default(null);
            $table->string('superficiarios_evaluacion',256)->nullable()->default(null);
            $table->string('superficiarios_comentario',256)->nullable()->default(null);
            $table->string('laboreos',256)->nullable()->default(null);
            $table->string('laboreos_evaluacion',256)->nullable()->default(null);
            $table->string('laboreos_comentario',256)->nullable()->default(null);
            $table->string('superficie',256)->nullable()->default(null);
            $table->string('superficie_evaluacion',256)->nullable()->default(null);
            $table->string('superficie_comentario',256)->nullable()->default(null);
            $table->string('concesion',256)->nullable()->default(null);
            $table->string('concesion_evaluacion',256)->nullable()->default(null);
            $table->string('concesion_comentario',256)->nullable()->default(null);
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
