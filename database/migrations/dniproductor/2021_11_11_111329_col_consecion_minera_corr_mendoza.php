<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColConsecionMineraCorrMendoza extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_alta_productoresMendoza', function (Blueprint $table) {
            $table->boolean('concesion_minera_reg_d_y_c_correcto')->after('concesion_minera_reg_d_y_c')->default(null)->nullable();
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
        Schema::table('form_alta_productoresMendoza', function (Blueprint $table) {
            //
        });
    }
}
