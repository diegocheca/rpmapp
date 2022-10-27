<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormAltaProductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_alta_productores', function (Blueprint $table) {
            //columans generales
            $table->bigIncrements('id');
            $table->string('tipo_productor')->nullable(false)->default('productor');
            $table->string('tipo_tramite')->nullable(false)->default('inscripcion');
            $table->string('estado')->default("en proceso");
            $table->string('provincia')->nullable()->default(null);
            $table->string('observacion')->nullable()->default(null);

            //Paso 1
            $table->string('cuit',15)->nullable(false);
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
            $table->tinyInteger('tiposociedad_correcto')->nullable()->default(null);
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
            $table->string('updated_paso_uno')->nullable()->default(null);
            //Fin paso 1


            //Paso 2
            $table->string('leal_calle')->nullable()->default(null);
            $table->integer('leal_numero')->nullable()->default(null);
            $table->string('leal_telefono')->nullable()->default(null);
            $table->string('leal_pais')->nullable()->default(null);
            $table->string('leal_provincia')->nullable()->default(null);
            $table->string('leal_departamento')->nullable()->default(null);
            $table->string('leal_localidad')->nullable()->default(null);
            $table->integer('leal_cp')->nullable()->default(null);
            $table->string('leal_otro')->nullable()->default(null);
            $table->string('leal_calle_correcto')->nullable()->default(null);
            $table->string('obs_leal_calle')->nullable()->default(null);
            $table->string('leal_numero_correcto')->nullable()->default(null);
            $table->string('obs_leal_numero')->nullable()->default(null);
            $table->string('leal_telefono_correcto')->nullable()->default(null);
            $table->string('obs_leal_telefono')->nullable()->default(null);
            $table->string('leal_provincia_correcto')->nullable()->default(null);
            $table->string('obs_leal_provincia')->nullable()->default(null);
            $table->string('leal_departamento_correcto')->nullable()->default(null);
            $table->string('obs_leal_departamento')->nullable()->default(null);
            $table->string('leal_localidad_correcto')->nullable()->default(null);
            $table->string('obs_leal_localidad')->nullable()->default(null);
            $table->string('leal_cp_correcto')->nullable()->default(null);
            $table->string('obs_leal_cp')->nullable()->default(null);
            $table->string('leal_otro_correcto')->nullable()->default(null);
            $table->string('obs_leal_otro')->nullable()->default(null);
            $table->string('paso_2_progreso')->nullable()->default(null);
            $table->string('paso_2_aprobado')->nullable()->default(null);
            $table->string('paso_2_reprobado')->nullable()->default(null);
            $table->string('updated_paso_dos')->nullable()->default(null);
            //Fin paso 2


            //Paso 3
            $table->string('administracion_calle')->nullable()->default(null);
            $table->string('administracion_numero')->nullable()->default(null);
            $table->string('administracion_telefono')->nullable()->default(null);
            $table->string('administracion_pais')->nullable()->default(null);
            $table->string('administracion_provincia')->nullable()->default(null);
            $table->string('administracion_departamento')->nullable()->default(null);
            $table->string('administracion_localidad')->nullable()->default(null);
            $table->integer('administracion_cp')->nullable()->default(null);
            $table->string('administracion_otro')->nullable()->default(null);
            $table->string('administracion_calle_correcto')->nullable()->default(null);
            $table->string('obs_administracion_calle')->nullable()->default(null);
            $table->string('administracion_numero_correcto')->nullable()->default(null);
            $table->string('obs_administracion_numero')->nullable()->default(null);
            $table->string('administracion_telefono_correcto')->nullable()->default(null);
            $table->string('obs_administracion_telefono')->nullable()->default(null);
            $table->string('administracion_provincia_correcto')->nullable()->default(null);
            $table->string('obs_administracion_provincia')->nullable()->default(null);
            $table->string('administracion_departamento_correcto')->nullable()->default(null);
            $table->string('obs_administracion_departamento')->nullable()->default(null);
            $table->string('administracion_localidad_correcto')->nullable()->default(null);
            $table->string('obs_administracion_localidad')->nullable()->default(null);
            $table->string('administracion_cp_correcto')->nullable()->default(null);
            $table->string('obs_administracion_cp')->nullable()->default(null);
            $table->string('administracion_otro_correcto')->nullable()->default(null);
            $table->string('obs_administracion_otro')->nullable()->default(null);
            $table->string('paso_3_progreso')->nullable()->default(null);
            $table->string('paso_3_aprobado')->nullable()->default(null);
            $table->string('paso_3_reprobado')->nullable()->default(null);
            $table->string('updated_paso_tres')->nullable()->default(null);
            //FIN PASO 3


            //Paso 4
            $table->string('numero_expdiente')->nullable()->default(null);
            $table->string('categoria')->nullable()->default(null);
            $table->string('nombre_mina')->nullable()->default(null);
            $table->string('descripcion_mina')->nullable()->default(null);
            $table->string('distrito_minero')->nullable()->default(null);
            $table->string('mina_cantera')->nullable()->default(null);
            $table->string('plano_inmueble')->nullable()->default(null);
            $table->text('minerales_variedad')->nullable()->default(null);
            $table->string('numero_expdiente_correcto')->nullable()->default(null);
            $table->string('obs_numero_expdiente')->nullable()->default(null);
            $table->string('categoria_correcto')->nullable()->default(null);
            $table->string('obs_categoria')->nullable()->default(null);
            $table->string('nombre_mina_correcto')->nullable()->default(null);
            $table->string('obs_nombre_mina')->nullable()->default(null);
            $table->string('descripcion_mina_correcto')->nullable()->default(null);
            $table->string('obs_descripcion_mina')->nullable()->default(null);
            $table->string('obs_distrito_minero')->nullable()->default(null);
            $table->string('distrito_minero_correcto')->nullable()->default(null);
            $table->string('mina_cantera_correcto')->nullable()->default(null);
            $table->string('obs_mina_cantera')->nullable()->default(null);
            $table->string('plano_inmueble_correcto')->nullable()->default(null);
            $table->string('obs_plano_inmueble')->nullable()->default(null);
            $table->string('obs_resolucion_concesion_minera')->nullable()->default(null);
            $table->string('resolucion_concesion_minera_correcto')->nullable()->default(null);
            $table->string('titulo_contrato_posecion_correcto')->nullable()->default(null);
            $table->string('obs_titulo_contrato_posecion')->nullable()->default(null);
            $table->string('paso_4_progreso')->nullable()->default(null);
            $table->string('paso_4_aprobado')->nullable()->default(null);
            $table->string('paso_4_reprobado')->nullable()->default(null);
            $table->string('updated_paso_cuatro')->nullable()->default(null);
            //Fin PASO 4


            //Paso 5
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
            $table->string('otro_caracter_acalaracion')->nullable()->default(null);
            $table->string('concesion_minera_acalracion')->nullable()->default(null);
            $table->string('sustancias_de_aprovechamiento_comun')->nullable()->default(null);
            $table->string('sustancias_de_aprovechamiento_comun_aclaracion')->nullable()->default(null);
            $table->string('owner_correcto')->nullable()->default(null);
            $table->string('obs_owner')->nullable()->default(null);
            $table->string('arrendatario_correcto')->nullable()->default(null);
            $table->string('obs_arrendatario')->nullable()->default(null);
            $table->string('concesionario_correcto')->nullable()->default(null);
            $table->string('obs_concesionario')->nullable()->default(null);
            $table->string('otros_correcto')->nullable()->default(null);
            $table->string('obs_otros')->nullable()->default(null);
            $table->string('sustancias_de_aprovechamiento_comun_correcto')->nullable()->default(null);
            $table->string('obs_sustancias_de_aprovechamiento_comun_correcto')->nullable()->default(null);
            $table->string('constancia_pago_canon_correcto')->nullable()->default(null);
            $table->string('obs_constancia_pago_canon')->nullable()->default(null);
            $table->string('iia_correcto')->nullable()->default(null);
            $table->string('obs_iia')->nullable()->default(null);
            $table->string('dia_correcto')->nullable()->default(null);
            $table->string('obs_dia')->nullable()->default(null);
            $table->string('acciones_a_desarrollar_correcto')->nullable()->default(null);
            $table->string('obs_acciones_a_desarrollar')->nullable()->default(null);
            $table->string('actividad_correcto')->nullable()->default(null);
            $table->string('obs_actividad')->nullable()->default(null);
            $table->string('fecha_alta_dia_correcto')->nullable()->default(null);
            $table->string('obs_fecha_alta_dia')->nullable()->default(null);
            $table->string('fecha_vencimiento_dia_correcto')->nullable()->default(null);
            $table->string('obs_fecha_vencimiento_dia')->nullable()->default(null);
            $table->string('paso_5_progreso')->nullable()->default(null);
            $table->string('paso_5_aprobado')->nullable()->default(null);
            $table->string('paso_5_reprobado')->nullable()->default(null);
            $table->string('updated_paso_cinco')->nullable()->default(null);
            //Fin Paso 5


            //paso 6
            $table->string('localidad_mina_pais')->nullable()->default(null);
            $table->string('localidad_mina_provincia')->nullable()->default(null);
            $table->string('localidad_mina_departamento')->nullable()->default(null);
            $table->string('localidad_mina_localidad')->nullable()->default(null);
            $table->string('tipo_sistema')->nullable()->default(null);
            $table->string('longitud')->nullable()->default(null);
            $table->string('latitud')->nullable()->default(null);
            $table->string('localidad_mina_provincia_correcto')->nullable()->default(null);
            $table->string('obs_localidad_mina_provincia')->nullable()->default(null);
            $table->string('localidad_mina_departamento_correcto')->nullable()->default(null);
            $table->string('obs_localidad_mina_departamento')->nullable()->default(null);
            $table->string('localidad_mina_localidad_correcto')->nullable()->default(null);
            $table->string('obs_localidad_mina_localidad')->nullable()->default(null);
            $table->string('tipo_sistema_correcto')->nullable()->default(null);
            $table->string('obs_tipo_sistema')->nullable()->default(null);
            $table->string('longitud_correcto')->nullable()->default(null);
            $table->string('obs_longitud')->nullable()->default(null);
            $table->string('latitud_correcto')->nullable()->default(null);
            $table->string('obs_latitud')->nullable()->default(null);
            $table->string('paso_6_progreso')->nullable()->default(null);
            $table->string('paso_6_aprobado')->nullable()->default(null);
            $table->string('paso_6_reprobado')->nullable()->default(null);
            $table->string('updated_paso_seis')->nullable()->default(null);
            //Fin paso 6
            
            
            //Paso 7
            $table->string('cargo_empresa')->nullable()->default(null);
            $table->string('presentador_nom_apellido')->nullable()->default(null);
            $table->string('presentador_dni')->nullable()->default(null);
            //Fin de Paso 7
            
            //Pago de Canon Minero
            $table->string('constancia_paga_canon_monto')->nullable()->default(null);
            $table->string('constancia_paga_canon_monto_correcto')->nullable()->default(null);
            $table->string('obs_constancia_paga_canon_monto')->nullable()->default(null);
            $table->string('constancia_paga_canon_inicio')->nullable()->default(null);
            $table->string('constancia_paga_canon_inicio_correcto')->nullable()->default(null);
            $table->string('obs_constancia_paga_canon_inicio')->nullable()->default(null);
            $table->string('constancia_paga_canon_fin')->nullable()->default(null);
            $table->string('constancia_paga_canon_fin_correcto')->nullable()->default(null);
            $table->string('obs_constancia_paga_canon_fin')->nullable()->default(null);
            //Fin de Pago de Canon Minero

            //timestamp
            $table->integer('created_by')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
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
        Schema::dropIfExists('form_alta_productores');
    }
}
