<?php

namespace App\Http\Controllers;


use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorMendoza;
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
use Exception;


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



class FormAltaProductorMendozaController extends Controller
{
    //


    /* 
			if (is_null($borradores->decreto3737_correcto))
				$borradores->decreto3737_correcto = 'nada';
			elseif (intval($borradores->decreto3737_correcto) == 1)
				$borradores->decreto3737_correcto = true;
			elseif (intval($borradores->decreto3737_correcto) == 0)
				$borradores->decreto3737_correcto = false;

			if (is_null($borradores->situacion_mina_correcto))
				$borradores->situacion_mina_correcto = 'nada';
			elseif (intval($borradores->situacion_mina_correcto) == 1)
				$borradores->situacion_mina_correcto = true;
			elseif (intval($borradores->situacion_mina_correcto) == 0)
				$borradores->situacion_mina_correcto = false;


			if (is_null($borradores->concesion_minera_reg_d_y_c_correcto))
				$borradores->concesion_minera_reg_d_y_c_correcto = 'nada';
			elseif (intval($borradores->concesion_minera_reg_d_y_c_correcto) == 1)
				$borradores->concesion_minera_reg_d_y_c_correcto = true;
			elseif (intval($borradores->concesion_minera_reg_d_y_c_correcto) == 0)
				$borradores->concesion_minera_reg_d_y_c_correcto = false; */



