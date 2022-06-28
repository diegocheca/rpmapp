<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35)->nullable();
            $table->string('email', 50)->nullable();
            $table->integer('user')->nullable(false); // 1 ver - 2 crear - 3 editar - mas para mas estados
            $table->text('message')->nullable(false); // json con los inputs
            $table->text('file')->nullable(); // json con los inputs
            $table->string('status', 30)->nullable()->default('Sin ver');
            $table->dateTime('seen_at')->nullable()->default(null);
            $table->integer('seen_by')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
