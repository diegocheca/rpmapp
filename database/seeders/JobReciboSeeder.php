<?php

namespace Database\Seeders;

use App\Models\JobRecibo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class JobReciboSeeder extends Seeder
{
    public $minerales_primera = ["oro", "plata", "cobre", "Platino", "mercurio", "Hierro", "Plomo", "Estanio", "Zinc", "Niquel","Cobalto", "Bismuto"];
    public $minerales_segunda = ["Piedras Preciosas", "Aguas Corrientes", "Placeres", "Desmontes", "Salitres", "Salinas", "Turberas", "Metales no comprendidos en 1° Categ.", "Ocres", "Baritina","Caparrosas", "Amianto"];
    public $minerales_tercera = ["Piedras Calizas", "Margas", "Yeso", "Alabastro", "Granitos", "Dolomita", "Cuarcitas", "Basaltos", "Cascajo", "Conchilla","Perlita", "Piedra Laja"];
    

    public function numbersWithoutRepeted($categoria, $cantidad){
        $faker = Faker::create();
        $array_de_numeros = array();
        $cantidad_de_elementos = 0;
        if($categoria == 1 ) {
            $cantidad_de_elementos = count($this->minerales_primera)-1;
        }
        if($categoria == 2 ) {
            $cantidad_de_elementos = count($this->minerales_segunda)-1;
        }
        if($categoria == 3 ) {
            $cantidad_de_elementos = count($this->minerales_tercera)-1;
        }
        $indices_ya_utilizados = array();
        for ($i=0; $i < $cantidad; $i++) { 
            $nuevo_indice = $faker->numberBetween(0,$cantidad_de_elementos);
            $result = array_search($nuevo_indice, $indices_ya_utilizados, true);
            while ( $result !== false && ( intval($result) === 0 ||
            intval($result) === 1||
            intval($result) === 2 ||
            intval($result) === 3 || 
            intval($result) === 4)  ) {
                $nuevo_indice = $faker->numberBetween(0,$cantidad_de_elementos);
                $result = array_search($nuevo_indice, $indices_ya_utilizados, true);
            }
            array_push($indices_ya_utilizados,$nuevo_indice);
            $array_de_numeros[$i] = $nuevo_indice;
        }
        return $array_de_numeros;
    }
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
                $indexWithoutRepetedFirst = $this->numbersWithoutRepeted(1,5);
                $indexWithoutRepetedSecound = $this->numbersWithoutRepeted(2,5);
                $indexWithoutRepetedThird = $this->numbersWithoutRepeted(3,5);

                $first_cat_first_max = $faker->numberBetween(500,19999);
                $first_cat_second_max= $faker->numberBetween(500,$first_cat_first_max);
                $first_cat_third_max= $faker->numberBetween(450,$first_cat_second_max);
                $first_cat_fourth_max= $faker->numberBetween(400,$first_cat_third_max);
                $first_cat_fifth_max= $faker->numberBetween(400,$first_cat_fourth_max);

                $second_cat_first_max = $faker->numberBetween(500,19999);
                $second_cat_second_max= $faker->numberBetween(500,$second_cat_first_max);
                $second_cat_third_max= $faker->numberBetween(450,$second_cat_second_max);
                $second_cat_fourth_max= $faker->numberBetween(400,$second_cat_third_max);
                $second_cat_fifth_max= $faker->numberBetween(400,$second_cat_fourth_max);


                $third_cat_first_max = $faker->numberBetween(500,19999);
                $third_cat_second_max= $faker->numberBetween(500,$third_cat_first_max);
                $third_cat_third_max= $faker->numberBetween(450,$third_cat_second_max);
                $third_cat_fourth_max= $faker->numberBetween(400,$third_cat_third_max);
                $third_cat_fifth_max= $faker->numberBetween(400,$third_cat_fourth_max);


                $datos_fake_a_enviar = array(
                    "cantidadProductores"=>$faker->numberBetween(0,800),
                    "cantidadReinsc"=> $faker->numberBetween(0,800),
                    "mineralPrimeraCat" => array(
                        array( 
                            "name" => $this->minerales_primera[$indexWithoutRepetedFirst[0]] ,
                            "cantidad"=> $first_cat_first_max
                        ),
                        array( 
                            "name" => $this->minerales_primera[$indexWithoutRepetedFirst[1]] ,
                            "cantidad"=> $first_cat_second_max
                        ),
                        array( 
                            "name" => $this->minerales_primera[$indexWithoutRepetedFirst[2]] ,
                            "cantidad"=> $first_cat_third_max
                        ),
                        array( 
                            "name" => $this->minerales_primera[$indexWithoutRepetedFirst[3]] ,
                            "cantidad"=> $first_cat_fourth_max
                        ),
                        array( 
                            "name" => $this->minerales_primera[$indexWithoutRepetedFirst[4]] ,
                            "cantidad"=> $first_cat_fifth_max
                        )
                    ),
                    "mineralSegundaCat" => array(
                        array( 
                            "name" => $this->minerales_segunda[$indexWithoutRepetedSecound[0]] ,
                            "cantidad"=> $second_cat_first_max
                        ),
                        array( 
                            "name" => $this->minerales_segunda[$indexWithoutRepetedSecound[1]] ,
                            "cantidad"=> $second_cat_second_max
                        ),
                        array( 
                            "name" => $this->minerales_segunda[$indexWithoutRepetedSecound[2]] ,
                            "cantidad"=> $second_cat_third_max
                        ),
                        array( 
                            "name" => $this->minerales_segunda[$indexWithoutRepetedSecound[3]] ,
                            "cantidad"=> $second_cat_fourth_max
                        ),
                        array( 
                            "name" => $this->minerales_segunda[$indexWithoutRepetedSecound[4]] ,
                            "cantidad"=> $second_cat_fifth_max
                        )
                    ),
                    "mineralTerceraCat"  => array(
                        array( 
                            "name" => $this->minerales_tercera[$indexWithoutRepetedThird[0]] ,
                            "cantidad"=> $third_cat_first_max
                        ),
                        array( 
                            "name" => $this->minerales_tercera[$indexWithoutRepetedThird[1]] ,
                            "cantidad"=> $third_cat_second_max
                        ),
                        array( 
                            "name" => $this->minerales_tercera[$indexWithoutRepetedThird[2]] ,
                            "cantidad"=> $third_cat_third_max
                        ),
                        array( 
                            "name" => $this->minerales_tercera[$indexWithoutRepetedThird[3]] ,
                            "cantidad"=> $third_cat_fourth_max
                        ),
                        array( 
                            "name" => $this->minerales_tercera[$indexWithoutRepetedThird[4]] ,
                            "cantidad"=> $third_cat_fifth_max
                        )
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
