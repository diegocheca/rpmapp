<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProdPaso1;
use Illuminate\Http\Request;

class FormAltaProdPaso1Controller extends Controller
{

    public $tipo_productor;
	public $cuit;
	public $razonsocial;
	public $numeroproductor;
	public $email;
	public $tiposociedad;
	public $inscripciondgr;
	public $constaciasociedad;


	// public $cuit_correcto;
	// public $obs_cuit;
	// public $razon_social_correcto;
	// public $obs_razon_social;
	// public $numeroproductor_correcto;
	// public $obs_numeroproductor;
	// public $email_correcto;
	// public $obs_email;
	// public $tiposociedad_correcto;
	// public $obs_tiposociedad;
	// public $inscripciondgr_correcto;
	// public $obs_inscripciondgr;
	// public $constaciasociedad_correcto;
	// public $obs_constaciasociedad;
	// public $paso_1_progreso;
	// public $paso_1_aprobado;
	// public $paso_1_reprobado;


	public $created_by;
	public $updated_by;
	public $estado;

	public $updated_paso_uno;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormAltaProdPaso1  $formAltaProdPaso1
     * @return \Illuminate\Http\Response
     */
    public function show(FormAltaProdPaso1 $formAltaProdPaso1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormAltaProdPaso1  $formAltaProdPaso1
     * @return \Illuminate\Http\Response
     */
    public function edit(FormAltaProdPaso1 $formAltaProdPaso1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormAltaProdPaso1  $formAltaProdPaso1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormAltaProdPaso1 $formAltaProdPaso1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProdPaso1  $formAltaProdPaso1
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProdPaso1 $formAltaProdPaso1)
    {
        //
    }
}
