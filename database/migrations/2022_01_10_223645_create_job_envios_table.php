<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_envios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('datos')->nullable();
            $table->string('estado', 35)->default(null)->nullable();
            $table->string('tabla', 50)->default(null)->nullable();

            $table->dateTime('inicio', $precision = 0)->default(null)->nullable();
            $table->dateTime('fin', $precision = 0)->default(null)->nullable();
            $table->integer('provincia_id');
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
        Schema::dropIfExists('job_envios');
    }
}
