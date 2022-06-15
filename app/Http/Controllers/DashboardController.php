<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
use App\Models\Contacto;

use Illuminate\Support\Facades\Storage;

use App\Notifications\NewEventNotification;

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

    public function crear_contacto(){

        $user = Auth::user();

        $message = $user->contactos()->create([
            
            "name" =>" tu hermana",
            "email" =>"tuhermana2022@gmail.com",
            'message' => "sfsdfsdfsdfsdfsdfdsfsdf",
            'estado' =>"sin leer"
            //user_id = Auth::user()->id;

        ]);

        $message->user->notify(new NewEventNotification($message, $user));

    }

    public function notificaciones(){
        $user = Auth::user();
        dd(Auth::user()->notifications()->latest()->paginate());

    }
    public function numProductores()
    {
        $numero = 0;
        if (Auth::user()->hasRole('Autoridad'))
            $numero = FormAltaProductor::select('id')
                ->where('estado', '=', 'aprobado')
                ->where('provincia', '=', Auth::user()->id_provincia)
                ->count();
        if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Nacion') )
            $numero = FormAltaProductor::select('id')
                ->where('estado', '=', 'aprobado')
                ->count();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero,
        ], 200);
    }
    public function numProductoresPendientes()
    {
        $numero = 0;
        if (Auth::user()->hasRole('Autoridad'))
            $numero = FormAltaProductor::select('id')
                ->where('estado', '=', 'en revision')
                ->where('provincia', '=', Auth::user()->id_provincia)
                ->count();
        if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Nacion') )
            $numero = FormAltaProductor::select('id')
                ->where('estado', '=', 'en revision')
                ->count();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero,
        ], 200);
    }
    public function numProductoresBorradores()
    {
        $numero = 0;
        if (Auth::user()->hasRole('Autoridad'))
            $numero = FormAltaProductor::select('id')
                ->where('estado', '=', 'borrador')
                ->where('provincia','=', Auth::user()->id_provincia)
                ->count();
        if(Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Nacion') )
            $numero = FormAltaProductor::select('id')
            ->where('estado', '=', 'borrador')
            ->count();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Consulta exitosa.',
            'cantidad' => $numero,
        ], 200);
    }
}
