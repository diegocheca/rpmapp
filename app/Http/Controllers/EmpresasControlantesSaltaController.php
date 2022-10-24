<?php

namespace App\Http\Controllers;

use App\Models\EmpresasControlantesSalta;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use App\Http\Requests\StoreEmpresasControlantesSaltaRequest;
use App\Http\Requests\UpdateEmpresasControlantesSaltaRequest;
use Illuminate\Http\Request;
use Auth;


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
            $index= 0;
            foreach($request->empresas as $empresa){
                echo $index;
                $index++;
                $empresa["id"] = null;
                $empresa_nueva = EmpresasControlantesSalta::crear_empresa(2,$empresa);
            }
            return true;
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresasControlantesSalta  $empresasControlantesSalta
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresasControlantesSalta $empresasControlantesSalta)
    {
        //
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
    public function update(UpdateEmpresasControlantesSaltaRequest $request, EmpresasControlantesSalta $empresasControlantesSalta)
    {
        //
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
