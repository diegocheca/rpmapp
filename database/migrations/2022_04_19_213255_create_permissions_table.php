<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_form', function (Blueprint $table) {
            $table->id();
            $table->integer('id_provincia')->nullable(false);//id de cada provincia
            $table->integer('accion')->nullable(false); // 1 ver - 2 crear - 3 editar - mas para mas estados
            $table->integer('id_rol')->nullable(false); // 1 Administrator - 2 user - 3 Autoridad -4 Productor
            $table->integer('formulario')->nullable(false); // 1 alta de productores - 2 reinscripcion
            $table->integer('pagina')->nullable(); // 1 pagina1  - 2 pagina2 - ... - 8 pagina mendoza
            $table->integer('estado')->nullable(); // 1 borrador  - 2 presentado - 3 observado - 4 corregido - 5 aprobado
            $table->text('data')->nullable(false); // json con los inputs
            $table->integer('edited_by')->nullable(false); // id de quien escribio
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
        Schema::dropIfExists('permissions');
    }
}
