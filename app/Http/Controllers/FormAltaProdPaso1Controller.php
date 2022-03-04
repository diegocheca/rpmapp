<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProdPaso1;
use Illuminate\Http\Request;
use Auth;
class FormAltaProdPaso1Controller extends Controller
{

   //public $tipo_productor;
	protected $cuit;
	protected $razonsocial;
	protected $numeroproductor;
	protected $email;
	protected $tiposociedad;
	protected $inscripciondgr;
	protected $constaciasociedad;


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
	protected $created_by;
	protected $updated_by;
	protected $estado;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista todos los pasos uno de formularios para mostrar mediante json
        $formularios_uno = null;
        /* if (Auth::user()->hasRole('Productor')) 
            $formularios_uno = FormAltaProdPaso1::select('*')->where('created_by', '=', Auth::user()->id)->first();
        if (Auth::user()->hasRole('Autoridad')) 
            $formularios_uno = FormAltaProdPaso1::select('*')->where('provincia', '=', Auth::user()->id);
        if (Auth::user()->hasRole('Administrador')) 
            $formularios_uno = FormAltaProdPaso1::select('*')->where('created_by', '=', Auth::user()->id);
        } */
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
        //$formAltaProdPaso1->id =
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
