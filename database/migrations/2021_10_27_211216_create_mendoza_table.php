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
        Schema::create('mendoza', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('decreto3737', 100)->default(null);
            $table->boolean('decreto3737_correcto')->default(null);
            $table->string('obs_gestor_nombre_apellido', 200)->default(null);
            
            $table->string('situacion_mina', 100)->default(null);
            $table->boolean('situacion_mina_correcto')->default(null);
            $table->string('obs_situacion_mina', 200)->default(null);

            $table->string('concesion_minera_asiento_n', 100)->default(null);
            $table->integer('concesion_minera_fojas')->default(null);
            $table->integer('concesion_minera_tomo_n')->default(null);
            $table->string('concesion_minera_reg_m_y_d', 100)->default(null);
            $table->string('concesion_minera_reg_cant', 100)->default(null);
            $table->string('concesion_minera_reg_men', 100)->default(null);
            $table->string('concesion_minera_reg_d_y_c', 100)->default(null);
            
            $table->integer('created_by')->default(null);
            $table->integer('updated_by')->default(null);
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
        Schema::dropIfExists('mendoza');
    }
}
