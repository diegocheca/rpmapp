<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductosSalta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function( Blueprint $table) {
            $table->string('expediente',256)->nullable()->default(null);
            $table->string('derecho',256)->nullable()->default(null);
            $table->string('sustancia',256)->nullable()->default(null);
            $table->string('ubicacion',256)->nullable()->default(null);
            $table->string('superficie',256)->nullable()->default(null);
            $table->string('etapa',256)->nullable()->default(null);
            $table->string('resolucion',256)->nullable()->default(null);
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
