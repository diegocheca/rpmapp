<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Productores;

class ProductoresSeeder extends Seeder
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
        for($i = 0;$i< 100; $i++)
        {
            $nuevo_productor = new Productores();
            $nuevo_productor->cuit = strval($faker->numberBetween($min = 20, $max = 35))."-".strval(($faker->numberBetween($min = 15000000, $max = 40000000)))."-".strval(($faker->numberBetween($min = 0, $max = 9)));
            $nuevo_productor->razonsocial = $faker->name() ;
            $nuevo_productor->numeroproductor = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_productor->email = str_replace(' ','', $nuevo_productor->razonsocial)."@gmail.com";
            $nuevo_productor->domicilio_prod = $faker->name." ".strval($faker->numberBetween($min = 1, $max = 2000));
            $nuevo_productor->tiposociedad = $sociedades[$faker->numberBetween($min=0, $max=6)];
            $nuevo_productor->inscripciondgr = null;
            $nuevo_productor->constaciasociedad = null;
            $nuevo_productor->leal_calle = $faker->name();
            $nuevo_productor->leal_numero = $faker->numberBetween($min = 1, $max = 2000);
            $nuevo_productor->leal_telefono = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_productor->leal_pais = 'Argentina';
            $nuevo_productor->leal_provincia = 'San Juan';
            $nuevo_productor->leal_departamento = $departamentos[$faker->numberBetween($min = 0, $max = 18)];
            $nuevo_productor->leal_localidad = $nuevo_productor->leal_departamento;
            $nuevo_productor->leal_cp = 5400;
            $nuevo_productor->leal_otro = null;
            $nuevo_productor->administracion_calle = $faker->name();
            $nuevo_productor->administracion_numero = $faker->numberBetween($min = 1, $max = 2000);
            $nuevo_productor->administracion_telefono = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_productor->administracion_pais = 'Argentina';
            $nuevo_productor->administracion_provincia = 'San Juan';
            $nuevo_productor->administracion_departamento = $departamentos[$faker->numberBetween($min = 0, $max = 18)];
            $nuevo_productor->administracion_localidad = $nuevo_productor->administracion_departamento;
            $nuevo_productor->administracion_cp = 5400;
            $nuevo_productor->administracion_otro = null;
            $nuevo_productor->numero_expdiente = $faker->numberBetween($min = 1000, $max = 9999);
            $nuevo_productor->created_by = 1;
            $nuevo_productor->estado = 'en proceso';
            $nuevo_productor->created_at = '2021-03-25 14:42:04';
            $nuevo_productor->deleted_at = null;
            $nuevo_productor->updated_at =  '2021-04-22 22:47:22';

            $nuevo_productor->save();
        }

    }
}
