<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobRecibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_recibos', function (Blueprint $table) {
            $table->id();
            $table->integer('provincia_id');
            $table->longText('datos')->nullable();
            $table->string('tabla', 50)->default(null)->nullable();
            $table->string('estado', 35)->default(null)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_recibos');
    }
}
