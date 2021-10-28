<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMendozaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_productoresMendoza', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_formulario_alta');
            $table->string('decreto3737', 100)->default(null)->nullable();
            $table->boolean('decreto3737_correcto')->default(null)->nullable();
            $table->string('obs_decreto3737', 200)->default(null)->nullable();
            
            $table->string('situacion_mina', 100)->default(null)->nullable();
            $table->boolean('situacion_mina_correcto')->default(null)->nullable();
            $table->string('obs_situacion_mina', 200)->default(null)->nullable();

            $table->string('concesion_minera_asiento_n', 100)->default(null)->nullable();
            $table->integer('concesion_minera_fojas')->default(null)->nullable();
            $table->integer('concesion_minera_tomo_n')->default(null)->nullable();
            $table->string('concesion_minera_reg_m_y_d', 100)->default(null)->nullable();
            $table->string('concesion_minera_reg_cant', 100)->default(null)->nullable();
            $table->string('concesion_minera_reg_men', 100)->default(null)->nullable();
            $table->string('concesion_minera_reg_d_y_c', 100)->default(null)->nullable();
            $table->string('obs_datos_minas', 200)->default(null)->nullable();

            $table->float('paso_mend_progreso', 3,2)->default(0)->nullable();
            $table->float('paso_mend_aprobado', 3,2)->default(0)->nullable();
            $table->float('paso_mend_reprobado', 3,2)->default(0)->nullable();
            
            $table->integer('created_by')->default(null)->nullable();
            $table->integer('updated_by')->default(null)->nullable();
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
        Schema::dropIfExists('form_alta_productoresMendoza');
    }
}
