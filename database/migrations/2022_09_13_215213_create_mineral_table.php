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

            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->index(['id']);
        });















        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1031,\'Arenas Metalíferas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1032,\'Piedras Preciosas (en lechos de ríos)\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1033,\'Aguas Corrientes\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1034,\'Placeres\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1036,\'Salitres\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1037,\'Salinas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1038,\'Turberas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1039,\'Metales no comprendidos en 1° Categ.\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1040,\'Tierras Piritosas y Aluminosas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1041,\'Abrasivos\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1042,\'Ocres\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1043,\'Resinas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1044,\'Esteatitas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1045,\'Baritina\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1046,\'Caparrosas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1047,\'Grafito\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1048,\'Caolín\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1049,\'Sales Alcalinas o Alcalino Terrosas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1050,\'Amianto\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1051,\'Bentonita\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1052,\'Zeolitas o Minerales Permutantes\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1089,\'Abrasivos\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1053,\'Piedras Calizas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1054,\'Calcáreas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1055,\'Margas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1056,\'Yeso\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1057,\'Alabastro\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1058,\'Mármoles\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1059,\'Granitos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1060,\'Dolomita\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1061,\'Pizarras\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1062,\'Areniscas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1063,\'Cuarcitas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1064,\'Basaltos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1066,\'Cascajo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (994,\'Oro\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (995,\'Plata\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (996,\'Platino\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (997,\'Mercurio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (999,\'Hierro\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1096,\'Arenas Metalíferas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1110,\'Caolín\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1111,\'Caparrosas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1121,\'Esteatitas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1140,\'Mineral en aguas corrientes\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1141,\'Mineral en desmontes, relevantes y escoriales\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1142,\'Mineral en placeres\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1155,\'Piedras Preciosas (en lechos de ríos)\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1163,\'Resinas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1173,\'Turberas\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1181,\'Relaves\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1182,\'Escoreales\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1035,\'Desmontes\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1095,\'Arcillas Comunes\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1097,\'Arenas No Metalíferas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1098,\'Areniscas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1102,\'Basaltos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1108,\'Calcáreas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1109,\'Canto Rodado\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1112,\'Cascajo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1113,\'Ceniza Volcánica\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1116,\'Conchilla\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1000,\'Plomo\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1001,\'Estaño\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1002,\'Zinc\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1003,\'Níquel\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1004,\'Cobalto\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1005,\'Bismuto\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1006,\'Manganeso\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1007,\'Antimonio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1008,\'Wolfram\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1009,\'Aluminio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1010,\'Berilio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1011,\'Vanadio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1012,\'Cadmio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1013,\'Tantalio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1014,\'Molibdeno\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1015,\'Litio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1016,\'Potasio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1017,\'Hulla\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1018,\'Lignito\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1019,\'Antracita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1125,\'Cloruro De Sodio\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1145,\'Bario\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1101,\'Diatomea\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1164,\'Sal Gemma\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1138,\'Barito\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1103,\'Vermiculita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1169,\'Potatrueo\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1166,\'Abratruevo\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1092,\'Esmeril\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1020,\'Hidrocarburos Sólidos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1021,\'Arsénico\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1179,\'Rodocrosita\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1022,\'Cuarzo\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1023,\'Feldespato\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1024,\'Mica\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1025,\'Fluorita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1026,\'Fosfatos Calizos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1028,\'Boratos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1029,\'Piedras Preciosas\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1030,\'Vapores Endógenos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1,\'Cobre\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1091,\'Aluminio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1093,\'Antimonio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1094,\'Antracita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1099,\'Arsénico\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1100,\'Azufre\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1104,\'Berilio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1105,\'Bismuto\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1106,\'Boratos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1107,\'Cadmio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1114,\'Cobalto\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1124,\'Fosfatos Calizos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1130,\'Hulla\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1131,\'Lignito\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1132,\'Litio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1139,\'Mica\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1144,\'Níquel\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1154,\'Piedras Preciosas\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1158,\'Platino\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1161,\'Potasio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1168,\'Tantalio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1171,\'Torio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1174,\'Uranio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1065,\'Arenas No Metalíferas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1067,\'Canto Rodado\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1068,\'Pedregullo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1069,\'Grava\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1070,\'Conchilla\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1071,\'Piedra Laja\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1072,\'Ceniza Volcánica\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1073,\'Perlita\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1074,\'Piedra Pómez\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1075,\'Piedra Afilar\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1076,\'Puzzolanas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1077,\'Pórfidos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1078,\'Tobas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1079,\'Tosca\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1080,\'Serpentina\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1081,\'Piedra Sapo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1082,\'Loes\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1083,\'Arcillas Comunes\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1087,\'Prueba3\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1088,\'Prueba3\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1090,\'Alabastro\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1117,\'Cuarcitas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1119,\'Dolomita\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1126,\'Granitos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1127,\'Grava\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1133,\'Loes\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1135,\'Margas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1136,\'Mármoles\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1147,\'Pedregullo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1148,\'Perlita\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1150,\'Piedra Laja\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1151,\'Piedra Pómez\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1152,\'Piedra Sapo\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1153,\'Piedras Calizas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1156,\'Pizarras\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1162,\'Puzzolanas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1167,\'Serpentina\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1170,\'Tobas\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1172,\'Tosca\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1178,\'Yeso\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1165,\'Turba\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1157,\'hhhh\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1115,\'uooo\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1146,\'Petroleo\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1128,\'Carbón\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1129,\'hhhhhhh\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1027,\'Esquistos Bituminosos\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1134,\'Asfaltita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1176,\'Celestina\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1159,\'Estroncio\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1118,\'Silvita\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1177,\'Caolin\',\'segunda\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1143,\'aaaa\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1122,\'Selenio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (998,\'ddd\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1160,\'Áridos\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1180,\'Ulexita\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1123,\'Jade\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1175,\'Tinogasta\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1149,\'Puzolana\',\'tercera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1137,\'Magnesio\',\'primera\',\'t\');');
        DB::statement('INSERT INTO public."mineral"(
            id, name, categoria, active)
            VALUES (1120,\'aaaa\',\'primera\',\'t\');');

        
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
