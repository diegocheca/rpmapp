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

        DB::statement('CREATE TABLE public.`Localidad2` (
            categoria character varying(100),
            centroide_lat numeric,
            centroide_lon numeric,
            departamento_nombre character varying(200),
            fuente character varying(150),
            id bigint NOT NULL,
            localidad_censal_id character varying(150),
            localidad_censal_nombre character varying(250),
            municipio_id character varying,
            municipio_nombre character varying(200),
            nombre character varying(250),
            provincia_id bigint,
            provincia_nombre character varying(250),
            departamento_id bigint
        );'
        );
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
