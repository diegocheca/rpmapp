<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\EmailsAConfirmar;
use App\Models\Minerales;
use App\Models\Provincias;
use App\Models\Reinscripciones;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function __construct(){
        $this->dataChart = new \stdClass();
        $this->dataChart->title = '';
        $this->axis = new \stdClass();
        $this->axis->x = '';
        $this->axis->y = '';
        $this->dataChart->axis = $this->axis;
        $this->dataChart->data = [];
        $this->dataChart->province = '';
    }

    private function calcular_destino_produccion($provincia){
        $datos = [];
        if($provincia == 99)
        {
            //soy autoridad nacional
            echo "algo";
        }
        else
        {
            //no soy autoridad nacional. voy a buscar por prov
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            ->where('productores.leal_provincia', '=', $provincia)
            ->select('reinscripciones.*')
            ->get();
            $acumulador_exportacion = 0;
            $acumulador_provincia = 0;
            $acumulador_otras_provincias = 0;

            foreach($temporal as $key){
                $acumulador_exportacion += $key->porcentaje_exportado;
                $acumulador_provincia += $key->porcentaje_venta_provincia;
                $acumulador_otras_provincias += $key->porcentaje_venta_otras_provincias;
            }
            $datos["exportacion"] = $temporal->count() > 0 ? $acumulador_exportacion / $temporal->count() : 0;
            $datos["otras_prov"] = $temporal->count() > 0 ? $acumulador_otras_provincias / $temporal->count() : 0;
            $datos["prov"] = $temporal->count() > 0 ? $acumulador_provincia / $temporal->count() : 0;
            return $datos;

        }

    }

    public function reportes()
    {

        $provincesList = Provincias::select('id as value', 'nombre as label')
        ->orderBy('label')
        ->get();

        $mapPie = clone $this->dataChart;
        $mapPie->title = 'Minerales de primera categoría más importante';
        $mapPie->axis->x = 'label';
        $mapPie->axis->y = 'value';
        $mapPie->data = [];
        // array_push($mapPie->data, [ "label" => "Provincia", "value" => 150 ]);
        // array_push($mapPie->data, [ "label" => "Pais", "value" => 67 ]);
        // array_push($mapPie->data, [ "label" => "Exportación", "value" => 33 ]);

        $mapPie->data = [[
            'province' => 'Buenos Aires',
            'minerals' => [[ "label" => "Provincia", "value" => 150], [ "label" => "Pais", "value" => 67 ], [ "label" => "Exportación", "value" => 33 ] ]
        ],
        [
            'province' => 'Santa Fe',
            'minerals' => [[ "label" => "Provincia", "value" => 100], [ "label" => "Pais", "value" => 617 ], [ "label" => "Exportación", "value" => 3 ] ]
        ],
        [
            'province' => 'San Juan',
            'minerals' => [[ "label" => "Provincia", "value" => 50], [ "label" => "Pais", "value" => 87 ], [ "label" => "Exportación", "value" => 223 ] ]
        ]];

        $soldIn = clone $this->dataChart;

        $soldIn->title = 'Cantidad vendida a nivel provincia, país y exterior';
        $soldIn->axis->x = 'tipo';
        $soldIn->axis->y = 'cantidad';
        $soldIn->data = [];
        $datos_calculados  = $this->calcular_destino_produccion(Auth::user()->id_provincia);
        //dd($datos_calculados);
        if($datos_calculados ["exportacion"] == 0 && $datos_calculados ["otras_prov"] == 0  && $datos_calculados ["prov"] == 0 ){
            array_push($soldIn->data, [ "label" => "Provincia", "value" => 100 ]);
            array_push($soldIn->data, [ "label" => "Pais", "value" => 100 ]);
            array_push($soldIn->data, [ "label" => "Exportación", "value" => 100 ]);
        }
        // CountriesController::getDepartmentArray(Auth::user()->id_provincia);
        // $soldIn->province = CountriesController::getProvince(Auth::user()->id_provincia);

        $mineralPrice = [];

        $categories = Minerales::select('categoria')->where('active', '=', true)->groupBy('categoria')->get();
        for ($i=0; $i < count($categories); $i++) {
            $title = $categories[$i]->categoria;

            $mineral = clone $this->dataChart;

            $mineral->title = "Precio minerales $title categoría";
            $mineral->axis->x = 'tipo';
            $mineral->axis->y = 'cantidad';
            $mineral->data = Minerales::select('name as label')
            ->where('active', '=', true)
            ->where('categoria', '=', $categories[$i]->categoria)
            ->groupBy('name')
            ->get();

            for ($j=0; $j < count($mineral->data) ; $j++) {
                $mineral->data[$j]->value = random_int(0, 1999);
            }

            array_push($mineralPrice, $mineral);
        }

        $reinscriptionPersons = clone $this->dataChart;

        $reinscriptionPersons->title = 'Persona declaradas en reinscripción';
        $reinscriptionPersons->axis->x = 'tipo';
        $reinscriptionPersons->axis->y = 'cantidad';
        $reinscriptionPersons->data = [];
        array_push($reinscriptionPersons->data, [ "label" => "Profesional Técnico Permanente", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Operarios y Obreros Permanente", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Administrativo Permanente", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Otros Permanente", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Profesional Transitorio", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Operarios y Obreros Transitorio", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Administrativo Transitorio", "value" => random_int(0, 199) ]);
        array_push($reinscriptionPersons->data, [ "label" => "Otros Transitorio", "value" => random_int(0, 199) ]);

        return Inertia::render('Charts/Charts', ['soldIn'=> $soldIn, 'mineralPrice' => $mineralPrice, 'reinscriptionPersons' => $reinscriptionPersons, 'provincesList' => $provincesList, 'mapPie' => $mapPie ]);
    }
}
