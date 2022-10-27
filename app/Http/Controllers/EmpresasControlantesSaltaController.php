<?php

namespace App\Http\Controllers;

use App\Models\EmpresasControlantesSalta;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use App\Http\Requests\StoreEmpresasControlantesSaltaRequest;
use App\Http\Requests\UpdateEmpresasControlantesSaltaRequest;
use Illuminate\Http\Request;
use Auth;
use Faker\Factory as Faker;

class EmpresasControlantesSaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function empresa_fake(){
            $faker = Faker::create();
            //$tipos = ["tipo 1", tipo]
            $empresas = array();
            $cantidad = $faker->numberBetween(1,5);
            $index = 0;
            for ($i=0; $i < $cantidad; $i++, $index++) { 
                $empresa = new FormAltaProductorSalta();
    
                $empresa->id_formulario_alta_salta =$faker->numberBetween(1,3);
                $empresa->razon_social = $faker->company();
                $empresa->tipo = $faker->numberBetween(1,3);
                $empresa->cuit = $faker->numberBetween(48484,9999999);
                $empresa->calle = $faker->streetAddress();
                $empresa->numero = $faker->numberBetween(100,9999);
                $empresa->telefono = $faker->phoneNumber();
                $empresa->provincia = $faker->numberBetween(1,80);
                $empresa->departamento = $faker->numberBetween(1,99);
                $empresa->localidad = $faker->state();
                $empresa->cp = $faker->numberBetween(1,99999);
                $empresa->otro =  $faker->sentence($nbWords = 6, $variableNbWords = true);
                $empresa->created_by = 1;
                $empresa->updated_by = 1;
             
                $empresas[$index] = $empresa;
                
            }

            return response()->json([
                'status' => 'ok',
                'msg' => 'datos creados',
                'data' => $empresas
            ], 201); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpresasControlantesSaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreEmpresasControlantesSaltaRequest $request)
    public function store(Request $request)
    {
        /*if($request->id_formulario_alta_salta > 0){
            $formulario = FormAltaProductorSalta::find(2);
            if($formulario==null){
                return false;
            }*/
            //dd($request->all());
            $index= 0;
            $lista_id = array();
            foreach($request->empresas as $empresa){
                $empresa["id"] = null;
                $lista_id[$index] = EmpresasControlantesSalta::crear_empresa($request->id_formulario_alta_salta,$empresa);
                $index++;
            }
            return response()->json([
                'status' => 'ok',
                'msg' => 'empresas creadas',
                'data' => $lista_id
            ], 201); 
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresasControlantesSalta  $empresasControlantesSalta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        //dd($request["id"]);
        $empresas = EmpresasControlantesSalta::select("*")->where("id_formulario_alta_salta","=",$request["id"])->get();
        return response()->json([
            'status' => 'ok',
            'msg' => 'empresas encontradas',
            'data' => $empresas
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresasControlantesSalta  $empresasControlantesSalta
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresasControlantesSalta $empresasControlantesSalta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpresasControlantesSaltaRequest  $request
     * @param  \App\Models\EmpresasControlantesSalta  $empresasControlantesSalta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $form_salta_to_update  = FormAltaProductorSalta::find($request["id_formulario_alta_salta"]);
        //dd($form_salta_to_update);
        foreach ($request["empresas"] as $empresa ) {
            //dd($empresa,$empresa["id"]);
            $empresa_a_actualizar = EmpresasControlantesSalta::find($empresa["id"]);
            //dd($empresa_a_actualizar);
            $result = $empresa_a_actualizar->update_empresa($empresa);
        }
        return response()->json([
            'status' => 'ok',
            'msg' => 'empresa actualizada',
            'data' => $result
        ], 201); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresasControlantesSalta  $empresasControlantesSalta
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresasControlantesSalta $empresasControlantesSalta)
    {
        //
    }
}
