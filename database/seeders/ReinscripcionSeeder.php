<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Productores;

use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\Minerales;
use App\Models\Reinscripciones;

class ReinscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        //datos globales
        $idProvincia = 70;
        $comentarios = false;


        if($idProvincia == 0)
        {
            //no tenog seteada la provincia y voy a buscar una cualquiera
            $ids_de_provincias = [2,6,10,14,18,22,26,30,34,38,42,46,50,54,58,62,66,70,74,78,82,86,90,94];
            $idProvincia = $ids_de_provincias[$faker->numberBetween($min = 0, $max = count($ids_de_provincias))];
        }
        for($i = 0;$i< 100; $i++)
        {
            $ids_de_productores = [136, 139,140];


            $nuevo_reinscripcion = new Reinscripciones();
            $nuevo_reinscripcion->id_productor = $ids_de_productores[$faker->numberBetween($min = 0, $max = count($ids_de_productores))];
            $nuevo_reinscripcion->fecha_vto = date('Y-m-d', strtotime("2021-12-01". ' + 6 months'));
            $nuevo_reinscripcion->prospeccion = 1;
            if($comentarios)
            {
                $nuevo_reinscripcion->prospeccion_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->prospeccion_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->prospeccion_evaluacion = null;
                $nuevo_reinscripcion->prospeccion_comentario = null;
            } 
            $nuevo_reinscripcion->exploracion = $faker->numberBetween($min = 0, $max = 1);
            if($comentarios)
            {
                $nuevo_reinscripcion->exploracion_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->exploracion_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->exploracion_evaluacion = null;
                $nuevo_reinscripcion->exploracion_comentario = null;
            } 
            $nuevo_reinscripcion->explotacion = $faker->numberBetween($min = 0, $max = 1);
            if($comentarios)
            {
                $nuevo_reinscripcion->explotacion_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->explotacion_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->explotacion_evaluacion = null;
                $nuevo_reinscripcion->explotacion_comentario = null;
            }
            $nuevo_reinscripcion->desarrollo = $faker->numberBetween($min = 0, $max = 1);
            if($comentarios)
            {
                $nuevo_reinscripcion->desarrollo_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->desarrollo_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->desarrollo_evaluacion = null;
                $nuevo_reinscripcion->desarrollo_comentario = null;
            }
            $nuevo_reinscripcion->cantidad_productos = $faker->numberBetween($min = 0, $max = 4);
            /* for ($i=0; $i < $nuevo_reinscripcion->cantidad_productos; $i++) { 
                
            } */
            if($comentarios)
            {
                $nuevo_reinscripcion->cantidad_productos_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->cantidad_productos_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->cantidad_productos_evaluacion = null;
                $nuevo_reinscripcion->cantidad_productos_comentario = null;
            }

            $valor_provincia = $faker->numberBetween($min = 0, $max = 100);
            $nuevo_reinscripcion->porcentaje_venta_provincia =  $faker->numberBetween($min = 0, $max = 100);
            if($comentarios)
            {
                $nuevo_reinscripcion->porcentaje_venta_provincia_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->porcentaje_venta_provincia_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->porcentaje_venta_provincia_evaluacion = null;
                $nuevo_reinscripcion->porcentaje_venta_provincia_comentario = null;
            }
            $nuevo_reinscripcion->porcentaje_venta_otras_provincias =  $faker->numberBetween($min = 0, $max = 100-$nuevo_reinscripcion->porcentaje_venta_provincia);
            if($comentarios)
            {
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_evaluacion = null;
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_comentario = null;
            }
            $nuevo_reinscripcion->porcentaje_exportado =  $faker->numberBetween($min = 0, $max = 100-$nuevo_reinscripcion->porcentaje_venta_provincia - $nuevo_reinscripcion->porcentaje_venta_otras_provincias);
            if($comentarios)
            {
                $nuevo_reinscripcion->porcentaje_exportado_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->porcentaje_exportado_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->porcentaje_exportado_evaluacion = null;
                $nuevo_reinscripcion->porcentaje_exportado_comentario = null;
            }



            $nuevo_reinscripcion->personal_perm_profesional = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_perm_operarios = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_perm_administrativos = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_perm_otros = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_trans_profesional = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_trans_operarios = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_trans_administrativos = $faker->numberBetween($min = 0, $max = 50);
            $nuevo_reinscripcion->personal_trans_otros = $faker->numberBetween($min = 0, $max = 50);
            if($comentarios)
            {
                $nuevo_reinscripcion->personal_perm_operarios_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_perm_operarios_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_perm_administrativos_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_perm_administrativos_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_perm_otros_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_perm_otros_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_profesional_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_profesional_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_operarios_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_operarios_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_administrativos_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_administrativos_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_otros_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->personal_trans_otros_comentario = $faker->text($maxNbChars = 50);
            }
            else{
                $nuevo_reinscripcion->personal_perm_operarios_evaluacion = null;
                $nuevo_reinscripcion->personal_perm_operarios_comentario = null;
                $nuevo_reinscripcion->personal_perm_administrativos_evaluacion = null;
                $nuevo_reinscripcion->personal_perm_administrativos_comentario = null;
                $nuevo_reinscripcion->personal_perm_otros_evaluacion = null;
                $nuevo_reinscripcion->personal_perm_otros_comentario = null;
                $nuevo_reinscripcion->personal_trans_profesional_evaluacion = null;
                $nuevo_reinscripcion->personal_trans_profesional_comentario = null;
                $nuevo_reinscripcion->personal_trans_operarios_evaluacion = null;
                $nuevo_reinscripcion->personal_trans_operarios_comentario = null;
                $nuevo_reinscripcion->personal_trans_administrativos_evaluacion = null;
                $nuevo_reinscripcion->personal_trans_administrativos_comentario = null;
                $nuevo_reinscripcion->personal_trans_otros_evaluacion = null;
                $nuevo_reinscripcion->personal_trans_otros_comentario = null;
            }







/*


            $nuevo_reinscripcion->nombre
            $nuevo_reinscripcion->nombre_evaluacion
            $nuevo_reinscripcion->nombre_comentario
            $nuevo_reinscripcion->dni
            $nuevo_reinscripcion->dni_evaluacion
            $nuevo_reinscripcion->dni_comentario
            $nuevo_reinscripcion->cargo
            $nuevo_reinscripcion->cargo_evaluacion
            $nuevo_reinscripcion->cargo_comentario
            $nuevo_reinscripcion->id_departamento
            $nuevo_reinscripcion->id_departamento_evaluacion
            $nuevo_reinscripcion->id_departamento_comentario
            $nuevo_reinscripcion->id_localidad
            $nuevo_reinscripcion->id_localidad_evaluacion
            $nuevo_reinscripcion->id_localidad_comentario
            $nuevo_reinscripcion->subterranea
            $nuevo_reinscripcion->subterranea_evaluacion
            $nuevo_reinscripcion->subterranea_comentario
            $nuevo_reinscripcion->cielo_abierto
            $nuevo_reinscripcion->cielo_abierto_evaluacion
            $nuevo_reinscripcion->cielo_abierto_comentario
            $nuevo_reinscripcion->manual
            $nuevo_reinscripcion->manual_evaluacion
            $nuevo_reinscripcion->manual_comentario
            $nuevo_reinscripcion->mecanizada
            $nuevo_reinscripcion->mecanizada_evaluacion
            $nuevo_reinscripcion->mecanizada_comentario
            $nuevo_reinscripcion->expediente
            $nuevo_reinscripcion->expediente_evaluacion
            $nuevo_reinscripcion->expediente_comentario
            $nuevo_reinscripcion->polvorin
            $nuevo_reinscripcion->polvorin_evaluacion
            $nuevo_reinscripcion->polvorin_comentario
            $nuevo_reinscripcion->ubicacion
            $nuevo_reinscripcion->ubicacion_evaluacion
            $nuevo_reinscripcion->ubicacion_comentario
            $nuevo_reinscripcion->dimensiones
            $nuevo_reinscripcion->dimensiones_evaluacion
            $nuevo_reinscripcion->dimensiones_comentario
            $nuevo_reinscripcion->personal_permanente
            $nuevo_reinscripcion->personal_permanente_evaluacion
            $nuevo_reinscripcion->personal_permanente_comentario
            $nuevo_reinscripcion->temporario
            $nuevo_reinscripcion->temporario_evaluacion
            $nuevo_reinscripcion->temporario_comentario
            $nuevo_reinscripcion->total
            $nuevo_reinscripcion->total_evaluacion
            $nuevo_reinscripcion->total_comentario
            $nuevo_reinscripcion->id_productor_evaluacion
            $nuevo_reinscripcion->id_productor_comentario
            $nuevo_reinscripcion->production_checkbox
            $nuevo_reinscripcion->production_checkbox_evaluacion
            $nuevo_reinscripcion->production_checkbox_comentario
            $nuevo_reinscripcion->reserva
            $nuevo_reinscripcion->reserva_evaluacion
            $nuevo_reinscripcion->reserva_comentario
            $nuevo_reinscripcion->vida_util
            $nuevo_reinscripcion->vida_util_evaluacion
            $nuevo_reinscripcion->vida_util_comentario
            $nuevo_reinscripcion->volumen_total
            $nuevo_reinscripcion->volumen_total_evaluacion
            $nuevo_reinscripcion->volumen_total_comentario
            $nuevo_reinscripcion->volumen_unitario
            $nuevo_reinscripcion->volumen_unitario_evaluacion
            $nuevo_reinscripcion->volumen_unitario_comentario
            $nuevo_reinscripcion->volumen_comercializado
            $nuevo_reinscripcion->volumen_comercializado_evaluacion
            $nuevo_reinscripcion->volumen_comercializado_comentario
            $nuevo_reinscripcion->procesamiento_mineral
            $nuevo_reinscripcion->procesamiento_mineral_evaluacion
            $nuevo_reinscripcion->procesamiento_mineral_comentario
            $nuevo_reinscripcion->personal_perm_tecnicos
            $nuevo_reinscripcion->personal_perm_tecnicos_evaluacion
            $nuevo_reinscripcion->personal_perm_tecnicos_comentario
            $nuevo_reinscripcion->permiso_anmac
            $nuevo_reinscripcion->permiso_anmac_evaluacion
            $nuevo_reinscripcion->permiso_anmac_comentario
            $nuevo_reinscripcion->fecha_concesion
            $nuevo_reinscripcion->fecha_concesion_evaluacion
            $nuevo_reinscripcion->fecha_concesion_comentario
            $nuevo_reinscripcion->anios_concesion
            $nuevo_reinscripcion->anios_concesion_evaluacion
            $nuevo_reinscripcion->anios_concesion_comentario
            $nuevo_reinscripcion->inicio_explotacion
            $nuevo_reinscripcion->inicio_explotacion_evaluacion
            $nuevo_reinscripcion->inicio_explotacion_comentario
            $nuevo_reinscripcion->compresores
            $nuevo_reinscripcion->compresores_evaluacion
            $nuevo_reinscripcion->compresores_comentario
            $nuevo_reinscripcion->grupo_electrogeno
            $nuevo_reinscripcion->grupo_electrogeno_evaluacion
            $nuevo_reinscripcion->grupo_electrogeno_comentario
            camion_mineralero
            camion_mineralero_evaluacion
            camion_mineralero_comentario
            cargadora_frontal
            cargadora_frontal_evaluacion
            cargadora_frontal_comentario
            equipo_ventilacion
            equipo_ventilacion_evaluacion
            equipo_ventilacion_comentario
            martillo_neumatico
            martillo_neumatico_evaluacion
            martillo_neumatico_comentario
            via_decauville
            via_decauville_evaluacion
            via_decauville_comentario
            vagoneta
            vagoneta_evaluacion
            vagoneta_comentario
            bomba_desagote
            bomba_desagote_evaluacion
            bomba_desagote_comentario
            taller_equipado
            taller_equipado_evaluacion
            taller_equipado_comentario
            campamento
            campamento_evaluacion
            campamento_comentario
            vivienda
            vivienda_evaluacion
            vivienda_comentario
            meses_trabajo
            meses_trabajo_evaluacion
            meses_trabajo_comentario
            razones_meses_trabajo
            razones_meses_trabajo_evaluacion
            razones_meses_trabajo_comentario
            estado
            created_at
            updated_at
            deleted_at

*/


            



        }


}
