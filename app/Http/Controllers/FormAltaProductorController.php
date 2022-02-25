<?php

namespace App\Http\Controllers;

use Exception;
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

use Faker\Factory as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


use \PDF;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;

class FormAltaProductorController extends Controller
{

	public $tipo_productor;
	public $cuit;
	public $cuit_correcto;
	public $obs_cuit;
	public $razonsocial;
	public $razon_social_correcto;
	public $obs_razon_social;
	public $numeroproductor;
	public $numeroproductor_correcto;
	public $obs_numeroproductor;
	public $email;
	public $email_correcto;
	public $obs_email;
	public $tiposociedad;
	public $tiposociedad_correcto;
	public $obs_tiposociedad;
	public $inscripciondgr;
	public $inscripciondgr_correcto;
	public $obs_inscripciondgr;
	public $constaciasociedad;
	public $constaciasociedad_correcto;
	public $obs_constaciasociedad;
	public $paso_1_progreso;
	public $paso_1_aprobado;
	public $paso_1_reprobado;
	public $leal_calle;
	public $leal_numero;
	public $leal_telefono;
	public $leal_pais;
	public $leal_provincia;
	public $leal_departamento;
	public $leal_localidad;
	public $leal_cp;
	public $leal_otro;
	public $administracion_calle;
	public $administracion_numero;
	public $administracion_telefono;
	public $administracion_pais;
	public $administracion_provincia;
	public $administracion_departamento;
	public $administracion_localidad;
	public $administracion_cp;
	public $administracion_otro;
	public $numero_expdiente;
	public $categoria;
	public $nombre_mina;
	public $descripcion_mina;
	public $distrito_minero;
	public $mina_cantera;
	public $plano_inmueble;
	public $minerales_variedad;
	public $owner;
	public $arrendatario;
	public $concesionario;
	public $otros;
	public $titulo_contrato_posecion;
	public $resolucion_concesion_minera;
	public $constancia_pago_canon;
	public $iia;
	public $dia;
	public $acciones_a_desarrollar;
	public $actividad;
	public $fecha_alta_dia;
	public $fecha_vencimiento_dia;
	public $localidad_mina_pais;
	public $localidad_mina_provincia;
	public $localidad_mina_departamento;
	public $localidad_mina_localidad;
	public $tipo_sistema;
	public $longitud;
	public $latitud;
	public $created_by;
	public $estado;
	public $tipo_tramite;
	public $updated_by;
	public $updated_paso_uno;
	public $updated_paso_dos;
	public $leal_calle_correcto;
	public $obs_leal_calle;
	public $leal_numero_correcto;
	public $obs_leal_numero;
	public $leal_telefono_correcto;
	public $obs_leal_telefono;
	public $leal_provincia_correcto;
	public $obs_leal_provincia;
	public $leal_departamento_correcto;
	public $obs_leal_departamento;
	public $leal_localidad_correcto;
	public $obs_leal_localidad;
	public $leal_cp_correcto;
	public $obs_leal_cp;
	public $leal_otro_correcto;
	public $obs_leal_otro;
	public $paso_2_progreso;
	public $paso_2_aprobado;
	public $paso_2_reprobado;
	public $administracion_calle_correcto;
	public $obs_administracion_calle;
	public $administracion_numero_correcto;
	public $obs_administracion_numero;
	public $administracion_telefono_correcto;
	public $obs_administracion_telefono;
	public $administracion_provincia_correcto;
	public $obs_administracion_provincia;
	public $administracion_departamento_correcto;
	public $obs_administracion_departamento;
	public $administracion_localidad_correcto;
	public $obs_administracion_localidad;
	public $administracion_cp_correcto;
	public $obs_administracion_cp;
	public $administracion_otro_correcto;
	public $obs_administracion_otro;
	public $paso_3_progreso;
	public $paso_3_aprobado;
	public $paso_3_reprobado;
	public $numero_expdiente_correcto;
	public $obs_numero_expdiente;
	public $categoria_correcto;
	public $obs_categoria;
	public $nombre_mina_correcto;
	public $obs_nombre_mina;
	public $descripcion_mina_correcto;
	public $obs_descripcion_mina;
	public $obs_distrito_minero;
	public $distrito_minero_correcto;
	public $mina_cantera_correcto;
	public $obs_mina_cantera;
	public $plano_inmueble_correcto;
	public $obs_plano_inmueble;
	public $obs_resolucion_concesion_minera;
	public $resolucion_concesion_minera_correcto;
	public $titulo_contrato_posecion_correcto;
	public $obs_titulo_contrato_posecion;
	public $paso_4_progreso;
	public $paso_4_aprobado;
	public $paso_4_reprobado;
	public $updated_paso_cuatro;
	public $updated_paso_tres;
	public $otro_caracter_acalaracion;
	public $concesion_minera_acalracion;
	public $owner_correcto;
	public $obs_owner;
	public $arrendatario_correcto;
	public $obs_arrendatario;
	public $concesionario_correcto;
	public $obs_concesionario;
	public $otros_correcto;
	public $obs_otros;
	public $sustancias_de_aprovechamiento_comun;
	public $sustancias_de_aprovechamiento_comun_correcto;
	public $obs_sustancias_de_aprovechamiento_comun_correcto;

	public $constancia_pago_canon_correcto;
	public $obs_constancia_pago_canon;
	public $iia_correcto;
	public $obs_iia;
	public $dia_correcto;
	public $obs_dia;
	public $acciones_a_desarrollar_correcto;
	public $obs_acciones_a_desarrollar;
	public $actividad_correcto;
	public $obs_actividad;
	public $fecha_alta_dia_correcto;
	public $obs_fecha_alta_dia;
	public $paso_5_progreso;
	public $paso_5_aprobado;
	public $paso_5_reprobado;
	public $fecha_vencimiento_dia_correcto;
	public $obs_fecha_vencimiento_dia;
	public $updated_paso_cinco;

	public $localidad_mina_provincia_correcto;
	public $obs_localidad_mina_provincia;
	public $localidad_mina_departamento_correcto;
	public $obs_localidad_mina_departamento;
	public $localidad_mina_localidad_correcto;
	public $obs_localidad_mina_localidad;
	public $tipo_sistema_correcto;
	public $obs_tipo_sistema;
	public $longitud_correcto;
	public $obs_longitud;
	public $latitud_correcto;
	public $obs_latitud;
	public $paso_6_progreso;
	public $paso_6_aprobado;
	public $paso_6_reprobado;
	public $updated_paso_seis;

	public function __construct(
		$id = null,
		$tipo_productor = null,
		$cuit = null,
		$cuit_correcto = null,
		$obs_cuit = null,
		$razonsocial = null,
		$razon_social_correcto = null,
		$obs_razon_social = null,
		$numeroproductor = null,
		$numeroproductor_correcto = null,
		$obs_numeroproductor = null,
		$email = null,
		$email_correcto = null,
		$obs_email = null,
		$tiposociedad = null,
		$tiposociedad_correcto = null,
		$obs_tiposociedad = null,
		$inscripciondgr = null,
		$inscripciondgr_correcto = null,
		$obs_inscripciondgr = null,
		$constaciasociedad = null,
		$constaciasociedad_correcto = null,
		$obs_constaciasociedad = null,
		$paso_1_progreso = null,
		$paso_1_aprobado = null,
		$paso_1_reprobado = null,
		$leal_calle = null,
		$leal_numero = null,
		$leal_telefono = null,
		$leal_pais = null,
		$leal_provincia = null,
		$leal_departamento = null,
		$leal_localidad = null,
		$leal_cp = null,
		$leal_otro = null,
		$administracion_calle = null,
		$administracion_numero = null,
		$administracion_telefono = null,
		$administracion_pais = null,
		$administracion_provincia = null,
		$administracion_departamento = null,
		$administracion_localidad = null,
		$administracion_cp = null,
		$administracion_otro = null,
		$numero_expdiente = null,
		$categoria = null,
		$nombre_mina = null,
		$descripcion_mina = null,
		$distrito_minero = null,
		$mina_cantera = null,
		$plano_inmueble = null,
		$minerales_variedad = null,
		$owner = null,
		$arrendatario = null,
		$concesionario = null,
		$otros = null,
		$titulo_contrato_posecion = null,
		$resolucion_concesion_minera = null,
		$constancia_pago_canon = null,
		$iia = null,
		$dia = null,
		$acciones_a_desarrollar = null,
		$actividad = null,
		$fecha_alta_dia = null,
		$fecha_vencimiento_dia = null,
		$localidad_mina_pais = null,
		$localidad_mina_provincia = null,
		$localidad_mina_departamento = null,
		$localidad_mina_localidad = null,
		$tipo_sistema = null,
		$longitud = null,
		$latitud = null,
		$created_by = null,
		$estado = null,
		$tipo_tramite = null,
		$updated_by = null,
		$updated_paso_uno = null,
		$updated_paso_dos = null,
		$leal_calle_correcto = null,
		$obs_leal_calle = null,
		$leal_numero_correcto = null,
		$obs_leal_numero = null,
		$leal_telefono_correcto = null,
		$obs_leal_telefono = null,
		$leal_provincia_correcto = null,
		$obs_leal_provincia = null,
		$leal_departamento_correcto = null,
		$obs_leal_departamento = null,
		$leal_localidad_correcto = null,
		$obs_leal_localidad = null,
		$leal_cp_correcto = null,
		$obs_leal_cp = null,
		$leal_otro_correcto = null,
		$obs_leal_otro = null,
		$paso_2_progreso = null,
		$paso_2_aprobado = null,
		$paso_2_reprobado = null,
		$administracion_calle_correcto = null,
		$obs_administracion_calle = null,
		$administracion_numero_correcto = null,
		$obs_administracion_numero = null,
		$administracion_telefono_correcto = null,
		$obs_administracion_telefono = null,
		$administracion_provincia_correcto = null,
		$obs_administracion_provincia = null,
		$administracion_departamento_correcto = null,
		$obs_administracion_departamento = null,
		$administracion_localidad_correcto = null,
		$obs_administracion_localidad = null,
		$administracion_cp_correcto = null,
		$obs_administracion_cp = null,
		$administracion_otro_correcto = null,
		$obs_administracion_otro = null,
		$paso_3_progreso = null,
		$paso_3_aprobado = null,
		$paso_3_reprobado = null,
		$numero_expdiente_correcto = null,
		$obs_numero_expdiente = null,
		$categoria_correcto = null,
		$obs_categoria = null,
		$nombre_mina_correcto = null,
		$obs_nombre_mina = null,
		$descripcion_mina_correcto = null,
		$obs_descripcion_mina = null,
		$obs_distrito_minero = null,
		$distrito_minero_correcto = null,
		$mina_cantera_correcto = null,
		$obs_mina_cantera = null,
		$plano_inmueble_correcto = null,
		$obs_plano_inmueble = null,
		$obs_resolucion_concesion_minera = null,
		$resolucion_concesion_minera_correcto = null,
		$titulo_contrato_posecion_correcto = null,
		$obs_titulo_contrato_posecion = null,
		$paso_4_progreso = null,
		$paso_4_aprobado = null,
		$paso_4_reprobado = null,
		$updated_paso_cuatro = null,
		$updated_paso_tres = null,
		$otro_caracter_acalaracion = null,
		$concesion_minera_acalracion = null,
		$owner_correcto = null,
		$obs_owner = null,
		$arrendatario_correcto = null,
		$obs_arrendatario = null,
		$concesionario_correcto = null,
		$obs_concesionario = null,
		$otros_correcto = null,
		$obs_otros = null,
		$sustancias_de_aprovechamiento_comun = null,
		$sustancias_de_aprovechamiento_comun_correcto = null,
		$obs_sustancias_de_aprovechamiento_comun_correcto = null,
		$constancia_pago_canon_correcto = null,
		$obs_constancia_pago_canon = null,
		$iia_correcto = null,
		$obs_iia = null,
		$dia_correcto = null,
		$obs_dia = null,
		$acciones_a_desarrollar_correcto = null,
		$obs_acciones_a_desarrollar = null,
		$actividad_correcto = null,
		$obs_actividad = null,
		$fecha_alta_dia_correcto = null,
		$obs_fecha_alta_dia = null,
		$paso_5_progreso = null,
		$paso_5_aprobado = null,
		$paso_5_reprobado = null,
		$fecha_vencimiento_dia_correcto = null,
		$obs_fecha_vencimiento_dia = null,
		$updated_paso_cinco = null,
		$localidad_mina_provincia_correcto = null,
		$obs_localidad_mina_provincia = null,
		$localidad_mina_departamento_correcto = null,
		$obs_localidad_mina_departamento = null,
		$localidad_mina_localidad_correcto = null,
		$obs_localidad_mina_localidad = null,
		$tipo_sistema_correcto = null,
		$obs_tipo_sistema = null,
		$longitud_correcto = null,
		$obs_longitud = null,
		$latitud_correcto = null,
		$obs_latitud = null,
		$paso_6_progreso = null,
		$paso_6_aprobado = null,
		$paso_6_reprobado = null,
		$updated_paso_seis = null
	) {
		if ($id == null) {
			$this->id = null;
			$this->tipo_productor = null;
			$this->cuit = null;
			$this->cuit_correcto = null;
			$this->obs_cuit = null;
			$this->razonsocial = null;
			$this->razon_social_correcto = null;
			$this->obs_razon_social = null;
			$this->numeroproductor = null;
			$this->numeroproductor_correcto = null;
			$this->obs_numeroproductor = null;
			$this->email = null;
			$this->email_correcto = null;
			$this->obs_email = null;
			$this->tiposociedad = null;
			$this->tiposociedad_correcto = null;
			$this->obs_tiposociedad = null;
			$this->inscripciondgr = null;
			$this->inscripciondgr_correcto = null;
			$this->obs_inscripciondgr = null;
			$this->constaciasociedad = null;
			$this->constaciasociedad_correcto = null;
			$this->obs_constaciasociedad = null;
			$this->paso_1_progreso = null;
			$this->paso_1_aprobado = null;
			$this->paso_1_reprobado = null;
			$this->leal_calle = null;
			$this->leal_numero = null;
			$this->leal_telefono = null;
			$this->leal_pais = null;
			$this->leal_provincia = null;
			$this->leal_departamento = null;
			$this->leal_localidad = null;
			$this->leal_cp = null;
			$this->leal_otro = null;
			$this->administracion_calle = null;
			$this->administracion_numero = null;
			$this->administracion_telefono = null;
			$this->administracion_pais = null;
			$this->administracion_provincia = null;
			$this->administracion_departamento = null;
			$this->administracion_localidad = null;
			$this->administracion_cp = null;
			$this->administracion_otro = null;
			$this->numero_expdiente = null;
			$this->categoria = null;
			$this->nombre_mina = null;
			$this->descripcion_mina = null;
			$this->distrito_minero = null;
			$this->mina_cantera = null;
			$this->plano_inmueble = null;
			$this->minerales_variedad = null;
			$this->owner = null;
			$this->arrendatario = null;
			$this->concesionario = null;
			$this->otros = null;
			$this->titulo_contrato_posecion = null;
			$this->resolucion_concesion_minera = null;
			$this->constancia_pago_canon = null;
			$this->iia = null;
			$this->dia = null;
			$this->acciones_a_desarrollar = null;
			$this->actividad = null;
			$this->fecha_alta_dia = null;
			$this->fecha_vencimiento_dia = null;
			$this->localidad_mina_pais = null;
			$this->localidad_mina_provincia = null;
			$this->localidad_mina_departamento = null;
			$this->localidad_mina_localidad = null;
			$this->tipo_sistema = null;
			$this->longitud = null;
			$this->latitud = null;
			$this->created_by = null;
			$this->estado = null;
			$this->tipo_tramite = null;
			$this->updated_by = null;
			$this->created_by = null;
			$this->created_by = null;
			$this->updated_by = null;
			$this->updated_paso_uno = null;
			$this->updated_paso_dos = null;
			$this->leal_calle_correcto = null;
			$this->obs_leal_calle = null;
			$this->leal_numero_correcto = null;
			$this->obs_leal_numero = null;
			$this->leal_telefono_correcto = null;
			$this->obs_leal_telefono = null;
			$this->leal_provincia_correcto = null;
			$this->obs_leal_provincia = null;
			$this->leal_departamento_correcto = null;
			$this->obs_leal_departamento = null;
			$this->leal_localidad_correcto = null;
			$this->obs_leal_localidad = null;
			$this->leal_cp_correcto = null;
			$this->obs_leal_cp = null;
			$this->leal_otro_correcto = null;
			$this->obs_leal_otro = null;
			$this->paso_2_progreso = null;
			$this->paso_2_aprobado = null;
			$this->paso_2_reprobado = null;
			$this->administracion_calle_correcto = null;
			$this->obs_administracion_calle = null;
			$this->administracion_numero_correcto = null;
			$this->obs_administracion_numero = null;
			$this->administracion_telefono_correcto = null;
			$this->obs_administracion_telefono = null;
			$this->administracion_provincia_correcto = null;
			$this->obs_administracion_provincia = null;
			$this->administracion_departamento_correcto = null;
			$this->obs_administracion_departamento = null;
			$this->administracion_localidad_correcto = null;
			$this->obs_administracion_localidad = null;
			$this->administracion_cp_correcto = null;
			$this->obs_administracion_cp = null;
			$this->administracion_otro_correcto = null;
			$this->obs_administracion_otro = null;
			$this->paso_3_progreso = null;
			$this->paso_3_aprobado = null;
			$this->paso_3_reprobado = null;
			$this->numero_expdiente_correcto = null;
			$this->obs_numero_expdiente = null;
			$this->categoria_correcto = null;
			$this->obs_categoria = null;
			$this->nombre_mina_correcto = null;
			$this->obs_nombre_mina = null;
			$this->descripcion_mina_correcto = null;
			$this->obs_descripcion_mina = null;
			$this->obs_distrito_minero = null;
			$this->distrito_minero_correcto = null;
			$this->mina_cantera_correcto = null;
			$this->obs_mina_cantera = null;
			$this->plano_inmueble_correcto = null;
			$this->obs_plano_inmueble = null;
			$this->obs_resolucion_concesion_minera = null;
			$this->resolucion_concesion_minera_correcto = null;
			$this->titulo_contrato_posecion_correcto = null;
			$this->obs_titulo_contrato_posecion = null;
			$this->paso_4_progreso = null;
			$this->paso_4_aprobado = null;
			$this->paso_4_reprobado = null;
			$this->updated_paso_cuatro = null;
			$this->updated_paso_tres = null;
			$this->otro_caracter_acalaracion = null;
			$this->concesion_minera_acalracion = null;
			$this->concesion_minera_acalracion = null;
			$this->owner_correcto = null;
			$this->obs_owner = null;
			$this->arrendatario_correcto = null;
			$this->obs_arrendatario = null;
			$this->concesionario_correcto = null;
			$this->obs_concesionario = null;
			$this->otros_correcto = null;
			$this->obs_otros = 33;
			$this->sustancias_de_aprovechamiento_comun = null;
			$this->sustancias_de_aprovechamiento_comun_correcto = null;
			$this->obs_sustancias_de_aprovechamiento_comun_correcto = null;
			$this->constancia_pago_canon_correcto = null;
			$this->obs_constancia_pago_canon = null;
			$this->iia_correcto = null;
			$this->obs_iia = null;
			$this->dia_correcto = null;
			$this->obs_dia = null;
			$this->acciones_a_desarrollar_correcto = null;
			$this->obs_acciones_a_desarrollar = null;
			$this->actividad_correcto = null;
			$this->obs_actividad = null;
			$this->fecha_alta_dia_correcto = null;
			$this->obs_fecha_alta_dia = null;
			$this->paso_5_progreso = null;
			$this->paso_5_aprobado = null;
			$this->paso_5_reprobado = null;
			$this->fecha_vencimiento_dia_correcto = null;
			$this->obs_fecha_vencimiento_dia = null;
			$this->updated_paso_cinco = null;
			$this->localidad_mina_provincia_correcto = null;
			$this->obs_localidad_mina_provincia = null;
			$this->localidad_mina_departamento_correcto = null;
			$this->obs_localidad_mina_departamento = null;
			$this->localidad_mina_localidad_correcto = null;
			$this->obs_localidad_mina_localidad = null;
			$this->tipo_sistema_correcto = null;
			$this->obs_tipo_sistema = null;
			$this->longitud_correcto = null;
			$this->obs_longitud = null;
			$this->latitud_correcto = null;
			$this->obs_latitud = null;
			$this->paso_6_progreso = null;
			$this->paso_6_aprobado = null;
			$this->paso_6_reprobado = null;
			$this->updated_paso_seis = null;
		} else {
			//poner los datos del array en el objeto
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//filtro por autoridad minera o autoridad
		//pregunto si soy admin
		//dd(env('APP_URL'));die();
		$soy_administrador = false;
		$soy_autoridad = false;
		$soy_productor = false;
		$grafico_donut = [];
		$temp = '';
		if (Auth::user()->hasRole('Administrador')) {
			$soy_administrador = true;
			$borradores = FormAltaProductor::all();
			//calculo valores para los productores
			$temp = FormAltaProductor::select('id')->where('estado', '=', 'aprobado')->get();
			$grafico_donut["aprobados"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('estado', '=', 'reprobado')->get();
			$grafico_donut["reprobados"]  = count($temp);
			$temp = FormAltaProductor::select('id')->where('estado', '=', 'borrador')->get();
			$grafico_donut["borrador_cant"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('estado', '=', 'en revision')->get();
			$grafico_donut["revision"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('estado', '=', 'con observacion')->get();
			$grafico_donut["observacion"]  = count($temp);
			return Inertia::render('Productors/List', [
				'borradores' => FormAltaProductor::orderBy('id', 'DESC')->paginate(7),
				'lista_minerales_cargados' => null,
				'soy_autoridad' => $soy_autoridad,
				'soy_administrador' => $soy_administrador,
				'soy_productor' => $soy_productor,
				'datos_donut' => $grafico_donut
			]);
		} elseif (Auth::user()->hasRole('Autoridad')) {
			//soy autoridad minera, entonces traigo todo de mi prov
			$soy_autoridad = true;
			$borradores = FormAltaProductor::select('*')->where('provincia', '=', Auth::user()->id_provincia)->get();
			//calculo valores para los productores
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'aprobado')->get();
			$grafico_donut["aprobados"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'reprobado')->get();
			$grafico_donut["reprobados"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'borrador')->get();
			$grafico_donut["borrador_cant"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'en revision')->get();
			$grafico_donut["revision"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('estado', '=', 'con observacion')->get();
			$grafico_donut["observacion"] = count($temp);
			return Inertia::render('Productors/List', [
				'borradores' => FormAltaProductor::select('*')
					->where('provincia', '=', Auth::user()->id_provincia)
					->orderBy('id', 'DESC')
					->paginate(5),
				'lista_minerales_cargados' => null,
				'soy_autoridad' => $soy_autoridad,
				'soy_administrador' => $soy_administrador,
				'soy_productor' => $soy_productor,
				'datos_donut' => $grafico_donut,
			]);
		} else {
			//soy productor, entonces traigo solo mis borradores
			$soy_productor = true;
			$borradores = FormAltaProductor::select('*')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->get();
			//calculo valores para los productores
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->where('estado', '=', 'aprobado')->get();
			$grafico_donut["aprobados"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->where('estado', '=', 'reprobado')->get();
			$grafico_donut["reprobados"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->where('estado', '=', 'borrador')->get();
			$grafico_donut["borrador_cant"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->where('estado', '=', 'en revision')->get();
			$grafico_donut["revision"] = count($temp);
			$temp = FormAltaProductor::select('id')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id)->where('estado', '=', 'con observacion')->get();
			$grafico_donut["observacion"] = count($temp);
			return Inertia::render('Productors/List', [
				'borradores' => FormAltaProductor::select('*')
					->where('provincia', '=', Auth::user()->id_provincia)
					->where('created_by', '=', Auth::user()->id)
					->orderBy('id', 'DESC')
					->paginate(5),
				'lista_minerales_cargados' => null,
				'soy_autoridad' => $soy_autoridad,
				'soy_administrador' => $soy_administrador,
				'soy_productor' => $soy_productor,
				'datos_donut' => $grafico_donut
			]);
		}



		//var_dump($borradores);die();
		//var_dump($borradores);die();

	}

	public function dame_un_productor_vacio()
	{
		$productor_a_devolver = new FormAltaProductor();
		$productor_a_devolver->id = null;
		$productor_a_devolver->tipo_productor = null;
		$productor_a_devolver->cuit = null;
		$productor_a_devolver->cuit_correcto = null;
		$productor_a_devolver->obs_cuit = null;
		$productor_a_devolver->razonsocial = null;
		$productor_a_devolver->razon_social_correcto = null;
		$productor_a_devolver->obs_razon_social = null;
		$productor_a_devolver->numeroproductor = null;
		$productor_a_devolver->numeroproductor_correcto = null;
		$productor_a_devolver->obs_numeroproductor = null;
		$productor_a_devolver->email = null;
		$productor_a_devolver->email_correcto = null;
		$productor_a_devolver->obs_email = null;
		$productor_a_devolver->tiposociedad = null;
		$productor_a_devolver->tiposociedad_correcto = null;
		$productor_a_devolver->obs_tiposociedad = null;
		$productor_a_devolver->inscripciondgr = null;
		$productor_a_devolver->inscripciondgr_correcto = null;
		$productor_a_devolver->obs_inscripciondgr = null;
		$productor_a_devolver->constaciasociedad = null;
		$productor_a_devolver->constaciasociedad_correcto = null;
		$productor_a_devolver->obs_constaciasociedad = null;
		$productor_a_devolver->paso_1_progreso = null;
		$productor_a_devolver->paso_1_aprobado = null;
		$productor_a_devolver->paso_1_reprobado = null;
		$productor_a_devolver->leal_calle = null;
		$productor_a_devolver->leal_numero = null;
		$productor_a_devolver->leal_telefono = null;
		$productor_a_devolver->leal_pais = null;
		$productor_a_devolver->leal_provincia = null;
		$productor_a_devolver->leal_departamento = null;
		$productor_a_devolver->leal_localidad = null;
		$productor_a_devolver->leal_cp = null;
		$productor_a_devolver->leal_otro = null;
		$productor_a_devolver->administracion_calle = null;
		$productor_a_devolver->administracion_numero = null;
		$productor_a_devolver->administracion_telefono = null;
		$productor_a_devolver->administracion_pais = null;
		$productor_a_devolver->administracion_provincia = null;
		$productor_a_devolver->administracion_departamento = null;
		$productor_a_devolver->administracion_localidad = null;
		$productor_a_devolver->administracion_cp = null;
		$productor_a_devolver->administracion_otro = null;
		$productor_a_devolver->numero_expdiente = null;
		$productor_a_devolver->categoria = null;
		$productor_a_devolver->nombre_mina = null;
		$productor_a_devolver->descripcion_mina = null;
		$productor_a_devolver->distrito_minero = null;
		$productor_a_devolver->mina_cantera = null;
		$productor_a_devolver->plano_inmueble = null;
		$productor_a_devolver->minerales_variedad = null;
		$productor_a_devolver->owner = null;
		$productor_a_devolver->arrendatario = null;
		$productor_a_devolver->concesionario = null;
		$productor_a_devolver->otros = null;
		$productor_a_devolver->titulo_contrato_posecion = null;
		$productor_a_devolver->resolucion_concesion_minera = null;
		$productor_a_devolver->constancia_pago_canon = null;
		$productor_a_devolver->iia = null;
		$productor_a_devolver->dia = null;
		$productor_a_devolver->acciones_a_desarrollar = null;
		$productor_a_devolver->actividad = null;
		$productor_a_devolver->fecha_alta_dia = null;
		$productor_a_devolver->fecha_vencimiento_dia = null;
		$productor_a_devolver->localidad_mina_pais = null;
		$productor_a_devolver->localidad_mina_provincia = null;
		$productor_a_devolver->localidad_mina_departamento = null;
		$productor_a_devolver->localidad_mina_localidad = null;
		$productor_a_devolver->tipo_sistema = null;
		$productor_a_devolver->longitud = null;
		$productor_a_devolver->latitud = null;
		$productor_a_devolver->created_by = null;
		$productor_a_devolver->estado = null;
		$productor_a_devolver->tipo_tramite = null;
		$productor_a_devolver->updated_by = null;
		$productor_a_devolver->created_by = null;
		$productor_a_devolver->created_by = null;
		$productor_a_devolver->updated_by = null;
		$productor_a_devolver->updated_paso_uno = null;
		$productor_a_devolver->updated_paso_dos = null;
		$productor_a_devolver->leal_calle_correcto = null;
		$productor_a_devolver->obs_leal_calle = null;
		$productor_a_devolver->leal_numero_correcto = null;
		$productor_a_devolver->obs_leal_numero = null;
		$productor_a_devolver->leal_telefono_correcto = null;
		$productor_a_devolver->obs_leal_telefono = null;
		$productor_a_devolver->leal_provincia_correcto = null;
		$productor_a_devolver->obs_leal_provincia = null;
		$productor_a_devolver->leal_departamento_correcto = null;
		$productor_a_devolver->obs_leal_departamento = null;
		$productor_a_devolver->leal_localidad_correcto = null;
		$productor_a_devolver->obs_leal_localidad = null;
		$productor_a_devolver->leal_cp_correcto = null;
		$productor_a_devolver->obs_leal_cp = null;
		$productor_a_devolver->leal_otro_correcto = null;
		$productor_a_devolver->obs_leal_otro = null;
		$productor_a_devolver->paso_2_progreso = null;
		$productor_a_devolver->paso_2_aprobado = null;
		$productor_a_devolver->paso_2_reprobado = null;
		$productor_a_devolver->administracion_calle_correcto = null;
		$productor_a_devolver->obs_administracion_calle = null;
		$productor_a_devolver->administracion_numero_correcto = null;
		$productor_a_devolver->obs_administracion_numero = null;
		$productor_a_devolver->administracion_telefono_correcto = null;
		$productor_a_devolver->obs_administracion_telefono = null;
		$productor_a_devolver->administracion_provincia_correcto = null;
		$productor_a_devolver->obs_administracion_provincia = null;
		$productor_a_devolver->administracion_departamento_correcto = null;
		$productor_a_devolver->obs_administracion_departamento = null;
		$productor_a_devolver->administracion_localidad_correcto = null;
		$productor_a_devolver->obs_administracion_localidad = null;
		$productor_a_devolver->administracion_cp_correcto = null;
		$productor_a_devolver->obs_administracion_cp = null;
		$productor_a_devolver->administracion_otro_correcto = null;
		$productor_a_devolver->obs_administracion_otro = null;
		$productor_a_devolver->paso_3_progreso = null;
		$productor_a_devolver->paso_3_aprobado = null;
		$productor_a_devolver->paso_3_reprobado = null;
		$productor_a_devolver->numero_expdiente_correcto = null;
		$productor_a_devolver->obs_numero_expdiente = null;
		$productor_a_devolver->categoria_correcto = null;
		$productor_a_devolver->obs_categoria = null;
		$productor_a_devolver->nombre_mina_correcto = null;
		$productor_a_devolver->obs_nombre_mina = null;
		$productor_a_devolver->descripcion_mina_correcto = null;
		$productor_a_devolver->obs_descripcion_mina = null;
		$productor_a_devolver->obs_distrito_minero = null;
		$productor_a_devolver->distrito_minero_correcto = null;
		$productor_a_devolver->mina_cantera_correcto = null;
		$productor_a_devolver->obs_mina_cantera = null;
		$productor_a_devolver->plano_inmueble_correcto = null;
		$productor_a_devolver->obs_plano_inmueble = null;
		$productor_a_devolver->obs_resolucion_concesion_minera = null;
		$productor_a_devolver->resolucion_concesion_minera_correcto = null;
		$productor_a_devolver->titulo_contrato_posecion_correcto = null;
		$productor_a_devolver->obs_titulo_contrato_posecion = null;
		$productor_a_devolver->paso_4_progreso = null;
		$productor_a_devolver->paso_4_aprobado = null;
		$productor_a_devolver->paso_4_reprobado = null;
		$productor_a_devolver->updated_paso_cuatro = null;
		$productor_a_devolver->updated_paso_tres = "null";
		$productor_a_devolver->otro_caracter_acalaracion = null;
		$productor_a_devolver->concesion_minera_acalracion = null;
		$productor_a_devolver->concesion_minera_acalracion = null;
		$productor_a_devolver->owner_correcto = null;
		$productor_a_devolver->obs_owner = null;
		$productor_a_devolver->arrendatario_correcto = null;
		$productor_a_devolver->obs_arrendatario = null;
		$productor_a_devolver->concesionario_correcto = null;
		$productor_a_devolver->obs_concesionario = null;
		$productor_a_devolver->otros_correcto = null;
		$productor_a_devolver->obs_otros = 33;
		$productor_a_devolver->sustancias_de_aprovechamiento_comun_correcto = null;
		$productor_a_devolver->obs_sustancias_de_aprovechamiento_comun_correcto = null;

		$productor_a_devolver->constancia_pago_canon_correcto = null;
		$productor_a_devolver->obs_constancia_pago_canon = null;
		$productor_a_devolver->iia_correcto = null;
		$productor_a_devolver->obs_iia = null;
		$productor_a_devolver->dia_correcto = null;
		$productor_a_devolver->obs_dia = null;
		$productor_a_devolver->acciones_a_desarrollar_correcto = null;
		$productor_a_devolver->obs_acciones_a_desarrollar = null;
		$productor_a_devolver->actividad_correcto = null;
		$productor_a_devolver->obs_actividad = null;
		$productor_a_devolver->fecha_alta_dia_correcto = null;
		$productor_a_devolver->obs_fecha_alta_dia = null;
		$productor_a_devolver->paso_5_progreso = null;
		$productor_a_devolver->paso_5_aprobado = null;
		$productor_a_devolver->paso_5_reprobado = null;
		$productor_a_devolver->fecha_vencimiento_dia_correcto = null;
		$productor_a_devolver->obs_fecha_vencimiento_dia = null;
		$productor_a_devolver->updated_paso_cinco = null;
		$productor_a_devolver->localidad_mina_provincia_correcto = null;
		$productor_a_devolver->obs_localidad_mina_provincia = null;
		$productor_a_devolver->localidad_mina_departamento_correcto = null;
		$productor_a_devolver->obs_localidad_mina_departamento = null;
		$productor_a_devolver->localidad_mina_localidad_correcto = null;
		$productor_a_devolver->obs_localidad_mina_localidad = null;
		$productor_a_devolver->tipo_sistema_correcto = null;
		$productor_a_devolver->obs_tipo_sistema = null;
		$productor_a_devolver->longitud_correcto = null;
		$productor_a_devolver->obs_longitud = null;
		$productor_a_devolver->latitud_correcto = null;
		$productor_a_devolver->obs_latitud = null;
		$productor_a_devolver->paso_6_progreso = null;
		$productor_a_devolver->paso_6_aprobado = null;
		$productor_a_devolver->paso_6_reprobado = null;
		$productor_a_devolver->updated_paso_seis = null;
		return $productor_a_devolver;

		//var_dump($productor_a_devolver);die();
	}

	public function dame_un_productor_catamarca_vacio()
	{
		$productor_a_devolver = new FormAltaProductorCatamarca();
		$productor_a_devolver->id = null;
		$productor_a_devolver->gestor_nombre_apellido = null;
		$productor_a_devolver->gestor_dni = null;
		$productor_a_devolver->gestor_profesion = null;
		$productor_a_devolver->gestor_telefono = null;
		$productor_a_devolver->gestor_notificacion = null;
		$productor_a_devolver->gestor_email = null;
		$productor_a_devolver->primer_hoja_dni = null;
		$productor_a_devolver->segunda_hoja_dni = null;
		$productor_a_devolver->foto_4x4 = null;
		$productor_a_devolver->constancia_afip = null;

		$productor_a_devolver->gestor_nombre_apellido_correcto = null;
		$productor_a_devolver->obs_gestor_nombre_apellido = null;
		$productor_a_devolver->gestor_dni_correcto = null;
		$productor_a_devolver->obs_gestor_dni = null;
		$productor_a_devolver->gestor_profesion_correcto = null;
		$productor_a_devolver->obs_gestor_profesion = null;
		$productor_a_devolver->gestor_telefono_correcto = null;
		$productor_a_devolver->obs_gestor_telefono = null;
		$productor_a_devolver->gestor_notificacion_correcto = null;
		$productor_a_devolver->obs_gestor_notificacion = null;

		$productor_a_devolver->gestor_email_correcto = null;
		$productor_a_devolver->obs_gestor_email = null;
		$productor_a_devolver->hoja_dni_correcto = null;
		$productor_a_devolver->obs_hoja_dni = null;
		$productor_a_devolver->foto_4x4_correcto = null;
		$productor_a_devolver->obs_foto_4x4 = null;
		$productor_a_devolver->constancia_afip_correcto = null;
		$productor_a_devolver->obs_constancia_afip = null;
		$productor_a_devolver->paso_aprobado = null;
		$productor_a_devolver->paso_reprobado = null;

		$productor_a_devolver->paso_progreso = null;
		$productor_a_devolver->created_by = null;
		$productor_a_devolver->updated_by = null;
		$productor_a_devolver->id_formulario_alta = null;
		$productor_a_devolver->created_at = null;
		$productor_a_devolver->updated_at = null;
		$productor_a_devolver->deleted_at = null;
		$productor_a_devolver->autorizacion_gestor = null;
		$productor_a_devolver->autorizacion_gestor_correcto = null;
		$productor_a_devolver->obs_autorizacion_gestor = null;

		return $productor_a_devolver;

		//var_dump($productor_a_devolver);die();
	}

	public function prasar_num_a_boolean($objeto)
	{
		if (($objeto->owner == null) || ($objeto->owner === 0))
			$objeto->owner = false;
		else $objeto->owner = true;
		if (($objeto->arrendatario == null) || ($objeto->arrendatario === 0))
			$objeto->arrendatario = false;
		else $objeto->arrendatario = true;
		if (($objeto->concesionario == null) || ($objeto->concesionario === 0))
			$objeto->concesionario = false;
		else $objeto->concesionario = true;
		if (($objeto->otros == null) || ($objeto->otros === 0))
			$objeto->otros = false;
		else $objeto->otros = true;
		if (($objeto->sustancias_de_aprovechamiento_comun == null) || ($objeto->sustancias_de_aprovechamiento_comun === 0))
			$objeto->sustancias_de_aprovechamiento_comun = false;
		else $objeto->sustancias_de_aprovechamiento_comun = true;
		if ($objeto->fecha_alta_dia != null)
			$objeto->fecha_alta_dia = date("Y-m-d", strtotime($objeto->fecha_alta_dia));
		if ($objeto->fecha_vencimiento_dia != null)
			$objeto->fecha_vencimiento_dia = date("Y-m-d", strtotime($objeto->fecha_vencimiento_dia));

		if ($objeto->constancia_pago_canon != null)
			$objeto->constancia_pago_canon = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->constancia_pago_canon);
		if ($objeto->iia != null)
			$objeto->iia = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->iia);
		if ($objeto->dia != null)
			$objeto->dia = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->dia);

		if ($objeto->inscripciondgr != null)
			$objeto->inscripciondgr = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->inscripciondgr);


		if ($objeto->constaciasociedad != null)
			$objeto->constaciasociedad = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->constaciasociedad);
		if ($objeto->resolucion_concesion_minera != null)
			$objeto->resolucion_concesion_minera = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->resolucion_concesion_minera);


		if ($objeto->titulo_contrato_posecion != null)
			$objeto->titulo_contrato_posecion = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->titulo_contrato_posecion);


