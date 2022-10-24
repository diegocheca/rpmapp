<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use Auth;
use Exception;
use App\Http\Requests\StoreFormAltaProductorSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorSaltaRequest;

class FormAltaProductorSaltaController extends Controller
{
    public function traer_datos_pagina_salta($id)
    {
        try {
            $formulario = FormAltaProductorSalta::select('*')
                ->where("id_formulario_alta", "=", $id)
                ->first();
            return response()->json([
                'status' => 'ok',
                'msg' => 'se encontro correctamente',
                'datos' => $formulario
            ], 201);
        } catch (Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
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
            "id_formulario_alta" => false,

            "tipo" => false,
            "representante_legal_apellido" => false,
            "representante_legal_nombre" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "telefono" => false,
            "nacionalidad" => false,
            "representante_legal_domicilio" => false,
            "responsable_apellido" => false,
            "responsable_nombre" => false,
            "responsable_dni" => false,
            "responsable_matricula" => false,
            "responsable_titulo" => false,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,


            "paso_salta" => false,
            "boton_salta" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,

            "tipo" => false,
            "representante_legal_apellido" => false,
            "representante_legal_nombre" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "telefono" => false,
            "nacionalidad" => false,
            "representante_legal_domicilio" => false,
            "responsable_apellido" => false,
            "responsable_nombre" => false,
            "responsable_dni" => false,
            "responsable_matricula" => false,
            "responsable_titulo" => false,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => false,
            "boton_salta" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,

            "tipo" => false,
            "representante_legal_apellido" => false,
            "representante_legal_nombre" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "telefono" => false,
            "nacionalidad" => false,
            "representante_legal_domicilio" => false,
            "responsable_apellido" => false,
            "responsable_nombre" => false,
            "responsable_dni" => false,
            "responsable_matricula" => false,
            "responsable_titulo" => false,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => false,
            "boton_salta" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $mostrar[10]['Productor']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => true,

            "tipo" => true,
            "representante_legal_apellido" => true,
            "representante_legal_nombre" => true,
            "representante_legal_dni" => true,
            "representante_legal_email" => true,
            "representante_legal_cargo" => true,
            "telefono" => true,
            "nacionalidad" => true,
            "representante_legal_domicilio" => true,
            "responsable_apellido" => true,
            "responsable_nombre" => true,
            "responsable_dni" => true,
            "responsable_matricula" => true,
            "responsable_titulo" => true,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => true,
            "boton_salta" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => true,

            "tipo" => true,
            "representante_legal_apellido" => true,
            "representante_legal_nombre" => true,
            "representante_legal_dni" => true,
            "representante_legal_email" => true,
            "representante_legal_cargo" => true,
            "telefono" => true,
            "nacionalidad" => true,
            "representante_legal_domicilio" => true,
            "responsable_apellido" => true,
            "responsable_nombre" => true,
            "responsable_dni" => true,
            "responsable_matricula" => true,
            "responsable_titulo" => true,
            
            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => true,
            "boton_salta" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];
        $mostrar[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => true,

            "tipo" => true,
            "representante_legal_apellido" => true,
            "representante_legal_nombre" => true,
            "representante_legal_dni" => true,
            "representante_legal_email" => true,
            "representante_legal_cargo" => true,
            "telefono" => true,
            "nacionalidad" => true,
            "representante_legal_domicilio" => true,
            "responsable_apellido" => true,
            "responsable_nombre" => true,
            "responsable_dni" => true,
            "responsable_matricula" => true,
            "responsable_titulo" => true,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => true,
            "boton_salta" => true,
            "estado" => true,
            "boton_actualizar" => true,
        ];

        # EDITAR
        $disables[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,

            "tipo" => false,
            "representante_legal_apellido" => false,
            "representante_legal_nombre" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "telefono" => false,
            "nacionalidad" => false,
            "representante_legal_domicilio" => false,
            "responsable_apellido" => false,
            "responsable_nombre" => false,
            "responsable_dni" => false,
            "responsable_matricula" => false,
            "responsable_titulo" => false,

            "tipo_correcto" => false,
            "representante_legal_apellido_correcto" => false,
            "representante_legal_nombre_correcto" => false,
            "representante_legal_dni_correcto" => false,
            "representante_legal_email_correcto" => false,
            "representante_legal_cargo_correcto" => false,
            "telefono_correcto" => false,
            "nacionalidad_correcto" => false,
            "representante_legal_domicilio_correcto" => false,
            "responsable_apellido_correcto" => false,
            "responsable_nombre_correcto" => false,
            "responsable_dni_correcto" => false,
            "responsable_matricula_correcto" => false,
            "responsable_titulo_correcto" => false,

            "paso_salta" => false,
            "boton_salta" => false,
            "estado" => false,
            "boton_actualizar" => false,
        ];
        $disables[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [];
        $disables[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Productor']['editar']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [];
        
        # EDITAR - EN REVISION
        $disables[10]['Productor']['editar']['en revision']['altaProdMinero'] = [];
        $disables[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [];
        $disables[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [];
        $mostrar[10]['Productor']['editar']['en revision']['altaProdMinero'] = [];
        $mostrar[10]['Autoridad']['editar']['en revision']['altaProdMinero'] = [];
        $mostrar[10]['Administrador']['editar']['en revision']['altaProdMinero'] = [];

        # Ver
        $disables[10]['Productor']['ver']['borrador']['altaProdMinero'] = [];
        $disables[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [];
        $disables[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Productor']['ver']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Autoridad']['ver']['borrador']['altaProdMinero'] = [];
        $mostrar[10]['Administrador']['ver']['borrador']['altaProdMinero'] = [];

        # Ver - Aprobado
        $disables[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [];
        $disables[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [];
        $disables[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Productor']['ver']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Autoridad']['ver']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Administrador']['ver']['aprobado']['altaProdMinero'] = [];

        # EDITAR - Aprobado
        $disables[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [];
        $disables[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [];
        $disables[10]['Administrador']['editar']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Productor']['editar']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Autoridad']['editar']['aprobado']['altaProdMinero'] = [];
        $mostrar[10]['Administrador']['editar']['aprobado']['altaProdMinero'] = [];

        return response()->json([
            'status' => 'ok',
            'msg' => 'se encontro correctamente',
            'disables' => $disables[10][$rol][$accion][$estado]['altaProdMinero'],
            'mostrar' => $mostrar[10][$rol][$accion][$estado]['altaProdMinero']
        ], 201);

    }
}
