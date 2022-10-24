<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProductorSaltasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_productoresSalta', function (Blueprint $table) {
            $table->id();
            $table->integer('id_formulario_alta');
            $table->string('tipo',50)->comment('Puede ser: Plantas, Productores o Exploradores');//
            $table->string('representante_legal_nombre',100)->comment('En los 3 tipos');//esta en todos
            $table->string('representante_legal_apellido',100)->comment('En los 3 tipos');
            $table->string('representante_legal_dni',12)->comment('En los 3 tipos');
            $table->string('representante_legal_email',100)->comment('En los 3 tipos');
            $table->string('representante_legal_cargo',100)->comment('En los 3 tipos');
            $table->string('representante_legal_domicilio', 100)->nullable()->default(null)->comment('Agregado por las dudas, no esta en el formulario, seria para los 3 tipos');
            $table->string('nacionalidad',25)->nullable()->default(null)->comment('En los 3 tipos');
            $table->string('telefono',20)->comment('En los 3 tipos');//not null
            //$table->string('dni',20);//esta como dni de quien lo presenta

            $table->string('responsable_nombre',100)->comment('En los 3 tipos');
            $table->string('responsable_apellido',100)->comment('En los 3 tipos');
            $table->string('responsable_dni',100)->comment('En los 3 tipos');
            $table->string('responsable_titulo',100)->comment('En los 3 tipos');
            $table->string('responsable_matricula',100)->comment('En los 3 tipos');

            //TABLAS en el formulario impreso  (REINSCRIPCIÓN)
            $table->string('superficie_mina',50)->nullable()->default(null)->comment('Tabla: Exploradores, Productores');
            $table->string('volumenes_de_extraccion_periodo_anterior',50)->nullable()->default(null)->comment('En tabla: Plantas, Productores');
            $table->string('n_resolucion_iia',50)->nullable()->default(null)->comment('En tabla: Productores');
            $table->string('etapa_de_exploracion',50)->nullable()->default(null)->comment('En tabla: Exploradores - Etapa de la exploracion Superficial/Avanzada');
            $table->string('n_resolucion_aprobacion_informe',50)->nullable()->default(null)->comment('En tabla: Exploradores - Etapa de la exploracion Superficial/Avanzada');
            $table->string('etapa_de_exploracion_avanzada',50)->nullable()->default(null)->comment('En tabla: Productores - Etapa Aprobada (exploración/Exploración Avanzada/Explotación)');

            $table->string('volumenes_anuales_de_materias_primas',50)->nullable()->default(null)->comment('En tabla: Plantas - Volúmenes anuales de materias primas');
            $table->string('material_obtenido',50)->nullable()->default(null)->comment('En tabla: Plantas - Material Obtenido');

            $table->string('autorizacion_extractivas_exploratorias',256)->nullable()->default(null);
            //Fin tablas

           
            //ley 24196
            $table->string('ley_24196_numero',10)->nullable()->default('N')->comment('en formulario: Productores, Exploradores');
            $table->string('ley_24196_inscripcion_renar',30)->nullable()->default('N')->comment('en formulario: Productores, Exploradores');
            $table->string('ley_24196_explosivos')->nullable()->comment('en formulario: Productores, Exploradores');
            $table->char('ley_24196_propiedad',1)->nullable()->comment('en formulario: Productores, Exploradores');


            //ARCHIVOS - DOCUMENTACION
            $table->string('estado_contable',256)->nullable()->default(null)->comment('En los 3 tipos');
            
            $table->string('listado_de_maquinaria',256)->nullable()->default(null)->comment('En: exploradores y productores');

            $table->string('regalias',256)->nullable()->default(null)->comment('En: productores');

            
            $table->string('personas_afectadas',256)->nullable()->default(null)->comment('En los 3 -  Cantidad de personal afectado a las tareas extractivas o de exploración. Identificación de los responsables de las plantas de tratamiento.');

            $table->string('multas',256)->nullable()->default(null)->comment('En: exploradores y productores - Cantidad de personal afectado a las tareas extractivas o de exploración. Identificación de los responsables de las plantas de tratamiento.');


            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('form_alta_productoresSalta');
    }
}
