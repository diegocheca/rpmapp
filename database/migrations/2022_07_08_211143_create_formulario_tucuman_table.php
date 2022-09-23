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
            $table->string('cuit',256)->nullable()->default(null);
            $table->boolean('cuit_correcto')->default(null);
            $table->string('cuit_obs',256)->default(null);

            $table->string('dni_frente_persona',256)->nullable()->default(null);
            $table->boolean('dni_frente_persona_correcto')->default(null);
            $table->string('dni_frente_persona_obs',256)->default(null);

            $table->string('dni_reverso_persona',256)->nullable()->default(null);
            $table->boolean('dni_reverso_persona_correcto')->default(null);
            $table->string('dni_reverso_persona_obs',256)->default(null);

            $table->string('dni_frente_gerente',256)->nullable()->default(null);
            $table->boolean('dni_frente_gerente_correcto')->default(null);
            $table->string('dni_frente_gerente_obs',256)->default(null);

            $table->string('dni_reverso_gerente',256)->nullable()->default(null);
            $table->boolean('dni_reverso_gerente_correcto')->default(null);
            $table->string('dni_reverso_gerente_obs',256)->default(null);

            $table->string('dni_frente_representante_legal',256)->nullable()->default(null);
            $table->boolean('dni_frente_representante_legal_correcto')->default(null);
            $table->string('dni_frente_representante_legal_obs',256)->default(null);

            $table->string('dni_reverso_representante_legal',256)->nullable()->default(null);
            $table->boolean('dni_reverso_representante_legal_correcto')->default(null);
            $table->string('dni_reverso_representante_legal_obs',256)->default(null);

            $table->string('personaria_de_la_socidedad',256)->nullable()->default(null);
            $table->boolean('personaria_de_la_socidedad_correcto')->default(null);
            $table->string('personaria_de_la_socidedad_obs',256)->default(null);

            $table->string('personeria_del_representante_legal',256)->nullable()->default(null);
            $table->boolean('personeria_del_representante_legal_correcto')->default(null);
            $table->string('personeria_del_representante_legal_obs',256)->default(null);

            $table->string('decreto_de_nombramiento',256)->nullable()->default(null);
            $table->boolean('decreto_de_nombramiento_correcto')->default(null);
            $table->string('decreto_de_nombramiento_obs',256)->default(null);

            $table->string('representante_apellido',80)->nullable()->default(null);
            $table->boolean('representante_apellido_correcto')->default(null);
            $table->string('representante_apellido_obs',256)->default(null);

            $table->string('representante_nombre',80)->nullable()->default(null);
            $table->boolean('representante_nombre_correcto')->default(null);
            $table->string('representante_nombre_obs',256)->default(null);

            $table->string('representante_dni', 12)->nullable()->default(null);
            $table->boolean('representante_dni_correcto')->default(null);
            $table->string('representante_dni_obs',256)->default(null);

            $table->string('persona_autorizada_nombre',80)->nullable()->default(null);
            $table->boolean('persona_autorizada_nombre_correcto')->default(null);
            $table->string('persona_autorizada_nombre_obs',256)->default(null);

            $table->string('persona_autorizada_apellido',80)->nullable()->default(null);
            $table->boolean('persona_autorizada_apellido_correcto')->default(null);
            $table->string('persona_autorizada_apellido_obs',256)->default(null);

            $table->string('persona_autorizada_dni', 12)->nullable()->default(null);
            $table->boolean('persona_autorizada_dni_correcto')->default(null);
            $table->string('persona_autorizada_dni_obs',256)->default(null);

            $table->string('persona_autorizada_telefono',20)->nullable()->default(null);
            $table->boolean('persona_autorizada_telefono_correcto')->default(null);
            $table->string('persona_autorizada_telefono_obs',256)->default(null);

            $table->string('persona_autorizada_email',80)->nullable()->default(null);
            $table->boolean('persona_autorizada_email_correcto')->default(null);
            $table->string('persona_autorizada_email_obs',256)->default(null);

            $table->string('persona_autorizada_domicilio', 80)->nullable()->default(null);
            $table->boolean('persona_autorizada_domicilio_correcto')->default(null);
            $table->string('persona_autorizada_domicilio_obs',256)->default(null);

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
