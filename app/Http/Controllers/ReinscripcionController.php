<?php

namespace App\Http\Controllers;

use App\Models\ReinscripcionesCombustible;
use App\Models\ReinscripcionesComercializacion;
use App\Models\ReinscripcionesEquipos;
use App\Models\ReinscripcionesExplosivos;
use App\Models\ReinscripcionesProduccion;
use App\Models\ReinscripcionesProductos;
use App\Models\ReinscripcionesAnexo1;
use App\Models\Reinscripciones;
use App\Models\Productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\HomeControllerM;
use App\Models\Provincias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Carbon\Carbon;
use Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ReinscripcionController extends Controller
{
    private $commonCountries = [
        'SanJuan',
        'Catamarca',
        'EntreRíos',
        'RíoNegro'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = HomeController::userData();
        if(Auth::user()->hasRole('Productor'))
        {
            $reinscripciones = DB::table('reinscripciones')
            ->join('productores', 'reinscripciones.id_productor', '=', 'productores.id')
            ->join('productos', 'reinscripciones.id', '=', 'productos.id_reinscripcion')
            ->join('mina_cantera', 'productos.id_mina', '=', 'mina_cantera.id')
            ->where('usuario_creador', '=', Auth::user()->id)
            ->select('reinscripciones.id','productos.id_mina','reinscripciones.id_productor','reinscripciones.estado','reinscripciones.nombre as encargado','productores.razonsocial','mina_cantera.nombre as mina')
            ->get();
        }
        elseif(Auth::user()->hasRole('Autoridad')) {
            $reinscripciones = DB::table('reinscripciones')
            ->join('productores', 'reinscripciones.id_productor', '=', 'productores.id')
           ->join('productos', 'reinscripciones.id', '=', 'productos.id_reinscripcion')
            ->join('mina_cantera', 'productos.id_mina', '=', 'mina_cantera.id')
            // ->where('productores.leal_provincia', $user->province->value)
            ->select('reinscripciones.id','productos.id_mina','reinscripciones.id_productor','reinscripciones.estado','reinscripciones.nombre as encargado','productores.razonsocial','mina_cantera.nombre as mina')
            ->get();
        }
        else //administrador
            $reinscripciones = Reinscripciones::select('reinscripciones.id','productos.id_mina','reinscripciones.id_productor','reinscripciones.estado','reinscripciones.nombre as encargado','productores.razonsocial','mina_cantera.nombre as mina')
            ->join('productores', 'reinscripciones.id_productor', '=', 'productores.id')
           ->join('productos', 'reinscripciones.id', '=', 'productos.id_reinscripcion')
            ->join('mina_cantera', 'productos.id_mina', '=', 'mina_cantera.id')
            ->get();
        //dd($user->province->value,Auth::user()->hasRole('Autoridad') );
        return Inertia::render('Reinscripciones/List', ['reinscripciones' => $reinscripciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productors = ProductoresController::productoresUsuario();
        $provinces = CountriesController::getProvinces();
        $user = HomeController::userData();

        $productorsList = [];
        for ($i=0; $i < count($productors['productores']); $i++) {
            array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        }
        //
        // return Inertia::render('Reinscripciones/Form');
        return Inertia::render('Reinscripciones/Form', [
            'action' => "create",
            'saveUrl' => "reinscripciones.store",
            'saveFileUrl' => "/reinscripciones/upload",
            'province' => $user->province->label ."/reinscripciones-wizard",
            'folder' => 'reinscripciones',
            'reinscripcion' => [],
            'titleForm' => 'Crear reinscripción',
            'titleBtnSave' => 'Guardar',
            'evaluate' => false,
            'provincia' => $provinces,
            'productores' => $productorsList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reinscripcion = $request->all();
        // dd($reinscripcion);
        $user = HomeController::userData();
        $provinceData = Provincias::where('id','=', $user->province->value)->first();
        $period = date('Y-m-d', strtotime("+$provinceData->duracion_reinscripcion months", strtotime(date("Y-m-d"))));

        $saveData = [];
        $newProducts = [];
        foreach ($reinscripcion as $key => $data) {

            // if ($data == "on" || $data == true) {
            //     $saveData[$key] = 1;
            //     continue;
            // }

            if ($key == "Productos") {

                if(!empty($reinscripcion['production_checkbox']) && $reinscripcion['production_checkbox'] == true) continue;



                $saveData["cantidad_productos"] = count($data);

                for ($i = 0; $i < count($data); $i++) {
                    $product = [];

                    foreach ($data[$i] as $key2 => $data2) {

                        if (in_array($key2, ["nombre_mineral", "unidades"])) {
                            // $product[$key2] = json_encode($data2);
                            $product[$key2] = $data2["value"];
                            continue;
                        }

                        $product[$key2] = $data2;
                        // $product["variedad"] =
                        // $product["otra_unidad"] =
                        $product["estado"] = "en proceso";
                    }

                    array_push($newProducts, $product);
                }

                continue;
            } else {
                $saveData["cantidad_productos"] = 0;
            }


            if (in_array($key, ["id_mina", "id_productor", "polvorin", "id_departamento", "id_localidad"]) ) {

                $saveData[$key] = $reinscripcion[$key]["value"];
                continue;
            }

            $saveData[$key] = $data;
        }

        $saveData['fecha_vto'] = $period ;
        $saveData['estado'] = 'en proceso';

        // $newReinscription = Reinscripciones::create($saveData);


        DB::beginTransaction();
        try {
            // if(isset($saveData['nombre_mineral_evaluacion'])) {
            //     unset($saveData['nombre_mineral_evaluacion']);
            // }
            // llama a la funcion especifica de cada provincia
            $provinceName = str_replace(" ", "", $user->province->label);
            $functionRedirect = $provinceName."Store";
            // dd($functionRedirect);
            $this->$functionRedirect($saveData, $newProducts, null);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }


        // if(!empty($reinscripcion['production_checkbox']) && $reinscripcion['production_checkbox']) {
        //     for ($i = 0; $i < count($newProducts); $i++) {
        //         $newProducts[$i]["id_reinscripcion"] = $newReinscription["id"];
        //         Productos::create($newProducts[$i]);
        //     }
        // }

        return Redirect::route('reinscripciones.index');
    }


    protected function SanLuisStore($saveData, $newProducts)
    {
        // dd($saveData);
        //add new reinscripcion
        $saveData["cantidad_productos"] = count($newProducts);
        $newReinscription = Reinscripciones::create($saveData);

        //add mineral productos
        for ($i = 0; $i < count($newProducts); $i++) {
            $newProducts[$i]["id_reinscripcion"] = $newReinscription["id"];
            $addProducts = Productos::create($newProducts[$i]);

            //add produccion*
            $mes = 0;
            for ($prod = 0; $prod < count($saveData['produccion_anual']); $prod++) {
                $saveData['produccion_anual'][$i][$prod]["id_productos"] = $addProducts["id"];
                $saveData['produccion_anual'][$i][$prod]["mes"] = ++$mes;
                ReinscripcionesProduccion::create($saveData['produccion_anual'][$i][$prod]);
            }

            //add comercializacion*
            for ($com = 0; $com < count($saveData['comercializacion']); $com++) {
                $saveData['comercializacion'][$com]["id_productos"] = $addProducts["id"];
                ReinscripcionesComercializacion::create($saveData['comercializacion'][$com]);
            }
        }

        //add explosivos
        for ($exp = 0; $exp < count($saveData['uso_explosivos']); $exp++) {
            $saveData['uso_explosivos'][$exp]["id_reinscripcion"] = $newReinscription["id"];
            ReinscripcionesExplosivos::create($saveData['uso_explosivos'][$exp]);
        }

        //add combustible
        for ($comb = 0; $comb < count($saveData['combustible']); $comb++) {
            $saveData['combustible'][$comb]["id_reinscripcion"] = $newReinscription["id"];
            ReinscripcionesCombustible::create($saveData['combustible'][$comb]);
        }

        //add equipos
        for ($eq = 0; $eq < count($saveData['equipos']); $eq++) {
            $saveData['equipos'][$eq]["id_reinscripcion"] = $newReinscription["id"];
            ReinscripcionesEquipos::create($saveData['equipos'][$eq]);
        }

        //add anexo1
        for ($an1 = 0; $an1 < count($saveData['anexo1']); $an1++) {
            $saveData['anexo1'][$an1]["id_reinscripcion"] = $newReinscription["id"];
            ReinscripcionesAnexo1::create($saveData['anexo1'][$an1]);
        }

    }

    protected function LaRiojaStore($saveData, $newProducts, $idReinscripcion, $action)
    {
        if(empty($idReinscripcion)) {

            // $arr = Reinscripciones::where('id', $idReinscripcion)->first()->toArray();
            // $arrayValues = array_intersect_key($arr,$saveData);
            // foreach ($arrayValues as $key => $value) {
            //     $arrayValues[$key] = $saveData[$key];
            // }
            //add new reinscripcion
            $arrayValues = $saveData;
            $arrayValues["cantidad_productos"] = 1;
            // nueva reinscripcion
            $newReinscription = Reinscripciones::create($arrayValues);

            $newProducts = [
                "id_reinscripcion" => $newReinscription["id"],
                "nombre_mineral" => $arrayValues["nombre_mineral"]["value"],
                "produccion" => $arrayValues["volumen_total"],
                "precio_venta" => $arrayValues["precio_venta"],
                "volumen_comercializado" => $arrayValues["volumen_comercializado"],
                "volumen_acopiado" => $arrayValues["volumen_acopiado"],
                "volumen_descarte" => $arrayValues["volumen_descarte"],
                "capacidad" => $arrayValues["capacidad"],
                "estado" => "en proceso"
                // "procesamiento_mineral" => $arrayValues["procesamiento_mineral"],
            ];
            //productos
            $addProducts = Productos::create($newProducts);

            //equipos
            for ($eq = 0; $eq < count($saveData['equipos']); $eq++) {
                $saveData['equipos'][$eq]["id_reinscripcion"] = $newReinscription["id"];
                ReinscripcionesEquipos::create($saveData['equipos'][$eq]);
                // dd($saveData['equipos'][$eq]);
            }

            //explosivos
            for ($exp = 0; $exp < count($saveData['explosivos']); $exp++) {
                $saveData['explosivos'][$exp]["id_reinscripcion"] = $newReinscription["id"];
                ReinscripcionesExplosivos::create($saveData['explosivos'][$exp]);
                // dd($saveData['explosivos'][$exp]);
            }

        } else {
            $arr = Reinscripciones::where('id', $idReinscripcion)->first()->toArray();
            $arrayValues = array_intersect_key($arr,$saveData);
            foreach ($arrayValues as $key => $value) {
                $arrayValues[$key] = $saveData[$key];
            }
            // //add new reinscripcion
            $arrayValues["cantidad_productos"] = 1;

            //modificar reinscripcion
            $newReinscription = Reinscripciones::where('id', $idReinscripcion)->update($arrayValues);

            //productos
            $product = Productos::where('id_reinscripcion', $idReinscripcion)->first()->toArray();
            $productValues = array_intersect_key($product,$saveData);
            foreach ($productValues as $key => $value) {
                $productValues[$key] = $saveData[$key];
            }

            $productValues = array_merge($productValues, ['estado' => $arrayValues['estado']]);
            $editProducts = Productos::where('id', $product['id'])->update($productValues);

            if($action == 'edit') {
                //equipos
                for ($eq = 0; $eq < count($saveData['equipos']); $eq++) {
                    if(!empty($saveData['equipos'][$eq]['id'])) {
                        $addEquipos = ReinscripcionesEquipos::where('id', $saveData['equipos'][$eq]['id'])->update($saveData['equipos'][$eq]);
                    } else {
                        $saveData['equipos'][$eq]["id_reinscripcion"] = $idReinscripcion;
                        ReinscripcionesEquipos::create($saveData['equipos'][$eq]);
                    }
                }
                //explosivos
                for ($exp = 0; $exp < count($saveData['explosivos']); $exp++) {
                    if(!empty($saveData['explosivos'][$exp]['id'])) {
                        $addExplosivos = ReinscripcionesExplosivos::where('id', $saveData['explosivos'][$exp]['id'])->update($saveData['explosivos'][$exp]);
                    } else {
                        $saveData['explosivos'][$exp]["id_reinscripcion"] = $idReinscripcion;
                        ReinscripcionesExplosivos::create($saveData['explosivos'][$exp]);
                    }
                }
            } else {
                //equipos
                for ($eq = 0; $eq < count($saveData['equipos']); $eq++) {
                    $addEquipos = ReinscripcionesEquipos::where('id', $saveData['equipos'][$eq]['id'])->update([
                        'comentario' => $saveData['equipos'][$eq]['row_evaluacion'] == "rechazado" ? $saveData['equipos'][$eq]['row_comentario'] : null,
                        'evaluacion' =>  $saveData['equipos'][$eq]['row_evaluacion']
                    ]);
                }
                // explosivos
                for ($exp = 0; $exp < count($saveData['explosivos']); $exp++) {
                    $addExplosivos = ReinscripcionesExplosivos::where('id', $saveData['explosivos'][$exp]['id'])->update([
                        'comentario' => $saveData['explosivos'][$exp]['row_evaluacion'] == "rechazado" ? $saveData['explosivos'][$exp]['row_comentario'] : null,
                        'evaluacion' =>  $saveData['explosivos'][$exp]['row_evaluacion']
                    ]);
                }

            }
        }


    }

    protected function LaRiojaData($id)
    {
        $productors = ProductoresController::productoresUsuario();
        $reinscripcion = Reinscripciones::find($id);
        $reinscripcion->explosivos = $reinscripcion->explosivos;
        $reinscripcion->equipos = $reinscripcion->equipos;
        $reinscripcion = array_merge($reinscripcion->toArray(), Reinscripciones::find($id)->productos->toArray()[0]);

        $provinces = CountriesController::getProvinces();

        $productorsList = [];
        for ($i=0; $i < count($productors['productores']); $i++) {
            array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        }

        return [
            'reinscripcion' => $reinscripcion,
            'provinces' => $provinces,
            'productorsList' => $productorsList
        ];
    }

    protected function MendozaData($id)
    {
        $productors = ProductoresController::productoresUsuario();
        $reinscripcion = Reinscripciones::find($id);
        $reinscripcion->explosivos = $reinscripcion->explosivos;
        $reinscripcion->equipos = $reinscripcion->equipos;
        $reinscripcion = array_merge($reinscripcion->toArray(), Reinscripciones::find($id)->productos->toArray()[0]);

        $provinces = CountriesController::getProvinces();

        $productorsList = [];
        for ($i=0; $i < count($productors['productores']); $i++) {
            array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        }

        return [
            'reinscripcion' => $reinscripcion,
            'provinces' => $provinces,
            'productorsList' => $productorsList
        ];
    }

    protected function CommonData($id)
    {
        $productors = ProductoresController::productoresUsuario();
        $reinscripcion = Reinscripciones::find($id);

        $provinces = CountriesController::getProvinces();

        $productorsList = [];
        for ($i=0; $i < count($productors['productores']); $i++) {
            array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        }

        return [
            'reinscripcion' => $reinscripcion,
            'provinces' => $provinces,
            'productorsList' => $productorsList
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Reinscripciones $reinscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = HomeController::userData();
        $provinceName = str_replace(" ", "", $user->province->label);

        if(in_array($provinceName, $this->commonCountries)) {
            $functionRedirect = "CommonData";
        } else {
            $functionRedirect = $provinceName."Data";
        }

        $data = $this->$functionRedirect($id);

        // $productors = ProductoresController::productoresUsuario();
        // $reinscripcion = Reinscripciones::find($id);
        // $reinscripcion->productos = Reinscripciones::find($id)->productos;
        // $reinscripcion->explosivos = $reinscripcion->explosivos;
        // $reinscripcion->combustibles = $reinscripcion->combustibles;
        // $reinscripcion->anexo1 = $reinscripcion->anexo1;
        // $reinscripcion->equipos = $reinscripcion->equipos;

        // foreach ($reinscripcion->productos as $key => $producto) {
        //     $reinscripcion->productos[$key]->produccion = ReinscripcionesProduccion::select('*')->where('id_productos', '=', $producto->id)->get();
        //     $reinscripcion->productos[$key]->comercializacion = ReinscripcionesComercializacion::select('*')->where('id_productos', '=', $producto->id)->get();
        // }

        // // dd($reinscripcion);

        // $provinces = CountriesController::getProvinces();
        // $user = HomeController::userData();

        // $productorsList = [];
        // for ($i=0; $i < count($productors['productores']); $i++) {
        //     array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        // }
        // dd($data['reinscripcion']);

        return Inertia::render('Reinscripciones/Form', [
            'action' => "update",
            'saveUrl' => "reinscripciones.update",
            // 'saveFileUrl' => "/reinscripciones/upload",
            'province' => $user->province->label ."/reinscripciones-wizard",
            // 'folder' => 'reinscripciones',
            'reinscripcion' => $data['reinscripcion'],
            'titleForm' => 'Editar reinscripciones',
            'titleBtnSave' => 'Editar',
            'evaluate' => false,
            'provincia' => $data['provinces'],
            'productores' => $data['productorsList']
        ]);
    }

    /**
     * Show the form for evaluate and editing the specified resource.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function revision($id)
    {
        $user = HomeController::userData();
        $provinceName = str_replace(" ", "", $user->province->label);
        $functionRedirect = $provinceName."Data";
        $data = $this->$functionRedirect($id);


        // $productors = ProductoresController::productoresUsuario();
        // $reinscripcion = Reinscripciones::find($id);
        // $reinscripcion->productos = Reinscripciones::find($id)->productos;
        // $reinscripcion->explosivos = $reinscripcion->explosivos;
        // $reinscripcion->combustibles = $reinscripcion->combustibles;
        // $reinscripcion->anexo1 = $reinscripcion->anexo1;
        // $reinscripcion->equipos = $reinscripcion->equipos;

        // foreach ($reinscripcion->productos as $key => $producto) {
        //     $reinscripcion->productos[$key]->produccion = ReinscripcionesProduccion::select('*')->where('id_productos', '=', $producto->id)->get();
        //     $reinscripcion->productos[$key]->comercializacion = ReinscripcionesComercializacion::select('*')->where('id_productos', '=', $producto->id)->get();
        // }

        // $provinces = CountriesController::getProvinces();
        // $user = HomeController::userData();

        // $productorsList = [];
        // for ($i=0; $i < count($productors['productores']); $i++) {
        //     array_push($productorsList, [ 'value' => $productors['productores'][$i]->id, 'label' => $productors['productores'][$i]->razonsocial ]);
        // }

        return Inertia::render('Reinscripciones/Form', [
            'action' => "evaluate",
            'saveUrl' => "reinscripciones.updateRevision",
            // 'saveFileUrl' => "/reinscripciones/upload",
            // 'folder' => 'reinscripciones',
            'province' => $user->province->label ."/reinscripciones-wizard",
            'reinscripcion' => $data['reinscripcion'],
            'titleForm' => 'Evaluar reinscripciones',
            'titleBtnSave' => 'Guardar Revisión',
            'evaluate' => true,
            'provincia' => $data['provinces'],
            'productores' => $data['productorsList']
        ]);
    }

//   s

    /**
     * Save the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function updateRevision(Request $request, $id)
    {

        $dataReinscripcion = $request->all();
        $dataReinscripcionFilter = [];
        $dataReinscripcionProductsFilter = [];
        $allStatus = [];
        $user = HomeController::userData();

        // dd($dataReinscripcion);

        $this->getReinscripcionFilter($dataReinscripcion, $dataReinscripcionFilter, $allStatus);

        // if(isset($dataReinscripcion['production_checkbox']) && $dataReinscripcion['production_checkbox']) {
        //     for ($t = 0; $t < count($dataReinscripcion["Productos"]); $t++) {
        //         $dataReinscripcionProductsFilter[$t]["id"] = $dataReinscripcion["Productos"][$t]["id"];
        //         $this->getReinscripcionFilter($dataReinscripcion["Productos"][$t], $dataReinscripcionProductsFilter[$t], $allStatus);
        //     }
        // }

        $dataReinscripcionFilter['equipos'] = $dataReinscripcion['equipos'];
        $dataReinscripcionFilter['explosivos'] = $dataReinscripcion['explosivos'];

        // dd($dataReinscripcionFilter);


        $statusRechazado = in_array('rechazado', $allStatus);
        $statusSinEvaluar = in_array('sin evaluar', $allStatus);



        // dd($statusRechazado || $statusSinEvaluar);
        if ($statusRechazado || $statusSinEvaluar) {
            $newStatus =  $statusRechazado ? 'rechazado' : 'en proceso';
        } else {
            $newStatus =  'aprobado';
        }

        $dataReinscripcionFilter['estado'] = $newStatus;

        DB::beginTransaction();
        try {
            // dd($dataReinscripcionFilter);
            // llama a la funcion especifica de cada provincia
            $provinceName = str_replace(" ", "", $user->province->label);
            $functionRedirect = $provinceName."Store";
            // dd($functionRedirect);
            $this->$functionRedirect($dataReinscripcionFilter, null, $id, null );
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json(['error' => $ex->getMessage()], 500);
        }

        // Reinscripciones::where('id', $id)->update($dataReinscripcionFilter);

        // if(isset($dataReinscripcion['production_checkbox']) && $dataReinscripcion['production_checkbox']) {
        //     $toUpdate = Reinscripciones::find($id);
        //     for ($i = 0; $i < count($toUpdate->productos); $i++) {
        //         Productos::where('id', $dataReinscripcionProductsFilter[$i]['id'])->update([
        //             'comment' => $dataReinscripcionProductsFilter[$i]['row_evaluacion'] == "rechazado" ? $dataReinscripcionProductsFilter[$i]['row_comentario'] : null,
        //             'value' =>  $dataReinscripcionProductsFilter[$i]['row_evaluacion'],
        //             'estado' => $newStatus
        //         ]);
        //     }
        // }

        return Redirect::route('reinscripciones.index');
    }

    private function getReinscripcionFilter($data, &$filter, &$status)
    {
        foreach ($data as $key => $value) {
            // if(is_array($dataReinscripcion[$key])) {
            //     $this->getReinscripcionFilter($dataReinscripcion[$key], $dataReinscripcionFilter, $allStatus);
            // }
            if (str_contains($key, "_evaluacion") || str_contains($key, "_comentario")) {
                $filter[$key] = $value;
                if (str_contains($key, "_evaluacion")) {
                    array_push($status, $value);
                }
            }
        }
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $toUpdate = Reinscripciones::find($id);
        $user = HomeController::userData();
        $provinceData = Provincias::where('id','=', $user->province->value)->first();
        $period = date('Y-m-d', strtotime("+$provinceData->duracion_reinscripcion months", strtotime(date("Y-m-d"))));

        if ($toUpdate["estado"] != "aprobado") {
            $reinscripcion = $request->all();
            $saveData = [];
            $newProducts = [];
            foreach ($reinscripcion as $key => $data) {

                // if ($data == "on" || $data == true) {
                //     $saveData[$key] = 1;
                //     continue;
                // }

                if ($key == "Productos") {
                    if(!empty($reinscripcion['production_checkbox']) && $reinscripcion['production_checkbox'] == true) continue;
                    $saveData["cantidad_productos"] = count($data);

                    for ($i = 0; $i < count($data); $i++) {
                        $product = [];

                        foreach ($data[$i] as $key2 => $data2) {
                            if (in_array($key2, ["nombre_mineral", "unidades"])) {
                                // $product[$key2] = json_encode($data2);
                                $product[$key2] = $data2["value"];
                                continue;
                            }

                            $product[$key2] = $data2;
                            // $product["variedad"] =
                            // $product["otra_unidad"] =
                            $product["estado"] = "en proceso";
                        }

                        array_push($newProducts, $product);
                    }

                    continue;
                } else {
                    $saveData["cantidad_productos"] = 0;
                }
                if (in_array($key, ["id_mina", "id_productor", "polvorin", "id_departamento", "id_localidad", "nombre_mineral"]) ) {

                    $saveData[$key] = $reinscripcion[$key]["value"];
                    continue;
                }

                $saveData[$key] = $data;
            }

            $saveData['fecha_vto'] = $period ;
            $saveData['estado'] = 'en proceso';

            // $newReinscription = Reinscripciones::create($saveData);


            DB::beginTransaction();
            try {
                // llama a la funcion especifica de cada provincia
                $provinceName = str_replace(" ", "", $user->province->label);
                $functionRedirect = $provinceName."Store";
                // dd($functionRedirect);
                $this->$functionRedirect($saveData, $newProducts, $id, 'edit');
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }

            // update reinscripcion

            // $toUpdate->update($saveData);

            // for ($i = 0; $i < count($newProducts); $i++) {
            //     if (!empty($newProducts[$i]["id"])) {
            //         // update product
            //         $product = Productos::find($newProducts[$i]["id"]);
            //         $product->update($newProducts[$i]);
            //     } else {
            //         // create product
            //         $newProducts[$i]["id_reinscripcion"] = $id;
            //         $prod = Productos::create($newProducts[$i]);
            //         $newProducts[$i]["id"] = $prod["id"];
            //     }
            // }

            // $allProducts = Productos::where('id_reinscripcion', $id)->get();
            // for ($i = 0; $i < count($allProducts); $i++) {
            //     $clave = array_search($allProducts[$i]["id"], array_column($newProducts, 'id'));
            //     if ($clave === false) {
            //         // delete producto
            //         $deletedRows = Productos::where('id', $allProducts[$i]["id"])->delete();
            //     }
            // }
        }

        return Redirect::route('reinscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reinscripciones::find($id)->delete();
        return Redirect::route('reinscripciones.index');
    }

    public function guardar_reinscripcion(Request $request)
    {
        //
        //var_dump($request["cuit"]);die();
        //valido los datos
        /*$request->validate([
            'id_mina' => 'required',
            'id_productor'=> 'required|numeric',
            'fecha_vto'=> 'required',
            'prospeccion'=> 'required',
            'exploracion'=> 'required',
            'explotacion'=> 'required',
            'desarrollo'=> 'required',
            'cantidad_productos'=> 'required|numeric',
            'porcentaje_venta_provincia'=> 'required|numeric',
            'porcentaje_venta_otras_provincias'=> 'required|numeric',
            'porcentaje_exportado'=> 'required|numeric',
            'personal_perm_profesional'=> 'required|numeric',
            'personal_perm_operarios'=> 'required|numeric',
            'personal_perm_administrativos'=> 'required|numeric',
            'personal_perm_otros'=> 'required|numeric',
            'personal_trans_profesional'=> 'required|numeric',
            'personal_trans_operarios'=> 'required|numeric',
            'personal_trans_administrativos'=> 'required|numeric',
            'personal_trans_otros'=> 'required|numeric',
            'nombre'=> 'required|max:100',
            'dni'=> 'required|numeric',
            'cargo'=> 'required|max:100',
            'created_by'=> 'required',
            'estado'=> 'required',
        ]);*/
        $fecha_vencimiento = date("Y-03-31");

        var_dump($request["productos"]);
        die();

        $nueva_reinscirpcion  = new Reinscripciones();
        $nueva_reinscirpcion->id_mina = 151;
        $nueva_reinscirpcion->id_productor = 12;
        $nueva_reinscirpcion->fecha_vto = $fecha_vencimiento;
        $nueva_reinscirpcion->prospeccion = $request["prospeccion"];
        $nueva_reinscirpcion->exploracion = $request["exploracion"];
        $nueva_reinscirpcion->explotacion = $request["explotacion"];
        $nueva_reinscirpcion->desarrollo = $request["desarrollo"];
        $nueva_reinscirpcion->cantidad_productos = $request["cantidad_productos"];
        $nueva_reinscirpcion->porcentaje_venta_provincia = $request["porcentaje_prov"];
        $nueva_reinscirpcion->porcentaje_venta_otras_provincias = $request["porcentaje_otras_prov"];
        $nueva_reinscirpcion->porcentaje_exportado = $request["porcentaje_exportado"];
        $nueva_reinscirpcion->personal_perm_profesional = $request["personal_perm_prof_y_tec"];
        $nueva_reinscirpcion->personal_perm_operarios = $request["personal_perm_oper_y_obreros"];
        $nueva_reinscirpcion->personal_perm_administrativos = $request["personal_perm_administrativos"];
        $nueva_reinscirpcion->personal_perm_otros = $request["personal_perm_otros"];
        $nueva_reinscirpcion->personal_trans_profesional = $request["personal_tran_prof_y_tec"];
        $nueva_reinscirpcion->personal_trans_operarios = $request["personal_tran_oper_y_obreros"];
        $nueva_reinscirpcion->personal_trans_administrativos = $request["personal_tran_administrativos"];
        $nueva_reinscirpcion->personal_trans_otros = $request["personal_tran_otros"];
        $nueva_reinscirpcion->nombre = $request["nombre_apellido_reinscripcion"];
        $nueva_reinscirpcion->dni = $request["dni_reinscripcion"];
        $nueva_reinscirpcion->cargo = $request["cargo_reinscripcion"];
        //$nueva_reinscirpcion->created_by = Auth::user()->id;
        $nueva_reinscirpcion->created_by = 1;
        $nueva_reinscirpcion->estado = "en proceso";
        $resultado_de_insercion = $nueva_reinscirpcion->save();
        if ($resultado_de_insercion) {
            // ya guarde correctamente la reinscripcion
            //ahora voy a guardar las productos en su tabala por separado
            // for ($i=0; $i < count($request["productos"]); $i++) {
            //     # code...

            // }
            return response()->json([
                'res' => true,
                'id' => $nueva_reinscirpcion->id,
                'msg' => 'La reinscripcion se guardo Correctamente'
            ], 200);
        } else
            return response()->json([
                'res' => false,
                'msg' => 'No se guardo nada'
            ], 200);




        //$resultado = $reinscripcion->delete();
        // return Redirect::route('reinscripciones.index');
    }
    public function generar_pdf_reinscripcion($id)
    {
        $datos_de_reinscripcion = Reinscripciones::find($id);
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        //var_dump($datos_de_reinscripcion);die();
        $pdf = PDF::loadView('pdfs.formulario_reinscripcion_productor', $datos_de_reinscripcion);
        return $pdf->stream('formulario_.pdf');
    }

    public function upload(Request $request)
    {
        $files = $request->files->all();
        $filePaths = [];
        foreach ($files as $key => $file) {
            $uploadedFile = $file->getClientOriginalName();
            $fileName = $key . "-" . time() . $uploadedFile;
            $filePath = $request->file($key)->storeAs(env('PROVINCE', 'EntreRios') . "/reinscripciones", $fileName, 'public');
            $filePaths[$key] = $filePath;
        }

        return response()->json($filePaths);
    }
    public function numero_reinsripiones_nuevas()
    {
        // dd(Auth::user());
        if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Autoridad')) {
            // if (Auth::user()->id == 1) // para sudo **** funciona solamente para el usuario de cheka
            if (Auth::user()->hasRole('Administrador')) // funciona para todo usuario con rol Administrador
                $nuevas_inscripciones = Reinscripciones::select('id')->where('estado', '=', 'en proceso')->get();
            else $nuevas_inscripciones = Reinscripciones::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'en proceso')->get();
            $nuevas_inscripciones = count($nuevas_inscripciones);
            return response()->json([
                'status' => true, // true
                'msg' => 'Consulta exitosa.',
                'nuevas_inscripciones' => $nuevas_inscripciones,
            ], 200);
        } else return response()->json([
            'status' => false, //false
            'msg' => 'Consulta fallida.',
            'nuevas_inscripciones' => 0,
        ], 400);
    }


}