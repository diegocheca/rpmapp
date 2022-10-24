<?php

namespace App\Http\Controllers;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorSalta;
use App\Http\Requests\StoreFormAltaProductorSaltaRequest;
use App\Http\Requests\UpdateFormAltaProductorSaltaRequest;
use Illuminate\Http\Request;
use Auth;

class FormAltaProductorSaltaController extends Controller
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
     * @param  \App\Http\Requests\StoreFormAltaProductorSaltaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->form["id_formulario_alta"] > 0){

            $formulario = FormAltaProductor::find($request->form["id_formulario_alta"]);
            if($formulario==null){
                return false;
            }
            //$request->form["id_usuario"] = Auth::user()->id;
            $resultado = FormAltaProductorSalta::crear_formulario_salta_all($request->form);

            return $resultado;
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
    
    public function look_up(Request $request)
    {
        //
        $data =  FormAltaProductorSalta::select('*')->where("id_formulario_alta","=",$request->id)->first();
        if($data != null){
            return response()->json([
                'status' => 'ok',
                'msg' => 'formulario encontrado',
                'datos' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'msg' => 'error al guardar en la base de datos',
                'datos' => '',
            ], 200);
        }

        
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
    public function update(UpdateFormAltaProductorSaltaRequest $request, FormAltaProductorSalta $formAltaProductorSalta)
    {
        //
        $form_salta  = FormAltaProductorSalta::find($formAltaProductorSalta->id);
        $result = $form_salta->update_form($formAltaProductorSalta);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProductorSalta  $formAltaProductorSalta
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProductorSalta $formAltaProductorSalta)
    {
        //
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
}
