<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductorMinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productor_mina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_mina')->nullable()->default(null);
            $table->integer('id_productor')->nullable()->default(null);
            $table->integer('id_formulario')->nullable()->default(null);
            $table->integer('id_dia')->nullable()->default(null);
            $table->integer('id_personal')->nullable()->default(null);
            $table->string('num_expediente_SIGETRAMI',50)->nullable()->default(null);
            $table->string('constancia_otros',50)->nullable()->default(null);
            $table->string('resol_concecion_minera',50)->nullable()->default(null);
            $table->date('fecha_preinscripcion')->nullable(false);
            $table->date('fecha_renovacion')->nullable()->default(null);
            $table->boolean('primera_inscripcion')->nullable()->default(null);
            $table->string('caracter',11)->nullable()->default(null);
            $table->string('constancia_posecion',50)->nullable()->default(null);
            $table->string('periodo',50)->nullable()->default(null);
            
            $table->integer('id_destino')->nullable()->default(null);
            $table->string('mercado_provincia',50)->nullable()->default(null);
            $table->string('mercado_provincias',50)->nullable()->default(null);
            $table->string('mercado_exportacion',50)->nullable()->default(null);
            $table->integer('id_producido')->nullable()->default(null);

            /*$table->foreign('id_mina')->references('id')->on('mina_cantera') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_productor')->references('id')->on('form_alta_productores') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_destino')->references('id')->on('empresa_destino') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_dia')->references('id')->on('iia_dia') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_producido')->references('id')->on('producido') ->onUpdate('cascade')
            ->onDelete('cascade');*/

            //timestamp
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');


            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productor_mina');
    }
}
