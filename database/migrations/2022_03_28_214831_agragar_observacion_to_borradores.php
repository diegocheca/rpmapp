<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgragarObservacionToBorradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_alta_productores', function (Blueprint $table) {
            //
            $table->text('observacion')
            ->after('presentador_dni')
            ->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borradores', function (Blueprint $table) {
            //
        });
    }
}
