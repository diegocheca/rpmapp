<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DniprodEditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('form_alta_productores', function (Blueprint $table) {
            //
            $table->string('cargo_empresa', 100)->after('obs_constancia_paga_canon_fin')->default(null)->nullable();
            $table->string('presentador_nom_apellido', 100)->after('cargo_empresa')->default(null)->nullable();
            $table->bigInteger('presentador_dni')->after('presentador_nom_apellido')->default(0)->nullable();

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
        Schema::table('form_alta_productores', function (Blueprint $table) {
            //
        });
    }
}
