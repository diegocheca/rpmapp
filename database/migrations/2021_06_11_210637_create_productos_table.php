<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_reinscripcion')->nullable()->default(null);
            $table->string('nombre_mineral', 50)->default(null);
            $table->string('variedad', 100)->default(null);
            $table->double('produccion')->default(null);
            $table->string('unidades', 10)->default(null);
            $table->string('otra_unidad', 20)->default(null);
            $table->double('precio_venta')->default(null);
            $table->bigInteger('created_by')->nullable()->default(null);
            $table->string('estado', 50)->default(null);

            $table->foreign('id_reinscripcion')->references('id')->on('reinscripciones') ->onUpdate('cascade')
            ->onDelete('cascade');
            

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('productos');
    }
}
