<?php

namespace App\Http\Controllers\SantiagoDelEstero;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \PDF;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorMendoza;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;



class PresentacionAltaProdSantiagoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
		$puedo_imprimir = false;
		if (Auth::user()->hasRole('Administrador'))
        {
            $puedo_imprimir = true;
            $borrador = FormAltaProductor::find($id);
        }
		if ( ( Auth::user()->hasRole('Autoridad') ||  Auth::user()->hasRole('Productor') ) 
        && intval(Auth::user()->id_provincia)  == 86) //soy de Santiago del Estero
        {
			$borrador = FormAltaProductor::select('*')
            ->where('id', '=',$id)
            ->where('provincia', '=',86)
            ->first();
            $puedo_imprimir = true;
        }
		// dd($borrador);
		if ($borrador != null && $puedo_imprimir) {
			$data = [
				'title' => 'REGISTRO PROVINCIAL DE PRODUCTORES MINEROS',
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
			
            $data ['title'] = 'REGISTRO PROVINCIAL DE PRODUCTORES MINEROS';
            $pdf = PDF::loadView('pdfs.SantiagoDelEstero.comprobante_inicio_tramite', $data);
			return $pdf->stream('Comprobante_de_inscripcion.pdf');
		}
		else 
			return response()->json([
				'status' => 'mal',
				'msg' => 'sin permisos'
			], 201);
    }
}
