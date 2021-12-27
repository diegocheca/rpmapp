<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioAltaProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_alta_prods', function (Blueprint $table) {
            $table->id();
            $table->string('tipoProductor',20)->nullable()->default(null);
            $table->string('cargoEmpresa',100)->nullable()->default(null);
            $table->string('presentadorNomApellido',100)->nullable()->default(null);
            $table->bigInteger('presentador_dni');
            $table->integer('provincia');
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->string('estado',20)->nullable()->default(null);
            $table->string('observacion',150)->nullable()->default(null);
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
        Schema::dropIfExists('formulario_alta_prods');
    }
}
