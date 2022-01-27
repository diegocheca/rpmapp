<?php

namespace Database\Seeders;

use App\Models\JobRecibo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class JobReciboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'success',
            'failed',
            'in progress',
            'paused'
        ];
        $tablas = [
            'productores',
            'productos',
            'reinscripciones',
            'reinscripciones'
        ];
        $provincias = [10, 70, 50, 14, 18, 22, 26, 30, 34, 38];
        $faker = Faker::create();
        for($i = 0;$i<250; $i++)
        {
            $valor_provincia = $faker->numberBetween(0,100);
            $limite_uno = 100-$valor_provincia;
            $valor_pais = $faker->numberBetween(0,$limite_uno);
            $valor_exterior = 100 - ( $valor_provincia + $valor_pais);
            

            if($faker->numberBetween(0,10) > 7) {
                $datos_fake_a_enviar = 'sin datos';
            }
            else { 
                $datos_fake_a_enviar = array(
                    "cantidadProductores"=>$faker->numberBetween(0,800),
                    "cantidadReinsc"=> $faker->numberBetween(0,800),
                    "mineralPrimeraCat" => array(
                        "oro"=>$faker->numberBetween(0,600),
                        "plata"=>$faker->numberBetween(0,600),
                        "cobre"=>$faker->numberBetween(0,600)
                    ),
                    "mineralSegundaCat"=> array(
                        "mineral1"=>$faker->numberBetween(0,600),
                        "mineral2"=>$faker->numberBetween(0,600),
                        "mineral3"=>$faker->numberBetween(0,600)
                    ),
                    "mineralTerceraCat"=> array(
                        "mineral4"=>$faker->numberBetween(0,600),
                        "mineral5"=>$faker->numberBetween(0,600),
                        "mineral6"=>$faker->numberBetween(0,600)
                    ),
                    "porcentajes_ventas"=> array(
                        "provincia"=>$valor_provincia,
                        "pais"=>$valor_pais,
                        "exterior"=>$valor_exterior
                    ),
    
                    "porcentajes_personas"=>  array(
                        "permanentes"=> array(
                            "profesionales"=>$faker->numberBetween(0,50),
                            "obreros"=>$faker->numberBetween(0,50),
                            "administrativos"=>$faker->numberBetween(0,50),
                            "otros"=>$faker->numberBetween(0,50),
                        ),
                        "transitorios"=>array(
                            "profesionales"=>$faker->numberBetween(0,50),
                            "obreros"=>$faker->numberBetween(0,50),
                            "administrativos"=>$faker->numberBetween(0,50),
                            "otros"=>$faker->numberBetween(0,50),
                        )
                    )
                );
            }
            /*var_dump(json_encode($datos_fake_a_enviar));
            die();*/
            $provincia_id = $provincias[$faker->numberBetween(0,count($provincias)-1)]; 
            $estado = $estados[$faker->numberBetween(0,count($estados)-1)]; 
            $tabla = $tablas[$faker->numberBetween(0,count($tablas)-1)]; 
            $inicio = $faker->dateTimeBetween($startDate = '-6 month',$endDate = 'now');
            $fin = $faker->dateTimeBetween($inicio,$endDate = 'now');
            JobRecibo::create([
                'datos' =>  json_encode($datos_fake_a_enviar),
                'estado' => $estado,
                'tabla' => $tabla,
                'provincia_id' => $provincia_id,
                'created_at' => $inicio
            ]);
        }
    }

    /*
"": 5,
"cantidadMinas": 5,
"cantidadReinsc": 5,
"mineralPrimeraCat": { "oro": 10, "plata": 5 },
"mineralSegundaCat": { "mineral1": 10, "mineral2": 5 },
"mineralTerceraCat": { "mineral1": 30 },
"porcentajes_ventas": {
"pais": 233,
"provincia": 102,
"exterior": 23
},
"porcentajes_personas": {
"permanentes": {
    "profesionales": 141,
    "obreros": 141,
    "otros": 141,
    "administrativos": 141
},
"transitorios": {
    "profesionales": 141,
    "obreros": 141,
    "otros": 141,
    "administrativos": 141
}
}
   */
}
