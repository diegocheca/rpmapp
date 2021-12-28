<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\FormAltaProdPaso1;
use App\Models\FormularioAltaProd;
use App\Models\Provincias;


class FormAltaProdPaso1Seeder extends Seeder
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
      
        $sociedades = [
            'Sociedad en nombre colectivo',
            'Sociedad en comandita simple',
            'Sociedad en responsabilidad limitada',
            'Sociedad anónima',
            'Sociedad en comandita por acciones',
            'Sociedad cooperativa',
            'Sociedad por acciones simplificada'
        ];
        $departamentos = [
            'Capital',
            'Rawson',
            'Chimbas',
            'Rivadavia',
            'San Lucía',
            'Pocito',
            'Caucete',
            'Jáchal',
            'Albardón',
            'Sarmiento',
            '25 de Mayo',
            'San Martín',
            'Calingasta',
            '9 de Julio',
            'Angaco',
            'Valle Fértil',
            'Iglesia',
            'Ullum',
            'Zonda'
        ];

        $cargos = [
            'CTO',
            'CTE',
            'CTF',
            'CTI',
            'Gerente',
            'Dueño',
            'Inversor',
            'Representante',
            'Abogado',
            'Empleado',
            'Apoderado',
            'Otro'
        ];
        $estados = [
            'aprobado',
            'reprobado',
            'en proceso',
            'con observaciones'
        ];

        $provincias = Provincias::select("id")->toArray();

        for($i = 0;$i< 100; $i++)
        {


            /*Crear formulario*/

            $estado = $estados[$faker->numberBetween(0,count($estados))]; 
            $nuevo_formulario = new FormularioAltaProd();


            $nuevo_formulario->tipoProductor = 'productor'; 
            $nuevo_formulario->cargoEmpresa = $cargos[$faker->numberBetween(0,count($cargos))]; 
            $nuevo_formulario->presentadorNomApellido =  $faker->name(); 
            $nuevo_formulario->presentador_dni = $faker->numberBetween(15000000,45999999); 
            $nuevo_formulario->provincia_id = $provincias[$faker->numberBetween(0,count($provincias))]; 
            $nuevo_formulario->observacion = $faker->text(100); 
            $nuevo_formulario->estado = $estado; 
            $nuevo_formulario->updated_by = 0;  // por ser creado por el seeder

var_dump($nuevo_formulario);die();
            $nuevo_formulario->save();
            //id_formulario
            $razon_social = $faker->name();
            $email = str_replace(" ","",$razon_social)."@gmail.com";

            $nuevo_productor = new FormAltaProdPaso1();
            $nuevo_productor->id_formulario = $nuevo_formulario->id;
            $nuevo_productor->cuit = strval($faker->numberBetween($min = 20, $max = 35))."-".strval(($faker->numberBetween($min = 15000000, $max = 40000000)))."-".strval(($faker->numberBetween($min = 0, $max = 9)));
            $nuevo_productor->razonsocial = $razon_social;
            $nuevo_productor->numeroproductor = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_productor->email = $email;
            $nuevo_productor->tiposociedad = $sociedades[$faker->numberBetween($min=0, $max=6)];

            $nuevo_productor->inscripciondgr = null;
            $nuevo_productor->constaciasociedad = null;
            $nuevo_productor->estado = $estado;
            $nuevo_productor->created_at = date("Y-m-d H:i:s");
            $nuevo_productor->deleted_at = null;
            $nuevo_productor->updated_at = date("Y-m-d H:i:s");

            $nuevo_productor->save();
        }

    }
}
