<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRincripciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reinscripciones', function (Blueprint $table) {
            $table->string("id_productor_evaluacion")->nullable()->default(null);
            $table->string("id_productor_comentario")->nullable()->default(null);
            $table->string("id_mina_evaluacion")->nullable()->default(null);
            $table->string("id_mina_comentario")->nullable()->default(null);
            $table->boolean("production_checkbox")->nullable()->default();
            $table->string("production_checkbox_evaluacion")->nullable()->default(null);
            $table->string("production_checkbox_comentario")->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('reinscripciones');

    }
}
