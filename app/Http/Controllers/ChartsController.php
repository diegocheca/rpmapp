<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\EmailsAConfirmar;
use App\Models\Minerales;
use App\Models\Reinscripciones;

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
        /*if($provincia == 99)
        {
            //soy autoridad nacional
            echo "algo";
        }
        else
        {
            //no soy autoridad nacional. voy a buscar por prov
            $temporal = Reinscripciones::select('id', 'id_departamento','')->where('id_departamento')
            $datos["exportacion"] = 
        }*/
        
    }

    public function reportes()
    {
        $soldIn = clone $this->dataChart;

        $soldIn->title = 'Cantidad vendida a nivel provincia, país y exterior';
        $soldIn->axis->x = 'tipo';
        $soldIn->axis->y = 'cantidad';
        $soldIn->data = [];
        $datos_calculados  = $this->calcular_destino_produccion(Auth::user()->id_provincia);
        array_push($soldIn->data, [ "label" => "Provincia", "value" => 100 ]);
        array_push($soldIn->data, [ "label" => "Pais", "value" => 100 ]);
        array_push($soldIn->data, [ "label" => "Exportación", "value" => 100 ]);
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

        return Inertia::render('Charts/Charts', ['soldIn'=> $soldIn, 'mineralPrice' => $mineralPrice, 'reinscriptionPersons' => $reinscriptionPersons ]);
    }
}
