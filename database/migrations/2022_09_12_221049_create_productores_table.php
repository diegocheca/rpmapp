<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productores', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('cuit', 13)->nullable(false);
            $table->string('razonsocial', 100)->nullable(false);
            $table->integer('numeroproductor')->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('domicilio_prod', 150)->nullable(false);
            $table->string('tiposociedad', 150)->nullable()->default(null);
            $table->string('inscripciondgr', 256)->nullable()->default(null);
            $table->string('constaciasociedad', 256)->nullable()->default(null);
            $table->string('leal_calle', 100)->nullable()->default(null);
            $table->integer('leal_numero')->nullable()->default(null);
            $table->string('leal_telefono', 15)->nullable()->default(null);
            $table->string('leal_pais', 50)->nullable()->default(null);
            $table->string('leal_provincia', 50)->nullable()->default(null);
            $table->string('leal_departamento', 50)->nullable()->default(null);
            $table->string('leal_localidad', 50)->nullable()->default(null);
            $table->integer('leal_cp')->nullable()->default(null);
            $table->string('leal_otro', 100)->nullable()->default(null);
            $table->string('administracion_calle', 100)->nullable()->default(null);
            $table->string('administracion_numero', 15)->nullable()->default(null);
            $table->string('administracion_telefono', 15)->nullable()->default(null);
            $table->string('administracion_pais', 50)->nullable()->default(null);
            $table->string('administracion_provincia', 50)->nullable()->default(null);
            $table->string('administracion_departamento', 50)->nullable()->default(null);
            $table->string('administracion_localidad', 50)->nullable()->default(null);
            $table->integer('administracion_cp')->nullable()->default(null);
            $table->string('administracion_otro', 50)->nullable()->default(null);
            $table->string('numero_expdiente', 20)->nullable()->default(null);
            $table->string('estado', 50)->nullable()->default('en proceso');
            $table->integer('id_formulario')->nullable()->default(0);

            //timestamp
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');


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
        Schema::dropIfExists('productores');
    }
}
