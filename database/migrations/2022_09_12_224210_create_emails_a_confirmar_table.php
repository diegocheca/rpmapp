<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsAConfirmarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails_a_confirmar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable(false);
            $table->string('codigo')->nullable()->default(null);
            $table->dateTime('confirmed_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish2_ci';
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
        Schema::dropIfExists('emails_a_confirmar');
    }
}
