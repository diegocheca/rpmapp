<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineralesBorradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minerales_borradores', function (Blueprint $table) {

            $table->bigIncrements('id_formulario');
            $table->in('id_mineral')->nullable()->default(null);
            $table->string('lugar_donde_se_encuentra', 200)->default(null);
            $table->string('variedad', 100)->default(null);
            $table->string('segunda_cat_mineral_explotado', 200)->default(null);
            $table->string('mostrar_lugar_segunda_cat', 100)->default(null);
            $table->string('mostrar_otro_mineral_segunda_cat', 100)->default(null);
            $table->string('otro_mineral_segunda_cat', 100)->default(null);
            $table->string('observacion', 100)->default(null);
            $table->string('clase_text_area_presentacion', 100)->default(null);
            $table->string('clase_text_evaluacion_de_text_area_presentacion', 100)->default(null);
            $table->string('texto_validacion_text_area_presentacion', 100)->default(null);
            $table->string('presentacion_valida', 100)->default(null);
            $table->string('evaluacion_correcto', 100)->default(null);
            $table->string('observacion_autoridad', 100)->default(null);
            $table->string('clase_text_area', 100)->default(null);
            $table->string('clase_text_evaluacion_de_text_area', 100)->default(null);
            $table->string('texto_validacion_text_area', 100)->default(null);
            $table->text('obs_valida')->default(null);
            $table->text('lista_de_minerales_array')->default(null);
            $table->string('thumb', 256)->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('estado', 100)->default('sin revisar');

            //timestamp
            $table->integer('created_by')->nullable->default(null);
            $table->integer('updated_by')->nullable->default(null);
            $table->timestamps();
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minerales__borradores');
    }
}
