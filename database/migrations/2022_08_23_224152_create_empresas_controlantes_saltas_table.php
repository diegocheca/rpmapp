<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasControlantesSaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_controlantes_salta', function (Blueprint $table) {
            $table->id();
            $table->integer('id_formulario_alta_salta');
            $table->string('tipo',50)->comment('Puede ser: controlantes, controladas, vinculadas');//
            $table->string('cuit',18)->comment('En los 3 tipos');//esta en todos

            $table->string('calle',100)->nullable()->default(null);
            $table->string('numero',8)->nullable()->default(null);
            $table->string('telefono',35)->nullable()->default(null);
            $table->integer('provincia')->default(null);
            $table->integer('departamento')->default(null);
            $table->string('localidad',50)->nullable()->default(null);
            $table->integer('cp')->nullable()->default(null);
            $table->string('otro',256)->nullable()->default(null);

            $table->timestamp('created_by')->useCurrent = true;
            $table->integer('updated_by');
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
        Schema::dropIfExists('empresas_controlantes_salta');
    }
}