    public function traer_datos_pagina_mendoza($id)
    {
        //dd($id);
        $formulario = FormAltaProductorMendoza::select('*')
            ->where("id_formulario_alta", "=", $id)
            ->first();
        //mendoza
        if ($formulario != null) {
            if (is_null($formulario->decreto3737_correcto))
                $formulario->decreto3737_correcto = 'nada';
            elseif (intval($formulario->decreto3737_correcto) == 1)
                $formulario->decreto3737_correcto = true;
            elseif (intval($formulario->decreto3737_correcto) == 0)
                $formulario->decreto3737_correcto = false;

            if (is_null($formulario->situacion_mina_correcto))
                $formulario->situacion_mina_correcto = 'nada';
            elseif (intval($formulario->situacion_mina_correcto) == 1)
                $formulario->situacion_mina_correcto = true;
            elseif (intval($formulario->situacion_mina_correcto) == 0)
                $formulario->situacion_mina_correcto = false;


            if (is_null($formulario->concesion_minera_reg_d_y_c_correcto))
                $formulario->concesion_minera_reg_d_y_c_correcto = 'nada';
            elseif (intval($formulario->concesion_minera_reg_d_y_c_correcto) == 1)
                $formulario->concesion_minera_reg_d_y_c_correcto = true;
            elseif (intval($formulario->concesion_minera_reg_d_y_c_correcto) == 0)
                $formulario->concesion_minera_reg_d_y_c_correcto = false;

            return response()->json([
                'status' => 'ok',
                'msg' => 'se encontro correctamente',
                'datos' => $formulario
            ], 201);
        } else
            return response()->json([
                'status' => 'ok',
                'msg' => 'no se encontro el formulario',
                'datos' => false
            ], 201);
    }
    public function traer_permisos_pagina_mendoza($id, $accion)
    {
        $estado = 0;
        if (intval($id)  === 0) {
            $accion = 'crear';
            $estado = 'borrador';
        } elseif (intval($id)  > 1) {
            $estado = FormAltaProductor::find($id);
            if ($estado == null)
                return response()->json([
                    'status' => 'mal',
                    'msg' => 'no se encontro formulario',
                    'disables' => false,
                    'mostrar' => false,
                ], 201);
            else $estado = $estado->estado;
        }
        if (
            !(
                ($accion == 'crear') || ($accion == 'editar') || ($accion == 'ver'))
        )
            return response()->json([
                'status' => 'mal',
                'msg' => 'accion mal',
                'disables' => false,
                'mostrar' => false,
            ], 201);
        $rol = false;
        if (Auth::user()->hasRole('Productor'))
            $rol = 'Productor';
        if (Auth::user()->hasRole('Autoridad'))
            $rol = 'Autoridad';
        if (Auth::user()->hasRole('Administrador'))
            $rol = 'Administrador';
        if (!$rol)
            return response()->json([
                'status' => 'mal',
                'msg' => 'rol mal',
                'disables' => false,
                'mostrar' => false,
            ], 201);

        # Crear
        $disables[10]['Productor']['crear']['borrador']['altaProdMinero'] = [

            "decreto3737" => false,
            "decreto3737_correccion" => true,
            "situacion_mina" => false,
            "situacion_mina_correccion" => true,
            "concesion_minera_asiento_n" => false,
            "concesion_minera_fojas" => false,
            "concesion_minera_tomo_n" => false,
            "concesion_minera_reg_m_y_d" => false,
            "concesion_minera_reg_cant" => false,
            "concesion_minera_reg_men" => false,
            "concesion_minera_reg_d_y_c" => false,
            "obs_datos_minas" => true,

            "paso_mendoza" => false,
            "boton_mendoza" => false,
        ];
        $disables[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,

        ];
        $disables[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,

        ];
        $mostrar[10]['Productor']['crear']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,
        ];
        $mostrar[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        # Editar
        $disables[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
            "decreto3737" => false,
            "decreto3737_correccion" => true,
            "situacion_mina" => false,
            "situacion_mina_correccion" => true,
            "concesion_minera_asiento_n" => false,
            "concesion_minera_fojas" => false,
            "concesion_minera_tomo_n" => false,
            "concesion_minera_reg_m_y_d" => false,
            "concesion_minera_reg_cant" => false,
            "concesion_minera_reg_men" => false,
            "concesion_minera_reg_d_y_c" => false,
            "obs_datos_minas" => true,

            "paso_mendoza" => false,
            "boton_mendoza" => false,

        ];
        $disables[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => false,
            "boton_catamarca" => false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => false,
            "boton_catamarca" => false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $mostrar[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => true,
            "boton_mendoza" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        # Editar - en revision
        $disables[10]['Productor']['editar']['en revision']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => true,
            "situacion_mina" => true,
            "situacion_mina_correccion" => true,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => true,

            "paso_mendoza" => true,
            "boton_mendoza" => true,

        ];
        $disables[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => false,
            "situacion_mina" => true,
            "situacion_mina_correccion" => false,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => false,

            "paso_mendoza" => false,
            "boton_mendoza" => false,

        ];
        $disables[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Productor']['editar']['en revision']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [
            "decreto3737" => true,
            "decreto3737_correccion" => true,
            "situacion_mina" => true,
            "situacion_mina_correccion" => true,
            "concesion_minera_asiento_n" => true,
            "concesion_minera_fojas" => true,
            "concesion_minera_tomo_n" => true,
            "concesion_minera_reg_m_y_d" => true,
            "concesion_minera_reg_cant" => true,
            "concesion_minera_reg_men" => true,
            "concesion_minera_reg_d_y_c" => true,
            "obs_datos_minas" => true,

            "paso_mendoza" => true,
            "boton_mendoza" => true,
        ];
        $mostrar[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        # Ver
        $disables[10]['Productor']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => false,
            "boton_catamarca" => false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => false,
            "boton_catamarca" => false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => false,
            "boton_catamarca" => false,

            "estado" => false,
            "boton_actualizar" => false,

        ];
        $mostrar[10]['Productor']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        # Ver -aprobado
        $disables[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $mostrar[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];

        # Editar -aprobado
        $disables[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $disables[10]['Administrador']['editar']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,

            "estado" => true,
            "boton_actualizar" => true,

        ];
        $mostrar[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [
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
            "paso_catamarca" => true,
            "boton_catamarca" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['editar']['aprobado']['altaProdMinero'] =
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
                "paso_catamarca" => true,
                "boton_catamarca" => true,


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
        ], 201);
    }

    public function correccion_guardar_paso_mendoza(Request $request)
    {
        // dd($request);
        try {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $formulario_provisorio = FormAltaProductor::select('*')
                ->where('id', '=', $request->id)->first();
            if ($request->es_evaluacion == 'true') $request->es_evaluacion = true;
            else $request->es_evaluacion = false;
            if ($formulario_provisorio != null) {
                //significa que existe el formulario padre, ahora reviso el form de mendz
                $formulario_provisorio_medonza = FormAltaProductorMendoza::select('*')
                    ->where('id_formulario_alta', '=', $formulario_provisorio->id)->first();
                if ($formulario_provisorio_medonza != null) {
                    //tengo el formulario de mendoza
                    //estoy haciendo un update o edit
                    if ($request->es_evaluacion) {
                        //soy autoridad
                        //dd($request->obs_concesion_minera_reg_d_y_c);
                        if ((!is_bool($request->decreto3737_correcto)) && ($request->decreto3737_correcto == 'nada'))
                            $request->decreto3737_correcto = null;
                        elseif ($request->decreto3737_correcto == 'false')
                            $request->decreto3737_correcto = false;
                        elseif ($request->decreto3737_correcto == 'true')
                            $request->decreto3737_correcto = true;

                        if ((!is_bool($request->situacion_mina_correcto)) && ($request->situacion_mina_correcto == 'nada'))
                            $request->situacion_mina_correcto = null;
                        elseif ($request->situacion_mina_correcto == 'false')
                            $request->situacion_mina_correcto = false;
                        elseif ($request->situacion_mina_correcto == 'true')
                            $request->situacion_mina_correcto = true;

                        if ((!is_bool($request->concesion_minera_reg_d_y_c_correcto)) && ($request->concesion_minera_reg_d_y_c_correcto == 'nada'))
                            $request->concesion_minera_reg_d_y_c_correcto = null;
                        elseif ($request->concesion_minera_reg_d_y_c_correcto == 'false')
                            $request->concesion_minera_reg_d_y_c_correcto = false;
                        elseif ($request->concesion_minera_reg_d_y_c_correcto == 'true')
                            $request->concesion_minera_reg_d_y_c_correcto = true;

                        //dd($request->decreto3737_correcto , $request->situacion_mina_correcto , $request->concesion_minera_reg_d_y_c_correcto);

                        $formulario_provisorio_medonza->decreto3737_correcto = $request->decreto3737_correcto;
                        $formulario_provisorio_medonza->obs_decreto3737 = $request->obs_decreto3737;
                        $formulario_provisorio_medonza->situacion_mina_correcto = $request->situacion_mina_correcto;
                        $formulario_provisorio_medonza->obs_situacion_mina = $request->obs_situacion_mina;
                        $formulario_provisorio_medonza->concesion_minera_reg_d_y_c_correcto = $request->concesion_minera_reg_d_y_c_correcto;
                        $formulario_provisorio_medonza->obs_datos_minas = $request->obs_concesion_minera_reg_d_y_c;

                        $formulario_provisorio_medonza->created_by = Auth::user()->id;
                        $formulario_provisorio_medonza->updated_by =  Auth::user()->id;
                        $formulario_provisorio_medonza->updated_at = date("Y-m-d H:i:s");
                        if ($formulario_provisorio_medonza->save()) {
                            return response()->json([
                                'status' => 'ok',
                                'msg' => 'se creo el paso de mendoza correctamente',
                                'rol' => 'autoridad',
                                'id' => $formulario_provisorio_medonza->id
                            ], 201);
                        } else
                            return response()->json([
                                'status' => 'mal',
                                'msg' => 'error al guardar en la base de datos',
                                'rol' => 'autoridad',
                            ], 201);
                    } elseif (!$request->es_evaluacion) {
                        //soy productor
                        $formulario_provisorio_medonza->decreto3737 = $request->decreto3737;
                        $formulario_provisorio_medonza->situacion_mina = $request->situacion_mina;
                        $formulario_provisorio_medonza->concesion_minera_asiento_n = $request->concesion_minera_asiento_n;
                        $formulario_provisorio_medonza->concesion_minera_fojas = $request->concesion_minera_fojas;
                        $formulario_provisorio_medonza->concesion_minera_tomo_n = $request->concesion_minera_tomo_n;
                        $formulario_provisorio_medonza->concesion_minera_reg_m_y_d = $request->concesion_minera_reg_m_y_d;
                        $formulario_provisorio_medonza->concesion_minera_reg_cant = $request->concesion_minera_reg_cant;
                        $formulario_provisorio_medonza->concesion_minera_reg_men = $request->concesion_minera_reg_men;
                        $formulario_provisorio_medonza->concesion_minera_reg_d_y_c = $request->concesion_minera_reg_d_y_c;
                        $formulario_provisorio_medonza->updated_by =  Auth::user()->id;
                        $formulario_provisorio_medonza->updated_at = date("Y-m-d H:i:s");
                        if ($formulario_provisorio_medonza->save())
                            return response()->json([
                                'status' => 'ok',
                                'msg' => 'se guardo correctamente la infromacion',
                                'rol' => 'productor',
                                'id' => $formulario_provisorio_medonza->id
                            ], 201);
                        else
                            return response()->json([
                                'status' => 'mal',
                                'msg' => 'error al guardar en la base de datos',
                                'rol' => 'productor',
                            ], 201);
                    } else {
                        return response()->json([
                            'status' => 'mal, sin rol al editar',
                            'msg' => 'error',
                        ], 201);
                    }
                } else {
                    //no existe el formulario, puedo crearlo  o fue un error
                    //voy a crear un nuevo registro
                    $formulario_provisorio = new FormAltaProductorMendoza();
                    $formulario_provisorio->id_formulario_alta = $request->id;
                    $formulario_provisorio->decreto3737 = $request->decreto3737;
                    $formulario_provisorio->situacion_mina = $request->situacion_mina;
                    $formulario_provisorio->concesion_minera_asiento_n = $request->concesion_minera_asiento_n;
                    $formulario_provisorio->concesion_minera_fojas = $request->concesion_minera_fojas;
                    $formulario_provisorio->concesion_minera_tomo_n = $request->concesion_minera_tomo_n;
                    $formulario_provisorio->concesion_minera_reg_m_y_d = $request->concesion_minera_reg_m_y_d;
                    $formulario_provisorio->concesion_minera_reg_cant = $request->concesion_minera_reg_cant;
                    $formulario_provisorio->concesion_minera_reg_men = $request->concesion_minera_reg_men;
                    $formulario_provisorio->concesion_minera_reg_d_y_c = $request->concesion_minera_reg_d_y_c;
                    $formulario_provisorio->updated_by =  Auth::user()->id;
                    $formulario_provisorio->created_by =  Auth::user()->id;

                    $formulario_provisorio->updated_at = date("Y-m-d H:i:s");
                    if ($formulario_provisorio->save())
                        return response()->json([
                            'status' => 'ok',
                            'msg' => 'se creo el registro correctamente',
                            'rol' => 'productor',
                            'id' => $formulario_provisorio->id
                        ], 201);
                    else
                        return response()->json([
                            'status' => 'mal',
                            'msg' => 'error al crear el nuevo registro en la base de datos',
                            'rol' => 'productor',
                        ], 201);
                }
            } elseif ($formulario_provisorio == null)
                return response()->json([
                    'status' => 'mal',
                    'msg' => 'error en el id pasado',
                    'rol' => 'nada'
                ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e->getMessage(),
            ], 500);
        }
    }
}
