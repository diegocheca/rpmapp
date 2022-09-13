<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::statement('CREATE TABLE public."Provincia2" (
            categoria character varying(100),
            centroide_lat numeric,
            centroide_lon numeric,
            fuente character varying(250),
            id bigint NOT NULL,
            iso_id character varying(50),
            iso_nombre character varying(150),
            nombre character varying(150),
            nombre_completo character varying(200),
            duracion_reinscripcion integer
        );
        '
        );


        DB::statement('ALTER TABLE public."Provincia2" OWNER TO postgres;');



        DB::statement('ALTER TABLE ONLY public."Provincia2"
        ADD CONSTRAINT "Provincia2_pkey" PRIMARY KEY (id);');


DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-26.8753965086829,-54.6516966230371,\'IGN\',54,\'AR-N\',\'Misiones\',\'Misiones\',\'Provincia de Misiones\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-33.7577257449137,-66.0281298195836,\'IGN\',74,\'AR-D\',\'San Luis\',\'San Luis\',\'Provincia de San Luis\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-30.8653679979618,-68.8894908486844,\'IGN\',70,\'AR-J\',\'San Juan\',\'San Juan\',\'Provincia de San Juan\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-32.0588735436448,-59.2014475514635,\'IGN\',30,\'AR-E\',\'Entre Ríos\',\'Entre Ríos\',\'Provincia de Entre Ríos\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-48.8154851827063,-69.9557621671973,\'IGN\',78,\'AR-Z\',\'Santa Cruz\',\'Santa Cruz\',\'Provincia de Santa Cruz\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-40.4057957178801,-67.229329893694,\'IGN\',62,\'AR-R\',\'Río Negro\',\'Río Negro\',\'Provincia de Río Negro\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-43.7886233529878,-68.5267593943345,\'IGN\',26,\'AR-U\',\'Chubut\',\'Chubut\',\'Provincia del Chubut\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-32.142932663607,-63.8017532741662,\'IGN\',14,\'AR-X\',\'Córdoba\',\'Córdoba\',\'Provincia de Córdoba\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-34.6298873058957,-68.5831228183798,\'IGN\',50,\'AR-M\',\'Mendoza\',\'Mendoza\',\'Provincia de Mendoza\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-29.685776298315,-67.1817359694432,\'IGN\',46,\'AR-F\',\'La Rioja\',\'La Rioja\',\'Provincia de La Rioja\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-37.1315537735949,-65.4466546606951,\'IGN\',42,\'AR-L\',\'La Pampa\',\'La Pampa\',\'Provincia de La Pampa\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-27.3358332810217,-66.9476824299928,\'IGN\',10,\'AR-K\',\'Catamarca\',\'Catamarca\',\'Provincia de Catamarca\',6);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-27.7824116550944,-63.2523866568588,\'IGN\',86,\'AR-G\',\'Santiago del Estero\',\'Santiago del Estero\',\'Provincia de Santiago del Estero\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-28.7743047046407,-57.8012191977913,\'IGN\',18,\'AR-W\',\'Corrientes\',\'Corrientes\',\'Provincia de Corrientes\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-30.7069271588117,-60.9498369430241,\'IGN\',82,\'AR-S\',\'Santa Fe\',\'Santa Fe\',\'Provincia de Santa Fe\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-26.9478001830786,-65.3647579441481,\'IGN\',90,\'AR-T\',\'Tucumán\',\'Tucumán\',\'Provincia de Tucumán\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-38.6417575824599,-70.1185705180601,\'IGN\',58,\'AR-Q\',\'Neuquén\',\'Neuquén\',\'Provincia del Neuquén\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-24.2991344492002,-64.8144629600627,\'IGN\',66,\'AR-A\',\'Salta\',\'Salta\',\'Provincia de Salta\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-26.3864309061226,-60.7658307438603,\'IGN\',22,\'AR-H\',\'Chaco\',\'Chaco\',\'Provincia del Chaco\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-24.894972594871,-59.9324405800872,\'IGN\',34,\'AR-P\',\'Formosa\',\'Formosa\',\'Provincia de Formosa\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-23.3200784211351,-65.7642522180337,\'IGN\',38,\'AR-Y\',\'Jujuy\',\'Jujuy\',\'Provincia de Jujuy\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Ciudad Autónoma\',-34.6144934119689,-58.4458563545429,\'IGN\',2,\'AR-C\',\'Ciudad Autónoma de Buenos Aires\',\'Ciudad Autónoma de Buenos Aires\',\'Ciudad Autónoma de Buenos Aires\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-36.6769415180527,-60.5588319815719,\'IGN\',6,\'AR-B\',\'Buenos Aires\',\'Buenos Aires\',\'Provincia de Buenos Aires\',12);');
DB::statement('INSERT INTO public."Provincia2"(
	categoria, centroide_lat, centroide_lon, fuente, id, iso_id, iso_nombre, nombre, nombre_completo, duracion_reinscripcion)
	VALUES (
\'Provincia\',-82.52151781221,-50.7427486049785,\'IGN\',94,\'AR-V\',\'Tierra del Fuego\',\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\',\'Provincia de Tierra del Fuego, Antártida e Islas del Atlántico Sur\',12);');


//php artisan migrate --path=database/migrations/2022_09_13_120000_create_provincias_table.php


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provincias');
    }
}
