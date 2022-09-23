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

use \PDF;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;



class FormAltaProductorCatamarcaController extends Controller
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

    public function traer_datos_pagina_catamarca($id){
        //dd($id);
        $formulario = FormAltaProductorCatamarca::select('*')
				->where("id_formulario_alta", "=", $id)
				->first();

        //catamarca
        if(isset($formulario->foto_4x4 ) && ($formulario->foto_4x4 != null))
            $formulario->foto_4x4 = env('APP_URL').'/'.str_replace("public","storage",$formulario->foto_4x4);

        if(isset($formulario->autorizacion_gestor ) && ($formulario->autorizacion_gestor != null))
            $formulario->autorizacion_gestor = env('APP_URL').'/'.str_replace("public","storage",$formulario->autorizacion_gestor);

        if(isset($formulario->primer_hoja_dni ) && ($formulario->primer_hoja_dni != null))
            $formulario->primer_hoja_dni = env('APP_URL').'/'.str_replace("public","storage",$formulario->primer_hoja_dni);

        if(isset($formulario->segunda_hoja_dni ) && ($formulario->segunda_hoja_dni != null))
            $formulario->segunda_hoja_dni = env('APP_URL').'/'.str_replace("public","storage",$formulario->segunda_hoja_dni);

        if(isset($formulario->constancia_afip ) && ($formulario->constancia_afip != null))
            $formulario->constancia_afip = env('APP_URL').'/'.str_replace("public","storage",$formulario->constancia_afip);
  
        
        return response()->json([
            'status' => 'ok',
            'msg' => 'se encontro correctamente',
            'datos' => $formulario
        ],201);
    }

    public function traer_permisos_pagina_catamarca($id, $accion){
        $estado = 0;
        if(intval($id)  === 0)
        {
            $accion = 'crear';
            $estado = 'borrador';
        }
        elseif( intval($id)  > 1)
        {
            $estado = FormAltaProductor::find($id);
            if($estado == null)
                return response()->json([
                    'status' => 'mal',
                    'msg' => 'no se encontro formulario',
                    'disables' => false,
                    'mostrar' => false,
                ],201);
            else $estado = $estado->estado;
        }
        if( 
            !(
                ($accion == 'crear') || ($accion == 'editar') || ($accion == 'ver') 
            )
        ) 
            return response()->json([
                'status' => 'mal',
                'msg' => 'accion mal',
                'disables' => false,
                'mostrar' => false,
            ],201);
        $rol = false;
        if(Auth::user()->hasRole('Productor'))
            $rol = 'Productor';
        if(Auth::user()->hasRole('Autoridad'))
            $rol = 'Autoridad';
        if(Auth::user()->hasRole('Administrador'))
            $rol = 'Administrador';
        if(!$rol)
            return response()->json([
                'status' => 'mal',
                'msg' => 'rol mal',
                'disables' => false,
                'mostrar' => false,
            ],201);

        $disables [10]['Productor']['crear']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Autoridad']['crear']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Administrador']['crear']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];

        $mostrar [10]['Productor']['crear']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['crear']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['crear']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];






        //editar
        $disables [10]['Productor']['editar']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Autoridad']['editar']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Administrador']['editar']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];

        $mostrar [10]['Productor']['editar']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['editar']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['editar']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        //editar - en revision
        $disables [10]['Productor']['editar']
        ['en revision']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables [10]['Autoridad']['editar']
        ['en revision']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Administrador']['editar']['en revision']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,
        ];

        $mostrar [10]['Productor']['editar']
        ['en revision']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['editar']
        ['en revision']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['editar']['en revision']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];




        //Ver
        $disables [10]['Productor']['ver']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Autoridad']['ver']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables [10]['Administrador']['ver']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => false,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => false,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => false,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => false,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => false,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => false,
            "email_gestor_correccion" => false,
            "dni_productor" => false,
            "dni_productor_correccion" => false,
            "foto_productor" => false,
            "foto_productor_correccion" => false,
            "constancia_afip" => false,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => false,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> false,
            "boton_catamarca"=> false,

            "estado" => false,
            "boton_actualizar" => false,

        ];

        $mostrar [10]['Productor']['ver']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => false,
            "dni_gestor" => true,
            "dni_gestor_correccion" => false,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => false,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => false,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => false,
            "email_gestor" => true,
            "email_gestor_correccion" => false,
            "dni_productor" => true,
            "dni_productor_correccion" => false,
            "foto_productor" => true,
            "foto_productor_correccion" => false,
            "constancia_afip" => true,
            "constancia_afip_correccion" => false,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => false,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['ver']
        ['borrador']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['ver']['borrador']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];


        //Ver -aprobado
        $disables [10]['Productor']['ver']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables [10]['Autoridad']['ver']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables [10]['Administrador']['ver']['aprobado']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];

        $mostrar [10]['Productor']['ver']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['ver']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['ver']['aprobado']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        //Editar -aprobado
        $disables [10]['Productor']['editar']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables [10]['Autoridad']['editar']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables [10]['Administrador']['editar']['aprobado']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,

            "estado" => true,
            "boton_actualizar" => true,

        ];

        $mostrar [10]['Productor']['editar']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Autoridad']['editar']
        ['aprobado']['altaProdMinero'] = [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar [10]['Administrador']['editar']['aprobado']['altaProdMinero'] =
        [
            "nombre_gestor" => true,
            "nombre_gestor_correccion" => true,
            "dni_gestor" => true,
            "dni_gestor_correccion" => true,
            "profesion_gestor" => true,
            "profesion_gestor_correccion" => true,
            "telefono_gestor" => true,
            "telefono_gestor_correccion" => true,
            "notificacion_gestor" => true,
            "notificacion_gestor_correccion" => true,
            "email_gestor" => true,
            "email_gestor_correccion" => true,
            "dni_productor" => true,
            "dni_productor_correccion" => true,
            "foto_productor" => true,
            "foto_productor_correccion" => true,
            "constancia_afip" => true,
            "constancia_afip_correccion" => true,
            "autorizacion_gestor" => true,
            "autorizacion_gestor_correccion" => true,
            "paso_catamarca"=> true,
            "boton_catamarca"=> true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        
        
        //dd($disables[10][$rol]['crear'][$estado->estado]['altaProdMinero']);
       // dd($rol,$accion, $estado);

      // var_dump($rol,$accion,$estado);die();

        return response()->json([
            'status' => 'ok',
            'msg' => 'se encontro correctamente',
            'disables' => $disables[10][$rol][$accion][$estado]['altaProdMinero'],
            'mostrar' => $mostrar[10][$rol][$accion][$estado]['altaProdMinero']
        ],201);
    }
}
