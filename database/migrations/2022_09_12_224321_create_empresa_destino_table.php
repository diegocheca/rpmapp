<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaDestinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_destino', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_empresa')->nullable(false);
            $table->string('dom_empresa_pais')->nullable()->default(null);
            $table->string('dom_empresa_provincia')->nullable()->default(null);
            $table->string('dom_empresa_departamento')->nullable()->default(null);
            $table->string('dom_empresa_cp')->nullable()->default(null);
            $table->string('actividad_empresa')->nullable(false);
            $table->integer('created_by')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->timestamps();
            $table->timestamp('deleted_at');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_destino');
    }
}
