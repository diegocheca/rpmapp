<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReinscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        Schema::create('reinscripciones', function (Blueprint $table) {
            
            

            $table->bigIncrements('id');
            $table->bigInteger('id_mina')->nullable(false);
            $table->bigInteger('id_productor')->nullable(false);
            $table->date('fecha_vto')->nullable(false);

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

            $table->integer('cantidad_productos')->nullable(false);
            $table->string('cantidad_productos_evaluacion')->nullable()->default(null);
            $table->string('cantidad_productos_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_venta_provincia')->nullable(false);
            $table->string('porcentaje_venta_provincia_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_venta_provincia_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_venta_otras_provincias')->nullable(false);
            $table->string('porcentaje_venta_otras_provincias_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_venta_otras_provincias_comentario', 50)->nullable()->default(null);

            $table->integer('porcentaje_exportado')->nullable(false);
            $table->string('porcentaje_exportado_evaluacion')->nullable()->default(null);
            $table->string('porcentaje_exportado_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_profesional')->nullable(false);
            $table->string('personal_perm_profesional_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_profesional_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_operarios')->nullable(false);
            $table->string('personal_perm_operarios_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_operarios_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_administrativos')->nullable(false);
            $table->string('personal_perm_administrativos_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_administrativos_comentario', 50)->nullable()->default(null);

            $table->integer('personal_perm_otros')->nullable(false);
            $table->string('personal_perm_otros_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_otros_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_profesional')->nullable(false);
            $table->string('personal_trans_profesional_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_profesional_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_operarios')->nullable(false);
            $table->string('personal_trans_operarios_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_operarios_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_administrativos')->nullable(false);
            $table->string('personal_trans_administrativos_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_administrativos_comentario', 50)->nullable()->default(null);

            $table->integer('personal_trans_otros')->nullable(false);
            $table->string('personal_trans_otros_evaluacion')->nullable()->default(null);
            $table->string('personal_trans_otros_comentario', 50)->nullable()->default(null);

            $table->string('nombre', 80)->nullable(false);
            $table->string('nombre_evaluacion')->nullable()->default(null);
            $table->string('nombre_comentario', 50)->nullable()->default(null);

            $table->integer('dni')->nullable(false);
            $table->string('dni_evaluacion')->nullable()->default(null);
            $table->string('dni_comentario', 50)->nullable()->default(null);

            $table->string('cargo', 100)->nullable(false);
            $table->string('cargo_evaluacion')->nullable()->default(null);
            $table->string('cargo_comentario', 50)->nullable()->default(null);

            $table->string('estado', 25)->nullable(false);







            $table->string('id_departamento')->nullable()->default(null);
            $table->string('id_departamento_evaluacion')->nullable()->default(null);
            $table->string('id_departamento_comentario')->nullable()->default(null);
            $table->string('id_localidad')->nullable()->default(null);
            $table->string('id_localidad_evaluacion')->nullable()->default(null);
            $table->string('id_localidad_comentario')->nullable()->default(null);
            $table->string('subterranea')->nullable()->default(null);
            $table->string('subterranea_evaluacion')->nullable()->default(null);
            $table->string('subterranea_comentario')->nullable()->default(null);
            $table->string('cielo_abierto')->nullable()->default(null);
            $table->string('cielo_abierto_evaluacion')->nullable()->default(null);
            $table->string('cielo_abierto_comentario')->nullable()->default(null);
            $table->string('manual')->nullable()->default(null);
            $table->string('manual_evaluacion')->nullable()->default(null);
            $table->string('manual_comentario')->nullable()->default(null);
            $table->string('mecanizada')->nullable()->default(null);
            $table->string('mecanizada_evaluacion')->nullable()->default(null);
            $table->string('mecanizada_comentario')->nullable()->default(null);
            $table->string('semimecanizada')->nullable()->default(null);
            $table->string('semimecanizada_evaluacion')->nullable()->default(null);
            $table->string('semimecanizada_comentario')->nullable()->default(null);
            $table->string('expediente')->nullable()->default(null);
            $table->string('expediente_evaluacion')->nullable()->default(null);
            $table->string('expediente_comentario')->nullable()->default(null);
            $table->string('polvorin')->nullable()->default(null);
            $table->string('polvorin_evaluacion')->nullable()->default(null);
            $table->string('polvorin_comentario')->nullable()->default(null);
            $table->string('ubicacion')->nullable()->default(null);
            $table->string('ubicacion_evaluacion')->nullable()->default(null);
            $table->string('ubicacion_comentario')->nullable()->default(null);
            $table->string('dimensiones')->nullable()->default(null);
            $table->string('dimensiones_evaluacion')->nullable()->default(null);
            $table->string('dimensiones_comentario')->nullable()->default(null);
            $table->string('personal_permanente')->nullable()->default(null);
            $table->string('personal_permanente_evaluacion')->nullable()->default(null);
            $table->string('personal_permanente_comentario')->nullable()->default(null);
            $table->string('temporario')->nullable()->default(null);
            $table->string('temporario_evaluacion')->nullable()->default(null);
            $table->string('temporario_comentario')->nullable()->default(null);
            $table->string('total')->nullable()->default(null);
            $table->string('total_evaluacion')->nullable()->default(null);
            $table->string('total_comentario')->nullable()->default(null);
            $table->string('id_productor_evaluacion')->nullable()->default(null);
            $table->string('id_productor_comentario')->nullable()->default(null);
            $table->string('production_checkbox')->nullable()->default(null);
            $table->string('production_checkbox_evaluacion')->nullable()->default(null);
            $table->string('production_checkbox_comentario')->nullable()->default(null);
            $table->string('reserva')->nullable()->default(null);
            $table->string('reserva_evaluacion')->nullable()->default(null);
            $table->string('reserva_comentario')->nullable()->default(null);
            $table->string('vida_util')->nullable()->default(null);
            $table->string('vida_util_evaluacion')->nullable()->default(null);
            $table->string('vida_util_comentario')->nullable()->default(null);
            $table->string('volumen_total')->nullable()->default(null);
            $table->string('volumen_total_evaluacion')->nullable()->default(null);
            $table->string('volumen_total_comentario')->nullable()->default(null);
            $table->string('volumen_unitario')->nullable()->default(null);
            $table->string('volumen_unitario_evaluacion')->nullable()->default(null);
            $table->string('volumen_unitario_comentario')->nullable()->default(null);
            $table->string('volumen_comercializado')->nullable()->default(null);
            $table->string('volumen_comercializado_evaluacion')->nullable()->default(null);
            $table->string('volumen_comercializado_comentario')->nullable()->default(null);
            $table->string('procesamiento_mineral')->nullable()->default(null);
            $table->string('procesamiento_mineral_evaluacion')->nullable()->default(null);
            $table->string('procesamiento_mineral_comentario')->nullable()->default(null);
            $table->string('personal_perm_tecnicos')->nullable()->default(null);
            $table->string('personal_perm_tecnicos_evaluacion')->nullable()->default(null);
            $table->string('personal_perm_tecnicos_comentario')->nullable()->default(null);
            $table->string('permiso_anmac')->nullable()->default(null);
            $table->string('permiso_anmac_evaluacion')->nullable()->default(null);
            $table->string('permiso_anmac_comentario')->nullable()->default(null);
            $table->string('fecha_concesion')->nullable()->default(null);
            $table->string('fecha_concesion_evaluacion')->nullable()->default(null);
            $table->string('fecha_concesion_comentario')->nullable()->default(null);
            $table->string('anios_concesion')->nullable()->default(null);
            $table->string('anios_concesion_evaluacion')->nullable()->default(null);
            $table->string('anios_concesion_comentario')->nullable()->default(null);
            $table->string('inicio_explotacion')->nullable()->default(null);
            $table->string('inicio_explotacion_evaluacion')->nullable()->default(null);
            $table->string('inicio_explotacion_comentario')->nullable()->default(null);
            $table->string('compresores')->nullable()->default(null);
            $table->string('compresores_evaluacion')->nullable()->default(null);
            $table->string('compresores_comentario')->nullable()->default(null);
            $table->string('grupo_electrogeno')->nullable()->default(null);
            $table->string('grupo_electrogeno_evaluacion')->nullable()->default(null);
            $table->string('grupo_electrogeno_comentario')->nullable()->default(null);
            $table->string('camion_mineralero')->nullable()->default(null);
            $table->string('camion_mineralero_evaluacion')->nullable()->default(null);
            $table->string('camion_mineralero_comentario')->nullable()->default(null);
            $table->string('cargadora_frontal')->nullable()->default(null);
            $table->string('cargadora_frontal_evaluacion')->nullable()->default(null);
            $table->string('cargadora_frontal_comentario')->nullable()->default(null);
            $table->string('equipo_ventilacion')->nullable()->default(null);
            $table->string('equipo_ventilacion_evaluacion')->nullable()->default(null);
            $table->string('equipo_ventilacion_comentario')->nullable()->default(null);
            $table->string('martillo_neumatico')->nullable()->default(null);
            $table->string('martillo_neumatico_evaluacion')->nullable()->default(null);
            $table->string('martillo_neumatico_comentario')->nullable()->default(null);
            $table->string('via_decauville')->nullable()->default(null);
            $table->string('via_decauville_evaluacion')->nullable()->default(null);
            $table->string('via_decauville_comentario')->nullable()->default(null);
            $table->string('vagoneta')->nullable()->default(null);
            $table->string('vagoneta_evaluacion')->nullable()->default(null);
            $table->string('vagoneta_comentario')->nullable()->default(null);
            $table->string('bomba_desagote')->nullable()->default(null);
            $table->string('bomba_desagote_evaluacion')->nullable()->default(null);
            $table->string('bomba_desagote_comentario')->nullable()->default(null);
            $table->string('taller_equipado')->nullable()->default(null);
            $table->string('taller_equipado_evaluacion')->nullable()->default(null);
            $table->string('taller_equipado_comentario')->nullable()->default(null);
            $table->string('campamento')->nullable()->default(null);
            $table->string('campamento_evaluacion')->nullable()->default(null);
            $table->string('campamento_comentario')->nullable()->default(null);
            $table->string('vivienda')->nullable()->default(null);
            $table->string('vivienda_evaluacion')->nullable()->default(null);
            $table->string('vivienda_comentario')->nullable()->default(null);
            $table->string('meses_trabajo')->nullable()->default(null);
            $table->string('meses_trabajo_evaluacion')->nullable()->default(null);
            $table->string('meses_trabajo_comentario')->nullable()->default(null);
            $table->string('razones_meses_trabajo')->nullable()->default(null);
            $table->string('razones_meses_trabajo_evaluacion')->nullable()->default(null);
            $table->string('razones_meses_trabajo_comentario')->nullable()->default(null);



            //timestamp
            $table->integer('created_by')->nullable->default(null);
            $table->integer('updated_by')->nullable->default(null);
            $table->timestamps();
            $table->timestamp('deleted_at');










            $table->foreign('id_mina')->references('id')->on('mina_cantera') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_productor')->references('id')->on('form_alta_productores') ->onUpdate('cascade')
            ->onDelete('cascade');






            

            $table->dropForeign(['id_productor']);
            $table->foreign('id_productor')->references('id')->on('productores') ->onUpdate('cascade')
            ->onDelete('cascade');











            $table->string("id_mina_evaluacion")->nullable()->default(null);
            $table->string("id_mina_comentario")->nullable()->default(null);









            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id']);



        });
    */}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reinscripciones');
    }
}
