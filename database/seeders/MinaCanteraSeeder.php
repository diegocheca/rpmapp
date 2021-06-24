<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Datetime;

//use App\Models\Producido;
use App\Models\MinaCantera;


class MinaCanteraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
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

        /*$nuevo_producido = new Producido;
        $nuevo_producido->unidades = $faker->numberBetween($min=1, $max=1000000);
        $nuevo_producido->precio_venta = $faker->numberBetween($min=1000, $max=10000);
        $nuevo_producido->estado = $randomElement('en proceso','aprobado','rechazado');
        $nuevo_producido->created_by = 1;       
        $nuevo_producido->created_at = new Datetime; 
        $nuevo_producido->deleted_at = null; 
        $nuevo_producido->updated_at = new Datetime;
        $nuevo_producido->save();*/
        for($i = 0; $i<100; $i++){
            $nueva_minacantera = new MinaCantera;
            $nueva_minacantera->localidad_mina_pais = 'Argentina';
            $nueva_minacantera->localidad_mina_provincia = 'San Juan';
            $nueva_minacantera->localidad_mina_departamento = $departamentos[$faker->numberBetween($min=0,$max=18)];
            $nueva_minacantera->localidad_mina_localidad = $nueva_minacantera->localidad_mina_departamento;
            $nueva_minacantera->nombre = $faker->name;
            $nueva_minacantera->descripcion = $faker->text;
            $nueva_minacantera->categoria = $faker->randomElement(['primera','segunda','tercera']);  //1 y 2 mina 3 cantera
            if($nueva_minacantera->categoria == 'tercera'){
                $nueva_minacantera->tipo = 'cantera';
                $nueva_minacantera->plano_inmueble = 'public/files_formularios/ochamplin@gmail.com/d81pSC9W4nKj7FY4eoh1wX9TXRSliW2c8E0VsX8y.pdf';
            }else{
                $nueva_minacantera->tipo = 'mina';
                $nueva_minacantera->plano_inmueble = null;
            }
            $nueva_minacantera->distrito_minero = $faker->numberBetween($min=1000000,$max=10000000);
            $nueva_minacantera->tipo_sistema = $faker->randomElement(['Gauss Kruger Posgar 07','Gauss Kruger Posgar 94','Geográfica']);
            $nueva_minacantera->longitud = -68.5363900;
            $nueva_minacantera->latitud = -31.5375000;
            $nueva_minacantera->labores = $faker->text;
            //$nueva_minacantera->id_producido = $nuevo_producido->id;
            $nueva_minacantera->created_by = 1;
            $nueva_minacantera->estado = $faker->randomElement(['en proceso','aprobado','rechazado']);
            $nueva_minacantera->created_at = new Datetime; 
            $nueva_minacantera->deleted_at = null; 
            $nueva_minacantera->updated_at = new Datetime; 
            $nueva_minacantera->save(); 
        }
          
    }
}
