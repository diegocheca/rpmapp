<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIiaDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iia_dia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_formulario');
            $table->date('fecha_alta_dia')->nullable()->default(null);
            $table->date('fecha_vencimiento')->nullable()->default(null);
            $table->longText('actividades')->default(null) ;
            $table->longText('acciones_a_desarrollar')->nullable()->default(null);
            $table->string('dia',256)->nullable()->default(null);
            $table->string('iia',256)->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            
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
        Schema::dropIfExists('iia_dia');
    }
}
