<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormAltaProductorEvalSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorEvalSaltaRequest;
use App\Models\FormAltaProductorEvalSalta;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use Illuminate\Http\Request;

use Faker\Factory as Faker;

class FormAltaProductorEvalSaltaController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormAltaProductorEvalSaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request["eval"]["id_formulario_alta_salta"]);
        if($request["eval"]["id_formulario_alta_salta"] > 0){
            $formulario = FormAltaProductorSalta::find($request["eval"]["id_formulario_alta_salta"]);
            if($formulario==null){
                return false;
            }

            $evaluacion_salta_nuevo = new FormAltaProductorEvalSalta();
            $evaluacion_salta_nuevo->crear_nuevo_salta_evaluacion($request["eval"]);

            return $evaluacion_salta_nuevo->id;
        }
    }
    
    public function evaluacion_fake(){
        $faker = Faker::create();
        $form_salta = FormAltaProductorSalta::all()->random(1)->first();
        $evaluacion = new FormAltaProductorEvalSalta();
        $correcciones = [true,false,"nada"];
        $evaluacion->id_formulario_alta_salta= $form_salta->id;
        $evaluacion->correccion_tipo= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_tipo= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_nombre= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_nombre= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_apellido= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_apellido= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_dni= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_dni= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_email= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_email= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_cargo= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_cargo= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_representante_legal_domicilio= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_representante_legal_domicilio= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_nacionalidad= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_nacionalidad= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_telefono= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_telefono= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_superficie_mina= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_superficie_mina= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_volumenes_de_extraccion_periodo_anterior= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_volumenes_de_extraccion_periodo_anterior= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_n_resolucion_iia= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_n_resolucion_iia= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_etapa_de_exploracion= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_etapa_de_exploracion= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_n_resolucion_aprobacion_informe= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_n_resolucion_aprobacion_informe= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_etapa_de_exploracion_avanzada= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_etapa_de_exploracion_avanzada= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_volumenes_anuales_de_materias_primas= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_volumenes_anuales_de_materias_primas= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_material_obtenido= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_material_obtenido= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_autorizacion_extractivas_exploratorias= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_autorizacion_extractivas_exploratorias= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_responsable_nombre= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_responsable_nombre= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_responsable_apellido= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_responsable_apellido= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_responsable_dni= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_responsable_dni= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_responsable_titulo= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_responsable_titulo= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_responsable_matricula= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_responsable_matricula= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_ley_24196_numero= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_ley_24196_numero= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_ley_24196_inscripcion_renar= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_ley_24196_inscripcion_renar= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_ley_24196_explosivos= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_ley_24196_explosivos= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_ley_24196_propiedad= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_ley_24196_propiedad= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_estado_contable= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_estado_contable= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_listado_de_maquinaria= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_listado_de_maquinaria= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_regalias= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_regalias= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_personas_afectadas= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_personas_afectadas= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_multas= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_multas= $faker->sentence($nbWords = 6, $variableNbWords = true);
        $evaluacion->correccion_empresas= $correcciones[$faker->numberBetween(0,2)];
        $evaluacion->observacion_empresas= $faker->sentence($nbWords = 6, $variableNbWords = true);
        return response()->json([
            'status' => 'ok',
            'msg' => 'datos creados',
            'data' => $evaluacion
        ], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormAltaProductorEvalSalta  $formAltaProductorEvalSalta
     * @return \Illuminate\Http\Response
     */
    public function show(FormAltaProductorEvalSalta $formAltaProductorEvalSalta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormAltaProductorEvalSalta  $formAltaProductorEvalSalta
     * @return \Illuminate\Http\Response
     */
    public function edit(FormAltaProductorEvalSalta $formAltaProductorEvalSalta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormAltaProductorEvalSaltaRequest  $request
     * @param  \App\Models\FormAltaProductorEvalSalta  $formAltaProductorEvalSalta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormAltaProductorEvalSaltaRequest $request, FormAltaProductorEvalSalta $formAltaProductorEvalSalta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProductorEvalSalta  $formAltaProductorEvalSalta
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProductorEvalSalta $formAltaProductorEvalSalta)
    {
        //
    }
}
