<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormAltaProductorEvalSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorEvalSaltaRequest;
use App\Models\FormAltaProductorEvalSalta;

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
        if($request->id_formulario > 0){
            $formulario = FormAltaProductor::find($request->id_formulario);
            if($formulario==null){
                return false;
            }

            $evaluacion_salta_nuevo = new FormAltaProductorEvalSalta();
            $evaluacion_salta_nuevo->crear_nuevo_salta_evaluacion($request->all());

            return $evaluacion_salta_nuevo->id;
        }
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
