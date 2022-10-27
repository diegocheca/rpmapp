<?php

namespace App\Http\Controllers;

use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\JobRecibo;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Faker\Factory as Faker;
use App\Models\Provincias;
use App\Models\sincronizacion\JobReciboProvincia;
use Illuminate\Support\Carbon;

class VisorController extends Controller
{
    public function index_an(){
        return Inertia::render('API/ApiNacion');
    }
    #Inserta en la DB Nacion
    public function setDatos(Request $request)
    {
        try {
            $datos_recibidos = JobRecibo::create([
                'provincia_id' => $request->provincia_id,
                'datos' => $request->datos,
                'tabla' =>  $request->tabla,
                'estado' => 0,
            ]);
            $dt = new \DateTime();
            $dt = $dt->format('Y-m-d H:i:s');
            return response()->json(['response' => 'ok', 'id' => $datos_recibidos->id, 'DateInsert' => $dt], 200);
        } catch (Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }

    public function an_simula_datos()
    {
        try {
            $provinciaModel = new Provincias();
            $datos_fake = $this->datos_fake();
            $datos_fake = $datos_fake->original;
            // dd($datos_fake);

            $datos = $datos_fake['datos'];
            $datos = json_decode($datos);
            $estado = $datos_fake['estado'] == '' ? 'Borrador' : $datos_fake['estado'];
            $provincia_id = $datos_fake['provincia_id'];
            //$name_provincia = $provinciaModel->nombreDeProvinciaPorId($provincia_id);
            $name_provincia = "Nacion";
            $fecha =  Carbon::parse($datos_fake['created_at'])->setTimezone('GMT-0300')->format('Y-m-d');
            return response()->json(['datos' => $datos, 'estado' => $estado, 'provincia' => $provincia_id, 'nombre_provincia' => $name_provincia, 'fecha' => $fecha], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    private function datos_fake()
    {
        try {
            $faker = Faker::create();
            $valor_provincia = $faker->numberBetween(0, 100);
            $limite_uno = 100 - $valor_provincia;
            $valor_pais = $faker->numberBetween(0, $limite_uno);
            $valor_exterior = 100 - ($valor_provincia + $valor_pais);

            $indexWithoutRepetedFirst = $this->numbersWithoutRepeted(1, 5);
            $indexWithoutRepetedSecound = $this->numbersWithoutRepeted(2, 5);
            $indexWithoutRepetedThird = $this->numbersWithoutRepeted(3, 5);

            $first_cat_first_max = $faker->numberBetween(500, 19999);
            $first_cat_second_max = $faker->numberBetween(500, $first_cat_first_max);
            $first_cat_third_max = $faker->numberBetween(450, $first_cat_second_max);
            $first_cat_fourth_max = $faker->numberBetween(400, $first_cat_third_max);
            $first_cat_fifth_max = $faker->numberBetween(400, $first_cat_fourth_max);

            $second_cat_first_max = $faker->numberBetween(500, 19999);
            $second_cat_second_max = $faker->numberBetween(500, $second_cat_first_max);
            $second_cat_third_max = $faker->numberBetween(450, $second_cat_second_max);
            $second_cat_fourth_max = $faker->numberBetween(400, $second_cat_third_max);
            $second_cat_fifth_max = $faker->numberBetween(400, $second_cat_fourth_max);


            $third_cat_first_max = $faker->numberBetween(500, 19999);
            $third_cat_second_max = $faker->numberBetween(500, $third_cat_first_max);
            $third_cat_third_max = $faker->numberBetween(450, $third_cat_second_max);
            $third_cat_fourth_max = $faker->numberBetween(400, $third_cat_third_max);
            $third_cat_fifth_max = $faker->numberBetween(400, $third_cat_fourth_max);

            $cantidad_productores = $faker->numberBetween(0, 100);
            $cantidad_minas = $faker->numberBetween(0, 100)+$cantidad_productores;//mas minas q productores
            $cantidad_reinscripciones = $faker->numberBetween(0, $cantidad_productores);//menos q productores
            $datos_fake = array(
                "cantidadProductores" => $cantidad_productores,
                "cantidadMinas" => $cantidad_minas,
                "cantidadReinsc" => $cantidad_reinscripciones,

                "mineralPrimeraCat" => array(
                    array(
                        "label" => $this->minerales_primera[$indexWithoutRepetedFirst[0]],
                        "value" => $first_cat_first_max
                    ),
                    array(
                        "label" => $this->minerales_primera[$indexWithoutRepetedFirst[1]],
                        "value" => $first_cat_second_max
                    ),
                    array(
                        "label" => $this->minerales_primera[$indexWithoutRepetedFirst[2]],
                        "value" => $first_cat_third_max
                    ),
                    array(
                        "label" => $this->minerales_primera[$indexWithoutRepetedFirst[3]],
                        "value" => $first_cat_fourth_max
                    ),
                    array(
                        "label" => $this->minerales_primera[$indexWithoutRepetedFirst[4]],
                        "value" => $first_cat_fifth_max
                    )
                ),
                "mineralSegundaCat" => array(
                    array(
                        "label" => $this->minerales_segunda[$indexWithoutRepetedSecound[0]],
                        "value" => $second_cat_first_max
                    ),
                    array(
                        "label" => $this->minerales_segunda[$indexWithoutRepetedSecound[1]],
                        "value" => $second_cat_second_max
                    ),
                    array(
                        "label" => $this->minerales_segunda[$indexWithoutRepetedSecound[2]],
                        "value" => $second_cat_third_max
                    ),
                    array(
                        "label" => $this->minerales_segunda[$indexWithoutRepetedSecound[3]],
                        "value" => $second_cat_fourth_max
                    ),
                    array(
                        "label" => $this->minerales_segunda[$indexWithoutRepetedSecound[4]],
                        "value" => $second_cat_fifth_max
                    )
                ),
                "mineralTerceraCat"  => array(
                    array(
                        "label" => $this->minerales_tercera[$indexWithoutRepetedThird[0]],
                        "value" => $third_cat_first_max
                    ),
                    array(
                        "label" => $this->minerales_tercera[$indexWithoutRepetedThird[1]],
                        "value" => $third_cat_second_max
                    ),
                    array(
                        "label" => $this->minerales_tercera[$indexWithoutRepetedThird[2]],
                        "value" => $third_cat_third_max
                    ),
                    array(
                        "label" => $this->minerales_tercera[$indexWithoutRepetedThird[3]],
                        "value" => $third_cat_fourth_max
                    ),
                    array(
                        "label" => $this->minerales_tercera[$indexWithoutRepetedThird[4]],
                        "value" => $third_cat_fifth_max
                    )
                ),

                "porcentajes_ventas" => array(
                    "provincia" => $valor_provincia,
                    "pais" => $valor_pais,
                    "exterior" => $valor_exterior
                ),
                "porcentajes_personas" => array(
                    "permanentes" => array(
                        "profesionales" => $faker->numberBetween(0, 50),
                        "obreros" => $faker->numberBetween(0, 50),
                        "administrativos" => $faker->numberBetween(0, 50),
                        "otros" => $faker->numberBetween(0, 50)
                    ),
                    "transitorios" => array(
                        "profesionales" => $faker->numberBetween(0, 50),
                        "obreros" => $faker->numberBetween(0, 50),
                        "administrativos" => $faker->numberBetween(0, 50),
                        "otros" => $faker->numberBetween(0, 50)
                    )
                )
            );
            $estados = [
                'success',
                'failed',
            ];
            // $provincias = [10, 70, 50, 14, 18, 22, 26, 30, 34, 38];
            // $provincia_id = $provincias[$faker->numberBetween(0,count($provincias)-1)]; 
            $estado = $estados[$faker->numberBetween(0, count($estados) - 1)];
            $fecha_created_at = $faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now');
            return response()->json([
                'datos' =>  json_encode($datos_fake),
                'estado' => '', // $estado,
                'provincia_id' => 0, // Nacion
                'created_at' => $fecha_created_at
            ], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    private $minerales_primera = ["oro", "plata", "cobre", "Platino", "mercurio", "Hierro", "Plomo", "Estanio", "Zinc", "Niquel", "Cobalto", "Bismuto"];
    private $minerales_segunda = ["Piedras Preciosas", "Aguas Corrientes", "Placeres", "Desmontes", "Salitres", "Salinas", "Turberas", "Metales no comprendidos en 1° Categ.", "Ocres", "Baritina", "Caparrosas", "Amianto"];
    private $minerales_tercera = ["Piedras Calizas", "Margas", "Yeso", "Alabastro", "Granitos", "Dolomita", "Cuarcitas", "Basaltos", "Cascajo", "Conchilla", "Perlita", "Piedra Laja"];

    private function numbersWithoutRepeted($categoria, $cantidad)
    {
        $faker = Faker::create();
        $array_de_numeros = array();
        $cantidad_de_elementos = 0;
        if ($categoria == 1) {
            $cantidad_de_elementos = count($this->minerales_primera) - 1;
        }
        if ($categoria == 2) {
            $cantidad_de_elementos = count($this->minerales_segunda) - 1;
        }
        if ($categoria == 3) {
            $cantidad_de_elementos = count($this->minerales_tercera) - 1;
        }
        $indices_ya_utilizados = array();
        for ($i = 0; $i < $cantidad; $i++) {
            $nuevo_indice = $faker->numberBetween(0, $cantidad_de_elementos);
            $result = array_search($nuevo_indice, $indices_ya_utilizados, true);
            while ($result !== false && (intval($result) === 0 ||
                intval($result) === 1 ||
                intval($result) === 2 ||
                intval($result) === 3 ||
                intval($result) === 4)) {
                $nuevo_indice = $faker->numberBetween(0, $cantidad_de_elementos);
                $result = array_search($nuevo_indice, $indices_ya_utilizados, true);
            }
            array_push($indices_ya_utilizados, $nuevo_indice);
            $array_de_numeros[$i] = $nuevo_indice;
        }
        return $array_de_numeros;
    }

    public function an_datos_enviados(Request $request)
    {
        try {
            $datos = JobReciboProvincia::create([
                'datos' => json_encode($request->jSONDatos),
                'provincia_id' => $request->provincia_id,
                'estado' => 'in progress'
            ]);
            return Response()->json(['msg' => 'datos enviados', 'idInsert' => $datos->id], 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }



        #obtiene la cantidad de productores de la provincia actual
        // public function CantProductors()
        // {
        //     $user = Auth::user();
        //     $id_provincia = $user->id_provincia;
        //     $provincia = $user->provincia;
        //     try {
        //         $productores = DB::connection('rpm')->table('productores')
        //             // ->where('deleted_at','!=',null)
        //             ->count();
        //         // dd($productores);
        //         $arrayDatos = array(
        //             'cantidadProductores' => $productores,
        //             'cantidadMinas' => 5,
        //             'cantidadReinsc' => 10,
        //             'mineralPrimeraCat' => 1,
        //             'mineralSegundaCat' => 2,
        //             'mineralTerceraCat' => 3,
        //         );
    
        //         // $response = Http::withOptions(['verify' => false, 'debug' => false,])
        //         $response = Http::retry(3, 100)
        //             // ->withOptions(['observe' => 'response'])
        //             ->withHeaders([
        //                 'Content-Type' => 'application/json',
        //                 'Accept' => 'application/json'
        //             ])
        //             // ->timeout(10){observe: 'response'}
        //             ->withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTY1MzU0MSwibmJmIjoxNjMxNjUzNTQxLCJqdGkiOiIzNHA0U1JSMGRCazFTWm00Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-QWEx5YYjsfjBeIgI9LSdoXapADydx49qMKOXCfJd5M')
        //             ->post('http://45.5.153.83:3000/api/visor/setDatosCantidades', [
        //                 // 'provincia_id' => config('sincronizacion.pronvicia_id'),
        //                 'provincia_id' => $id_provincia,
        //                 'name_provincia' => $provincia,
        //                 'datos' => json_encode($arrayDatos),
        //                 'tabla' => 'productores',
        //             ]);
        //         // ->get('http://45.5.153.83:3000/api/datos/traer_provincias');
    
        //         $responseData = $response->getBody();
        //         $result = $response->object();
        //         // $array = json_decode( $result );
        //         // $result = json_decode($response->getBody());
        //         // echo $response->getBody();
        //         // echo $response;
    
        //         // dd($response);
        //         return response()->json($result, 200);
        //         // return 0;
        //     } catch (Exception $e) {
        //         // return 0;
        //         return response()->json(['msg' => $e->getMessage()], 500);
        //     }
        // }
}
