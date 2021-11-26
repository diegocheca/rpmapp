<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReinscripcionSanLuis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('reinscripciones', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('id_mina')->nullable()->default(null);
            $table->bigInteger('id_productor')->nullable()->default(null);
            $table->date('fecha_vto')->nullable()->default(null);

            $table->tinyInteger('prospeccion')->nullable()->default(null);
            $table->string('prospeccion_evaluacion')->nullable()->default(null);
            $table->string('prospeccion_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('exploracion')->nullable()->default(null);
            $table->string('exploracion_evaluacion')->nullable()->default(null);
            $table->string('exploracion_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('explotacion')->nullable()->default(null);
            $table->string('explotacion_evaluacion')->nullable()->default(null);
            $table->string('explotacion_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('desarrollo')->nullable()->default(null);
            $table->string('desarrollo_evaluacion')->nullable()->default(null);
            $table->string('desarrollo_comentario', 50)->nullable()->default(null);

            $table->integer('cantidad_productos')->nullable()->default(null);
            $table->string('cantidad_productos_evaluacion')->nullable()->default(null);
            $table->string('cantidad_productos_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_venta_provincia')->nullable()->default(null);
            $table->string('porcentaje_venta_provincia_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_venta_provincia_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_venta_otras_provincias')->nullable()->default(null);
            $table->string('porcentaje_venta_otras_provincias_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_venta_otras_provincias_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_exportado')->nullable()->default(null);
            $table->string('porcentaje_exportado_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_exportado_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_profesional')->nullable()->default(null);
            $table->string('personal_perm_profesional_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_profesional_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_operarios')->nullable()->default(null);
            $table->string('personal_perm_operarios_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_operarios_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_administrativos')->nullable()->default(null);
            $table->string('personal_perm_administrativos_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_administrativos_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_otros')->nullable()->default(null);
            $table->string('personal_perm_otros_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_otros_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_profesional')->nullable()->default(null);
            $table->string('personal_trans_profesional_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_profesional_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_operarios')->nullable()->default(null);
            $table->string('personal_trans_operarios_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_operarios_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_administrativos')->nullable()->default(null);
            $table->string('personal_trans_administrativos_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_administrativos_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_otros')->nullable()->default(null);
            $table->string('personal_trans_otros_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_otros_comentario', 50)->nullable()->default(null);

            $table->string('nombre', 80)->nullable()->default(null);
            $table->string('nombre_evaluacion')->nullable()->default(null);
            $table->string('nombre_comentario', 50)->nullable()->default(null);

            $table->integer('dni')->nullable()->default(null);
            $table->string('dni_evaluacion')->nullable()->default(null);
            $table->string('dni_comentario', 50)->nullable()->default(null);

            $table->string('cargo', 100)->nullable()->default(null);
            $table->string('cargo_evaluacion')->nullable()->default(null);
            $table->string('cargo_comentario', 50)->nullable()->default(null);

            $table->bigInteger('id_departamento')->nullable();
            $table->string('id_departamento_evaluacion')->nullable()->default(null);
            $table->string('id_departamento_comentario', 50)->nullable()->default(null);

            $table->bigInteger('id_localidad')->nullable();
            $table->string('id_localidad_evaluacion')->nullable()->default(null);
            $table->string('id_localidad_comentario', 50)->nullable()->default(null);


            $table->tinyInteger('subterranea')->nullable()->default(null);
            $table->string('subterranea_evaluacion')->nullable()->default(null);
            $table->string('subterranea_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('cielo_abierto')->nullable()->default(null);
            $table->string('cielo_abierto_evaluacion')->nullable()->default(null);
            $table->string('cielo_abierto_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('manual')->nullable()->default(null);
            $table->string('manual_evaluacion')->nullable()->default(null);
            $table->string('manual_comentario', 50)->nullable()->default(null);

            $table->tinyInteger('mecanizada')->nullable()->default(null);
            $table->string('mecanizada_evaluacion')->nullable()->default(null);
            $table->string('mecanizada_comentario', 50)->nullable()->default(null);

            $table->string('expediente', 100)->nullable();
            $table->string('expediente_evaluacion')->nullable()->default(null);
            $table->string('expediente_comentario', 50)->nullable()->default(null);

            $table->string('polvorin', 100)->nullable();
            $table->string('polvorin_evaluacion')->nullable()->default(null);
            $table->string('polvorin_comentario', 50)->nullable()->default(null);

            $table->string('ubicacion', 100)->nullable();
            $table->string('ubicacion_evaluacion')->nullable()->default(null);
            $table->string('ubicacion_comentario', 50)->nullable()->default(null);

            $table->string('dimensiones', 100)->nullable();
            $table->string('dimensiones_evaluacion')->nullable()->default(null);
            $table->string('dimensiones_comentario', 50)->nullable()->default(null);

            $table->string('personal_permanente', 100)->nullable();
            $table->string('personal_permanente_evaluacion')->nullable()->default(null);
            $table->string('personal_permanente_comentario', 50)->nullable()->default(null);

            $table->string('temporario', 100)->nullable();
            $table->string('temporario_evaluacion')->nullable()->default(null);
            $table->string('temporario_comentario', 50)->nullable()->default(null);

            $table->string('total', 100)->nullable();
            $table->string('total_evaluacion')->nullable()->default(null);
            $table->string('total_comentario', 50)->nullable()->default(null);


            $table->string("id_productor_evaluacion")->nullable()->default(null);
            $table->string("id_productor_comentario")->nullable()->default(null);
            $table->string("id_mina_evaluacion")->nullable()->default(null);
            $table->string("id_mina_comentario")->nullable()->default(null);

            $table->boolean("production_checkbox")->nullable()->default();
            $table->string("production_checkbox_evaluacion")->nullable()->default(null);
            $table->string("production_checkbox_comentario")->nullable()->default(null);

            $table->string('reserva', 100)->nullable();
            $table->string("reserva_evaluacion")->nullable()->default(null);
            $table->string("reserva_comentario")->nullable()->default(null);

            $table->integer('vida_util')->nullable();
            $table->string("vida_util_evaluacion")->nullable()->default(null);
            $table->string("vida_util_comentario")->nullable()->default(null);

            $table->string('volumen_total', 100)->nullable();
            $table->string("volumen_total_evaluacion")->nullable()->default(null);
            $table->string("volumen_total_comentario")->nullable()->default(null);

            $table->string('volumen_unitario', 100)->nullable();
            $table->string("volumen_unitario_evaluacion")->nullable()->default(null);
            $table->string("volumen_unitario_comentario")->nullable()->default(null);

            $table->string('volumen_comercializado', 100)->nullable();
            $table->string("volumen_comercializado_evaluacion")->nullable()->default(null);
            $table->string("volumen_comercializado_comentario")->nullable()->default(null);

            $table->string('procesamiento_mineral')->nullable();
            $table->string("procesamiento_mineral_evaluacion")->nullable()->default(null);
            $table->string("procesamiento_mineral_comentario")->nullable()->default(null);

            $table->integer('personal_perm_tecnicos')->nullable()->default(null);
            $table->string('personal_perm_tecnicos_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_tecnicos_comentario', 50)->nullable()->default(null);

            $table->string('permiso_anmac')->nullable()->default(null);
            $table->string('permiso_anmac_evaluacion')->nullable()->default(null);
            $table->string('permiso_anmac_comentario', 50)->nullable()->default(null);

            $table->date('fecha_concesion')->nullable()->default(null);
            $table->string('fecha_concesion_evaluacion')->nullable()->default(null);
            $table->string('fecha_concesion_comentario', 50)->nullable()->default(null);

            $table->integer('anios_concesion')->nullable()->default(null);
            $table->string('anios_concesion_evaluacion')->nullable()->default(null);
            $table->string('anios_concesion_comentario', 50)->nullable()->default(null);

            $table->date('inicio_explotacion')->nullable()->default(null);
            $table->string('inicio_explotacion_evaluacion')->nullable()->default(null);
            $table->string('inicio_explotacion_comentario', 50)->nullable()->default(null);

            $table->string('estado', 25)->nullable()->default(null);

            $table->foreign('id_mina')->references('id')->on('mina_cantera') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_productor')->references('id')->on('productores') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id']);

        });

        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_reinscripcion')->nullable()->default(null);

            $table->string('nombre_mineral', 200)->nullable()->default(null);
            $table->string('nombre_mineral_evaluacion')->nullable()->default(null);
            $table->string('nombre_mineral_comentario', 50)->nullable()->default(null);

            $table->string('variedad', 100)->nullable()->default(null);
            $table->string('variedad_evaluacion')->nullable()->default(null);
            $table->string('variedad_comentario', 50)->nullable()->default(null);

            $table->integer('produccion')->nullable()->default(null);
            $table->string('produccion_evaluacion')->nullable()->default(null);
            $table->string('produccion_comentario', 50)->nullable()->default(null);

            $table->string('unidades', 200)->nullable()->default(null);
            $table->string('unidades_evaluacion')->nullable()->default(null);
            $table->string('unidades_comentario', 50)->nullable()->default(null);

            // $table->string('otra_unidad', 200)->default(null);
            $table->integer('precio_venta')->nullable()->default(null);
            $table->string('precio_venta_evaluacion')->nullable()->default(null);
            $table->string('precio_venta_comentario', 50)->nullable()->default(null);

            $table->bigInteger('created_by')->nullable()->default(null);
            $table->string('estado', 50)->default(null);

            $table->string('ley', 100)->nullable()->default(null);
            $table->string('ley_evaluacion')->nullable()->default(null);
            $table->string('ley_comentario', 50)->nullable()->default(null);

            $table->string('calidad', 100)->nullable()->default(null);
            $table->string('calidad_evaluacion')->nullable()->default(null);
            $table->string('calidad_comentario', 50)->nullable()->default(null);

            $table->string('volumen_comercializado', 100)->nullable()->default(null);
            $table->string('volumen_comercializado_evaluacion')->nullable()->default(null);
            $table->string('volumen_comercializado_comentario', 50)->nullable()->default(null);

            $table->string('volumen_acopiado', 100)->nullable()->default(null);
            $table->string('volumen_acopiado_evaluacion')->nullable()->default(null);
            $table->string('volumen_acopiado_comentario', 50)->nullable()->default(null);

            $table->string('volumen_descarte', 100)->nullable()->default(null);
            $table->string('volumen_descarte_evaluacion')->nullable()->default(null);
            $table->string('volumen_descarte_comentario', 50)->nullable()->default(null);

            $table->string('capacidad', 100)->nullable()->default(null);
            $table->string('capacidad_evaluacion')->nullable()->default(null);
            $table->string('capacidad_comentario', 50)->nullable()->default(null);

            $table->string('observaciones', 100)->nullable()->default(null);
            $table->string('comment', 50)->nullable()->default(null);
            $table->string('value', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        Schema::create('reinscripcionesCombustible', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_reinscripcion')->nullable()->default(null);

            $table->string('nombre', 100)->nullable()->default(null);
            $table->string('tipo', 100)->nullable()->default(null);
            $table->integer('cantidad')->nullable()->default(null);
            $table->string('observaciones', 100)->nullable()->default(null);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_reinscripcion']);
        });

        Schema::create('reinscripcionesEquipos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_reinscripcion')->nullable()->default(null);

            $table->string('marca', 100)->nullable()->default(null);
            $table->integer('cantidad')->nullable()->default(null);
            $table->string('observaciones', 100)->nullable();

            $table->string('nombre', 200)->nullable()->default(null);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_reinscripcion']);
        });

        Schema::create('reinscripcionesAnexo1', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_reinscripcion')->nullable()->default(null);

            $table->string('apellido', 100)->nullable()->default(null);
            $table->string('nombre', 100)->nullable()->default(null);
            $table->string('dni', 100)->nullable()->default(null);
            $table->string('condicion', 100)->nullable()->default(null);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_reinscripcion']);
        });

        Schema::create('reinscripcionesExplosivos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_reinscripcion')->nullable()->default(null);

            $table->string('nombre_explosivo', 100)->nullable()->default(null);
            $table->string('tipo_explosivo', 100)->nullable()->default(null);
            $table->string('cantidad_explosivo')->nullable()->default(null)->default(0);
            $table->string('observaciones_explosivo', 100)->nullable()->default(null);

            $table->string('almacenamiento_explosivo', 200)->nullable()->default(null);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_reinscripcion']);
        });

        // Schema::create('reinscripcionesProductos', function (Blueprint $table) {
        //     $table->bigIncrements('id');

        //     $table->bigInteger('id_reinscripcion')->nullable()->default(null);

        //     $table->string('ley', 100)->nullable()->default(null);
        //     $table->string('calidad', 100)->nullable()->default(null);
        //     $table->string('observaciones', 100)->nullable()->default(null);

        //     $table->string('evaluacion')->nullable()->default(null);
        //     $table->string('comentario', 50)->nullable()->default(null);

        //     $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
        //     ->onDelete('cascade');

        //     $table->timestamps();
        //     $table->softDeletes($column = 'deleted_at', $precision = 0);

        //     $table->engine = 'InnoDB';
        //     $table->charset = 'utf8mb4';
        //     $table->collation = 'utf8mb4_spanish2_ci';
        //     $table->index(['id', 'id_reinscripcion']);
        // });

        Schema::create('reinscripcionesProduccion', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_productos')->nullable()->default(null);

            $table->string('mes', 100)->nullable()->default(null);
            $table->integer('cantidad')->nullable()->default(null)->default(0);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_productos')->references('id')->on('productos') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_productos']);
        });

        Schema::create('reinscripcionesComercializacion', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_productos')->nullable()->default(null);

            $table->integer('cantidad')->nullable()->default(null)->default(0);
            $table->string('firma', 100)->nullable()->default(null);
            $table->string('destino', 100)->nullable()->default(null);

            $table->string('evaluacion')->nullable()->default(null);
            $table->string('comentario', 50)->nullable()->default(null);

            $table->foreign('id_productos')->references('id')->on('productos') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_productos']);
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
