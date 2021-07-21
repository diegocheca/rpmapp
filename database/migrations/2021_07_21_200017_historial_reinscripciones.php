<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistorialReinscripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::create('tipos_resultados_evaluacion', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nombre')->nullable()->default(null);

        //     $table->index(['id']);
        // });

        Schema::create('historial_reinscripciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_reinscripcion')->nullable(false);

            $table->string('prospeccion_evaluacion')->nullable()->default(null);;
            $table->string('prospeccion_comentario', 50)->nullable()->default(null);

            $table->string('exploracion_evaluacion')->nullable()->default(null);;
            $table->string('exploracion_comentario', 50)->nullable()->default(null);

            $table->string('explotacion_evaluacion')->nullable()->default(null);;
            $table->string('explotacion_comentario', 50)->nullable()->default(null);

            $table->string('desarrollo_evaluacion')->nullable()->default(null);;
            $table->string('desarrollo_comentario', 50)->nullable()->default(null);

            $table->string('cantidad_productos_evaluacion')->nullable()->default(null);;
            $table->string('cantidad_productos_comentario', 50)->nullable()->default(null);

            $table->string('porcentaje_venta_provincia_evaluacion')->nullable()->default(null);;
            $table->string('porcentaje_venta_provincia_comentario', 50)->nullable()->default(null);

            $table->string('porcentaje_venta_otras_provincias_evaluacion')->nullable()->default(null);;
            $table->string('porcentaje_venta_otras_provincias_comentario', 50)->nullable()->default(null);

            $table->string('porcentaje_exportado_evaluacion')->nullable()->default(null);;
            $table->string('porcentaje_exportado_comentario', 50)->nullable()->default(null);

            $table->string('personal_perm_profesional_evaluacion')->nullable()->default(null);;
            $table->string('personal_perm_profesional_comentario', 50)->nullable()->default(null);

            $table->string('personal_perm_operarios_evaluacion')->nullable()->default(null);;
            $table->string('personal_perm_operarios_comentario', 50)->nullable()->default(null);

            $table->string('personal_perm_administrativos_evaluacion')->nullable()->default(null);;
            $table->string('personal_perm_administrativos_comentario', 50)->nullable()->default(null);

            $table->string('personal_perm_otros_evaluacion')->nullable()->default(null);;
            $table->string('personal_perm_otros_comentario', 50)->nullable()->default(null);

            $table->string('personal_trans_profesional_evaluacion')->nullable()->default(null);;
            $table->string('personal_trans_profesional_comentario', 50)->nullable()->default(null);

            $table->string('personal_trans_operarios_evaluacion')->nullable()->default(null);;
            $table->string('personal_trans_operarios_comentario', 50)->nullable()->default(null);

            $table->string('personal_trans_administrativos_evaluacion')->nullable()->default(null);;
            $table->string('personal_trans_administrativos_comentario', 50)->nullable()->default(null);

            $table->string('personal_trans_otros_evaluacion')->nullable()->default(null);;
            $table->string('personal_trans_otros_comentario', 50)->nullable()->default(null);

            $table->string('nombre_evaluacion')->nullable()->default(null);;
            $table->string('nombre_comentario', 50)->nullable()->default(null);

            $table->string('dni_evaluacion')->nullable()->default(null);;
            $table->string('dni_comentario', 50)->nullable()->default(null);

            $table->string('cargo_evaluacion')->nullable()->default(null);;
            $table->string('cargo_comentario', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones')->onUpdate('cascade')
            ->onDelete('cascade');
            // $table->foreign(
            //     'prospeccion_evaluacion',
            //     'exploracion_evaluacion',
            //     'explotacion_evaluacion',
            //     'desarrollo_evaluacion',
            //     'cantidad_productos_evaluacion',
            //     'porcentaje_venta_provincia_evaluacion',
            //     'porcentaje_venta_otras_provincias_evaluacion',
            //     'porcentaje_exportado_evaluacion',
            //     'personal_perm_profesional_evaluacion',
            //     'personal_perm_operarios_evaluacion',
            //     'personal_perm_administrativos_evaluacion',
            //     'personal_perm_otros_evaluacion',
            //     'personal_trans_profesional_evaluacion',
            //     'personal_trans_operarios_evaluacion',
            //     'personal_trans_administrativos_evaluacion',
            //     'personal_trans_otros_evaluacion',
            //     'nombre_evaluacion',
            //     'dni_evaluacion',
            //     'cargo_evaluacion'
            // )->references('id')->on('tipos_resultados_evaluacion')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_reinscripcion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('tipos_resultados_evaluacion');
        Schema::dropIfExists('historial_reinscripciones');
    }
}
