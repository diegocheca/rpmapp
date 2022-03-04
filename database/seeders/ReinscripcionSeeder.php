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

     public function id_depto_rando($idProv){
         $departamentos = Departamentos::select('id','nombre')->where('provincia_id', '=', $idProv)->get(); 
         $departamentos = $departamentos->toArray();
         //dd($departamentos);

         return $departamentos;

     }
    public function run()
    {
        //
        $faker = Faker::create();

        //datos globales
        $idProvincia = 70;
        $comentarios = false;
        $estados = ["aprobado","rechazado", "en proceso"];

        if($idProvincia == 0)
        {
            //no tenog seteada la provincia y voy a buscar una cualquiera
            $ids_de_provincias = [2,6,10,14,18,22,26,30,34,38,42,46,50,54,58,62,66,70,74,78,82,86,90,94];
            $idProvincia = $ids_de_provincias[$faker->numberBetween($min = 0, $max = (count($ids_de_provincias) -1))];
        }
        for($i = 0;$i< 100; $i++)
        {
            $ids_de_productores = [136, 139,140];

            $nuevo_reinscripcion = new Reinscripciones();
            $nuevo_reinscripcion->id_productor = $ids_de_productores[$faker->numberBetween($min = 0, $max = (count($ids_de_productores)-1))];
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


            
            
            $nuevo_reinscripcion->porcentaje_venta_provincia =  $faker->numberBetween($min = 0, $max = 100);
            $limite_uno = 100-$nuevo_reinscripcion->porcentaje_venta_provincia;
            if($comentarios)
            {
                $nuevo_reinscripcion->porcentaje_venta_provincia_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->porcentaje_venta_provincia_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->porcentaje_venta_provincia_evaluacion = null;
                $nuevo_reinscripcion->porcentaje_venta_provincia_comentario = null;
            }
            $nuevo_reinscripcion->porcentaje_venta_otras_provincias =  $faker->numberBetween($min = 0, $max = $limite_uno);
            if($comentarios)
            {
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_comentario = $faker->text($maxNbChars = 50);

            }
            else{
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_evaluacion = null;
                $nuevo_reinscripcion->porcentaje_venta_otras_provincias_comentario = null;
            }
            $nuevo_reinscripcion->porcentaje_exportado =  100 - ( $nuevo_reinscripcion->porcentaje_venta_provincia + $nuevo_reinscripcion->porcentaje_venta_otras_provincias );
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
            $nuevo_reinscripcion->nombre = $faker->name;
            if($comentarios)
            {
                $nuevo_reinscripcion->nombre_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->nombre_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->dni_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->dni_comentario = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->cargo_evaluacion =  $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->cargo_comentario =  $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->id_departamento_evaluacion = $faker->text($maxNbChars = 50);
                $nuevo_reinscripcion->id_departamento_comentario =$faker->text($maxNbChars = 50);



            }
            else {
                $nuevo_reinscripcion->nombre_evaluacion = null;
                $nuevo_reinscripcion->nombre_comentario = null;
                $nuevo_reinscripcion->dni_evaluacion = null;
                $nuevo_reinscripcion->dni_comentario =null;
                $nuevo_reinscripcion->cargo_evaluacion = null;
                $nuevo_reinscripcion->cargo_comentario = null;
                $nuevo_reinscripcion->id_departamento_evaluacion = null;
                $nuevo_reinscripcion->id_departamento_comentario = null;

            }
            $nuevo_reinscripcion->dni = $faker->numberBetween($min = 25000000, $max = 50000000);
            $nuevo_reinscripcion->cargo =  $faker->jobTitle;

            //buscar los departamentos de esta provincia
            $id_depatamento_faker = $this->id_depto_rando($idProvincia);
            $nuevo_reinscripcion->id_departamento = $id_depatamento_faker[$faker->numberBetween($min = 0, $max = (count($id_depatamento_faker))-1)]["id"];
            //dd($nuevo_reinscripcion->id_departamento);
            $nuevo_reinscripcion->id_localidad = $faker->numberBetween($min = 10, $max = 100);
            $nuevo_reinscripcion->subterranea = null;
            $nuevo_reinscripcion->cielo_abierto= null;
            $nuevo_reinscripcion->manual = null;
            $nuevo_reinscripcion->mecanizada= null;
            $nuevo_reinscripcion->expediente = $faker->swiftBicNumber;
            $nuevo_reinscripcion->polvorin= null;
            $nuevo_reinscripcion->ubicacion= null;
            $nuevo_reinscripcion->dimensiones= null;
            $nuevo_reinscripcion->personal_permanente= $faker->numberBetween($min = 0, $max = 100);
            $nuevo_reinscripcion->temporario = $faker->numberBetween($min = 0, $max = 100);
            $nuevo_reinscripcion->total = $faker->numberBetween($min = 0, $max = 100);
            $nuevo_reinscripcion->production_checkbox = null;
            $nuevo_reinscripcion->reserva = null;
            $nuevo_reinscripcion->vida_util = null;
            $nuevo_reinscripcion->volumen_total = null;
            $nuevo_reinscripcion->volumen_unitario = null;
            $nuevo_reinscripcion->volumen_comercializado= null;
            $nuevo_reinscripcion->procesamiento_mineral= null;
            $nuevo_reinscripcion->personal_perm_tecnicos= null;
            $nuevo_reinscripcion->permiso_anmac= null;
            $nuevo_reinscripcion->fecha_concesion = null;
            $nuevo_reinscripcion->anios_concesion= null;
            $nuevo_reinscripcion->inicio_explotacion= null;
            //$nuevo_reinscripcion->compresores= null;
            //$nuevo_reinscripcion->grupo_electrogeno= null;








            $nuevo_reinscripcion->id_localidad_evaluacion = null;
            $nuevo_reinscripcion->id_localidad_comentario = null;
            $nuevo_reinscripcion->subterranea_evaluacion = null;
            $nuevo_reinscripcion->subterranea_comentario = null;
            $nuevo_reinscripcion->cielo_abierto_evaluacion = null;
            $nuevo_reinscripcion->cielo_abierto_comentario = null;
            $nuevo_reinscripcion->manual_evaluacion = null;
            $nuevo_reinscripcion->manual_comentario = null;
            $nuevo_reinscripcion->mecanizada_evaluacion = null;
            $nuevo_reinscripcion->mecanizada_comentario = null;
            $nuevo_reinscripcion->expediente_evaluacion = null;
            $nuevo_reinscripcion->expediente_comentario = null;
            $nuevo_reinscripcion->polvorin_evaluacion = null;
            $nuevo_reinscripcion->polvorin_comentario = null;
            $nuevo_reinscripcion->ubicacion_evaluacion = null;
            $nuevo_reinscripcion->ubicacion_comentario = null;
            $nuevo_reinscripcion->dimensiones_evaluacion = null;
            $nuevo_reinscripcion->dimensiones_comentario = null;
            $nuevo_reinscripcion->personal_permanente_evaluacion = null;
            $nuevo_reinscripcion->personal_permanente_comentario = null;
            $nuevo_reinscripcion->temporario_evaluacion = null;
            $nuevo_reinscripcion->temporario_comentario = null;
            $nuevo_reinscripcion->total_evaluacion = null;
            $nuevo_reinscripcion->total_comentario = null;
            $nuevo_reinscripcion->id_productor_evaluacion = null;
            $nuevo_reinscripcion->id_productor_comentario = null;
            $nuevo_reinscripcion->production_checkbox_evaluacion = null;
            $nuevo_reinscripcion->production_checkbox_comentario = null;
            $nuevo_reinscripcion->reserva_evaluacion = null;
            $nuevo_reinscripcion->reserva_comentario = null;
            $nuevo_reinscripcion->vida_util_evaluacion = null;
            $nuevo_reinscripcion->vida_util_comentario = null;
            $nuevo_reinscripcion->volumen_total_evaluacion = null;
            $nuevo_reinscripcion->volumen_total_comentario = null;
            $nuevo_reinscripcion->volumen_unitario_evaluacion = null;
            $nuevo_reinscripcion->volumen_unitario_comentario = null;
            $nuevo_reinscripcion->volumen_comercializado_evaluacion = null;
            $nuevo_reinscripcion->volumen_comercializado_comentario = null;
            $nuevo_reinscripcion->procesamiento_mineral_evaluacion = null;
            $nuevo_reinscripcion->procesamiento_mineral_comentario = null;
            $nuevo_reinscripcion->personal_perm_tecnicos_evaluacion = null;
            $nuevo_reinscripcion->personal_perm_tecnicos_comentario = null;
            $nuevo_reinscripcion->permiso_anmac_evaluacion = null;
            $nuevo_reinscripcion->permiso_anmac_comentario = null;
            $nuevo_reinscripcion->fecha_concesion_evaluacion = null;
            $nuevo_reinscripcion->fecha_concesion_comentario = null;
            $nuevo_reinscripcion->anios_concesion_evaluacion = null;
            $nuevo_reinscripcion->anios_concesion_comentario = null;
            $nuevo_reinscripcion->inicio_explotacion_evaluacion = null;
            $nuevo_reinscripcion->inicio_explotacion_comentario = null;
            // $nuevo_reinscripcion->compresores_evaluacion = null;
            // $nuevo_reinscripcion->compresores_comentario = null;
            // $nuevo_reinscripcion->grupo_electrogeno_evaluacion = null;
            // $nuevo_reinscripcion->grupo_electrogeno_comentario = null;







            //$nuevo_reinscripcion->camion_mineralero = null;
            // $nuevo_reinscripcion->cargadora_frontal = null;
            // $nuevo_reinscripcion->equipo_ventilacion = null;
            // $nuevo_reinscripcion->martillo_neumatico = null;
            // $nuevo_reinscripcion->via_decauville = null;
            // $nuevo_reinscripcion->vagoneta = null;
            // $nuevo_reinscripcion->bomba_desagote = null;
            // $nuevo_reinscripcion->taller_equipado = null;
            // $nuevo_reinscripcion->campamento = null;
            // $nuevo_reinscripcion->vivienda = null;
            // $nuevo_reinscripcion->meses_trabajo = null;
            // $nuevo_reinscripcion->razones_meses_trabajo = null;

            $nuevo_reinscripcion->estado = $estados[ $faker->numberBetween($min = 0, $max = 2)];


            // $nuevo_reinscripcion->camion_mineralero_evaluacion= null;
            // $nuevo_reinscripcion->camion_mineralero_comentario= null;
            // $nuevo_reinscripcion->cargadora_frontal_evaluacion= null;
            // $nuevo_reinscripcion->cargadora_frontal_comentario= null;
            // $nuevo_reinscripcion->equipo_ventilacion_evaluacion= null;
            // $nuevo_reinscripcion->equipo_ventilacion_comentario= null;
            // $nuevo_reinscripcion->martillo_neumatico_evaluacion= null;
            // $nuevo_reinscripcion->martillo_neumatico_comentario= null;
            // $nuevo_reinscripcion->via_decauville_evaluacion= null;
            // $nuevo_reinscripcion->via_decauville_comentario= null;
            // $nuevo_reinscripcion->vagoneta_evaluacion= null;
            // $nuevo_reinscripcion->vagoneta_comentario= null;
            // $nuevo_reinscripcion->bomba_desagote_evaluacion= null;
            // $nuevo_reinscripcion->bomba_desagote_comentario= null;
            // $nuevo_reinscripcion->taller_equipado_evaluacion= null;
            // $nuevo_reinscripcion->taller_equipado_comentario= null;
            // $nuevo_reinscripcion->campamento_evaluacion= null;
            // $nuevo_reinscripcion->campamento_comentario= null;
            // $nuevo_reinscripcion->vivienda_evaluacion= null;
            // $nuevo_reinscripcion->vivienda_comentario= null;
            // $nuevo_reinscripcion->meses_trabajo_evaluacion= null;
            // $nuevo_reinscripcion->meses_trabajo_comentario= null;
            // $nuevo_reinscripcion->razones_meses_trabajo_evaluacion= null;
            // $nuevo_reinscripcion->razones_meses_trabajo_comentario= null;
            $nuevo_reinscripcion->save();


        }
    }
}
