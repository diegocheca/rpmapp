<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\EmailsAConfirmar;
use App\Models\JobRecibo;
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
            //buscar en la tabla sincronizada cual es el valor

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

    public function minerales_todas_categorias(){
        $job_recibo_model = new JobRecibo();
        return $job_recibo_model->cantidadMineralesPorPais();
    }

    public function reportes()
    {

        // dd($this->minerales_todas_categorias());


        $mi_provincia = Auth::user()->id_provincia;
        if(Auth::user()->id = 1)
            $mi_provincia = 99;

        $reinscripcionesModel = new Reinscripciones();

        $provincesList = Provincias::select('id as value', 'nombre as label')
        ->orderBy('label')
        ->get();

        $mapPie = clone $this->dataChart;
        $mapPie->title = 'Minerales por categor??a m??s importantes';
        $mapPie->axis->x = 'label';
        $mapPie->axis->y = 'value';
        $mapPie->data = [];
        // array_push($mapPie->data, [ "label" => "Provincia", "value" => 150 ]);
        // array_push($mapPie->data, [ "label" => "Pais", "value" => 67 ]);
        // array_push($mapPie->data, [ "label" => "Exportaci??n", "value" => 33 ]);

        // $mapPie->data = [[
        //     'province' => 'Buenos Aires',
        //     'minerals' => [[ "label" => "Provincia", "value" => 150], [ "label" => "Pais", "value" => 67 ], [ "label" => "Exportaci??n", "value" => 33 ] ]
        // ],
        // [
        //     'province' => 'Santa Fe',
        //     'minerals' => [[ "label" => "Provincia", "value" => 100], [ "label" => "Pais", "value" => 617 ], [ "label" => "Exportaci??n", "value" => 3 ] ]
        // ],
        // [
        //     'province' => 'San Juan',
        //     'minerals' => [[ "label" => "Provincia", "value" => 50], [ "label" => "Pais", "value" => 87 ], [ "label" => "Exportaci??n", "value" => 223 ] ]
        // ]];

        $mapPie->data = $this->minerales_todas_categorias();
        //****************** */
        $job_recibo_model = new JobRecibo();
        $soldIn = clone $this->dataChart;

        $datos_minerales = $job_recibo_model->buscar_minerales_por_provincia(70);
        $datos_minerales_pais = $job_recibo_model->cantidadMineralesPorPais();

        $soldIn->title = 'Cantidad vendida a nivel provincia, pa??s y exterior';
        $soldIn->axis->x = 'tipo';
        $soldIn->axis->y = 'cantidad';
        $soldIn->data = [];
        $datos_calculados  = $this->calcular_destino_produccion(Auth::user()->id_provincia);
        $mis_datos_venta = $job_recibo_model->datos_grafico_ventas();

        //dd($mis_datos_venta);
        if($datos_calculados ["exportacion"] == 0 && $datos_calculados ["otras_prov"] == 0  && $datos_calculados ["prov"] == 0 ){
            array_push($soldIn->data, [ "label" => "Provincia", "value" => $mis_datos_venta[0]["provincia"] ]);
            array_push($soldIn->data, [ "label" => "Pais", "value" => $mis_datos_venta[0]["otras_provincias"] ]);
            array_push($soldIn->data, [ "label" => "Exportaci??n", "value" => $mis_datos_venta[0]["exportacion"] ]);
        }
        // CountriesController::getDepartmentArray(Auth::user()->id_provincia);
        // $soldIn->province = CountriesController::getProvince(Auth::user()->id_provincia);
        $mineralPrice = [];

        $categories = Minerales::select('categoria')->where('active', '=', true)->groupBy('categoria')->get();
        for ($i=0; $i < count($categories); $i++) {
            $title = $categories[$i]->categoria;

            $mineral = clone $this->dataChart;

            $mineral->title = "Precio minerales $title categor??a";
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

        /* DONUT CHART - CANTIDAD DE PERSONAS */
        $reinscriptionPersons->title = 'Persona declaradas en reinscripci??n';
        $reinscriptionPersons->axis->x = 'tipo';
        $reinscriptionPersons->axis->y = 'cantidad';
        $reinscriptionPersons->data = [];
        $datos_porcentajes_personas = $job_recibo_model->calcular_porcentajes_personas();
        array_push($reinscriptionPersons->data, [ "label" => "Profesional T??cnico Permanente", "value" => $datos_porcentajes_personas["acumulador_profesionales_permanentes"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Operarios y Obreros Permanente", "value" => $datos_porcentajes_personas["acumulador_obreros_permanentes"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Administrativo Permanente", "value" => $datos_porcentajes_personas["acumulador_administrativos_permanentes"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Otros Permanente", "value" => $datos_porcentajes_personas["acumulador_otros_permanentes"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Profesional Transitorio", "value" =>$datos_porcentajes_personas["acumulador_profesionales_contratados"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Operarios y Obreros Transitorio", "value" =>$datos_porcentajes_personas["acumulador_obreros_contratados"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Administrativo Transitorio", "value" =>$datos_porcentajes_personas["acumulador_administrativos_contratados"] ]);
        array_push($reinscriptionPersons->data, [ "label" => "Otros Transitorio", "value" => $datos_porcentajes_personas["acumulador_otros_contratados"] ]);

        return Inertia::render('Charts/Charts', ['soldIn'=> $soldIn, 'mineralPrice' => $mineralPrice, 'reinscriptionPersons' => $reinscriptionPersons, 'porcentajesDewVentaPorProvincia' => $mis_datos_venta, 'mapPie' => $mapPie, 'provincesList' => $provincesList ]);
    }
}