		if ($objeto->plano_inmueble != null)
			$objeto->plano_inmueble = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->plano_inmueble);



		//catamarca
		if (isset($objeto->foto_4x4) && ($objeto->foto_4x4 != null))
			$objeto->foto_4x4 = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->foto_4x4);

		if (isset($objeto->autorizacion_gestor) && ($objeto->autorizacion_gestor != null))
			$objeto->autorizacion_gestor = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->autorizacion_gestor);

		if (isset($objeto->primer_hoja_dni) && ($objeto->primer_hoja_dni != null))
			$objeto->primer_hoja_dni = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->primer_hoja_dni);

		if (isset($objeto->segunda_hoja_dni) && ($objeto->segunda_hoja_dni != null))
			$objeto->segunda_hoja_dni = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->segunda_hoja_dni);

		if (isset($objeto->constancia_afip) && ($objeto->constancia_afip != null))
			$objeto->constancia_afip = env('APP_URL') . '/' . str_replace("public", "storage", $objeto->constancia_afip);

		return $objeto;
	}
	public function create()
	{
		//ajusto los permisos
		//dd(Auth::user()->hasRole('Administrador'));
		$nombre_provincia = "";
		if (Auth::user()->id_provincia  == 70) {
			$nombre_provincia = "San Juan";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		} elseif (Auth::user()->id_provincia  == 10) {
			$nombre_provincia = "Catamarca";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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
			}
		} elseif (Auth::user()->id_provincia  == 50) {
			$nombre_provincia = "Mendoza";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,

					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,

					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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

					"paso_mendoza" => true,
					"boton_mendoza" => true,

					"estado" => false,
					"boton_actualizar" => false,

				];
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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


					"estado" => false,
					"boton_actualizar" => false,

				];
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,



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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


					"decreto3737" => false,
					"decreto3737_correccion" => false,
					"situacion_mina" => false,
					"situacion_mina_correccion" => false,
					"concesion_minera_asiento_n" => false,
					"concesion_minera_fojas" => false,
					"concesion_minera_tomo_n" => false,
					"concesion_minera_reg_m_y_d" => false,
					"concesion_minera_reg_cant" => false,
					"concesion_minera_reg_men" => false,
					"concesion_minera_reg_d_y_c" => false,
					"obs_datos_minas" => false,

					"paso_mendoza" => false,
					"boton_mendoza" => false,


					"estado" => false,
					"boton_actualizar" => false,

				];
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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
					"concesion_minera_reg_d_y_c_correccion" => true,

					"paso_mendoza" => true,
					"boton_mendoza" => true,



					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		} elseif (Auth::user()->id_provincia  == 74) {
			$nombre_provincia = "San Luis";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		} elseif (Auth::user()->id_provincia  == 66) {
			$nombre_provincia = "Salta";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		} elseif (Auth::user()->id_provincia  == 46) {
			$nombre_provincia = "La Rioja";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		}elseif (Auth::user()->id_provincia  == 58) {
			$nombre_provincia = "Neuquén";
			if (Auth::user()->hasRole('Productor')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Autoridad')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => true,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			} elseif (Auth::user()->hasRole('Administrador')) {
				$disables = [
					"razon_social" => false,
					"razon_social_correccion" => false,
					"email" => false,
					"email_correccion" => false,
					"cuit" => false,
					"cuit_correccion" => false,
					"num_prod" => false,
					"num_prod_correccion" => false,
					"tipo_sociedad" => false,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => false,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => false,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => false,
					"paso_uno" => false,

					"legal_calle" => false,
					"legal_calle_correccion" => false,
					"legal_calle_num" => false,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => false,
					"legal_telefono_correccion" => false,
					"legal_prov" => false,
					"legal_prov_correccion" => false,
					"legal_dpto" => false,
					"legal_dpto_correccion" => false,
					"legal_localidad" => false,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => false,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => false,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => false,
					"paso_dos" => false,


					"administracion_calle" => false,
					"administracion_correccion" => false,
					"administracion_calle_num" => false,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => false,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => false,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => false,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => false,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => false,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => false,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => false,
					"paso_tres" => false,



					"num_exp" => false,
					"num_exp_correccion" => false,
					"distrito" => false,
					"distrito_correccion" => false,
					"categoria" => false,
					"categoria_correccion" => false,
					"nombre_mina" => false,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => false,
					"descripcion_correccion" => false,
					"resolucion_concesion" => false,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => false,
					"plano_mina_correccion" => false,
					"minerales" => false,
					"minerales_correccion" => false,
					"titulo" => false,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => false,
					"paso_cuatro" => false,



					"owner" => false,
					"owner_correccion" => false,
					"arrendatario" => false,
					"arrendatario_correccion" => false,
					"concesionario" => false,
					"concesionario_correccion" => false,
					"sustancias" => false,
					"sustancias_correccion" => false,
					"otros" => false,
					"otros_correccion" => false,

					"concesion" => false,
					"concesion_correccion" => false,
					"contancias_canon" => false,
					"constancias_canon_correccion" => false,
					"dia" => false,
					"dia_correccion" => false,
					"iia" => false,
					"iia_correccion" => false,
					"acciones" => false,
					"acciones_correccion" => false,
					"actividades" => false,
					"actividades_correccion" => false,
					"fecha_alta_dia" => false,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => false,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => false,
					"paso_cinco" => false,


					"ubicacion_prov" => false,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => false,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => false,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => false,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => false,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => false,
					"ubicacion_long_correccion" => false,
					"ubicacion_estado" => false,
					"ubicacion_estado_correccion" => false,
					"ubicacion_estado_observacion" => false,
					"boton_guardar_seis" => false,
					"paso_seis" => false,


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
				$mostrar = [
					"razon_social" => true,
					"razon_social_correccion" => false,
					"email" => true,
					"email_correccion" => false,
					"cuit" => true,
					"cuit_correccion" => false,
					"num_prod" => true,
					"num_prod_correccion" => false,
					"tipo_sociedad" => true,
					"tipo_sociedad_correccion" => false,
					"inscripcion_dgr" => true,
					"inscripcion_dgr_correccion" => false,
					"constancia_sociedad" => true,
					"cosntancia_sociedad_correccion" => false,
					"boton_guardar_uno" => true,
					"paso_uno" => true,

					"legal_calle" => true,
					"legal_calle_correccion" => false,
					"legal_calle_num" => true,
					"legal_calle_num_correccion" => false,
					"legal_telefono" => true,
					"legal_telefono_correccion" => false,
					"legal_prov" => true,
					"legal_prov_correccion" => false,
					"legal_dpto" => true,
					"legal_dpto_correccion" => false,
					"legal_localidad" => true,
					"legal_localidad_correccion" => false,
					"legal_cod_pos" => true,
					"legal_cod_pos_correccion" => false,
					"legal_otro" => true,
					"legal_otro_correccion" => false,
					"boton_guardar_dos" => true,
					"paso_dos" => true,

					"administracion_calle" => true,
					"administracion_correccion" => false,
					"administracion_calle_num" => true,
					"administracion_calle_num_correccion" => false,
					"administracion_telefono" => true,
					"administracion_telefono_correccion" => false,
					"administracion_prov" => true,
					"administracion_prov_correccion" => false,
					"administracion_dpto" => true,
					"administracion_dpto_correccion" => false,
					"administracion_localidad" => true,
					"administracion_localidad_correccion" => false,
					"administracion_cod_pos" => true,
					"administracion_cod_pos_correccion" => false,
					"administracion_otro" => true,
					"administracion_otro_correccion" => false,
					"boton_guardar_tres" => true,
					"paso_tres" => true,

					"num_exp" => true,
					"num_exp_correccion" => false,
					"distrito" => true,
					"distrito_correccion" => false,
					"categoria" => true,
					"categoria_correccion" => false,
					"nombre_mina" => true,
					"nombre_mina_correccion" => false,
					"descripcion_mina" => true,
					"descripcion_correccion" => false,
					"resolucion_concesion" => true,
					"resolucion_concesion_correccion" => false,
					"plano_mina" => true,
					"plano_mina_correccion" => false,
					"minerales" => true,
					"minerales_correccion" => false,
					"titulo" => true,
					"titulo_correccion" => false,
					"boton_guardar_cuatro" => true,
					"paso_cuatro" => true,

					"owner" => true,
					"owner_correccion" => false,
					"arrendatario" => true,
					"arrendatario_correccion" => false,
					"concesionario" => true,
					"concesionario_correccion" => false,
					"sustancias" => true,
					"sustancias_correccion" => false,
					"otros" => true,
					"otros_correccion" => false,

					"concesion" => true,
					"concesion_correccion" => false,
					"contancias_canon" => true,
					"constancias_canon_correccion" => false,
					"dia" => true,
					"dia_correccion" => false,
					"iia" => true,
					"iia_correccion" => false,
					"acciones" => true,
					"acciones_correccion" => false,
					"actividades" => true,
					"actividades_correccion" => false,
					"fecha_alta_dia" => true,
					"fecha_alta_dia_correccion" => false,
					"fecha_vencimiento_dia" => true,
					"fecha_vencimiento_dia_correccion" => false,
					"boton_guardar_cinco" => true,
					"paso_cinco" => true,

					"ubicacion_prov" => true,
					"ubicacion_prov_correccion" => false,
					"ubicacion_dpto" => true,
					"ubicacion_dpto_correccion" => false,
					"ubicacion_localidad" => true,
					"ubicacion_localidad_correccion" => false,
					"ubicacion_sistema" => true,
					"ubicacion_sistema_correccion" => false,
					"ubicacion_latitud" => true,
					"ubicacion_latitud_correccion" => false,
					"ubicacion_long" => true,
					"ubicacion_long_correccion" => false,
					"boton_guardar_seis" => true,
					"paso_seis" => true,


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


					"estado" => true,

					"boton_actualizar" => true,
				];
			}
		}

		if ($nombre_provincia != "") {
			$productor = $this->dame_un_productor_vacio();
			$productor_particular = null;
			$productor_particular = $this->dame_un_productor_catamarca_vacio();
			//var_dump($productor->owner);
			$productor = $this->prasar_num_a_boolean($productor);
			//var_dump($productor->owner);die();
			//$minerales_asociados = Minerales_Borradores::select('*')->where('id_formulario', '=',$id)->get();
			$minerales_asociados = Minerales_Borradores::find(1);
			$datos_creador = null;
			$soy_productor = true;
			//var_dump($disables["boton_catamarca"]);die();
			return Inertia::render('Productors/Form', [
				'productor' => $productor,
				'lista_minerales_cargados' => $minerales_asociados,
				'creado' => $datos_creador,
				'soy_administrador' => false,
				'soy_autoridad_minera' => false,
				"soy_productor" => $soy_productor,
				"disables" => $disables,
				"mostrar" => $mostrar,
				"productor_particular" => $productor_particular,
				"nombre_provincia" => $nombre_provincia
			]);
		} else {
			return Inertia::render('Common/SinProvincia', [
				'mensaje' => 'Su provincia aun no ha sido implemntada',
			]);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate(
			[
				'name' => 'required',
				'price' => 'required'
			]
		);

		FormAltaProductor::create($request->all());

		return FormAltaProductor::route('formulario-alta.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\FormAltaProductor  $formAltaProductor
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//reviso permisos
		$entro = false;
		$formulario = FormAltaProductor::find($id);
		if (Auth::user()->id == 1) {
			//soy root
			$entro = true;
		}
		//reviso si el usuairo es productor o auotridad minera xq no importa para ver
		elseif ($formulario->provincia == Auth::user()->id_provincia) {
			//estoy en mi misma provincia
			$entro = true;
		} else
			$entro = false;
		if ($formulario == null) {
			//el formulario no existe
			$entro = false;
		}

		//seteo que puedo editar y que no
		$disables = [
			"razon_social" => true,
			"razon_social_correccion" => true,
			"email" => true,
			"email_correccion" => true,
			"cuit" => true,
			"cuit_correccion" => true,
			"num_prod" => true,
			"num_prod_correccion" => true,
			"tipo_sociedad" => true,
			"tipo_sociedad_correccion" => true,
			"inscripcion_dgr" => true,
			"inscripcion_dgr_correccion" => true,
			"constancia_sociedad" => true,
			"cosntancia_sociedad_correccion" => true,
			"boton_guardar_uno" => true,
			"paso_uno" => true,

			"legal_calle" => true,
			"legal_calle_correccion" => true,
			"legal_calle_num" => true,
			"legal_calle_num_correccion" => true,
			"legal_telefono" => true,
			"legal_telefono_correccion" => true,
			"legal_prov" => true,
			"legal_prov_correccion" => true,
			"legal_dpto" => true,
			"legal_dpto_correccion" => true,
			"legal_localidad" => true,
			"legal_localidad_correccion" => true,
			"legal_cod_pos" => true,
			"legal_cod_pos_correccion" => true,
			"legal_otro" => true,
			"legal_otro_correccion" => true,
			"boton_guardar_dos" => true,
			"paso_dos" => true,


			"administracion_calle" => true,
			"administracion_correccion" => true,
			"administracion_calle_num" => true,
			"administracion_calle_num_correccion" => true,
			"administracion_telefono" => true,
			"administracion_telefono_correccion" => true,
			"administracion_prov" => true,
			"administracion_prov_correccion" => true,
			"administracion_dpto" => true,
			"administracion_dpto_correccion" => true,
			"administracion_localidad" => true,
			"administracion_localidad_correccion" => true,
			"administracion_cod_pos" => true,
			"administracion_cod_pos_correccion" => true,
			"administracion_otro" => true,
			"administracion_otro_correccion" => true,
			"boton_guardar_tres" => true,
			"paso_tres" => true,



			"num_exp" => true,
			"num_exp_correccion" => true,
			"distrito" => true,
			"distrito_correccion" => true,
			"categoria" => true,
			"categoria_correccion" => true,
			"nombre_mina" => true,
			"nombre_mina_correccion" => true,
			"descripcion_mina" => true,
			"descripcion_correccion" => true,
			"resolucion_concesion" => true,
			"resolucion_concesion_correccion" => true,
			"plano_mina" => true,
			"plano_mina_correccion" => true,
			"minerales" => true,
			"minerales_correccion" => true,
			"titulo" => true,
			"titulo_correccion" => true,
			"boton_guardar_cuatro" => true,
			"paso_cuatro" => true,



			"owner" => true,
			"owner_correccion" => true,
			"arrendatario" => true,
			"arrendatario_correccion" => true,
			"concesionario" => true,
			"concesionario_correccion" => true,
			"sustancias" => true,
			"sustancias_correccion" => true,
			"otros" => true,
			"otros_correccion" => true,

			"concesion" => true,
			"concesion_correccion" => true,
			"contancias_canon" => true,
			"constancias_canon_correccion" => true,
			"dia" => true,
			"dia_correccion" => true,
			"iia" => true,
			"iia_correccion" => true,
			"acciones" => true,
			"acciones_correccion" => true,
			"actividades" => true,
			"actividades_correccion" => true,
			"fecha_alta_dia" => true,
			"fecha_alta_dia_correccion" => true,
			"fecha_vencimiento_dia" => true,
			"fecha_vencimiento_dia_correccion" => true,
			"boton_guardar_cinco" => true,
			"paso_cinco" => true,


			"ubicacion_prov" => true,
			"ubicacion_prov_correccion" => true,
			"ubicacion_dpto" => true,
			"ubicacion_dpto_correccion" => true,
			"ubicacion_localidad" => true,
			"ubicacion_localidad_correccion" => true,
			"ubicacion_sistema" => true,
			"ubicacion_sistema_correccion" => true,
			"ubicacion_latitud" => true,
			"ubicacion_latitud_correccion" => true,
			"ubicacion_long" => true,
			"ubicacion_long_correccion" => true,
			"ubicacion_estado" => true,
			"ubicacion_estado_correccion" => true,
			"ubicacion_estado_observacion" => true,
			"boton_guardar_seis" => true,
			"paso_seis" => true,

			"estado" => true,
			"boton_actualizar" => true,

		];
		$mostrar = [
			"razon_social" => true,
			"razon_social_correccion" => true,
			"email" => true,
			"email_correccion" => true,
			"cuit" => true,
			"cuit_correccion" => true,
			"num_prod" => true,
			"num_prod_correccion" => true,
			"tipo_sociedad" => true,
			"tipo_sociedad_correccion" => true,
			"tipo_sociedad_observaciono" => true,
			"inscripcion_dgr" => true,
			"inscripcion_dgr_correccion" => true,
			"constancia_sociedad" => true,
			"cosntancia_sociedad_correccion" => true,
			"boton_guardar_uno" => false,
			"paso_uno" => true,


			"legal_calle" => true,
			"legal_calle_correccion" => true,
			"legal_calle_num" => true,
			"legal_calle_num_correccion" => true,
			"legal_telefono" => true,
			"legal_telefono_correccion" => true,
			"legal_prov" => true,
			"legal_prov_correccion" => true,
			"legal_dpto" => true,
			"legal_dpto_correccion" => true,
			"legal_localidad" => true,
			"legal_localidad_correccion" => true,
			"legal_cod_pos" => true,
			"legal_cod_pos_correccion" => true,
			"legal_otro" => true,
			"legal_otro_correccion" => true,
			"boton_guardar_dos" => false,
			"paso_dos" => true,



			"administracion_calle" => true,
			"administracion_correccion" => true,
			"administracion_calle_num" => true,
			"administracion_calle_num_correccion" => true,
			"administracion_telefono" => true,
			"administracion_telefono_correccion" => true,
			"administracion_prov" => true,
			"administracion_prov_correccion" => true,
			"administracion_dpto" => true,
			"administracion_dpto_correccion" => true,
			"administracion_localidad" => true,
			"administracion_localidad_correccion" => true,
			"administracion_cod_pos" => true,
			"administracion_cod_pos_correccion" => true,
			"administracion_otro" => true,
			"administracion_otro_correccion" => true,
			"boton_guardar_tres" => false,
			"paso_tres" => true,



			"num_exp" => true,
			"num_exp_correccion" => true,
			"distrito" => true,
			"distrito_correccion" => true,
			"categoria" => true,
			"categoria_correccion" => true,
			"nombre_mina" => true,
			"nombre_mina_correccion" => true,
			"descripcion_mina" => true,
			"descripcion_correccion" => true,
			"resolucion_concesion" => true,
			"resolucion_concesion_correccion" => true,
			"plano_mina" => true,
			"plano_mina_correccion" => true,
			"minerales" => true,
			"minerales_correccion" => true,
			"titulo" => true,
			"titulo_correccion" => true,
			"boton_guardar_cuatro" => false,
			"paso_cuatro" => true,



			"owner" => true,
			"owner_correccion" => true,
			"arrendatario" => true,
			"arrendatario_correccion" => true,
			"concesionario" => true,
			"concesionario_correccion" => true,
			"sustancias" => true,
			"sustancias_correccion" => true,
			"otros" => true,
			"otros_correccion" => true,

			"concesion" => true,
			"concesion_correccion" => true,
			"contancias_canon" => true,
			"constancias_canon_correccion" => true,
			"dia" => true,
			"dia_correccion" => true,
			"iia" => true,
			"iia_correccion" => true,
			"acciones" => true,
			"acciones_correccion" => true,
			"actividades" => true,
			"actividades_correccion" => true,
			"fecha_alta_dia" => true,
			"fecha_alta_dia_correccion" => true,
			"fecha_vencimiento_dia" => true,
			"fecha_vencimiento_dia_correccion" => true,
			"boton_guardar_cinco" => false,
			"paso_cinco" => true,


			"ubicacion_prov" => true,
			"ubicacion_prov_correccion" => true,
			"ubicacion_dpto" => true,
			"ubicacion_dpto_correccion" => true,
			"ubicacion_localidad" => true,
			"ubicacion_localidad_correccion" => true,
			"ubicacion_sistema" => true,
			"ubicacion_sistema_correccion" => true,
			"ubicacion_latitud" => true,
			"ubicacion_latitud_correccion" => true,
			"ubicacion_long" => true,
			"ubicacion_long_correccion" => true,
			"boton_guardar_seis" => false,
			"paso_seis" => true,


			"estado" => true,

			"boton_actualizar" => false,
		];
		if ($entro) {
			$borradores = FormAltaProductor::find($id);

			$borradores = $this->prasar_num_a_boolean($borradores);
			$minerales_asociados = Minerales_Borradores::select('*')->where('id_formulario', '=', $id)->get();
			$datos_creador = User::find($borradores->created_by);

			if (is_null($borradores->razon_social_correcto))
				$borradores->razon_social_correcto = 'nada';
			elseif (intval($borradores->razon_social_correcto) == 1)
				$borradores->razon_social_correcto = true;
			else $borradores->razon_social_correcto = false;

			if (is_null($borradores->email_correcto))
				$borradores->email_correcto = 'nada';
			elseif (intval($borradores->email_correcto) == 1)
				$borradores->email_correcto = true;
			else $borradores->email_correcto = false;

			if (is_null($borradores->cuit_correcto))
				$borradores->cuit_correcto = 'nada';
			elseif (intval($borradores->cuit_correcto) == 1)
				$borradores->cuit_correcto = true;
			else $borradores->cuit_correcto = false;

			if (is_null($borradores->numeroproductor_correcto))
				$borradores->numeroproductor_correcto = 'nada';
			elseif (intval($borradores->numeroproductor_correcto) == 1)
				$borradores->numeroproductor_correcto = true;
			else $borradores->numeroproductor_correcto = false;

			if (is_null($borradores->tiposociedad_correcto))
				$borradores->tiposociedad_correcto = 'nada';
			elseif (intval($borradores->tiposociedad_correcto) == 1)
				$borradores->tiposociedad_correcto = true;
			else $borradores->tiposociedad_correcto = false;

			if (is_null($borradores->inscripciondgr_correcto))
				$borradores->inscripciondgr_correcto = 'nada';
			elseif (intval($borradores->inscripciondgr_correcto) == 1)
				$borradores->inscripciondgr_correcto = true;
			else $borradores->inscripciondgr_correcto = false;

			if (is_null($borradores->constanciasociedad_correcto))
				$borradores->constanciasociedad_correcto = 'nada';
			elseif (intval($borradores->constanciasociedad_correcto) == 1)
				$borradores->constanciasociedad_correcto = true;
			else $borradores->constanciasociedad_correcto = false;

			if (is_null($borradores->leal_departamento_correcto))
				$borradores->leal_departamento_correcto = 'nada';
			elseif (intval($borradores->leal_departamento_correcto) == 1)
				$borradores->leal_departamento_correcto = true;
			else $borradores->leal_departamento_correcto = false;

			if (is_null($borradores->owner_correcto))
				$borradores->owner_correcto = 'nada';
			elseif (intval($borradores->owner_correcto) == 1)
				$borradores->owner_correcto = true;
			else $borradores->owner_correcto = false;

			if (is_null($borradores->arrendatario_correcto))
				$borradores->arrendatario_correcto = 'nada';
			elseif (intval($borradores->arrendatario_correcto) == 1)
				$borradores->arrendatario_correcto = true;
			else $borradores->arrendatario_correcto = false;

			if (is_null($borradores->concesionario_correcto))
				$borradores->concesionario_correcto = 'nada';
			elseif (intval($borradores->concesionario_correcto) == 1)
				$borradores->concesionario_correcto = true;
			else $borradores->concesionario_correcto = false;

			if (is_null($borradores->otros_correcto))
				$borradores->otros_correcto = 'nada';
			elseif (intval($borradores->otros_correcto) == 1)
				$borradores->otros_correcto = true;
			else $borradores->otros_correcto = false;

			if (is_null($borradores->susteancias_de_aprovechamiento_comun_correcto))
				$borradores->susteancias_de_aprovechamiento_comun_correcto = 'nada';
			elseif (intval($borradores->susteancias_de_aprovechamiento_comun_correcto) == 1)
				$borradores->susteancias_de_aprovechamiento_comun_correcto = true;
			else $borradores->susteancias_de_aprovechamiento_comun_correcto = false;

			//dd($borradores->inscripciondgr);

			return Inertia::render('Productors/EditForm', [
				'productor' => $borradores, 'lista_minerales_cargados' => $minerales_asociados, 'creado' => $datos_creador,
				"soy_administrador" => false,
				"soy_autoridad_minera" => false,
				"soy_productor" => true,
				"disables" => $disables,
				"mostrar" => $mostrar,
			]);
		} else {
			//dd("acad");
			return Inertia::render('Common/SinPermisos');
			//dd("usted no tiene permisos de entrar");
		}
	}

	public function dame_los_permisos_de_los_inputs($pagina, $estado_formulario)
	{
		//pongo los permisos basicos, q son los de lectura
		$disables = [
			"razon_social" => true,
			"razon_social_correccion" => true,
			"email" => true,
			"email_correccion" => true,
			"cuit" => true,
			"cuit_correccion" => true,
			"num_prod" => true,
			"num_prod_correccion" => true,
			"tipo_sociedad" => true,
			"tipo_sociedad_correccion" => true,
			"inscripcion_dgr" => true,
			"inscripcion_dgr_correccion" => true,
			"constancia_sociedad" => true,
			"cosntancia_sociedad_correccion" => true,
			"boton_guardar_uno" => true,
			"paso_uno" => true,

			"legal_calle" => true,
			"legal_calle_correccion" => true,
			"legal_calle_num" => true,
			"legal_calle_num_correccion" => true,
			"legal_telefono" => true,
			"legal_telefono_correccion" => true,
			"legal_prov" => true,
			"legal_prov_correccion" => true,
			"legal_dpto" => true,
			"legal_dpto_correccion" => true,
			"legal_localidad" => true,
			"legal_localidad_correccion" => true,
			"legal_cod_pos" => true,
			"legal_cod_pos_correccion" => true,
			"legal_otro" => true,
			"legal_otro_correccion" => true,
			"boton_guardar_dos" => true,
			"paso_dos" => true,

			"administracion_calle" => true,
			"administracion_correccion" => true,
			"administracion_calle_num" => true,
			"administracion_calle_num_correccion" => true,
			"administracion_telefono" => true,
			"administracion_telefono_correccion" => true,
			"administracion_prov" => true,
			"administracion_prov_correccion" => true,
			"administracion_dpto" => true,
			"administracion_dpto_correccion" => true,
			"administracion_localidad" => true,
			"administracion_localidad_correccion" => true,
			"administracion_cod_pos" => true,
			"administracion_cod_pos_correccion" => true,
			"administracion_otro" => true,
			"administracion_otro_correccion" => true,
			"boton_guardar_tres" => true,
			"paso_tres" => true,

			"num_exp" => true,
			"num_exp_correccion" => true,
			"distrito" => true,
			"distrito_correccion" => true,
			"categoria" => true,
			"categoria_correccion" => true,
			"nombre_mina" => true,
			"nombre_mina_correccion" => true,
			"descripcion_mina" => true,
			"descripcion_correccion" => true,
			"resolucion_concesion" => true,
			"resolucion_concesion_correccion" => true,
			"plano_mina" => true,
			"plano_mina_correccion" => true,
			"minerales" => true,
			"minerales_correccion" => true,
			"titulo" => true,
			"titulo_correccion" => true,
			"boton_guardar_cuatro" => true,
			"paso_cuatro" => true,

			"owner" => true,
			"owner_correccion" => true,
			"arrendatario" => true,
			"arrendatario_correccion" => true,
			"concesionario" => true,
			"concesionario_correccion" => true,
			"sustancias" => true,
			"sustancias_correccion" => true,
			"otros" => true,
			"otros_correccion" => true,

			"concesion" => true,
			"concesion_correccion" => true,
			"contancias_canon" => true,
			"constancias_canon_correccion" => true,
			"dia" => true,
			"dia_correccion" => true,
			"iia" => true,
			"iia_correccion" => true,
			"acciones" => true,
			"acciones_correccion" => true,
			"actividades" => true,
			"actividades_correccion" => true,
			"fecha_alta_dia" => true,
			"fecha_alta_dia_correccion" => true,
			"fecha_vencimiento_dia" => true,
			"fecha_vencimiento_dia_correccion" => true,
			"boton_guardar_cinco" => true,
			"paso_cinco" => true,

			"ubicacion_prov" => true,
			"ubicacion_prov_correccion" => true,
			"ubicacion_dpto" => true,
			"ubicacion_dpto_correccion" => true,
			"ubicacion_localidad" => true,
			"ubicacion_localidad_correccion" => true,
			"ubicacion_sistema" => true,
			"ubicacion_sistema_correccion" => true,
			"ubicacion_latitud" => true,
			"ubicacion_latitud_correccion" => true,
			"ubicacion_long" => true,
			"ubicacion_long_correccion" => true,
			"ubicacion_estado" => true,
			"ubicacion_estado_correccion" => true,
			"boton_guardar_seis" => true,
			"paso_seis" => true,

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
		$mostrar = [
			"razon_social" => true,
			"razon_social_correccion" => true,
			"email" => true,
			"email_correccion" => true,
			"cuit" => true,
			"cuit_correccion" => true,
			"num_prod" => true,
			"num_prod_correccion" => true,
			"tipo_sociedad" => true,
			"tipo_sociedad_correccion" => true,
			"tipo_sociedad_observaciono" => true,
			"inscripcion_dgr" => true,
			"inscripcion_dgr_correccion" => true,
			"constancia_sociedad" => true,
			"cosntancia_sociedad_correccion" => true,
			"boton_guardar_uno" => false,
			"paso_uno" => true,


			"legal_calle" => true,
			"legal_calle_correccion" => true,
			"legal_calle_num" => true,
			"legal_calle_num_correccion" => true,
			"legal_telefono" => true,
			"legal_telefono_correccion" => true,
			"legal_prov" => true,
			"legal_prov_correccion" => true,
			"legal_dpto" => true,
			"legal_dpto_correccion" => true,
			"legal_localidad" => true,
			"legal_localidad_correccion" => true,
			"legal_cod_pos" => true,
			"legal_cod_pos_correccion" => true,
			"legal_otro" => true,
			"legal_otro_correccion" => true,
			"boton_guardar_dos" => false,
			"paso_dos" => true,



			"administracion_calle" => true,
			"administracion_correccion" => true,
			"administracion_calle_num" => true,
			"administracion_calle_num_correccion" => true,
			"administracion_telefono" => true,
			"administracion_telefono_correccion" => true,
			"administracion_prov" => true,
			"administracion_prov_correccion" => true,
			"administracion_dpto" => true,
			"administracion_dpto_correccion" => true,
			"administracion_localidad" => true,
			"administracion_localidad_correccion" => true,
			"administracion_cod_pos" => true,
			"administracion_cod_pos_correccion" => true,
			"administracion_otro" => true,
			"administracion_otro_correccion" => true,
			"boton_guardar_tres" => false,
			"paso_tres" => true,

			"num_exp" => true,
			"num_exp_correccion" => true,
			"distrito" => true,
			"distrito_correccion" => true,
			"categoria" => true,
			"categoria_correccion" => true,
			"nombre_mina" => true,
			"nombre_mina_correccion" => true,
			"descripcion_mina" => true,
			"descripcion_correccion" => true,
			"resolucion_concesion" => true,
			"resolucion_concesion_correccion" => true,
			"plano_mina" => true,
			"plano_mina_correccion" => true,
			"minerales" => true,
			"minerales_correccion" => true,
			"titulo" => true,
			"titulo_correccion" => true,
			"boton_guardar_cuatro" => false,
			"paso_cuatro" => true,

			"owner" => true,
			"owner_correccion" => true,
			"arrendatario" => true,
			"arrendatario_correccion" => true,
			"concesionario" => true,
			"concesionario_correccion" => true,
			"sustancias" => true,
			"sustancias_correccion" => true,
			"otros" => true,
			"otros_correccion" => true,

			"concesion" => true,
			"concesion_correccion" => false,
			"contancias_canon" => true,
			"constancias_canon_correccion" => true,
			"dia" => true,
			"dia_correccion" => true,
			"iia" => true,
			"iia_correccion" => true,
			"acciones" => true,
			"acciones_correccion" => true,
			"actividades" => true,
			"actividades_correccion" => true,
			"fecha_alta_dia" => true,
			"fecha_alta_dia_correccion" => true,
			"fecha_vencimiento_dia" => true,
			"fecha_vencimiento_dia_correccion" => true,
			"boton_guardar_cinco" => false,
			"paso_cinco" => true,


			"ubicacion_prov" => true,
			"ubicacion_prov_correccion" => true,
			"ubicacion_dpto" => true,
			"ubicacion_dpto_correccion" => true,
			"ubicacion_localidad" => true,
			"ubicacion_localidad_correccion" => true,
			"ubicacion_sistema" => true,
			"ubicacion_sistema_correccion" => true,
			"ubicacion_latitud" => true,
			"ubicacion_latitud_correccion" => true,
			"ubicacion_long" => true,
			"ubicacion_long_correccion" => true,
			"boton_guardar_seis" => false,
			"paso_seis" => true,

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


			"estado" => true,

			"boton_actualizar" => false,

			"alerta_puede_editar" => false,
		];

		if ($pagina == 'editar') {
			if (Auth::user()->hasRole('Productor')) {
				if ($estado_formulario == 'borrador') {
					//CASO: Productor - Edicion - Borrador
					//habilito todo lo q hacen los productores
					//deshabilito todo lo q hacen las autoridades mineras
					$disables["razon_social"] = false;
					$disables["email"] = false;
					$disables["cuit"] = false;
					$disables["num_prod"] = false;
					$disables["tipo_sociedad"] = false;
					$disables["inscripcion_dgr"] = false;
					$disables["constancia_sociedad"] = false;
					$disables["boton_guardar_uno"] = false;
					$disables["paso_uno"] = false;

					$disables["legal_calle"] = false;
					$disables["legal_calle_num"] = false;
					$disables["legal_telefono"] = false;
					$disables["legal_prov"] = false;
					$disables["legal_dpto"] = false;
					$disables["legal_localidad"] = false;
					$disables["legal_cod_pos"] = false;
					$disables["legal_otro"] = false;
					$disables["boton_guardar_dos"] = false;
					$disables["paso_dos"] = false;

					$disables["administracion_calle"] = false;
					$disables["administracion_calle_num"] = false;
					$disables["administracion_telefono"] = false;
					$disables["administracion_prov"] = false;
					$disables["administracion_dpto"] = false;
					$disables["administracion_localidad"] = false;
					$disables["administracion_cod_pos"] = false;
					$disables["administracion_otro"] = false;
					$disables["boton_guardar_tres"] = false;
					$disables["paso_tres"] = false;

					$disables["num_exp"] = false;
					$disables["distrito"] = false;
					$disables["categoria"] = false;
					$disables["nombre_mina"] = false;
					$disables["descripcion_mina"] = false;
					$disables["resolucion_concesion"] = false;
					$disables["plano_mina"] = false;
					$disables["minerales"] = false;
					$disables["titulo"] = false;
					$disables["titulo_correccion"] = false;
					$disables["boton_guardar_cuatro"] = false;
					$disables["paso_cuatro"] = false;

					$disables["owner"] = false;
					$disables["arrendatario"] = false;
					$disables["concesionario"] = false;
					$disables["sustancias"] = false;
					$disables["otros"] = false;
					$disables["otros_correccion"] = true;

					$disables["concesion"] = false;
					$disables["contancias_canon"] = false;
					$disables["dia"] = false;
					$disables["iia"] = false;
					$disables["acciones"] = false;
					$disables["actividades"] = false;
					$disables["fecha_alta_dia"] = false;
					$disables["fecha_vencimiento_dia"] = false;
					$disables["boton_guardar_cinco"] = false;
					$disables["paso_cinco"] = false;

					$disables["ubicacion_prov"] = false;
					$disables["ubicacion_dpto"] = false;
					$disables["ubicacion_localidad"] = false;
					$disables["ubicacion_sistema"] = false;
					$disables["ubicacion_latitud"] = false;
					$disables["ubicacion_long"] = false;
					$disables["ubicacion_estado"] = false;
					$disables["boton_guardar_seis"] = false;
					$disables["paso_seis"] = false;

					$disables["estado"] = false;
					$disables["boton_actualizar"] = false;

					$mostrar["razon_social_correccion"] = false;
					$mostrar["email_correccion"] = false;
					$mostrar["cuit_correccion"] = false;
					$mostrar["num_prod_correccion"] = false;
					$mostrar["tipo_sociedad_correccion"] = false;
					$mostrar["inscripcion_dgr_correccion"] = false;
					$mostrar["cosntancia_sociedad_correccion"] = false;
					$mostrar["boton_guardar_uno"] = true;
					$mostrar["paso_uno"] = true;


					$mostrar["legal_calle_correccion"] = false;
					$mostrar["legal_calle_num_correccion"] = false;
					$mostrar["legal_telefono_correccion"] = false;
					$mostrar["legal_prov_correccion"] = false;
					$mostrar["legal_dpto_correccion"] = false;
					$mostrar["legal_localidad_correccion"] = false;
					$mostrar["legal_cod_pos_correccion"] = false;
					$mostrar["legal_otro_correccion"] = false;
					$mostrar["boton_guardar_dos"] = true;
					$mostrar["paso_dos"] = true;

					$mostrar["administracion_correccion"] = false;
					$mostrar["administracion_calle_num_correccion"] = false;
					$mostrar["administracion_telefono_correccion"] = false;
					$mostrar["administracion_prov_correccion"] = false;
					$mostrar["administracion_dpto_correccion"] = false;
					$mostrar["administracion_localidad_correccion"] = false;
					$mostrar["administracion_cod_pos_correccion"] = false;
					$mostrar["administracion_otro_correccion"] = false;
					$mostrar["boton_guardar_tres"] = true;
					$mostrar["paso_tres"] = true;

					$mostrar["num_exp_correccion"] = false;
					$mostrar["distrito_correccion"] = false;
					$mostrar["categoria_correccion"] = false;
					$mostrar["nombre_mina_correccion"] = false;
					$mostrar["descripcion_correccion"] = false;
					$mostrar["resolucion_concesion_correccion"] = false;
					$mostrar["plano_mina_correccion"] = false;
					$mostrar["minerales_correccion"] = false;
					$mostrar["titulo_correccion"] = false;
					$mostrar["boton_guardar_cuatro"] = true;
					$mostrar["paso_cuatro"] = true;


					$mostrar["owner_correccion"] = false;
					$mostrar["arrendatario_correccion"] = false;
					$mostrar["concesionario_correccion"] = false;
					$mostrar["sustancias_correccion"] = false;
					$mostrar["otros_correccion"] = false;
					$mostrar["concesion_correccion"] = false;
					$mostrar["constancias_canon_correccion"] = false;
					$mostrar["dia_correccion"] = false;
					$mostrar["iia_correccion"] = false;
					$mostrar["acciones_correccion"] = false;
					$mostrar["actividades_correccion"] = false;
					$mostrar["fecha_alta_dia_correccion"] = false;
					$mostrar["fecha_vencimiento_dia_correccion"] = false;
					$mostrar["boton_guardar_cinco"] = true;
					$mostrar["paso_cinco"] = true;

					$mostrar["ubicacion_prov_correccion"] = false;
					$mostrar["ubicacion_dpto_correccion"] = false;
					$mostrar["ubicacion_localidad_correccion"] = false;
					$mostrar["ubicacion_sistema_correccion"] = false;
					$mostrar["ubicacion_latitud_correccion"] = false;
					$mostrar["ubicacion_long_correccion"] = false;
					$mostrar["boton_guardar_seis"] = true;
					$mostrar["paso_seis"] = true;

					$mostrar["estado"] = true;

					$mostrar["boton_actualizar"] = true;

					$mostrar["alerta_puede_editar"] = true;


					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$disables["nombre_gestor"] = false;
						$disables["nombre_gestor_correccion"] = true;
						$disables["dni_gestor"] = false;
						$disables["dni_gestor_correccion"] = true;
						$disables["profesion_gestor"] = false;
						$disables["profesion_gestor_correccion"] = true;
						$disables["telefono_gestor"] = false;
						$disables["telefono_gestor_correccion"] = true;
						$disables["notificacion_gestor"] = false;
						$disables["notificacion_gestor_correccion"] = true;
						$disables["email_gestor"] = false;
						$disables["email_gestor_correccion"] = true;
						$disables["dni_productor"] = false;
						$disables["dni_productor_correccion"] = true;
						$disables["foto_productor"] = false;
						$disables["foto_productor_correccion"] = true;
						$disables["constancia_afip"] = false;
						$disables["constancia_afip_correccion"] =  true;
						$disables["autorizacion_gestor"] =  false;
						$disables["autorizacion_gestor_correccion"] =  true;
						$disables["paso_catamarca"] = false;
						$disables["boton_catamarca"] = false;

						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = false;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = false;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = false;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = false;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = false;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = false;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = false;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = false;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  false;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  false;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}

					if (Auth::user()->id_provincia == 50) // es de mendoza
					{

						$disables["decreto3737"] =  false;
						$disables["decreto3737_correccion"] =  true;
						$disables["situacion_mina"] =  false;
						$disables["situacion_mina_correccion"] =  true;
						$disables["concesion_minera_asiento_n"] =  false;
						$disables["concesion_minera_fojas"] =  false;
						$disables["concesion_minera_tomo_n"] =  false;
						$disables["concesion_minera_reg_m_y_d"] =  false;
						$disables["concesion_minera_reg_cant"] =  false;
						$disables["concesion_minera_reg_men"] =  false;
						$disables["concesion_minera_reg_d_y_c"] =  false;
						$disables["obs_datos_minas"] =  true;
						$disables["paso_mendoza"] =  false;
						$disables["boton_mendoza"] =  false;

						$mostrar["decreto3737"] = true;
						$mostrar["decreto3737_correccion"] = false;
						$mostrar["situacion_mina"] = true;
						$mostrar["situacion_mina_correccion"] = false;
						$mostrar["concesion_minera_asiento_n"] = true;
						$mostrar["concesion_minera_fojas"] = true;
						$mostrar["concesion_minera_tomo_n"] = true;
						$mostrar["concesion_minera_reg_m_y_d"] = true;
						$mostrar["concesion_minera_reg_cant"] = true;
						$mostrar["concesion_minera_reg_men"] = true;
						$mostrar["concesion_minera_reg_d_y_c"] = true;
						$mostrar["obs_datos_minas"] = false;
						$mostrar["paso_mendoza"] = true;
						$mostrar["boton_mendoza"] = true;
					}
				} elseif ($estado_formulario == 'en revision' || $estado_formulario == 'en proceso') {
					//CASO: Productor - Edicion - En revision
					//ed lo tiene la auotirdad minera y solo puede ver
					//le dejo los permisos de lectura no mas
					$disables["razon_social_correccion"] = false;
					$disables["email_correccion"] = false;
					$disables["cuit_correccion"] = false;
					$disables["num_prod_correccion"] = false;
					$disables["tipo_sociedad_correccion"] = false;
					$disables["inscripcion_dgr_correccion"] = false;
					$disables["cosntancia_sociedad_correccion"] = false;
					$disables["boton_guardar_uno"] = false;
					$disables["paso_uno"] = false;

					$disables["legal_calle_correccion"] = false;
					$disables["legal_calle_num_correccion"] = false;
					$disables["legal_telefono_correccion"] = false;
					$disables["legal_prov_correccion"] = false;
					$disables["legal_dpto_correccion"] = false;
					$disables["legal_localidad_correccion"] = false;
					$disables["legal_cod_pos_correccion"] = false;
					$disables["legal_otro_correccion"] = false;
					$disables["boton_guardar_dos"] = false;
					$disables["paso_dos"] = false;

					$disables["administracion_correccion"] = false;
					$disables["administracion_calle_num_correccion"] = false;
					$disables["administracion_telefono_correccion"] = false;
					$disables["administracion_prov_correccion"] = false;
					$disables["administracion_dpto_correccion"] = false;
					$disables["administracion_localidad_correccion"] = false;
					$disables["administracion_cod_pos_correccion"] = false;
					$disables["administracion_otro_correccion"] = false;
					$disables["boton_guardar_tres"] = false;
					$disables["paso_tres"] = false;

					$disables["num_exp_correccion"] = false;
					$disables["distrito_correccion"] = false;
					$disables["categoria_correccion"] = false;
					$disables["nombre_mina_correccion"] = false;
					$disables["descripcion_correccion"] = false;
					$disables["resolucion_concesion_correccion"] = false;
					$disables["plano_mina_correccion"] = false;
					$disables["minerales_correccion"] = false;
					$disables["titulo_correccion"] = false;
					$disables["boton_guardar_cuatro"] = false;
					$disables["paso_cuatro"] = false;

					$disables["owner_correccion"] = false;
					$disables["arrendatario_correccion"] = false;
					$disables["concesionario_correccion"] = false;
					$disables["sustancias_correccion"] = false;
					$disables["otros_correccion"] = false;
					$disables["concesion_correccion"] = false;
					$disables["constancias_canon_correccion"] = false;
					$disables["dia_correccion"] = false;
					$disables["iia_correccion"] = false;
					$disables["acciones_correccion"] = false;
					$disables["actividades_correccion"] = false;
					$disables["fecha_alta_dia_correccion"] = false;
					$disables["fecha_vencimiento_dia_correccion"] = false;
					$disables["boton_guardar_cinco"] = false;
					$disables["paso_cinco"] = false;

					$disables["ubicacion_prov_correccion"] = false;
					$disables["ubicacion_dpto_correccion"] = false;
					$disables["ubicacion_localidad_correccion"] = false;
					$disables["ubicacion_sistema_correccion"] = false;
					$disables["ubicacion_latitud_correccion"] = false;
					$disables["ubicacion_long_correccion"] = false;
					$disables["ubicacion_estado_correccion"] = false;
					$disables["boton_guardar_seis"] = false;
					$disables["paso_seis"] = false;

					$disables["estado"] = false;
					$disables["boton_actualizar"] = false;

					$mostrar["boton_guardar_uno"] = false;
					$mostrar["boton_guardar_dos"] = false;
					$mostrar["boton_guardar_tres"] = false;
					$mostrar["boton_guardar_cuatro"] = false;
					$mostrar["boton_guardar_cinco"] = false;
					$mostrar["boton_guardar_seis"] = false;
					$mostrar["boton_actualizar"] = false;

					$mostrar["alerta_puede_editar"] = false;


					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$disables["nombre_gestor_correccion"] = false;
						$disables["dni_gestor_correccion"] = false;
						$disables["profesion_gestor_correccion"] = false;
						$disables["telefono_gestor_correccion"] = false;
						$disables["notificacion_gestor_correccion"] = false;
						$disables["email_gestor_correccion"] = false;
						$disables["dni_productor_correccion"] = false;
						$disables["foto_productor_correccion"] = false;
						$disables["constancia_afip_correccion"] = false;
						$disables["autorizacion_gestor_correccion"] = false;
						$disables["paso_catamarca"] = false;
						$disables["boton_catamarca"] = false;

						$mostrar["paso_catamarca"] = false;
						$mostrar["boton_catamarca"] = false;
					}
					if (Auth::user()->id_provincia == 50) // es de mendoza
					{

						$disables["decreto3737"] =  true;
						$disables["decreto3737_correccion"] =  true;
						$disables["situacion_mina"] =  true;
						$disables["situacion_mina_correccion"] =  true;
						$disables["concesion_minera_asiento_n"] =  true;
						$disables["concesion_minera_fojas"] =  true;
						$disables["concesion_minera_tomo_n"] =  true;
						$disables["concesion_minera_reg_m_y_d"] =  true;
						$disables["concesion_minera_reg_cant"] =  true;
						$disables["concesion_minera_reg_men"] =  true;
						$disables["concesion_minera_reg_d_y_c"] =  true;
						$disables["obs_datos_minas"] =  true;
						$disables["paso_mendoza"] =  true;
						$disables["boton_mendoza"] =  true;

						$mostrar["decreto3737"] = true;
						$mostrar["decreto3737_correccion"] = true;
						$mostrar["situacion_mina"] = true;
						$mostrar["situacion_mina_correccion"] = true;
						$mostrar["concesion_minera_asiento_n"] = true;
						$mostrar["concesion_minera_fojas"] = true;
						$mostrar["concesion_minera_tomo_n"] = true;
						$mostrar["concesion_minera_reg_m_y_d"] = true;
						$mostrar["concesion_minera_reg_cant"] = true;
						$mostrar["concesion_minera_reg_men"] = true;
						$mostrar["concesion_minera_reg_d_y_c"] = true;
						$mostrar["obs_datos_minas"] = true;
						$mostrar["paso_mendoza"] = true;
						$mostrar["boton_mendoza"] = true;
					}
				} elseif ($estado_formulario == 'aprobado') {
					//CASO: Productor - Edicion - Aprobado
					//e.d. lo tiene la auotirdad minera y el productor
					//le dejo los permisos de lectura no mas
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
				} elseif ($estado_formulario == 'reprobado') {
					//CASO: Productor - Edicion - Reprobado
					//e.d. lo la auotirdad lo rechazo
					//le dejo los permisos de lectura no mas
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
				} elseif ($estado_formulario == 'con observacion') {
					//CASO: Productor - Edicion - Con Observacion
					//e.d. la autoridad minera lo evaluo y el productor tiene q arreglarlo
					// puede hacer lo de productor y ver lo de autoridad minera

					$disables["razon_social"] = false;
					$disables["email"] = false;
					$disables["cuit"] = false;
					$disables["num_prod"] = false;
					$disables["tipo_sociedad"] = false;
					$disables["inscripcion_dgr"] = false;
					$disables["constancia_sociedad"] = false;
					$disables["boton_guardar_uno"] = false;
					$disables["paso_uno"] = false;

					$disables["legal_calle"] = false;
					$disables["legal_calle_num"] = false;
					$disables["legal_telefono"] = false;
					$disables["legal_prov"] = false;
					$disables["legal_dpto"] = false;
					$disables["legal_localidad"] = false;
					$disables["legal_cod_pos"] = false;
					$disables["legal_otro"] = false;
					$disables["boton_guardar_dos"] = false;
					$disables["paso_dos"] = false;

					$disables["administracion_calle"] = false;
					$disables["administracion_calle_num"] = false;
					$disables["administracion_telefono"] = false;
					$disables["administracion_prov"] = false;
					$disables["administracion_dpto"] = false;
					$disables["administracion_localidad"] = false;
					$disables["administracion_cod_pos"] = false;
					$disables["administracion_otro"] = false;
					$disables["boton_guardar_tres"] = false;
					$disables["paso_tres"] = false;

					$disables["num_exp"] = false;
					$disables["distrito"] = false;
					$disables["categoria"] = false;
					$disables["nombre_mina"] = false;
					$disables["descripcion_mina"] = false;
					$disables["resolucion_concesion"] = false;
					$disables["plano_mina"] = false;
					$disables["minerales"] = false;
					$disables["titulo"] = false;
					$disables["titulo_correccion"] = false;
					$disables["boton_guardar_cuatro"] = false;
					$disables["paso_cuatro"] = false;

					$disables["owner"] = false;
					$disables["arrendatario"] = false;
					$disables["concesionario"] = false;
					$disables["sustancias"] = false;
					$disables["otros"] = false;

					$disables["concesion"] = false;
					$disables["contancias_canon"] = false;
					$disables["dia"] = false;
					$disables["iia"] = false;
					$disables["acciones"] = false;
					$disables["actividades"] = false;
					$disables["fecha_alta_dia"] = false;
					$disables["fecha_vencimiento_dia"] = false;
					$disables["boton_guardar_cinco"] = false;
					$disables["paso_cinco"] = false;

					$disables["ubicacion_prov"] = false;
					$disables["ubicacion_dpto"] = false;
					$disables["ubicacion_localidad"] = false;
					$disables["ubicacion_sistema"] = false;
					$disables["ubicacion_latitud"] = false;
					$disables["ubicacion_long"] = false;
					$disables["ubicacion_estado"] = false;
					$disables["boton_guardar_seis"] = false;
					$disables["paso_seis"] = false;

					$disables["estado"] = false;
					$disables["boton_actualizar"] = false;

					$mostrar["boton_guardar_uno"] = true;
					$mostrar["boton_guardar_dos"] = true;
					$mostrar["boton_guardar_tres"] = true;
					$mostrar["boton_guardar_cuatro"] = true;
					$mostrar["boton_guardar_cinco"] = true;
					$mostrar["boton_guardar_seis"] = true;
					$mostrar["boton_actualizar"] = true;

					$mostrar["alerta_puede_editar"] = true;


					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;

						$disables["nombre_gestor"] = false;
						$disables["nombre_gestor_correccion"] = true;
						$disables["dni_gestor"] = false;
						$disables["dni_gestor_correccion"] = true;
						$disables["profesion_gestor"] = false;
						$disables["profesion_gestor_correccion"] = true;
						$disables["telefono_gestor"] = false;
						$disables["telefono_gestor_correccion"] = true;
						$disables["notificacion_gestor"] = false;
						$disables["notificacion_gestor_correccion"] = true;
						$disables["email_gestor"] = false;
						$disables["email_gestor_correccion"] = true;
						$disables["dni_productor"] = false;
						$disables["dni_productor_correccion"] = true;
						$disables["foto_productor"] = false;
						$disables["foto_productor_correccion"] = true;
						$disables["constancia_afip"] = false;
						$disables["constancia_afip_correccion"] =  true;
						$disables["autorizacion_gestor"] =  false;
						$disables["autorizacion_gestor_correccion"] =  true;
						$disables["paso_catamarca"] = false;
						$disables["boton_catamarca"] = false;
					}
				}
			} elseif (Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Administrador')) {

				if ($estado_formulario == 'borrador') {
					//CASO: Autoridad - Edicion - Borrador
					//deshabilito todo lo q hacen los productores
					//deshabilito todo lo q hacen las autoridades mineras
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = false;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = false;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = false;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = false;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = false;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = false;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = false;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = false;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  false;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  false;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
				} elseif ($estado_formulario == 'en revision'  || $estado_formulario == 'en proceso') {
					//CASO: Autoridad - Edicion - En revision
					//ed lo tiene la auotirdad minera y solo el la puede editar
					//habilito todo correcio, deshabilito todo inputs de prod
					$disables["razon_social_correccion"] = false;
					$disables["email_correccion"] = false;
					$disables["cuit_correccion"] = false;
					$disables["num_prod_correccion"] = false;
					$disables["tipo_sociedad_correccion"] = false;
					$disables["inscripcion_dgr_correccion"] = false;
					$disables["cosntancia_sociedad_correccion"] = false;
					$disables["boton_guardar_uno"] = false;
					$disables["paso_uno"] = false;

					$disables["legal_calle_correccion"] = false;
					$disables["legal_calle_num_correccion"] = false;
					$disables["legal_telefono_correccion"] = false;
					$disables["legal_prov_correccion"] = false;
					$disables["legal_dpto_correccion"] = false;
					$disables["legal_localidad_correccion"] = false;
					$disables["legal_cod_pos_correccion"] = false;
					$disables["legal_otro_correccion"] = false;
					$disables["boton_guardar_dos"] = false;
					$disables["paso_dos"] = false;

					$disables["administracion_correccion"] = false;
					$disables["administracion_calle_num_correccion"] = false;
					$disables["administracion_telefono_correccion"] = false;
					$disables["administracion_prov_correccion"] = false;
					$disables["administracion_dpto_correccion"] = false;
					$disables["administracion_localidad_correccion"] = false;
					$disables["administracion_cod_pos_correccion"] = false;
					$disables["administracion_otro_correccion"] = false;
					$disables["boton_guardar_tres"] = false;
					$disables["paso_tres"] = false;

					$disables["num_exp_correccion"] = false;
					$disables["distrito_correccion"] = false;
					$disables["categoria_correccion"] = false;
					$disables["nombre_mina_correccion"] = false;
					$disables["descripcion_correccion"] = false;
					$disables["resolucion_concesion_correccion"] = false;
					$disables["plano_mina_correccion"] = false;
					$disables["minerales_correccion"] = false;
					$disables["titulo_correccion"] = false;
					$disables["boton_guardar_cuatro"] = false;
					$disables["paso_cuatro"] = false;

					$disables["owner_correccion"] = false;
					$disables["arrendatario_correccion"] = false;
					$disables["concesionario_correccion"] = false;
					$disables["sustancias_correccion"] = false;
					$disables["otros_correccion"] = false;
					$disables["concesion_correccion"] = false;
					$disables["constancias_canon_correccion"] = false;
					$disables["dia_correccion"] = false;
					$disables["iia_correccion"] = false;
					$disables["acciones_correccion"] = false;
					$disables["actividades_correccion"] = false;
					$disables["fecha_alta_dia_correccion"] = false;
					$disables["fecha_vencimiento_dia_correccion"] = false;
					$disables["boton_guardar_cinco"] = false;
					$disables["paso_cinco"] = false;

					$disables["ubicacion_prov_correccion"] = false;
					$disables["ubicacion_dpto_correccion"] = false;
					$disables["ubicacion_localidad_correccion"] = false;
					$disables["ubicacion_sistema_correccion"] = false;
					$disables["ubicacion_latitud_correccion"] = false;
					$disables["ubicacion_long_correccion"] = false;
					$disables["ubicacion_estado_correccion"] = false;
					$disables["boton_guardar_seis"] = false;
					$disables["paso_seis"] = false;

					$disables["estado"] = false;
					$disables["boton_actualizar"] = false;

					$mostrar["boton_guardar_uno"] = true;
					$mostrar["boton_guardar_dos"] = true;
					$mostrar["boton_guardar_tres"] = true;
					$mostrar["boton_guardar_cuatro"] = true;
					$mostrar["boton_guardar_cinco"] = true;
					$mostrar["boton_guardar_seis"] = true;
					$mostrar["boton_actualizar"] = true;

					$mostrar["alerta_puede_editar"] = true;

					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$disables["nombre_gestor_correccion"] = false;
						$disables["dni_gestor_correccion"] = false;
						$disables["profesion_gestor_correccion"] = false;
						$disables["telefono_gestor_correccion"] = false;
						$disables["notificacion_gestor_correccion"] = false;
						$disables["email_gestor_correccion"] = false;
						$disables["dni_productor_correccion"] = false;
						$disables["foto_productor_correccion"] = false;
						$disables["constancia_afip_correccion"] = false;
						$disables["autorizacion_gestor_correccion"] = false;
						$disables["paso_catamarca"] = false;
						$disables["boton_catamarca"] = false;

						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
					if (Auth::user()->id_provincia == 50) // es de mendoza
					{

						$disables["decreto3737"] =  true;
						$disables["decreto3737_correccion"] =  false;
						$disables["situacion_mina"] =  true;
						$disables["situacion_mina_correccion"] =  false;
						$disables["concesion_minera_asiento_n"] =  true;
						$disables["concesion_minera_fojas"] =  true;
						$disables["concesion_minera_tomo_n"] =  true;
						$disables["concesion_minera_reg_m_y_d"] =  true;
						$disables["concesion_minera_reg_cant"] =  true;
						$disables["concesion_minera_reg_men"] =  true;
						$disables["concesion_minera_reg_d_y_c"] =  true;
						$disables["obs_datos_minas"] =  false;
						$disables["paso_mendoza"] =  true;
						$disables["boton_mendoza"] =  true;

						$mostrar["decreto3737"] = true;
						$mostrar["decreto3737_correccion"] = true;
						$mostrar["situacion_mina"] = true;
						$mostrar["situacion_mina_correccion"] = true;
						$mostrar["concesion_minera_asiento_n"] = true;
						$mostrar["concesion_minera_fojas"] = true;
						$mostrar["concesion_minera_tomo_n"] = true;
						$mostrar["concesion_minera_reg_m_y_d"] = true;
						$mostrar["concesion_minera_reg_cant"] = true;
						$mostrar["concesion_minera_reg_men"] = true;
						$mostrar["concesion_minera_reg_d_y_c"] = true;
						$mostrar["obs_datos_minas"] = true;
						$mostrar["paso_mendoza"] = true;
						$mostrar["boton_mendoza"] = true;
					}
				} elseif ($estado_formulario == 'aprobado') {
					//CASO: Autoridad - Edicion - Aprobado
					//e.d. lo tiene la auotirdad minera y el productor
					//le dejo los permisos de lectura no mas
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
				} elseif ($estado_formulario == 'reprobado') {
					//CASO: Autoridad - Edicion - Reprobado
					//e.d. lo la auotirdad lo rechazo
					//le dejo los permisos de lectura no mas
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;
					}
				} elseif ($estado_formulario == 'con observacion') {
					//CASO: Autoridad - Edicion - Con Observacion
					//e.d. la autoridad minera lo evaluo y el productor tiene q arreglarlo
					// dejo los permisos de lectura no mas
					if (Auth::user()->id_provincia == 10) // es de catamarca
					{
						$mostrar["nombre_gestor"] = true;
						$mostrar["nombre_gestor_correccion"] = true;
						$mostrar["dni_gestor"] = true;
						$mostrar["dni_gestor_correccion"] = true;
						$mostrar["profesion_gestor"] = true;
						$mostrar["profesion_gestor_correccion"] = true;
						$mostrar["telefono_gestor"] = true;
						$mostrar["telefono_gestor_correccion"] = true;
						$mostrar["notificacion_gestor"] = true;
						$mostrar["notificacion_gestor_correccion"] = true;
						$mostrar["email_gestor"] = true;
						$mostrar["email_gestor_correccion"] = true;
						$mostrar["dni_productor"] = true;
						$mostrar["dni_productor_correccion"] = true;
						$mostrar["foto_productor"] = true;
						$mostrar["foto_productor_correccion"] = true;
						$mostrar["constancia_afip"] = true;
						$mostrar["constancia_afip_correccion"] =  true;
						$mostrar["autorizacion_gestor"] =  true;
						$mostrar["autorizacion_gestor_correccion"] =  true;
						$mostrar["paso_catamarca"] = true;
						$mostrar["boton_catamarca"] = true;

						$disables["nombre_gestor"] = false;
						$disables["nombre_gestor_correccion"] = true;
						$disables["dni_gestor"] = false;
						$disables["dni_gestor_correccion"] = true;
						$disables["profesion_gestor"] = false;
						$disables["profesion_gestor_correccion"] = true;
						$disables["telefono_gestor"] = false;
						$disables["telefono_gestor_correccion"] = true;
						$disables["notificacion_gestor"] = false;
						$disables["notificacion_gestor_correccion"] = true;
						$disables["email_gestor"] = false;
						$disables["email_gestor_correccion"] = true;
						$disables["dni_productor"] = false;
						$disables["dni_productor_correccion"] = true;
						$disables["foto_productor"] = false;
						$disables["foto_productor_correccion"] = true;
						$disables["constancia_afip"] = false;
						$disables["constancia_afip_correccion"] =  true;
						$disables["autorizacion_gestor"] =  false;
						$disables["autorizacion_gestor_correccion"] =  true;
						$disables["paso_catamarca"] = false;
						$disables["boton_catamarca"] = false;
					}
				}
			}
		} elseif ($pagina == 'nuevo') {
			dd("nuevo");
		}
		$a_devolver = [];
		$a_devolver['disables'] = $disables;
		$a_devolver['mostrar'] = $mostrar;
		return $a_devolver;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\FormAltaProductor  $formAltaProductor
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{

		//empiezo sin poder entrar
		$entro = false;
		$soy_administrador = false;
		$soy_autoridad_minera = false;
		$soy_productor = false;

		//filtro por autoridad minera o autoridad
		//pregunto si soy admin
		if (Auth::user()->hasRole('Administrador')) {
			$soy_administrador = true;
			$soy_autoridad_minera = true;
			$soy_productor = true;
			$entro = true;
		} elseif (Auth::user()->hasRole('Autoridad')) {
			//soy autoridad minera, entonces traigo todo de mi prov
			$soy_administrador = false;
			$soy_autoridad_minera = true;
			$soy_productor = false;
			$entro = true;
		} else {
			//soy productor, entonces traigo solo mis borradores
			$borradores = FormAltaProductor::select('*')->where('provincia', '=', Auth::user()->id_provincia)->where('created_by', '=', Auth::user()->id);
			$entro = true;
			$soy_administrador = false;
			$soy_autoridad_minera = false;
			$soy_productor = true;
		}

		if ($entro) {
			$borradores = FormAltaProductor::find($id);
			$borradores = $this->prasar_num_a_boolean($borradores);
			$minerales_asociados = Minerales_Borradores::select('*')->where('id_formulario', '=', $id)->get();

			$datos_creador = User::find($borradores->created_by);

			$datos_disables_mostrar = $this->dame_los_permisos_de_los_inputs('editar', $borradores->estado);

			if (is_null($borradores->razon_social_correcto))
				$borradores->razon_social_correcto = 'nada';
			elseif (intval($borradores->razon_social_correcto) == 1)
				$borradores->razon_social_correcto = true;
			else $borradores->razon_social_correcto = false;

			//ar_dump($borradores->razon_social_correcto);die();
			if (is_null($borradores->email_correcto))
				$borradores->email_correcto = 'nada';
			elseif (intval($borradores->email_correcto) == 1)
				$borradores->email_correcto = true;
			else $borradores->email_correcto = false;

			if (is_null($borradores->cuit_correcto))
				$borradores->cuit_correcto = 'nada';
			elseif (intval($borradores->cuit_correcto) == 1)
				$borradores->cuit_correcto = true;
			else $borradores->cuit_correcto = false;

			if (is_null($borradores->numeroproductor_correcto))
				$borradores->numeroproductor_correcto = 'nada';
			elseif (intval($borradores->numeroproductor_correcto) == 1)
				$borradores->numeroproductor_correcto = true;
			else $borradores->numeroproductor_correcto = false;

			if (is_null($borradores->tiposociedad_correcto))
				$borradores->tiposociedad_correcto = 'nada';
			elseif (intval($borradores->tiposociedad_correcto) == 1)
				$borradores->tiposociedad_correcto = true;
			else $borradores->tiposociedad_correcto = false;

			if (is_null($borradores->inscripciondgr_correcto))
				$borradores->inscripciondgr_correcto = 'nada';
			elseif (intval($borradores->inscripciondgr_correcto) == 1)
				$borradores->inscripciondgr_correcto = true;
			else $borradores->inscripciondgr_correcto = false;



			if (is_null($borradores->constaciasociedad_correcto))
				$borradores->constaciasociedad_correcto = 'nada';
			elseif (intval($borradores->constaciasociedad_correcto) == 1)
				$borradores->constaciasociedad_correcto = true;
			else $borradores->constaciasociedad_correcto = false;
			$borradores->constanciasociedad_correcto = $borradores->constaciasociedad_correcto;

			if (is_null($borradores->leal_departamento_correcto))
				$borradores->leal_departamento_correcto = 'nada';
			elseif (intval($borradores->leal_departamento_correcto) == 1)
				$borradores->leal_departamento_correcto = true;
			else $borradores->leal_departamento_correcto = false;

			if (is_null($borradores->owner_correcto))
				$borradores->owner_correcto = 'nada';
			elseif (intval($borradores->owner_correcto) == 1)
				$borradores->owner_correcto = true;
			else $borradores->owner_correcto = false;

			if (is_null($borradores->arrendatario_correcto))
				$borradores->arrendatario_correcto = 'nada';
			elseif (intval($borradores->arrendatario_correcto) == 1)
				$borradores->arrendatario_correcto = true;
			else $borradores->arrendatario_correcto = false;

			if (is_null($borradores->concesionario_correcto))
				$borradores->concesionario_correcto = 'nada';
			elseif (intval($borradores->concesionario_correcto) == 1)
				$borradores->concesionario_correcto = true;
			else $borradores->concesionario_correcto = false;

			if (is_null($borradores->otros_correcto))
				$borradores->otros_correcto = 'nada';
			elseif (intval($borradores->otros_correcto) == 1)
				$borradores->otros_correcto = true;
			else $borradores->otros_correcto = false;

			if (is_null($borradores->susteancias_de_aprovechamiento_comun_correcto))
				$borradores->susteancias_de_aprovechamiento_comun_correcto = 'nada';
			elseif (intval($borradores->susteancias_de_aprovechamiento_comun_correcto) == 1)
				$borradores->susteancias_de_aprovechamiento_comun_correcto = true;
			else $borradores->susteancias_de_aprovechamiento_comun_correcto = false;

			if (is_null($borradores->administracion_telefono_correcto))
				$borradores->administracion_telefono_correcto = 'nada';
			elseif (intval($borradores->administracion_telefono_correcto) == 1)
				$borradores->administracion_telefono_correcto = true;
			elseif (intval($borradores->administracion_telefono_correcto) == 0)
				$borradores->administracion_telefono_correcto = false;

			if (is_null($borradores->resolucion_concesion_minera_correcto))
				$borradores->resolucion_concesion_minera_correcto = 'nada';
			elseif (intval($borradores->resolucion_concesion_minera_correcto) == 1)
				$borradores->resolucion_concesion_minera_correcto = true;
			elseif (intval($borradores->resolucion_concesion_minera_correcto) == 0)
				$borradores->resolucion_concesion_minera_correcto = false;


			if (is_null($borradores->plano_inmueble_correcto))
				$borradores->plano_inmueble_correcto = 'nada';
			elseif (intval($borradores->plano_inmueble_correcto) == 1)
				$borradores->plano_inmueble_correcto = true;
			elseif (intval($borradores->plano_inmueble_correcto) == 0)
				$borradores->plano_inmueble_correcto = false;

			if (is_null($borradores->titulo_contrato_posecion_correcto))
				$borradores->titulo_contrato_posecion_correcto = 'nada';
			elseif (intval($borradores->titulo_contrato_posecion_correcto) == 1)
				$borradores->titulo_contrato_posecion_correcto = true;
			elseif (intval($borradores->titulo_contrato_posecion_correcto) == 0)
				$borradores->titulo_contrato_posecion_correcto = false;
			//dd($borradores->resolucion_concesion_minera_correcto);

			if (is_null($borradores->owner_correcto))
				$borradores->owner_correcto = 'nada';
			elseif (intval($borradores->owner_correcto) == 1)
				$borradores->owner_correcto = true;
			elseif (intval($borradores->owner_correcto) == 0)
				$borradores->owner_correcto = false;

			if (is_null($borradores->arrendatario_correcto))
				$borradores->arrendatario_correcto = 'nada';
			elseif (intval($borradores->arrendatario_correcto) == 1)
				$borradores->arrendatario_correcto = true;
			elseif (intval($borradores->arrendatario_correcto) == 0)
				$borradores->concesionario_correcto = false;

			if (is_null($borradores->concesionario_correcto))
				$borradores->concesionario_correcto = 'nada';
			elseif (intval($borradores->concesionario_correcto) == 1)
				$borradores->concesionario_correcto = true;
			elseif (intval($borradores->concesionario_correcto) == 0)
				$borradores->concesionario_correcto = false;

			if (is_null($borradores->otros_correcto))
				$borradores->otros_correcto = 'nada';
			elseif (intval($borradores->otros_correcto) == 1)
				$borradores->otros_correcto = true;
			elseif (intval($borradores->otros_correcto) == 0)
				$borradores->otros_correcto = false;

			if (is_null($borradores->sustancias_correcto))
				$borradores->sustancias_correcto = 'nada';
			elseif (intval($borradores->sustancias_correcto) == 1)
				$borradores->sustancias_correcto = true;
			elseif (intval($borradores->sustancias_correcto) == 0)
				$borradores->sustancias_correcto = false;

			//dd($borradores->dia_correcto,$borradores->iia_correcto );

			if (is_null($borradores->iia_correcto))
				$borradores->iia_correcto = 'nada';
			elseif (intval($borradores->iia_correcto) == 1)
				$borradores->iia_correcto = true;
			elseif (intval($borradores->iia_correcto) == 0)
				$borradores->iia_correcto = false;

			if (is_null($borradores->dia_correcto))
				$borradores->dia_correcto = 'nada';
			elseif (intval($borradores->dia_correcto) == 1)
				$borradores->dia_correcto = true;
			elseif (intval($borradores->dia_correcto) == 0)
				$borradores->dia_correcto = false;

			if (is_null($borradores->acciones_a_desarrollar_correcto))
				$borradores->acciones_a_desarrollar_correcto = 'nada';
			elseif (intval($borradores->acciones_a_desarrollar_correcto) == 1)
				$borradores->acciones_a_desarrollar_correcto = true;
			elseif (intval($borradores->acciones_a_desarrollar_correcto) == 0)
				$borradores->acciones_a_desarrollar_correcto = false;

			if (is_null($borradores->actividad_correcto))
				$borradores->actividad_correcto = 'nada';
			elseif (intval($borradores->actividad_correcto) == 1)
				$borradores->actividad_correcto = true;
			elseif (intval($borradores->actividad_correcto) == 0)
				$borradores->actividad_correcto = false;

			if (is_null($borradores->fecha_alta_dia_correcto))
				$borradores->fecha_alta_dia_correcto = 'nada';
			elseif (intval($borradores->fecha_alta_dia_correcto) == 1)
				$borradores->fecha_alta_dia_correcto = true;
			elseif (intval($borradores->fecha_alta_dia_correcto) == 0)
				$borradores->fecha_alta_dia_correcto = false;

			if (is_null($borradores->fecha_vencimiento_dia_correcto))
				$borradores->fecha_vencimiento_dia_correcto = 'nada';
			elseif (intval($borradores->fecha_vencimiento_dia_correcto) == 1)
				$borradores->fecha_vencimiento_dia_correcto = true;
			elseif (intval($borradores->fecha_vencimiento_dia_correcto) == 0)
				$borradores->fecha_vencimiento_dia_correcto = false;


			/* dd($borradores->decreto3737_correcto); */
			return Inertia::render('Productors/EditForm', [
				'productor' => $borradores,
				'lista_minerales_cargados' => $minerales_asociados,
				'creado' => $datos_creador,
				"soy_administrador" => $soy_administrador,
				"soy_autoridad_minera" => $soy_autoridad_minera,
				"soy_productor" => $soy_productor,
				"disables" => $datos_disables_mostrar["disables"],
				"mostrar" => $datos_disables_mostrar["mostrar"],
			]);
		} else {
			return Inertia::render('Common/SinPermisos');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\FormAltaProductor  $formAltaProductor
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, FormAltaProductor $formAltaProductor)
	{
		//
		$formAltaProductor->update($request->all());
		return FormAltaProductor::route('formulario-alta.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\FormAltaProductor  $formAltaProductor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//dd($id);
		$formAltaProductor = FormAltaProductor::find($id)->delete();
		return response()->json([
			'status' => 'ok',
			'msg' => 'se elimino correctamente',
			'id_eliminado' => $id
		], 201);

		return Redirect::route('formulario-alta.index');
		// $borradores = FormAltaProductor::all();
		// return Inertia::render('Productors/List', ['borradores' => $borradores]);
	}

	public function mostrar_formulario()
	{
		//var_dump(Storage::url('files_formularios/ochamplin@gmail.com/uH41Q62Dg3UogcroIQmvybBLNKRocjJZOxE4SGrA.pdf'));die();
		$characters_numeros = '1234567890';
		$charactersLength_numeros = strlen($characters_numeros);


		$randomString_numeros = '';
		for ($i = 0; $i < 8; $i++) {
			$randomString_numeros .= $characters_numeros[rand(0, $charactersLength_numeros - 1)];
		}

		$faker = Faker::create();
		$nombre = $faker->firstNameFemale;
		$apellido = $faker->lastName;
		$cuit = '20-' . $randomString_numeros . '-7';
		$telefono = $faker->tollFreePhoneNumber;
		$email = $faker->email;
		$domicilio = $faker->streetAddress;

		return view("wizard.prueba_wizard")
			->with('nombre', $nombre)
			->with('apellido', $apellido)
			->with('cuit', $cuit)
			->with('telefono', $telefono)
			->with('email', $email)
			->with('domicilio', $domicilio);
	}


	public function validar_email_productor(Request $request)
	{
		//var_dump($request->email);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$codigo = Str::random(25);


		$email_nuevo = new EmailsAConfirmar;
		$email_nuevo->email = $request->email;
		$email_nuevo->codigo = $codigo;
		$email_nuevo->confirmed_at = null;
		$resultado_uno = $email_nuevo->save();


		//$to_email = "diegochecarelli@gmail.com"; // esto en desarrollo


		//en produccion, descomentar
		Mail::to($request->email)->send(new ValidarEmailProductorPrimeraVez(
			$request->email,
			date("Y-m-d H:i:s"),
			$codigo
		));
		return response()->json("todo bien");
	}


	public function validar_cuit_prod_reinscripcion(Request $request)
	{
		//var_dump($request->cuit);die();
		$email = Productors::select('*')->where('cuit', '=', $request->cuit)->first();
		//var_dump($email);
		//die();
		if ($email != null) {
			return response()->json($email);
		} else {
			return response()->json("mal");
		}
	}

	public function validar_mina_prod_reinscripcion(Request $request)
	{
		//var_dump("expression");die();
		//$email = Productors::select('*')->where('numero_expdiente', '=', $request->num_exp)->first();
		$email = MinaCantera::select('*')->where('distrito_minero', '=', $request->num_exp)->first();
		//var_dump($email->razonsocial);
		//die();
		if ($email != null) {
			return response()->json($email);
		} else {
			return response()->json("mal");
		}
	}


	public function formulario_listo(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $request->email)->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			$formulario_provisorio->estado = "presentado";
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();

			//aviso por emial al productor
			Mail::to($formulario_provisorio->email)->send(new AvisoFormularioPresentadoEmail(
				$request->email,
				$formulario_provisorio->razonsocial,
				$formulario_provisorio->id,
				date("d/m/Y H:i:s")
			));
			return response()->json('todo bien');
		} else return response()->json("email incorrecto");
	}

	public function buscar_datos_formulario_por_email(Request $request)
	{
		//var_dump($request->email);die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $request->email)->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			if ($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr =  str_replace("public", "storage", $formulario_provisorio->inscripciondgr);
			if ($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad =  str_replace("public", "storage", $formulario_provisorio->constaciasociedad);
			if ($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble =  str_replace("public", "storage", $formulario_provisorio->plano_inmueble);
			if ($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion =  str_replace("public", "storage", $formulario_provisorio->titulo_contrato_posecion);
			if ($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera	 =  str_replace("public", "storage", $formulario_provisorio->resolucion_concesion_minera);
			if ($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon =  str_replace("public", "storage", $formulario_provisorio->constancia_pago_canon);
			if ($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia	 =  str_replace("public", "storage", $formulario_provisorio->iia);
			if ($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia	 =  str_replace("public", "storage", $formulario_provisorio->dia);
			if ($formulario_provisorio->fecha_alta_dia	 != null)
				$formulario_provisorio->fecha_alta_dia	 = date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia));
			if ($formulario_provisorio->fecha_vencimiento_dia	 != null)
				$formulario_provisorio->fecha_vencimiento_dia	 = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia));
			return response()->json($formulario_provisorio);
		} else return response()->json("no esta");
	}


	public function guardar_paso_uno(Request $request)
	{
		//var_dump($request->email);

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'razonsocial', 'cuit', 'numeroproductor', 'tiposociedad',	'email', 'inscripciondgr', 'constaciasociedad')
			->where('email', '=', $request->email)->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			$formulario_provisorio->tipo_productor = $request->tipo_productor;
			$formulario_provisorio->razonsocial = $request->razon_social;
			$formulario_provisorio->cuit = $request->cuit;
			$formulario_provisorio->numeroproductor = $request->num_productor;
			$formulario_provisorio->tiposociedad = $request->tipo_sociedad;
			$formulario_provisorio->email = $request->email;
			$formulario_provisorio->inscripciondgr = $request->inscricion_dgr;
			$formulario_provisorio->constaciasociedad = $request->constancia_sociedad;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json("se actualizaron los datos correctamente");
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if ($email != null) {
				//tengo email , reviso si no esta cofnirmado o si
				if ($email->confirmed_at	!= null) {
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					//$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					//$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("se creo el formulario y se guardo correctamente");
				} else {
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*/
					return response()->json("mande un email de mentira");
				}
			} else {
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}

	public function guardar_paso_dos(Request $request)
	{
		//var_dump($request->email);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'leal_calle', 'leal_numero', 'leal_telefono', 'leal_pais', 'leal_provincia', 'leal_departamento', 'leal_localidad', 'leal_cp', 'leal_otro', 'email')
			->where('email', '=', $request->email)
			->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			$formulario_provisorio->leal_calle = $request->domicilio_legal_calle;
			$formulario_provisorio->leal_numero = $request->domicilio_legal_calle_numero;
			$formulario_provisorio->leal_telefono = $request->domicilio_legal_telefono;
			$formulario_provisorio->leal_pais = $request->domicilio_legal_pais;
			$formulario_provisorio->leal_provincia = $request->domicilio_legal_provincia;
			$formulario_provisorio->leal_departamento = $request->domicilio_legal_departamento;
			$formulario_provisorio->leal_localidad = $request->domicilio_legal_localidad;
			$formulario_provisorio->leal_cp = $request->domicilio_legal_cp;
			$formulario_provisorio->leal_otro = $request->domicilio_legal_otro;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json("bien");
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if ($email != null) {
				//tengo email , reviso si no esta cofnirmado o si
				if ($email->confirmed_at	!= null) {
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("medio");
				} else {
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*/
					return response()->json("mande un email de mentira");
				}
			} else {
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}


	public function guardar_paso_tres(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'administracion_calle', 'administracion_numero', 'administracion_telefono', 'administracion_pais', 'administracion_provincia', 'administracion_departamento', 'administracion_localidad', 'administracion_cp', 'administracion_otro', 'email')
			->where('email', '=', $request->email)
			->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			$formulario_provisorio->administracion_calle = $request->domicilio_administrativo_calle;
			$formulario_provisorio->administracion_numero = $request->domicilio_administrativo_calle_numero;
			$formulario_provisorio->administracion_telefono = $request->domicilio_administrativo_telefono;
			$formulario_provisorio->administracion_pais = $request->domicilio_administrativo_pais;
			$formulario_provisorio->administracion_provincia = $request->domicilio_administrativo_provincia;
			$formulario_provisorio->administracion_departamento = $request->domicilio_administrativo_departamento;
			$formulario_provisorio->administracion_localidad = $request->domicilio_administrativo_localidad;
			$formulario_provisorio->administracion_cp = $request->domicilio_administrativo_cp;
			$formulario_provisorio->administracion_otro = $request->domicilio_administrativo_otro;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json(1); //"se actualizaron los datos correctamente"
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if ($email != null) {
				//tengo email , reviso si no esta cofnirmado o si
				if ($email->confirmed_at	!= null) {
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json(2); //"se creo el formulario y se guardo correctamente"
				} else {
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*/
					return response()->json(3); //"mande un email de mentira"
				}
			} else {
				return response()->json(4); //"formulario no encontrado ni tampoco email"
			}
		}
	}


	public function guardar_paso_cuatro(Request $request)
	{
		// dd("gola");
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'numero_expdiente', 'distrito_minero', 'categoria', 'nombre_mina', 'descripcion_mina', 'mina_cantera', 'plano_inmueble', 'minerales_variedad', 'email')
			->where('email', '=', $request->email)
			->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			$formulario_provisorio->mina_cantera = $request->mina_mina_cantera;
			$formulario_provisorio->numero_expdiente = $request->mina_numero_expediente;
			$formulario_provisorio->distrito_minero = $request->mina_distrito_minero;
			$formulario_provisorio->descripcion_mina = $request->mina_descripcion_mina;
			$formulario_provisorio->nombre_mina = $request->mina_nombre_mina;
			//$formulario_provisorio->plano_inmueble = $request->mina_plano_inmueble;
			$formulario_provisorio->categoria = $request->mina_categoria_m_c;
			$formulario_provisorio->minerales_variedad = $request->mina_minerales;

			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json("se actualizaron los datos correctamente");
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if ($email != null) {
				//tengo email , reviso si no esta cofnirmado o si
				if ($email->confirmed_at	!= null) {
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("se creo el formulario y se guardo correctamente");
				} else {
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*/
					return response()->json("mande un email de mentira");
				}
			} else {
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}


	public function guardar_paso_cinco(Request $request)
	{
		// Validate (size is in KB)
		// $request->validate([
		// 	'photo' => 'required|file|image|size:1024|dimensions:max_width=500,max_height=500',
		// ]);

		// Read file contents...

		$contents = file_get_contents($request->archivo->path());
		$resultado = Storage::put('public/test', $request->archivo);


		//contents = file_get_contents($request->photo->path());

		// ...or just move it somewhere else (eg: local `storage` directory or S3)
		//$newPath = $request->photo->store('photos', 's3');

		//$contents = file_get_contents($request->archivo->path());
		//$resultado = Storage::put('test', $request->archivo);
		var_dump($resultado);


		/*
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id','owner','arrendatario','concesionario','otros','acciones_a_desarrollar','actividad','fecha_alta_dia', 'fecha_vencimiento_dia', 'email')
		->where('email', '=',$request->email)
		->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
			//lo encontre y actualizo
			$formulario_provisorio->owner = $request->owner;
			$formulario_provisorio->arrendatario = $request->arrendatario;
			$formulario_provisorio->concesionario = $request->concesionario;
			$formulario_provisorio->otros = $request->otros;
			$formulario_provisorio->acciones_a_desarrollar = $request->acciones_a_desarrollar;
			$formulario_provisorio->actividad = $request->actividad;

			$formulario_provisorio->fecha_alta_dia = $request->fecha_incio;
			$formulario_provisorio->fecha_vencimiento_dia = $request->fecha_fin;

			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json("se actualizaron los datos correctamente");
		}
		else
		{
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if($email != null)
			{
				//tengo email , reviso si no esta cofnirmado o si
				if($email->confirmed_at	!= null)
				{
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("se creo el formulario y se guardo correctamente");
				}
				else
				{
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*
					return response()->json("mande un email de mentira");
				}

			}
			else
			{
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
		*/
	}

	public function guardar_paso_seis(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'localidad_mina_pais', 'localidad_mina_provincia', 'localidad_mina_departamento', 'localidad_mina_localidad', 'tipo_sistema', 'longitud', 'latitud', 'email')
			->where('email', '=', $request->email)
			->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			$formulario_provisorio->localidad_mina_pais = $request->pais_mina;
			$formulario_provisorio->localidad_mina_provincia = $request->provincia_mina;
			$formulario_provisorio->localidad_mina_departamento = $request->departamento_mina;
			$formulario_provisorio->localidad_mina_localidad = $request->localidad_mina;
			$formulario_provisorio->tipo_sistema = $request->tipo_sistema;
			$formulario_provisorio->latitud = $request->latitud;
			$formulario_provisorio->longitud = $request->longitud;

			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			return response()->json("se actualizaron los datos correctamente");
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			if ($email != null) {
				//tengo email , reviso si no esta cofnirmado o si
				if ($email->confirmed_at	!= null) {
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("se creo el formulario y se guardo correctamente");
				} else {
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));*/
					return response()->json("mande un email de mentira");
				}
			} else {
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}



	public function preguntar_email_confirmado(Request $request)
	{
		//var_dump($request->email);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
		if ($email->confirmed_at == null) {
			return response()->json("sin confirmar");
		} else {
			return response()->json("ya confirmado");
		}
	}
	public function confirmando_email_productor($codigo_buscado)
	{
		$email = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo_buscado)->first();
		if ($email != null) {
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$email->confirmed_at = date("Y-m-d H:i:s");
			$email->codigo = null;
			return response()->json("confirmado exitosamente");
		} else {
			return response()->json("email no encontrado");
		}
	}
	public function validar_email_desde_email($codigo)
	{
		//var_dump("expression");die();
		$email = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo)->first();
		if ($email != null) {
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$email->confirmed_at = date("Y-m-d H:i:s");
			$email->codigo = null;
			return view("confirmation.index");
		} else {
			return view("confirmation.codigo_incorrecto");
		}
	}

	public function lista_productores_api()
	{

		return FormAltaProductor::all();
	}


	public function recibo(Request $request)
	{
		//busco si el email tiene cargado un registro
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $request->email)
			->first();
		if ($formulario_provisorio != null) {
			//significa que tengo un registro ya guardado en el bd
			//guardo el archivo en el storage
			$contents = file_get_contents($request->archivo->path());
			$resultado = Storage::put('public/files_formularios' . '/' . $request->email, $request->archivo);
			if ($request->nombre_archivo == 'inscripcion_dgr') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->inscripciondgr = $resultado;
				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'constancia_sociedad') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->constaciasociedad = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'plano_inmueble') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->plano_inmueble = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'contrato') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->titulo_contrato_posecion = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'concesion') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->resolucion_concesion_minera	 = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'canon') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->constancia_pago_canon	 = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'iia') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->iia	 = $resultado;

				$formulario_provisorio->save();
			} elseif ($request->nombre_archivo == 'dia') {
				// guardo el nombre del archivo en el registro provisorio
				$formulario_provisorio->dia	 = $resultado;

				$formulario_provisorio->save();
			}

			$resultado =  str_replace("public", "storage", $resultado);
			return response()->json($resultado);
		} else
			return response()->json("sin email");
	}

	public function buscador_de_id(Request $request)
	{
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $request->email)->first();
		if ($formulario_provisorio != null)
			return response()->json($formulario_provisorio->id);
		else response()->json(false);
	}
	public function descargar_formulario($id)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::find($id);
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			if ($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if ($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if ($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if ($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if ($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if ($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if ($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if ($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if ($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia));
			if ($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia));
			$data = [
				'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
				'date_generado' => date('d/m/Y'),
				//1
				'razon_social' =>  $formulario_provisorio->razon_social,
				'ciut' =>  $formulario_provisorio->cuit,
				'numeroproductor' => $formulario_provisorio->numeroproductor,
				'tiposociedad' => $formulario_provisorio->tiposociedad,
				'email' => $formulario_provisorio->email,
				'inscripciondgr' => $formulario_provisorio->inscripciondgr,
				'constaciasociedad' => $formulario_provisorio->constaciasociedad,

				//2
				'leal_calle' => $formulario_provisorio->leal_calle,
				'leal_numero' => $formulario_provisorio->leal_numero,
				'leal_telefono' => $formulario_provisorio->leal_telefono,
				'leal_pais' => $formulario_provisorio->leal_pais,
				'leal_provincia' => $formulario_provisorio->leal_provincia,
				'leal_departamento' => $formulario_provisorio->leal_departamento,
				'leal_localidad' => $formulario_provisorio->leal_localidad,
				'leal_cp' => $formulario_provisorio->leal_cp,
				'leal_otro' => $formulario_provisorio->leal_otro,

				//3
				'administracion_calle' => $formulario_provisorio->administracion_calle,
				'administracion_numero' => $formulario_provisorio->administracion_numero,
				'administracion_telefono' => $formulario_provisorio->administracion_telefono,
				'administracion_pais' => $formulario_provisorio->administracion_pais,
				'administracion_provincia' => $formulario_provisorio->administracion_provincia,
				'administracion_departamento' => $formulario_provisorio->administracion_departamento,
				'administracion_localidad' => $formulario_provisorio->administracion_localidad,
				'administracion_cp' => $formulario_provisorio->administracion_cp,
				'administracion_otro' => $formulario_provisorio->administracion_otro,

				//4
				'mina_cantera' => $formulario_provisorio->mina_cantera,
				'numero_expdiente' => $formulario_provisorio->numero_expdiente,
				'distrito_minero' => $formulario_provisorio->distrito_minero,
				'descripcion_mina' => $formulario_provisorio->descripcion_mina,
				'nombre_mina' => $formulario_provisorio->nombre_mina,
				'categoria' => $formulario_provisorio->categoria,
				'minerales_variedad' => $formulario_provisorio->minerales_variedad,

				//5
				'owner' => $formulario_provisorio->owner,
				'arrendatario' => $formulario_provisorio->arrendatario,
				'concesionario' => $formulario_provisorio->concesionario,
				'otros' => $formulario_provisorio->otros,
				'acciones_a_desarrollar' => $formulario_provisorio->acciones_a_desarrollar,
				'actividad' => $formulario_provisorio->actividad,
				'fecha_alta_dia' => $formulario_provisorio->fecha_alta_dia,
				'fecha_vencimiento_dia' => $formulario_provisorio->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
				'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
				'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
				'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
				'tipo_sistema' => $formulario_provisorio->tipo_sistema,
				'latitud' => $formulario_provisorio->latitud,
				'longitud' => $formulario_provisorio->longitud,

				//7
				'updated_at' => $formulario_provisorio->updated_at,
			];
			$pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);
			return $pdf->download('formulario_' . $formulario_provisorio->id . '.pdf');
		} else response()->json(false);
	}


	public function ejemplo_pdf_prueba()
	{
		$email  = "ochamplin@gmail.com";

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $email)->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			if ($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if ($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if ($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if ($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if ($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if ($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if ($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if ($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if ($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia));
			if ($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia));
			$data = [
				'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
				'date_generado' => date('d/m/Y'),
				//1
				'razon_social' =>  $formulario_provisorio->razon_social,
				'ciut' =>  $formulario_provisorio->cuit,
				'numeroproductor' => $formulario_provisorio->numeroproductor,
				'tiposociedad' => $formulario_provisorio->tiposociedad,
				'email' => $formulario_provisorio->email,
				'inscripciondgr' => $formulario_provisorio->inscripciondgr,
				'constaciasociedad' => $formulario_provisorio->constaciasociedad,

				//2
				'leal_calle' => $formulario_provisorio->leal_calle,
				'leal_numero' => $formulario_provisorio->leal_numero,
				'leal_telefono' => $formulario_provisorio->leal_telefono,
				'leal_pais' => $formulario_provisorio->leal_pais,
				'leal_provincia' => $formulario_provisorio->leal_provincia,
				'leal_departamento' => $formulario_provisorio->leal_departamento,
				'leal_localidad' => $formulario_provisorio->leal_localidad,
				'leal_cp' => $formulario_provisorio->leal_cp,
				'leal_otro' => $formulario_provisorio->leal_otro,

				//3
				'administracion_calle' => $formulario_provisorio->administracion_calle,
				'administracion_numero' => $formulario_provisorio->administracion_numero,
				'administracion_telefono' => $formulario_provisorio->administracion_telefono,
				'administracion_pais' => $formulario_provisorio->administracion_pais,
				'administracion_provincia' => $formulario_provisorio->administracion_provincia,
				'administracion_departamento' => $formulario_provisorio->administracion_departamento,
				'administracion_localidad' => $formulario_provisorio->administracion_localidad,
				'administracion_cp' => $formulario_provisorio->administracion_cp,
				'administracion_otro' => $formulario_provisorio->administracion_otro,

				//4
				'mina_cantera' => $formulario_provisorio->mina_cantera,
				'numero_expdiente' => $formulario_provisorio->numero_expdiente,
				'distrito_minero' => $formulario_provisorio->distrito_minero,
				'descripcion_mina' => $formulario_provisorio->descripcion_mina,
				'nombre_mina' => $formulario_provisorio->nombre_mina,
				'categoria' => $formulario_provisorio->categoria,
				'minerales_variedad' => $formulario_provisorio->minerales_variedad,

				//5
				'owner' => $formulario_provisorio->owner,
				'arrendatario' => $formulario_provisorio->arrendatario,
				'concesionario' => $formulario_provisorio->concesionario,
				'otros' => $formulario_provisorio->otros,
				'acciones_a_desarrollar' => $formulario_provisorio->acciones_a_desarrollar,
				'actividad' => $formulario_provisorio->actividad,
				'fecha_alta_dia' => $formulario_provisorio->fecha_alta_dia,
				'fecha_vencimiento_dia' => $formulario_provisorio->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
				'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
				'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
				'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
				'tipo_sistema' => $formulario_provisorio->tipo_sistema,
				'latitud' => $formulario_provisorio->latitud,
				'longitud' => $formulario_provisorio->longitud,

				//7
				'updated_at' => $formulario_provisorio->updated_at,
			];

			$pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);

			//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
			return $pdf->stream('formulario_.pdf');
		} else response()->json("error en el email");
	}

	public function ejemplo_pdf_prueba_reinscripcion()
	{
		$email  = "ochamplin@gmail.com";
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		// $formulario_provisorio = FormAltaProductor::select('*')
		// ->where('email', '=',$email)->first();
		// //var_dump($formulario_provisorio->id);
		// if($formulario_provisorio != null)
		// {
		// 	//modifico la path de los archivos
		// 	if($formulario_provisorio->inscripciondgr != null)
		// 		$formulario_provisorio->inscripciondgr = "si posee";
		// 	if($formulario_provisorio->constaciasociedad != null)
		// 		$formulario_provisorio->constaciasociedad = "si posee";
		// 	if($formulario_provisorio->plano_inmueble != null)
		// 		$formulario_provisorio->plano_inmueble = "si posee";
		// 	if($formulario_provisorio->titulo_contrato_posecion != null)
		// 		$formulario_provisorio->titulo_contrato_posecion = "si posee";
		// 	if($formulario_provisorio->resolucion_concesion_minera	 != null)
		// 		$formulario_provisorio->resolucion_concesion_minera = "si posee";
		// 	if($formulario_provisorio->constancia_pago_canon != null)
		// 		$formulario_provisorio->constancia_pago_canon = "si posee";
		// 	if($formulario_provisorio->iia	 != null)
		// 		$formulario_provisorio->iia = "si posee";
		// 	if($formulario_provisorio->dia	 != null)
		// 		$formulario_provisorio->dia = "si posee";
		// 	if($formulario_provisorio->fecha_alta_dia != null)
		// 		$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia) ); 
		// 	if($formulario_provisorio->fecha_vencimiento_dia != null)
		// 		$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia) ); 
		$data = [
			'date_generado' => date('d/m/Y'),
			//1
			'razon_social' =>  "Barrick de San juan",
			'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este",
			'leal_numero' => 184,
			'leal_telefono' => 1919815656,
			'leal_departamento' => "Chimbas",
			'leal_localidad' => "Chimbas City",
			'leal_cp' => 5236,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' => 18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' => 'zona 4'

			// //5
			// 'owner' =>$formulario_provisorio->owner,
			// 'arrendatario' =>$formulario_provisorio->arrendatario,
			// 'concesionario' =>$formulario_provisorio->concesionario,
			// 'otros' =>$formulario_provisorio->otros,
			// 'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			// 'actividad' =>$formulario_provisorio->actividad,
			// 'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			// 'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			// //6

			// 'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			// 'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			// 'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			// 'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			// 'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			// 'latitud' => $formulario_provisorio->latitud,
			// 'longitud' => $formulario_provisorio->longitud,

			// //7
			// 'updated_at' => $formulario_provisorio->updated_at ,
		];

		$pdf = PDF::loadView('pdfs.formulario_reinscripcion_productor', $data);

		//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
		return $pdf->stream('formulario_.pdf');
		//        }
		//else response()->json("error en el email");
	}
	public function pdf_sin_pdf()
	{
		$email  = "ochamplin@gmail.com";

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('email', '=', $email)->first();
		//var_dump($formulario_provisorio->id);
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			if ($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if ($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if ($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if ($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if ($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if ($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if ($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if ($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if ($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia));
			if ($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia));
			$data = [
				'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
				'date_generado' => date('d/m/Y'),
				//1
				'razon_social' =>  $formulario_provisorio->razon_social,
				'ciut' =>  $formulario_provisorio->cuit,
				'numeroproductor' => $formulario_provisorio->numeroproductor,
				'tiposociedad' => $formulario_provisorio->tiposociedad,
				'email' => $formulario_provisorio->email,
				'inscripciondgr' => $formulario_provisorio->inscripciondgr,
				'constaciasociedad' => $formulario_provisorio->constaciasociedad,

				//2
				'leal_calle' => $formulario_provisorio->leal_calle,
				'leal_numero' => $formulario_provisorio->leal_numero,
				'leal_telefono' => $formulario_provisorio->leal_telefono,
				'leal_pais' => $formulario_provisorio->leal_pais,
				'leal_provincia' => $formulario_provisorio->leal_provincia,
				'leal_departamento' => $formulario_provisorio->leal_departamento,
				'leal_localidad' => $formulario_provisorio->leal_localidad,
				'leal_cp' => $formulario_provisorio->leal_cp,
				'leal_otro' => $formulario_provisorio->leal_otro,

				//3
				'administracion_calle' => $formulario_provisorio->administracion_calle,
				'administracion_numero' => $formulario_provisorio->administracion_numero,
				'administracion_telefono' => $formulario_provisorio->administracion_telefono,
				'administracion_pais' => $formulario_provisorio->administracion_pais,
				'administracion_provincia' => $formulario_provisorio->administracion_provincia,
				'administracion_departamento' => $formulario_provisorio->administracion_departamento,
				'administracion_localidad' => $formulario_provisorio->administracion_localidad,
				'administracion_cp' => $formulario_provisorio->administracion_cp,
				'administracion_otro' => $formulario_provisorio->administracion_otro,

				//4
				'mina_cantera' => $formulario_provisorio->mina_cantera,
				'numero_expdiente' => $formulario_provisorio->numero_expdiente,
				'distrito_minero' => $formulario_provisorio->distrito_minero,
				'descripcion_mina' => $formulario_provisorio->descripcion_mina,
				'nombre_mina' => $formulario_provisorio->nombre_mina,
				'categoria' => $formulario_provisorio->categoria,
				'minerales_variedad' => $formulario_provisorio->minerales_variedad,

				//5
				'owner' => $formulario_provisorio->owner,
				'arrendatario' => $formulario_provisorio->arrendatario,
				'concesionario' => $formulario_provisorio->concesionario,
				'otros' => $formulario_provisorio->otros,
				'acciones_a_desarrollar' => $formulario_provisorio->acciones_a_desarrollar,
				'actividad' => $formulario_provisorio->actividad,
				'fecha_alta_dia' => $formulario_provisorio->fecha_alta_dia,
				'fecha_vencimiento_dia' => $formulario_provisorio->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
				'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
				'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
				'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
				'tipo_sistema' => $formulario_provisorio->tipo_sistema,
				'latitud' => $formulario_provisorio->latitud,
				'longitud' => $formulario_provisorio->longitud,

				//7
				'updated_at' => $formulario_provisorio->updated_at,
			];
			//$pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);

			//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
			//return $pdf->stream('formulario_.pdf');
			return view("pdfs.formulario_inscripcion_productor", compact('data'));
		} else response()->json("error en el email");
	}


	public function formulario_alta_pdf($id)
	{
		//$email  = "ochamplin@gmail.com";
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('id', '=', $id)->first();
		if ($formulario_provisorio != null) {
			//modifico la path de los archivos
			if ($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if ($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if ($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if ($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if ($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if ($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if ($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if ($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if ($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia));
			if ($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia));
			$data = [
				'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
				'date_generado' => date('d/m/Y'),
				//1
				'razon_social' =>  $formulario_provisorio->razonsocial,
				'ciut' =>  $formulario_provisorio->cuit,
				'numeroproductor' => $formulario_provisorio->numeroproductor,
				'tiposociedad' => $formulario_provisorio->tiposociedad,
				'email' => $formulario_provisorio->email,
				'inscripciondgr' => $formulario_provisorio->inscripciondgr,
				'constaciasociedad' => $formulario_provisorio->constaciasociedad,
				//2
				'leal_calle' => $formulario_provisorio->leal_calle,
				'leal_numero' => $formulario_provisorio->leal_numero,
				'leal_telefono' => $formulario_provisorio->leal_telefono,
				'leal_pais' => $formulario_provisorio->leal_pais,
				'leal_provincia' => $formulario_provisorio->leal_provincia,
				'leal_departamento' => $formulario_provisorio->leal_departamento,
				'leal_localidad' => $formulario_provisorio->leal_localidad,
				'leal_cp' => $formulario_provisorio->leal_cp,
				'leal_otro' => $formulario_provisorio->leal_otro,

				//3
				'administracion_calle' => $formulario_provisorio->administracion_calle,
				'administracion_numero' => $formulario_provisorio->administracion_numero,
				'administracion_telefono' => $formulario_provisorio->administracion_telefono,
				'administracion_pais' => $formulario_provisorio->administracion_pais,
				'administracion_provincia' => $formulario_provisorio->administracion_provincia,
				'administracion_departamento' => $formulario_provisorio->administracion_departamento,
				'administracion_localidad' => $formulario_provisorio->administracion_localidad,
				'administracion_cp' => $formulario_provisorio->administracion_cp,
				'administracion_otro' => $formulario_provisorio->administracion_otro,

				//4
				'mina_cantera' => $formulario_provisorio->mina_cantera,
				'numero_expdiente' => $formulario_provisorio->numero_expdiente,
				'distrito_minero' => $formulario_provisorio->distrito_minero,
				'descripcion_mina' => $formulario_provisorio->descripcion_mina,
				'nombre_mina' => $formulario_provisorio->nombre_mina,
				'categoria' => $formulario_provisorio->categoria,
				'minerales_variedad' => $formulario_provisorio->minerales_variedad,

				//5
				'owner' => $formulario_provisorio->owner,
				'arrendatario' => $formulario_provisorio->arrendatario,
				'concesionario' => $formulario_provisorio->concesionario,
				'otros' => $formulario_provisorio->otros,
				'acciones_a_desarrollar' => $formulario_provisorio->acciones_a_desarrollar,
				'actividad' => $formulario_provisorio->actividad,
				'fecha_alta_dia' => $formulario_provisorio->fecha_alta_dia,
				'fecha_vencimiento_dia' => $formulario_provisorio->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
				'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
				'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
				'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
				'tipo_sistema' => $formulario_provisorio->tipo_sistema,
				'latitud' => $formulario_provisorio->latitud,
				'longitud' => $formulario_provisorio->longitud,

				//7
				'updated_at' => $formulario_provisorio->updated_at,
			];
			//var_dump($data);
			//die();
			$pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);
			//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
			return $pdf->stream('formulario_.pdf');
		} else {
			//dd("LA CONSULTA NO TRAE RESULTADOS") ;
			response()->json("Error en el id");
		}
	}


	//evaluacion de formularios
	public function correccion_guardar_paso_uno(Request $request)
	{
		//dd(Auth::user()->id_provincia);
		//var_dump("el id:".$request->id."   - el  cuit es:".$request->cuit);die();
		//var_dump($request->constaciasociedad);die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		//var_dump($request->id);die();
		if ($request->id == 'null') $request->id = null;
		if ($request->es_evaluacion == 'false')
			$request->es_evaluacion = false;
		else $request->es_evaluacion = true;
		if ($request->cuit != null)
			$request->cuit = str_replace(array("#", "'", "-"), '', $request->cuit);
		if ($request->id != null)
			$formulario_provisorio = FormAltaProductor::select(
				'id',
				'razonsocial',
				'razon_social_correcto',
				'obs_razon_social',
				'cuit',
				'cuit_correcto',
				'obs_cuit',
				'numeroproductor',
				'numeroproductor_correcto',
				'obs_numeroproductor',
				'tiposociedad',
				'tiposociedad_correcto',
				'obs_tiposociedad',
				'email',
				'email_correcto',
				'obs_email',
				'inscripciondgr',
				'inscripciondgr_correcto',
				'obs_inscripciondgr',
				'constaciasociedad',
				'constaciasociedad_correcto',
				'obs_constaciasociedad'
			)
				->where('id', '=', $request->id)
				->first();
		else $formulario_provisorio = null;
		//arreglo las variables

		//var_dump($formulario_provisorio);die();

		if ($formulario_provisorio != null) {

			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			if ($request->es_evaluacion) { // soy autoridad minera
				//preparos los boolean deel front
				if ($request->razon_social_correcto == 'true')
					$request->razon_social_correcto = 1;
				elseif ($request->razon_social_correcto == 'false')
					$request->razon_social_correcto = 0;
				elseif ($request->razon_social_correcto == 'nada')
					$request->razon_social_correcto = null;



				if ($request->cuit_correcto == 'true')
					$request->cuit_correcto = 1;
				elseif ($request->cuit_correcto == 'false')
					$request->cuit_correcto = 0;
				elseif ($request->cuit_correcto == 'nada')
					$request->cuit_correcto = null;


				if ($request->numeroproductor_correcto == 'true')
					$request->numeroproductor_correcto = 1;
				elseif ($request->numeroproductor_correcto == 'false')
					$request->numeroproductor_correcto = 0;
				elseif ($request->numeroproductor_correcto == 'nada')
					$request->numeroproductor_correcto = null;


				if ($request->email_correcto === 'true')
					$request->email_correcto = 1;
				elseif ($request->email_correcto === 'false')
					$request->email_correcto = 0;
				elseif ($request->email_correcto === 'nada')
					$request->email_correcto = null;

				//var_dump($request->razon_social_correcto);die();

				if ($request->tiposociedad_correcto  === 'true')
					$request->tiposociedad_correcto = 1;
				elseif ($request->tiposociedad_correcto === 'false')
					$request->tiposociedad_correcto = 0;
				elseif ($request->tiposociedad_correcto === 'nada')
					$request->tiposociedad_correcto = null;

				if ($request->inscripciondgr_correcto  === 'true')
					$request->inscripciondgr_correcto = 1;
				elseif ($request->inscripciondgr_correcto === 'false')
					$request->inscripciondgr_correcto = 0;
				elseif ($request->inscripciondgr_correcto === 'nada')
					$request->inscripciondgr_correcto = null;

				if ($request->constaciasociedad_correcto  === 'true')
					$request->constaciasociedad_correcto = 1;
				elseif ($request->constaciasociedad_correcto === 'false')
					$request->constaciasociedad_correcto = 0;
				elseif ($request->constaciasociedad_correcto === 'nada')
					$request->constaciasociedad_correcto = null;
				//dd($request->constaciasociedad_correcto);


				//var_dump("voy a meter:");
				//var_dump($request->email_correcto);die();
				$formulario_provisorio->razon_social_correcto = $request->razon_social_correcto;
				$formulario_provisorio->obs_razon_social = $request->obs_razon_social;

				//var_dump($request->razon_social_correcto, $request->obs_razon_social);die();

				$formulario_provisorio->email_correcto = $request->email_correcto;
				$formulario_provisorio->obs_email = $request->obs_email;

				$formulario_provisorio->cuit_correcto = $request->cuit_correcto;
				$formulario_provisorio->obs_cuit = $request->obs_cuit;

				$formulario_provisorio->numeroproductor_correcto = $request->numeroproductor_correcto;
				$formulario_provisorio->obs_numeroproductor = $request->obs_numeroproductor;

				$formulario_provisorio->tiposociedad_correcto = $request->tiposociedad_correcto;
				$formulario_provisorio->obs_tiposociedad = $request->obs_tiposociedad;

				$formulario_provisorio->inscripciondgr_correcto = $request->inscripciondgr_correcto;
				$formulario_provisorio->obs_inscripciondgr = $request->obs_inscripciondgr;

				$formulario_provisorio->constaciasociedad_correcto = $request->constaciasociedad_correcto;
				$formulario_provisorio->obs_constaciasociedad = $request->obs_constaciasociedad;

				$formulario_provisorio->paso_1_progreso = $request->valor_de_progreso;
				$formulario_provisorio->paso_1_aprobado = $request->valor_de_aprobado;
				$formulario_provisorio->paso_1_reprobado = $request->valor_de_reprobado;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				//return response()->json("se actualizaron los datos correctamente");
				return response()->json([
					'status' => 'ok',
					'msg' => 'Datos de evaluacion ha sido actualizados correctamente.',
					'rol' => 'autoridad',
					'path_inscripcion' => $formulario_provisorio->inscripciondgr,
					'path_constaciasociedad' => $formulario_provisorio->constaciasociedad,
				], 201);
			} else { //soy productor

				$formulario_provisorio->razonsocial = $request->razon_social;
				$formulario_provisorio->email = $request->email;
				$formulario_provisorio->cuit = $request->cuit;
				$formulario_provisorio->numeroproductor = $request->numeroproductor;
				$formulario_provisorio->tiposociedad = $request->tiposociedad;

				if (
					($request->constaciasociedad != null)
					&&
					($request->constaciasociedad != '')
					&&
					(is_object($request->constaciasociedad))
				) {
					$contents = file_get_contents($request->constaciasociedad->path());
					$formulario_provisorio->constaciasociedad =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constaciasociedad);
				}
				//else $formulario_provisorio->constaciasociedad =null;
				if (
					($request->inscripciondgr != null)
					&&
					($request->inscripciondgr != '')
					&&
					(is_object($request->inscripciondgr))
				) {
					$contents = file_get_contents($request->inscripciondgr->path());
					$formulario_provisorio->inscripciondgr =  Storage::put('public/files_formularios' . '/' . $request->id, $request->inscripciondgr);
				}
				//else $formulario_provisorio->inscripciondgr = null;

				//$formulario_provisorio->estado = "borrador";
				//if()
				//$formulario_provisorio->estado = "borrador";

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->provincia = Auth::user()->id_provincia;

				$formulario_provisorio->save();
				return response()->json([
					'status' => 'ok',
					'msg' => 'Datos actualizados correctamente..',
					'rol' => 'productor',
					'path_inscripcion' => $formulario_provisorio->inscripciondgr,
					'path_constaciasociedad' => $formulario_provisorio->constaciasociedad,
				], 201);
			}
		} else {

			//var_dump($request->id);die();
			if ($request->id == null) {
				//var_dump("si a321312a");die();

				//significa que tengo que crear el registro
				//$nuevo_paso_uno  = new FormAltaProductor();
				$formulario_provisorio = new FormAltaProductor();
				$formulario_provisorio->razonsocial = $request->razon_social;
				$formulario_provisorio->email = $request->email;
				$formulario_provisorio->cuit = $request->cuit;
				$formulario_provisorio->numeroproductor = $request->numeroproductor;
				$formulario_provisorio->tiposociedad = $request->tiposociedad;
				if (($request->constaciasociedad != 'null') && ($request->constaciasociedad != null || $request->constaciasociedad != '')) {
					$contents = file_get_contents($request->constaciasociedad->path());
					$formulario_provisorio->constaciasociedad =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constaciasociedad);
				} else $formulario_provisorio->constaciasociedad = null;
				if (($request->constaciasociedad != 'null') && ($request->inscripciondgr != null || $request->inscripciondgr != '')) {
					$contents = file_get_contents($request->inscripciondgr->path());
					$formulario_provisorio->inscripciondgr =  Storage::put('public/files_formularios' . '/' . $request->id, $request->inscripciondgr);
				} else $formulario_provisorio->inscripciondgr = null;



				//$formulario_provisorio->constaciasociedad_correcto = $request->constaciasociedad_correcto;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->estado = "borrador";
				$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->created_by = Auth::user()->id;

				$formulario_provisorio->provincia = Auth::user()->id_provincia;

				$formulario_provisorio->save();
				$id_adicional = 0;
				//return response()->json($formulario_provisorio->id);
				//if(Auth::user()->id_provincia == 10) // es de catamarca
				if (true) //para probar
				{
					$formulario_catamarca = new FormAltaProductorCatamarca();
					$formulario_catamarca->id_formulario_alta = $formulario_provisorio->id;
					$formulario_catamarca->updated_at = date("Y-m-d H:i:s");
					$formulario_catamarca->updated_by = Auth::user()->id;
					$formulario_catamarca->created_by = Auth::user()->id;
					$formulario_catamarca->save();
					$id_adicional = $formulario_catamarca->id;
				}
				return response()->json([
					'status' => 'ok',
					'msg' => 'se creo el borrador',
					'path_inscripcion' => $formulario_provisorio->inscripciondgr,
					'path_constaciasociedad' => $formulario_provisorio->constaciasociedad,
					'estado' => $formulario_provisorio->estado,
					'id' => $formulario_provisorio->id,
					'id_adicional' => $id_adicional,
				], 201);
			} else {
				//formulario no encontrado
				return response()->json("formulario no encontrado");
			}
		}
	}

	public function correccion_guardar_paso_dos(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',
			'leal_calle',
			'leal_calle_correcto',
			'obs_leal_calle',

			'leal_numero',
			'leal_numero_correcto',
			'obs_leal_numero',

			'leal_telefono',
			'leal_telefono_correcto',
			'obs_leal_telefono',

			'numeroproductor',
			'numeroproductor_correcto',
			'obs_numeroproductor',

			'leal_pais',

			'leal_provincia',
			'leal_provincia_correcto',
			'obs_leal_provincia',

			'leal_departamento',
			'leal_departamento_correcto',
			'obs_leal_departamento',

			'leal_localidad',
			'leal_localidad_correcto',
			'obs_leal_localidad',

			'leal_cp',
			'leal_cp_correcto',
			'obs_leal_cp',

			'leal_otro',
			'leal_otro_correcto',
			'obs_leal_otro',

			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		if ($formulario_provisorio != null) {
			if ($request->es_evaluacion) { // soy autoridad minera


				if ((!is_bool($request->nombre_calle_legal_correcto)) && ($request->nombre_calle_legal_correcto == 'nada'))
					$request->nombre_calle_legal_correcto = null;
				if ((!is_bool($request->leal_numero_correcto)) && ($request->leal_numero_correcto == 'nada'))
					$request->leal_numero_correcto = null;
				if ((!is_bool($request->numeroproductor_correcto)) && ($request->numeroproductor_correcto == 'nada'))
					$request->numeroproductor_correcto = null;
				if ((!is_bool($request->leal_telefono_correcto)) && ($request->leal_telefono_correcto == 'nada'))
					$request->leal_telefono_correcto = null;
				if ((!is_bool($request->leal_provincia_correcto)) && ($request->leal_provincia_correcto == 'nada'))
					$request->leal_provincia_correcto = null;
				if ((!is_bool($request->leal_departamento_correcto)) && ($request->leal_departamento_correcto == 'nada'))
					$request->leal_departamento_correcto = null;
				if ((!is_bool($request->leal_localidad_correcto)) && ($request->leal_localidad_correcto == 'nada'))
					$request->leal_localidad_correcto = null;
				if ((!is_bool($request->leal_cp_correcto)) && ($request->leal_cp_correcto == 'nada'))
					$request->leal_cp_correcto = null;
				if ((!is_bool($request->leal_otro_correcto)) && ($request->leal_otro_correcto == 'nada'))
					$request->leal_otro_correcto = null;
				//lo encontre y actualizo
				$formulario_provisorio->leal_calle_correcto = $request->nombre_calle_legal_correcto;
				$formulario_provisorio->obs_leal_calle = $request->obs_nombre_calle_legal;

				$formulario_provisorio->leal_numero_correcto = $request->leal_numero_correcto;
				$formulario_provisorio->obs_leal_numero = $request->obs_leal_numero;

				$formulario_provisorio->leal_telefono_correcto = $request->leal_telefono_correcto;
				$formulario_provisorio->obs_leal_telefono = $request->obs_leal_telefono;

				$formulario_provisorio->leal_pais = 'Argentina';

				$formulario_provisorio->leal_provincia_correcto = $request->leal_provincia_correcto;
				$formulario_provisorio->obs_leal_provincia = $request->obs_leal_provincia;


				$formulario_provisorio->leal_departamento_correcto = $request->leal_departamento_correcto;
				$formulario_provisorio->obs_leal_departamento = $request->obs_leal_departamento;


				$formulario_provisorio->leal_localidad_correcto = $request->leal_localidad_correcto;
				$formulario_provisorio->obs_leal_localidad = $request->obs_leal_localidad;


				$formulario_provisorio->leal_cp_correcto = $request->leal_cp_correcto;
				$formulario_provisorio->obs_leal_cp = $request->obs_leal_cp;


				$formulario_provisorio->leal_otro_correcto = $request->leal_otro_correcto;
				$formulario_provisorio->obs_leal_otro = $request->obs_leal_otro;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_dos = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();

				return response()->json("se actualizaron los datos correctamente");
			} else { //soy productor
				$formulario_provisorio->leal_calle = $request->leal_calle;
				$formulario_provisorio->leal_numero = $request->leal_numero;
				$formulario_provisorio->leal_telefono = $request->leal_telefono;
				$formulario_provisorio->leal_provincia = $request->leal_provincia;
				$formulario_provisorio->leal_departamento = $request->leal_departamento;
				$formulario_provisorio->leal_localidad = $request->leal_localidad;
				$formulario_provisorio->leal_cp = $request->leal_cp;
				$formulario_provisorio->leal_otro = $request->leal_otro;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_dos = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;

				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente");
			}
		} else {
			// no encontre el formulario
			// voy a buscar si el email esta para ser confirmado
			//$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
			//var_dump($email);
			//if($email != null)
			//{
			//tengo email , reviso si no esta cofnirmado o si
			/*if($email->confirmed_at	!= null)
				{
					//el email si ha sido confirmado por eso , tengo q crear una instancia de form
					$formulario_nuevo  = new FormAltaProductor();
					$formulario_nuevo->razonsocial = $request->razon_social;
					$formulario_nuevo->cuit = $request->cuit;
					$formulario_nuevo->numeroproductor = $request->num_productor;
					$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
					$formulario_nuevo->email = $request->email;
					// $formulario_nuevo->domicilio_prod = $request->streetName;
					$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
					$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
					$formulario_nuevo->save();
					return response()->json("medio");
				}
				else
				{
					//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
					//mando email

					/*
					en produccion, descomentar
					Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
						$request->email,
						date("Y-m-d H:i:s"),
						$email->codigo
					));  /
					return response()->json("mande un email de mentira");
				}
				*/

			return response()->json("mande un email de mentira");

			/*}
			else
			{
				return response()->json("formulario no encontrado ni tampoco email");
			}*/
		}
	}


	public function correccion_guardar_paso_tres(Request $request)
	{
		/*var_dump(
			$request->administracion_calle, 
			$request->nombre_calle_administracion_valido, 
			$request->nombre_calle_administracion_correcto, 
			$request->obs_nombre_calle_administracion, 
			$request->obs_nombre_calle_administracion_valido, 

			$request->administracion_numero, 
			$request->administracion_numero_valido, 
			$request->administracion_numero_correcto, 
			$request->obs_administracion_numero, 
			$request->obs_administracion_numero_valido, 

			$request->administracion_telefono, 
			$request->administracion_telefono_valido, 
			$request->administracion_telefono_correcto, 
			$request->obs_administracion_telefono, 
			$request->obs_administracion_telefono_valido, 

			$request->administracion_provincia, 
			$request->administracion_provincia_valido, 
			$request->administracion_provincia_correcto, 
			$request->obs_administracion_provincia, 
			$request->obs_administracion_provincia_valido, 

			$request->administracion_departamento, 
			$request->administracion_departamento_valido, 
			$request->administracion_departamento_correcto, 
			$request->obs_administracion_departamento, 
			$request->obs_administracion_departamento_valido,

			$request->administracion_localidad, 
			$request->administracion_localidad_valido, 
			$request->administracion_localidad_correcto, 
			$request->obs_administracion_localidad, 
			$request->obs_administracion_localidad_valido,

			$request->administracion_cp, 
			$request->administracion_cp_valido, 
			$request->administracion_cp_correcto, 
			$request->obs_administracion_cp, 
			$request->obs_administracion_cp_valido,

			$request->administracion_otro, 
			$request->administracion_otro_valido, 
			$request->administracion_otro_correcto, 
			$request->obs_administracion_otro, 
			$request->obs_administracion_otro_valido,



			$request->valor_de_progreso, 
			$request->valor_de_aprobado, 
			$request->valor_de_reprobado, 

		);
		return response()->json("todo bien");
		die();*/


		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',
			'administracion_calle',
			'administracion_calle_correcto',
			'obs_administracion_calle',

			'administracion_numero',
			'administracion_numero_correcto',
			'obs_administracion_numero',

			'administracion_telefono',
			'administracion_telefono_correcto',
			'obs_administracion_telefono',

			'numeroproductor',
			'numeroproductor_correcto',
			'obs_numeroproductor',

			'administracion_pais',

			'administracion_provincia',
			'administracion_provincia_correcto',
			'obs_administracion_provincia',

			'administracion_departamento',
			'administracion_departamento_correcto',
			'obs_administracion_departamento',

			'administracion_localidad',
			'administracion_localidad_correcto',
			'obs_administracion_localidad',

			'administracion_cp',
			'administracion_cp_correcto',
			'obs_administracion_cp',

			'administracion_otro',
			'administracion_otro_correcto',
			'obs_administracion_otro',
			'updated_by',
			'updated_paso_tres',

			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		//var_dump($formulario_provisorio->id);die();


		if ($formulario_provisorio != null) {
			//var_dump($formulario_provisorio);die();
			//encontre el formulario, entonces tengo que actualizarlo
			if ($request->es_evaluacion) { // soy autoridad minera

				if ((!is_bool($request->administracion_calle_correcto)) && ($request->administracion_calle_correcto == 'nada'))
					$request->administracion_calle_correcto = null;

				if ((!is_bool($request->administracion_numero_correcto)) && ($request->administracion_numero_correcto == 'nada'))
					$request->administracion_numero_correcto = null;

				if ((!is_bool($request->numeroproductor_correcto)) && ($request->numeroproductor_correcto == 'nada'))
					$request->numeroproductor_correcto = null;

				if ((!is_bool($request->administracion_telefono_correcto)) && ($request->administracion_telefono_correcto == 'nada'))
					$request->administracion_telefono_correcto = null;

				if ((!is_bool($request->administracion_provincia_correcto)) && ($request->administracion_provincia_correcto == 'nada'))
					$request->administracion_provincia_correcto = null;

				if ((!is_bool($request->administracion_departamento_correcto)) && ($request->administracion_departamento_correcto == 'nada'))
					$request->administracion_departamento_correcto = null;

				if ((!is_bool($request->administracion_localidad_correcto)) && ($request->administracion_localidad_correcto == 'nada'))
					$request->administracion_localidad_correcto = null;

				if ((!is_bool($request->administracion_cp_correcto)) && ($request->administracion_cp_correcto == 'nada'))
					$request->administracion_cp_correcto = null;

				if ((!is_bool($request->administracion_otro_correcto)) && ($request->administracion_otro_correcto == 'nada'))
					$request->administracion_otro_correcto = null;


				// var_dump(
				// 	$request->id, 
				// 	$request->nombre_calle_administracion_correcto, 
				// 	$request->administracion_numero_correcto, 
				// 	$request->administracion_telefono_correcto, 
				// 	$request->administracion_provincia_correcto, 
				// 	$request->administracion_departamento_correcto, 
				// 	$request->administracion_localidad_correcto, 
				// 	$request->administracion_cp_correcto, 
				// 	$request->administracion_otro_correcto, 
				// );
				// die();


				//lo encontre y actualizo
				$formulario_provisorio->administracion_calle_correcto = $request->nombre_calle_administracion_correcto;
				$formulario_provisorio->obs_administracion_calle = $request->obs_nombre_calle_administracion;

				$formulario_provisorio->administracion_numero_correcto = $request->administracion_numero_correcto;
				$formulario_provisorio->obs_administracion_numero = $request->obs_administracion_numero;

				$formulario_provisorio->administracion_telefono_correcto = $request->administracion_telefono_correcto;
				$formulario_provisorio->obs_administracion_telefono = $request->obs_administracion_telefono;

				$formulario_provisorio->administracion_pais = 'Argentina';

				$formulario_provisorio->administracion_provincia_correcto = $request->administracion_provincia_correcto;
				$formulario_provisorio->obs_administracion_provincia = $request->obs_administracion_provincia;


				$formulario_provisorio->administracion_departamento_correcto = $request->administracion_departamento_correcto;
				$formulario_provisorio->obs_administracion_departamento = $request->obs_administracion_departamento;


				$formulario_provisorio->administracion_localidad_correcto = $request->administracion_localidad_correcto;
				$formulario_provisorio->obs_administracion_localidad = $request->obs_administracion_localidad;


				$formulario_provisorio->administracion_cp_correcto = $request->administracion_cp_correcto;
				$formulario_provisorio->obs_administracion_cp = $request->obs_administracion_cp;


				$formulario_provisorio->administracion_otro_correcto = $request->administracion_otro_correcto;
				$formulario_provisorio->obs_administracion_otro = $request->obs_administracion_otro;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_tres = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;

				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente");
			} else { //soy productor
				//var_dump("soy productores");die();
				//lo encontre y actualizo
				$formulario_provisorio->administracion_calle = $request->administracion_calle;
				$formulario_provisorio->administracion_numero = $request->administracion_numero;
				$formulario_provisorio->administracion_telefono = $request->administracion_telefono;
				$formulario_provisorio->administracion_pais = "Argentina";
				$formulario_provisorio->administracion_provincia = $request->administracion_provincia;
				$formulario_provisorio->administracion_departamento = $request->administracion_departamento;
				$formulario_provisorio->administracion_localidad = $request->administracion_localidad;
				$formulario_provisorio->administracion_cp = $request->administracion_cp;
				$formulario_provisorio->administracion_otro = $request->administracion_otro;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_tres = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente");
			}
		}
	}


	public function correccion_guardar_paso_cuatro(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		if ($request->es_evaluacion == 'true') $request->es_evaluacion = true;
		else $request->es_evaluacion = false;
		$formulario_provisorio = FormAltaProductor::select(
			'id',


			'numero_expdiente',
			'numero_expdiente_correcto',
			'obs_numero_expdiente',


			'categoria',
			'categoria_correcto',
			'obs_categoria',


			'nombre_mina',
			'nombre_mina_correcto',
			'obs_nombre_mina',


			'descripcion_mina',
			'descripcion_mina_correcto',
			'obs_descripcion_mina',


			'distrito_minero',
			'distrito_minero_correcto',
			'obs_distrito_minero',


			'mina_cantera',
			'mina_cantera_correcto',
			'obs_mina_cantera',


			'plano_inmueble',
			'plano_inmueble_correcto',
			'obs_plano_inmueble',


			'minerales_variedad',

			'resolucion_concesion_minera',
			'resolucion_concesion_minera_correcto',
			'obs_resolucion_concesion_minera',

			'titulo_contrato_posecion',

			'titulo_contrato_posecion_correcto',
			'obs_titulo_contrato_posecion',

			'paso_4_progreso',
			'paso_4_aprobado',
			'paso_4_reprobado',

			'updated_by',
			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			if ($request->es_evaluacion) { // soy autoridad minera
				if ($request->numero_expdiente_correcto === 'false')
					$request->numero_expdiente_correcto = false;
				elseif ($request->numero_expdiente_correcto === 'true')
					$request->numero_expdiente_correcto = true;
				else
					$request->numero_expdiente_correcto = null;
				//var_dump($request->categoria_correcto );
				if ($request->categoria_correcto == 'false')
					$request->categoria_correcto = false;
				elseif ($request->categoria_correcto == 'true')
					$request->categoria_correcto = true;
				else
					$request->categoria_correcto = null;

				if ($request->numeroproductor_correcto == 'false')
					$request->numeroproductor_correcto = false;
				elseif ($request->numeroproductor_correcto == 'true')
					$request->numeroproductor_correcto = true;
				else
					$request->numeroproductor_correcto = null;

				if ($request->nombre_mina_correcto == 'false')
					$request->nombre_mina_correcto = false;
				elseif ($request->nombre_mina_correcto == 'true')
					$request->nombre_mina_correcto = true;
				else
					$request->nombre_mina_correcto = null;

				if ($request->descripcion_mina_correcto == 'false')
					$request->descripcion_mina_correcto = false;
				elseif ($request->descripcion_mina_correcto == 'true')
					$request->descripcion_mina_correcto = true;
				else
					$request->descripcion_mina_correcto = null;

				if ($request->distrito_minero_correcto == 'false')
					$request->distrito_minero_correcto = false;
				elseif ($request->distrito_minero_correcto == 'true')
					$request->distrito_minero_correcto = true;
				else
					$request->distrito_minero_correcto = null;

				if ($request->mina_cantera_correcto == 'false')
					$request->mina_cantera_correcto = false;
				elseif ($request->mina_cantera_correcto == 'true')
					$request->mina_cantera_correcto = true;
				else
					$request->mina_cantera_correcto = null;






				if ((!is_bool($request->constancia_pago_canon_correcto)) && ($request->constancia_pago_canon_correcto == 'nada'))
					$request->constancia_pago_canon_correcto = null;
				elseif ($request->constancia_pago_canon_correcto == 'false')
					$request->constancia_pago_canon_correcto = false;
				elseif ($request->constancia_pago_canon_correcto == 'true')
					$request->constancia_pago_canon_correcto = true;



				if ($request->plano_inmueble_correcto == 'false')
					$request->plano_inmueble_correcto = false;
				elseif ($request->plano_inmueble_correcto == 'true')
					$request->plano_inmueble_correcto = true;
				else
					$request->plano_inmueble_correcto = null;

				if ($request->resolucion_concesion_minera_correcto == 'false')
					$request->resolucion_concesion_minera_correcto = false;
				elseif ($request->resolucion_concesion_minera_correcto == 'true')
					$request->resolucion_concesion_minera_correcto = true;
				else
					$request->resolucion_concesion_minera_correcto = null;

				//var_dump($request->resolucion_concesion_minera_correcto);die();
				if ($request->titulo_contrato_posecion_correcto == 'false')
					$request->titulo_contrato_posecion_correcto = false;
				elseif ($request->titulo_contrato_posecion_correcto == 'true')
					$request->titulo_contrato_posecion_correcto = true;
				else
					$request->titulo_contrato_posecion_correcto = null;

				$formulario_provisorio->numero_expdiente_correcto = $request->numero_expdiente_correcto;
				$formulario_provisorio->obs_numero_expdiente = $request->obs_numero_expdiente;

				$formulario_provisorio->categoria_correcto = $request->categoria_correcto;
				$formulario_provisorio->obs_categoria = $request->obs_categoria;
				//var_dump($formulario_provisorio->categoria_correcto );die();

				$formulario_provisorio->numeroproductor_correcto = $request->numeroproductor_correcto;
				$formulario_provisorio->obs_numeroproductor = $request->obs_numeroproductor;

				$formulario_provisorio->nombre_mina_correcto = $request->nombre_mina_correcto;
				$formulario_provisorio->obs_nombre_mina = $request->obs_nombre_mina;

				$formulario_provisorio->descripcion_mina_correcto = $request->descripcion_mina_correcto;
				$formulario_provisorio->obs_descripcion_mina = $request->obs_descripcion_mina;

				$formulario_provisorio->distrito_minero_correcto = $request->distrito_minero_correcto;
				$formulario_provisorio->obs_distrito_minero = $request->obs_distrito_minero;

				$formulario_provisorio->mina_cantera_correcto = $request->mina_cantera_correcto;
				$formulario_provisorio->obs_mina_cantera = $request->obs_mina_cantera;

				$formulario_provisorio->plano_inmueble_correcto = $request->plano_inmueble_correcto;
				$formulario_provisorio->obs_plano_inmueble = $request->obs_plano_inmueble;

				$formulario_provisorio->resolucion_concesion_minera_correcto = $request->resolucion_concesion_minera_correcto;
				$formulario_provisorio->obs_resolucion_concesion_minera = $request->obs_resolucion_concesion_minera;

				$formulario_provisorio->titulo_contrato_posecion_correcto = $request->titulo_contrato_posecion_correcto;
				$formulario_provisorio->obs_titulo_contrato_posecion = $request->obs_titulo_contrato_posecion;

				$formulario_provisorio->paso_4_progreso = $request->valor_de_progreso;
				$formulario_provisorio->paso_4_aprobado = $request->valor_de_aprobado;
				$formulario_provisorio->paso_4_reprobado = $request->valor_de_reprobado;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_cuatro = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				//ahora voy a guardar los minerales y sus modificaciones
				// foreach ($request->lista_minerales as $mineral) {
				// 	//primero tengo que buscar el registro que voy a actualizar

				// 	$nuevo_min = Minerales_Borradores::select('*')
				// 	->where('id_formulario','=',$request->id)
				// 	->where('id_mineral','=',$mineral['id_mineral'])
				// 	->first();
				// 	//$nuevo_min->id_formulario = $request->id;
				// 	//$nuevo_min->id_mineral = $mineral['id_mineral'];
				// 	//$nuevo_min->lugar_donde_se_encuentra = $mineral['lugar_donde_se_enccuentra'];
				// 	//$nuevo_min->variedad = null;
				// 	//$nuevo_min->segunda_cat_mineral_explotado = $mineral['segunda_cat_mineral_explotado'];
				// 	//$nuevo_min->mostrar_lugar_segunda_cat = $mineral['mostrar_lugar_segunda_cat'];
				// 	//$nuevo_min->mostrar_otro_mineral_segunda_cat = $mineral['mostrar_otro_mineral_segunda_cat'];
				// 	//$nuevo_min->otro_mineral_segunda_cat = $mineral['otro_mineral_segunda_cat'];
				// 	//$nuevo_min->observacion = $mineral['observacion'];
				// 	//$nuevo_min->clase_text_area_presentacion = $mineral['clase_text_area_presentacion'];
				// 	//$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = $mineral['clase_text_evaluacion_de_text_area_presentacion'];
				// 	//$nuevo_min->texto_validacion_text_area_presentacion = $mineral['texto_validacion_text_area_presentacion'];
				// 	//$nuevo_min->presentacion_valida = $mineral['presentacion_valida'];

				// 	if($nuevo_min != null){// encontre el mineral a actualizar
				// 		//solo voy a modifciar los campos que puede escribir la autoridad
				// 		//modifico el valor para guardarlo en pgadmin
				// 		if(is_bool($mineral['evaluacion_correcto']))
				// 			if($mineral['evaluacion_correcto'] == true)
				// 			$nuevo_min->evaluacion_correcto = 1;
				// 			else $nuevo_min->evaluacion_correcto = 0;
				// 		else//($request->resolucion_concesion_minera_correcto == 'nada')
				// 			$nuevo_min->evaluacion_correcto = null;
				// 			$nuevo_min->evaluacion_correcto = $mineral['evaluacion_correcto'];
				// 			$nuevo_min->observacion_autoridad = $mineral['observacion_autoridad'];
				// 			$nuevo_min->clase_text_area = $mineral['clase_text_area'];
				// 			$nuevo_min->clase_text_evaluacion_de_text_area = $mineral['clase_text_evaluacion_de_text_area'];
				// 			$nuevo_min->texto_validacion_text_area = $mineral['texto_validacion_text_area'];
				// 			$nuevo_min->obs_valida = $mineral['obs_valida'];
				// 			//$nuevo_min->lista_de_minerales_array = null;
				// 			//$nuevo_min->thumb = $mineral['thumb'];
				// 			$nuevo_min->estado = "evaluado";
				// 			$nuevo_min->updated_by =  Auth::user()->id;
				// 			$nuevo_min->save();
				// 	}
				// 	else continue; // no encuntre el mineral que me esta pasando
				// }
				return response()->json("se actualizaron los datos correctamente");
			} else { //soy productor
				//lo encontre y actualizo
				//var_dump($request->categoria);die();

				$formulario_provisorio->numero_expdiente = $request->numero_expdiente;
				if ($request->categoria != 'undefined')
					$formulario_provisorio->categoria = $request->categoria;
				$formulario_provisorio->nombre_mina = $request->nombre_mina;
				$formulario_provisorio->descripcion_mina = $request->descripcion_mina;

				$formulario_provisorio->distrito_minero = $request->distrito_minero;
				$formulario_provisorio->mina_cantera = $request->mina_cantera;
				//$formulario_provisorio->plano_inmueble = $request->plano_inmueble;
				//$formulario_provisorio->resolucion_concesion_minera = $request->resolucion_concesion_minera;
				//var_dump($request->resolucion_concesion_minera);die();

				if (
					($request->resolucion_concesion_minera != 'null')
					&&
					($request->resolucion_concesion_minera != null)
					&&
					($request->resolucion_concesion_minera != '')
					&&
					(is_object($request->resolucion_concesion_minera))
				) {
					$contents = file_get_contents($request->resolucion_concesion_minera->path());
					$formulario_provisorio->resolucion_concesion_minera =  Storage::put('public/files_formularios' . '/' . $request->id, $request->resolucion_concesion_minera);
				}

				if (
					($request->titulo_contrato_posecion != 'null')
					&&
					($request->titulo_contrato_posecion != null)
					&&
					($request->titulo_contrato_posecion != '')
					&&
					(is_object($request->titulo_contrato_posecion))
				) {
					$contents = file_get_contents($request->titulo_contrato_posecion->path());
					$formulario_provisorio->titulo_contrato_posecion =  Storage::put('public/files_formularios' . '/' . $request->id, $request->titulo_contrato_posecion);
				}



				if (
					($request->plano_inmueble != 'null')
					&&
					($request->plano_inmueble != null)
					&&
					($request->plano_inmueble != '')
					&&
					(is_object($request->plano_inmueble))
				) {
					$contents = file_get_contents($request->plano_inmueble->path());
					$formulario_provisorio->plano_inmueble =  Storage::put('public/files_formularios' . '/' . $request->id, $request->plano_inmueble);
				}

				//$formulario_provisorio->titulo_contrato_posecion = $request->titulo_contrato_posecion;
				//$formulario_provisorio->resolucion_concesion_minera = $request->resolucion_concesion_minera;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->save();

				//antes de guardar los minerales voy re visar si ya hay minerales. si los hay , los voy a borrar
				//y luego voy a meter los nuevos minerales
				//$resultado = Minerales_Borradores::where('id_formulario', '=', $request->id)->delete();
				//var_dump($resultado);

				$i = 0;
				// foreach ($request->lista_minerales as $mineral) {
				// 	$nuevo_min = new Minerales_Borradores();
				// 	$nuevo_min->id_formulario = $request->id;
				// 	$nuevo_min->id_mineral = $mineral['id_mineral'];
				// 	$nuevo_min->lugar_donde_se_encuentra = $mineral['lugar_donde_se_enccuentra'];
				// 	$nuevo_min->variedad = null;
				// 	$nuevo_min->segunda_cat_mineral_explotado = $mineral['segunda_cat_mineral_explotado'];
				// 	$nuevo_min->mostrar_lugar_segunda_cat = $mineral['mostrar_lugar_segunda_cat'];
				// 	$nuevo_min->mostrar_otro_mineral_segunda_cat = $mineral['mostrar_otro_mineral_segunda_cat'];
				// 	$nuevo_min->otro_mineral_segunda_cat = $mineral['otro_mineral_segunda_cat'];
				// 	$nuevo_min->observacion = $mineral['observacion'];
				// 	$nuevo_min->clase_text_area_presentacion = $mineral['clase_text_area_presentacion'];
				// 	$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = $mineral['clase_text_evaluacion_de_text_area_presentacion'];
				// 	$nuevo_min->texto_validacion_text_area_presentacion = $mineral['texto_validacion_text_area_presentacion'];
				// 	$nuevo_min->presentacion_valida = $mineral['presentacion_valida'];
				// 	$nuevo_min->evaluacion_correcto = $mineral['evaluacion_correcto'];
				// 	$nuevo_min->observacion_autoridad = $mineral['observacion_autoridad'];
				// 	$nuevo_min->clase_text_area = $mineral['clase_text_area'];
				// 	$nuevo_min->clase_text_evaluacion_de_text_area = $mineral['clase_text_evaluacion_de_text_area'];
				// 	$nuevo_min->texto_validacion_text_area = $mineral['texto_validacion_text_area'];
				// 	$nuevo_min->obs_valida = $mineral['obs_valida'];
				// 	$nuevo_min->lista_de_minerales_array = null;
				// 	$nuevo_min->thumb = $mineral['thumb'];
				// 	$nuevo_min->created_by = Auth::user()->id;
				// 	$nuevo_min->estado = "en proceso";
				// 	$nuevo_min->updated_by =  Auth::user()->id;

				// 	$nuevo_min->created_at =  null;
				// 	$nuevo_min->updated_at =  null;

				// 	$nuevo_min->save();
				// }
				return response()->json("se actualizaron los datos correctamente");
			}
		} else {
			return response()->json("formulario no encontrado");
		}
	}
	public function guardar_lista_minerales(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',

			'numero_expdiente',
			'numero_expdiente_correcto',
			'obs_numero_expdiente',


			'categoria',
			'categoria_correcto',
			'obs_categoria',


			'nombre_mina',
			'nombre_mina_correcto',
			'obs_nombre_mina',


			'descripcion_mina',
			'descripcion_mina_correcto',
			'obs_descripcion_mina',


			'distrito_minero',
			'distrito_minero_correcto',
			'obs_distrito_minero',


			'mina_cantera',
			'mina_cantera_correcto',
			'obs_mina_cantera',


			'plano_inmueble',
			'plano_inmueble_correcto',
			'obs_plano_inmueble',


			'minerales_variedad',

			'resolucion_concesion_minera',
			'resolucion_concesion_minera_correcto',
			'obs_resolucion_concesion_minera',

			'titulo_contrato_posecion',

			'titulo_contrato_posecion_correcto',
			'obs_titulo_contrato_posecion',

			'paso_4_progreso',
			'paso_4_aprobado',
			'paso_4_reprobado',

			'updated_by',
			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		$i = 0;



		if ($request->es_evaluacion) { // soy autoridad minera
			//ahora voy a guardar los minerales y sus modificaciones
			foreach ($request->lista_minerales as $mineral) {
				//primero tengo que buscar el registro que voy a actualizar

				$nuevo_min = Minerales_Borradores::select('*')
					->where('id_formulario', '=', $request->id)
					->where('id_mineral', '=', $mineral['id_mineral'])
					->first();
				//$nuevo_min->id_formulario = $request->id;
				//$nuevo_min->id_mineral = $mineral['id_mineral'];
				//$nuevo_min->lugar_donde_se_encuentra = $mineral['lugar_donde_se_enccuentra'];
				//$nuevo_min->variedad = null;
				//$nuevo_min->segunda_cat_mineral_explotado = $mineral['segunda_cat_mineral_explotado'];
				//$nuevo_min->mostrar_lugar_segunda_cat = $mineral['mostrar_lugar_segunda_cat'];
				//$nuevo_min->mostrar_otro_mineral_segunda_cat = $mineral['mostrar_otro_mineral_segunda_cat'];
				//$nuevo_min->otro_mineral_segunda_cat = $mineral['otro_mineral_segunda_cat'];
				//$nuevo_min->observacion = $mineral['observacion'];
				//$nuevo_min->clase_text_area_presentacion = $mineral['clase_text_area_presentacion'];
				//$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = $mineral['clase_text_evaluacion_de_text_area_presentacion'];
				//$nuevo_min->texto_validacion_text_area_presentacion = $mineral['texto_validacion_text_area_presentacion'];
				//$nuevo_min->presentacion_valida = $mineral['presentacion_valida'];

				if ($nuevo_min != null) { // encontre el mineral a actualizar
					//solo voy a modifciar los campos que puede escribir la autoridad
					//modifico el valor para guardarlo en pgadmin
					if (is_bool($mineral['evaluacion_correcto']))
						if ($mineral['evaluacion_correcto'] == true)
							$nuevo_min->evaluacion_correcto = 1;
						else $nuevo_min->evaluacion_correcto = 0;
					else //($request->resolucion_concesion_minera_correcto == 'nada')
						$nuevo_min->evaluacion_correcto = null;
					$nuevo_min->evaluacion_correcto = $mineral['evaluacion_correcto'];
					$nuevo_min->observacion_autoridad = $mineral['observacion_autoridad'];
					$nuevo_min->clase_text_area = $mineral['clase_text_area'];
					$nuevo_min->clase_text_evaluacion_de_text_area = $mineral['clase_text_evaluacion_de_text_area'];
					$nuevo_min->texto_validacion_text_area = $mineral['texto_validacion_text_area'];
					$nuevo_min->obs_valida = $mineral['obs_valida'];
					//$nuevo_min->lista_de_minerales_array = null;
					//$nuevo_min->thumb = $mineral['thumb'];
					$nuevo_min->estado = "evaluado";
					$nuevo_min->updated_by =  Auth::user()->id;
					$nuevo_min->save();
				} else continue; // no encuntre el mineral que me esta pasando
			}
		} else {
			//var_dump(count($request->lista_minerales) );die();
			// soy produc

			if (count($request->lista_minerales) != intval(0)) //esto es por el caso de que actualizo otros campos del form y no la lista de minerales
			{
				//voy a eliminar todo y vuelvo a cargarlos
				$resultado = Minerales_Borradores::where('id_formulario', '=', $request->id)->delete();
				//ahora los cargo
				//dd($request->lista_minerales);
				foreach ($request->lista_minerales as $mineral) {
					$nuevo_min = new Minerales_Borradores();
					$nuevo_min->id_formulario = $request->id;
					$nuevo_min->id_mineral = $mineral['id_mineral'];
					$nuevo_min->lugar_donde_se_encuentra = $mineral['lugar_donde_se_enccuentra'];
					$nuevo_min->variedad = null;
					$nuevo_min->segunda_cat_mineral_explotado = $mineral['segunda_cat_mineral_explotado'];
					$nuevo_min->mostrar_lugar_segunda_cat = $mineral['mostrar_lugar_segunda_cat'];
					$nuevo_min->mostrar_otro_mineral_segunda_cat = $mineral['mostrar_otro_mineral_segunda_cat'];
					$nuevo_min->otro_mineral_segunda_cat = $mineral['otro_mineral_segunda_cat'];
					$nuevo_min->observacion = $mineral['observacion'];
					$nuevo_min->clase_text_area_presentacion = $mineral['clase_text_area_presentacion'];
					$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = $mineral['clase_text_evaluacion_de_text_area_presentacion'];
					$nuevo_min->texto_validacion_text_area_presentacion = $mineral['texto_validacion_text_area_presentacion'];
					$nuevo_min->presentacion_valida = $mineral['presentacion_valida'];
					$nuevo_min->evaluacion_correcto = $mineral['evaluacion_correcto'];
					$nuevo_min->observacion_autoridad = $mineral['observacion_autoridad'];
					$nuevo_min->clase_text_area = $mineral['clase_text_area'];
					$nuevo_min->clase_text_evaluacion_de_text_area = $mineral['clase_text_evaluacion_de_text_area'];
					$nuevo_min->texto_validacion_text_area = $mineral['texto_validacion_text_area'];
					$nuevo_min->obs_valida = $mineral['obs_valida'];
					$nuevo_min->lista_de_minerales_array = '';
					$nuevo_min->thumb = $mineral['thumb'];
					$nuevo_min->created_by = Auth::user()->id;
					$nuevo_min->estado = "en proceso";
					$nuevo_min->updated_by =  Auth::user()->id;

					$nuevo_min->created_at = null; //date("Y-m-d H:i:s");
					$nuevo_min->updated_at = null; //date("Y-m-d H:i:s");

					$resultado = $nuevo_min->save();
				}
				return response()->json("se actualizaron los datos correctamente");
			} else return response()->json("no hay nada que actualizaron");
		}
	}
	public function correccion_guardar_paso_cinco(Request $request)
	{
		/*var_dump(
			$request->otros, 
			$request->otros_correcto, 
			$request->obs_otros, 
			$request->obs_otros_valido, 
			$request->otros_input,
			$request->otros_input_valido,
			"--------",
			$request->sustancias, 
			$request->sustancias_correcto, 
			$request->obs_sustancias, 
			$request->obs_sustancias_valido, 
			$request->sustancias_input,
			$request->sustancias_input_valido,
		);
		die();*/
		$request->es_evaluacion = $request->es_evaluacion === 'true' ? true : false;


		if ($request->fecha_alta_dia == 'null')
			$request->fecha_alta_dia = null;
		if ($request->fecha_vencimiento_dia == 'null')
			$request->fecha_vencimiento_dia = null;

		if ($request->acciones_a_desarrollar == 'null')
			$request->acciones_a_desarrollar = null;

		if ($request->owner == 'null')
			$request->owner = null;
		if ($request->owner == 'false')
			$request->owner = false;
		if ($request->owner == 'true')
			$request->owner = true;

		if ($request->arrendatario == 'null')
			$request->arrendatario = null;
		if ($request->arrendatario == 'false')
			$request->arrendatario = false;
		if ($request->arrendatario == 'true')
			$request->arrendatario = true;

		if ($request->concesionario == 'null')
			$request->concesionario = null;
		if ($request->concesionario == 'false')
			$request->concesionario = false;
		if ($request->concesionario == 'true')
			$request->concesionario = true;


		if ($request->sustancias == 'null')
			$request->sustancias = null;
		if ($request->sustancias == 'false')
			$request->sustancias = false;
		if ($request->sustancias == 'true')
			$request->sustancias = true;

		if ($request->otros == 'null')
			$request->otros = null;
		if ($request->otros == 'false')
			$request->otros = false;
		if ($request->otros == 'true')
			$request->otros = true;

		if ($request->actividad == 'null')
			$request->actividad = $request->actividad;
		if ($request->sustancias_input == 'null' || $request->sustancias_input == '')
			$request->sustancias_input = null;

		//var_dump($test_mode_mail);
		//die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',


			'owner',
			'owner_correcto',
			'obs_owner',


			'arrendatario',
			'arrendatario_correcto',
			'obs_arrendatario',


			'concesionario',
			'concesionario_correcto',
			'obs_concesionario',


			'otros',
			'otros_correcto',
			'obs_otros',


			'sustancias_de_aprovechamiento_comun',
			'sustancias_de_aprovechamiento_comun_correcto',
			'obs_sustancias_de_aprovechamiento_comun_correcto',


			'constancia_pago_canon',
			'constancia_pago_canon_correcto',
			'obs_constancia_pago_canon',




			'iia',
			'iia_correcto',
			'obs_iia',

			'dia',
			'dia_correcto',
			'obs_dia',

			'acciones_a_desarrollar',
			'acciones_a_desarrollar_correcto',
			'obs_acciones_a_desarrollar',

			'actividad',
			'actividad_correcto',
			'obs_actividad',

			'fecha_alta_dia',
			'fecha_alta_dia_correcto',
			'obs_fecha_alta_dia',


			'fecha_vencimiento_dia',
			'fecha_vencimiento_dia_correcto',
			'obs_fecha_vencimiento_dia',

			'paso_5_progreso',
			'paso_5_aprobado',
			'paso_5_reprobado',

			'updated_paso_cinco',
			'updated_by',
			'updated_at',
			'sustancias_de_aprovechamiento_comun_aclaracion'
		)
			->where('id', '=', $request->id)->first();
		//var_dump($formulario_provisorio->id);
		//'lista_minerales',



		//dd($request->obs_numero_expdiente);
		//die();


		//return response()->json("todo bien");

		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			if ($request->es_evaluacion) { // soy autoridad minera

				//dd("PARA LOS INPUT DE TRUE O FALSE");

				/* if($request->owner != null)
				$request->owner = $request->owner === 'true'? 1: 0;
				
			if($request->arrendatario != null)
				$request->arrendatario = $request->arrendatario === 'true'? 1: 0;

			if($request->concesionario!= null)
				$request->concesionario = $request->concesionario === 'true'? 1: 0;

			if($request->otros != null)
				$request->otros = $request->otros === 'true'? 1: 0;

			if($request->sustancias!= null)
				$request->sustancias = $request->sustancias === 'true'? 1: 0;
 */
				//PARA LA EVALUACION
				if ((!is_bool($request->owner_correcto)) && ($request->owner_correcto == 'nada'))
					$owner_correcto = null;
				elseif ($request->owner_correcto == 'false')
					$owner_correcto = false;
				elseif ($request->owner_correcto == 'true')
					$owner_correcto = true;


				if ((!is_bool($request->arrendatario_correcto)) && ($request->arrendatario_correcto == 'nada'))
					$arrendatario_correcto = null;
				elseif ($request->arrendatario_correcto == 'false')
					$arrendatario_correcto = false;
				elseif ($request->arrendatario_correcto == 'true')
					$arrendatario_correcto = true;




				if ((!is_bool($request->concesionario_correcto)) && ($request->concesionario_correcto == 'nada'))
					$concesionario_correcto = null;
				elseif ($request->concesionario_correcto == 'false')
					$concesionario_correcto = false;
				elseif ($request->concesionario_correcto == 'true')
					$concesionario_correcto = true;



				if ((!is_bool($request->otros_correcto)) && ($request->otros_correcto == 'nada'))
					$request->otros_correcto = null;
				elseif ($request->otros_correcto == 'false')
					$request->otros_correcto = false;
				elseif ($request->otros_correcto == 'true')
					$request->otros_correcto = true;

				if ((!is_bool($request->sustancias_correcto)) && ($request->sustancias_correcto == 'nada'))
					$sustancias_correcto = null;
				elseif ($request->sustancias_correcto == 'false')
					$sustancias_correcto = false;
				elseif ($request->sustancias_correcto == 'true')
					$sustancias_correcto = true;


				//dd($sustancias_correcto);

				if ((!is_bool($request->iia_correcto)) && ($request->iia_correcto == 'nada'))
					$request->iia_correcto = null;
				elseif ($request->iia_correcto == 'false')
					$request->iia_correcto = false;
				elseif ($request->iia_correcto == 'true')
					$request->iia_correcto = true;





				if ((!is_bool($request->dia_correcto)) && ($request->dia_correcto == 'nada'))
					$request->dia_correcto = null;
				elseif ($request->dia_correcto == 'false')
					$request->dia_correcto = false;
				elseif ($request->dia_correcto == 'true')
					$request->dia_correcto = true;


				//dd($request->dia_correcto,$request->iia_correcto );



				if ((!is_bool($request->acciones_a_desarrollar_correcto)) && ($request->acciones_a_desarrollar_correcto == 'nada'))
					$request->acciones_a_desarrollar_correcto = null;
				elseif ($request->acciones_a_desarrollar_correcto == 'false')
					$request->acciones_a_desarrollar_correcto = false;
				elseif ($request->acciones_a_desarrollar_correcto == 'true')
					$request->acciones_a_desarrollar_correcto = true;

				if ((!is_bool($request->actividad_a_desarrollar_correcto)) && ($request->actividad_a_desarrollar_correcto == 'nada'))
					$request->actividad_a_desarrollar_correcto = null;
				elseif ($request->actividad_a_desarrollar_correcto == 'false')
					$request->actividad_a_desarrollar_correcto = false;
				elseif ($request->actividad_a_desarrollar_correcto == 'true')
					$request->actividad_a_desarrollar_correcto = true;

				//dd($request->actividad_a_desarrollar_correcto);

				if ((!is_bool($request->fecha_alta_dia_correcto)) && ($request->fecha_alta_dia_correcto == 'nada'))
					$request->fecha_alta_dia_correcto = null;
				elseif ($request->fecha_alta_dia_correcto == 'false')
					$request->fecha_alta_dia_correcto = false;
				elseif ($request->fecha_alta_dia_correcto == 'true')
					$request->fecha_alta_dia_correcto = true;

				if ((!is_bool($request->fecha_vencimiento_dia_correcto)) && ($request->fecha_vencimiento_dia_correcto == 'nada'))
					$request->fecha_vencimiento_dia_correcto = null;
				elseif ($request->fecha_vencimiento_dia_correcto == 'false')
					$request->fecha_vencimiento_dia_correcto = false;
				elseif ($request->fecha_vencimiento_dia_correcto == 'true')
					$request->fecha_vencimiento_dia_correcto = true;


				$formulario_provisorio->owner_correcto = $owner_correcto;
				$formulario_provisorio->obs_owner = $request->obs_owner;

				$formulario_provisorio->arrendatario_correcto = $arrendatario_correcto;
				$formulario_provisorio->obs_arrendatario = $request->obs_arrendatario;

				$formulario_provisorio->concesionario_correcto = $concesionario_correcto;
				$formulario_provisorio->obs_concesionario = $request->obs_concesionario;

				$formulario_provisorio->otros_correcto = $request->otros_correcto;
				$formulario_provisorio->obs_otros = $request->obs_otros;

				$formulario_provisorio->sustancias_de_aprovechamiento_comun_correcto = $sustancias_correcto;
				$formulario_provisorio->obs_sustancias_de_aprovechamiento_comun_correcto = $request->obs_sustancias;


				$formulario_provisorio->constancia_pago_canon_correcto = $request->constancia_pago_canon_correcto;
				$formulario_provisorio->obs_constancia_pago_canon = $request->obs_constancia_pago_canon;

				$formulario_provisorio->iia_correcto = $request->iia_correcto;
				$formulario_provisorio->obs_iia = $request->obs_iia_canon;

				$formulario_provisorio->dia_correcto = $request->dia_correcto;
				$formulario_provisorio->obs_dia = $request->obs_dia_canon;

				$formulario_provisorio->acciones_a_desarrollar_correcto = $request->acciones_a_desarrollar_correcto;
				$formulario_provisorio->obs_acciones_a_desarrollar = $request->obs_acciones_a_desarrollar;

				$formulario_provisorio->actividad_correcto = $request->actividad_a_desarrollar_correcto;
				$formulario_provisorio->obs_actividad = $request->obs_actividad_a_desarrollar;

				$formulario_provisorio->fecha_alta_dia_correcto = $request->fecha_alta_dia_correcto;
				$formulario_provisorio->obs_fecha_alta_dia = $request->obs_fecha_alta_dia;

				$formulario_provisorio->fecha_vencimiento_dia_correcto = $request->fecha_vencimiento_dia_correcto;
				$formulario_provisorio->obs_fecha_vencimiento_dia = $request->obs_fecha_vencimiento_dia;

				$formulario_provisorio->paso_5_progreso = $request->valor_de_progreso;
				$formulario_provisorio->paso_5_aprobado = $request->valor_de_aprobado;
				$formulario_provisorio->paso_5_reprobado = $request->valor_de_reprobado;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_cinco = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				//ahora voy a guardar los minerales y sus modificaciones

				return response()->json("se actualizaron los datos correctamente");
			} else { //soy productor
				//lo encontre y actualizo
				/*var_dump("entre como productor");
				die();*/
				$formulario_provisorio->owner = $request->owner;
				$formulario_provisorio->arrendatario = $request->arrendatario;
				$formulario_provisorio->concesionario = $request->concesionario;
				//$formulario_provisorio->otros = $request->otros;
				/*var_dump($request->sustancias);
				die();*/
				if ($request->sustancias == true || $request->sustancias == 1) {
					$formulario_provisorio->sustancias_de_aprovechamiento_comun = 1;
					$formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion = $request->sustancias_input;
				} else {
					$formulario_provisorio->sustancias_de_aprovechamiento_comun = 0;
					$formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion = null;
				}
				if ($request->otros == true || $request->otros == 1) {
					$formulario_provisorio->otros = 1;
					$formulario_provisorio->otro_caracter_acalaracion = $request->otros_input;
				} else {
					$formulario_provisorio->otros = 0;
					$formulario_provisorio->otro_caracter_acalaracion = null;
				}

				//este es un archivo
				if ($request->constancia_pago_canon != null && $request->constancia_pago_canon != '' && $request->constancia_pago_canon != 'null') { //no es un archivo vacio
					if (substr($request->constancia_pago_canon, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
						$contents = file_get_contents($request->constancia_pago_canon->path());
						$formulario_provisorio->constancia_pago_canon =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_pago_canon);
					}
					//else //signifca que el archivo ya estaba cargado y no se modifico
				}
				// ya esta en null - else $formulario_provisorio->constancia_pago_canon =null;

				//este es un archivo
				if ($request->iia != null && $request->iia != '' && $request->iia != 'null') { //no es un archivo vacio
					if (substr($request->iia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
						$contents = file_get_contents($request->iia->path());
						$formulario_provisorio->iia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->iia);
					}
				}
				//este es un archivo
				if ($request->dia != null && $request->dia != '' && $request->dia != "null") { //no es un archivo vacio
					if (substr($request->dia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
						$contents = file_get_contents($request->dia->path());
						$formulario_provisorio->dia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dia);
					}
				}
				if ($request->acciones_a_desarrollar != null)
					$formulario_provisorio->acciones_a_desarrollar = $request->acciones_a_desarrollar;
				if ($request->actividad != null)
					$formulario_provisorio->actividad = $request->actividad;


				if ($request->fecha_alta_dia != null)
					$formulario_provisorio->fecha_alta_dia = $request->fecha_alta_dia;
				if ($request->fecha_vencimiento_dia != null)
					$formulario_provisorio->fecha_vencimiento_dia = $request->fecha_vencimiento_dia;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente");

				//antes de guardar los minerales voy re visar si ya hay minerales. si los hay , los voy a borrar
				//y luego voy a meter los nuevos minerales
				//var_dump($resultado);


			}
		} else {
			return response()->json("formulario no encontrado");
		}
		//die();

		// date_default_timezone_set('America/Argentina/Buenos_Aires');
		// $formulario_provisorio = FormAltaProductor::select('id','razonsocial','cuit','numeroproductor','tiposociedad',	'email','domicilio_prod','inscripciondgr','constaciasociedad')
		// ->where('email', '=',$request->email)->first();
		// //var_dump($formulario_provisorio->id);
		// if($formulario_provisorio != null)
		// {
		// 	//lo encontre y actualizo
		// 	$formulario_provisorio->tipo_productor = $request->tipo_productor;
		// 	$formulario_provisorio->razonsocial = $request->razon_social;
		// 	$formulario_provisorio->cuit = $request->cuit;
		// 	$formulario_provisorio->numeroproductor = $request->num_productor;
		// 	$formulario_provisorio->tiposociedad = $request->tipo_sociedad;
		// 	$formulario_provisorio->email = $request->email;
		// 	// $formulario_provisorio->domicilio_prod = $request->streetName;
		// 	$formulario_provisorio->inscripciondgr = $request->inscricion_dgr;
		// 	$formulario_provisorio->constaciasociedad = $request->constancia_sociedad;
		// 	$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
		// 	$formulario_provisorio->save();
		// 	return response()->json("se actualizaron los datos correctamente");

		// }
		// else
		// {
		// 	// no encontre el formulario
		// 	// voy a buscar si el email esta para ser confirmado
		// 	$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
		// 	//var_dump($email);
		// 	if($email != null)
		// 	{
		// 		//tengo email , reviso si no esta cofnirmado o si
		// 		if($email->confirmed_at	!= null)
		// 		{
		// 			//el email si ha sido confirmado por eso , tengo q crear una instancia de form
		// 			$formulario_nuevo  = new FormAltaProductor();
		// 			$formulario_nuevo->razonsocial = $request->razon_social;
		// 			$formulario_nuevo->cuit = $request->cuit;
		// 			$formulario_nuevo->numeroproductor = $request->num_productor;
		// 			$formulario_nuevo->tiposociedad = $request->tipo_sociedad;
		// 			$formulario_nuevo->email = $request->email;
		// 			// $formulario_nuevo->domicilio_prod = $request->streetName;
		// 			//$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
		// 			//$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
		// 			$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
		// 			$formulario_nuevo->save();
		// 			return response()->json("se creo el formulario y se guardo correctamente");
		// 		}
		// 		else
		// 		{
		// 			//tengo email , pero no ha sido confirmado, solicito que lo confirmen para recien guardar
		// 			//mando email

		// 			/*
		// 			en produccion, descomentar
		// 			Mail::to($to_email)->send(new ValidarEmailProductorPrimeraVez(
		// 				$request->email,
		// 				date("Y-m-d H:i:s"),
		// 				$email->codigo
		// 			));*/
		// 			return response()->json("mande un email de mentira");
		// 		}

		// 	}
		// 	else
		// 	{
		// 		return response()->json("formulario no encontrado ni tampoco email");
		// 	}
		//}
	}

	public function correccion_guardar_paso_catamarca(Request $request)
	{
		// dd($request->es_evaluacion);
		if ($request->id == 'null') $request->id = null;

		if ($request->obs_gestor_nombre_apellido == 'null') $request->obs_gestor_nombre_apellido = null;
		if ($request->obs_gestor_dni == 'null') $request->obs_gestor_dni = null;
		if ($request->obs_gestor_profesion == 'null') $request->obs_gestor_profesion = null;
		if ($request->obs_gestor_telefono == 'null') $request->obs_gestor_telefono = null;
		if ($request->gestor_email_correcto == 'null') $request->gestor_email_correcto = null;
		if ($request->obs_gestor_notificacion == 'null') $request->obs_gestor_notificacion = null;
		if ($request->obs_foto_4x4 == 'null') $request->obs_foto_4x4 = null;
		if ($request->obs_autorizacion_gestor == 'null') $request->obs_autorizacion_gestor = null;
		if ($request->obs_hoja_dni == 'null') $request->obs_hoja_dni = null;
		if ($request->obs_constancia_afip == 'null') $request->obs_constancia_afip = null;
		if ($request->gestor_notificacion == 'null') $request->gestor_notificacion = null;


		// dd($request->es_evaluacion);
		if ($request->es_evaluacion == 'false') {
			// dd('dentro del if');
			$request->es_evaluacion = false;
		} else {
			$request->es_evaluacion = true;
		}

		//$request->es_evaluacion =false;
		//var_dump($request->es_evaluacion);die();
		$request->id = (int)$request->id;
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		if ($request->id != null && $request->id > 0 && is_int($request->id)) {
			//voy a editar un registro
			$formularioCatamarca = FormAltaProductorCatamarca::where('id_formulario_alta', '=', $request->id)->first();
			// dd($formularioCatamarca->gestor_nombre_apellido!=null);
			if ($formularioCatamarca->gestor_nombre_apellido != null) // no se encontro el registor, lo debo crear
			{
				//echo "estoy aqui";die();
				// dd($request->es_evaluacion);
				if ($request->es_evaluacion == false) {
					//echo "estoy a3333qui";die();
					//Voy a editar un registro
					//soy productor
					$formularioCatamarca->gestor_nombre_apellido = $request->gestor_nombre_apellido;
					$formularioCatamarca->gestor_dni = $request->gestor_dni;
					$formularioCatamarca->gestor_profesion = $request->gestor_profesion;
					$formularioCatamarca->gestor_telefono = $request->gestor_telefono;
					$formularioCatamarca->gestor_notificacion = $request->gestor_notificacion;
					$formularioCatamarca->gestor_email = $request->gestor_email;


					//echo "por entrar";
					if (
						($request->primer_hoja_dni != null)
						&&
						($request->primer_hoja_dni != '')
						&&
						(is_object($request->primer_hoja_dni))
					) {
						//echo "entre";
						//var_dump($request->primer_hoja_dni->path());die();
						$contents = file_get_contents($request->primer_hoja_dni->path());
						$formularioCatamarca->primer_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->primer_hoja_dni);
					}

					if (
						($request->segunda_hoja_dni != null)
						&&
						($request->segunda_hoja_dni != '')
						&&
						(is_object($request->segunda_hoja_dni))
					) {
						$contents = file_get_contents($request->segunda_hoja_dni->path());
						$formularioCatamarca->segunda_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->segunda_hoja_dni);
					}



					if (
						($request->foto_4x4 != null)
						&&
						($request->foto_4x4 != '')
						&&
						(is_object($request->foto_4x4))
					) {
						$contents = file_get_contents($request->foto_4x4->path());
						$formularioCatamarca->foto_4x4 =  Storage::put('public/files_formularios' . '/' . $request->id, $request->foto_4x4);
					}
					if (
						($request->constancia_afip != null)
						&&
						($request->constancia_afip != '')
						&&
						(is_object($request->constancia_afip))
					) {
						$contents = file_get_contents($request->constancia_afip->path());
						$formularioCatamarca->constancia_afip =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_afip);
					}


					if (
						($request->autorizacion_gestor != null)
						&&
						($request->autorizacion_gestor != '')
						&&
						(is_object($request->autorizacion_gestor))
					) {
						$contents = file_get_contents($request->autorizacion_gestor->path());
						$formularioCatamarca->autorizacion_gestor =  Storage::put('public/files_formularios' . '/' . $request->id, $request->autorizacion_gestor);
					}

					$formularioCatamarca->updated_by = Auth::user()->id;
					// $formularioCatamarca->updated_by = Auth::user()->id;
					$formularioCatamarca->id_formulario_alta = $request->id;
					//var_dump($formularioCatamarca);die();
					$formularioCatamarca->save();

					return response()->json([
						'status' => 'ok',
						'msg' => 'se actualizo correctamente el paso de catamarca',
						'id_creado' => $formularioCatamarca->id
					], 201);
				} else {
					//voy a editar como autoridad
					//soy autoridad

					/*var_dump($request->gestor_nombre_apellido_correcto,
					$request->obs_gestor_nombre_apellido, 
					$request->gestor_dni_correcto, $request->obs_gestor_dni);die();*/

					if ($request->gestor_nombre_apellido_correcto == 'false')
						$request->gestor_nombre_apellido_correcto = false;
					elseif ($request->gestor_nombre_apellido_correcto == 'true')
						$request->gestor_nombre_apellido_correcto = true;
					else
						$request->gestor_nombre_apellido_correcto = null;

					$formularioCatamarca->gestor_nombre_apellido_correcto = $request->gestor_nombre_apellido_correcto;
					$formularioCatamarca->obs_gestor_nombre_apellido = $request->obs_gestor_nombre_apellido;


					if ($request->gestor_dni_correcto == 'false')
						$request->gestor_dni_correcto = false;
					elseif ($request->gestor_dni_correcto == 'true')
						$request->gestor_dni_correcto = true;
					else
						$request->gestor_dni_correcto = null;

					$formularioCatamarca->gestor_dni_correcto = $request->gestor_dni_correcto;
					$formularioCatamarca->obs_gestor_dni = $request->obs_gestor_dni;


					if ($request->gestor_profesion_correcto == 'false')
						$request->gestor_profesion_correcto = false;
					elseif ($request->gestor_profesion_correcto == 'true')
						$request->gestor_profesion_correcto = true;
					else
						$request->gestor_profesion_correcto = null;

					$formularioCatamarca->gestor_profesion_correcto = $request->gestor_profesion_correcto;
					$formularioCatamarca->obs_gestor_profesion = $request->obs_gestor_profesion;

					if ($request->gestor_telefono_correcto == 'false')
						$request->gestor_telefono_correcto = false;
					elseif ($request->gestor_telefono_correcto == 'true')
						$request->gestor_telefono_correcto = true;
					else
						$request->gestor_telefono_correcto = null;

					$formularioCatamarca->gestor_telefono_correcto = $request->gestor_telefono_correcto;
					$formularioCatamarca->obs_gestor_telefono = $request->obs_gestor_telefono;


					if ($request->gestor_email_correcto == 'false')
						$request->gestor_email_correcto = false;
					elseif ($request->gestor_email_correcto == 'true')
						$request->gestor_email_correcto = true;
					else
						$request->gestor_email_correcto = null;

					$formularioCatamarca->obs_gestor_email = $request->obs_gestor_email;
					$formularioCatamarca->gestor_email_correcto = $request->gestor_email_correcto;


					if ($request->gestor_notificacion_correcto == 'false')
						$request->gestor_notificacion_correcto = false;
					elseif ($request->gestor_notificacion_correcto == 'true')
						$request->gestor_notificacion_correcto = true;
					else
						$request->gestor_notificacion_correcto = null;

					$formularioCatamarca->gestor_notificacion_correcto = $request->gestor_notificacion_correcto;
					$formularioCatamarca->obs_gestor_notificacion = $request->obs_gestor_notificacion;


					if ($request->autorizacion_gestor_correcto == 'false')
						$request->autorizacion_gestor_correcto = false;
					elseif ($request->autorizacion_gestor_correcto == 'true')
						$request->autorizacion_gestor_correcto = true;
					else
						$request->autorizacion_gestor_correcto = null;

					$formularioCatamarca->autorizacion_gestor_correcto = $request->autorizacion_gestor_correcto;
					$formularioCatamarca->obs_autorizacion_gestor = $request->obs_autorizacion_gestor;




					if ($request->foto_4x4_correcto == 'false')
						$request->foto_4x4_correcto = false;
					elseif ($request->foto_4x4_correcto == 'true')
						$request->foto_4x4_correcto = true;
					else
						$request->foto_4x4_correcto = null;

					$formularioCatamarca->foto_4x4_correcto = $request->foto_4x4_correcto;
					$formularioCatamarca->obs_foto_4x4 = $request->obs_foto_4x4;



					if ($request->constancia_afip_correcto == 'false')
						$request->constancia_afip_correcto = false;
					elseif ($request->constancia_afip_correcto == 'true')
						$request->constancia_afip_correcto = true;
					else
						$request->constancia_afip_correcto = null;

					$formularioCatamarca->constancia_afip_correcto = $request->constancia_afip_correcto;
					$formularioCatamarca->obs_constancia_afip = $request->obs_constancia_afip;


					if ($request->hoja_dni_correcto == 'false')
						$request->hoja_dni_correcto = false;
					elseif ($request->hoja_dni_correcto == 'true')
						$request->hoja_dni_correcto = true;
					else
						$request->hoja_dni_correcto = null;

					$formularioCatamarca->hoja_dni_correcto = $request->hoja_dni_correcto;
					$formularioCatamarca->obs_hoja_dni = $request->obs_hoja_dni;


					$formularioCatamarca->updated_by = Auth::user()->id;
					$formularioCatamarca->id_formulario_alta = $request->id;
					//var_dump($formularioCatamarca);die();
					// dd($formularioCatamarca);
					$formularioCatamarca->save();

					return response()->json([
						'status' => 'ok',
						'msg' => 'se actualizo el paso de catamarca correctamente',
						'id_creado' => $formularioCatamarca->id
					], 201);
				}
			} else {
				//voy a crear un nuevo registro
				// dd($request->es_evaluacion);
				if ($request->es_evaluacion == false) {
					// echo "aca";die();
					//soy productor y voy a crear el registro
					//con los valores que cargo como productor sin evaluacion
					$formularioNuevoCatamarca  = new FormAltaProductorCatamarca();
					$formularioNuevoCatamarca->gestor_nombre_apellido = $request->gestor_nombre_apellido;
					$formularioNuevoCatamarca->gestor_dni = $request->gestor_dni;
					$formularioNuevoCatamarca->gestor_profesion = $request->gestor_profesion;
					$formularioNuevoCatamarca->gestor_telefono = $request->gestor_telefono;
					$formularioNuevoCatamarca->gestor_notificacion = $request->gestor_notificacion;
					$formularioNuevoCatamarca->gestor_email = $request->gestor_email;



					if (
						($request->primer_hoja_dni != null)
						&&
						($request->primer_hoja_dni != '')
						&&
						(is_object($request->primer_hoja_dni))
					) {
						$contents = file_get_contents($request->primer_hoja_dni->path());
						$formularioNuevoCatamarca->primer_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->primer_hoja_dni);
					}

					if (
						($request->segunda_hoja_dni != null)
						&&
						($request->segunda_hoja_dni != '')
						&&
						(is_object($request->segunda_hoja_dni))
					) {
						$contents = file_get_contents($request->segunda_hoja_dni->path());
						$formularioNuevoCatamarca->segunda_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->segunda_hoja_dni);
					}

					if (
						($request->foto_4x4 != null)
						&&
						($request->foto_4x4 != '')
						&&
						(is_object($request->foto_4x4))
					) {
						$contents = file_get_contents($request->foto_4x4->path());
						$formularioNuevoCatamarca->foto_4x4 =  Storage::put('public/files_formularios' . '/' . $request->id, $request->foto_4x4);
					}

					if (
						($request->constancia_afip != null)
						&&
						($request->constancia_afip != '')
						&&
						(is_object($request->constancia_afip))
					) {
						$contents = file_get_contents($request->constancia_afip->path());
						$formularioNuevoCatamarca->constancia_afip =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_afip);
					}

					if (
						($request->autorizacion_gestor != null)
						&&
						($request->autorizacion_gestor != '')
						&&
						(is_object($request->autorizacion_gestor))
					) {
						$contents = file_get_contents($request->autorizacion_gestor->path());
						$formularioNuevoCatamarca->autorizacion_gestor =  Storage::put('public/files_formularios' . '/' . $request->id, $request->autorizacion_gestor);
					}

					$formularioNuevoCatamarca->paso_aprobado = null;
					$formularioNuevoCatamarca->paso_reprobado = null;
					$formularioNuevoCatamarca->paso_progreso = null;
					$formularioNuevoCatamarca->created_by = Auth::user()->id;
					$formularioNuevoCatamarca->updated_by = Auth::user()->id;
					$formularioNuevoCatamarca->id_formulario_alta = $request->id;

					$formularioNuevoCatamarca->save();

					return response()->json([
						'status' => 'ok',
						'msg' => 'se creo el paso de catamarca correctamente',
						'id_creado' => $formularioNuevoCatamarca->id
					], 201);
				} else {
					//soy autoridad y tengo que cargar los datos de productor y evaluacion juntos

					if ((!is_bool($request->gestor_nombre_apellido_correcto)) && ($request->owner_correcto == 'nada'))
						$owner_correcto = null;
					elseif ($request->owner_correcto == 'false')
						$owner_correcto = false;
					elseif ($request->owner_correcto == 'true')
						$owner_correcto = true;


					if ((!is_bool($request->arrendatario_correcto)) && ($request->arrendatario_correcto == 'nada'))
						$arrendatario_correcto = null;
					elseif ($request->arrendatario_correcto == 'false')
						$arrendatario_correcto = false;
					elseif ($request->arrendatario_correcto == 'true')
						$arrendatario_correcto = true;


					if ((!is_bool($request->concesionario_correcto)) && ($request->concesionario_correcto == 'nada'))
						$concesionario_correcto = null;
					elseif ($request->concesionario_correcto == 'false')
						$concesionario_correcto = false;
					elseif ($request->concesionario_correcto == 'true')
						$concesionario_correcto = true;



					if ((!is_bool($request->otros_correcto)) && ($request->otros_correcto == 'nada'))
						$request->otros_correcto = null;
					elseif ($request->otros_correcto == 'false')
						$request->otros_correcto = false;
					elseif ($request->otros_correcto == 'true')
						$request->otros_correcto = true;

					if ((!is_bool($request->sustancias_correcto)) && ($request->sustancias_correcto == 'nada'))
						$sustancias_correcto = null;
					elseif ($request->sustancias_correcto == 'false')
						$sustancias_correcto = false;
					elseif ($request->sustancias_correcto == 'true')
						$sustancias_correcto = true;


					//dd($sustancias_correcto);

					if ((!is_bool($request->iia_correcto)) && ($request->iia_correcto == 'nada'))
						$request->iia_correcto = null;
					elseif ($request->iia_correcto == 'false')
						$request->iia_correcto = false;
					elseif ($request->iia_correcto == 'true')
						$request->iia_correcto = true;





					if ((!is_bool($request->dia_correcto)) && ($request->dia_correcto == 'nada'))
						$request->dia_correcto = null;
					elseif ($request->dia_correcto == 'false')
						$request->dia_correcto = false;
					elseif ($request->dia_correcto == 'true')
						$request->dia_correcto = true;





					if ((!is_bool($request->acciones_a_desarrollar_correcto)) && ($request->acciones_a_desarrollar_correcto == 'nada'))
						$request->acciones_a_desarrollar_correcto = null;
					elseif ($request->acciones_a_desarrollar_correcto == 'false')
						$request->acciones_a_desarrollar_correcto = false;
					elseif ($request->acciones_a_desarrollar_correcto == 'true')
						$request->acciones_a_desarrollar_correcto = true;

					if ((!is_bool($request->actividad_a_desarrollar_correcto)) && ($request->actividad_a_desarrollar_correcto == 'nada'))
						$request->actividad_a_desarrollar_correcto = null;
					elseif ($request->actividad_a_desarrollar_correcto == 'false')
						$request->actividad_a_desarrollar_correcto = false;
					elseif ($request->actividad_a_desarrollar_correcto == 'true')
						$request->actividad_a_desarrollar_correcto = true;

					//dd($request->actividad_a_desarrollar_correcto);

					if ((!is_bool($request->fecha_alta_dia_correcto)) && ($request->fecha_alta_dia_correcto == 'nada'))
						$request->fecha_alta_dia_correcto = null;
					elseif ($request->fecha_alta_dia_correcto == 'false')
						$request->fecha_alta_dia_correcto = false;
					elseif ($request->fecha_alta_dia_correcto == 'true')
						$request->fecha_alta_dia_correcto = true;

					if ((!is_bool($request->fecha_vencimiento_dia_correcto)) && ($request->fecha_vencimiento_dia_correcto == 'nada'))
						$request->fecha_vencimiento_dia_correcto = null;
					elseif ($request->fecha_vencimiento_dia_correcto == 'false')
						$request->fecha_vencimiento_dia_correcto = false;
					elseif ($request->fecha_vencimiento_dia_correcto == 'true')
						$request->fecha_vencimiento_dia_correcto = true;

					return response()->json("se actualizaron los datos correctamente");
				}
			}
		} else {
			echo "mal el id";
			die();
		}
		/* 		

	$formularioNuevoCatamarca  = new FormAltaProductorCatamarca();
				$formularioNuevoCatamarca->gestor_nombre_apellido = $request->gestor_nombre_apellido;
				$formularioNuevoCatamarca->gestor_dni = $request->gestor_dni;
				$formularioNuevoCatamarca->gestor_profesion = $request->gestor_profesion;
				$formularioNuevoCatamarca->gestor_telefono = $request->gestor_telefono;
				$formularioNuevoCatamarca->gestor_notificacion = $request->gestor_notificacion;
				$formularioNuevoCatamarca->gestor_email = $request->gestor_email;
				$formularioNuevoCatamarca->primer_hoja_dni = $request->primer_hoja_dni;
				$formularioNuevoCatamarca->segunda_hoja_dni = $request->segunda_hoja_dni;
				$formularioNuevoCatamarca->foto_4x4 = $request->foto_4x4;
				$formularioNuevoCatamarca->constancia_afip = $request->constancia_afip;
				
				$formularioNuevoCatamarca->gestor_nombre_apellido_correcto = $request->gestor_nombre_apellido_correcto;
				$formularioNuevoCatamarca->obs_gestor_nombre_apellido = $request->obs_gestor_nombre_apellido;
				$formularioNuevoCatamarca->gestor_dni_correcto = $request->gestor_dni_correcto;
				$formularioNuevoCatamarca->obs_gestor_dni = $request->obs_gestor_dni;
				$formularioNuevoCatamarca->gestor_profesion_correcto = $request->gestor_profesion_correcto;
				$formularioNuevoCatamarca->obs_gestor_profesion = $request->obs_gestor_profesion;
				$formularioNuevoCatamarca->gestor_telefono_correcto = $request->gestor_telefono_correcto;
				$formularioNuevoCatamarca->obs_gestor_telefono = $request->obs_gestor_telefono;
				$formularioNuevoCatamarca->gestor_notificacion_correcto = $request->gestor_notificacion_correcto;
				$formularioNuevoCatamarca->obs_gestor_notificacion = $request->obs_gestor_notificacion;
				$formularioNuevoCatamarca->gestor_email_correcto = $request->gestor_email_correcto;
				$formularioNuevoCatamarca->obs_gestor_email = $request->obs_gestor_email;
				$formularioNuevoCatamarca->hoja_dni_correcto = $request->hoja_dni_correcto;
				$formularioNuevoCatamarca->obs_hoja_dni = $request->obs_hoja_dni;
				$formularioNuevoCatamarca->foto_4x4_correcto = $request->foto_4x4_correcto;
				$formularioNuevoCatamarca->obs_foto_4x4 = $request->obs_foto_4x4;
				$formularioNuevoCatamarca->constancia_afip_correcto = $request->constancia_afip_correcto;
				$formularioNuevoCatamarca->obs_constancia_afip = $request->obs_constancia_afip;
				$formularioNuevoCatamarca->paso_aprobado = $request->paso_aprobado;
				$formularioNuevoCatamarca->paso_reprobado = $request->paso_reprobado;
				$formularioNuevoCatamarca->paso_progreso = $request->paso_progreso;
				$formularioNuevoCatamarca->created_by = $request->created_by;
				$formularioNuevoCatamarca->updated_by = $request->updated_by;
				$formularioNuevoCatamarca->id_formulario_alta = $request->id_formulario_alta;
				$formularioNuevoCatamarca->created_at = $request->created_at;
				$formularioNuevoCatamarca->updated_at = $request->updated_at;
				$formularioNuevoCatamarca->deleted_at = $request->deleted_at;
				$formularioNuevoCatamarca->autorizacion_gestor = $request->autorizacion_gestor;
				$formularioNuevoCatamarca->autorizacion_gestor_correcto = $request->autorizacion_gestor_correcto;
				$formularioNuevoCatamarca->obs_autorizacion_gestor = $request->obs_autorizacion_gestor;
				
					o',


        'obs_autorizacion_gestor', */
	}


	public function correccion_guardar_paso_seis(Request $request)
	{
		// var_dump(
		// 	$request->id,
		// 	$request->localidad_mina_provincia,
		// 	$request->localidad_mina_provincia_validacion,
		// 	$request->localidad_mina_provincia_correcto,
		// 	$request->obs_localidad_mina_provincia,
		// 	$request->obs_localidad_mina_provincia_valido,
		// 	$request->localidad_mina_departamento,
		// 	$request->localidad_mina_departamento_validacion,
		// 	$request->localidad_mina_departamento_correcto,
		// 	$request->obs_localidad_mina_departamento,
		// 	$request->obs_localidad_mina_departamento_valido,
		// 	$request->localidad_mina_localidad,
		// 	$request->localidad_mina_localidad_validacion,
		// 	$request->localidad_mina_localidad_correcto,
		// 	$request->obs_localidad_mina_localidad,
		// 	$request->obs_localidad_mina_localidad_valido,
		// 	$request->tipo_sistema,
		// 	$request->tipo_sistema_validacion,
		// 	$request->tipo_sistema_correcto,
		// 	$request->obs_tipo_sistema,
		// 	$request->obs_tipo_sistema_valido,
		// 	$request->latitud,
		// 	$request->latitud_validacion,
		// 	$request->latitud_correcto,
		// 	$request->obs_latitud,
		// 	$request->obs_latitud_valido,
		// 	$request->longitud,
		// 	$request->longitud_validacion,
		// 	$request->longitud_correcto,
		// 	$request->obs_longitud,
		// 	$request->obs_longitud_valido,
		// 	$request->valor_de_progreso, 
		// 	$request->valor_de_aprobado, 
		// 	$request->valor_de_reprobado, 
		// );
		// //return response()->json("todo bien");
		// die();
		//var_dump($request->es_evaluacion);
		//$request->es_evaluacion = $request->es_evaluacion === 'true'? true: false;
		//var_dump($request->es_evaluacion);
		//die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',

			'localidad_mina_pais',

			'localidad_mina_provincia',
			'localidad_mina_provincia_correcto',
			'obs_localidad_mina_provincia',

			'localidad_mina_departamento',
			'localidad_mina_departamento_correcto',
			'obs_localidad_mina_departamento',

			'localidad_mina_localidad',
			'localidad_mina_localidad_correcto',
			'obs_localidad_mina_localidad',


			'tipo_sistema',
			'tipo_sistema_correcto',
			'obs_tipo_sistema',


			'longitud',
			'longitud_correcto',
			'obs_longitud',

			'latitud',
			'latitud_correcto',
			'obs_latitud',

			'paso_6_progreso',
			'paso_6_aprobado',
			'paso_6_reprobado',

			'updated_paso_seis',
			'updated_by',
			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		// var_dump($formulario_provisorio->id);
		// 	die();

		//PARA LA EVALUACION
		//var_dump($request->localidad_mina_provincia_correcto);
		if (!is_bool($request->localidad_mina_provincia_correcto))
			$request->localidad_mina_provincia_correcto = null;
		//var_dump($request->localidad_mina_provincia_correcto);
		if (!is_bool($request->localidad_mina_departamento_correcto))
			$request->localidad_mina_departamento_correcto = null;

		if (!is_bool($request->localidad_mina_localidad_correcto))
			$request->localidad_mina_localidad_correcto = null;


		if (!is_bool($request->tipo_sistema_correcto))
			$request->tipo_sistema_correcto = null;


		if (!is_bool($request->longitud_correcto))
			$request->longitud_correcto = null;


		if (!is_bool($request->latitud_correcto))
			$request->latitud_correcto = null;

		//var_dump($formulario_provisorio->id);die();
		if ($formulario_provisorio != null) {
			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			//var_dump($request->es_evaluacion);
			if ($request->es_evaluacion) { // soy autoridad minera
				//var_dump("sadasd");die();
				$formulario_provisorio->localidad_mina_provincia_correcto = $request->localidad_mina_provincia_correcto;
				$formulario_provisorio->obs_localidad_mina_provincia = $request->obs_localidad_mina_provincia;

				$formulario_provisorio->localidad_mina_departamento_correcto = $request->localidad_mina_departamento_correcto;
				$formulario_provisorio->obs_localidad_mina_departamento = $request->obs_localidad_mina_departamento;

				$formulario_provisorio->localidad_mina_localidad_correcto = $request->localidad_mina_localidad_correcto;
				$formulario_provisorio->obs_localidad_mina_localidad = $request->obs_localidad_mina_localidad;

				$formulario_provisorio->tipo_sistema_correcto = $request->tipo_sistema_correcto;
				$formulario_provisorio->obs_tipo_sistema = $request->obs_tipo_sistema;

				$formulario_provisorio->longitud_correcto = $request->longitud_correcto;
				$formulario_provisorio->obs_longitud = $request->obs_longitud;

				$formulario_provisorio->latitud_correcto = $request->latitud_correcto;
				$formulario_provisorio->obs_latitud = $request->obs_latitud;

				$formulario_provisorio->paso_6_progreso = $request->valor_de_progreso;
				$formulario_provisorio->paso_6_aprobado = $request->valor_de_aprobado;
				$formulario_provisorio->paso_6_reprobado = $request->valor_de_reprobado;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_seis = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				//ahora voy a guardar los minerales y sus modificaciones

				return response()->json("se actualizaron los datos correctamente");
			} else { //soy productor
				//dd("wwwwwwww");
				//lo encontre y actualizo
				/*var_dump("entre como productor");
				die();*/
				$formulario_provisorio->localidad_mina_pais = "Argentina";
				$formulario_provisorio->localidad_mina_provincia = $request->localidad_mina_provincia;
				$formulario_provisorio->localidad_mina_departamento = $request->localidad_mina_departamento;
				$formulario_provisorio->localidad_mina_localidad = $request->localidad_mina_localidad;

				$formulario_provisorio->tipo_sistema = $request->tipo_sistema;
				$formulario_provisorio->longitud = $request->longitud;
				$formulario_provisorio->latitud =  $request->latitud;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_seis = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente");

				//antes de guardar los minerales voy re visar si ya hay minerales. si los hay , los voy a borrar
				//y luego voy a meter los nuevos minerales
				//var_dump($resultado);


			}
		} else {
			return response()->json("formulario no encontrado");
		}
	}

	public function correccion_guardar_paso_todo(Request $request)
	{
		//dd($request->es_evaluacion);
		$request->es_evaluacion = $request->es_evaluacion === 'true' ? true : false;
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select(
			'id',
			'estado',
			'updated_by',
			'updated_at'
		)
			->where('id', '=', $request->id)->first();
		if ($request->es_evaluacion) { // soy autoridad minera
			$formulario_provisorio->estado = $request->estado;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();
			return response()->json("todo bien");
		} else { //soy productor
			return response()->json("error");
		}
	}

	public function presentar_borrador(Request $request)
	{
		//dd($request->nombre_presentador, $request->dni_presentador , $request->cargo_empresa);
		$request->es_evaluacion = $request->es_evaluacion === 'true' ? true : false;
		$request->id = intval($request->id);
		//dd($request->id);
		if ($request->id > 0) {
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$formulario_provisorio = FormAltaProductor::select('*')
				->where('id', '=', $request->id)->first();
			//dd($formulario_provisorio);
			//dd($request->cargo_empresa,$request->nombre_presentador,$request->dni_presentador);

			//dd($formulario_provisorio->estado, $request->estado);
			if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Productor')) { // soy autoridad minera
				if ($formulario_provisorio->estado == 'borrador') {
					//dd("entre aca en borrador");
					$formulario_provisorio->cargo_empresa = $request->cargo_empresa;
					$formulario_provisorio->presentador_nom_apellido = $request->nombre_presentador;
					$formulario_provisorio->presentador_dni = $request->dni_presentador;
				}

				if ($request->estado == 'presentar')
					$formulario_provisorio->estado = "en revision";
				if ($request->estado != null)
					$formulario_provisorio->estado = $request->estado;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;
				//datos de presentador
				//dd($formulario_provisorio->estado, $request->estado);
				$resulado = $formulario_provisorio->save();

				//$formulario_provisorio->save();
				//$email_a_mandar = $formulario_provisorio->email; para prod
				$email_a_mandar = 'diegochecarelli@gmail.com';
				if ($formulario_provisorio->estado  == "en revision") {
					Mail::to($email_a_mandar)->send(new AvisoFormularioPresentadoEmail(
						$email_a_mandar,
						$formulario_provisorio->razon_social,
						$formulario_provisorio->id,
						date("Y-m-d H:i:s")
					));
				}
				if ($formulario_provisorio->estado  == "con observacion") {
					Mail::to($email_a_mandar)->send(new AvisoFormularioConObservaciones(
						$formulario_provisorio->razon_social,
						date("Y-m-d H:i:s"),
						$formulario_provisorio->id
					));
				}
				if ($formulario_provisorio->estado  == "aprobado") {
					Mail::to($email_a_mandar)->send(new AvisoFormularioAprobadoEmail(
						$formulario_provisorio->id,
						$formulario_provisorio->razon_social,
						date("Y-m-d H:i:s")
					));

					$id_productor_nuevo = $this->crear_registro_productor($formulario_provisorio->id);
					$id_mina_nueva = $this->crear_registro_mina_cantera($formulario_provisorio->id);
					$id_dia_iia_nueva = $this->crear_registro_dia_iia($formulario_provisorio->id);
					$id_pago_canon_nuevo = $this->crear_registro_pago_canon($formulario_provisorio->id);
					$id_mina_productor = $this->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);
				}
				return response()->json([
					'status' => 'ok',
					'msg' => 'Formulario Actualizado Correctamente.'
				], 201);
			} else return response()->json([
				'status' => 'ok',
				'msg' => 'Sin permisos.'
			], 201);
		} else {
			return response()->json([
				'status' => 'mal',
				'msg' => 'Error en el ID pasado.'
			], 201);
		}
		/*
			//tengo que enviar email
			//$email_a_mandar = $formulario_provisorio->email; para prod
			$email_a_mandar = 'diegochecarelli@gmail.com';
			Mail::to($formulario_provisorio->email)->send(new AvisoFormularioAprobadoEmail(
				$request->id,
				$request->razon_social,
				date("Y-m-d H:i:s")
			));
			//tengo que crear todos los campos de la base de datos
			}
			
		else{//soy productor
			return response()->json("error");
		}
		*/
	}

	public function probando_super_guardado($id_formulario)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
			->where('id', '=', $id_formulario)->first();

		//revisar si son todos registros nuevos, o si tengo q traerlos de algun lugar

		$crear_productor = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_productor)
			$id_productor_nuevo = $this->crear_registro_productor($formulario_provisorio->id);
		$crear_mina = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_mina)
			$id_mina_nueva = $this->crear_registro_mina_cantera($formulario_provisorio->id);
		$crear_dia = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_dia)
			$id_dia_iia_nueva = $this->crear_registro_dia_iia($formulario_provisorio->id);
		$crear_pago = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_pago)
			$id_pago_canon_nuevo = $this->crear_registro_pago_canon($formulario_provisorio->id);
		$crear_mina_productor = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_mina_productor)
			$id_mina_productor = $this->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);
		$crear_los_minerales_de_la_mina = true; // esto debo comprobarlo antes de crearlo o buscarlo
		if ($crear_los_minerales_de_la_mina)
			$resultado_actualizar_minerales = $this->actualizar_registros_minerales_en_mina($formulario_provisorio->id);
		//actualizar form_provisorio
		//$formulario_provisorio->estado = 

		//actualizar casos especiales de provincias
		//Catamarca 
		//if()
		var_dump($id_productor_nuevo, $id_mina_nueva, $id_dia_iia_nueva, $id_pago_canon_nuevo, $id_mina_productor);
	}


	public function crear_registro_productor($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$productor = new Productores();
				$productor->cuit = $formulario_provisorio->cuit;
				$productor->razonsocial = $formulario_provisorio->razonsocial;
				$productor->numeroproductor = $formulario_provisorio->numeroproductor;
				$productor->email = $formulario_provisorio->email;
				$productor->domicilio_prod = "Sin Domicilio";
				$productor->tiposociedad = $formulario_provisorio->tiposociedad;
				$productor->inscripciondgr = $formulario_provisorio->inscripciondgr;
				$productor->constaciasociedad = $formulario_provisorio->constaciasociedad;
				$productor->leal_calle = $formulario_provisorio->leal_calle;
				$productor->leal_numero = $formulario_provisorio->leal_numero;
				$productor->leal_telefono = $formulario_provisorio->leal_telefono;
				// $productor->leal_pais = $formulario_provisorio->leal_pais;
				$productor->leal_pais = null;

				$productor->leal_provincia = $formulario_provisorio->leal_provincia;
				$productor->leal_departamento = $formulario_provisorio->leal_departamento;
				$productor->leal_localidad = $formulario_provisorio->leal_localidad;
				$productor->leal_cp = $formulario_provisorio->leal_cp;
				$productor->leal_otro = $formulario_provisorio->leal_otro;
				$productor->administracion_calle = $formulario_provisorio->administracion_calle;
				$productor->administracion_numero = $formulario_provisorio->administracion_numero;
				$productor->administracion_telefono = $formulario_provisorio->administracion_telefono;
				$productor->administracion_pais = $formulario_provisorio->administracion_pais;
				$productor->administracion_provincia = $formulario_provisorio->administracion_provincia;
				$productor->administracion_departamento = $formulario_provisorio->administracion_departamento;
				$productor->administracion_localidad = $formulario_provisorio->administracion_localidad;
				$productor->administracion_cp = $formulario_provisorio->administracion_cp;
				$productor->administracion_otro = $formulario_provisorio->administracion_otro;
				$productor->numero_expdiente = 0; // no se q va aca
				if(isset(Auth::user()->id))
					$productor->created_by = Auth::user()->id;
				else $productor->created_by = 0;
				$productor->estado = "aprobado";
				$productor->id_formulario = $id_formulario;
				$productor->usuario_creador = $formulario_provisorio->created_by;
				$productor->save();
				return $productor->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
	public function crear_registro_mina_cantera($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$mina_cantera = new MinaCantera();
				$mina_cantera->numero_expediente = $formulario_provisorio->numero_expediente;
				$mina_cantera->distrito_minero = $formulario_provisorio->distrito_minero;
				$mina_cantera->categoria = $formulario_provisorio->categoria;
				$mina_cantera->nombre = $formulario_provisorio->nombre_mina;
				$mina_cantera->descripcion = $formulario_provisorio->descripcion_mina;
				if ($formulario_provisorio->categoria === 'tercera')
					$mina_cantera->tipo = "cantera";
				else 	$mina_cantera->tipo = "mina";
				$mina_cantera->plano_inmueble = $formulario_provisorio->plano_inmueble;
				$mina_cantera->titulo_contrato_posecion = $formulario_provisorio->titulo_contrato_posecion;
				$mina_cantera->resolucion_concesion_minera = $formulario_provisorio->resolucion_concesion_minera;
				//minerales
				//pagina mina segunda
				$mina_cantera->owner = $formulario_provisorio->owner;
				$mina_cantera->arrendatario = $formulario_provisorio->arrendatario;
				$mina_cantera->concesionario = $formulario_provisorio->concesionario;
				$mina_cantera->otros = $formulario_provisorio->otros;
				$mina_cantera->acciones_a_desarrollar = $formulario_provisorio->acciones_a_desarrollar;
				$mina_cantera->actividad = $formulario_provisorio->actividad;
				$mina_cantera->sustancias_de_aprovechamiento_comun = $formulario_provisorio->sustancias_de_aprovechamiento_comun;
				$mina_cantera->otro_caracter_acalaracion = $formulario_provisorio->otro_caracter_acalaracion;
				$mina_cantera->sustancias_de_aprovechamiento_comun_aclaracion = $formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion;

				//ubicacion de la mina
				$mina_cantera->localidad_mina_pais = "Argentina";
				$mina_cantera->localidad_mina_provincia = $formulario_provisorio->localidad_mina_provincia;
				$mina_cantera->localidad_mina_departamento = $formulario_provisorio->localidad_mina_departamento;
				$mina_cantera->localidad_mina_localidad = $formulario_provisorio->localidad_mina_localidad;
				$mina_cantera->tipo_sistema = $formulario_provisorio->tipo_sistema;
				$mina_cantera->longitud = $formulario_provisorio->longitud;
				$mina_cantera->latitud = $formulario_provisorio->latitud;
				$mina_cantera->labores = null;
				$mina_cantera->id_producido = null;
				if(isset(Auth::user()->id))
					$mina_cantera->created_by = Auth::user()->id;
				else $mina_cantera->created_by = 0;
				$mina_cantera->estado = "aprobado";
				$mina_cantera->id_formulario = $id_formulario;

				$mina_cantera->save();
				return $mina_cantera->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
	public function crear_registro_dia_iia($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$nuevo_dia = new iia_dia;
				$nuevo_dia->actividades = "dasdasdsa";
				$nuevo_dia->acciones_a_desarrollar = $formulario_provisorio->acciones_a_desarrollar;
				$nuevo_dia->dia = $formulario_provisorio->dia;
				$nuevo_dia->iia = $formulario_provisorio->iia;
				$nuevo_dia->fecha_alta_dia = $formulario_provisorio->fecha_alta_dia;
				$nuevo_dia->fecha_vencimiento = $formulario_provisorio->fecha_vencimiento_dia;
				if(isset(Auth::user()->id))
					$nuevo_dia->created_by = Auth::user()->id;
				else $nuevo_dia->created_by = 0;
				$nuevo_dia->estado = "aprobado";
				$nuevo_dia->id_formulario = $id_formulario;
				$nuevo_dia->save();
				return $nuevo_dia->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
	public function crear_registro_pago_canon($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				//creo el pago de canon
				$nuevo_pago = new Pagocanonmina;
				//$nuevo_pago->pagado = $formulario_provisorio->pagado;
				$nuevo_pago->pagado = true;
				//$nuevo_pago->fecha_pago = $formulario_provisorio->fecha_pago;
				$nuevo_pago->fecha_pago = null;
				//$nuevo_pago->monto = $formulario_provisorio->monto;
				$nuevo_pago->monto = 0.00;
				//$nuevo_pago->fecha_desde = $formulario_provisorio->fecha_desde;
				$nuevo_pago->fecha_desde =  null;
				//$nuevo_pago->fecha_hasta = $formulario_provisorio->fecha_hasta;
				$nuevo_pago->fecha_hasta = null;
				if(isset(Auth::user()->id))
					$nuevo_pago->created_by = Auth::user()->id;
				else $nuevo_pago->created_by = 0;
				$nuevo_pago->estado = "aprobado";
				$nuevo_pago->id_formulario = $id_formulario;

				$nuevo_pago->save();

				return $nuevo_pago->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
	public function crear_mina_productor($id_formulario, $id_mina, $id_productor, $id_dia)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				//dd($id_formulario,$id_mina, $id_productor, $id_dia);
				//creo la relacion mina productor
				$nuevo_mina_prod = new ProductorMina;
				$nuevo_mina_prod->id_mina = $id_mina;
				$nuevo_mina_prod->id_productor = $id_productor;
				$nuevo_mina_prod->id_formulario = $id_formulario;
				$nuevo_mina_prod->id_dia = $id_dia;
				$nuevo_mina_prod->id_personal = null;
				$nuevo_mina_prod->num_expediente_SIGETRAMI = 0;
				$nuevo_mina_prod->constancia_otros = null;
				$nuevo_mina_prod->resol_concecion_minera = null;
				$nuevo_mina_prod->fecha_preinscripcion = null;
				$nuevo_mina_prod->fecha_renovacion = null;
				$nuevo_mina_prod->primera_inscripcion = null;
				$nuevo_mina_prod->caracter = null;
				$nuevo_mina_prod->constancia_posecion = null;
				$nuevo_mina_prod->save();
				return $nuevo_mina_prod->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
	public function actualizar_registros_minerales_en_mina($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				//debo actualizar todos los registros que tengan el id del formulario y pasarlos de
				//borrador a aprobados
				$resultado = Minerales_Borradores::select('*')->where('id_formulario', '=', $id_formulario)->get();
				foreach ($resultado as $mineral) {
					$mineral->estado = 'aprobado';
					$mineral->save();
				}
				return true;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}



	public function test_aprobado_email($id)
	{
		$formulario_provisorio = FormAltaProductor::select(
			'id',
			'estado',
			'razonsocial',
			'email',
			'updated_by',
			'updated_at'
		)
			->where('id', '=', $id)->first();

		//tengo que enviar email
		//$email_a_mandar = $formulario_provisorio->email; para prod
		$email_a_mandar = 'diegochecarelli@gmail.com';
		Mail::to($email_a_mandar)->send(new AvisoFormularioAprobadoEmail(
			$id,
			"barrick gold",
			date("Y-m-d H:i:s")
		));

		//tengo que crear todos los campos de la base de datos
	}


	public function traer_provincias_json()
	{
		$lista_de_provincias = Provincias::select('id', 'nombre')->orderBy('nombre')->get();
		return response()->json($lista_de_provincias);
	}
	public function provincia_id($id)
	{
		// dd($id);
		try {
			$datos_provincia = Provincias::select('id', 'nombre')->orderBy('nombre')->where('id', '=', $id)->get();
			return response()->json($datos_provincia, 200);
		} catch (Exception $e) {
			return response()->json($e->getMessage(), 500);
		}
	}

	public function traer_departamentos_json(Request $request)
	{
		//dd($request->id_prov);
		$departamentos = Departamentos::select('id', 'nombre')->where('provincia_id', '=', $request->id_prov)->get();
		return response()->json($departamentos);
	}
	public function traer_localidades_json(Request $request)
	{
		//dd($request->id_prov);
		$departamentos = Departamentos::select('id', 'nombre')->where('provincia_id', '=', $request->id_prov)->get();
		return response()->json($departamentos);
	}

	public function traer_minerales_json(Request $request)
	{
		// dd($request->id_manifestacion);
		$minerales = Minerales::select('id', 'name', 'categoria')->where('categoria', '=', $request->categoria_buscando)->get();
		return response()->json($minerales);
	}

	public function comprobante_tramite_pdf($id)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$puedo_imprimir = false;
		if (Auth::user()->id == 1)
			$borrador = FormAltaProductor::find($id);
		if (Auth::user()->hasRole('Autoridad'))
			$borrador = FormAltaProductor::select('*')->where('provincia', '=', Auth::user()->id_provincia)->where('id', '=', $id)->first();
		if (Auth::user()->hasRole('Productor'))
			$borrador = FormAltaProductor::select('*')->where('provincia', '=', Auth::user()->id_provincia)->where('id', '=', $id)->where('created_by', '=', Auth::user()->id)->first();
		//dd( $borrador->razonsocial);
		if ($borrador != null) {
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

			if ($borrador->provincia == 70)
				$pdf = PDF::loadView('pdfs.comprobante_inicio_tramite', $data);
			elseif ($borrador->provincia == 10) // catamarca
				$pdf = PDF::loadView('pdfs.comprobante_inicio_tramite_cata', $data);
			elseif ($borrador->provincia == 50) // mendoza
			{
				$data['title'] = 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES DE LA PROVINCIA DE MENDOZA';
				$pdf = PDF::loadView('pdfs.comprobante_inicio_tramite_mendoza', $data);
			}

			return $pdf->stream('Comprobante_de_inscripcion.pdf');
		} else
			return "error";
	}


	public function pdf_para_comerciantes()
	{
		$email  = "ochamplin@gmail.com";
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
		$data = [
			'date_generado' => date('d/m/Y'),
			//1
			'razon_social' =>  "Barrick de San juan",
			'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este",
			'leal_numero' => 184,
			'leal_telefono' => 1919815656,
			'leal_departamento' => "Chimbas",
			'leal_localidad' => "Chimbas City",
			'leal_cp' => 5236,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' => 18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' => 'zona 4'

			// //5
			// 'owner' =>$formulario_provisorio->owner,
			// 'arrendatario' =>$formulario_provisorio->arrendatario,
			// 'concesionario' =>$formulario_provisorio->concesionario,
			// 'otros' =>$formulario_provisorio->otros,
			// 'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			// 'actividad' =>$formulario_provisorio->actividad,
			// 'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			// 'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			// //6

			// 'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			// 'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			// 'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			// 'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			// 'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			// 'latitud' => $formulario_provisorio->latitud,
			// 'longitud' => $formulario_provisorio->longitud,

			// //7
			// 'updated_at' => $formulario_provisorio->updated_at ,
		];

		$pdf = PDF::loadView('pdfs.formulario_productor_comerciante', $data);

		//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
		return $pdf->stream('formulario_.pdf');
		//        }
		//else response()->json("error en el email");
	}


	public function pdf_para_industrial()
	{
		$email  = "ochamplin@gmail.com";
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
		$data = [
			'date_generado' => date('d/m/Y'),
			//1
			'razon_social' =>  "Barrick de San juan",
			'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este",
			'leal_numero' => 184,
			'leal_telefono' => 1919815656,
			'leal_departamento' => "Chimbas",
			'leal_localidad' => "Chimbas City",
			'leal_cp' => 5236,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' => 18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' => 'zona 4'

			// //5
			// 'owner' =>$formulario_provisorio->owner,
			// 'arrendatario' =>$formulario_provisorio->arrendatario,
			// 'concesionario' =>$formulario_provisorio->concesionario,
			// 'otros' =>$formulario_provisorio->otros,
			// 'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			// 'actividad' =>$formulario_provisorio->actividad,
			// 'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			// 'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			// //6

			// 'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			// 'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			// 'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			// 'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			// 'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			// 'latitud' => $formulario_provisorio->latitud,
			// 'longitud' => $formulario_provisorio->longitud,

			// //7
			// 'updated_at' => $formulario_provisorio->updated_at ,
		];

		$pdf = PDF::loadView('pdfs.formulario_productor_industrial', $data);

		//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
		return $pdf->stream('formulario_.pdf');
		//        }
		//else response()->json("error en el email");
	}

	public function pdf_para_transito()
	{
		$email  = "ochamplin@gmail.com";
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
		$data = [
			'date_generado' => date('d/m/Y'),
			//1
			'razon_social' =>  "Barrick de San juan",
			'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este",
			'leal_numero' => 184,
			'leal_telefono' => 1919815656,
			'leal_departamento' => "Chimbas",
			'leal_localidad' => "Chimbas City",
			'leal_cp' => 5236,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' => 18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' => 'zona 4'

			// //5
			// 'owner' =>$formulario_provisorio->owner,
			// 'arrendatario' =>$formulario_provisorio->arrendatario,
			// 'concesionario' =>$formulario_provisorio->concesionario,
			// 'otros' =>$formulario_provisorio->otros,
			// 'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			// 'actividad' =>$formulario_provisorio->actividad,
			// 'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			// 'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			// //6

			// 'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			// 'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			// 'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			// 'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			// 'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			// 'latitud' => $formulario_provisorio->latitud,
			// 'longitud' => $formulario_provisorio->longitud,

			// //7
			// 'updated_at' => $formulario_provisorio->updated_at ,
		];

		$pdf = PDF::loadView('pdfs.autorizacion_transito', $data);

		//return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
		return $pdf->stream('formulario_.pdf');
		//        }
		//else response()->json("error en el email");
	}
}
