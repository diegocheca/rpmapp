<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesRawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE public."Departamento" (
            categoria character varying(200),
            centroide_lat numeric,
            centroide_lon numeric,
            fuente character varying(250),
            id bigint NOT NULL,
            nombre character varying(150),
            nombre_completo character varying(250),
            provincia_id bigint NOT NULL,
            provincia_interseccion double precision NOT NULL,
            provincia_nombre character varying(150)
        );'
        );


        DB::statement('ALTER TABLE public."Departamento" OWNER TO postgres;');



        DB::statement('ALTER TABLE ONLY public."Departamento"
        ADD CONSTRAINT "Departamento_pkey" PRIMARY KEY (id);');




DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5118758903445,-58.7776710941743,
    \'ARBA - Gerencia de Servicios Catastrales\',6412,\'José C. Paz\',
    \'Partido de José C. Paz\',6,0.0001595415553,\'Buenos Aires\');');

DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.2575511794731,-60.6806781684245,\'Direc. Pcial. de Catastro y Cartografía\',22112,\'O-Higgins\',\'Departamento O-Higgins\',22,0.015838054252715,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.6318750123361,-64.2143766258097,\'Direc. Grl. de Catastro\',42147,\'Trenel\',\'Departamento Trenel\',42,0.013701037399738,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.9642254145303,-60.2490776485677,\'ARBA - Gerencia de Servicios Catastrales\',6014,\'Adolfo Gonzales Chaves\',\'Partido de Adolfo Gonzales Chaves\',6,0.012590508894927,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.1532136536641,-57.2307866316173,\'ARBA - Gerencia de Servicios Catastrales\',6315,\'General Juan Madariaga\',\'Partido de General Juan Madariaga\',6,0.009812057718632,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.3356554181577,-59.181805577778,\'ARBA - Gerencia de Servicios Catastrales\',6791,\'Tandil\',\'Partido de Tandil\',6,0.015971940959191,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.5210512908819,-62.7274743405239,\'Direc. Grl. de Catastro\',86014,\'Alberdi\',\'Departamento Alberdi\',86,0.093146868760832,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.1306397823227,-63.663736169201,\'Direc. Grl. de Catastro\',42119,\'Quemú Quemú\',\'Departamento Quemú Quemú\',42,0.017244750835126,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.4980625981793,-64.198128304727,\'Direc. Grl. de Catastro\',42021,\'Capital\',\'Departamento Capital\',42,0.017543066947897,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.0205633751884,-62.2804530355771,\'Direc. Grl. de Catastro\',86154,\'Rivadavia\',\'Departamento Rivadavia\',86,0.025082992570009,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.0394963430537,-62.5440138783592,\'Direc. Grl. de Catastro\',86098,\'Juan F. Ibarra\',\'Departamento Juan F. Ibarra\',86,0.067716899601989,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.5682847400822,-62.3388258455986,\'Direc. Grl. de Catastro\',86077,\'General Taboada\',\'Departamento General Taboada\',86,0.044540232236763,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.7114684971791,-67.2475409227538,\'IGN\',50042,\'La Paz\',\'Departamento La Paz\',50,0.048904919394525,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.1477437843902,-61.2646589620305,\'ARBA - Gerencia de Servicios Catastrales\',6196,\'Coronel Pringles\',\'Partido de Coronel Pringles\',6,0.017521990524595,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.3815893993371,-58.599453988125,\'ARBA - Gerencia de Servicios Catastrales\',6805,\'Tigre\',\'Partido de Tigre\',6,0.001254380773332,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.5816678881383,-63.6648708546651,\'Direc. Grl. de Catastro\',42028,\'Catriló\',\'Departamento Catriló\',42,0.017337334781892,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.0324956718132,-63.7788855690903,\'Direc. Grl. de Catastro\',42007,\'Atreucó\',\'Departamento Atreucó\',42,0.024397364751446,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.4836474005921,-63.7813086707571,\'Direc. Grl. de Catastro\',42070,\'Guatraché\',\'Departamento Guatraché\',42,0.024535456643082,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.3338794806846,-65.0828316677234,\'Direc. Grl. de Catastro\',42154,\'Utracán\',\'Departamento Utracán\',42,0.089993645902513,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.4787683011276,-65.5329694083622,\'Direc. Grl. de Catastro\',42098,\'Loventué\',\'Departamento Loventué\',42,0.063071535615378,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.9792340442423,-63.9544827643711,\'Direc. Grl. de Catastro\',42077,\'Hucal\',\'Departamento Hucal\',42,0.042371167498852,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.3954095124282,-66.5727556640635,\'Direc. Grl. de Catastro\',42049,\'Chalileo\',\'Departamento Chalileo\',42,0.060770286404574,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.3978994715573,-67.6953932639542,\'Direc. Grl. de Catastro\',42063,\'Chical Co\',\'Departamento Chical Co\',42,0.062264175302633,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.9854770547953,-59.2414216570581,\'IGN\',18049,\'Esquina\',\'Departamento Esquina\',18,0.044591481461799,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.9995445616697,-58.7950373826119,\'IGN\',18175,\'Sauce\',\'Departamento Sauce\',18,0.028304471929618,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.6955178131115,-58.3248439252656,\'IGN\',18035,\'Curuzu Cuatia\',\'Departamento Curuzu Cuatia\',18,0.094122338320227,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.8289705275493,-56.9315923506787,\'IGN\',18147,\'San Martín\',\'Departamento San Martín\',18,0.074680957278876,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-43.1372229709113,-65.0757246833498,\'IGN\',26077,\'Rawson\',\'Departamento Rawson\',26,0.018242774931579,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.0645100901984,-57.818389954722,\'IGN\',18105,\'Mercedes\',\'Departamento Mercedes\',18,0.109627657770833,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.5936355856024,-57.2996337303242,\'IGN\',18119,\'Paso de los Libres\',\'Departamento Paso de los Libres\',18,0.055330602589456,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.7751848033313,-56.5115297991712,\'IGN\',18056,\'General Alvear\',\'Departamento General Alvear\',18,0.02186304236788,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.7536335933641,-64.7638996164731,\'Direc. Grl. de Catastro\',86063,\'Choya\',\'Departamento Choya\',86,0.045649124741441,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.6177946030973,-67.9636620466005,\'IGN\',50112,\'Santa Rosa\',\'Departamento Santa Rosa\',50,0.058415085840392,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.419707109754,-68.6121759957283,\'IGN\',50084,\'Rivadavia\',\'Departamento Rivadavia\',50,0.014230301993113,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.255785801668,-62.2904249803924,\'ARBA - Gerencia de Servicios Catastrales\',6819,\'Tornquist\',\'Partido de Tornquist\',6,0.013937673275644,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.1677065304375,-65.9562869452052,\'IGN\',46035,\'Chamical\',\'Departamento Chamical\',46,0.060521920813464,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.5330735278082,-66.7191515033817,\'IGN\',46007,\'Arauco\',\'Departamento Arauco\',46,0.027288721380046,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.1381957287934,-58.8830222693056,\'ARBA - Gerencia de Servicios Catastrales\',6126,\'Campana\',\'Partido de Campana\',6,0.003130053089827,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.0814710804867,-65.3349462642257,\'Adm. Grl. de Catastro\',10098,\'Santa Rosa\',\'Departamento Santa Rosa\',10,0.015801854225006,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.3952000610314,-65.1919504325436,\'Adm. Grl. de Catastro\',10070,\'La Paz\',\'Departamento La Paz\',10,0.083171890615863,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-48.8383418225325,-68.4681621286703,\'IGN\',78042,\'Magallanes\',\'Departamento Magallanes\',78,0.083140066737391,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-49.9474837007267,-69.4469507225498,\'IGN\',78007,\'Corpen Aike\',\'Departamento Corpen Aike\',78,0.109814466577191,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.1487161833477,-64.3048926460226,\'A.R.T - Gerencia de Catastro\',62028,\'Conesa\',\'Departamento Conesa\',62,0.04823680927838,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.8016874124461,-59.5196519224863,\'Direc. Pcial. de Catastro y Cartografía\',22154,\'Sargento Cabral\',\'Departamento Sargento Cabral\',22,0.01662265469263,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.736996206931,-60.7570241668236,\'Direc. Pcial. de Catastro y Cartografía\',22070,\'Independencia\',\'Departamento Independencia\',22,0.019349206421997,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.7436812830101,-60.6581451476891,\'Direc. Pcial. de Catastro y Cartografía\',22098,\'Mayor Luis J. Fontana\',\'Departamento Mayor Luis J. Fontana\',22,0.037380085555011,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8662498172761,-61.300959824592,\'Direc. Pcial. de Catastro y Cartografía\',22043,\'Fray Justo Santa María de Oro\',\'Departamento Fray Justo Santa María de Oro\',22,0.022433388523189,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1691720457957,-58.9595089153944,\'Direc. Pcial. de Catastro y Cartografía\',22126,\'1° de Mayo\',\'Departamento 1° de Mayo\',22,0.012940292184425,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.1656565638277,-66.5422509844147,\'Direc. de Geodesia y Catastro\',74007,\'Ayacucho\',\'Departamento Ayacucho\',74,0.106619124359691,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.8865728387855,-57.586173153195,\'ARBA - Gerencia de Servicios Catastrales\',6511,\'Maipú\',\'Partido de Maipú\',6,0.008530225430484,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3362384898477,-61.4747691940114,\'Direc. Pcial. de Catastro y Cartografía\',22036,\'12 de Octubre\',\'Departamento 12 de Octubre\',22,0.027794370750986,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.7112016051317,-64.3070593086884,\'Direc. Grl. de Catastro\',14147,\'Santa María\',\'Departamento Santa María\',14,0.019579891068535,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.707791961138,-65.1564069990554,\'Direc. Grl. de Catastro\',14126,\'San Alberto\',\'Departamento San Alberto\',14,0.020494133406518,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.7330269369319,-63.4769207987931,\'Direc. Grl. de Catastro\',14119,\'Río Segundo\',\'Departamento Río Segundo\',14,0.031262298145311,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.2393990103815,-62.5260292405918,\'Direc. Grl. de Catastro\',14140,\'San Justo\',\'Departamento San Justo\',14,0.093913050275736,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.8784545187661,-62.7914258058015,\'Direc. Grl. de Catastro\',14182,\'Unión\',\'Departamento Unión\',14,0.066691083069804,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.2877127172928,-63.7792479671775,\'Direc. Grl. de Catastro\',14161,\'Tercero Arriba\',\'Departamento Tercero Arriba\',14,0.031253811385836,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.9885518325631,-65.4038423380142,\'Direc. Grl. de Inmuebles\',66035,\'Cerrillos\',\'Departamento Cerrillos\',66,0.003496503890659,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.3308032176015,-64.494180483748,\'Direc. Grl. de Catastro\',14098,\'Río Cuarto\',\'Departamento Río Cuarto\',14,0.114337724965032,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.2915070191465,-69.3019667535127,\'IGN\',50126,\'Tupungato\',\'Departamento Tupungato\',50,0.016416723485928,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.1053773070169,-58.6616277482245,\'IGN\',34042,\'Pilagás\',\'Departamento Pilagás\',34,0.045466390832335,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.467587999102,-58.5654369092882,\'IGN\',34021,\'Laishí\',\'Departamento Laishí\',34,0.048119964440474,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.7672893097833,-59.1592573575224,\'IGN\',34056,\'Pirané\',\'Departamento Pirané\',34,0.115114410859445,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.2137925689732,-61.337579887251,\'Direc. Pcial. de Catastro y Cartografía\',22063,\'General Güemes\',\'Departamento General Güemes\',22,0.25720870635467,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-41.7398257356123,-70.4011139544739,\'A.R.T - Gerencia de Catastro\',62056,\'Ñorquinco\',\'Departamento Ñorquinco\',62,0.041593519885055,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.1963357906582,-63.0560072843652,\'ARBA - Gerencia de Servicios Catastrales\',6007,\'Adolfo Alsina\',\'Partido de Adolfo Alsina\',6,0.019325042254022,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.0746044477032,-63.0577463401906,\'ARBA - Gerencia de Servicios Catastrales\',6651,\'Puán\',\'Partido de Puán\',6,0.02118893714332,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-39.1296648457138,-62.7268024308429,\'ARBA - Gerencia de Servicios Catastrales\',6875,\'Villarino\',\'Partido de Villarino\',6,0.035132069168079,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-34.1401111180237,-63.4187744697841,\'Direc. Grl. de Catastro\',14084,\'Presidente Roque Sáenz Peña\',\'Departamento Presidente Roque Sáenz Peña\',14,0.05112440068579,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7687371057529,-62.9535454567251,\'ARBA - Gerencia de Servicios Catastrales\',6392,\'General Villegas\',\'Partido de General Villegas\',6,0.023190987714665,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-34.6170744283348,-64.3787603319835,\'Direc. Grl. de Catastro\',14035,\'General Roca\',\'Departamento General Roca\',14,0.078901503740856,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.2178364156832,-67.0804473289428,\'IGN\',50014,\'General Alvear\',\'Departamento General Alvear\',50,0.099366375162544,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.4854057246231,-64.7601873654679,\'Direc. Grl. de Catastro\',86147,\'Río Hondo\',\'Departamento Río Hondo\',86,0.014915157551343,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.7819425849294,-59.7825917634816,\'ARBA - Gerencia de Servicios Catastrales\',6770,\'San Pedro\',\'Partido de San Pedro\',6,0.004282985634046,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.5128446678353,-62.8303776832343,\'Direc. Grl. de Inmuebles\',66133,\'Rivadavia\',\'Departamento Rivadavia\',66,0.168482934580535,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.5462867797822,-65.8530871719889,\'Direc. Grl. de Inmuebles\',66147,\'Rosario de Lerma\',\'Departamento Rosario de Lerma\',66,0.033096288698253,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.7855349092159,-64.8287565421131,\'Direc. Grl. de Inmuebles\',38035,\'Ledesma\',\'Departamento Ledesma\',38,0.056145307208727,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.522187514513,-58.7627061875969,\'IGN\',18021,\'Capital\',\'Departamento Capital\',18,0.006148059916301,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.5507848284827,-55.856845031149,\'Ministerio de Ecología\',54028,\'Capital\',\'Departamento Capital\',54,0.032798131278206,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.8747354912768,-54.4004185891377,\'Ministerio de Ecología\',54063,\'Iguazú\',\'Departamento Iguazú\',54,0.090855845096419,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.4763636003081,-55.0712221116124,\'Ministerio de Ecología\',54091,\'Oberá\',\'Departamento Oberá\',54,0.052815811793375,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1765939564162,-55.3392901890006,\'Ministerio de Ecología\',54098,\'San Ignacio\',\'Departamento San Ignacio\',54,0.055977224507324,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.4604898579358,-66.3525089002799,\'IGN\',46014,\'Capital\',\'Departamento Capital\',46,0.146466106154406,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.032189401961,-63.2238214757827,\'Direc. Grl. de Catastro\',14112,\'Río Seco\',\'Departamento Río Seco\',14,0.03963803694424,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.4101860186287,-66.2062591058801,\'A.R.T - Gerencia de Catastro\',62014,\'Avellaneda\',\'Departamento Avellaneda\',62,0.096765502166283,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.5324900624312,-67.554484164455,\'A.R.T - Gerencia de Catastro\',62042,\'General Roca\',\'Departamento General Roca\',62,0.070306113932108,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.7160106963678,-59.1157493078992,\'Direc. Pcial. de Catastro y Cartografía\',22140,\'San Fernando\',\'Departamento San Fernando\',22,0.035994078923603,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.7356115411335,-66.7150069507327,\'Direc. de Geodesia y Catastro\',74014,\'Belgrano\',\'Departamento Belgrano\',74,0.106328093347143,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.7743899197092,-71.4866965761944,\'Direc. Pcial. de Catastro e Inf. Territorial\',58070,\'Los Lagos\',\'Departamento Los Lagos\',58,0.045990904222934,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1000545044873,-66.9223774125099,\'Adm. Grl. de Catastro\',10035,\'Belén\',\'Departamento Belén\',10,0.124345104989166,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.8325294845843,-68.7930144598811,\'Direc. Pcial. de Catastro e Inf. Territorial\',58035,\'Confluencia\',\'Departamento Confluencia\',58,0.07660446844868,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.5742697933456,-70.3729347665806,\'Direc. Pcial. de Catastro e Inf. Territorial\',58105,\'Picunches\',\'Departamento Picunches\',58,0.063931926179791,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.0986455753996,-69.0127575196277,\'Direc. Pcial. de Catastro e Inf. Territorial\',58014,\'Añelo\',\'Departamento Añelo\',58,0.127246526684915,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.0659054264443,-70.3140568384535,\'Direc. Pcial. de Catastro e Inf. Territorial\',58063,\'Loncopué\',\'Departamento Loncopué\',58,0.057830556524681,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.6378798941082,-70.6777764142853,\'Direc. Pcial. de Catastro e Inf. Territorial\',58084,\'Ñorquín\',\'Departamento Ñorquín\',58,0.058020547439148,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.4104559393629,-65.8362002957174,\'Adm. Grl. de Catastro\',10049,\'Capital\',\'Departamento Capital\',10,0.003965306115445,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.9266675681635,-65.5038083174841,\'Adm. Grl. de Catastro\',10014,\'Ancasti\',\'Departamento Ancasti\',10,0.019643275894659,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.3984401348449,-69.4019520980894,\'Direc. Pcial. de Catastro e Inf. Territorial\',58091,\'Pehuenches\',\'Departamento Pehuenches\',58,0.086843515475162,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.8583892643308,-70.7836605070546,\'Direc. Pcial. de Catastro e Inf. Territorial\',58077,\'Minas\',\'Departamento Minas\',58,0.062581691113023,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.8804936082292,-70.2862810211876,\'Direc. Pcial. de Catastro e Inf. Territorial\',58042,\'Chos Malal\',\'Departamento Chos Malal\',58,0.047333311933472,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-42.36635302228,-70.7120117319755,\'IGN\',26014,\'Cushamen\',\'Departamento Cushamen\',26,0.070987415937958,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-46.8341030724218,-70.6314100141799,\'IGN\',78035,\'Lago Buenos Aires\',\'Departamento Lago Buenos Aires\',78,0.11238095820884,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.5857649937965,-58.3948918118195,\'Direc. de Catastro\',2014,\'Comuna 2\',\'Comuna 2\',2,0.030755994396598,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6745676187442,-58.461944281059,\'Direc. de Catastro\',2056,\'Comuna 8\',\'Comuna 8\',2,0.109258099192413,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.1201560396969,-62.1382049441497,\'IGN\',34063,\'Ramón Lista\',\'Departamento Ramón Lista\',34,0.050204890564213,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.7654579620613,-64.1428878947488,\'Direc. Grl. de Catastro\',14154,\'Sobremonte\',\'Departamento Sobremonte\',14,0.019103051935005,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.4347067679294,-64.2098658068888,\'Direc. Grl. de Catastro\',86035,\'Banda\',\'Departamento Banda\',86,0.025192242673473,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.9157089757004,-59.9584822196811,\'ARBA - Gerencia de Servicios Catastrales\',6224,\'Chivilcoy\',\'Partido de Chivilcoy\',6,0.006570129877328,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.4855834326751,-60.85138406701,\'Servicio de Catastro e Información Territorial\',82028,\'Villa Constitución\',\'Departamento Villa Constitución\',82,0.024934216832872,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-43.8138432526407,-67.2400230074032,\'IGN\',26063,\'Mártires\',\'Departamento Mártires\',26,0.069729880845736,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.1061147414005,-63.4461751488674,\'Direc. Grl. de Catastro\',86182,\'Sarmiento\',\'Departamento Sarmiento\',86,0.012331578964391,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-47.3305185775707,-68.0290787062148,\'IGN\',78014,\'Deseado\',\'Departamento Deseado\',78,0.2509118509201,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-43.3234947781653,-70.3484257364086,\'IGN\',26056,\'Languiñeo\',\'Departamento Languiñeo\',26,0.065420119970894,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.0813959929051,-62.2187677325403,\'Direc. Grl. de Catastro\',86042,\'Belgrano\',\'Departamento Belgrano\',86,0.024666820158441,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.2978682731406,-62.5153416521407,\'Direc. Grl. de Catastro\',86007,\'Aguirre\',\'Departamento Aguirre\',86,0.030357284230493,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.5738372943158,-58.4222211632133,\'Direc. de Catastro\',2098,\'Comuna 14\',\'Comuna 14\',2,0.077224873960866,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.9767710254958,-64.8711532150043,\'Direc. Grl. de Catastro\',86084,\'Guasayán\',\'Departamento Guasayán\',86,0.019477045105394,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.4170686019036,-64.1832168468628,\'Direc. Grl. de Catastro\',14014,\'Capital\',\'Departamento Capital\',14,0.00345106448502,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.9455797002151,-67.6777645009401,\'Adm. Grl. de Catastro\',10028,\'Antofagasta de la Sierra\',\'Departamento Antofagasta de la Sierra\',10,0.273654740366082,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-34.0753663960754,-69.0977010128957,\'IGN\',50091,\'San Carlos\',\'Departamento San Carlos\',50,0.076811808133875,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-43.070540741803,-71.4553756889394,\'IGN\',26035,\'Futaleufú\',\'Departamento Futaleufú\',26,0.040332196282017,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-48.2873290186499,-71.1138374982594,\'IGN\',78049,\'Río Chico\',\'Departamento Río Chico\',78,0.137473412641513,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-49.8364881431632,-72.0654713338211,\'IGN\',78028,\'Lago Argentino\',\'Departamento Lago Argentino\',78,0.161091153605853,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.7016431663172,-68.4845953824055,\'A.R.T - Gerencia de Catastro\',62035,\'El Cuy\',\'Departamento El Cuy\',62,0.10515104838663,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.5247668775446,-69.26717572394,\'IGN\',50049,\'Las Heras\',\'Departamento Las Heras\',50,0.058115324194531,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.582585367751,-67.8890727049671,\'IGN\',50056,\'Lavalle\',\'Departamento Lavalle\',50,0.067147165702315,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.4076832777441,-64.4005868582138,\'A.R.T - Gerencia de Catastro\',62063,\'Pichi Mahuida\',\'Departamento Pichi Mahuida\',62,0.076393584629773,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.7917543082478,-63.765086491035,\'A.R.T - Gerencia de Catastro\',62007,\'Adolfo Alsina\',\'Departamento Adolfo Alsina\',62,0.044525450447191,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6138430816863,-58.4026514512217,\'Direc. de Catastro\',2021,\'Comuna 3\',\'Comuna 3\',2,0.03100940082502,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8847652276316,-64.4356675404002,\'Direc. Grl. de Catastro\',86049,\'Capital\',\'Departamento Capital\',86,0.015526720142819,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.0345220351902,-60.1333612561516,\'ARBA - Gerencia de Servicios Catastrales\',6287,\'General Alvear\',\'Partido de General Alvear\',6,0.010917633743227,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.6244804367569,-64.3107274308234,\'Direc. Grl. de Catastro\',86105,\'Loreto\',\'Departamento Loreto\',86,0.022935885699213,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6477388963494,-59.0594708104081,\'ATER - Direc. de Catastro\',30113,\'Villaguay\',\'Departamento Villaguay\',30,0.083547074250022,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.041669400313,-57.6570625692977,\'ARBA - Gerencia de Servicios Catastrales\',6168,\'Castelli\',\'Partido de Castelli\',6,0.006861747607412,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.5768835387468,-58.4863728567996,\'ATER - Direc. de Catastro\',30088,\'San Salvador\',\'Departamento San Salvador\',30,0.016889473769988,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8355700988623,-58.3673978494737,\'ARBA - Gerencia de Servicios Catastrales\',6028,\'Almirante Brown\',\'Partido de Almirante Brown\',6,0.000413465514068,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.2187123475252,-59.7697019155424,\'ATER - Direc. de Catastro\',30077,\'Nogoyá\',\'Departamento Nogoyá\',30,0.055949847530348,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.3174117217417,-59.2672864855269,\'ATER - Direc. de Catastro\',30091,\'Tala\',\'Departamento Tala\',30,0.033811015765664,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.8974563498339,-59.5004488104579,\'ATER - Direc. de Catastro\',30070,\'La Paz\',\'Departamento La Paz\',30,0.083630578277297,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3950475960133,-60.3646185068028,\'Direc. Pcial. de Catastro y Cartografía\',22147,\'San Lorenzo\',\'Departamento San Lorenzo\',22,0.021672660830054,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.0034938070318,-58.0180274992052,\'ARBA - Gerencia de Servicios Catastrales\',6441,\'La Plata\',\'Partido de La Plata\',6,0.002851545399593,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.2221104711751,-58.1760719473086,\'ARBA - Gerencia de Servicios Catastrales\',6119,\'Brandsen\',\'Partido de Brandsen\',6,0.003586629312807,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.5265113228112,-60.2301576569223,\'ARBA - Gerencia de Servicios Catastrales\',6854,\'25 de Mayo\',\'Partido de 25 de Mayo\',6,0.015400089407453,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.8833833438579,-61.9271985156994,\'ARBA - Gerencia de Servicios Catastrales\',6609,\'Pehuajó\',\'Partido de Pehuajó\',6,0.01463984987004,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.8349745328235,-58.6980461310919,\'ARBA - Gerencia de Servicios Catastrales\',6301,\'General Belgrano\',\'Partido de General Belgrano\',6,0.005982716755138,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.9092326420174,-65.9015706538014,\'Adm. Grl. de Catastro\',10042,\'Capayán\',\'Departamento Capayán\',10,0.043407614996287,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.5103702936319,-58.7694635013319,\'ARBA - Gerencia de Servicios Catastrales\',6547,\'Monte\',\'Partido de Monte\',6,0.006076137990433,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.4811110714388,-59.3595940527063,\'ARBA - Gerencia de Servicios Catastrales\',6693,\'Roque Pérez\',\'Partido de Roque Pérez\',6,0.004984700992242,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4481990221196,-58.9034413925773,\'ARBA - Gerencia de Servicios Catastrales\',6638,\'Pilar\',\'Partido de Pilar\',6,0.00122258442314,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5676194636906,-59.1585123543241,\'ARBA - Gerencia de Servicios Catastrales\',6497,\'Luján\',\'Partido de Luján\',6,0.002460527114192,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.7857719233293,-59.69665215894,\'ARBA - Gerencia de Servicios Catastrales\',6049,\'Azul\',\'Partido de Azul\',6,0.021380043473809,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.9311673936983,-55.4670364911295,\'Ministerio de Ecología\',54035,\'Concepción\',\'Departamento Concepción\',54,0.026228846208015,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7108867791705,-58.7418777656329,\'ARBA - Gerencia de Servicios Catastrales\',6539,\'Merlo\',\'Partido de Merlo\',6,0.00055474795009,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6184039263126,-60.3539279007252,\'ARBA - Gerencia de Servicios Catastrales\',6210,\'Chacabuco\',\'Partido de Chacabuco\',6,0.007314815851433,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4067983092213,-59.8842434040917,\'ARBA - Gerencia de Servicios Catastrales\',6161,\'Carmen de Areco\',\'Partido de Carmen de Areco\',6,0.003370929851629,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6503494927057,-58.9879503249052,\'ARBA - Gerencia de Servicios Catastrales\',6364,\'General Rodríguez\',\'Partido de General Rodríguez\',6,0.001162799382107,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.2951491690699,-59.1559117007684,\'ARBA - Gerencia de Servicios Catastrales\',6266,\'Exaltación de la Cruz\',\'Partido de Exaltación de la Cruz\',6,0.002017336556425,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5520919648351,-58.6917055208826,\'ARBA - Gerencia de Servicios Catastrales\',6760,\'San Miguel\',\'Partido de San Miguel\',6,0.00026355874482,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4377851586384,-59.4732938848478,\'ARBA - Gerencia de Servicios Catastrales\',6728,\'San Andrés de Giles\',\'Partido de San Andrés de Giles\',6,0.00358541171551,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.546128336039,-61.0054940705488,\'ARBA - Gerencia de Servicios Catastrales\',6413,\'Junín\',\'Partido de Junín\',6,0.007170209122866,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8137199832046,-58.8480634347315,\'ARBA - Gerencia de Servicios Catastrales\',6525,\'Marcos Paz\',\'Partido de Marcos Paz\',6,0.001355128867245,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.329445846674,-63.6063356482423,\'Direc. Grl. de Catastro\',14056,\'Juárez Celman\',\'Departamento Juárez Celman\',14,0.048748078143735,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.2616553827262,-65.0966303997922,\'Direc. Grl. de Catastro\',42084,\'Lihuel Calel\',\'Departamento Lihuel Calel\',42,0.088261731324187,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6971944325993,-59.42081198401,\'ARBA - Gerencia de Servicios Catastrales\',6532,\'Mercedes\',\'Partido de Mercedes\',6,0.003347147612356,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.6219112869485,-61.3295201872432,\'Direc. Pcial. de Catastro y Cartografía\',22039,\'2 de Abril\',\'Departamento 2 de Abril\',22,0.016140335411848,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5992140053733,-58.6496943606349,\'ARBA - Gerencia de Servicios Catastrales\',6408,\'Hurlingham\',\'Partido de Hurlingham\',6,0.000112721177091,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6491410653179,-58.6198433488168,\'ARBA - Gerencia de Servicios Catastrales\',6568,\'Morón\',\'Partido de Morón\',6,0.00017634944491,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5526490761118,-58.5643145358763,\'ARBA - Gerencia de Servicios Catastrales\',6371,\'Ciudad Libertador San Martín\',\'Partido de Ciudad Libertador San Martín\',6,0.000179302728612,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.0838657971757,-65.1765900958914,\'Direc. Grl. de Inmuebles\',66084,\'La Candelaria\',\'Departamento La Candelaria\',66,0.008742170206018,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6360018167543,-58.6887583352667,\'ARBA - Gerencia de Servicios Catastrales\',6410,\'Ituzaingó\',\'Partido de Ituzaingó\',6,0.000121359588617,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.4753563662874,-60.6694790125744,\'Servicio de Catastro e Información Territorial\',82063,\'La Capital\',\'Departamento La Capital\',82,0.022511924773044,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.2311093523606,-56.222206072693,\'IGN\',18168,\'Santo Tomé\',\'Departamento Santo Tomé\',18,0.078204996331769,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.2124729464641,-58.6199065693295,\'IGN\',18126,\'Saladas\',\'Departamento Saladas\',18,0.02142338969638,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.7199243812297,-57.7876196199145,\'IGN\',18063,\'General Paz\',\'Departamento General Paz\',18,0.028995069596575,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7485629683304,-59.7034737442182,\'ARBA - Gerencia de Servicios Catastrales\',6784,\'Suipacha\',\'Partido de Suipacha\',6,0.003006186161382,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5959797363173,-58.5790926022347,\'ARBA - Gerencia de Servicios Catastrales\',6840,\'Tres de Febrero\',\'Partido de Tres de Febrero\',6,0.000145526894997,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.449795605204,-68.3284822964489,\'IGN\',46028,\'Coronel Felipe Varela\',\'Departamento Coronel Felipe Varela\',46,0.090219725028819,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.0363817959326,-60.2828693081193,\'ARBA - Gerencia de Servicios Catastrales\',6021,\'Alberti\',\'Partido de Alberti\',6,0.003571367029564,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7057824914432,-58.3954484986693,\'ARBA - Gerencia de Servicios Catastrales\',6434,\'Lanús\',\'Partido de Lanús\',6,0.000163480932835,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.9094258328137,-58.9958733938567,\'ARBA - Gerencia de Servicios Catastrales\',6329,\'General Las Heras\',\'Partido de General Las Heras\',6,0.002405621851688,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7554708441214,-58.424078867213,\'ARBA - Gerencia de Servicios Catastrales\',6490,\'Lomas de Zamora\',\'Partido de Lomas de Zamora\',6,0.000279534328996,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.0304083582525,-59.429785480408,\'ARBA - Gerencia de Servicios Catastrales\',6574,\'Navarro\',\'Partido de Navarro\',6,0.005184907440345,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.1450252367714,-58.6907790273655,\'ARBA - Gerencia de Servicios Catastrales\',6134,\'Cañuelas\',\'Partido de Cañuelas\',6,0.003816147921588,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.7029508773623,-65.4445360285708,\'Direc. Grl. de Inmuebles\',66063,\'Guachipas\',\'Departamento Guachipas\',66,0.018158504017594,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.1255099823638,-65.8800888963475,\'Direc. Grl. de Inmuebles\',66021,\'Cafayate\',\'Departamento Cafayate\',66,0.010243337018549,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.2195598528609,-59.1458071242931,\'ARBA - Gerencia de Servicios Catastrales\',6483,\'Lobos\',\'Partido de Lobos\',6,0.005538114441408,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7350141996909,-58.2768874201614,\'ARBA - Gerencia de Servicios Catastrales\',6658,\'Quilmes\',\'Partido de Quilmes\',6,0.000292309021107,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.2023512628961,-58.3408970254988,\'ARBA - Gerencia de Servicios Catastrales\',6630,\'Pila\',\'Partido de Pila\',6,0.01121284373141,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.3557097661663,-61.3442438803068,\'ARBA - Gerencia de Servicios Catastrales\',6322,\'General La Madrid\',\'Partido de General La Madrid\',6,0.015866858974656,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.2982217499893,-61.1496836148108,\'ARBA - Gerencia de Servicios Catastrales\',6105,\'Bolívar\',\'Partido de San Bolívar\',6,0.016030795019428,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.7142728188627,-58.2720776945726,\'ARBA - Gerencia de Servicios Catastrales\',6063,\'Balcarce\',\'Partido de Balcarce\',6,0.013644967977158,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.2593312232241,-61.6600936665535,\'ARBA - Gerencia de Servicios Catastrales\',6406,\'Hipólito Yrigoyen\',\'Partido de Hipólito Yrigoyen\',6,0.005355547931663,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.3986615531875,-57.6326112997092,\'ARBA - Gerencia de Servicios Catastrales\',6238,\'Dolores\',\'Partido de Dolores\',6,0.006420937856878,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.4973152716526,-62.8634418902354,\'ARBA - Gerencia de Servicios Catastrales\',6847,\'Tres Lomas\',\'Partido de Tres Lomas\',6,0.004092928245056,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.0347821696395,-58.442581327328,\'ARBA - Gerencia de Servicios Catastrales\',6042,\'Ayacucho\',\'Partido de Ayacucho\',6,0.022172775867826,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.4973936042369,-58.930436271179,\'IGN\',18007,\'Bella Vista\',\'Departamento Bella Vista\',18,0.019893275954723,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.6598759889301,-59.8288687407326,\'Direc. Pcial. de Catastro y Cartografía\',22161,\'Tapenagá\',\'Departamento Tapenagá\',22,0.060388092515069,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.2902983723403,-58.237869689912,\'ATER - Direc. de Catastro\',30015,\'Concordia\',\'Departamento Concordia\',30,0.041470910702606,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.9924267797136,-58.8918600477837,\'ATER - Direc. de Catastro\',30035,\'Federal\',\'Departamento Federal\',30,0.065746968018257,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.0223492433906,-58.7857904865089,\'ATER - Direc. de Catastro\',30056,\'Gualeguaychú\',\'Departamento Gualeguaychú\',30,0.097082196778667,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.6241288152628,-58.9351580556436,\'ATER - Direc. de Catastro\',30063,\'Islas del Ibicuy\',\'Departamento Islas del Ibicuy\',30,0.063992122420781,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6683135254839,-62.0397484845208,\'ARBA - Gerencia de Servicios Catastrales\',6351,\'General Pinto\',\'Partido de General Pinto\',6,0.00813990424343,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.8905500665858,-62.4187740896092,\'ARBA - Gerencia de Servicios Catastrales\',6399,\'Guaminí\',\'Partido de Guaminí\',6,0.015813899115763,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.6782056572194,-58.341116892125,\'ARBA - Gerencia de Servicios Catastrales\',6035,\'Avellaneda\',\'Partido de Avellaneda\',6,0.000179377277842,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.453365238609,-69.8338001250755,\'Direc. de Geodesia y Catastro\',70021,\'Calingasta\',\'Departamento Calingasta\',70,0.257688512934875,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.9896198487776,-67.8274038981039,\'Direc. de Geodesia y Catastro\',70126,\'25 de Mayo\',\'Departamento 25 de Mayo\',70,0.048447560001092,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.8860220920375,-61.0633674925405,\'ARBA - Gerencia de Servicios Catastrales\',6175,\'Colón\',\'Partido de Colón\',6,0.003153596854677,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.3886180658492,-59.5866369475028,\'ARBA - Gerencia de Servicios Catastrales\',6742,\'San Cayetano\',\'Partido de San Cayetano\',6,0.010047085737695,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.5116665533312,-60.2376664741026,\'ARBA - Gerencia de Servicios Catastrales\',6833,\'Tres Arroyos\',\'Partido de Tres Arroyos\',6,0.019848276697684,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3218567500252,-63.5796320220819,\'Direc. Grl. de Catastro\',86070,\'Figueroa\',\'Departamento Figueroa\',86,0.05174221657505,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.7710550160995,-62.4351452974673,\'ARBA - Gerencia de Servicios Catastrales\',6700,\'Saavedra\',\'Partido de Saavedra\',6,0.01172011083141,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.96257223668,-61.2904738793276,\'ARBA - Gerencia de Servicios Catastrales\',6553,\'Monte Hermoso\',\'Partido de Monte Hermoso\',6,0.00069347156897,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.0897033467581,-58.6939656644915,\'ARBA - Gerencia de Servicios Catastrales\',6476,\'Lobería\',\'Partido de Lobería\',6,0.015729956065357,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.909463480255,-57.8283887071779,\'ARBA - Gerencia de Servicios Catastrales\',6098,\'Berisso\',\'Partido de Berisso\',6,0.0004620215269,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.3908002975414,-57.2746828657242,\'ARBA - Gerencia de Servicios Catastrales\',6812,\'Tordillo\',\'Partido de Tordillo\',6,0.00433989791614,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.5872972390017,-60.0574845905723,\'ARBA - Gerencia de Servicios Catastrales\',6665,\'Ramallo\',\'Partido de Ramallo\',6,0.003296617271212,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.4825541340452,-60.292953731623,\'ARBA - Gerencia de Servicios Catastrales\',6763,\'San Nicolás\',\'Partido de San Nicolás\',6,0.002142251324744,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.2981373849478,-62.4633306370511,\'Direc. Grl. de Catastro\',86119,\'Moreno\',\'Departamento Moreno\',86,0.119399395181023,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.6659831488299,-57.9957841120045,\'ARBA - Gerencia de Servicios Catastrales\',6308,\'General Guido\',\'Partido de General Guido\',6,0.007600314683573,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1179308909271,-61.3088910569936,\'Direc. Pcial. de Catastro y Cartografía\',22028,\'Chacabuco\',\'Departamento Chacabuco\',22,0.015260278412021,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.8910429154042,-68.7323728513948,\'IGN\',50028,\'Guaymallén\',\'Departamento Guaymallén\',50,0.001064269399443,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.8902273126574,-65.2702656216248,\'Direc. Grl. de Inmuebles\',66028,\'Capital\',\'Departamento Capital\',66,0.011063089960939,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.8190298006571,-60.0187693847422,\'Direc. Pcial. de Catastro y Cartografía\',22168,\'25 de Mayo\',\'Departamento 25 de Mayo\',22,0.023908839555611,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.5325532169014,-61.8893137767698,\'ARBA - Gerencia de Servicios Catastrales\',6203,\'Coronel Suárez\',\'Partido de Coronel Suárez\',6,0.019730992696714,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.6704811465081,-61.0956539726773,\'ARBA - Gerencia de Servicios Catastrales\',6189,\'Coronel Dorrego\',\'Partido de Coronel Dorrego\',6,0.019594927774465,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.2555189703716,-59.1673660597249,\'ARBA - Gerencia de Servicios Catastrales\',6581,\'Necochea\',\'Partido de Necochea\',6,0.015218959944958,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.1144612462884,-67.3355202231145,\'IGN\',46105,\'Independencia\',\'Departamento Independencia\',46,0.077095674693379,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.9775099458466,-68.6521739904164,\'IGN\',50070,\'Maipú\',\'Departamento Maipú\',50,0.004028006998655,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.8806541047985,-68.8921657602392,\'IGN\',50007,\'Capital\',\'Departamento Capital\',50,0.000346397919649,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.9297600556689,-68.8890844545155,\'IGN\',50021,\'Godoy Cruz\',\'Departamento Godoy Cruz\',50,0.000522024234215,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.5445087646164,-66.3560062057426,\'Adm. Grl. de Catastro\',10021,\'Andalgalá\',\'Departamento Andalgalá\',10,0.047062297768336,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.0189344685483,-65.9222983796596,\'Adm. Grl. de Catastro\',10007,\'Ambato\',\'Departamento Ambato\',10,0.01803692234948,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.5808546732895,-62.1656895327094,\'ARBA - Gerencia de Servicios Catastrales\',6056,\'Bahía Blanca\',\'Partido de Bahía Blanca\',6,0.007541212736176,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.2027130466251,-58.0722485722113,\'ARBA - Gerencia de Servicios Catastrales\',6280,\'General Alvarado\',\'Partido de General Alvarado\',6,0.005432766665074,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.9656760017008,-57.743144039076,\'ARBA - Gerencia de Servicios Catastrales\',6357,\'General Pueyrredón\',\'Partido de General Pueyrredón\',6,0.004864839750463,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.4984341235843,-57.6436183302355,\'ARBA - Gerencia de Servicios Catastrales\',6518,\'Mar Chiquita\',\'Partido de Mar Chiquita\',6,0.010213302285926,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.3705193886837,-57.0658445979783,\'ARBA - Gerencia de Servicios Catastrales\',6868,\'Villa Gesell\',\'Partido de Villa Gesell\',6,0.000542519679029,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.1462075241433,-68.4803420038399,\'IGN\',50035,\'Junín\',\'Departamento Junín\',50,0.001707742081639,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.8599829479001,-66.9185847556269,\'IGN\',46021,\'Castro Barros\',\'Departamento Castro Barros\',46,0.016563824692652,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.6685132272644,-60.1735021538447,\'Direc. Pcial. de Catastro y Cartografía\',22133,\'Quitilipi\',\'Departamento Quitilipi\',22,0.015679285519963,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.1099458706882,-56.8696753966329,\'ARBA - Gerencia de Servicios Catastrales\',6644,\'Pinamar\',\'Partido de Pinamar\',6,0.000218910080019,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.6518890129521,-56.9422695810513,\'ARBA - Gerencia de Servicios Catastrales\',6336,\'General Lavalle\',\'Partido de General Lavalle\',6,0.008794329095168,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.6782018297724,-56.7189105094625,\'ARBA - Gerencia de Servicios Catastrales\',6420,\'La Costa\',\'Partido de La Costa\',6,0.00081360388015,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.1849498629024,-57.6863916156026,\'ARBA - Gerencia de Servicios Catastrales\',6505,\'Magdalena\',\'Partido de Magdalena\',6,0.005933224809303,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.1585269700688,-67.0658836337793,\'IGN\',46126,\'Sanagasta\',\'Departamento Sanagasta\',46,0.014179949664446,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.5265131808416,-58.5044695897767,\'ARBA - Gerencia de Servicios Catastrales\',6861,\'Vicente López\',\'Partido de Vicente López\',6,0.000109738393732,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.3959374753391,-67.4278867891974,\'IGN\',46042,\'Chilecito\',\'Departamento Chilecito\',46,0.057132978853336,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.0468199682862,-59.7751691822068,\'Direc. Pcial. de Catastro y Cartografía\',22119,\'Presidencia de la Plaza\',\'Departamento Presidencia de la Plaza\',22,0.022614924583821,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.7839424597327,-60.2180700309804,\'ATER - Direc. de Catastro\',30105,\'Victoria\',\'Departamento Victoria\',30,0.085356627850301,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.3128975389814,-66.6630521188972,\'IGN\',46056,\'General Ángel V. Peñaloza\',\'Departamento General Ángel V. Peñaloza\',46,0.034382037383939,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.228040548998,-60.5239335894137,\'ATER - Direc. de Catastro\',30021,\'Diamante\',\'Departamento Diamante\',30,0.034226729512094,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.4499666887673,-58.5822661421638,\'ATER - Direc. de Catastro\',30098,\'Uruguay\',\'Departamento Uruguay\',30,0.065673741268273,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6952294494435,-60.041174481445,\'ATER - Direc. de Catastro\',30084,\'Paraná\',\'Departamento Paraná\',30,0.064901985862062,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.6765966680226,-59.7037033020054,\'ARBA - Gerencia de Servicios Catastrales\',6707,\'Saladillo\',\'Partido de Saladillo\',6,0.008744596359502,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.0157017377305,-59.1769657671576,\'ARBA - Gerencia de Servicios Catastrales\',6455,\'Las Flores\',\'Partido de Las Flores\',6,0.010826817447827,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.1926035952586,-60.7879706568364,\'ARBA - Gerencia de Servicios Catastrales\',6686,\'Rojas\',\'Partido de Rojas\',6,0.006535827228019,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.3287181500871,-58.7711281467385,\'ARBA - Gerencia de Servicios Catastrales\',6252,\'Escobar\',\'Partido de Escobar\',6,0.000957795592934,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.835815535365,-60.5450748689588,\'ARBA - Gerencia de Servicios Catastrales\',6623,\'Pergamino\',\'Partido de Pergamino\',6,0.009484475194844,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.800959034536,-66.868104514456,\'IGN\',46070,\'General Juan F. Quiroga\',\'Departamento General Juan F. Quiroga\',46,0.047636313873025,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.8624408970891,-65.4310597836071,\'Direc. Grl. de Catastro\',90063,\'Lules\',\'Departamento Lules\',90,0.0272511145586,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.7861906133402,-65.3424091314535,\'Direc. Grl. de Catastro\',90119,\'Yerba Buena\',\'Departamento Yerba Buena\',90,0.006302256943053,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.6607281369398,-65.4634432127741,\'Direc. Grl. de Catastro\',90105,\'Tafí Viejo\',\'Departamento Tafí Viejo\',90,0.052118437058367,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.5309358872581,-64.8198149704644,\'Direc. Grl. de Catastro\',90007,\'Burruyacú\',\'Departamento Burruyacú\',90,0.160597667286576,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.4205977732086,-66.6788621651991,\'IGN\',46112,\'Rosario Vera Peñaloza\',\'Departamento Rosario Vera Peñaloza\',46,0.055903342168668,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.9699286424835,-60.4135430497849,\'Servicio de Catastro e Información Territorial\',82133,\'Vera\',\'Departamento Vera\',82,0.152931769704679,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.849605091735,-61.3983535538115,\'Servicio de Catastro e Información Territorial\',82077,\'9 de Julio\',\'Departamento 9 de Julio\',82,0.127510429546258,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.6066873518726,-69.437949892691,\'Direc. de Geodesia y Catastro\',70049,\'Iglesia\',\'Departamento Iglesia\',70,0.215162441965075,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.7122962694155,-67.5323035648395,\'Direc. de Geodesia y Catastro\',70119,\'Valle Fértil\',\'Departamento Valle Fértil\',70,0.058994631142794,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.0904647062097,-68.8815821606005,\'Direc. de Geodesia y Catastro\',70112,\'Ullum\',\'Departamento Ullum\',70,0.050345980680127,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.2096344810555,-68.4519807662306,\'Direc. de Geodesia y Catastro\',70007,\'Albardón\',\'Departamento Albardón\',70,0.01152319773963,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6381980593912,-68.9555709233027,\'Direc. de Geodesia y Catastro\',70133,\'Zonda\',\'Departamento Zonda\',70,0.027242830811033,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.369087077487,-65.8148193795656,\'Direc. de Geodesia y Catastro\',74042,\'Gobernador Dupuy\',\'Departamento Gobernador Dupuy\',74,0.247814471597882,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.038234468241,-66.2030292859746,\'Direc. Grl. de Inmuebles\',66014,\'Cachi\',\'Departamento Cachi\',66,0.018395633263727,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.1514718801816,-65.6059279182319,\'Direc. Grl. de Inmuebles\',66042,\'Chicoana\',\'Departamento Chicoana\',66,0.006845845507548,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.4475878403232,-65.5807612448506,\'Direc. Grl. de Inmuebles\',66098,\'La Viña\',\'Departamento La Viña\',66,0.013001831388723,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.5722509524193,-58.9444061302172,\'ARBA - Gerencia de Servicios Catastrales\',6672,\'Rauch\',\'Partido de Rauch\',6,0.014062351111943,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.4251673018384,-64.588141248868,\'Direc. Grl. de Inmuebles\',66112,\'Metán\',\'Departamento Metán\',66,0.034175060109499,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.5643605125424,-66.4549057919868,\'Direc. Grl. de Inmuebles\',66119,\'Molinos\',\'Departamento Molinos\',66,0.024167331139747,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.6710137553167,-63.0491259803334,\'ARBA - Gerencia de Servicios Catastrales\',6721,\'Salliqueló\',\'Partido de Salliqueló\',6,0.00259086870838,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8179736855733,-58.1552626920478,\'ARBA - Gerencia de Servicios Catastrales\',6091,\'Berazategui\',\'Partido de Berazategui\',6,0.000703029473342,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.7648231076768,-64.9560952507157,\'Direc. Grl. de Inmuebles\',66049,\'General Güemes\',\'Departamento General Güemes\',66,0.014155072166371,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.8276863599322,-66.1742423008628,\'Direc. Grl. de Inmuebles\',66154,\'San Carlos\',\'Departamento San Carlos\',66,0.035967843885799,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.4015889145024,-64.8014904385407,\'Direc. Grl. de Catastro\',42126,\'Rancul\',\'Departamento Rancul\',42,0.034902988398896,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.0315435775022,-64.5106030260375,\'Direc. Grl. de Catastro\',42035,\'Conhelo\',\'Departamento Conhelo\',42,0.035232073816195,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.3329401551221,-65.7309008581155,\'Adm. Grl. de Catastro\',10063,\'Fray Mamerto Esquiú\',\'Departamento Fray Mamerto Esquiú\',10,0.001847416446143,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.0066417359043,-66.0590548632025,\'IGN\',46084,\'General Ocampo\',\'Departamento General Ocampo\',46,0.041391320763202,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.9298313021932,-58.398091246683,\'ARBA - Gerencia de Servicios Catastrales\',6648,\'Presidente Perón\',\'Partido de Presidente Perón\',6,0.000385704870896,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.9256367295503,-67.4574905887938,\'A.R.T - Gerencia de Catastro\',62049,\'9 de julio\',\'Departamento 9 de julio\',62,0.119950199992749,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6413069709194,-66.1459756728153,\'IGN\',46091,\'General San Martín\',\'Departamento General San Martín\',46,0.049896163852769,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.6918181694465,-63.8815639978494,\'Direc. Grl. de Catastro\',86021,\'Atamisqui\',\'Departamento Atamisqui\',86,0.017784103839476,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-38.8488346485235,-61.8360446581448,\'ARBA - Gerencia de Servicios Catastrales\',6182,\'Coronel de Marina Leonardo Rosales\',\'Partido de Coronel de Marina Leonardo Rosales\',6,0.004346641881193,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.6973037998771,-67.5592920371088,\'IGN\',46049,\'Famatina\',\'Departamento Famatina\',46,0.045142906234851,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3511465491091,-59.2606339567401,\'Direc. Pcial. de Catastro y Cartografía\',22077,\'Libertad\',\'Departamento Libertad\',22,0.010479069218634,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-54.4245608958778,-67.5034849431886,\'Gerencia de Catastro Pcial.\',94011,\'Tolhuin\',\'Departamento Río Grande\',94,0.001574668306247,\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.5433309063736,-67.1581530651936,\'IGN\',46119,\'San Blas de Los Sauces\',\'Departamento San Blas de Los Sauces\',46,0.015551555076398,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.0546413323001,-60.125807734045,\'Servicio de Catastro e Información Territorial\',82035,\'Garay\',\'Departamento Garay\',82,0.030555333491884,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.3153379046182,-61.1094808024842,\'Servicio de Catastro e Información Territorial\',82070,\'Las Colonias\',\'Departamento Las Colonias\',82,0.047566736724173,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.2257917366713,-64.2102269263624,\'Direc. Grl. de Catastro\',42133,\'Realicó\',\'Departamento Realicó\',42,0.016968222412863,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.9396352318956,-58.3773174492554,\'IGN\',34014,\'Formosa\',\'Departamento Formosa\',34,0.086872594059307,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.1100496216627,-65.6738760483046,\'Adm. Grl. de Catastro\',10077,\'Paclín\',\'Departamento Paclín\',10,0.00977196850749,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.430382930044,-65.3599245662077,\'Adm. Grl. de Catastro\',10056,\'El Alto\',\'Departamento El Alto\',10,0.019054648269304,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.7871365610548,-60.4618654287039,\'Direc. Pcial. de Catastro y Cartografía\',22021,\'Comandante Fernández\',\'Departamento Comandante Fernández\',22,0.015119961318651,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4979563497613,-61.61293092454,\'ARBA - Gerencia de Servicios Catastrales\',6462,\'Leandro N. Alem\',\'Partido de Leandro N. Alem\',6,0.005103577243957,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.849534277685,-61.071967717894,\'Direc. Pcial. de Catastro y Cartografía\',22049,\'General Belgrano\',\'Departamento General Belgrano\',22,0.013103623102836,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1409287639679,-59.3474877785089,\'Direc. Pcial. de Catastro y Cartografía\',22056,\'General Donovan\',\'Departamento General Donovan\',22,0.015340684271089,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-44.2000353406651,-70.5768950488331,\'IGN\',26098,\'Tehuelches\',\'Departamento Tehuelches\',26,0.065492440716728,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-45.282788434735,-67.7087570024311,\'IGN\',26021,\'Escalante\',\'Departamento Escalante\',26,0.065261505919314,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.3997182320053,-64.6094899792791,\'Direc. Grl. de Catastro\',14049,\'Ischilín\',\'Departamento Ischilín\',14,0.03015714900179,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.7261313372803,-63.9842524222316,\'Direc. Grl. de Catastro\',14168,\'Totoral\',\'Departamento Totoral\',14,0.018230001241508,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.5143341151357,-63.2562237062848,\'Direc. Grl. de Catastro\',14042,\'General San Martín\',\'Departamento General San Martín\',14,0.030410098914255,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.0753882467214,-65.1421073770609,\'Direc. Grl. de Catastro\',14133,\'San Javier\',\'Departamento San Javier\',14,0.009361922190598,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.237459671314,-61.2838006242346,\'ARBA - Gerencia de Servicios Catastrales\',6294,\'General Arenales\',\'Partido de General Arenales\',6,0.004709908445366,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.5809627302368,-63.0945777162156,\'ARBA - Gerencia de Servicios Catastrales\',6679,\'Rivadavia\',\'Partido de Rivadavia\',6,0.012751557240137,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6517602348111,-58.4991151516538,\'Direc. de Catastro\',2063,\'Comuna 9\',\'Comuna 9\',2,0.080406044606898,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.1922192642063,-68.1319625798128,\'Direc. de Geodesia y Catastro\',70014,\'Angaco\',\'Departamento Angaco\',70,0.029027058367671,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.506381702579,-67.5458594420512,\'Direc. de Geodesia y Catastro\',70035,\'Caucete\',\'Departamento Caucete\',70,0.086033110512668,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.4039894660668,-69.4271919918532,\'Direc. Pcial. de Catastro e Inf. Territorial\',58098,\'Picún Leufú\',\'Departamento Picún Leufú\',58,0.04917128069221,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.1314863536049,-71.0463179632497,\'Direc. Pcial. de Catastro e Inf. Territorial\',58007,\'Aluminé\',\'Departamento Aluminé\',58,0.050518159412755,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-45.3450235273933,-69.0028353555711,\'IGN\',26091,\'Sarmiento\',\'Departamento Sarmiento\',26,0.066567032502453,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.4662020729313,-58.3900057061752,\'ARBA - Gerencia de Servicios Catastrales\',6343,\'General Paz\',\'Partido de General Paz\',6,0.003854447712533,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8758228176186,-57.409985810344,\'IGN\',18154,\'San Miguel\',\'Departamento San Miguel\',18,0.034068987930566,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6365544143719,-58.4518868569844,\'Direc. de Catastro\',2049,\'Comuna 7\',\'Comuna 7\',2,0.060339968156535,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-41.1330823086991,-68.9063154547507,\'A.R.T - Gerencia de Catastro\',62091,\'25 de Mayo\',\'Departamento 25 de Mayo\',62,0.13820605141908,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6278516942726,-58.5028179980211,\'Direc. de Catastro\',2070,\'Comuna 10\',\'Comuna 10\',2,0.061431675837142,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-82.7834172335301,-50.6450428018267,\'SCAR\',94028,\'Antártida Argentina\',\'Departamento Antártida Argentina\',94,0.990899967306979,\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-52.8527307050346,-53.0409118433889,\'IGN\',94021,\'Islas del Atlántico Sur\',\'Departamento Islas del Atlántico Sur\',94,0.00388565920855,\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-42.4389445468027,-67.1769071477022,\'IGN\',26105,\'Telsen\',\'Departamento Telsen\',26,0.08477062977664,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6061369839531,-58.4967418386195,\'Direc. de Catastro\',2077,\'Comuna 11\',\'Comuna 11\',2,0.068312121830757,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.2206591685119,-59.5193792218302,\'ARBA - Gerencia de Servicios Catastrales\',6735,\'San Antonio de Areco\',\'Partido de San Antonio de Areco\',6,0.002743115518604,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.610617117824,-58.8109232680035,\'ARBA - Gerencia de Servicios Catastrales\',6560,\'Moreno\',\'Partido de Moreno\',6,0.000592772199711,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.7701647288569,-58.6254486939189,\'ARBA - Gerencia de Servicios Catastrales\',6427,\'La Matanza\',\'Partido de La Matanza\',6,0.001043710266676,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.8875778145279,-70.4626919728142,\'A.R.T - Gerencia de Catastro\',62070,\'Pilcaniyeu\',\'Departamento Pilcaniyeu\',62,0.054707591275933,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.3040900587554,-64.0149932737063,\'Direc. Grl. de Catastro\',86126,\'Ojo de Agua\',\'Departamento Ojo de Agua\',86,0.047395700878861,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.8494190496267,-57.89575256553,\'ARBA - Gerencia de Servicios Catastrales\',6466,\'Lezama\',\'Partido de Lezama\',6,0.003370139081083,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.4261581087913,-57.3996034519105,\'ARBA - Gerencia de Servicios Catastrales\',6655,\'Punta Indio\',\'Partido de Punta Indio\',6,0.005176156526987,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.447823040536,-65.1011266142907,\'Direc. Grl. de Inmuebles\',38014,\'El Carmen\',\'Departamento El Carmen\',38,0.017243931334799,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.7859032829476,-66.2618848691237,\'Adm. Grl. de Catastro\',10091,\'Santa María\',\'Departamento Santa María\',10,0.055652330364832,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-43.2727624456965,-66.172162203297,\'IGN\',26042,\'Gaiman\',\'Departamento Gaiman\',26,0.051379034571875,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.7904353562793,-68.6977547342214,\'IGN\',46077,\'General Lamadrid\',\'Departamento General Lamadrid\',46,0.06645035830557,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.4634407170853,-65.4384772539188,\'Direc. Grl. de Catastro\',14077,\'Pocho\',\'Departamento Pocho\',14,0.01837685452499,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.4514531616824,-59.255912536825,\'IGN\',18070,\'Goya\',\'Departamento Goya\',18,0.054025414444512,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.9879963080686,-58.9337155943843,\'IGN\',18091,\'Lavalle\',\'Departamento Lavalle\',18,0.016786440127912,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.7057979959044,-58.6130197699847,\'IGN\',18161,\'San Roque\',\'Departamento San Roque\',18,0.027223715081732,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6168433901108,-58.4435682280605,\'Direc. de Catastro\',2042,\'Comuna 6\',\'Comuna 6\',2,0.033268754396574,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.2222689247998,-63.8118051923902,\'Direc. Grl. de Catastro\',14175,\'Tulumba\',\'Departamento Tulumba\',14,0.058494390488329,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.6580631596452,-65.0774738750322,\'Direc. Grl. de Catastro\',14028,\'Cruz del Eje\',\'Departamento Cruz del Eje\',14,0.040824220415208,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.2225592168079,-64.5861516801457,\'Direc. Grl. de Catastro\',14091,\'Punilla\',\'Departamento Punilla\',14,0.014843985455241,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.0355515814319,-65.4111896095111,\'Direc. Grl. de Catastro\',14070,\'Minas\',\'Departamento Minas\',14,0.021453910107657,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.9745810611866,-66.3108866018754,\'A.R.T - Gerencia de Catastro\',62084,\'Valcheta\',\'Departamento Valcheta\',62,0.105417002957889,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.9527925288953,-65.3712468150427,\'A.R.T - Gerencia de Catastro\',62077,\'San Antonio\',\'Departamento San Antonio\',62,0.071489428825207,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.2709141317271,-63.2257388675861,\'ARBA - Gerencia de Servicios Catastrales\',6616,\'Pellegrini\',\'Partido de Pellegrini\',6,0.005920895601227,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.9455386975653,-61.2652576678175,\'Direc. Pcial. de Catastro y Cartografía\',22105,\'9 de Julio\',\'Departamento 9 de Julio\',22,0.021826514133195,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.5623945143611,-65.4300986417702,\'Direc. Grl. de Inmuebles\',66077,\'La Caldera\',\'Departamento La Caldera\',66,0.007076560293555,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-34.9445449681903,-68.3826783125854,\'IGN\',50105,\'San Rafael\',\'Departamento San Rafael\',50,0.211310471561227,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.8751339637689,-63.8400961373676,\'Direc. Grl. de Inmuebles\',66007,\'Anta\',\'Departamento Anta\',66,0.145396621538509,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.5776916502152,-65.9316310510947,\'IGN\',46063,\'General Belgrano\',\'Departamento General Belgrano\',46,0.031104167642768,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.9392514746819,-62.7304991775974,\'Direc. Grl. de Catastro\',86056,\'Copo\',\'Departamento Copo\',86,0.093837165647397,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.3164203776524,-68.525398463115,\'IGN\',46098,\'Vinchina\',\'Departamento Vinchina\',46,0.123072933418265,\'La Rioja\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.3142303514009,-71.1842517277166,\'Direc. Pcial. de Catastro e Inf. Territorial\',58056,\'Lácar\',\'Departamento Lácar\',58,0.053901447405494,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.5542357921934,-58.4540058768299,\'Direc. de Catastro\',2091,\'Comuna 13\',\'Comuna 13\',2,0.072562058960701,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-51.4134125040273,-70.5618155470895,\'IGN\',78021,\'Güer Aike\',\'Departamento Güer Aike\',78,0.145188091309108,\'Santa Cruz\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-53.7462919872259,-68.1361046546959,\'Gerencia de Catastro Pcial.\',94008,\'Río Grande\',\'Departamento Río Grande\',94,0.001579568900934,\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-54.7704623704114,-66.6837162279656,\'Gerencia de Catastro Pcial.\',94015,\'Ushuaia\',\'Departamento Ushuaia\',94,0.001894957797817,\'Tierra del Fuego, Antártida e Islas del Atlántico Sur\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.1572730441871,-69.3135099463311,\'IGN\',50077,\'Malargüe\',\'Departamento Malargüe\',50,0.277429787816722,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.2055993966253,-66.4072986488285,\'Adm. Grl. de Catastro\',10084,\'Pomán\',\'Departamento Pomán\',10,0.05474461550135,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.713461665638,-65.2554821697556,\'Direc. Grl. de Catastro\',90035,\'Graneros\',\'Departamento Graneros\',90,0.075221298991928,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.8718676537564,-64.7278906135036,\'Direc. Grl. de Inmuebles\',66140,\'Rosario de la Frontera\',\'Departamento Rosario de la Frontera\',66,0.035480638668551,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-44.0301843800804,-68.6858628378391,\'IGN\',26070,\'Paso de Indios\',\'Departamento Paso de Indios\',26,0.099453972051692,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.747858341484,-61.9605236304385,\'Direc. Pcial. de Catastro y Cartografía\',22007,\'Almirante Brown\',\'Departamento Almirante Brown\',22,0.175452655094443,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.5987132205968,-65.7071834454567,\'Adm. Grl. de Catastro\',10112,\'Valle Viejo\',\'Departamento Valle Viejo\',10,0.006082231911929,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.3210291409673,-60.4553482590556,\'Direc. Pcial. de Catastro y Cartografía\',22091,\'Maipú\',\'Departamento Maipú\',22,0.02921196593469,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8539440726125,-63.9075092603179,\'Direc. Grl. de Catastro\',86161,\'Robles\',\'Departamento Robles\',86,0.009901684810883,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.0114827529012,-58.3699129592754,\'ATER - Direc. de Catastro\',30008,\'Colón\',\'Departamento Colón\',30,0.035200016368235,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.6223342938194,-69.5078054633807,\'IGN\',50119,\'Tunuyán\',\'Departamento Tunuyán\',50,0.02218214855991,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.0382520812765,-69.4437142136667,\'IGN\',50063,\'Luján de Cuyo\',\'Departamento Luján de Cuyo\',50,0.032052501747604,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-45.3403562037762,-70.6400981523958,\'IGN\',26084,\'Río Senguer\',\'Departamento Río Senguer\',26,0.104674022795681,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-41.4981211976981,-71.531077517069,\'A.R.T - Gerencia de Catastro\',62021,\'Bariloche\',\'Departamento Bariloche\',62,0.027257696803031,\'Río Negro\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.7946776781363,-71.2590025540125,\'Direc. Pcial. de Catastro e Inf. Territorial\',58049,\'Huiliches\',\'Departamento Huiliches\',58,0.043328390088419,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-39.4807942918938,-70.4335593332799,\'Direc. Pcial. de Catastro e Inf. Territorial\',58021,\'Catán Lil\',\'Departamento Catán Lil\',58,0.058941584672187,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-40.0529195538789,-70.2813499391274,\'Direc. Pcial. de Catastro e Inf. Territorial\',58028,\'Collón Curá\',\'Departamento Collón Curá\',58,0.062287759182555,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.379488920773,-62.4295611893429,\'ARBA - Gerencia de Servicios Catastrales\',6154,\'Carlos Tejedor\',\'Partido de Carlos Tejedor\',6,0.01257151569267,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.0113151746224,-60.0627625274553,\'ARBA - Gerencia de Servicios Catastrales\',6077,\'Arrecifes\',\'Partido de Arrecifes\',6,0.003924787851307,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.1497065018665,-59.8548037960898,\'ARBA - Gerencia de Servicios Catastrales\',6140,\'Capitán Sarmiento\',\'Partido de Capitán Sarmiento\',6,0.001739113614791,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.2708350525697,-60.305182566345,\'ARBA - Gerencia de Servicios Catastrales\',6714,\'Salto\',\'Partido de Salto\',6,0.005119808629829,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.1199026931696,-59.6016234890441,\'ATER - Direc. de Catastro\',30049,\'Gualeguay\',\'Departamento Gualeguay\',30,0.085304523559541,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.7348931499453,-58.1591541174073,\'ATER - Direc. de Catastro\',30028,\'Federación\',\'Departamento Federación\',30,0.047447530114348,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.4139444642315,-58.7287958918597,\'ATER - Direc. de Catastro\',30042,\'Feliciano\',\'Departamento Feliciano\',30,0.039768657944966,\'Entre Ríos\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.481190578256,-60.9751157295027,\'ARBA - Gerencia de Servicios Catastrales\',6588,\'9 de Julio\',\'Partido de 9 de Julio\',6,0.013803660002645,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.0564352739976,-62.6346332497416,\'ARBA - Gerencia de Servicios Catastrales\',6826,\'Trenque Lauquen\',\'Partido de Trenque Lauquen\',6,0.017839651549132,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.7496551260772,-61.3737522686863,\'ARBA - Gerencia de Servicios Catastrales\',6147,\'Carlos Casares\',\'Partido de Carlos Casares\',6,0.00814632674988,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.8567012129546,-60.6707349373354,\'ARBA - Gerencia de Servicios Catastrales\',6595,\'Olavarría\',\'Partido de Olavarría\',6,0.025084268069142,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8312099703342,-58.476969025414,\'ARBA - Gerencia de Servicios Catastrales\',6260,\'Esteban Echeverría\',\'Partido de Esteban Echeverría\',6,0.000387520264497,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.997569924782,-61.0501968347291,\'ARBA - Gerencia de Servicios Catastrales\',6385,\'General Viamonte\',\'Partido de General Viamonte\',6,0.006861768828807,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4873038284663,-58.7121329971982,\'ARBA - Gerencia de Servicios Catastrales\',6515,\'Malvinas Argentinas\',\'Partido de Malvinas Argentinas\',6,0.000200585089933,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.070384883326,-61.6827618200122,\'ARBA - Gerencia de Servicios Catastrales\',6469,\'Lincoln\',\'Partido de Lincoln\',6,0.018528834893159,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.3471383108251,-60.1308804386321,\'ARBA - Gerencia de Servicios Catastrales\',6798,\'Tapalqué\',\'Partido de Tapalqué\',6,0.01356711179006,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-36.6621621527055,-64.6922110146556,\'Direc. Grl. de Catastro\',42140,\'Toay\',\'Departamento Toay\',42,0.035251142941496,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.2289552221138,-57.8702855877153,\'IGN\',18112,\'Monte Caseros\',\'Departamento Monte Caseros\',18,0.030774917118474,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.0610928531071,-60.6042295511118,\'ARBA - Gerencia de Servicios Catastrales\',6112,\'Bragado\',\'Partido de Bragado\',6,0.007055250125151,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8758213531443,-58.5648395364287,\'ARBA - Gerencia de Servicios Catastrales\',6270,\'José M. Ezeiza\',\'Partido de José M. Ezeiza\',6,0.000759529300064,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.1797375458882,-66.3301334719636,\'Direc. Grl. de Catastro\',42042,\'Curacó\',\'Departamento Curacó\',42,0.095480908484166,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.2419021199786,-66.555232691641,\'Direc. Grl. de Catastro\',42091,\'Limay Mahuida\',\'Departamento Limay Mahuida\',42,0.069867881453523,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-37.4341807808756,-67.6049641366153,\'Direc. Grl. de Catastro\',42112,\'Puelén\',\'Departamento Puelén\',42,0.091687475052809,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8778729879112,-58.2586377649204,\'ARBA - Gerencia de Servicios Catastrales\',6274,\'Florencio Varela\',\'Partido de Florencio Varela\',6,0.000606849802285,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.1888486587603,-64.2732683808708,\'Direc. Grl. de Catastro\',86189,\'Silípica\',\'Departamento Silípica\',86,0.009018348477279,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3786143623767,-54.634090486794,\'Ministerio de Ecología\',54119,\'25 de Mayo\',\'Departamento 25de Mayo\',54,0.055508254677382,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.0704596398936,-58.4319219645129,\'ARBA - Gerencia de Servicios Catastrales\',6778,\'San Vicente\',\'Partido de San Vicente\',6,0.002101343292848,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-36.6405459243249,-61.891417127905,\'ARBA - Gerencia de Servicios Catastrales\',6231,\'Daireaux\',\'Partido de Daireaux\',6,0.012480514027619,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6458046846082,-68.3890526964703,\'Direc. de Geodesia y Catastro\',70063,\'9 de Julio\',\'Departamento 9 de Julio\',70,0.001755581929925,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.6865858135558,-68.4675631318926,\'Direc. de Geodesia y Catastro\',70077,\'Rawson\',\'Departamento Rawson\',70,0.003265114616152,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8422541242657,-57.9789322377767,\'ARBA - Gerencia de Servicios Catastrales\',6245,\'Ensenada\',\'Partido de Ensenada\',6,0.000362603245198,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.5155525089772,-60.7680626719213,\'ARBA - Gerencia de Servicios Catastrales\',6448,\'Laprida\',\'Partido de Laprida\',6,0.011398755641708,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.4869499670191,-58.5372648522523,\'ARBA - Gerencia de Servicios Catastrales\',6756,\'San Isidro\',\'Partido de San Isidro\',6,0.000166314330259,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-37.585278315595,-59.8883008698795,\'ARBA - Gerencia de Servicios Catastrales\',6084,\'Benito Juárez\',\'Partido de Benito Juárez\',6,0.017689287931919,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.3467258804414,-65.4468528811404,\'Direc. Grl. de Inmuebles\',38056,\'San Antonio\',\'Departamento San Antonio\',38,0.013130467746389,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.3138449973517,-54.4407363386818,\'Ministerio de Ecología\',54042,\'Eldorado\',\'Departamento Eldorado\',54,0.057343641010966,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.3785169756021,-59.4878778128786,\'Direc. Pcial. de Catastro y Cartografía\',22084,\'Libertador General San Martín\',\'Departamento Libertador General San Martín\',22,0.072449478004947,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-42.7490685142491,-68.802322331286,\'IGN\',26049,\'Gastre\',\'Departamento Gastre\',26,0.070037926633616,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.1512700249506,-58.5459540333809,\'ARBA - Gerencia de Servicios Catastrales\',6749,\'San Fernando\',\'Partido de San Fernando\',6,0.003141680173165,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.9971401820257,-59.1284709610169,\'ARBA - Gerencia de Servicios Catastrales\',6882,\'Zárate\',\'Partido de Zárate\',6,0.003742240454012,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.9187435892712,-63.3035949540839,\'Direc. Grl. de Catastro\',86168,\'Salavina\',\'Departamento Salavina\',86,0.02340225654888,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.2203346046951,-64.0912083069938,\'Direc. Grl. de Catastro\',86133,\'Pellegrini\',\'Departamento Pellegrini\',86,0.049895281940307,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.5553626652401,-63.2037665884943,\'Direc. Grl. de Catastro\',86028,\'Avellaneda\',\'Departamento Avellaneda\',86,0.028027184579955,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.958636224259,-58.7093649014335,\'Direc. Pcial. de Catastro y Cartografía\',22014,\'Bermejo\',\'Departamento Bermejo\',22,0.025790794433532,\'Chaco\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.216548125306,-65.3939560584901,\'Direc. de Geodesia y Catastro\',74049,\'Junín\',\'Departamento Junín\',74,0.034639990566339,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.9088785853185,-68.2844229443887,\'IGN\',50098,\'San Martín\',\'Departamento San Martín\',50,0.009948945773709,\'Mendoza\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.922044155846,-69.8222074301959,\'Direc. Pcial. de Catastro e Inf. Territorial\',58112,\'Zapala\',\'Departamento Zapala\',58,0.055467930524571,\'Neuquén\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.1440502226475,-64.1528709889175,\'Direc. Grl. de Catastro\',14021,\'Colón\',\'Departamento Colón\',14,0.014050333431972,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.2214972343879,-61.5310164822665,\'Servicio de Catastro e Información Territorial\',82014,\'Caseros\',\'Departamento Caseros\',82,0.026773290950756,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.1278557358532,-60.7108416659256,\'Servicio de Catastro e Información Territorial\',82084,\'Rosario\',\'Departamento Rosario\',82,0.014374422283757,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.9423146043516,-60.9615014674026,\'Servicio de Catastro e Información Territorial\',82119,\'San Lorenzo\',\'Departamento San Lorenzo\',82,0.015410193095699,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.7060836088838,-61.2733877091661,\'Servicio de Catastro e Información Territorial\',82056,\'Iriondo\',\'Departamento Iriondo\',82,0.02467401784493,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.6103027395973,-61.7042951949086,\'Servicio de Catastro e Información Territorial\',82007,\'Belgrano\',\'Departamento Belgrano\',82,0.018700474172887,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.1537713586804,-61.0481265781191,\'Servicio de Catastro e Información Territorial\',82105,\'San Jerónimo\',\'Departamento San Jerónimo\',82,0.033786566925105,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.6150659886474,-62.7386805205781,\'Direc. Grl. de Catastro\',86112,\'Mitre\',\'Departamento Mitre\',86,0.025190226519339,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.3958266942337,-64.8956351260047,\'Direc. Grl. de Inmuebles\',66161,\'Santa Victoria\',\'Departamento Santa Victoria\',66,0.02570672496855,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.7169492299382,-63.6627437658428,\'Direc. Grl. de Inmuebles\',66056,\'General José de San Martín\',\'Departamento General José de San Martín\',66,0.101573625000615,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.3700377167627,-58.062606265553,\'IGN\',34049,\'Pilcomayo\',\'Departamento Pilcomayo\',34,0.071127101578707,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.0327992067991,-63.4385673505455,\'Direc. Grl. de Catastro\',14105,\'Río Primero\',\'Departamento Río Primero\',14,0.04057318821909,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.5405127310562,-67.9292408147481,\'Adm. Grl. de Catastro\',10105,\'Tinogasta\',\'Departamento Tinogasta\',10,0.223757781678618,\'Catamarca\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.030846572143,-62.2767719720096,\'Direc. Grl. de Catastro\',14063,\'Marcos Juárez\',\'Departamento Marcos Juárez\',14,0.056384564063853,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.2027119466219,-64.6167170389735,\'Direc. Grl. de Catastro\',14007,\'Calamuchita\',\'Departamento Calamuchita\',14,0.028341253670986,\'Córdoba\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.7269672116015,-65.1982374778981,\'Direc. de Geodesia y Catastro\',74028,\'Chacabuco\',\'Departamento Chacabuco\',74,0.031698655428991,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.9008795169272,-66.5025775641531,\'Direc. de Geodesia y Catastro\',74056,\'Juan Martín de Pueyrredón\',\'Departamento Juan Martín de Pueyrredón\',74,0.18035153168878,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.8905514573194,-65.56285207424,\'Direc. de Geodesia y Catastro\',74035,\'General Pedernera\',\'Departamento General Pedernera\',74,0.196263739245874,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-40.1973260070881,-62.8529094080666,\'ARBA - Gerencia de Servicios Catastrales\',6602,\'Patagones\',\'Partido de Patagones\',6,0.046514286558646,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.5784192360116,-65.7095887724917,\'Direc. de Geodesia y Catastro\',74063,\'Libertador General San Martín\',\'Departamento Libertador General San Martín\',74,0.045518672142986,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.1068820542746,-65.900790202998,\'Direc. de Geodesia y Catastro\',74021,\'Coronel Pringles\',\'Departamento Coronel Pringles\',74,0.050765721618051,\'San Luis\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6064218855511,-58.3715396530269,\'Direc. de Catastro\',2007,\'Comuna 1\',\'Comuna 1\',2,0.086858465123979,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.6420794257822,-58.3874550689885,\'Direc. de Catastro\',2028,\'Comuna 4\',\'Comuna 4\',2,0.110581967663086,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.617369923785,-58.4205721902857,\'Direc. de Catastro\',2035,\'Comuna 5\',\'Comuna 5\',2,0.032343862027321,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-38.6755832575061,-63.8968179856269,\'Direc. Grl. de Catastro\',42014,\'Caleu Caleu\',\'Departamento Caleu Caleu\',42,0.064792303739145,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.3550759493245,-68.4412683481467,\'Direc. de Geodesia y Catastro\',70056,\'Jáchal\',\'Departamento Jáchal\',70,0.161947599206999,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-29.382302416388,-63.3535127711283,\'Direc. Grl. de Catastro\',86140,\'Quebrachos\',\'Departamento Quebrachos\',86,0.029306450589987,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.0163816801467,-58.1855624499057,\'IGN\',18098,\'Mburucuyá\',\'Departamento Mburucuyá\',18,0.011125000641965,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8961218833917,-58.6658439667722,\'IGN\',18042,\'Empedrado\',\'Departamento Empedrado\',18,0.021840912281244,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.9114257175706,-56.7904763823004,\'IGN\',18084,\'Ituzaingó\',\'Departamento Ituzaingó\',18,0.107639981101467,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3823055047941,-58.5174860021794,\'IGN\',18133,\'San Cosme\',\'Departamento San Cosme\',18,0.006563292601285,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.3460562357383,-58.0713754415461,\'IGN\',18077,\'Itatí\',\'Departamento Itatí\',18,0.009649618952078,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.5662276065396,-58.490428041078,\'Direc. de Catastro\',2084,\'Comuna 12\',\'Comuna 12\',2,0.076114910128275,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.7771031457714,-55.1674595934642,\'Ministerio de Ecología\',54105,\'San Javier\',\'Departamento San Javier\',54,0.021849162480571,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.8888038850636,-55.6782740306512,\'Ministerio de Ecología\',54007,\'Apóstoles\',\'Departamento Apóstoles\',54,0.035020185496734,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.6299609405552,-53.9629779665021,\'Ministerio de Ecología\',54112,\'San Pedro\',\'Departamento San Pedro\',54,0.136117294277154,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.6579081276292,-54.5631774073677,\'Ministerio de Ecología\',54084,\'Montecarlo\',\'Departamento Montecarlo\',54,0.058847158648621,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-35.6187689428966,-57.9043202817554,\'ARBA - Gerencia de Servicios Catastrales\',6217,\'Chascomús\',\'Partido de Chascomús\',6,0.010206560081071,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Comuna\',-34.5918836701565,-58.4627740218828,\'Direc. de Catastro\',2105,\'Comuna 15\',\'Comuna 15\',2,0.069531800500003,\'Ciudad Autónoma de Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.1877612837658,-63.854114579231,\'Direc. Grl. de Catastro\',86175,\'San Martín\',\'Departamento San Martín\',86,0.013138966842122,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.899591169452,-64.2725159118858,\'Direc. Grl. de Catastro\',86091,\'Jiménez\',\'Departamento Jiménez\',86,0.040422165132838,\'Santiago del Estero\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-33.9321914567436,-59.4929504876902,\'ARBA - Gerencia de Servicios Catastrales\',6070,\'Baradero\',\'Partido de Baradero\',6,0.00483196203113,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.0821382910047,-65.4089124214828,\'Direc. Grl. de Inmuebles\',38028,\'Humahuaca\',\'Departamento Humahuaca\',38,0.066299068722753,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.2906705371725,-65.5669616842196,\'Direc. Grl. de Inmuebles\',38112,\'Yaví\',\'Departamento Yaví\',38,0.056031362803413,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.137931595162,-66.227664877192,\'Direc. Grl. de Inmuebles\',38077,\'Santa Catalina\',\'Departamento Santa Catalina\',38,0.054714501384127,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.2985497355434,-64.8110140944895,\'Direc. Grl. de Inmuebles\',38063,\'San Pedro\',\'Departamento San Pedro\',38,0.038745686836376,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.4670612447247,-65.0119194137172,\'Direc. Grl. de Inmuebles\',38105,\'Valle Grande\',\'Departamento Valle Grande\',38,0.022759021376449,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.8750609917942,-59.9585024741836,\'IGN\',34035,\'Patiño\',\'Departamento Patiño\',34,0.347213385939381,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.0255563345755,-61.2828019983788,\'IGN\',34007,\'Bermejo\',\'Departamento Bermejo\',34,0.18255816841976,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.5204314374652,-66.6617993267455,\'Direc. Grl. de Inmuebles\',38084,\'Susques\',\'Departamento Susques\',38,0.191769108128745,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.8148374145959,-64.9202186004952,\'Direc. Grl. de Inmuebles\',66070,\'Iruya\',\'Departamento Iruya\',66,0.022447911082756,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.854855944809,-62.076891256733,\'IGN\',34028,\'Matacos\',\'Departamento Matacos\',34,0.053323093306316,\'Formosa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.6424364614968,-67.34403275869,\'Direc. Grl. de Inmuebles\',66105,\'Los Andes\',\'Departamento Los Andes\',66,0.162084197539954,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.4987690402927,-64.1510163822065,\'Direc. Grl. de Inmuebles\',66126,\'Orán\',\'Departamento Orán\',66,0.074493530257492,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.560543852464,-65.3197513527091,\'Direc. Grl. de Inmuebles\',38094,\'Tilcara\',\'Departamento Tilcara\',38,0.039910898892935,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.1949225444459,-65.1264498289923,\'Direc. Grl. de Inmuebles\',38042,\'Palpalá\',\'Departamento Palpalá\',38,0.00921981619169,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.9392350234639,-65.9346878202021,\'Direc. Grl. de Inmuebles\',38007,\'Cochinoca\',\'Departamento Cochinoca\',38,0.134607897149451,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-23.7434725633393,-65.696096204681,\'Direc. Grl. de Inmuebles\',38098,\'Tumbaya\',\'Departamento Tumbaya\',38,0.062091371374756,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.0893413107767,-65.4484768876505,\'Direc. Grl. de Inmuebles\',38021,\'Dr. Manuel Belgrano\',\'Departamento Dr. Manuel Belgrano\',38,0.039222610943372,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.0075465739997,-64.4023110880998,\'Direc. Grl. de Inmuebles\',38070,\'Santa Bárbara\',\'Departamento Santa Bárbara\',38,0.082912857042704,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-22.6216157957901,-66.5415733150047,\'Direc. Grl. de Inmuebles\',38049,\'Rinconada\',\'Departamento Rinconada\',38,0.115181969052712,\'Jujuy\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-24.1468804221181,-66.2073097573146,\'Direc. Grl. de Inmuebles\',66091,\'La Poma\',\'Departamento La Poma\',66,0.025746468588993,\'Salta\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.2695777554986,-65.8110121945484,\'Direc. Grl. de Catastro\',90021,\'Chicligasta\',\'Departamento Chicligasta\',90,0.057347805573504,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1106075164054,-65.6431429705926,\'Direc. Grl. de Catastro\',90070,\'Monteros\',\'Departamento Monteros\',90,0.052785119153119,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1918024636989,-65.0850078123385,\'Direc. Grl. de Catastro\',90056,\'Leales\',\'Departamento Leales\',90,0.087419909160796,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.9759879123642,-65.4789798424484,\'Direc. Grl. de Catastro\',90028,\'Famaillá\',\'Departamento Famaillá\',90,0.020347742769304,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.832724441173,-65.2174963397207,\'Direc. Grl. de Catastro\',90084,\'Capital\',\'Departamento Capital\',90,0.003957462162904,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.9182437174427,-64.9757343718485,\'Direc. Grl. de Catastro\',90014,\'Cruz Alta\',\'Departamento Cruz Alta\',90,0.053236451290829,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.3432601177699,-65.4054839941384,\'Direc. Grl. de Catastro\',90112,\'Trancas\',\'Departamento Trancas\',90,0.132955228797671,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.5914036518985,-65.8894957616981,\'Direc. Grl. de Catastro\',90098,\'Tafí del Valle\',\'Departamento Tafí del Valle\',90,0.108239413581945,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.0125797507259,-61.8082508211602,\'Servicio de Catastro e Información Territorial\',82126,\'San Martín\',\'Departamento San Martín\',82,0.037489799360427,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.6020473964888,-58.2685422687085,\'IGN\',18140,\'San Luis del Palmar\',\'Departamento San Luis del Palmar\',18,0.028620150528534,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.4779720010057,-57.6113792118725,\'IGN\',18014,\'Berón de Astrada\',\'Departamento Berón de Astrada\',18,0.009443929908258,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.2314149716439,-61.6569626868615,\'Servicio de Catastro e Información Territorial\',82021,\'Castellanos\',\'Departamento Castellanos\',82,0.050711307957098,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.5304248150144,-60.4886940672765,\'Servicio de Catastro e Información Territorial\',82112,\'San Justo\',\'Departamento San Justo\',82,0.042025357832512,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.2283191431559,-61.360015159641,\'Servicio de Catastro e Información Territorial\',82091,\'San Cristóbal\',\'Departamento San Cristóbal\',82,0.109486502039334,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-30.1041461066388,-59.8980704738644,\'Servicio de Catastro e Información Territorial\',82098,\'San Javier\',\'Departamento San Javier\',82,0.049916283020121,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.6719704542176,-59.5266516978974,\'Servicio de Catastro e Información Territorial\',82049,\'General Obligado\',\'Departamento General Obligado\',82,0.081636882489971,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.4874196948621,-68.5239289662613,\'Direc. de Geodesia y Catastro\',70042,\'Chimbas\',\'Departamento Chimbas\',70,0.000762904819991,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.5285412012606,-68.2072931248825,\'Direc. de Geodesia y Catastro\',70091,\'San Martín\',\'Departamento San Martín\',70,0.006285052864776,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-42.4436350204267,-64.9332260287713,\'IGN\',26007,\'Biedma\',\'Departamento Biedma\',26,0.056232489808085,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Partido\',-34.8738967496734,-62.4013534701346,\'ARBA - Gerencia de Servicios Catastrales\',6277,\'Florentino Ameghino\',\'Partido de Florentino Ameghino\',6,0.005778507410711,\'Buenos Aires\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-44.4232685527937,-66.1300665443193,\'IGN\',26028,\'Florentino Ameghino\',\'Departamento Florentino Ameghino\',26,0.071418557255647,\'Chubut\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.793699696551,-65.5981413742508,\'Direc. Grl. de Catastro\',90049,\'La Cocha\',\'Departamento La Cocha\',90,0.042611585058546,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.6058945987109,-65.7832035039246,\'Direc. Grl. de Catastro\',90042,\'Juan Bautista Alberdi\',\'Departamento Juan Bautista Alberdi\',90,0.032805293425934,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.450131903938,-65.7517295073354,\'Direc. Grl. de Catastro\',90077,\'Río Chico\',\'Departamento Río Chico\',90,0.02720066107773,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.424163373399,-65.2918660955326,\'Direc. Grl. de Catastro\',90091,\'Simoca\',\'Departamento Simoca\',90,0.059602553109191,\'Tucumán\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-33.9251483443292,-61.9449986852751,\'Servicio de Catastro e Información Territorial\',82042,\'General López\',\'Departamento General López\',82,0.089004490952967,\'Santa Fe\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.4608502028348,-55.5826897694998,\'Ministerio de Ecología\',54021,\'Candelaria\',\'Departamento Candelaria\',54,0.030893758961845,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.1478299707848,-54.802339249309,\'Ministerio de Ecología\',54014,\'Cainguás\',\'Departamento Cainguás\',54,0.051892230532523,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-26.8931448853066,-54.9233629496583,\'Ministerio de Ecología\',54077,\'Libertador General San Martín\',\'Departamento Libertador General San Martín\',54,0.048891168358205,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-25.9786262379125,-53.9636582644351,\'Ministerio de Ecología\',54049,\'General Manuel Belgrano\',\'Departamento General Manuel Belgrano\',54,0.099295480784635,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.0262341090705,-54.2693679741111,\'Ministerio de Ecología\',54056,\'Guaraní\',\'Departamento Guaraní\',54,0.109704962953141,\'Misiones\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.5542325394479,-68.6416232535812,\'Direc. de Geodesia y Catastro\',70084,\'Rivadavia\',\'Departamento Rivadavia\',70,0.001373455044975,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.5327173670967,-68.4634116809574,\'Direc. de Geodesia y Catastro\',70098,\'Santa Lucía\',\'Departamento Santa Lucía\',70,0.000617293120832,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.7459555808161,-68.5842081096793,\'Direc. de Geodesia y Catastro\',70070,\'Pocito\',\'Departamento Pocito\',70,0.006500256702711,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-32.073542322508,-68.691135621109,\'Direc. de Geodesia y Catastro\',70105,\'Sarmiento\',\'Departamento Sarmiento\',70,0.032723012720092,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-31.5330748483572,-68.5342856277406,\'Direc. de Geodesia y Catastro\',70028,\'Capital\',\'Departamento Capital\',70,0.000304404814291,\'San Juan\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.2272428701704,-63.6609121074931,\'Direc. Grl. de Catastro\',42056,\'Chapaleufú\',\'Departamento Chapaleufú\',42,0.017175725434408,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-35.6796177582431,-63.6624891520267,\'Direc. Grl. de Catastro\',42105,\'Maracó\',\'Departamento Maracó\',42,0.017149724718334,\'La Pampa\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-28.4083953496766,-58.031384641798,\'IGN\',18028,\'Concepción\',\'Departamento Concepción\',18,0.059052291549418,\'Corrientes\');');
DB::statement('INSERT INTO public."Departamento"(
	categoria, centroide_lat, centroide_lon, fuente, id, nombre, nombre_completo , provincia_id, provincia_interseccion, provincia_nombre)
	VALUES (\'Departamento\',-27.6306652578033,-55.3880677535388,\'Ministerio de Ecología\',54070,\'Leandro N. Alem\',\'Departamento Leandro N. Alem\',54,0.035963511216364,\'Misiones\');');



//php artisan migrate --path=database/migrations/2022_09_12_225002_create_tables_raw_table.php


    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Localidad2');
    }
}
