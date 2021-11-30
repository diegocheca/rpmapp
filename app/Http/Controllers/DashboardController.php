<?php

namespace App\Http\Controllers;


use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorCatamarca;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidarEmailProductorPrimeraVez;
use App\Mail\AvisoFormularioPresentadoEmail;
use App\Mail\AvisoFormularioAprobadoEmail;
use App\Mail\AvisoFormularioConObservaciones;


use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;

use App\Models\EmailsAConfirmar;
use App\Models\Productors;
use App\Models\Productores;


use App\Models\MinaCantera;
use App\Models\Pagocanonmina;
use App\Models\iia_dia;
use App\Models\ProductorMina;


use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\Minerales;

use App\Models\Minerales_Borradores;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function numProductores(){
        if(Auth::user()->hasRole('Productor'))
        return response()->json([
            'status' => 'mal', // true
            'msg' => 'Sin permisos',
            'cantidad' => 0,
        ], 200);
        $numero = Productores::select('id')->where('estado', '=', 'aprobado')->get();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero->count(),
        ], 200);
    }

    public function numProductoresPendientes(){
        if(Auth::user()->hasRole('Productor'))
        return response()->json([
            'status' => 'mal', // true
            'msg' => 'Sin permisos',
            'cantidad' => 0,
        ], 200);
        $numero = FormAltaProductor::select('id')->where('estado', '=', 'en revision')->get();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero->count(),
        ], 200);
    }
    public function numProductoresBorradores(){
        if(Auth::user()->hasRole('Productor'))
        return response()->json([
            'status' => 'mal', // true
            'msg' => 'Sin permisos',
            'cantidad' => 0,
        ], 200);
        $numero = FormAltaProductor::select('id')->where('estado', '=', 'borrador')->get();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero->count(),
        ], 200);
    }


    
}
