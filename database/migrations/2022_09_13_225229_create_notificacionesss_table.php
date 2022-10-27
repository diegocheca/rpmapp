<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionesssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacionesss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message',256)->nullable(false);
            $table->integer('user_id')->nullable()->default(null);
            $table->string('name_id',256)->nullable();
            $table->integer('table_id')->nullable()->default(null);
            $table->string('url',256)->nullable();
            $table->string('notification_id',256)->nullable();
            $table->dateTime('seen_at', $precision = 0)->default(null)->nullable();
            
            $table->string('remember_token',256)->nullable();
            
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
        Schema::dropIfExists('notificacionesss');
    }
}
