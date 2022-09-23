<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorTucuman;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormAltaProductorTucumanController extends Controller
{
    public function traer_datos_pagina_tucuman($id)
    {
        //dd($id);
        $formulario = FormAltaProductorTucuman::select('*')
            ->where("id_formulario_alta", "=", $id)
            ->first();

        //tucuman
        if (isset($formulario->dni_frente_persona) && ($formulario->dni_frente_persona != null))
            $formulario->dni_frente_persona = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_frente_persona);

        if (isset($formulario->dni_reverso_persona) && ($formulario->dni_reverso_persona != null))
            $formulario->dni_reverso_persona = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_reverso_persona);

        if (isset($formulario->dni_frente_gerente) && ($formulario->dni_frente_gerente != null))
            $formulario->dni_frente_gerente = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_frente_gerente);

        if (isset($formulario->dni_reverso_gerente) && ($formulario->dni_reverso_gerente != null))
            $formulario->dni_reverso_gerente = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_reverso_gerente);

        if (isset($formulario->dni_frente_representante_legal) && ($formulario->dni_frente_representante_legal != null))
            $formulario->dni_frente_representante_legal = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_frente_representante_legal);

        if (isset($formulario->dni_reverso_representante_legal) && ($formulario->dni_reverso_representante_legal != null))
            $formulario->dni_reverso_representante_legal = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->dni_reverso_representante_legal);

        if (isset($formulario->personaria_de_la_socidedad) && ($formulario->personaria_de_la_socidedad != null))
            $formulario->personaria_de_la_socidedad = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->personaria_de_la_socidedad);

        if (isset($formulario->personeria_del_representante_legal) && ($formulario->personeria_del_representante_legal != null))
            $formulario->personeria_del_representante_legal = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->personeria_del_representante_legal);

        if (isset($formulario->decreto_de_nombramiento) && ($formulario->decreto_de_nombramiento != null))
            $formulario->decreto_de_nombramiento = env('APP_URL') . '/' . str_replace("public", "storage", $formulario->decreto_de_nombramiento);

        return response()->json([
            'status' => 'ok',
            'msg' => 'se encontro correctamente',
            'datos' => $formulario
        ], 201);
    }

    public function traer_permisos_pagina_tucuman($id, $accion)
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
                ($accion == 'crear') || ($accion == 'editar') || ($accion == 'ver')
            )
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

        # CREAR
        $disables[10]['Productor']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,


        ];
        $disables[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $mostrar[10]['Productor']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,

        ];
        $mostrar[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        # EDITAR
        $disables[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,

        ];
        $disables[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $mostrar[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        # EDITAR - EN REVISION
        $disables[10]['Productor']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $disables[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Productor']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        # Ver
        $disables[10]['Productor']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => false,
            "cuit" => false,
            "dni_frente_persona" => false,
            "dni_reverso_persona" => false,
            "dni_frente_gerente" => false,
            "dni_reverso_gerente" => false,
            "dni_frente_representante_legal" => false,
            "dni_reverso_representante_legal" => false,
            "representante_apellido" => false,
            "representante_nombre" => false,
            "representante_dni" => false,
            "persona_autorizada_nombre" => false,
            "persona_autorizada_apellido" => false,
            "persona_autorizada_dni" => false,
            "persona_autorizada_telefono" => false,
            "persona_autorizada_email" => false,
            "persona_autorizada_domicilio" => false,
            "personaria_de_la_socidedad" => false,
            "personeria_del_representante_legal" => false,
            "decreto_de_nombramiento" => false,

            "paso_tucuman" => false,
            "boton_tucuman" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $mostrar[10]['Productor']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        # Ver - Aprobado
        $disables[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $disables[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $disables[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        # Editar - Aprobado
        $disables[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $disables[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $disables[10]['Administrador']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        $mostrar[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
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
            "paso_tucuman" => true,
            "boton_tucuman" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
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
            "paso_tucuman" => true,
            "boton_tucuman" => true,


            "estado" => true,

            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['editar']['aprobado']['altaProdMinero'] = [
            "tipo" => true,
            "cuit" => true,
            "dni_frente_persona" => true,
            "dni_reverso_persona" => true,
            "dni_frente_gerente" => true,
            "dni_reverso_gerente" => true,
            "dni_frente_representante_legal" => true,
            "dni_reverso_representante_legal" => true,
            "representante_apellido" => true,
            "representante_nombre" => true,
            "representante_dni" => true,
            "persona_autorizada_nombre" => true,
            "persona_autorizada_apellido" => true,
            "persona_autorizada_dni" => true,
            "persona_autorizada_telefono" => true,
            "persona_autorizada_email" => true,
            "persona_autorizada_domicilio" => true,
            "personaria_de_la_socidedad" => true,
            "personeria_del_representante_legal" => true,
            "decreto_de_nombramiento" => true,

            "paso_tucuman" => true,
            "boton_tucuman" => true,
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

    public function correccion_guardar_paso_tucuman(Request $request)
    {
        // dd('Hola');
        dd($request->all());
        try {
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $formulario_provisorio = FormAltaProductor::select('*')
                ->where('id', '=', $request->id)->first();
            if ($request->es_evaluacion == 'true') $request->es_evaluacion = true;
            else $request->es_evaluacion = false;
            if ($formulario_provisorio != null) {
                //significa que existe el formulario padre, ahora reviso el form de tucuman
                $formulario_provisorio_tucuman = FormAltaProductorTucuman::select('*')
                    ->where('id_formulario_alta', '=', $formulario_provisorio->id)->first();
                if ($formulario_provisorio_tucuman != null) {
                    //tengo el formulario de tucuman
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

                        $formulario_provisorio_tucuman->decreto3737_correcto = $request->decreto3737_correcto;
                        $formulario_provisorio_tucuman->obs_decreto3737 = $request->obs_decreto3737;
                        $formulario_provisorio_tucuman->situacion_mina_correcto = $request->situacion_mina_correcto;
                        $formulario_provisorio_tucuman->obs_situacion_mina = $request->obs_situacion_mina;
                        $formulario_provisorio_tucuman->concesion_minera_reg_d_y_c_correcto = $request->concesion_minera_reg_d_y_c_correcto;
                        $formulario_provisorio_tucuman->obs_datos_minas = $request->obs_concesion_minera_reg_d_y_c;

                        $formulario_provisorio_tucuman->created_by = Auth::user()->id;
                        $formulario_provisorio_tucuman->updated_by =  Auth::user()->id;
                        $formulario_provisorio_tucuman->updated_at = date("Y-m-d H:i:s");
                        if ($formulario_provisorio_tucuman->save()) {
                            return response()->json([
                                'status' => 'ok',
                                'msg' => 'se creo el paso de mendoza correctamente',
                                'rol' => 'autoridad',
                                'id' => $formulario_provisorio_tucuman->id
                            ], 201);
                        } else
                            return response()->json([
                                'status' => 'mal',
                                'msg' => 'error al guardar en la base de datos',
                                'rol' => 'autoridad',
                            ], 201);
                    } elseif (!$request->es_evaluacion) {
                        //soy productor
                        $formulario_provisorio->tipo = $request->tipo;
                        $formulario_provisorio->representante_apellido = $request->representante_apellido;
                        $formulario_provisorio->representante_nombre = $request->representante_nombre;
                        $formulario_provisorio->representante_dni = $request->representante_dni;
                        $formulario_provisorio->persona_autorizada_nombre = $request->persona_autorizada_nombre;
                        $formulario_provisorio->persona_autorizada_apellido = $request->persona_autorizada_apellido;
                        $formulario_provisorio->persona_autorizada_dni = $request->persona_autorizada_dni;
                        $formulario_provisorio->persona_autorizada_telefono = $request->persona_autorizada_telefono;
                        $formulario_provisorio->persona_autorizada_email = $request->persona_autorizada_email;
                        $formulario_provisorio->persona_autorizada_domicilio = $request->persona_autorizada_domicilio;

                        if ($request->dni_frente_persona != null && $request->dni_frente_persona != '' && $request->dni_frente_persona != 'null') { //no es un archivo vacio
                            if (substr($request->dni_frente_persona, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_frente_persona->path());
                                $formulario_provisorio->dni_frente_persona =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_persona);
                            }
                        }
                        if ($request->dni_reverso_persona != null && $request->dni_reverso_persona != '' && $request->dni_reverso_persona != 'null') { //no es un archivo vacio
                            if (substr($request->dni_reverso_persona, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_reverso_persona->path());
                                $formulario_provisorio->dni_reverso_persona =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_persona);
                            }
                        }
                        if ($request->dni_frente_gerente != null && $request->dni_frente_gerente != '' && $request->dni_frente_gerente != 'null') { //no es un archivo vacio
                            if (substr($request->dni_frente_gerente, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_frente_gerente->path());
                                $formulario_provisorio->dni_frente_gerente =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_gerente);
                            }
                        }
                        if ($request->dni_reverso_gerente != null && $request->dni_reverso_gerente != '' && $request->dni_reverso_gerente != 'null') { //no es un archivo vacio
                            if (substr($request->dni_reverso_gerente, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_reverso_gerente->path());
                                $formulario_provisorio->dni_reverso_gerente =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_gerente);
                            }
                        }
                        if ($request->dni_frente_representante_legal != null && $request->dni_frente_representante_legal != '' && $request->dni_frente_representante_legal != 'null') { //no es un archivo vacio
                            if (substr($request->dni_frente_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_frente_representante_legal->path());
                                $formulario_provisorio->dni_frente_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_representante_legal);
                            }
                        }
                        if ($request->dni_reverso_representante_legal != null && $request->dni_reverso_representante_legal != '' && $request->dni_reverso_representante_legal != 'null') { //no es un archivo vacio
                            if (substr($request->dni_reverso_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->dni_reverso_representante_legal->path());
                                $formulario_provisorio->dni_reverso_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_representante_legal);
                            }
                        }
                        if ($request->personaria_de_la_socidedad != null && $request->personaria_de_la_socidedad != '' && $request->personaria_de_la_socidedad != 'null') { //no es un archivo vacio
                            if (substr($request->personaria_de_la_socidedad, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->personaria_de_la_socidedad->path());
                                $formulario_provisorio->personaria_de_la_socidedad =  Storage::put('public/files_formularios' . '/' . $request->id, $request->personaria_de_la_socidedad);
                            }
                        }
                        if ($request->personeria_del_representante_legal != null && $request->personeria_del_representante_legal != '' && $request->personeria_del_representante_legal != 'null') { //no es un archivo vacio
                            if (substr($request->personeria_del_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->personeria_del_representante_legal->path());
                                $formulario_provisorio->personeria_del_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->personeria_del_representante_legal);
                            }
                        }
                        if ($request->decreto_de_nombramiento != null && $request->decreto_de_nombramiento != '' && $request->decreto_de_nombramiento != 'null') { //no es un archivo vacio
                            if (substr($request->decreto_de_nombramiento, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                                $contents = file_get_contents($request->decreto_de_nombramiento->path());
                                $formulario_provisorio->decreto_de_nombramiento =  Storage::put('public/files_formularios' . '/' . $request->id, $request->decreto_de_nombramiento);
                            }
                        }

                        $formulario_provisorio_tucuman->updated_by =  Auth::user()->id;
                        $formulario_provisorio_tucuman->updated_at = date("Y-m-d H:i:s");
                        if ($formulario_provisorio_tucuman->save())
                            return response()->json([
                                'status' => 'ok',
                                'msg' => 'se guardo correctamente la informacion',
                                'rol' => 'productor',
                                'id' => $formulario_provisorio_tucuman->id
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
                    $formulario_provisorio = new FormAltaProductorTucuman();
                    $formulario_provisorio->id_formulario_alta = $request->id;
                    $formulario_provisorio->tipo = $request->tipo;
                    // $formulario_provisorio->dni_frente_persona = $request->dni_frente_persona;
                    // $formulario_provisorio->dni_reverso_persona = $request->dni_reverso_persona;
                    // $formulario_provisorio->dni_frente_gerente = $request->dni_frente_gerente;
                    // $formulario_provisorio->dni_reverso_gerente = $request->dni_reverso_gerente;
                    // $formulario_provisorio->dni_frente_representante_legal = $request->dni_frente_representante_legal;
                    // $formulario_provisorio->dni_reverso_representante_legal = $request->dni_reverso_representante_legal;
                    $formulario_provisorio->representante_apellido = $request->representante_apellido;
                    $formulario_provisorio->representante_nombre = $request->representante_nombre;
                    $formulario_provisorio->representante_dni = $request->representante_dni;
                    $formulario_provisorio->persona_autorizada_nombre = $request->persona_autorizada_nombre;
                    $formulario_provisorio->persona_autorizada_apellido = $request->persona_autorizada_apellido;
                    $formulario_provisorio->persona_autorizada_dni = $request->persona_autorizada_dni;
                    $formulario_provisorio->persona_autorizada_telefono = $request->persona_autorizada_telefono;
                    $formulario_provisorio->persona_autorizada_email = $request->persona_autorizada_email;
                    $formulario_provisorio->persona_autorizada_domicilio = $request->persona_autorizada_domicilio;

                    // $formulario_provisorio->personaria_de_la_socidedad = $request->personaria_de_la_socidedad;
                    // $formulario_provisorio->personeria_del_representante_legal = $request->personeria_del_representante_legal;
                    // $formulario_provisorio->decreto_de_nombramiento = $request->decreto_de_nombramiento;
                    $formulario_provisorio->updated_by =  Auth::user()->id;
                    $formulario_provisorio->created_by =  Auth::user()->id;

                    if ($request->dni_frente_persona != null && $request->dni_frente_persona != '' && $request->dni_frente_persona != 'null') { //no es un archivo vacio
                        if (substr($request->dni_frente_persona, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_frente_persona->path());
                            $formulario_provisorio->dni_frente_persona =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_persona);
                        }
                    }
                    if ($request->dni_reverso_persona != null && $request->dni_reverso_persona != '' && $request->dni_reverso_persona != 'null') { //no es un archivo vacio
                        if (substr($request->dni_reverso_persona, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_reverso_persona->path());
                            $formulario_provisorio->dni_reverso_persona =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_persona);
                        }
                    }
                    if ($request->dni_frente_gerente != null && $request->dni_frente_gerente != '' && $request->dni_frente_gerente != 'null') { //no es un archivo vacio
                        if (substr($request->dni_frente_gerente, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_frente_gerente->path());
                            $formulario_provisorio->dni_frente_gerente =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_gerente);
                        }
                    }
                    if ($request->dni_reverso_gerente != null && $request->dni_reverso_gerente != '' && $request->dni_reverso_gerente != 'null') { //no es un archivo vacio
                        if (substr($request->dni_reverso_gerente, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_reverso_gerente->path());
                            $formulario_provisorio->dni_reverso_gerente =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_gerente);
                        }
                    }
                    if ($request->dni_frente_representante_legal != null && $request->dni_frente_representante_legal != '' && $request->dni_frente_representante_legal != 'null') { //no es un archivo vacio
                        if (substr($request->dni_frente_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_frente_representante_legal->path());
                            $formulario_provisorio->dni_frente_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_frente_representante_legal);
                        }
                    }
                    if ($request->dni_reverso_representante_legal != null && $request->dni_reverso_representante_legal != '' && $request->dni_reverso_representante_legal != 'null') { //no es un archivo vacio
                        if (substr($request->dni_reverso_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->dni_reverso_representante_legal->path());
                            $formulario_provisorio->dni_reverso_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dni_reverso_representante_legal);
                        }
                    }
                    if ($request->personaria_de_la_socidedad != null && $request->personaria_de_la_socidedad != '' && $request->personaria_de_la_socidedad != 'null') { //no es un archivo vacio
                        if (substr($request->personaria_de_la_socidedad, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->personaria_de_la_socidedad->path());
                            $formulario_provisorio->personaria_de_la_socidedad =  Storage::put('public/files_formularios' . '/' . $request->id, $request->personaria_de_la_socidedad);
                        }
                    }
                    if ($request->personeria_del_representante_legal != null && $request->personeria_del_representante_legal != '' && $request->personeria_del_representante_legal != 'null') { //no es un archivo vacio
                        if (substr($request->personeria_del_representante_legal, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->personeria_del_representante_legal->path());
                            $formulario_provisorio->personeria_del_representante_legal =  Storage::put('public/files_formularios' . '/' . $request->id, $request->personeria_del_representante_legal);
                        }
                    }
                    if ($request->decreto_de_nombramiento != null && $request->decreto_de_nombramiento != '' && $request->decreto_de_nombramiento != 'null') { //no es un archivo vacio
                        if (substr($request->decreto_de_nombramiento, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                            $contents = file_get_contents($request->decreto_de_nombramiento->path());
                            $formulario_provisorio->decreto_de_nombramiento =  Storage::put('public/files_formularios' . '/' . $request->id, $request->decreto_de_nombramiento);
                        }
                    }

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
