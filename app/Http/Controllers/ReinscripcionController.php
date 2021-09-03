<?php

namespace App\Http\Controllers;

use App\Models\HistorialReinscripciones;
use App\Models\Reinscripciones;
use App\Models\Productos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Controllers\CountriesController;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class ReinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reinscripciones = Reinscripciones::all();
        return Inertia::render('Reinscripciones/List', ['reinscripciones' => $reinscripciones]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(CountriesController::getProvinces());
        $provinces = CountriesController::getProvinces();
        // dd($provinces);
        //
        // return Inertia::render('Reinscripciones/Form');
        return Inertia::render('Reinscripciones/Form', [
            'action' => "create",
            'saveUrl' => "reinscripciones.store",
            'saveFileUrl' => "/reinscripciones/upload",
            'province' => env('PROVINCE', 'EntreRios')."/reinscripciones-wizard",
            'folder' => 'reinscripciones',
            'reinscripcion' => [],
            'titleForm' => 'Crear reinscripción',
            'titleBtnSave' => 'Guardar',
            'evaluate' => false,
            'provincia' => $provinces
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
        // dd($request->all());
        $reinscripcion = $request->all();
        $saveData = [];
        $newProducts = [];
        foreach($reinscripcion as $key => $data){
            if($data == "on") {
                $saveData[$key] = 1;
                continue;
            }
            if($key == "Productos") {
                $saveData["cantidad_productos"] = count($data);

                for($i = 0; $i < count($data); $i++) {
                    $product = [];

                    foreach($data[$i] as $key2 => $data2){

                        if(in_array($key2, ["nombre_mineral", "unidades"]) ) {
                            $product[$key2] = json_encode($data2);
                            // $product[$key2] = $data2["value"];
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
            }

            $saveData[$key] = $data;
        }


        // VER ESOS CAMPOS!!!
        $saveData['id_mina'] = 1;
        $saveData['id_productor'] = 6;
        $saveData['fecha_vto'] = '2022-06-08';
        $saveData['estado'] = 'en proceso';


        $newReinscription = Reinscripciones::create($saveData);

        for($i = 0; $i < count($newProducts); $i++) {
            $newProducts[$i]["id_reinscripcion"] = $newReinscription["id"];
            Productos::create($newProducts[$i]);
        }

        return Redirect::route('reinscripciones.index');
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
        $reinscripcion = Reinscripciones::find($id);
        // dd($reinscripcion->productos);
        $reinscripcion->productos = Reinscripciones::find($id)->productos;
        $provinces = CountriesController::getProvinces();

        return Inertia::render('Reinscripciones/Form', [
            'action' => "update",
            'saveUrl' => "reinscripciones.update",
            // 'saveFileUrl' => "/reinscripciones/upload",
            'province' => env('PROVINCE', 'EntreRios')."/reinscripciones-wizard",
            // 'folder' => 'reinscripciones',
            'reinscripcion' => $reinscripcion,
            'titleForm' => 'Editar reinscripciones',
            'titleBtnSave' => 'Editar',
            'evaluate' => false,
            'provincia' => $provinces,
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
        $reinscripcion = Reinscripciones::find($id);
        $reinscripcion->productos = Reinscripciones::find($id)->productos;
        $provinces = CountriesController::getProvinces();

        return Inertia::render('Reinscripciones/Form', [
            'action' => "evaluate",
            'saveUrl' => "reinscripciones.updateRevision",
            // 'saveFileUrl' => "/reinscripciones/upload",
            // 'folder' => 'reinscripciones',
            'province' => env('PROVINCE', 'EntreRios')."/reinscripciones-wizard",
            'reinscripcion' => $reinscripcion,
            'titleForm' => 'Evaluar reinscripciones',
            'titleBtnSave' => 'Guardar Revisión',
            'evaluate' => true,
            'provincia' => $provinces
        ]);

    }

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

        $this->getReinscripcionFilter($dataReinscripcion, $dataReinscripcionFilter, $allStatus);

        for ($t=0; $t < count($dataReinscripcion["Productos"]); $t++) {
            $dataReinscripcionProductsFilter[$t]["id"] = $dataReinscripcion["Productos"][$t]["id"];
            $this->getReinscripcionFilter($dataReinscripcion["Productos"][$t], $dataReinscripcionProductsFilter[$t], $allStatus);
        }


        $statusRechazado = in_array('rechazado', $allStatus);
        $statusSinEvaluar = in_array('sin evaluar', $allStatus);



        // dd($statusRechazado || $statusSinEvaluar);
        if($statusRechazado || $statusSinEvaluar){
            $newStatus =  $statusRechazado ? 'rechazado' : 'en proceso';
        } else {
            $newStatus =  'aprobado';
        }

        $dataReinscripcionFilter['estado'] = $newStatus;
        Reinscripciones::where('id', $id)->update($dataReinscripcionFilter);

        $toUpdate = Reinscripciones::find($id);
        for ($i=0; $i < count($toUpdate->productos); $i++) {
            Productos::where('id', $dataReinscripcionProductsFilter[$i]['id'])->update([
                'comment' => $dataReinscripcionProductsFilter[$i]['row_evaluacion'] == "rechazado"? $dataReinscripcionProductsFilter[$i]['row_comentario'] : null,
                'value' =>  $dataReinscripcionProductsFilter[$i]['row_evaluacion'],
                'estado' => $newStatus
             ]);
        }

        return Redirect::route('reinscripciones.index');
    }

    private function getReinscripcionFilter($data, &$filter, &$status) {
        foreach ($data as $key => $value) {
            // if(is_array($dataReinscripcion[$key])) {
            //     $this->getReinscripcionFilter($dataReinscripcion[$key], $dataReinscripcionFilter, $allStatus);
            // }
            if(str_contains($key, "_evaluacion") || str_contains($key, "_comentario")){
                $filter[$key] = $value;
                if(str_contains($key, "_evaluacion")) {
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

        if($toUpdate["estado"] != "aprobado") {
            $dataReinscripcion = $request->all();
            $saveData = [];
            $newProducts = [];
            foreach($dataReinscripcion as $key => $data){
                if($data == "on") {
                    $saveData[$key] = 1;
                    continue;
                }
                if($key == "Productos") {
                    $saveData["cantidad_productos"] = count($data);

                    for($i = 0; $i < count($data); $i++) {
                        $product = [];

                        foreach($data[$i] as $key2 => $data2){

                            if(in_array($key2, ["nombre_mineral", "unidades"]) ) {
                                $product[$key2] = json_encode($data2);
                                // $product[$key2] = $data2["value"];
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
                }

                $saveData[$key] = $data;
            }


            // VER ESOS CAMPOS!!!
            // $saveData['id_mina'] = 1;
            // $saveData['id_productor'] = 6;
            // $saveData['fecha_vto'] = '2022-06-08';
            $saveData['estado'] = 'en proceso';

            // update reinscripcion

            $toUpdate->update($saveData);

            for($i = 0; $i < count($newProducts); $i++) {
                if(!empty($newProducts[$i]["id"])) {
                    // update product
                    $product = Productos::find($newProducts[$i]["id"]);
                    $product->update($newProducts[$i]);
                } else {
                    // create product
                    $newProducts[$i]["id_reinscripcion"] = $id;
                    $prod = Productos::create($newProducts[$i]);
                    $newProducts[$i]["id"] = $prod["id"];
                }
            }

            $allProducts = Productos::where('id_reinscripcion', $id)->get();
            for($i = 0; $i < count($allProducts); $i++) {
                $clave = array_search($allProducts[$i]["id"], array_column($newProducts, 'id'));
                if($clave === false) {
                    // delete producto
                   $deletedRows = Productos::where('id', $allProducts[$i]["id"])->delete();
                }
            }

        }

        return Redirect::route('reinscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reinscripciones $reinscripcion)
    {
        //
        // var_dump($reinscripcion);die();

        $resultado = $reinscripcion->delete();
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

        var_dump($request["productos"]);die();

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
        if($resultado_de_insercion)
        {
            // ya guarde correctamente la reinscripcion
            //ahora voy a guardar las productos en su tabala por separado
            // for ($i=0; $i < count($request["productos"]); $i++) {
            //     # code...

            // }
            return response()->json([
                'res'=>true,
                'id' => $nueva_reinscirpcion->id,
                'msg'=> 'La reinscripcion se guardo Correctamente'
            ], 200);

        }

        else
            return response()->json([
                'res'=>false,
                'msg'=> 'No se guardo nada'
            ], 200);




        //$resultado = $reinscripcion->delete();
       // return Redirect::route('reinscripciones.index');
    }
    public function generar_pdf_reinscripcion($id){
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
        foreach($files as $key => $file){
            $uploadedFile = $file->getClientOriginalName();
            $fileName = $key."-".time().$uploadedFile;
            $filePath = $request->file($key)->storeAs(env('PROVINCE', 'EntreRios')."/reinscripciones", $fileName, 'public');
            $filePaths[$key] = $filePath;
        }

        return response()->json($filePaths);
    }
    public function numero_reinsripiones_nuevas(){
        if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Autoridad'))
        {
            if(Auth::user()->id == 1) // para sudo
                $nuevas_inscripciones = Reinscripciones::select('id')->where('estado', '=', 'en proceso')->get();
            else $nuevas_inscripciones = Reinscripciones::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'en proceso')->get();
            $nuevas_inscripciones = count($nuevas_inscripciones);
            return response()->json([
                'status' => 'ok',
                'msg' => 'Consulta exitosa.',
                'nuevas_inscripciones' =>$nuevas_inscripciones,
            ],201);
        }
        else return response()->json([
            'status' => 'no',
            'msg' => 'Consulta fallida.',
            'nuevas_inscripciones' =>0,
        ],201);;
    }

}
