<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioTucumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_tucuman', function (Blueprint $table) {
            $table->id();
            $table->integer('id_formulario_alta');
            $table->string('tipo',50);
            $table->string('dni_frente_persona',256)->nullable()->default(null);
            $table->string('dni_reverso_persona',256)->nullable()->default(null);
            $table->string('dni_frente_gerente',256)->nullable()->default(null);
            $table->string('dni_reverso_gerente',256)->nullable()->default(null);
            $table->string('dni_frente_representante_legal',256)->nullable()->default(null);
            $table->string('dni_reverso_representante_legal',256)->nullable()->default(null);
            $table->string('representante_apellido',80)->nullable()->default(null);
            $table->string('representante_nombre',80)->nullable()->default(null);
            $table->string('representante_dni', 12)->nullable()->default(null);
            $table->string('persona_autorizada_nombre',80)->nullable()->default(null);
            $table->string('persona_autorizada_apellido',80)->nullable()->default(null);
            $table->string('persona_autorizada_dni', 12)->nullable()->default(null);
            $table->string('persona_autorizada_telefono',20)->nullable()->default(null);
            $table->string('persona_autorizada_email',80)->nullable()->default(null);
            $table->string('persona_autorizada_domicilio', 80)->nullable()->default(null);
            $table->string('personaria_de_la_socidedad',256)->nullable()->default(null);
            $table->string('personeria_del_representante_legal',256)->nullable()->default(null);
            $table->string('decreto_de_nombramiento',256)->nullable()->default(null);
            $table->timestamp('created_by')->useCurrent = true;
            $table->integer('updated_by');
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
        Schema::dropIfExists('formulario_tucumen');
    }
}
