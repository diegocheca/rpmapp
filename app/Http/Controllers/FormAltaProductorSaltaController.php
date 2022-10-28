<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use Auth;
use Exception;
use App\Http\Requests\StoreFormAltaProductorSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorSaltaRequest;
use Illuminate\Http\Request;

use Faker\Factory as Faker;

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
    
    public function datos_faker(){
        $faker = Faker::create();
        //$tipos = ["tipo 1", tipo]
        $formulario = new FormAltaProductorSalta();
        $form = FormAltaProductor::all()->random(1)->first();
        $formulario->id_formulario_alta= $form->id ;
        $formulario->tipo = $faker->numberBetween(1,3);
        $formulario->representante_legal_nombre= $faker->firstNameFemale();
        $formulario->representante_legal_apellido= $faker->lastName();
        $formulario->representante_legal_dni=  $faker->numberBetween(48484,9999999);
        $formulario->representante_legal_email= $faker->email();
        $formulario->representante_legal_cargo= $faker->jobTitle();
        $formulario->representante_legal_domicilio= $faker->streetAddress();
        $formulario->nacionalidad= "Argentina";
        $formulario->telefono= $faker->phoneNumber();
        $formulario->superficie_mina= $faker->numberBetween(48484,9999999);
        $formulario->volumenes_de_extraccion_periodo_anterior=  $faker->numberBetween(48484,9999999);
        $formulario->n_resolucion_iia=  $faker->numberBetween(48484,9999999);
        $formulario->etapa_de_exploracion= "avanzada";
        $formulario->n_resolucion_aprobacion_informe=  $faker->numberBetween(48484,9999999);
        $formulario->etapa_de_exploracion_avanzada= "etapa avanzada";
        $formulario->volumenes_anuales_de_materias_primas=  $faker->numberBetween(48484,9999999);
        $formulario->material_obtenido=  $faker->numberBetween(48484,9999999);
        $formulario->autorizacion_extractivas_exploratorias=  $faker->numberBetween(48484,9999999);
        $formulario->responsable_nombre= $faker->firstNameFemale();
        $formulario->responsable_apellido= $faker->lastName();
        $formulario->responsable_dni=  $faker->numberBetween(48484,9999999);
        $formulario->responsable_titulo= $faker->jobTitle();
        $formulario->responsable_matricula=  $faker->numberBetween(484,999);
        $formulario->ley_24196_numero= $faker->boolean();
        $formulario->ley_24196_inscripcion_renar=  $faker->sentence($nbWords = 6, $variableNbWords = true);
        $formulario->ley_24196_explosivos= "";
        $formulario->ley_24196_propiedad= "";
        $formulario->estado_contable= "";
        $formulario->listado_de_maquinaria= "";
        $formulario->regalias= "";

        $formulario->personas_afectadas= $faker->numberBetween(4,99);
        $formulario->multas= "";
        $formulario->created_by= 1;
        $formulario->updated_by= 1;
        return response()->json([
            'status' => 'ok',
            'msg' => 'datos creados',
            'data' => $formulario
        ], 201); 

    }
    public function traer_permisos_pagina_salta($id, $accion)
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
        $mostrar[10]['Productor']['editar']['borrador']['altaProdMinero'] = [
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
        $mostrar[10]['Autoridad']['editar']['borrador']['altaProdMinero'] = [
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
        $mostrar[10]['Administrador']['editar']['borrador']['altaProdMinero'] = [
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
    
    public function look_up(Request $request)
    {
        //
        //dd($request->all());
        $data =  FormAltaProductorSalta::select('*')->where("id_formulario_alta","=",$request->id_form_alta)->first();
        //$data
       // dd($request->id_form_alta,$data);
        if($data != null){
            return response()->json([
                'status' => 'ok',
                'msg' => 'formulario encontrado',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'error al guardar en la base de datos',
                'data' => '',
            ], 200);
        }

        
    }
    public function buscar_permisos_formulario($id, $accion)
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


            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,
        ];
        $disables[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,

        ];
        $disables[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,

        ];
        $mostrar[10]['Productor']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,
        ];
        $mostrar[10]['Autoridad']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,
        ];
        $mostrar[10]['Administrador']['crear']['borrador']['altaProdMinero'] = [
            "id_formulario_alta" => false,
            "tipo" => false,
            "representante_legal_nombre" => false,
            "representante_legal_apellido" => false,
            "representante_legal_dni" => false,
            "representante_legal_email" => false,
            "representante_legal_cargo" => false,
            "representante_legal_domicilio" => false,
            "nacionalidad" => false,
            "telefono" => false,
            "superficie_mina" => false,
            "volumenes_de_extraccion_periodo_anterior" => false,
            "n_resolucion_iia" => false,
            "etapa_de_exploracion" => false,
            "n_resolucion_aprobacion_informe" => false,
            "etapa_de_exploracion_avanzada" => false,
            "volumenes_anuales_de_materias_primas" => false,
            "material_obtenido" => false,
            "autorizacion_extractivas_exploratorias" => false,
            "responsable_nombre" => false,
            "responsable_apellido" => false,
            "responsable_dni" => false,
            "responsable_titulo" => false,
            "responsable_matricula" => false,
            "ley_24196_numero" => false,
            "ley_24196_inscripcion_renar" => false,
            "ley_24196_explosivos" => false,
            "ley_24196_propiedad" => false,
            "estado_contable" => false,
            "listado_de_maquinaria" => false,
            "regalias" => false,
            "personas_afectadas" => false,
            "multas" => false,
            "created_by" => false,
            "updated_by" => false,

            "paso_salta" => false,
            "boton_salta" => false,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormAltaProductorSaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request["id_formulario_alta"]);
        if($request["id_formulario_alta"] > 0){

            $formulario = FormAltaProductor::find($request["id_formulario_alta"]);
            if($formulario==null){
                return false;
            }
            //$request->form["id_usuario"] = Auth::user()->id;
            //$request->form["id_formulario_alta"] = $request["id_formulario_alta"];
            $resultado = FormAltaProductorSalta::crear_formulario_salta_all($request->form,$request["id_formulario_alta"]);
            return response()->json([
                'status' => 'ok',
                'msg' => 'datos creados',
                'data' => $resultado
            ], 201); 
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
    public function update(Request $request)
    {
        //
        
        $form_salta_to_update  = FormAltaProductorSalta::find($request["form"]["id"]);
        //dd($form_salta_to_update);
        $result = $form_salta_to_update->update_form($request["form"]);
        return response()->json([
            'status' => 'ok',
            'msg' => 'datos creados',
            'data' => $result
        ], 201); 
    }
}
