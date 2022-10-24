<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinaCanteraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mina_cantera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable(false);
            $table->string('localidad_mina_pais')->nullable()->default(null);
            $table->string('localidad_mina_provincia')->nullable()->default(null);
            $table->string('localidad_mina_departamento')->nullable()->default(null);
            $table->string('localidad_mina_localidad')->nullable()->default(null);
            $table->string('nombre')->nullable(false);
            $table->string('descripcion')->nullable()->default(null);
            $table->string('categoria')->nullable(false);
            $table->string('distrito_minero')->nullable()->default(null);
            $table->string('tipo_sistema')->nullable()->default(null);
            $table->string('longitud')->nullable()->default(null);
            $table->string('latitud')->nullable()->default(null);
            $table->string('labores')->nullable()->default(null);
            $table->bigInteger('id_producido')->nullable()->default(null);
            $table->string('plano_inmueble')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);

            $table->string('numero_expediente')->nullable()->default();
            $table->string('titulo_contrato_posecion')->nullable()->default();
            $table->string('resolucion_concesion_minera')->nullable()->default();
            $table->string('owner')->nullable()->default();
            $table->string('arrendatario')->nullable()->default();
            $table->string('concesionario')->nullable()->default();
            $table->string('otros')->nullable()->default();
            $table->string('acciones_a_desarrollar')->nullable()->default();
            $table->string('actividad')->nullable()->default();
            $table->string('sustancias_de_aprovechamiento_comun')->nullable()->default();
            $table->string('otro_caracter_acalaracion')->nullable()->default();
            $table->string('sustancias_de_aprovechamiento_comun_aclaracion')->nullable()->default();
            $table->string('id_formulario')->nullable()->default();


            //timestamp
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mina_cantera');
    }
}
