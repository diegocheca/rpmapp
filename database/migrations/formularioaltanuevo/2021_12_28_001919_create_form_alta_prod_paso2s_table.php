<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProdPaso2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_prod_paso2s', function (Blueprint $table) {
            $table->id();
            $table->integer('l_id_formulario');
            $table->string('l_calle',100)->nullable()->default(null);
            $table->string('l_numero',8)->nullable()->default(null);
            $table->string('l_telefono',35)->nullable()->default(null);
            $table->integer('l_provincia')->default(null);
            $table->integer('l_departamento')->default(null);
            $table->string('l_localidad',50)->nullable()->default(null);
            $table->integer('l_cp')->nullable()->default(null);
            $table->string('l_otro',256)->nullable()->default(null);
            $table->integer('l_created_by')->nullable()->default(null);
            $table->integer('l_updated_by')->nullable()->default(null);
            $table->string('l_estado',20)->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_alta_prod_paso2s');
    }
}
