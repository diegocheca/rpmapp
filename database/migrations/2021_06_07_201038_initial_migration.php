<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->string('email')->unique()->default(null);
            $table->text('message')->nullable()->default(null);
            $table->string('estado')->nullable(false)->default('Sin leer');
            $table->timestamp('deleted_at');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });

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

        Schema::create('empresa_destino', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_empresa')->nullable(false);
            $table->string('dom_empresa_pais')->nullable()->default(null);
            $table->string('dom_empresa_provincia')->nullable()->default(null);
            $table->string('dom_empresa_departamento')->nullable()->default(null);
            $table->string('dom_empresa_cp')->nullable()->default(null);
            $table->string('actividad_empresa')->nullable(false);
            $table->integer('created_by')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->timestamp('deleted_at');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });

        Schema::create('form_alta_productores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_productor')->nullable(false)->default('productor');
            $table->integer('cuit')->nullable(false);
            $table->tinyInteger('cuit_correcto')->nullable()->default(null);
            $table->string('obs_cuit')->nullable()->default(null);
            $table->string('razonsocial')->nullable(null);
            $table->tinyInteger('razon_social_correcto')->nullable()->default(null);
            $table->string('obs_razon_social')->nullable()->default(null);
            $table->integer('numeroproductor')->nullable(false)->default(0);
            $table->tinyInteger('numeroproductor_correcto')->nullable()->default(null);
            $table->string('obs_numeroproductor')->nullable()->default(null);
            $table->string('email')->nullable(false);
            $table->tinyInteger('email_correcto')->nullable()->default(null);
            $table->string('obs_email')->nullable()->default(null);
            $table->string('tiposociedad')->nullable()->default(null);
            $table->tinyInteger('tiposeociedad_correcto')->nullable()->default(null);
            $table->string('obs_tiposociedad')->nullable()->default(null);
            $table->string('inscripciondgr')->nullable()->default(null);
            $table->tinyInteger('inscripciondgr_correcto')->nullable()->default(null);
            $table->string('obs_inscripciondgr')->nullable()->default(null);
            $table->string('constaciasociedad')->nullable()->default(null);
            $table->tinyInteger('constaciasociedad_correcto')->nullable()->default(null);
            $table->string('obs_constaciasociedad')->nullable()->default(null);
            $table->float('paso_1_progreso')->nullable()->default(null);
            $table->float('paso_1_aprobado')->nullable()->default(null);
            $table->float('paso_1_reprobado')->nullable()->default(null);
            $table->string('leal_calle')->nullable()->default(null);
            $table->integer('leal_numero')->nullable()->default(null);
            $table->string('leal_telefono')->nullable()->default(null);
            $table->string('leal_pais')->nullable()->default(null);
            $table->string('leal_provincia')->nullable()->default(null);
            $table->string('leal_departamento')->nullable()->default(null);
            $table->string('leal_localidad')->nullable()->default(null);
            $table->integer('leal_cp')->nullable()->default(null);
            $table->string('leal_otro')->nullable()->default(null);
            $table->string('administracion_calle')->nullable()->default(null);
            $table->string('administracion_numero')->nullable()->default(null);
            $table->string('administracion_telefono')->nullable()->default(null);
            $table->string('administracion_pais')->nullable()->default(null);
            $table->string('administracion_provincia')->nullable()->default(null);
            $table->string('administracion_departamento')->nullable()->default(null);
            $table->string('administracion_localidad')->nullable()->default(null);
            $table->integer('administracion_cp')->nullable()->default(null);
            $table->string('administracion_otro')->nullable()->default(null);
            $table->string('numero_expdiente')->nullable()->default(null);
            $table->string('categoria')->nullable()->default(null);
            $table->string('nombre_mina')->nullable()->default(null);
            $table->string('descripcion_mina')->nullable()->default(null);
            $table->string('distrito_minero')->nullable()->default(null);
            $table->string('mina_cantera')->nullable()->default(null);
            $table->string('plano_inmueble')->nullable()->default(null);
            $table->text('minerales_variedad')->nullable()->default(null);
            $table->tinyInteger('owner')->default(0);
            $table->tinyInteger('arrendatario')->default(0);
            $table->tinyInteger('concesionario')->default(0);
            $table->tinyInteger('otros')->default(0);
            $table->string('titulo_contrato_posecion')->nullable()->default(null);
            $table->string('resolucion_concesion_minera')->nullable()->default(null);
            $table->string('constancia_pago_canon')->nullable()->default(null);
            $table->string('iia')->nullable()->default(null);
            $table->string('dia')->nullable()->default(null);
            $table->string('acciones_a_desarrollar')->nullable()->default(null);
            $table->string('actividad')->nullable()->default(null);
            $table->dateTime('fecha_alta_dia')->nullable()->default(null);
            $table->dateTime('fecha_vencimiento_dia')->nullable()->default(null);
            $table->string('localidad_mina_pais')->nullable()->default(null);
            $table->string('localidad_mina_provincia')->nullable()->default(null);
            $table->string('localidad_mina_departamento')->nullable()->default(null);
            $table->string('localidad_mina_localidad')->nullable()->default(null);
            $table->string('tipo_sistema')->nullable()->default(null);
            $table->string('longitud')->nullable()->default(null);
            $table->string('latitud')->nullable()->default(null);
            $table->string('estado')->default("en proceso");
            $table->string('tipo_tramite')->nullable(false)->default('inscripcion');
            $table->timestamp('deleted_at');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });

        Schema::create('iia_dia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_alta_dia')->nullable()->default(null);
            $table->date('fecha_vencimiento')->nullable()->default(null);
            $table->longText('actividades')->default(null) ;
            $table->string('acciones_a_desarrollar')->nullable()->default(null);
            $table->string('archivo_dia')->nullable()->default(null);
            $table->string('constancia_inscripcion_ia')->nullable()->default(null);
            $table->integer('created_by')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);
            $table->timestamp('deleted_at');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });

        Schema::create('producido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('unidades');
            $table->double('precio_venta')->nullable()->default(null);

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });

        Schema::create('mina_cantera', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable(false);
            $table->string('localidad_mina_pais')->nullable()->default(null);
            $table->string('localidad_mina_provincia')->nullable()->default(null);
            $table->string('localidad_mina_departamento')->nullable()->default(null);
            $table->string('localidad_mina_localidad')->nullable()->default(null);
            $table->string('nombre')->nullable(false);
            $table->string('descripcion')->nullable()->default(null);
            $table->string('categoria')->nullable(false);
            $table->string('distrito_minero')->nullable()->default(null);
            $table->string('tipo_sistema')->nullable()->default(null);
            $table->string('longitud')->nullable()->default(null);
            $table->string('latitud')->nullable()->default(null);
            $table->string('labores')->nullable()->default(null);
            $table->bigInteger('id_producido')->nullable()->default(null);
            $table->string('plano_inmueble')->nullable()->default(null);
            $table->integer('created_by')->nullable()->default(null);
            $table->string('estado')->nullable()->default(null);

            // $table->index(['id']);
            $table->foreign('id_producido')->references('id')->on('producido') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        Schema::create('productores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cuit', 13)->nullable(false);
            $table->string('razonsocial', 100)->nullable(false);
            $table->integer('numeroproductor')->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('domicilio_prod', 150)->nullable(false);
            $table->string('tiposociedad', 150)->default(null);
            $table->string('inscripciondgr', 256)->default(null);
            $table->string('constaciasociedad', 256)->default(null);
            $table->string('leal_calle', 100)->default(null);
            $table->integer('leal_numero')->nullable()->default(null);
            $table->string('leal_telefono', 15)->default(null);
            $table->string('leal_pais', 50)->default(null);
            $table->string('leal_provincia', 50)->default(null);
            $table->string('leal_departamento', 50)->default(null);
            $table->string('leal_localidad', 50)->default(null);
            $table->integer('leal_cp')->nullable()->default(null);
            $table->string('leal_otro', 100)->default(null);
            $table->string('administracion_calle', 100)->default(null);
            $table->string('administracion_numero', 15)->default(null);
            $table->string('administracion_telefono', 15)->default(null);
            $table->string('administracion_pais', 50)->default(null);
            $table->string('administracion_provincia', 50)->default(null);
            $table->string('administracion_departamento', 50)->default(null);
            $table->string('administracion_localidad', 50)->default(null);
            $table->integer('administracion_cp')->nullable()->default(null);
            $table->string('administracion_otro', 50)->default(null);
            $table->string('numero_expdiente', 20)->default(null);
            $table->integer('created_by')->nullable()->default(null);
            $table->string('estado', 50)->default('en proceso');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            //$table->index(['id']);
        });

        Schema::create('productor_mina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_mina')->nullable()->default(null);
            $table->bigInteger('id_productor')->nullable()->default(null);
            $table->bigInteger('id_destino')->nullable()->default(null);
            $table->bigInteger('id_dia')->nullable()->default(null);
            $table->bigInteger('id_personal')->nullable()->default(null);
            $table->string('mercado_provincia', 50)->default(null);
            $table->string('mercado_provincias', 50)->default(null);
            $table->string('mercado_exportacion', 50)->default(null);
            $table->string('num_expediente_SIGETRAMI', 50)->default(null);
            $table->string('constancia_otros', 50)->default(null);
            $table->string('resol_concecion_minera', 50)->default(null);
            $table->date('fecha_preinscripcion')->nullable(false);
            $table->date('fecha_renovacion')->nullable()->default(null);
            $table->boolean('primera_inscripcion')->nullable()->default(null);
            $table->string('caracter', 11)->default(null);
            $table->string('constancia_posecion', 50)->default(null);
            $table->bigInteger('id_producido')->nullable()->default(null);

            $table->foreign('id_mina')->references('id')->on('mina_cantera') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_productor')->references('id')->on('form_alta_productores') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_destino')->references('id')->on('empresa_destino') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_dia')->references('id')->on('iia_dia') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_producido')->references('id')->on('producido') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        Schema::create('reinscripciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_mina')->nullable(false);
            $table->bigInteger('id_productor')->nullable(false);
            $table->date('fecha_vto')->nullable(false);
            $table->tinyInteger('prospeccion')->nullable()->default(null);
            $table->tinyInteger('exploracion')->nullable()->default(null);
            $table->tinyInteger('explotacion')->nullable()->default(null);
            $table->tinyInteger('desarrollo')->nullable()->default(null);
            $table->integer('cantidad_productos')->nullable(false);
            $table->integer('porcentaje_venta_provincia')->nullable(false);
            $table->integer('porcentaje_venta_otras_provincias')->nullable(false);
            $table->integer('porcentaje_exportado')->nullable(false);
            $table->integer('personal_perm_profesional')->nullable(false);
            $table->integer('personal_perm_operarios')->nullable(false);
            $table->integer('personal_perm_administrativos')->nullable(false);
            $table->integer('personal_perm_otros')->nullable(false);
            $table->integer('personal_trans_profesional')->nullable(false);
            $table->integer('personal_trans_operarios')->nullable(false);
            $table->integer('personal_trans_administrativos')->nullable(false);
            $table->integer('personal_trans_otros')->nullable(false);
            $table->string('nombre', 80)->nullable(false);
            $table->integer('dni')->nullable(false);
            $table->string('cargo', 100)->nullable(false);
            $table->string('estado', 25)->nullable(false);

            $table->foreign('id_mina')->references('id')->on('mina_cantera') ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('id_productor')->references('id')->on('form_alta_productores') ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            
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
        Schema::dropIfExists('productor_mina');
        Schema::dropIfExists('iia_dia');
        Schema::dropIfExists('reinscripciones');
        Schema::dropIfExists('mina_cantera');
        Schema::dropIfExists('contactos');
        Schema::dropIfExists('productores');
        Schema::dropIfExists('emails_a_confirmar');
        // Schema::dropIfExists('menu_items');
        // Schema::dropIfExists('menus');
        Schema::dropIfExists('empresa_destino');
        Schema::dropIfExists('form_alta_productores');
        Schema::dropIfExists('producido');
    }
}
