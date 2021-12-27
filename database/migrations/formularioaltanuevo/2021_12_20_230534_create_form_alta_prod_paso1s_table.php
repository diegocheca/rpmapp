<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProdPaso1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_prod_paso1s', function (Blueprint $table) {
            $table->id();
            $table->integer('id_formulario');
            $table->string('cuit',13)->nullable()->default(null);
            $table->string('razonsocial',100)->nullable()->default(null);
            $table->string('numeroproductor',12)->nullable()->default(null);
            $table->string('email',100)->nullable()->default(null);
            $table->string('tiposociedad',25)->nullable()->default(null);
            $table->string('inscripciondgr',256)->nullable()->default(null);
            $table->string('constaciasociedad',256)->nullable()->default(null);
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->string('estado',20)->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    //php artisan migrate --path=database/migrations/formularioaltanuevo/2021_12_20_230534_create_form_alta_prod_paso1s_table.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_alta_prod_paso1s');
    }
}
