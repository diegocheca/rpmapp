<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesProductor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_productor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_productor')->nullable(false);
            $table->bigInteger('id_provincia')->nullable(false);

            $table->string('titulo')->nullable(false)->default(null);
            $table->string('mensaje')->nullable(false)->default(null);
            $table->enum('estado', ['pendiente', 'enviado', 'error'])->default('pendiente');

            $table->foreign('id_productor')->references('id')->on('productores')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_provincia')->references('id')->on('Provincia')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
            $table->index(['id', 'id_productor', 'id_provincia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensajes_productor', function (Blueprint $table) {
            //
        });
    }
}
