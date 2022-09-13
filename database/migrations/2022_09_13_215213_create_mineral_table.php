<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMineralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mineral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable(false);
            $table->string('categoria')->nullable()->default(null);
            $table->boolean('active')->default(true);
            $table->integer('create_uid')->default(1);
            $table->dateTime('create_date')->nullable()->default(null);
            $table->integr('write_uid')->default(1);
            $table->dateTime('write_date')->nullable()->default(null);

            $table->timestamps();
            $table->timestamp('deleted_at');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });















        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1031,\'Arenas Metalíferas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1032,\'Piedras Preciosas (en lechos de ríos)\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1033,\'Aguas Corrientes\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1034,\'Placeres\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1036,\'Salitres\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1037,\'Salinas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1038,\'Turberas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1039,\'Metales no comprendidos en 1° Categ.\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1040,\'Tierras Piritosas y Aluminosas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1041,\'Abrasivos\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1042,\'Ocres\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1043,\'Resinas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1044,\'Esteatitas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1045,\'Baritina\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1046,\'Caparrosas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1047,\'Grafito\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1048,\'Caolín\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1049,\'Sales Alcalinas o Alcalino Terrosas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1050,\'Amianto\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1051,\'Bentonita\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1052,\'Zeolitas o Minerales Permutantes\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1089,\'Abrasivos\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1053,\'Piedras Calizas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1054,\'Calcáreas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1055,\'Margas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1056,\'Yeso\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1057,\'Alabastro\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1058,\'Mármoles\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1059,\'Granitos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1060,\'Dolomita\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1061,\'Pizarras\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1062,\'Areniscas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1063,\'Cuarcitas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1064,\'Basaltos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1066,\'Cascajo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (994,\'Oro\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (995,\'Plata\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (996,\'Platino\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (997,\'Mercurio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (999,\'Hierro\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1096,\'Arenas Metalíferas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1110,\'Caolín\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1111,\'Caparrosas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1121,\'Esteatitas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1140,\'Mineral en aguas corrientes\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1141,\'Mineral en desmontes, relevantes y escoriales\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1142,\'Mineral en placeres\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1155,\'Piedras Preciosas (en lechos de ríos)\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1163,\'Resinas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1173,\'Turberas\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1181,\'Relaves\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1182,\'Escoreales\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1035,\'Desmontes\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1095,\'Arcillas Comunes\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1097,\'Arenas No Metalíferas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1098,\'Areniscas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1102,\'Basaltos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1108,\'Calcáreas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1109,\'Canto Rodado\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1112,\'Cascajo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1113,\'Ceniza Volcánica\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1116,\'Conchilla\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1000,\'Plomo\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1001,\'Estaño\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1002,\'Zinc\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1003,\'Níquel\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1004,\'Cobalto\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1005,\'Bismuto\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1006,\'Manganeso\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1007,\'Antimonio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1008,\'Wolfram\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1009,\'Aluminio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1010,\'Berilio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1011,\'Vanadio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1012,\'Cadmio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1013,\'Tantalio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1014,\'Molibdeno\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1015,\'Litio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1016,\'Potasio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1017,\'Hulla\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1018,\'Lignito\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1019,\'Antracita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1125,\'Cloruro De Sodio\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1145,\'Bario\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1101,\'Diatomea\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1164,\'Sal Gemma\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1138,\'Barito\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1103,\'Vermiculita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1169,\'Potatrueo\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1166,\'Abratruevo\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1092,\'Esmeril\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1020,\'Hidrocarburos Sólidos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1021,\'Arsénico\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1179,\'Rodocrosita\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1022,\'Cuarzo\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1023,\'Feldespato\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1024,\'Mica\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1025,\'Fluorita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1026,\'Fosfatos Calizos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1028,\'Boratos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1029,\'Piedras Preciosas\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1030,\'Vapores Endógenos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1,\'Cobre\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1091,\'Aluminio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1093,\'Antimonio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1094,\'Antracita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1099,\'Arsénico\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1100,\'Azufre\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1104,\'Berilio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1105,\'Bismuto\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1106,\'Boratos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1107,\'Cadmio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1114,\'Cobalto\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1124,\'Fosfatos Calizos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1130,\'Hulla\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1131,\'Lignito\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1132,\'Litio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1139,\'Mica\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1144,\'Níquel\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1154,\'Piedras Preciosas\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1158,\'Platino\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1161,\'Potasio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1168,\'Tantalio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1171,\'Torio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1174,\'Uranio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1065,\'Arenas No Metalíferas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1067,\'Canto Rodado\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1068,\'Pedregullo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1069,\'Grava\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1070,\'Conchilla\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1071,\'Piedra Laja\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1072,\'Ceniza Volcánica\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1073,\'Perlita\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1074,\'Piedra Pómez\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1075,\'Piedra Afilar\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1076,\'Puzzolanas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1077,\'Pórfidos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1078,\'Tobas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1079,\'Tosca\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1080,\'Serpentina\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1081,\'Piedra Sapo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1082,\'Loes\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1083,\'Arcillas Comunes\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1087,\'Prueba3\',\'tercera\,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1088,\'Prueba3\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1090,\'Alabastro\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1117,\'Cuarcitas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1119,\'Dolomita\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1126,\'Granitos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1127,\'Grava\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1133,\'Loes\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1135,\'Margas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1136,\'Mármoles\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1147,\'Pedregullo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1148,\'Perlita\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1150,\'Piedra Laja\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1151,\'Piedra Pómez\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1152,\'Piedra Sapo\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1153,\'Piedras Calizas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1156,\'Pizarras\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1162,\'Puzzolanas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1167,\'Serpentina\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1170,\'Tobas\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1172,\'Tosca\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1178,\'Yeso\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1165,\'Turba\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1157,\'hhhh\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1115,\'uooo\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1146,\'Petroleo\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1128,\'Carbón\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1129,\'hhhhhhh\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1027,\'Esquistos Bituminosos\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1134,\'Asfaltita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1176,\'Celestina\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1159,\'Estroncio\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1118,\'Silvita\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1177,\'Caolin\',\'segunda\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1143,\'aaaa\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1122,\'Selenio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (998,\'ddd\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1160,\'Áridos\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1180,\'Ulexita\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1123,\'Jade\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1175,\'Tinogasta\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1149,\'Puzolana\',\'tercera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1137,\'Magnesio\',\'primera\',\'t\',1,null);');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active, create_uid, create_date, write_uid, write_date)
            VALUES (1120,\'aaaa\',\'primera\',\'t\',1,null);');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mineral');
    }
}
