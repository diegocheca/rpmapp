<?php

namespace App\Http\Controllers\Mendoza;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \PDF;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorMendoza;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;



class ComprobanteProductorMendozaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
		$puedo_imprimir = false;
		if (Auth::user()->hasRole('Administrador'))
        {
            $puedo_imprimir = true;
            $borrador = FormAltaProductor::find($id);
        }
		if ( Auth::user()->hasRole('Autoridad') && Auth::user()->id_provincia == 50)
        {
			$borrador =  DB::table('form_alta_productores')
            ->select('form_alta_productoresMendoza.id as idMend',
			'form_alta_productoresMendoza.decreto3737 as decreto3737',
			'form_alta_productoresMendoza.obs_decreto3737 as obs_decreto3737', 
			'form_alta_productoresMendoza.decreto3737_correcto as decreto3737_correcto',
			'form_alta_productoresMendoza.situacion_mina as situacion_mina',
			'form_alta_productoresMendoza.situacion_mina_correcto as situacion_mina_correcto',
			'form_alta_productoresMendoza.obs_situacion_mina as obs_situacion_mina',

			'form_alta_productoresMendoza.concesion_minera_asiento_n as concesion_minera_asiento_n',
			'form_alta_productoresMendoza.concesion_minera_fojas as concesion_minera_fojas',
			'form_alta_productoresMendoza.concesion_minera_tomo_n as concesion_minera_tomo_n',
			'form_alta_productoresMendoza.concesion_minera_reg_m_y_d as concesion_minera_reg_m_y_d',

			'form_alta_productoresMendoza.concesion_minera_reg_cant as concesion_minera_reg_cant',
			'form_alta_productoresMendoza.concesion_minera_reg_men as concesion_minera_reg_men',
			'form_alta_productoresMendoza.concesion_minera_reg_d_y_c as concesion_minera_reg_d_y_c',
			'form_alta_productoresMendoza.obs_datos_minas as obs_datos_minas',

			'form_alta_productores.*')
            ->where('form_alta_productores.id', '=', $id)
            ->join('form_alta_productoresMendoza', 'form_alta_productores.id', '=', 'form_alta_productoresMendoza.id_formulario_alta')
            ->first();
            $puedo_imprimir = true;
        }
		if ( Auth::user()->hasRole('Productor') && Auth::user()->id_provincia == 50)
        {
            $borrador =  DB::table('form_alta_productores')
            ->select('*')
            ->where('form_alta_productores.id', '=', $id)
            ->join('form_alta_productoresMendoza', 'form_alta_productores.id', '=', 'form_alta_productoresMendoza.id_formulario_alta')
            ->first();
            $puedo_imprimir = true;
        }
		if ($borrador != null && $puedo_imprimir) {
			$data = [
				'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
				'date_generado' => date('d/m/Y'),
				//1
				'id' => $borrador->id,
				'razon_social' =>  $borrador->razonsocial,
				'ciut' =>  $borrador->cuit,
				'numeroproductor' => $borrador->numeroproductor,
				'tiposociedad' => $borrador->tiposociedad,
				'email' => $borrador->email,
				'inscripciondgr' => $borrador->inscripciondgr,
				'constaciasociedad' => $borrador->constaciasociedad,

				//2
				'leal_calle' => $borrador->leal_calle,
				'leal_numero' => $borrador->leal_numero,
				'leal_telefono' => $borrador->leal_telefono,
				'leal_pais' => $borrador->leal_pais,
				'leal_provincia' => $borrador->leal_provincia,
				'leal_departamento' => $borrador->leal_departamento,
				'leal_localidad' => $borrador->leal_localidad,
				'leal_cp' => $borrador->leal_cp,
				'leal_otro' => $borrador->leal_otro,

				//3
				'administracion_calle' => $borrador->administracion_calle,
				'administracion_numero' => $borrador->administracion_numero,
				'administracion_telefono' => $borrador->administracion_telefono,
				'administracion_pais' => $borrador->administracion_pais,
				'administracion_provincia' => $borrador->administracion_provincia,
				'administracion_departamento' => $borrador->administracion_departamento,
				'administracion_localidad' => $borrador->administracion_localidad,
				'administracion_cp' => $borrador->administracion_cp,
				'administracion_otro' => $borrador->administracion_otro,

				//4
				'mina_cantera' => $borrador->mina_cantera,
				'numero_expdiente' => $borrador->numero_expdiente,
				'distrito_minero' => $borrador->distrito_minero,
				'descripcion_mina' => $borrador->descripcion_mina,
				'nombre_mina' => $borrador->nombre_mina,
				'categoria' => $borrador->categoria,
				'minerales_variedad' => $borrador->minerales_variedad,

				//5
				'owner' => $borrador->owner,
				'arrendatario' => $borrador->arrendatario,
				'concesionario' => $borrador->concesionario,
				'otros' => $borrador->otros,
				'acciones_a_desarrollar' => $borrador->acciones_a_desarrollar,
				'actividad' => $borrador->actividad,
				'fecha_alta_dia' => $borrador->fecha_alta_dia,
				'fecha_vencimiento_dia' => $borrador->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $borrador->localidad_mina_pais,
				'localidad_mina_provincia' => $borrador->localidad_mina_provincia,
				'localidad_mina_departamento' => $borrador->localidad_mina_departamento,
				'localidad_mina_localidad' => $borrador->localidad_mina_localidad,
				'tipo_sistema' => $borrador->tipo_sistema,
				'latitud' => $borrador->latitud,
				'longitud' => $borrador->longitud,

				//7
				'updated_at' => $borrador->updated_at,
			];
			
            $data ['title'] = 'COMPROBANTE DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES DE LA PROVINCIA DE MENDOZA';
            $pdf = PDF::loadView('pdfs.Mendoza.formulario_inscripcion_productor_mdz', $data);
			return $pdf->stream('Comprobante_de_inscripcion.pdf');
		}
		else 
			return response()->json([
				'status' => 'mal',
				'msg' => 'sin permisos'
			], 201);
    }
}
