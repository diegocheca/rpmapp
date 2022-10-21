<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProductorSalta;
use App\Http\Requests\StoreFormAltaProductorSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorSaltaRequest;

class FormAltaProductorSaltaController extends Controller
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
     * @param  \App\Http\Requests\StoreFormAltaProductorSaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id_formulario > 0){
            $formulario = FormAltaProductor::find($request->id_formulario);
            if($formulario==null){
                return false;
            }
            $request->id_usuario = Auth::user()->id;
            $resultado = FormAltaProductorSalta::crear_nuevo_salta_evaluacion($request->all());

            return $resultado;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormAltaProductorSalta  $formAltaProductorSalta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $formAltaProductorSalta)
    {
        //
        return FormAltaProductorSalta::find($formAltaProductorSalta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormAltaProductorSalta  $formAltaProductorSalta
     * @return \Illuminate\Http\Response
     */
    public function edit(FormAltaProductorSalta $formAltaProductorSalta)
    {
        // llamar a show
        /*$form_salta  = FormAltaProductorSalta::find($formAltaProductorSalta->id);
        $result = $form_salta->update_form($formAltaProductorSalta);
        return $result;*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormAltaProductorSaltaRequest  $request
     * @param  \App\Models\FormAltaProductorSalta  $formAltaProductorSalta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormAltaProductorSaltaRequest $request, FormAltaProductorSalta $formAltaProductorSalta)
    {
        //
        $form_salta  = FormAltaProductorSalta::find($formAltaProductorSalta->id);
        $result = $form_salta->update_form($formAltaProductorSalta);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProductorSalta  $formAltaProductorSalta
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProductorSalta $formAltaProductorSalta)
    {
        //
    }
}
