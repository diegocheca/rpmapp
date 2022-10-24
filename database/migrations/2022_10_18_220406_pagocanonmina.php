<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagocanonmina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('pagocanonmina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_prod_min')->nullable(false);
            $table->boolean('pagado')->default(false);
            $table->double('monto')->nullable()->default(0);
            $table->date('fecha_pago')->nullable()->default(null);
            $table->date('fecha_desde')->nullable()->default(null);
            $table->date('fecha_hasta')->nullable()->default(null);
            $table->string('estado')->nullable()->default("aprobado");
            $table->integer('created_by')->default(1);

            $table->timestamps();
            $table->timestamp('deleted_at')->nullable()->default(null);

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
        //
    }
}
