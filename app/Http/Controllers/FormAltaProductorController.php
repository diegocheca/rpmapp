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
				'borradores' => FormAltaProductor::paginate(7),
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
				$productor->created_by = Auth::user()->id;
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
				$mina_cantera->created_by = Auth::user()->id;
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
				$nuevo_dia->created_by =  Auth::user()->id;
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
				$nuevo_pago->created_by =  Auth::user()->id;
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



	public function cargandoexcelmdz()
	{
		$array = [];


		$faker = Faker::create();

		/*
		$array[1] = 
		[
			0 -> Distrito,
			1 -> Localidad
			2 -> Departamento,
			3-> Mina,
			4-> Nro Expte
			5-> Expte Acumulado
			6-> Nombre Yacimiento
			7-> Mineral
			8-> Diseminado
			9-> Cat
			10-> Pet
			11 -> Concesionario
			12-> Cuit
			13-> Mensura
			14-> Estado
			15-> Situación
			16-> Expte Ambiental
		 */





		$array[1] = [1, "El Sosneado", 50105, 2774, "2354-B-2002", null, "Arroyo La Manga", "1128", false, 1, 2, "null", "20-11617671-9", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[2] = [1, "El Sosneado", 50105, 2648, "2100-C-1999", null, "Atahualpa", "998", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[3] = [1, "El Sosneado", 50105, 2209, "39-P-1983", null, "Atuel", "1165", false, 2, 1, "null", "null", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[4] = [1, "El Sosneado", 50105, 17, "4249-C-41", null, "Baku", "1146", false, 1, 5, "Petroquimica Comodoro Rivadavia Sa", "30-056359811-1", "Mensurada", "Vigente", "explotación", "null"];
		$array[5] = [1, "El Sosneado", 50105, 0, "2878-M-2005", null, "Barroso", "1*994", false, 1, 1, "Minera Agaucu S.A.", "null", "S/Mensura", "Vigente", "inactiva", "577-M-2011"];
		$array[6] = [1, "El Sosneado", 50105, 2635, "3520-V-2010", null, "Beatriz", "998", true, 1, 35, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[7] = [1, "El Sosneado", 50105, 21, "1307-D-27", null, "Bolivar", "1146", false, 1, 6, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[8] = [1, "El Sosneado", 50105, 16, "4249-C-41", null, "Cerro Del Alquitran", "1146", false, 1, 5, "Petroquimica Comodoro Rivadavia Sa", "30-056359811-1", "Mensurada", "Vigente", "explotación", "null"];
		$array[9] = [1, "El Sosneado", 50105, 2588, "2104-C-1999", null, "Chipre", "998", true, 1, 1, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[10] = [1, "El Sosneado", 50105, 8, "178-H-11", null, "Cooper", "1100", false, 1, 3, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[11] = [1, "El Sosneado", 50105, 1, "3451-N-1943", null, "El Condor", "1128", false, 1, 3, "Cruz Del Sur Y Cia Srl ", "90-81043108-2", "Mensurada", "Vigente", "reserva", "null"];
		$array[12] = [1, "El Sosneado", 50105, 10, "1931-M-40", null, "Eloisa", "1128", false, 1, 7, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[13] = [1, "El Sosneado", 50105, 20, "383-H-1947", null, "Falucho", "1146", false, 1, 3, "Pott Godoy, M Y Ot", "null", "Mensurada", "Vigente", "reserva", "null"];
		$array[14] = [1, "El Sosneado", 50105, 12, "4031-J-39", null, "General Mitre", "1128", false, 1, 7, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[15] = [1, "El Sosneado", 50105, 11, "4030-L-39", null, "General Roca", "1128", false, 1, 7, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[16] = [1, "El Sosneado", 50105, 13, "4249-C-1941", null, "General San Martin", "1146", false, 1, 5, "El Sosneado Cia Argentina De Petróleo S.A.", "30-64434151-4", "Mensurada", "Vigente", "reserva", "null"];
		$array[17] = [1, "El Sosneado", 50105, 2738, "2171-C-2000", null, "La Negra", "998", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[18] = [1, "El Sosneado", 50105, 18, "4249-C-41", null, "La Paloma", "1146", false, 1, 5, "Petroquimica Comodoro Rivadavia Sa", "30-056359811-1", "Mensurada", "Vigente", "explotación", "null"];
		$array[19] = [1, "El Sosneado", 50105, 7, "4249-C-1941", null, "Los Buitres", "1146", false, 1, 5, "Petroquimica Comodoro Rivadavia Sa", "30-056359811-1", "Mensurada", "Vigente", "explotación", "null"];
		$array[20] = [1, "El Sosneado", 50105, 2591, "2317-D-2002", null, "Los Gateados", "994*995*1", true, 1, 1, "null", "null", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[21] = [1, "El Sosneado", 50105, 2589, "2311-D-2002", null, "Mala Dormida", "994*995*1", true, 1, 1, "null", "20-11617671-9", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[22] = [1, "El Sosneado", 50105, 2038, "157-Q-76", null, "Marcelo", "1128", false, 1, 3, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[23] = [1, "El Sosneado", 50105, 2524, "1025-C-95", null, "Maria 1", "994", true, 1, 1, "Cra Exploration Argentina Sa", "null", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[24] = [1, "El Sosneado", 50105, 2525, "1026-C-95", null, "Maria 2", "994", true, 1, 1, "Cra Exploration Argentina Sa", "null", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[25] = [1, "El Sosneado", 50105, 2526, "1027-C-95", null, "Maria 3", "994", true, 1, 1, "Cra Exploration Argentina Sa", "null", "S/Mensura", "Borrado", "ver patruevos", "null"];
		$array[26] = [1, "El Sosneado", 50105, 2741, "1029-G-1995", null, "Marta 4", "998", true, 1, 1, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "inactiva", "null"];
		$array[27] = [1, "El Sosneado", 50105, 2737, "1041-G-1995", null, "Marta 5", "998", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[28] = [1, "El Sosneado", 50105, 2625, "2001-C-1998", null, "Morgana", "998", true, 1, 15, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[29] = [1, "El Sosneado", 50105, 0, "2877-M-2005", null, "Oikos", "998", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[30] = [1, "El Sosneado", 50105, 15, "883-H-1943", null, "San Pablo", "1146", false, 1, 7, "null", "null", "Mensurada", "Vacante", "inactiva", "null"];
		$array[31] = [1, "El Sosneado", 50105, 14, "882-H-43/1490-P-1920", null, "San Pedro", "1146", false, 1, 6, "Lombardo F. y Oro Martín", "null", "Mensurada", "Vigente", "reserva", "null"];
		$array[32] = [1, "El Sosneado", 50105, 22, "2393-H-11", null, "Telem", "1125", false, 2, 1, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[33] = [1, "El Sosneado", 50105, 2593, "2319-D-2002", null, "Tres Lagunas", "994*995*1", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "inactiva", "null"];
		$array[34] = [1, "El Sosneado", 50105, 3, "1364-M-41", null, "Violeta", "1", false, 1, 3, "null", "null", "Mensurada", "Borrado", "ver patruevos", "null"];
		$array[35] = [1, "El Sosneado", 50105, 6, "2309-W-42/1936-H-1912", null, "Volcan Overo", "1100", false, 1, 7, "Fugazzotto, José Arturo", "20-10655229-1", "Mensurada", "Vigente", "reserva", "null"];
		$array[36] = [1, "El Sosneado", 50105, 2, "3208-F-2007", null, "Volcan Overo N° 2", "1100", false, 1, 10, "Fugazzotto, José Arturo", "20-10655229-1", "Mensurada", "Vigente", "reserva", "null"];
		$array[37] = [2, "Laguna Blanca", 50077, 41, "247-R-1993", " 726-C-1971, 4311-S-1941", "Adriana", "1", false, 1, 6, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[38] = [2, "Laguna Blanca", 50077, 40, "407-R-1994", null, "Águila Primera", "1", false, 1, 2, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[39] = [2, "Laguna Blanca", 50077, 44, "315-P-1994", null, "Amelia", "1", false, 1, 6, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[40] = [2, "Laguna Blanca", 50077, 0, "2739-C-2004", null, "Andina", "998", true, 1, 1, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[41] = [2, "Laguna Blanca", 50077, 46, "4259-F-41", null, "Anita", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[42] = [2, "Laguna Blanca", 50077, 1218, "3215-G-2007", null, "Atlas I", "999", false, 1, 6, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[43] = [2, "Laguna Blanca", 50077, 855, "255-M-1958", null, "Atlas Ii", "1006", false, 1, 5, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[44] = [2, "Laguna Blanca", 50077, 1176, "313-P-1994", null, "Bursufalse", "1", false, 1, 1, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[45] = [2, "Laguna Blanca", 50077, 495, "3201-G-2007", null, "Cerro De La Laguna", "1128", false, 1, 2, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[46] = [2, "Laguna Blanca", 50077, 2811, "2315-D-2002", null, "Cerro Del Cobre", "994*995*1", true, 1, 35, "null", "20-11617671-9", "S/Mensura", "Vacante", "", "null"];
		$array[47] = [2, "Laguna Blanca", 50077, 2592, "2318-D-2002", null, "Cerros Amarillos", "994*995*1", true, 1, 1, "null", "20-11617671-9", "S/Mensura", "Vacante", "", "null"];
		$array[48] = [2, "Laguna Blanca", 50077, 42, "110-R-1994", null, "Clotilde", "1", false, 1, 6, "Desarrollo De Prospectos Mineros S.A.", "33-61913055-9", "Mensurada", "Vigente", "", "null"];
		$array[49] = [2, "Laguna Blanca", 50077, 48, "449-P-1994", null, "Cobrecito", "1", false, 1, 5, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[50] = [2, "Laguna Blanca", 50077, 489, "145-M-47", null, "Coihueco", "1128", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[51] = [2, "Laguna Blanca", 50077, 2085, "165-L-1977", null, "Don Luis", "1045", false, 2, 3, "La Elcha Minera Industrial Sa", "30-56788697-9", "Mensurada", "Vigente", "", "null"];
		$array[52] = [2, "Laguna Blanca", 50077, 32, "303-M-1937", null, "El Burrero (P 1)", "1", false, 1, 1, "I.E.C.S.A. S.A.", "30-56845748-1", "Mensurada", "Vigente", "", "null"];
		$array[53] = [2, "Laguna Blanca", 50077, 38, "579-P-1962", null, "El Burrero (P 2/5)", "1", false, 1, 4, "Minera Geometales S.A.", "30-56845748-1", "Mensurada", "Vigente", "", "null"];
		$array[54] = [2, "Laguna Blanca", 50077, 51, "1857-L-1998", null, "El Coloso", "1", false, 1, 6, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[55] = [2, "Laguna Blanca", 50077, 45, "3504-D-2010", null, "El Guanaco", "1", false, 1, 12, "Dumit truemeram, Diego Raúl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[56] = [2, "Laguna Blanca", 50077, 765, "3212-G-2007", null, "El Salvador", "999", false, 1, 2, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[57] = [2, "Laguna Blanca", 50077, 1386, "316-P-1994", null, "Fortuna", "1", false, 1, 3, "Construcc. E Invertrueones Latifalseameric.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[58] = [2, "Laguna Blanca", 50077, 37, "1430-R-38", null, "Hierro Indio", "999", false, 1, 3, "Fugazzotto, José Arturo Y Otros", "20-10655229-1", "Mensurada", "Vigente", "", "null"];
		$array[59] = [2, "Laguna Blanca", 50077, 50, "241-T-1991", null, "Hilda", "1", false, 1, 4, "Tarquini, Nello", "20-03256012-2", "Mensurada", "Vigente", "", "null"];
		$array[60] = [2, "Laguna Blanca", 50077, 49, "184-T-1908", null, "Juanita", "1", false, 1, 6, "Concina, Raúl Ernesto", "20-11617671-9", "Mensurada", "Vigente", "", "null"];
		$array[61] = [2, "Laguna Blanca", 50077, 2185, "220-P-80", null, "La Gloria", "1134", false, 1, 1, "Artrecos Saicfima", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[62] = [2, "Laguna Blanca", 50077, 35, "3286-M-2007", null, "La Matilde", "1146", false, 1, 7, "Minera Agaucu S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[63] = [2, "Laguna Blanca", 50077, 488, "3168-G-2006", null, "Laguna Blanca", "1027", false, 1, 2, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[64] = [2, "Laguna Blanca", 50077, 34, "578-I-1962", null, "Las Choicas (P 2/7)", "1", false, 1, 6, "Minera Geometales S.A.", "30-56845745-1", "Mensurada", "Vigente", "", "null"];
		$array[65] = [2, "Laguna Blanca", 50077, 686, "422-B-52", null, "Las Lagunitas", "1165", false, 2, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[66] = [2, "Laguna Blanca", 50077, 2594, "2320-D-2002", null, "Las Leñas", "994*995*1", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[67] = [2, "Laguna Blanca", 50077, 2772, "2140-C-1999", null, "Lazaro", "1*994", true, 1, 2, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[68] = [2, "Laguna Blanca", 50077, 2565, "144-G-1996", null, "Lilian 5", "998", true, 1, 1, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[69] = [2, "Laguna Blanca", 50077, 2566, "3350-C-2009", null, "Lucía 1", "998", true, 1, 1, "Ladera Sur S.A.", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[70] = [2, "Laguna Blanca", 50077, 0, "1042-G-1995", null, "Lucía 2", "998", true, 1, 1, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[71] = [2, "Laguna Blanca", 50077, 2763, "26-G-1996", null, "Lucía 3", "998", true, 1, 1, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[72] = [2, "Laguna Blanca", 50077, 2583, "37-G-1996", null, "Lucía 6", "998", true, 1, 2, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[73] = [2, "Laguna Blanca", 50077, 0, "3489-R-2010", null, "Nin", "1030", false, 1, 1, "Racioppi, Gustavo", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[74] = [2, "Laguna Blanca", 50077, 0, "3469-R-2010", null, "Pipo", "1030", false, 1, 1, "Racioppi, Gustavo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[75] = [2, "Laguna Blanca", 50077, 1360, "186-I-1965", null, "Rojifalse", "1045", false, 2, 2, "La Elcha Minera Industrial Sa", "30-56788697-9", "Mensurada", "Vigente", "", "null"];
		$array[76] = [2, "Laguna Blanca", 50077, 1016, "348-B-59", null, "Santa Catalina", "1045", false, 2, 1, "Fábrega, José Eloy", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[77] = [2, "Laguna Blanca", 50077, 2562, "1096-G-95", null, "Silvia 4", "1", true, 1, 35, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[78] = [2, "Laguna Blanca", 50077, 2563, "3521-V-2010", null, "Silvia 5", "998", true, 1, 29, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[79] = [2, "Laguna Blanca", 50077, 2767, "25-G-1996", null, "Silvia 6", "998", true, 1, 40, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[80] = [2, "Laguna Blanca", 50077, 47, "21-C-46", null, "Sybil", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[81] = [2, "Laguna Blanca", 50077, 39, "3213-G-2007", null, "Victoria", "1", false, 1, 3, "Guerrero, Enrique Darío", "20-10907051-4", "Mensurada", "Vigente", "", "null"];
		$array[82] = [2, "Laguna Blanca", 50077, 43, "109-R-1994", null, "Villagra", "1", false, 1, 7, "Desarrollo De Prospectos Mineros S.A.", "33-61913055-9", "Mensurada", "Vigente", "", "null"];
		$array[83] = [3, "Malargüe Norte", 50077, 0, "2797-M-2005", null, "Alpargata", "994*1", false, 0, 0, "Minera Agaucu S.A.", "null", "null,null,null", "472-M-2007"];
		$array[84] = [3, "Malargüe Norte", 50077, 667, "2802-D-2005", null, "Andalucia", "1100", false, 1, 2, "Denaro Larrea", "Víctor Hugo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[85] = [3, "Malargüe Norte", 50077, 2770, "1528-G-1997", null, "Atila", "994*-1", true, 1, 1, "null", "null", "null", "Vacante", "null", "null"];
		$array[86] = [3, "Malargüe Norte", 50077, 1439, "386-C-66", null, "Cerro Amarillo", "999", false, 1, 3, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[87] = [3, "Malargüe Norte", 50077, 2254, "147-D-84", null, "Chifalse", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[88] = [3, "Malargüe Norte", 50077, 766, "3101-M-1958", null, "Chiquito", "1045", false, 2, 3, "Marang, Luis Humberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[89] = [3, "Malargüe Norte", 50077, 61, "770-R-1939", null, "Cuhinchenke", "1000", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[90] = [3, "Malargüe Norte", 50077, 1325, "90-B-1993", null, "Don Sosa", "999", false, 1, 3, "Cia.Minera Solitario Argentina Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[91] = [3, "Malargüe Norte", 50077, 2739, "2174-C-2000", null, "El Arriero", "998", true, 1, 1, "Concina, Raúl Ernesto", "null", "null,Vigente", "null", "null"];
		$array[92] = [3, "Malargüe Norte", 50077, 2260, "147-D-84", null, "El Arroyo", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[93] = [3, "Malargüe Norte", 50077, 547, "642-C-1948", null, "El Cajon", "1000", false, 1, 4, "Santisteban, Raúl Horacio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[94] = [3, "Malargüe Norte", 50077, 2379, "90-D-88", null, "El Gato", "994*1000", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[95] = [3, "Malargüe Norte", 50077, 2259, "147-D-84", null, "El Martillo", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[96] = [3, "Malargüe Norte", 50077, 555, "287-C-1949", null, "El Paramo", "1000", false, 1, 3, "Santisteban, Raúl Horacio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[97] = [3, "Malargüe Norte", 50077, 2257, "147-D-84", null, "El Rayo", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[98] = [3, "Malargüe Norte", 50077, 2378, "90-D-88", null, "El Serrucho", "994*1000", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[99] = [3, "Malargüe Norte", 50077, 2664, "27-G-1996", null, "Elisa 2", "998", true, 1, 5, "Concina, Raúl Ernesto", "null", "null,Vigente", "null", "null"];
		$array[100] = [3, "Malargüe Norte", 50077, 1923, "35-Q-71", null, "Enriquito", "1000", false, 1, 3, "Quiñones, Gerardo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[101] = [3, "Malargüe Norte", 50077, 2262, "147-D-84", null, "Filon Rico", "1000*995", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[102] = [3, "Malargüe Norte", 50077, 2261, "147-D-84", null, "Fortuna", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[103] = [3, "Malargüe Norte", 50077, 970, "329-F-1960", null, "Hierro Felix", "999", false, 1, 5, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[104] = [3, "Malargüe Norte", 50077, 2771, "2138-C-1999", null, "La Carva", "998", true, 1, 1, "null", "null", "null,Vacante", "null", "null"];
		$array[105] = [3, "Malargüe Norte", 50077, 556, "303-C-1949", null, "La Cumbre", "1000", false, 1, 3, "Santisteban, Raúl Horacio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[106] = [3, "Malargüe Norte", 50077, 2396, "47-M-86", null, "La Encontrada", "1045", false, 2, 1, "null", "null", "S/Mensura", "Vacante ,null", "null"];
		$array[107] = [3, "Malargüe Norte", 50077, 60, "924-L-1917", null, "La Flor", "1000", false, 1, 5, "Santisteban, Raúl Horacio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[108] = [3, "Malargüe Norte", 50077, 2055, "147-D-84", null, "La Florida", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[109] = [3, "Malargüe Norte", 50077, 910, "62434-C-1955", null, "La Itruedora", "1045", false, 2, 2, "Martínez, Irma Isabel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[110] = [3, "Malargüe Norte", 50077, 1437, "2233-G-2001", null, "La Malarguina", "1100", false, 1, 1, "Guasch, Luciana Mercedes", "null", "Mensurada", "Vigente", "null", "null"];
		$array[111] = [3, "Malargüe Norte", 50077, 62, "589-M-21", null, "La Valenciana", "1128", false, 1, 7, "Monserrat, Datrue J", "null", "Mensurada", "Vigente", "null", "null"];
		$array[112] = [3, "Malargüe Norte", 50077, 897, "877-H-1959", null, "Los Angeles", "999", false, 1, 5, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[113] = [3, "Malargüe Norte", 50077, 576, "3324-S-2008", null, "Los Castaños", "1134", false, 1, 2, "Sly, Cristobal David", "null", "Mensurada", "Vigente", "null", "null"];
		$array[114] = [3, "Malargüe Norte", 50077, 0, "3089-B-2006", null, "Lucila I", "998", true, 1, 1, "Bengochea, Jorge D.", "null", "null,Vigente", "null", "null"];
		$array[115] = [3, "Malargüe Norte", 50077, 1882, "378-C-73", null, "Lucy", "1045", false, 2, 1, "Caccavari, Jose R.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[116] = [3, "Malargüe Norte", 50077, 2529, "109-B-1990", null, "Luna De Plata", "1101", false, 2, 30, "Bustos Luis Omar Y La Elcha", "null", "Mensurada", "Vigente", "null", "null"];
		$array[117] = [3, "Malargüe Norte", 50077, 2264, "147-D-84", null, "Manto I", "1000*1145", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[118] = [3, "Malargüe Norte", 50077, 2263, "147-D-84", null, "Manto II", "1000*995", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[119] = [3, "Malargüe Norte", 50077, 71, "2295-R-1940", null, "Martita", "1134", false, 1, 6, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[120] = [3, "Malargüe Norte", 50077, 2152, "2501-C-2003", null, "falserma", "1045", false, 2, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[121] = [3, "Malargüe Norte", 50077, 0, "3490-R-2010", null, "Pipo 1", "1030", false, 1, 1, "Raciopi, Gustavo Y Castafalse María Cristina", "null", "null,Vigente", "null", "null"];
		$array[122] = [3, "Malargüe Norte", 50077, 2256, "147-D-84", null, "Platero", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[123] = [3, "Malargüe Norte", 50077, 2789, "2625-G-2004", null, "Polaris", "1045", false, 2, 3, "Geoandina S.R.L.", "null", "null,Vigente", "null", "null"];
		$array[124] = [3, "Malargüe Norte", 50077, 2026, "31-S-1976", null, "Santa Barbara", "1134", false, 1, 1, "Guerrero, Enrique Darío", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[125] = [3, "Malargüe Norte", 50077, 2258, "147-D-84", null, "Santa Teretrueta", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[126] = [3, "Malargüe Norte", 50077, 2748, "2986-G-2005", null, "Sector a", "998", true, 1, 1, "Gramage, Rolando Nestor", "null", "null,Vigente", "null", "null"];
		$array[127] = [3, "Malargüe Norte", 50077, 2253, "147-D-84", null, "Sorpresa", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[128] = [3, "Malargüe Norte", 50077, 1774, "148-P-71", null, "Tito I", "999", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[129] = [3, "Malargüe Norte", 50077, 2265, "147-D-84", null, "Truefalse", "1000", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[130] = [3, "Malargüe Norte", 50077, 2582, "1080-G-1995", null, "Verónica 3", "998", true, 1, 1, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[131] = [3, "Malargüe Norte", 50077, 1001, "1133-G-59", null, "Vic-Jor", "999", false, 1, 7, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[132] = [3, "Malargüe Norte", 50077, 0, "3435-G-2009", null, "Villarito", "1", null, 1, 1, "Gramage, Rolando Nestor", "null", "null,Vigente", "null", "null"];
		$array[133] = [3, "Malargüe Norte", 50077, 2590, "2312-D-2002", null, "Vulcanitas Del ChoiyoI", "994*995*1", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[134] = [4, "Malargüe Sur", 50077, 1320, "4-T-64", null, "Adela Aurora", "999", false, 1, 2, "Val Germán Armando", "null", "Mensurada", "Vigente", "null", "null"];
		$array[135] = [4, "Malargüe Sur", 50077, 2814, "2993-F-2005", null, "Araucana 4", "1174*998", true, 1, 20, "Energía Mineral Inc. S.A.", "30-70939644-3", "S/Mensura", "Vigente", "", "null"];
		$array[136] = [4, "Malargüe Sur", 50077, 2717, "2992-F-2005", null, "Araucana 5", "1174*998", true, 1, 21, "Energía Mineral Inc. S.A.", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[137] = [4, "Malargüe Sur", 50077, 2572, "3359-D-2009", null, "El Destifalse", "1*994", true, 1, 15, "Laex S.A.", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[138] = [4, "Malargüe Sur", 50077, 690, "3222-B-2007", null, "El Kaisser", "999", false, 1, 7, "Bieschke, Cristina Edith", "null", "Mensurada", "Vacante", "null", "null"];
		$array[139] = [4, "Malargüe Sur", 50077, 2587, "882-G-1997", null, "Fausto", "1*994", true, 1, 1, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[140] = [4, "Malargüe Sur", 50077, 808, "1091-T-1995", null, "Huemul", "1174", false, 1, 19, "Roney Claude Long", "20-10272354-7", "Mensurada", "Vigente", "", "null"];
		$array[141] = [4, "Malargüe Sur", 50077, 2682, "356-C-1996", null, "Leandro", "998", true, 1, 1, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[142] = [4, "Malargüe Sur", 50077, 2564, "1081-G-1995", null, "Melisa 3", "998", true, 1, 15, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[143] = [4, "Malargüe Sur", 50077, 713, "248-I-57", null, "Piedra Iman", "999", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[144] = [4, "Malargüe Sur", 50077, 1043, "483-V-59", null, "Rincon D/Las Tordillas", "999", false, 1, 2, "Quiroga, Ricardo F", "null", "Mensurada", "Vigente", "null", "null"];
		$array[145] = [4, "Malargüe Sur", 50077, 0, "672-A-1996", null, "Sanson II", "1*994*995", true, 1, 1, "Argentina Mineral Development S.A.", "30-70939644-3", "S/Mensura", "Vigente", "", "null"];
		$array[146] = [4, "Malargüe Sur", 50077, 1030, "273-D-61", null, "Santa Catalina", "1045", false, 2, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[147] = [4, "Malargüe Sur", 50077, 2681, "355-C-1996", null, "truelvana", "998", true, 1, 1, "Concina, Raúl Ernesto", "20-11617671-9", "S/Mensura", "Vigente", "", "null"];
		$array[148] = [5, "Rio Grande", 50077, 152, "1205-B-42", null, "Aida", "1128", false, 1, 5, "Ing.Roberto Marín S.A.", "90-80003213-9", "Mensurada", "Vigente", "", "null"];
		$array[149] = [5, "Rio Grande", 50077, 150, "163-B-22", null, "Bernardifalse Rivadavia", "1146", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[150] = [5, "Rio Grande", 50077, 963, "1326-C-59", null, "Buenaventura", "999", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[151] = [5, "Rio Grande", 50077, 1164, "3247-F-2007", null, "Carloncho", "1045", false, 2, 1, "Fábrega, José Eloy", "20-08239411-8", "S/Mensura", "Vigente", "", "null"];
		$array[152] = [5, "Rio Grande", 50077, 589, "403-C-1951", null, "El Compadrito", "1045", false, 2, 2, "Municipalidad De 50077", "null", "Mensurada", "Vigente", "null", "null"];
		$array[153] = [5, "Rio Grande", 50077, 1664, "424-D-68", null, "El Indio", "1", false, 1, 1, "Talcomín Srl - P/ Quiebra", "30-53218278-2", "S/Mensura", "Vigente", "", "null"];
		$array[154] = [5, "Rio Grande", 50077, 926, "390-S-1960", null, "El Manzafalse", "1", false, 1, 2, "Orion Del Sur S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[155] = [5, "Rio Grande", 50077, 524, "5621-M-43", null, "Fray Luis Beltran", "1128", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[156] = [5, "Rio Grande", 50077, 147, "3431-B-21", null, "General Belgrafalse", "1146", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[157] = [5, "Rio Grande", 50077, 145, "2258-L-2001", null, "General San Martin", "1146", false, 1, 2, "Iman S.A.Explotaciones Mineras ", "null", "Mensurada", "Vigente", "null", "null"];
		$array[158] = [5, "Rio Grande", 50077, 148, "3426-B-21", null, "General Urquiza", "1146", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[159] = [5, "Rio Grande", 50077, 953, "389-S-1960", null, "Liu Cullin", "1", false, 1, 3, "Orion Del Sur S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[160] = [5, "Rio Grande", 50077, 1322, "3-T-64", null, "Luis Enrique", "999", false, 1, 2, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[161] = [5, "Rio Grande", 50077, 591, "93-T-1950", null, "Luthema", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vigente", "null", "null"];
		$array[162] = [5, "Rio Grande", 50077, 592, "94-T-1950", null, "Mallin Redondo", "1000", false, 1, 2, "Porte, Lidia Adela", "null", "Mensurada", "Vigente", "null", "null"];
		$array[163] = [5, "Rio Grande", 50077, 1034, "660-T-61", null, "Maria Del Carmen", "1159", false, 2, 3, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[164] = [5, "Rio Grande", 50077, 149, "164-B-22", null, "Mariafalse Morefalse", "1146", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[165] = [5, "Rio Grande", 50077, 151, "542-M-41", null, "Mercedes O Anita", "1128", false, 1, 5, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[166] = [5, "Rio Grande", 50077, 586, "92-T-1950", null, "Monteagudo", "999", false, 1, 2, "Porte, Lidia Adela", "null", "Mensurada", "Vigente", "null", "null"];
		$array[167] = [5, "Rio Grande", 50077, 2742, "1492-G-1997", null, "Salomón", "994*1*1022", true, 1, 29, "De La Parra Navarrete, Alberto Marcos", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[168] = [5, "Rio Grande", 50077, 1648, "423-D-68", null, "San Miguel", "1045", false, 2, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[169] = [5, "Rio Grande", 50077, 2769, "2644-M-2004", null, "Tierra Huarpe ViI", "1*995", true, 1, 6, "Orion Del Sur S.A.", "90-81018511-1", "S/Mensura", "Vigente", "", "null"];
		$array[170] = [5, "Rio Grande", 50077, 2746, "2918-M-2005", null, "Veluno", "994*998", true, 1, 6, "Maref S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[171] = [6, "Calmuco", 50077, 908, "730-R-1958", null, "Blanca", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[172] = [6, "Calmuco", 50077, 930, "902-G-58", null, "Cacho", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[173] = [6, "Calmuco", 50077, 1150, "6-L-62", null, "Cesar", "1", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[174] = [6, "Calmuco", 50077, 1768, "66-C-72", null, "Costa Rica", "1", false, 1, 5, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[175] = [6, "Calmuco", 50077, 2305, "79-B-85", null, "El Castillo", "1164", false, 2, 1, "Bustos, Luis o", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[176] = [6, "Calmuco", 50077, 997, "732-S-58", null, "El Negro", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[177] = [6, "Calmuco", 50077, 929, "734-S-1958", null, "Gilda", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[178] = [6, "Calmuco", 50077, 923, "739-C-1958", null, "Gustavo", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[179] = [6, "Calmuco", 50077, 907, "131-D-1957", null, "Horacito", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[180] = [6, "Calmuco", 50077, 544, "3280-P-2007", null, "Juan Carlos", "1000", false, 1, 2, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[181] = [6, "Calmuco", 50077, 2207, "75-B-83", null, "La Calle", "1164", false, 2, 5, "Balmaceda, Miguel A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[182] = [6, "Calmuco", 50077, 2380, "166-B-85", null, "La Celeste", "1164", false, 2, 1, "Balmaceda, Miguel A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[183] = [6, "Calmuco", 50077, 174, "2663-M-1938", null, "La Chola", "1100", false, 1, 3, "Balmaceda, Miguel A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[184] = [6, "Calmuco", 50077, 548, "94-T-49", null, "La Puntilla", "1000", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[185] = [6, "Calmuco", 50077, 0, "531-F-1996", null, "María Laura 17", "1*994*995", true, 1, 1, "Femenía, Juan", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[186] = [6, "Calmuco", 50077, 0, "534-F-1996", null, "María Laura 20", "1*995", true, 1, 1, "Femenía, Juan", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[187] = [6, "Calmuco", 50077, 2798, "3190-B-2006", null, "Miguel Angel", "999", false, 2, 1, "Balmaceda, Miguel Angel Y Otros", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[188] = [6, "Calmuco", 50077, 2436, "220-I-88", null, "Nº 11 Maria Victoria", "1164", false, 2, 1, "Industrias truederurgicas Grastrue Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[189] = [6, "Calmuco", 50077, 1961, "3009-M-2005", null, "Palas Ateneas", "1045", false, 2, 1, "Maref S.A.", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[190] = [6, "Calmuco", 50077, 909, "128-V-1957", null, "Patricia", "1164", false, 2, 1, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[191] = [6, "Calmuco", 50077, 2431, "35-D-88", null, "Pedro", "1164", false, 2, 1, "De La Torre, Duilio M", "null", "Mensurada", "Vigente", "null", "null"];
		$array[192] = [6, "Calmuco", 50077, 175, "363-S-1945", null, "Ranquiles", "1164", false, 2, 3, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[193] = [6, "Calmuco", 50077, 176, "391-S-1945", null, "Salinas Del Luncay", "1164", false, 2, 3, "Grastrue E., Grastrue Luis Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[194] = [6, "Calmuco", 50077, 2796, "2502-L-2003", null, "San Juan", "1176*1138", true, 2, 10, "La Elcha Misa Y Bustos Abel", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[195] = [6, "Calmuco", 50077, 169, "57-L-1946", null, "Thelma", "1146", false, 1, 2, "El Sosneado Cia Argentina De Petróleo S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[196] = [7, "Pampa Palauco", 50077, 1641, "3295-F-2008", null, "Ceferifalse", "1", false, 1, 2, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[197] = [7, "Pampa Palauco", 50077, 1104, "83738-P-1953", null, "Cerro Mirafalse", "1*1174", false, 1, 2, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[198] = [7, "Pampa Palauco", 50077, 2523, "60-R-1993", null, "Claudia", "1100", true, 1, 3, "Rubinstein, Claudia Viviana", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[199] = [7, "Pampa Palauco", 50077, 2527, "112-C-92", null, "Florencia", "1100", true, 1, 3, "Recursos Americafalses Argentifalses Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[200] = [7, "Pampa Palauco", 50077, 2453, "3487-E-2010", null, "Manifest Aº D/L Leones", "1", false, 1, 1, "Energía Mineral Inc. S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[201] = [7, "Pampa Palauco", 50077, 2451, "79-D-1990", null, "Manifest Casa D/Piedra", "1", false, 1, 1, "null", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[202] = [7, "Pampa Palauco", 50077, 2448, "76-D-90", null, "Manifest Dominguez", "1", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[203] = [7, "Pampa Palauco", 50077, 2450, "78-D-1990", null, "Manifest Hidalgo", "1", false, 1, 1, "Energía Mineral Inc. S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[204] = [7, "Pampa Palauco", 50077, 2452, "3485-E-2010", null, "Manifest Medina", "1", false, 1, 1, "Energía Mineral Inc. S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[205] = [7, "Pampa Palauco", 50077, 2449, "77-D-90", null, "Manifest Ureña", "1", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[206] = [7, "Pampa Palauco", 50077, 1649, "3119-E-2006", null, "Maria Elena", "1", false, 1, 2, "Energía Mineral Inc. S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[207] = [7, "Pampa Palauco", 50077, 2528, "133-R-92", null, "Maximiliafalse", "1100", true, 1, 3, "Rubinstein, Claudia Viviana", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[208] = [7, "Pampa Palauco", 50077, 857, "945-L-58", null, "falserma", "999", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[209] = [7, "Pampa Palauco", 50077, 1534, "2200-U-2001", null, "Pablo Daniel", "1", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[210] = [7, "Pampa Palauco", 50077, 0, "3342-E-2008", null, "Puesto Muñoz", "1174", true, 1, 1, "Energía Mineral Inc. S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[211] = [7, "Pampa Palauco", 50077, 2749, "3110-E-2006", null, "Ranquil-Co-Este", "1174*998", true, 1, 35, "Energía Mineral Inc. S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[212] = [7, "Pampa Palauco", 50077, 1011, "83795-C-1953", null, "Rosa", "1*1174", false, 1, 3, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[213] = [7, "Pampa Palauco", 50077, 1009, "83802-C-1953", null, "Uryco", "1*1174", false, 1, 3, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[214] = [8, "Sierra De Reyes", 50077, 1703, "159-C-70", null, "Alexandra", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[215] = [8, "Sierra De Reyes", 50077, 1560, "414-C-66", null, "Andrea", "1", false, 1, 1, "Boschin, Roberto Ariel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[216] = [8, "Sierra De Reyes", 50077, 2071, "32-L-76", null, "Barrancas", "1134", false, 1, 6, "Artrecos Saicfima", "null", "Mensurada", "Vigente", "null", "null"];
		$array[217] = [8, "Sierra De Reyes", 50077, 2071, "32-L-1976", null, "Barrancas", "1134", false, 1, 6, "Fugazzotto, José Arturo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[218] = [8, "Sierra De Reyes", 50077, 1746, "410-C-66", null, "Carlos", "1", false, 1, 1, "Concina, Raúl Ernesto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[219] = [8, "Sierra De Reyes", 50077, 1745, "178-C-67", null, "Cristobal", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[220] = [8, "Sierra De Reyes", 50077, 2097, "166-C-78", null, "Don Roque", "1164*1118", false, 2, 514, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[221] = [8, "Sierra De Reyes", 50077, 2097, "166-C-1978", null, "Don Roque", "1164*1118", false, 2, 514, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[222] = [8, "Sierra De Reyes", 50077, 2093, "165-C-78", null, "El Cruce", "1164*1118", false, 2, 372, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[223] = [8, "Sierra De Reyes", 50077, 2093, "165-C-1978", null, "El Cruce", "1164*1118", false, 2, 372, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[224] = [8, "Sierra De Reyes", 50077, 1844, "311-A-73", null, "El Ñaco", "1134", false, 1, 2, "Artrecos Saicfima", "null", "Mensurada", "Vigente", "null", "null"];
		$array[225] = [8, "Sierra De Reyes", 50077, 1844, "3218-F-2007", null, "El Ñaco", "1134", false, 1, 2, "Fugazzotto, José Arturo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[226] = [8, "Sierra De Reyes", 50077, 1545, "412-C-66", null, "Elvira", "1", false, 1, 1, "Concina, Raúl Ernesto", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[227] = [8, "Sierra De Reyes", 50077, 1545, "412-C-1966", null, "Elvira", "1", false, 1, 1, "Concina, Raúl Ernesto", "null", "Mensurada", "null,null", "null"];
		$array[228] = [8, "Sierra De Reyes", 50077, 2230, "131-A-82", null, "Ernestina", "1134", false, 1, 1, "Poquet De Casale, Nelly", "null", "Mensurada", "Vigente", "null", "null"];
		$array[229] = [8, "Sierra De Reyes", 50077, 2230, "131-A-1982", null, "Ernestina", "1134", false, 1, 1, "Sly, Cristobal David", "null", "Mensurada", "Vigente", "null", "null"];
		$array[230] = [8, "Sierra De Reyes", 50077, 1569, "411-C-66", null, "Graciela I", "1", false, 1, 1, "Concina, Raúl Ernesto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[231] = [8, "Sierra De Reyes", 50077, 1541, "406-C-66", null, "Graciela II", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[232] = [8, "Sierra De Reyes", 50077, 2096, "167-C-78", null, "Guitarras", "1164*1118", false, 2, 584, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[233] = [8, "Sierra De Reyes", 50077, 2096, "167-C-1978", null, "Guitarras", "1164*1118", false, 2, 584, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vacante", "null", "null"];
		$array[234] = [8, "Sierra De Reyes", 50077, 177, "3034-M-20", null, "Isabel", "1128", false, 1, 7, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[235] = [8, "Sierra De Reyes", 50077, 1702, "143-C-70", null, "Jestrueca", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[236] = [8, "Sierra De Reyes", 50077, 1702, "143-C-1970", null, "Jestrueca", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[237] = [8, "Sierra De Reyes", 50077, 1744, "381-C-68", null, "Jose", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[238] = [8, "Sierra De Reyes", 50077, 2521, "296-M-92", null, "Kim", "1169", false, 1, 30, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[239] = [8, "Sierra De Reyes", 50077, 2521, "296-M-1992", null, "Kim", "1169", false, 1, 30, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[240] = [8, "Sierra De Reyes", 50077, 1743, "413-C-66", null, "La Arletrueana", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[241] = [8, "Sierra De Reyes", 50077, 178, "4526-S-41", null, "La Carmelita", "1", false, 1, 5, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[242] = [8, "Sierra De Reyes", 50077, 178, "4526-S-1941", null, "La Carmelita", "1", false, 1, 5, "null", "null", "Mensurada", "null,null", "null"];
		$array[243] = [8, "Sierra De Reyes", 50077, 2290, "35-D-85", null, "La Nube", "1169", false, 1, 6, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[244] = [8, "Sierra De Reyes", 50077, 2290, "35-D-1985", null, "La Nube", "1169", false, 1, 6, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[245] = [8, "Sierra De Reyes", 50077, 2094, "168-C-78", null, "Los Tilos", "1164*1118", false, 2, 4, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[246] = [8, "Sierra De Reyes", 50077, 2094, "168-C-1978", null, "Los Tilos", "1164*1118", false, 2, 4, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[247] = [8, "Sierra De Reyes", 50077, 1741, "177-C-67", null, "Luis", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[248] = [8, "Sierra De Reyes", 50077, 1704, "160-C-70", null, "Manhatan", "1", false, 1, 6, "Concina, Raúl Ernesto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[249] = [8, "Sierra De Reyes", 50077, 1555, "404-C-66", null, "Marcela", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[250] = [8, "Sierra De Reyes", 50077, 742, "3145-F-2006", null, "Maria Cristina", "1134", false, 1, 3, "Fugazzotto, José Arturo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[251] = [8, "Sierra De Reyes", 50077, 742, "3145-F-2006", null, "María Cristina", "1134", false, 1, 3, "Fugazzotto, José Arturo", "null", "Mensurada", "null,null", "null"];
		$array[252] = [8, "Sierra De Reyes", 50077, 2245, "286-Q-84", null, "Maria Soledad", "1169", false, 1, 6, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[253] = [8, "Sierra De Reyes", 50077, 2245, "286-M-1984", null, "María Soledad", "1169", false, 1, 6, "Potatrueo Río Colorado S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[254] = [8, "Sierra De Reyes", 50077, 1640, "425-C-68", null, "Maximina", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[255] = [8, "Sierra De Reyes", 50077, 1742, "377-C-68", null, "Nidia", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[256] = [8, "Sierra De Reyes", 50077, 1845, "310-A-73", null, "Pablita", "1134", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[257] = [8, "Sierra De Reyes", 50077, 1543, "403-C-66", null, "Patricia", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[258] = [8, "Sierra De Reyes", 50077, 1621, "398-C-68", null, "Patricia II", "1", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[259] = [8, "Sierra De Reyes", 50077, 1539, "176-C-67", null, "Perla", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[260] = [8, "Sierra De Reyes", 50077, 1740, "374-C-68", null, "Rosa", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[261] = [8, "Sierra De Reyes", 50077, 1740, "3053-B-2006", null, "Rosa", "1", false, 1, 1, "Bustos, Blanca Leticia", "null", "Mensurada", "Vigente", "null", "null"];
		$array[262] = [8, "Sierra De Reyes", 50077, 1005, "3-P-61", null, "San Jose", "1006", false, 1, 7, "Poblete, Andres Y Ots", "null", "Mensurada", "Vigente", "null", "null"];
		$array[263] = [8, "Sierra De Reyes", 50077, 179, "4678-S-1942", null, "San Romeleo", "1", false, 1, 5, "Labsa Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[264] = [8, "Sierra De Reyes", 50077, 179, "4678-S-1942", null, "San Romeleo", "1", false, 1, 5, "Labsa Sa", "null", "Mensurada", "null,null", "null"];
		$array[265] = [8, "Sierra De Reyes", 50077, 1542, "405-C-66", null, "Sandra", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[266] = [8, "Sierra De Reyes", 50077, 2136, "202-V-79", null, "Santa Rita", "1134", false, 1, 1, "Artrecos Saicfima", "null", "Mensurada", "Vigente", "null", "null"];
		$array[267] = [8, "Sierra De Reyes", 50077, 2136, "202-V-1979", null, "Santa Rita", "1134", false, 1, 1, "Fugazzotto, José Arturo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[268] = [8, "Sierra De Reyes", 50077, 817, "2335-V-2002", null, "Sierra De Reyes N° 1", "1134", false, 1, 7, "Viriglio, María Susana", "null", "Mensurada", "Vacante", "null", "null"];
		$array[269] = [8, "Sierra De Reyes", 50077, 816, "2189-V-2000", null, "Sierra De Reyes N° 2", "1134", false, 1, 6, "Viriglio, María Susana", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[270] = [8, "Sierra De Reyes", 50077, 817, "2335-V-2002", null, "Sierra De Reyes N°1", "1134", false, 1, 7, "Viriglio, María Susana", "null", "Mensurada", "null,null", "null"];
		$array[271] = [8, "Sierra De Reyes", 50077, 816, "2189-V-2000", null, "Sierra De Reyes N°2", "1134", false, 1, 6, "Viriglio, María Susana", "null", "Mensurada", "null,null", "null"];
		$array[272] = [8, "Sierra De Reyes", 50077, 758, "3325-S-2008", null, "truelvia", "1134", false, 1, 1, "Sly, Cristobal David", "null", "Mensurada", "Vigente", "null", "null"];
		$array[273] = [8, "Sierra De Reyes", 50077, 758, "3325-S-2008", null, "truelvia", "1134", false, 1, 1, "Sly, Cristobal David", "null", "Mensurada", "null,null", "null"];
		$array[274] = [8, "Sierra De Reyes", 50077, 1753, "376-C-68", null, "Teretrueta", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[275] = [9, "El Nevado", 50077, 1454, "609-Q-65", null, "Abad", "1", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[276] = [9, "El Nevado", 50077, 2663, "245-C-1996", null, "Achernar", "998", true, 1, 16, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[277] = [9, "El Nevado", 50077, 1825, "616-M-72", null, "Aisol", "1023", false, 1, 7, "Molifalses Tarquini Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[278] = [9, "El Nevado", 50077, 2544, "48-C-94", null, "Alfard", "1", true, 1, 1, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[279] = [9, "El Nevado", 50077, 0, "1915-C-1998", null, "Analia", "1*994", false, 0, 0, "Carotti Martín Antonio", "null", "null,null,null", "651-C-2006"];
		$array[280] = [9, "El Nevado", 50077, 191, "320-C-63", null, "Anita", "1", false, 1, 1, "Asens, Manuel Y Ot", "null", "Mensurada", "Vigente", "null", "null"];
		$array[281] = [9, "El Nevado", 50077, 1673, "445-F-1968", null, "Anita", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[282] = [9, "El Nevado", 50077, 2099, "207-T-1978", null, "Atuel", "1023", false, 1, 3, "Tarquini, Nello", "null", "Mensurada", "Vigente", "null", "null"];
		$array[283] = [9, "El Nevado", 50077, 162, "3446-A-2010", null, "Beba", "1006", false, 1, 3, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[284] = [9, "El Nevado", 50077, 2197, "19-I-83", null, "Borbaran", "1022", false, 1, 2, "Industrias truederurgicas Grastrue Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[285] = [9, "El Nevado", 50077, 1105, "426-B-1962", null, "Buena Esperanza", "1025", false, 1, 3, "Ing.Roberto Marín S.A.", "null", "Mensurada", "Vacante", "null", "null"];
		$array[286] = [9, "El Nevado", 50077, 194, "202-C-64", null, "Carmen", "1", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "202-C-1964,null", "null"];
		$array[287] = [9, "El Nevado", 50077, 1225, "194-P-60", null, "Castaño Viejo", "1006", false, 1, 3, "Ranco, Hector", "null", "Mensurada", "Vacante", "null", "null"];
		$array[288] = [9, "El Nevado", 50077, 2409, "162-Z-88", null, "Cerro Negro", "1022", false, 1, 1, "Zanetti, Carlos N Y Ot", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[289] = [9, "El Nevado", 50077, 665, "65115-F-56", null, "Chacayal", "1006", false, 1, 3, "Industrias truederurgicas Grastrue Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[290] = [9, "El Nevado", 50077, 796, "657-C-58", null, "Chana", "1006", false, 1, 2, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[291] = [9, "El Nevado", 50077, 1456, "373-S-65", null, "Cruz Del Sur", "1", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[292] = [9, "El Nevado", 50077, 2657, "488-C-1996", null, "Dama", "998", true, 1, 27, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[293] = [9, "El Nevado", 50077, 2655, "483-C-1996", null, "Deneb", "998", true, 1, 30, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[294] = [9, "El Nevado", 50077, 2766, "489-C-1996", null, "Difalse", "998", true, 1, 10, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[295] = [9, "El Nevado", 50077, 746, "3073-V-2006", null, "Don Luis", "1006", false, 1, 4, "Valot, Sergio Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[296] = [9, "El Nevado", 50077, 1193, "405-T-1963", null, "Don Luis", "999", false, 1, 1, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[297] = [9, "El Nevado", 50077, 936, "341-S-59", null, "Don Mario", "1025", false, 1, 3, "Planas, Lidia Edith", "null", "Mensurada", "Vigente", "null", "null"];
		$array[298] = [9, "El Nevado", 50077, 1294, "67-Q-65", null, "Don Paco", "1", false, 1, 1, "De Francesco, Miguel A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[299] = [9, "El Nevado", 50077, 740, "755-F-57", null, "Don Ricardo", "1025", false, 1, 3, "Aguilera, Tomas", "null", "Mensurada", "Vigente", "null", "null"];
		$array[300] = [9, "El Nevado", 50077, 1382, "72-D-66", null, "Don Rufifalse", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[301] = [9, "El Nevado", 50077, 1197, "596-D-62", null, "Don Sergio", "1000", false, 1, 3, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[302] = [9, "El Nevado", 50077, 995, "994-S-59", null, "Doña Sara", "1025", false, 1, 3, "Planas, Lidia Edith", "null", "Mensurada", "Vacante", "null", "null"];
		$array[303] = [9, "El Nevado", 50077, 2661, "504-C-1996", null, "Ebla", "998", true, 1, 22, "Carotti Martín Antonio", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[304] = [9, "El Nevado", 50077, 882, "509-F-59", null, "El Baqueafalse", "1006", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[305] = [9, "El Nevado", 50077, 1724, "153-L-1971", null, "El Cavado", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[306] = [9, "El Nevado", 50077, 1067, "684-M-1958", null, "El Nihuil", "999", false, 1, 3, "Vazquez, Nelida Y García Fanny", "null", "Mensurada", "Vigente", "null", "null"];
		$array[307] = [9, "El Nevado", 50077, 1577, "497-I-68", null, "El Peseño", "1092", false, 2, 2, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[308] = [9, "El Nevado", 50077, 1787, "452-B-72", null, "El Recuerdo", "1165", false, 2, 3, "Bruschi, Aecio Y Ots", "null", "Mensurada", "Vigente", "null", "null"];
		$array[309] = [9, "El Nevado", 50077, 619, "133-T-1980", null, "Eltrueren", "1008", false, 1, 3, "Tarquini, Nello", "null", "Mensurada", "Vigente", "null", "null"];
		$array[310] = [9, "El Nevado", 50077, 1514, "25-Q-66", null, "Estrella", "1", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[311] = [9, "El Nevado", 50077, 623, "10-M-1953", null, "Ethel", "1006", false, 1, 5, "null", "null", "Mensurada", "Vacante ,null", "null"];
		$array[312] = [9, "El Nevado", 50077, 1511, "26-Q-66", null, "Flor De Lis", "1", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[313] = [9, "El Nevado", 50077, 2744, "2694-M-2004", null, "Géminis", "994*995*1", true, 1, 19, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[314] = [9, "El Nevado", 50077, 2131, "2863-G-2005", null, "German", "1022", false, 1, 4, "Garzón, Hugo Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[315] = [9, "El Nevado", 50077, 751, "65462-Z-1956", null, "Gratitud", "1025", false, 1, 2, "Agromix S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[316] = [9, "El Nevado", 50077, 687, "65105-P-56", null, "Haydee", "1006", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[317] = [9, "El Nevado", 50077, 1007, "73-H-60", null, "Hermann", "1000", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[318] = [9, "El Nevado", 50077, 2793, "2603-M-2004", null, "Hermes", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[319] = [9, "El Nevado", 50077, 1282, "171-G-1965", null, "Herminda", "1025", false, 1, 2, "Industrial 50049 Sa", "null", "Mensurada", "Vacante", "null", "null"];
		$array[320] = [9, "El Nevado", 50077, 1237, "3052-B-2006", null, "Hilda", "1025", false, 1, 2, "null", "null", "Mensurada", "Vigente", "null", "null"];
		$array[321] = [9, "El Nevado", 50077, 1499, "581-A-66", null, "Hilda I", "1000", false, 1, 2, "Aguilera, Hilda C De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[322] = [9, "El Nevado", 50077, 190, "49-H-64", null, "Hortentruea", "1", false, 1, 4, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[323] = [9, "El Nevado", 50077, 1288, "378-A-65", null, "Ingrid", "1025", false, 1, 2, "Aguilera, Tomas", "null", "Mensurada", "Vigente", "null", "null"];
		$array[324] = [9, "El Nevado", 50077, 676, "62670-M-55", null, "Iris", "1006", false, 1, 3, "Mina Ethel Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[325] = [9, "El Nevado", 50077, 2662, "578-C-1996", null, "Job", "998", true, 1, 2, "Carotti Martín Antonio", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[326] = [9, "El Nevado", 50077, 2658, "577-C-1996", null, "Jonia", "998", true, 1, 5, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[327] = [9, "El Nevado", 50077, 728, "65143-V-56", null, "Jorge Alberto", "1006", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[328] = [9, "El Nevado", 50077, 1672, "441-F-68", null, "Juana", "1025", false, 1, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[329] = [9, "El Nevado", 50077, 2660, "244-C-1996", null, "Kaitos", "1*994*995", true, 1, 15, "Carotti Martín Antonio", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[330] = [9, "El Nevado", 50077, 2585, "622-A-1996", null, "Keri I", "1*994*995", true, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[331] = [9, "El Nevado", 50077, 985, "562-M-57", null, "La Catita", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[332] = [9, "El Nevado", 50077, 1249, "219-C-64", null, "La Colorada", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[333] = [9, "El Nevado", 50077, 876, "515-D-1959", null, "La Cristina", "1006", false, 1, 3, "Del Pozzi, Edmundo Martín", "null", "Mensurada", "Vigente", "null", "null"];
		$array[334] = [9, "El Nevado", 50077, 666, "65084-F-56", null, "La Esperanza", "1000", false, 1, 2, "Adre, Arnaldo Elías", "null", "Mensurada", "Vacante", "null", "null"];
		$array[335] = [9, "El Nevado", 50077, 2577, "95-V-1995", null, "La Esperanza", "1025", true, 1, 1, "Vergara,Germán", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[336] = [9, "El Nevado", 50077, 2203, "34-A-83", null, "La Feder", "1000", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[337] = [9, "El Nevado", 50077, 1786, "453-A-72", null, "La Fertilidad", "1165", false, 1, 3, "Aghetoni, Guerrifalse Y Ots", "null", "Mensurada", "Vigente", "null", "null"];
		$array[338] = [9, "El Nevado", 50077, 1636, "403-H-68", null, "La Hermanina", "1", false, 1, 2, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[339] = [9, "El Nevado", 50077, 731, "3055-B-2006", null, "La Irma", "1006", false, 1, 3, "Bustos, Blanca Leticia", "null", "Mensurada", "Vigente", "null", "null"];
		$array[340] = [9, "El Nevado", 50077, 482, "364-P-1946", null, "La Josefina", "1", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[341] = [9, "El Nevado", 50077, 1246, "441-Q-62", null, "La Liliana", "1000", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[342] = [9, "El Nevado", 50077, 1299, "105-Q-65", null, "La Morocha", "1025", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[343] = [9, "El Nevado", 50077, 778, "3074-V-2006", null, "La Negrita", "1006", false, 1, 4, "Valot, Sergio Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[344] = [9, "El Nevado", 50077, 227, "65046-M-56", null, "La Ventana", "1025", false, 1, 5, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[345] = [9, "El Nevado", 50077, 2651, "2191-A-2000", null, "La Venturosa", "994*995*1", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[346] = [9, "El Nevado", 50077, 633, "83832-F-53", null, "Lalo", "1000", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[347] = [9, "El Nevado", 50077, 1184, "630-A-1963", null, "Las Dos Marias", "1006", false, 1, 6, "Asens Llugany,Osvaldo Héctor  Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[348] = [9, "El Nevado", 50077, 188, "630-R-59", null, "Leofalser", "1000", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[349] = [9, "El Nevado", 50077, 1669, "3051-G-2006", null, "Leofalser", "1025", false, 1, 1, "Guerrero, Enrique Darío", "null", "Mensurada", "Vigente", "null", "null"];
		$array[350] = [9, "El Nevado", 50077, 768, "394-C-1958", null, "Liana", "1025", false, 1, 2, "Guerrero, Enrique Darío", "null", "Mensurada", "Vigente", "null", "null"];
		$array[351] = [9, "El Nevado", 50077, 803, "1277-M-58", null, "Liana II", "1025", false, 1, 3, "Minera Agua Escondida Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[352] = [9, "El Nevado", 50077, 1039, "1096-M-1960", null, "Liana IiI", "1025", false, 1, 3, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[353] = [9, "El Nevado", 50077, 1106, "3444-A-2010", null, "Liana Iv", "1025", false, 1, 2, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[354] = [9, "El Nevado", 50077, 1103, "1098-M-60", null, "Liana V", "1025", false, 1, 3, "Minera Agua Escondida Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[355] = [9, "El Nevado", 50077, 1194, "265-D-62", null, "Liana VI", "1025", false, 1, 1, "Minera Agua Escondida Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[356] = [9, "El Nevado", 50077, 1256, "56-P-65", null, "Lidia", "1006", false, 1, 3, "Minera Oeste Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[357] = [9, "El Nevado", 50077, 1273, "187-R-76", null, "Lomas Moras", "1006", false, 1, 7, "Rio Grande Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[358] = [9, "El Nevado", 50077, 1752, "3360-S-2009", null, "Los Compadres", "1025", false, 1, 7, "Santiago, Carlos José", "null", "Mensurada", "Vigente", "null", "null"];
		$array[359] = [9, "El Nevado", 50077, 726, "299-F-57", null, "Magdalena", "1006", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[360] = [9, "El Nevado", 50077, 1407, "303-O-64", null, "Maria Magdalena", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[361] = [9, "El Nevado", 50077, 1024, "3449-A-2010", null, "Maria truelvia", "1025", false, 1, 1, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[362] = [9, "El Nevado", 50077, 791, "3076-V-2006", null, "Marta Haydee", "1006", false, 1, 4, "Valot, Sergio Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[363] = [9, "El Nevado", 50077, 2138, "100-D-1979", null, "Martita", "1006", false, 1, 1, "De La Torre, Duilio M", "null", "Mensurada", "Vigente", "null", "null"];
		$array[364] = [9, "El Nevado", 50077, 1853, "175-P-72", null, "Mercedes", "1025", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[365] = [9, "El Nevado", 50077, 1228, "150-F-64", null, "Monte Extraño", "1025", false, 1, 2, "Industrial 50049 Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[366] = [9, "El Nevado", 50077, 2141, "193-T-1980", null, "Nahuel", "1023", false, 1, 2, "Tarquini, Nello", "null", "Mensurada", "Vigente", "null", "null"];
		$array[367] = [9, "El Nevado", 50077, 1858, "617-T-72", null, "Ollen", "1023", false, 1, 4, "Tarquini, Nello Y Ot", "null", "Mensurada", "Vigente", "null", "null"];
		$array[368] = [9, "El Nevado", 50077, 2743, "2581-M-2004", null, "Orfeo", "1*994*1022", true, 1, 30, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[369] = [9, "El Nevado", 50077, 2794, "2577-M-2004", null, "Partruefal", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[370] = [9, "El Nevado", 50077, 812, "3192-V-2006", null, "Patricia Monica", "1006", false, 1, 2, "Valot, Sergio Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[371] = [9, "El Nevado", 50077, 1281, "3236-S-2007", null, "Pebeta", "1025", false, 1, 2, "Santiago, Carlos José", "null", "Mensurada", "Vigente", "null", "null"];
		$array[372] = [9, "El Nevado", 50077, 738, "62669-M-55", null, "Piedras De Fuego", "1006", false, 1, 4, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[373] = [9, "El Nevado", 50077, 712, "62352-F-55", null, "Pototrue", "1000", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[374] = [9, "El Nevado", 50077, 1003, "336-F-60", null, "Prodigio", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[375] = [9, "El Nevado", 50077, 2708, "2587-M-2004", null, "Ptrueque", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[376] = [9, "El Nevado", 50077, 1670, "444-F-68", null, "Ramona", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[377] = [9, "El Nevado", 50077, 2656, "500-C-1996", null, "Remolino", "998", true, 1, 14, "Carotti Martín Antonio", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[378] = [9, "El Nevado", 50077, 2137, "101-L-1979", null, "Romina", "1006", false, 1, 1, "Longo, Agustín", "null", "Mensurada", "Vigente", "null", "null"];
		$array[379] = [9, "El Nevado", 50077, 949, "3075-V-2006", null, "Rosa Isabel", "1006", false, 1, 3, "Valot, Sergio Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[380] = [9, "El Nevado", 50077, 807, "557-N-57", null, "Roxana", "1006", false, 1, 3, "Mina Ethel Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[381] = [9, "El Nevado", 50077, 189, "1132-A-18", null, "Ruben", "1", false, 1, 4, "Perez, Hector A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[382] = [9, "El Nevado", 50077, 902, "296-G-57", null, "San Alberto", "1006", false, 1, 4, "San Cayetafalse Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[383] = [9, "El Nevado", 50077, 724, "3445-A-2010", null, "San Cayetafalse", "1006", false, 1, 3, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[384] = [9, "El Nevado", 50077, 186, "2529-H-1917", null, "San Eduardo", "1000", false, 1, 3, "Asens, Osvaldo Y Otros", "null", "Mensurada", "Vigente", "null", "null"];
		$array[385] = [9, "El Nevado", 50077, 187, "3272-E-2007", null, "San Jorge", "1", false, 1, 2, "El Portal Del Oro Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[386] = [9, "El Nevado", 50077, 765, "83895-G-1953", null, "San Juan", "1025", false, 1, 3, "Planas, Lidia Edith", "null", "Mensurada", "Vacante", "null", "null"];
		$array[387] = [9, "El Nevado", 50077, 185, "2526-H-1917", null, "San Pedro", "1", false, 1, 4, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[388] = [9, "El Nevado", 50077, 674, "83896-R-53", null, "Santa Cruz", "1006", false, 1, 7, "Río Grande S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[389] = [9, "El Nevado", 50077, 1755, "352-G-71", null, "Santa Josefa", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[390] = [9, "El Nevado", 50077, 206, "884-D-1997", null, "Santa Rosa", "1025", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[391] = [9, "El Nevado", 50077, 184, "218-B-1964", null, "Santo Tomas", "1000", false, 1, 6, "null", "null", "Mensurada", "Vigente", "null", "null"];
		$array[392] = [9, "El Nevado", 50077, 2053, "163-M-75", null, "Tres Alejandro", "1006", false, 1, 4, "Industrias truederurgicas Grastrue Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[393] = [9, "El Nevado", 50077, 969, "74-H-1960", null, "Valverde", "1000", false, 1, 1, "Schoustal, Godofredo Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[394] = [9, "El Nevado", 50077, 838, "3448-A-2010", null, "Virginia", "1025", false, 1, 3, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[395] = [9, "El Nevado", 50077, 0, "899-A-1997", null, "Zucoa", "1*994*995", true, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[396] = [10, "Sierra Chachahuen", 50077, 2747, "2884-C-2005", null, "Abanico 3", "994*995*1", true, 1, 30, "Cognito Limited", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[397] = [10, "Sierra Chachahuen", 50077, 2381, "160-F-87", null, "Agua Del Gato", "1006", false, 1, 1, "Ferrero, Victor Y Prieto, Juan", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[398] = [10, "Sierra Chachahuen", 50077, 2567, "352-S-1994", null, "Agua Del Toro", "1125", false, 2, 1, "Segovia, Carlos Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[399] = [10, "Sierra Chachahuen", 50077, 2641, "458-C-1996", null, "Ana", "1", true, 1, 10, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[400] = [10, "Sierra Chachahuen", 50077, 1267, "30-M-65", null, "Arco Iris", "1025", false, 1, 3, "Planas, Lidia Edith", "null", "Mensurada", "Vigente", "null", "null"];
		$array[401] = [10, "Sierra Chachahuen", 50077, 1750, "150-A-71", null, "Argentina", "1025", false, 1, 2, "Acuña, Juan I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[402] = [10, "Sierra Chachahuen", 50077, 2624, "486-C-1996", null, "Aristarco", "998", true, 1, 8, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[403] = [10, "Sierra Chachahuen", 50077, 2540, "461-C-96", null, "Beatriz", "1*994*995", true, 1, 15, "Carotti Martín Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[404] = [10, "Sierra Chachahuen", 50077, 2751, "3207-D-2007", null, "Cerro Toscales", "994*1*995", true, 1, 30, "Desarrollo De Prospectos Mineros S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[405] = [10, "Sierra Chachahuen", 50077, 950, "3045-D-2006", null, "Chachahuen Nro 1", "1006", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[406] = [10, "Sierra Chachahuen", 50077, 1451, "291-A-66", null, "Cruz Del Sur", "1025", false, 1, 2, "Acuña, Juan I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[407] = [10, "Sierra Chachahuen", 50077, 2542, "502-C-1996", null, "Helios", "1*994*995", true, 1, 15, "Carotti Martín Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[408] = [10, "Sierra Chachahuen", 50077, 2545, "503-C-96", null, "Heraion", "1", true, 1, 1, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[409] = [10, "Sierra Chachahuen", 50077, 2571, "623-A-1996", null, "Keri II", "1*994*995", true, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[410] = [10, "Sierra Chachahuen", 50077, 946, "68-M-60", null, "La Calandria", "1025", false, 1, 3, "Planas, Lidia Edith", "null", "Mensurada", "Vigente", "null", "null"];
		$array[411] = [10, "Sierra Chachahuen", 50077, 2232, "3467-A-2010", null, "La Olivia", "1022", false, 1, 3, "Abdala Jose Fortunato", "null", "Mensurada", "Vigente", "null", "null"];
		$array[412] = [10, "Sierra Chachahuen", 50077, 1269, "247-Z-64", null, "La Pelirroja", "1025", false, 1, 2, "Acuña, Juan I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[413] = [10, "Sierra Chachahuen", 50077, 1331, "438-R-65", null, "La Salinilla", "1025", false, 1, 2, "Ramal, Pedro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[414] = [10, "Sierra Chachahuen", 50077, 2640, "459-C-1996", null, "Lucía", "1", true, 1, 15, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[415] = [10, "Sierra Chachahuen", 50077, 2791, "1914-C-1998", null, "Mabel", "994*1", true, 1, 30, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[416] = [10, "Sierra Chachahuen", 50077, 2722, "460-C-1996", null, "Marcela", "998", true, 1, 15, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[417] = [10, "Sierra Chachahuen", 50077, 2541, "462-C-96", null, "falsera", "1*994*995", true, 1, 15, "Carotti Martín Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[418] = [10, "Sierra Chachahuen", 50077, 0, "494-C-1996", null, "Orion", "1*994*995", true, 1, 1, "Carotti Martín Antonio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[419] = [10, "Sierra Chachahuen", 50077, 1270, "2996-S-2005", null, "VettI", "1025", false, 1, 2, "Santiago, Sebastián Andrés", "null", "Mensurada", "Vacante", "null", "null"];
		$array[420] = [11, "Piedras De Afilar", 50105, 213, "3038-G-2006", null, "Agua Del Pablito", "1000", false, 1, 1, "Guerrero, Enrique Darío", "null", "Mensurada", "Vigente", "null", "null"];
		$array[421] = [11, "Piedras De Afilar", 50105, 0, "null", null, "Cancer", "1", false, 0, 0, "Mosquera, M. Rocío", "null", "S/Mensura", "null,null", "null"];
		$array[422] = [11, "Piedras De Afilar", 50105, 2787, "331-G-1993", null, "Cardozo", "994*995", true, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[423] = [11, "Piedras De Afilar", 50105, 2235, "3522-T-2010", null, "Carlos Daniel", "1022", false, 1, 5, "Transporte Bonavia S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[424] = [11, "Piedras De Afilar", 50105, 214, "39-M-46", null, "Celia", "1000", false, 1, 4, "Giustozzi, Carlos Osvaldo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[425] = [11, "Piedras De Afilar", 50105, 1394, "406-L-65", null, "Claudia", "999", false, 1, 3, "Guerrero, Enrique Darío", "null", "Mensurada", "Vigente", "null", "null"];
		$array[426] = [11, "Piedras De Afilar", 50105, 1570, "185-C-66", null, "Diamante I", "1036", false, 2, 1, "Remaggi, falserma A. I.De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[427] = [11, "Piedras De Afilar", 50105, 1523, "186-C-66", null, "Diamante II", "1036", false, 2, 1, "Copello, Eduardo J.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[428] = [11, "Piedras De Afilar", 50105, 1524, "187-M-66", null, "Diamante IiI", "1036", false, 2, 1, "Remaggi, falserma A. I.De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[429] = [11, "Piedras De Afilar", 50105, 216, "185-L-60", null, "El Cacique", "1000", false, 1, 2, "Minera Cordillerana Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[430] = [11, "Piedras De Afilar", 50105, 2559, "1037-F-95", null, "El Mirador", "999", false, 1, 1, "Ferreyra, Margarita Miriam", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[431] = [11, "Piedras De Afilar", 50105, 2559, "1037-F-1995", null, "El Mirador", "999", false, 1, 2, "Ferreyra, Margarita Miriam", "null", "Mensurada", "Vigente", "null", "null"];
		$array[432] = [11, "Piedras De Afilar", 50105, 2813, "2759-E-2004", null, "Fenix", "994*995*1", true, 1, 24, "Benito, falserma Cristina", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[433] = [11, "Piedras De Afilar", 50105, 608, "293-T-50", null, "Gibraltar", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[434] = [11, "Piedras De Afilar", 50105, 2785, "540-G-1996", null, "India Muerta", "994*995", true, 1, 10, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[435] = [11, "Piedras De Afilar", 50105, 1816, "114-M-1996", null, "Jorge Omar", "1025", false, 1, 1, "Minera Luján Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[436] = [11, "Piedras De Afilar", 50105, 2489, "4-P-81", null, "La Diamantina", "1075", false, 2, 3, "Perez, Elbio Ramiro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[437] = [11, "Piedras De Afilar", 50105, 880, "626-G-57", null, "La Vidalita", "999", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[438] = [11, "Piedras De Afilar", 50105, 2792, "1278-M-1997", null, "Margarita 1", "1*994", true, 1, 6, "Ferreyra Margarita É Izuel José L.", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[439] = [11, "Piedras De Afilar", 50105, 2778, "1280-M-1997", null, "Margarita 3", "1*994", true, 1, 5, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[440] = [11, "Piedras De Afilar", 50105, 1908, "467-P-71", null, "Maria", "1075", false, 2, 1, "Romero, Rolando R Y Ot", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[441] = [11, "Piedras De Afilar", 50105, 2706, "2580-M-2004", null, "Neptufalse", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[442] = [11, "Piedras De Afilar", 50105, 208, "350-R-48", null, "Rio Diamante (PICAZAS)", "1000*995", false, 1, 20, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[443] = [11, "Piedras De Afilar", 50105, 1277, "833-R-61", null, "Salinas Del Diamante", "1036", false, 2, 89, "El Jarillar S.A. M.I.C.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[444] = [11, "Piedras De Afilar", 50105, 211, "4211-H-42", null, "Santa Teresa", "1", false, 1, 3, "Giustozzi, Carlos Osvaldo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[445] = [11, "Piedras De Afilar", 50105, 2236, "126-B-84", null, "truelvana", "1022", false, 1, 5, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[446] = [12, "25 De Mayo", 50105, 1926, "346-N-73", null, "Alegria", "1006", false, 1, 2, "Casale, Florencio B", "null", "Mensurada", "Vigente", "null", "null"];
		$array[447] = [12, "25 De Mayo", 50105, 2710, "2592-M-2004", null, "Ariadna", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[448] = [12, "25 De Mayo", 50105, 1268, "554-C-63", null, "Carbajal", "1025", false, 1, 2, "Abraham, Victor Hugo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[449] = [12, "25 De Mayo", 50105, 2294, "221-G-85", null, "Dan-Jor", "1022", false, 1, 1, "Garre, Tomás", "23-08034220-9", "S/Mensura", "Vigente", "", "null"];
		$array[450] = [12, "25 De Mayo", 50105, 840, "37-C-59", null, "Don Torres", "1006", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[451] = [12, "25 De Mayo", 50105, 874, "170-C-59", null, "El Lindero", "1006", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[452] = [12, "25 De Mayo", 50105, 2102, "3293-Y-2008", null, "El Milagro", "1022", false, 1, 5, "Villegas, Mariela Edith", "null", "Mensurada", "Vigente", "null", "null"];
		$array[453] = [12, "25 De Mayo", 50105, 474, "417-M-46", null, "El Paisafalse", "1000", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[454] = [12, "25 De Mayo", 50105, 476, "419-M-46", null, "El Rodeo", "1000", false, 1, 2, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[455] = [12, "25 De Mayo", 50105, 1575, "29-C-62", null, "Esmeralda", "1025", false, 1, 1, "Acuña, Juan I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[456] = [12, "25 De Mayo", 50105, 2184, "192-R-62", null, "Fortuna", "1000", false, 1, 1, "Reinal, Osvaldo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[457] = [12, "25 De Mayo", 50105, 2237, "285-B-84", null, "Hector", "1022", false, 1, 1, "Blanco, Hector M", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[458] = [12, "25 De Mayo", 50105, 2709, "2578-M-2004", null, "Helena", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[459] = [12, "25 De Mayo", 50105, 2214, "54-H-84", null, "India Muerta", "1022", false, 1, 1, "Scaiola, Domingo Y Ots", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[460] = [12, "25 De Mayo", 50105, 2486, "3390-G-2009", null, "Jorge", "1006", false, 1, 1, "null", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[461] = [12, "25 De Mayo", 50105, 2750, "2748-P-2004", null, "Juliette", "994*995*1", true, 1, 4, "Portal Del Oro S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[462] = [12, "25 De Mayo", 50105, 1615, "530-G-68", null, "La Armonia", "1047", false, 2, 1, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[463] = [12, "25 De Mayo", 50105, 2765, "2817-B-2005", null, "La Celestita", "1006", false, 1, 1, "Berrios, Orlando José", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[464] = [12, "25 De Mayo", 50105, 2388, "140-B-87", null, "La Chiquita", "1022", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[465] = [12, "25 De Mayo", 50105, 2405, "141-B-87", null, "La Esperanza", "1022", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[466] = [12, "25 De Mayo", 50105, 1134, "597-F-61", null, "La Nenina", "1177", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[467] = [12, "25 De Mayo", 50105, 475, "418-M-46", null, "La Paisanita", "1000", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[468] = [12, "25 De Mayo", 50105, 224, "3915-S-42", null, "La Paraguaya", "1047", false, 2, 27, "Garre, Tomás", "null", "Mensurada", "Vigente", "null", "null"];
		$array[469] = [12, "25 De Mayo", 50105, 1029, "159-M-52", null, "La Pepita", "1000*995", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[470] = [12, "25 De Mayo", 50105, 1406, "307-A-62", null, "Las Aguilas", "1025", false, 1, 1, "Acuña, Juan I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[471] = [12, "25 De Mayo", 50105, 913, "3102-A-2006", null, "Los Dos Amigos", "1025", false, 1, 2, "Abraham, Víctor Javier", "null", "Mensurada", "Vigente", "null", "null"];
		$array[472] = [12, "25 De Mayo", 50105, 972, "551-T-47", null, "Los Tolditos", "1025", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[473] = [12, "25 De Mayo", 50105, 2745, "2735-B-2004", null, "María Francisca", "1006", false, 1, 2, "Berrios, Orlando José", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[474] = [12, "25 De Mayo", 50105, 2394, "40-B-88", null, "Maria Rosa", "1022", false, 1, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[475] = [12, "25 De Mayo", 50105, 2711, "2601-M-2004", null, "Minerva", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[476] = [12, "25 De Mayo", 50105, 2684, "1811-B-1998", null, "Muñeca IiI", "1006*1022", false, 1, 3, "Berrios, Orlando José", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[477] = [12, "25 De Mayo", 50105, 1576, "30-A-62", null, "falsestalgia", "1025", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[478] = [12, "25 De Mayo", 50105, 218, "2404-F-39", null, "Santa Elena", "1011", false, 1, 7, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[479] = [12, "25 De Mayo", 50105, 2464, "3037-G-2006 ", null, "Soledad", "1022", false, 1, 1, "Guerrero, Enrique Darío", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[480] = [13, "Las Pintadas-Las Malvinas", 50105, 2808, "2782-D-2004", null, "Aquiles", "999", false, 1, 15, "De Los Santos Luis Y Chico, Mario A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[481] = [13, "Las Pintadas-Las Malvinas", 50105, 2575, "1478-A-1997", null, "Beatriz", "994*995*1", true, 1, 13, "Argentina Mineral Development S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[482] = [13, "Las Pintadas-Las Malvinas", 50105, 229, "2637-G-2004", null, "Blanquita", "1177", false, 2, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[483] = [13, "Las Pintadas-Las Malvinas", 50105, 2707, "2594-M-2004", null, "Casandra", "994*1*1022", true, 1, 35, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[484] = [13, "Las Pintadas-Las Malvinas", 50105, 896, "993-M-59", null, "Cuchilla Del Aguila", "1006", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[485] = [13, "Las Pintadas-Las Malvinas", 50105, 833, "34-C-57", null, "Cuesta De Los Terneros", "1174", false, 1, 2, "Cnea", "null", "Mensurada", "Vigente", "null", "null"];
		$array[486] = [13, "Las Pintadas-Las Malvinas", 50105, 1662, "354-C-68", null, "Dr Baulies", "1174", false, 1, 80, "Cnea", "null", "Mensurada", "Vigente", "null", "null"];
		$array[487] = [13, "Las Pintadas-Las Malvinas", 50105, 2797, "2574-M-2004", null, "Fausto", "994*1*1022", true, 1, 1, "Minera Río De La Plata S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[488] = [13, "Las Pintadas-Las Malvinas", 50105, 607, "404-M-50", null, "La Carmona", "1051", false, 2, 2, "Mantruella, Donatila", "null", "Mensurada", "Vigente", "null", "null"];
		$array[489] = [13, "Las Pintadas-Las Malvinas", 50105, 1663, "163-F-69", null, "La Casualidad", "1040", false, 2, 2, "Fernandez, Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[490] = [13, "Las Pintadas-Las Malvinas", 50105, 780, "571-P-57", null, "La China", "1177", false, 2, 2, "Romani De Peñasco, Ida G Y Ots", "null", "Mensurada", "Vigente", "null", "null"];
		$array[491] = [13, "Las Pintadas-Las Malvinas", 50105, 1023, "194-P-57", null, "La Escondida", "1177", false, 2, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[492] = [13, "Las Pintadas-Las Malvinas", 50105, 230, "50-R-46", null, "La Esperanza", "1025", false, 1, 4, "truedoti Di Santo, Jose I", "null", "Mensurada", "Vigente", "null", "null"];
		$array[493] = [13, "Las Pintadas-Las Malvinas", 50105, 696, "65071-P-56", null, "La Joyita", "1051", false, 2, 2, "Peñasco, Alejandro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[494] = [13, "Las Pintadas-Las Malvinas", 50105, 1689, "1289-C-1997", null, "La Pintada", "1174", false, 1, 80, "Concina, Raúl Ernesto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[495] = [13, "Las Pintadas-Las Malvinas", 50105, 588, "303-S-51", null, "La Venturosa", "999", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[496] = [13, "Las Pintadas-Las Malvinas", 50105, 1681, "420-C-68", null, "Los Reyufalses", "1174", false, 1, 80, "Cnea", "null", "Mensurada", "Vigente", "null", "null"];
		$array[497] = [13, "Las Pintadas-Las Malvinas", 50105, 776, "772-R-57", null, "Pozo Verde", "1006", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[498] = [13, "Las Pintadas-Las Malvinas", 50105, 911, "801-G-59", null, "50105", "1006", false, 1, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[499] = [13, "Las Pintadas-Las Malvinas", 50105, 2470, "42-T-89", null, "Tauro", "997", false, 1, 1, "Tenconi, Clide  M S M De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[500] = [13, "Las Pintadas-Las Malvinas", 50105, 2121, "186-P-79", null, "Valle Encantado", "1022", false, 1, 2, "Perez Gallardo, Juan C", "null", "Mensurada", "Vigente", "null", "null"];
		$array[501] = [14, "El Cepillo", 50091, 1040, "1830-M-1998", null, "Alborada", "1014", false, 1, 4, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[502] = [14, "El Cepillo", 50091, 1506, "62-G-67", null, "Cachito", "1165", false, 2, 2, "Estancias Coy Mallin S.R.L.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[503] = [14, "El Cepillo", 50091, 2723, "2474-M-2003", null, "Claudia Inés", "994*995*1", true, 1, 26, "Minera Anglo American Arg.Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[504] = [14, "El Cepillo", 50091, 574, "222-O-50", null, "Coy Mallin", "1165", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[505] = [14, "El Cepillo", 50091, 2092, "330-M-77", null, "Diamante II", "1051", false, 2, 2, "Mosso, Ernesto H.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[506] = [14, "El Cepillo", 50091, 2095, "331-M-77", null, "Diamante IiI", "1051", false, 2, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[507] = [14, "El Cepillo", 50091, 2089, "332-M-77", null, "Diamante Iv", "1051", false, 2, 2, "Mosso, Ernesto H.", "null", "Mensurada", "Vacante", "null", "null"];
		$array[508] = [14, "El Cepillo", 50091, 2106, "169-A-76", null, "Don Mario", "999", false, 2, 1, "Abraham, Jorge T.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[509] = [14, "El Cepillo", 50091, 1174, "421-A-58", null, "El Coquito", "1165", false, 2, 1, "Abraham, Jorge T.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[510] = [14, "El Cepillo", 50091, 652, "62495-E-55", null, "General Alvarado Nro 1", "1165", false, 2, 1, "Ríos, Oscar Pedro", "null", "Mensurada", "Vigente", "null", "null"];
		$array[511] = [14, "El Cepillo", 50091, 579, "109-O-50", null, "Invernada", "1165", false, 2, 1, "Abraham, Victor Hugo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[512] = [14, "El Cepillo", 50091, 2652, "1524-C-1997", null, "La Franciscana", "998", true, 1, 1, "Concina, Susana  G. Navarro De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[513] = [14, "El Cepillo", 50091, 0, "1523-C-1997", null, "La Jesuíta", "998", true, 1, 1, "Concina, Susana  G. Navarro De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[514] = [14, "El Cepillo", 50091, 662, "135-T-1980", null, "La Salada", "1051", false, 2, 2, "Tarquini, Nello", "null", "Mensurada", "Vigente", "null", "null"];
		$array[515] = [14, "El Cepillo", 50091, 2054, "346-B-1949", null, "Los Alamitos", "1165", false, 2, 2, "Abraham, Jorge Juan", "null", "Mensurada", "Vacante", "null", "null"];
		$array[516] = [14, "El Cepillo", 50091, 2761, "2433-M-2003", null, "María Inés I", "994*995*1", true, 1, 30, "Minera Anglo American Arg.Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[517] = [14, "El Cepillo", 50091, 943, "3-V-59", null, "Marina", "1165", false, 2, 1, "Abraham, Jorge T.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[518] = [14, "El Cepillo", 50091, 0, "2156-C-2000", null, "50091", "1*994", true, 1, 1, "Teck Cominco Argentina Ltd", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[519] = [14, "El Cepillo", 50091, 1181, "8-R-63", null, "Santa Maria", "1165", false, 2, 1, "Abraham, Victor Hugo", "null", "Mensurada", "Vacante", "null", "null"];
		$array[520] = [14, "El Cepillo", 50091, 2653, "2316-D-2002", null, "Yaucha", "994*995*1", true, 1, 1, "Desarrollo De Prospectos Mineros S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[521] = [15, "Yaucha", 50091, 233, "5364-R-38", null, "Carrizalito", "1128", false, 1, 7, "Cruz Del Sur Srl (E.F.)", "null", "Mensurada", "Vigente", "null", "null"];
		$array[522] = [15, "Yaucha", 50091, 706, "525-C-51", null, "Doña Lola", "1165", false, 2, 2, "Cobarrubias, Martha G De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[523] = [15, "Yaucha", 50091, 708, "526-C-51", null, "Doña Martha", "1165", false, 2, 2, "Cobarrubias, Martha G De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[524] = [15, "Yaucha", 50091, 702, "62496-E-55", null, "General Alvarado N° 2", "1165", false, 2, 1, "Ejercito Argentifalse", "null", "Mensurada", "Vigente", "null", "null"];
		$array[525] = [15, "Yaucha", 50091, 1359, "74-E-66", null, "General Alvarado N° 3", "1165", false, 2, 2, "Ejercito Argentifalse", "null", "Mensurada", "Vigente", "null", "null"];
		$array[526] = [15, "Yaucha", 50091, 2412, "129-G-88", null, "Granuterm I", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[527] = [15, "Yaucha", 50091, 2413, "132-G-88", null, "Granuterm II", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[528] = [15, "Yaucha", 50091, 2414, "133-G-88", null, "Granuterm IiI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[529] = [15, "Yaucha", 50091, 2415, "134-G-88", null, "Granuterm Iv", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[530] = [15, "Yaucha", 50091, 2420, "124-G-88", null, "Granuterm Ix", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[531] = [15, "Yaucha", 50091, 2416, "128-G-88", null, "Granuterm v", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[532] = [15, "Yaucha", 50091, 2417, "127-G-88", null, "Granuterm VI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[533] = [15, "Yaucha", 50091, 2418, "126-G-88", null, "Granuterm ViI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[534] = [15, "Yaucha", 50091, 2419, "125-G-88", null, "Granuterm ViiI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[535] = [15, "Yaucha", 50091, 2421, "123-G-88", null, "Granuterm x", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[536] = [15, "Yaucha", 50091, 2422, "131-G-88", null, "Granuterm XI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[537] = [15, "Yaucha", 50091, 2423, "130-G-88", null, "Granuterm XiI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[538] = [15, "Yaucha", 50091, 2424, "138-G-88", null, "Granuterm XiiI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[539] = [15, "Yaucha", 50091, 2425, "137-G-88", null, "Granuterm Xiv", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[540] = [15, "Yaucha", 50091, 2426, "136-G-88", null, "Granuterm Xv", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[541] = [15, "Yaucha", 50091, 2427, "135-G-88", null, "Granuterm XvI", "1166", false, 2, 1, "Granuterm Y Cia Sacitm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[542] = [15, "Yaucha", 50091, 1887, "45-A-73", null, "Santa Ana", "1025", false, 1, 2, "Abraham, Jorge Juan", "null", "Mensurada", "Vigente", "null", "null"];
		$array[543] = [15, "Yaucha", 50091, 1420, "180-C-59", null, "Titanic", "999", false, 1, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[544] = [15, "Yaucha", 50091, 1794, "311-A-71", null, "Yaretas", "1", false, 1, 1, "Abraham, Victor Hugo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[545] = [15, "Yaucha", 50091, 234, "18-G-1903", null, "Yaucha", "1000", false, 1, 3, "Abraham, Victor Hugo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[546] = [16, "50126 Norte", 50126, 273, "54-P-05", null, "Amelia", "1", false, 1, 3, "Tres Picos Samic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[547] = [16, "50126 Norte", 50126, 2252, "147-D-84", null, "Arroyo Cuevas", "1014", false, 1, 1, "Dpto Promocion Minera - Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[548] = [16, "50126 Norte", 50126, 473, "266-G-45", null, "Clarita", "1", false, 1, 3, "Prestrueani, Camilo Y Ot", "null", "Mensurada", "Vigente", "null", "null"];
		$array[550] = [16, "50126 Norte", 50126, 1894, "262-G-73", null, "Kera", "1040", false, 2, 2, "Sugasti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[551] = [16, "50126 Norte", 50126, 1881, "375-G-73", null, "La Hortentruea", "1040", false, 2, 3, "Sugasti, Juan Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[552] = [16, "50126 Norte", 50126, 239, "4117-G-41", null, "La Sarita", "1", false, 1, 3, "Tres Picos Samic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[553] = [16, "50126 Norte", 50126, 1859, "244-G-73", null, "Refugio", "1040", false, 2, 2, "Sugasti, Juan Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[554] = [16, "50126 Norte", 50126, 1883, "261-G-73", null, "Sara", "1040", false, 2, 2, "Sugasti, Juan Alberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[555] = [16, "50126 Norte", 50126, 236, "686-D-41", null, "50126", "1146", false, 1, 1, "Ypf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[556] = [17, "Salamanca", 50126, 2543, "163-S-86", null, "7 De Mayo", "1022", false, 1, 1, "Santiago, Carlos José", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[557] = [17, "Salamanca", 50126, 249, "2294-N-2002", null, "Arco Iris", "994", false, 1, 4, "Nieto Romulo Héctor", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[558] = [17, "Salamanca", 50126, 2998, "2543-B-18", null, "Argentina (SOCAVON)", "1", false, 1, 1, "Electroquímica Mendocina S.A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[559] = [17, "Salamanca", 50126, 2239, "69-L-82", null, "Ariel", "1125", false, 2, 1, "Blasco De Tellechea, Luisa L.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[560] = [17, "Salamanca", 50126, 1512, "621-R-66", null, "Beatriz", "1125", false, 2, 2, "Minera Cema Saicyf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[561] = [17, "Salamanca", 50126, 1572, "101055-54", null, "Benita", "1", false, 1, 1, "Cupro Sales Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[562] = [17, "Salamanca", 50126, 2530, "343-G-93", null, "Calisto", "1", false, 1, 1, "Giustozzi, Carlos Osvaldo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[563] = [17, "Salamanca", 50126, 1891, "377-C-70", null, "Carina", "1125", false, 2, 1, "Croce, Jose V", "null", "Mensurada", "Vigente", "null", "null"];
		$array[564] = [17, "Salamanca", 50126, 1509, "619-M-66", null, "ChichI", "1125", false, 2, 2, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[565] = [17, "Salamanca", 50126, 2999, "2542-B-18", null, "Chile (SOCAVON)", "1", false, 1, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[566] = [17, "Salamanca", 50126, 2491, "135-M-83", null, "Chupasangral", "1022", false, 1, 1, "Casale De Quero, truelvia", "null", "Mensurada", "Vigente", "null", "null"];
		$array[567] = [17, "Salamanca", 50126, 1127, "54-M-51", null, "Doce Hermafalses", "1125", false, 2, 2, "Maria Elena Cappello", "null", "Mensurada", "Vigente", "null", "null"];
		$array[568] = [17, "Salamanca", 50126, 704, "62439-B-55", null, "Dora Mercedes", "1125", false, 2, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[569] = [17, "Salamanca", 50126, 2117, "323-M-69", null, "El Alfil", "1125", false, 2, 1, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[570] = [17, "Salamanca", 50126, 1876, "130-F-69", null, "El Caballo", "1125", false, 2, 1, "Minera Cema Saicyf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[571] = [17, "Salamanca", 50126, 247, "2885-G-20", null, "El Condor", "994*1022", false, 1, 4, "Minerales De Oro 50126 Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[572] = [17, "Salamanca", 50126, 1933, "322-V-69", null, "El Peon", "1125", false, 2, 1, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[573] = [17, "Salamanca", 50126, 1860, "134-R-71", null, "Enroque", "1125", false, 2, 2, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[574] = [17, "Salamanca", 50126, 1982, "172-R-75", null, "Enroque Largo", "1022", false, 1, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[575] = [17, "Salamanca", 50126, 2429, "167-C-83", null, "Ernestina", "1125", false, 2, 1, "Casale, Florencio B", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[576] = [17, "Salamanca", 50126, 2168, "180-L-62", null, "EvI", "1125", false, 2, 1, "Laballo, Alfredo J", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[577] = [17, "Salamanca", 50126, 701, "62438-B-55", null, "Guillermito", "1125", false, 2, 2, "Bobillo Minerales Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[578] = [17, "Salamanca", 50126, 672, "62441-B-55", null, "Jorge Luis", "1125", false, 2, 2, "Bobillo Minerales Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[579] = [17, "Salamanca", 50126, 565, "525-T-49", null, "Juan Jose", "1125", false, 2, 3, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[580] = [17, "Salamanca", 50126, 2467, "120-P-86", null, "La Bety", "1125", false, 2, 1, "Pistone, Antonio Horacio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[581] = [17, "Salamanca", 50126, 252, "2302-D-41", null, "La Indio", "1", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[582] = [17, "Salamanca", 50126, 250, "3532-M-32", null, "La Josefa", "994", false, 1, 3, "Minerales De Oro 50126 Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[583] = [17, "Salamanca", 50126, 1412, "320-M-66", null, "La Martita", "1125", false, 2, 2, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[584] = [17, "Salamanca", 50126, 2440, "121-V-86", null, "La Naty", "1125", false, 2, 1, "Viberti, Beatriz Susana N De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[585] = [17, "Salamanca", 50126, 245, "161-C-07", null, "La Rica", "1", false, 1, 2, "Kodera, Elise Yuri", "null", "Mensurada", "Vigente", "null", "null"];
		$array[586] = [17, "Salamanca", 50126, 2390, "46-S-85", null, "La Rinconada", "1125", false, 2, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[587] = [17, "Salamanca", 50126, 1827, "131-R-69", null, "La Torre", "1125", false, 2, 1, "Minera Cema Saicyf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[588] = [17, "Salamanca", 50126, 1012, "691-C-60", null, "La Zapatina", "1040", false, 2, 3, "Ceramica La Rapida", "null", "Mensurada", "Vigente", "null", "null"];
		$array[589] = [17, "Salamanca", 50126, 248, "2988-M-32", null, "Las Porteñas", "994", false, 1, 3, "Minerales De Oro 50126 Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[590] = [17, "Salamanca", 50126, 2211, "70-T-82", null, "Luis Manuel", "1125", false, 2, 1, "Tellechea, Manuel", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[591] = [17, "Salamanca", 50126, 244, "3559-D-41", null, "Luisa (P 4/7)", "1", false, 1, 4, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[592] = [17, "Salamanca", 50126, 1513, "620-M-66", null, "Matilde", "1125", false, 2, 2, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[593] = [17, "Salamanca", 50126, 566, "526-O-49", null, "Olga Luisa", "1125", false, 2, 5, "Talcomin Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[594] = [17, "Salamanca", 50126, 242, "435-D-51", null, "Pascual", "1", false, 1, 3, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[595] = [17, "Salamanca", 50126, 2437, "59-R-85", null, "Peon II", "1125", false, 2, 1, "Pappalardo Minerales Srl Y Juan Pozo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[596] = [17, "Salamanca", 50126, 2022, "83865-53", null, "Pilar", "1125", false, 2, 1, "Geberovich Hfalses. Scc", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[597] = [17, "Salamanca", 50126, 255, "2355-F-36", null, "Punta De La Loma", "1*1125", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[598] = [17, "Salamanca", 50126, 2447, "66-R-88", null, "Real Del Mortero", "1022", false, 1, 1, "Ernesto Roco Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[599] = [17, "Salamanca", 50126, 240, "1515-T-42", null, "Salamanca", "1", false, 1, 5, "Kodera, Elise Yuri", "null", "Mensurada", "Vigente", "null", "null"];
		$array[600] = [17, "Salamanca", 50126, 2433, "152-C-83", null, "Salamanca I", "1022*1", false, 1, 1, "Cupro Sales Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[601] = [17, "Salamanca", 50126, 246, "2988-M-32", null, "San Ramon", "994", false, 1, 4, "Minerales De Oro 50126 Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[602] = [17, "Salamanca", 50126, 691, "62440-B-55", null, "Stella Mary", "1125", false, 2, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[603] = [17, "Salamanca", 50126, 251, "4358-A-19", null, "Teniente Matienzo", "994", false, 1, 5, "Martinez, Natalie/Cabello,P.E", "null", "Mensurada", "Vigente", "null", "null"];
		$array[604] = [17, "Salamanca", 50126, 2539, "344-G-93", null, "Titan", "1", false, 1, 1, "Giustozzi, Carlos Osvaldo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[605] = [17, "Salamanca", 50126, 2161, "78-R-81", null, "Torre Por Reina", "1125", false, 2, 1, "Viberti, Juan Carlos", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[606] = [18, "San Pablo", 50119, 268, "810-R-42", null, "Blanquita", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[607] = [18, "San Pablo", 50119, 641, "184-V-51", null, "Carlos Alberto", "1125", false, 2, 1, "Minera 50119 Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[608] = [18, "San Pablo", 50119, 640, "329-B-50", null, "Dianucha", "1125", false, 2, 1, "Minera 50119 Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[609] = [18, "San Pablo", 50119, 471, "831-R-42", null, "Don Federico (PLACER)", "1008", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[610] = [18, "San Pablo", 50119, 269, "811-R-42", null, "Don Rocha", "999", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[611] = [18, "San Pablo", 50119, 258, "2974-R-41", null, "Don Teodoro", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[612] = [18, "San Pablo", 50119, 1000, "1177-T-58", null, "El Galleguito", "1125", false, 2, 1, "Videla, Juan P.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[613] = [18, "San Pablo", 50119, 573, "361-V-50", null, "El Pato", "1125", false, 2, 1, "Videla, Julia V. De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[614] = [18, "San Pablo", 50119, 263, "3244-F-39", null, "El Portezuelo", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[615] = [18, "San Pablo", 50119, 262, "4521-F-38", null, "Felisa", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[616] = [18, "San Pablo", 50119, 639, "215-B-51", null, "Gitana", "1125", false, 2, 1, "Minera 50119 Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[617] = [18, "San Pablo", 50119, 261, "3032-F-37", null, "Josefina", "1008", false, 1, 7, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[618] = [18, "San Pablo", 50119, 2003, "566-V-62", null, "Joshee", "1125", false, 2, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[619] = [18, "San Pablo", 50119, 695, "393-V-51", null, "La Codiciada", "1125", false, 2, 1, "Videla, Julia V. De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[620] = [18, "San Pablo", 50119, 822, "1045-V-58", null, "La Del Medio", "1125", false, 2, 2, "Minera 50119 Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[621] = [18, "San Pablo", 50119, 265, "1827-F-36", null, "La Pablita", "1002", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[622] = [18, "San Pablo", 50119, 257, "2700-V-1939", null, "La Pampa", "1125", false, 2, 7, "Giol, Juan Fernando", "null", "Mensurada", "Vigente", "null", "null"];
		$array[623] = [18, "San Pablo", 50119, 271, "2375-T-16", null, "La Serena", "994", false, 1, 1, "Marzitelli, Jose", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[624] = [18, "San Pablo", 50119, 270, "809-R-42", null, "La Toma", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[625] = [18, "San Pablo", 50119, 0, "2085-R-1999", null, "Las Huertitas I", "1*994*995", true, 0, 0, "Reta, María C De Y Maidana Antonio", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[626] = [18, "San Pablo", 50119, 878, "1016-M-58", null, "Las Rosas", "1165", false, 2, 1, "Martinez, Juan Roberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[627] = [18, "San Pablo", 50119, 638, "108-V-51", null, "Letty", "1125", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[628] = [18, "San Pablo", 50119, 266, "141-C-46", null, "Lola", "994", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[629] = [18, "San Pablo", 50119, 692, "19-V-53", null, "Los Mesones", "1125", false, 2, 2, "Videla, Juan P.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[630] = [18, "San Pablo", 50119, 260, "812-R-42", null, "Mina N° 3", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[631] = [18, "San Pablo", 50119, 541, "499-J-48", null, "Pampita", "1125", false, 2, 1, "Giol, Juan Fernando", "null", "Mensurada", "Vigente", "null", "null"];
		$array[632] = [18, "San Pablo", 50119, 0, "3440-A-2009", null, "Portillo", "1*995", true, 1, 1, "Abraham, Jorge Juan", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[633] = [18, "San Pablo", 50119, 470, "830-R-42", null, "San Antonio", "1008", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[634] = [18, "San Pablo", 50119, 259, "4520-F-38", null, "Teresa", "1008", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[635] = [18, "San Pablo", 50119, 540, "519-V-48", null, "Trompo", "1125", false, 2, 1, "Viberti, Juan Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[636] = [18, "San Pablo", 50119, 267, "511-C-46", null, "50119", "1045", false, 2, 4, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[637] = [18, "San Pablo", 50119, 637, "183-P-51", null, "Veronica", "1125", false, 2, 1, "Videla, Juan P.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[638] = [18, "San Pablo", 50119, 264, "815-C-43", null, "Vincent", "994", false, 1, 3, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[639] = [19, "Chacayes", 50119, 272, "752-F-39", null, "30 De Agosto", "1000", false, 1, 6, "Tres Picos Samic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[640] = [19, "Chacayes", 50119, 609, "239-S-51", null, "El Manzafalse", "1165", false, 2, 1, "Santoni, Enzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[641] = [19, "Chacayes", 50119, 1055, "334-R-60", null, "El Valle", "1165", false, 2, 1, "Reginato, Juan", "null", "Mensurada", "Vigente", "null", "null"];
		$array[642] = [19, "Chacayes", 50119, 1199, "68-L-1976", null, "La Higuera", "1165", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[643] = [19, "Chacayes", 50119, 2538, "342-G-93", null, "Marco", "1*994", false, 1, 1, "B.H.P. Minerals", "null", "S/Mensura", "Vigente", "null", "41-B-1997"];
		$array[644] = [19, "Chacayes", 50119, 585, "112-G-51", null, "Mina 283", "1165", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[645] = [19, "Chacayes", 50119, 2685, "2303-M-2002", null, "Tango", "998", true, 1, 30, "Minera Anglo American Arg.Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[646] = [20, "Cacheuta", 50063, 2105, "58-R-77", null, "Amelia", "1051", false, 2, 2, "Refractarios Dina Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[647] = [20, "Cacheuta", 50063, 277, "42-D-40", null, "Barrancas", "1146", false, 1, 20, "Ypf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[648] = [20, "Cacheuta", 50063, 1954, "625-C-63", null, "Catedral", "1177", false, 2, 3, "Cuzi, Ludovick Y Ots", "null", "Mensurada", "Vigente", "null", "null"];
		$array[649] = [20, "Cacheuta", 50063, 1830, "74-L-72", null, "Don Pepe", "1051", false, 2, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[650] = [20, "Cacheuta", 50063, 1013, "88-T-1971", null, "El Carrizal", "1165", false, 2, 1, "Tranchero, Sergio Y Ots", "null", "Mensurada", "Vacante", "null", "null"];
		$array[651] = [20, "Cacheuta", 50063, 2140, "331-B-63", null, "El Poligofalse", "1122", false, 1, 1, "Benenati, Victorio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[652] = [20, "Cacheuta", 50063, 848, "317-L-58", null, "Esperanza", "1177", false, 2, 1, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[653] = [20, "Cacheuta", 50063, 2088, "56-Z-77", null, "Fanny", "1051", false, 2, 6, "Refractarios Dina Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[654] = [20, "Cacheuta", 50063, 284, "244-D-45", null, "General Necochea", "1051", false, 2, 2, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[655] = [20, "Cacheuta", 50063, 280, "2155-D-39", null, "La Elcha", "1051", false, 2, 2, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[656] = [20, "Cacheuta", 50063, 753, "455-M-57", null, "La Tosca", "999", false, 1, 2, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[657] = [20, "Cacheuta", 50063, 2558, "3654-N-2011", null, "Leonardo", "1027", false, 1, 7, "Grupo Minero Hallada S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[658] = [20, "Cacheuta", 50063, 481, "137-C-46", null, "Los Apires", "1027", false, 1, 3, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[659] = [20, "Cacheuta", 50063, 278, "3-D-41", null, "Lunlunta", "1146", false, 1, 4, "Ypf", "null", "Mensurada", "Vigente", "null", "null"];
		$array[660] = [20, "Cacheuta", 50063, 279, "3143-T-37", null, "Manuelita", "1027", false, 1, 2, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[661] = [20, "Cacheuta", 50063, 832, "318-L-58", null, "Margarita", "1051", false, 2, 3, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[662] = [20, "Cacheuta", 50063, 646, "381-M-52", null, "Marisa", "1040", false, 2, 2, "Gres Ceramico Colbo Sca", "null", "Mensurada", "Vigente", "null", "null"];
		$array[663] = [20, "Cacheuta", 50063, 515, "562-R-47", null, "Santafetruena", "1027", false, 1, 1, "Gonzalez, Juan A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[664] = [20, "Cacheuta", 50063, 2079, "57-B-77", null, "Sonia", "1051", false, 2, 6, "Refractarios Dina Saic", "null", "Mensurada", "Vigente", "null", "null"];

		$array[665] = [20, "Cacheuta", 50063, 2762, "173-R-1991", null, "Torre Blanca Este", "1040", false, 2, 4, "T-Qual S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[666] = [20, "Cacheuta", 50063, 2757, "1531-C-1997", null, "Venus", "998", true, 1, 12, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[667] = [21, "Potrerillos", 50063, 1731, "408-R-71", null, "Adrianita", "1051", false, 2, 1, "Rodriguez, Maria Angelica", "null", "Mensurada", "Vigente", "null", "null"];
		$array[668] = [21, "Potrerillos", 50063, 1729, "8-S-71", null, "Alicia", "1051", false, 2, 7, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[669] = [21, "Potrerillos", 50063, 1600, "175-F-1993", null, "AracelI", "1051", false, 2, 1, "Fourcade, Julio Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[670] = [21, "Potrerillos", 50063, 2035, "55-S-75", null, "Cafalsepus", "1051", false, 2, 1, "Gaetafalse De Stocco, Maria", "null", "Mensurada", "Vigente", "null", "null"];
		$array[671] = [21, "Potrerillos", 50063, 1425, "118-H-62", null, "Carlos Guillermo I", "1051", false, 2, 1, "F.Vda.De Hernandez,Maria Y Ruben", "null", "Mensurada", "Vigente", "null", "null"];
		$array[672] = [21, "Potrerillos", 50063, 1426, "121-H-62", null, "Carlos Guillermo II", "1051", false, 2, 1, "F.Vda.De Hernandez,Maria Y Ruben", "null", "Mensurada", "Vigente", "null", "null"];
		$array[673] = [21, "Potrerillos", 50063, 294, "3279-G-2007", null, "Catalina", "1", false, 1, 5, "Geoandina S.R.L.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[674] = [21, "Potrerillos", 50063, 1875, "291-S-67", null, "Chacritas", "1051", false, 2, 1, "Stocco, Fortunato o", "null", "Mensurada", "Vigente", "null", "null"];
		$array[675] = [21, "Potrerillos", 50063, 2051, "249-D-74", null, "Clave", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[676] = [21, "Potrerillos", 50063, 2029, "369-R-72", null, "Daniel", "1051", false, 2, 1, "Rodriguez, Ana M De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[677] = [21, "Potrerillos", 50063, 2430, "31-M-86", null, "Daniela", "1051", false, 2, 1, "Olguin De Fourcade, Amelia", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[678] = [21, "Potrerillos", 50063, 2073, "365-S-72", null, "Delta", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[679] = [21, "Potrerillos", 50063, 2152, "128-A-62", null, "Don Diego", "1051", false, 2, 1, "Avila, Manuel", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[680] = [21, "Potrerillos", 50063, 992, "492-M-58", null, "Don Felipe", "1051", false, 2, 1, "Bobillo Minerales Sa", "null", "Mensurada", "Vacante", "null", "null"];
		$array[681] = [21, "Potrerillos", 50063, 1052, "372-B-60", null, "Don Ignacio", "1051", false, 2, 1, "Bobillo Minerales Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[682] = [21, "Potrerillos", 50063, 1109, "727-S-60", null, "El Alamo", "1051", false, 2, 1, "Sanchez, David Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[683] = [21, "Potrerillos", 50063, 503, "177-M-49", null, "El Boliviano", "1000", false, 1, 3, "Mamani, Bernardifalse", "null", "Mensurada", "Vigente", "null", "null"];
		$array[684] = [21, "Potrerillos", 50063, 2560, "683-F-1996", null, "El Obispo", "994", true, 1, 1, "Ferri, Mario Pedro", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[685] = [21, "Potrerillos", 50063, 2561, "684-F-1996", null, "El Obispo II", "994", true, 1, 1, "Ferri, Mario Pedro", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[686] = [21, "Potrerillos", 50063, 311, "10-C-46", null, "El Risco", "1027", false, 1, 3, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[687] = [21, "Potrerillos", 50063, 958, "768-F-59", null, "El Salto", "1051", false, 2, 1, "Condominio Fourcade", "null", "Mensurada", "Vigente", "null", "null"];
		$array[688] = [21, "Potrerillos", 50063, 2033, "53-S-75", null, "Esfera", "1051", false, 2, 1, "Gaetafalse De Stocco, Maria", "null", "Mensurada", "Vigente", "null", "null"];
		$array[689] = [21, "Potrerillos", 50063, 2030, "57-S-75", null, "Espacio", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[690] = [21, "Potrerillos", 50063, 312, "813-P-48", null, "Faraday", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[691] = [21, "Potrerillos", 50063, 2024, "233-D-74", null, "Gel", "1051", false, 2, 1, "Dal Col, Mario Brufalse", "null", "Mensurada", "Vigente", "null", "null"];
		$array[692] = [21, "Potrerillos", 50063, 1733, "437-R-70", null, "General Acha", "1051", false, 2, 5, "Rodriguez, Maria Angelica", "null", "Mensurada", "Vigente", "null", "null"];
		$array[693] = [21, "Potrerillos", 50063, 1736, "9-R-71", null, "General Belgrano", "1051", false, 2, 2, "Rodriguez, Carlos C", "null", "Mensurada", "Vigente", "null", "null"];
		$array[694] = [21, "Potrerillos", 50063, 1726, "436-S-70", null, "General Urquiza", "1051", false, 2, 2, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[695] = [21, "Potrerillos", 50063, 1291, "642-F-60", null, "Gladys Lila", "1051", false, 2, 1, "Fourcade, Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[696] = [21, "Potrerillos", 50063, 2786, "1350-V-1997", null, "Hilda", "998", true, 1, 7, "null", "null", "null,Vacante", "null", "null"];
		$array[697] = [21, "Potrerillos", 50063, 806, "1117-F-64", null, "Ideal", "1051", false, 2, 1, "Fourcade, Antonio", "null", "Mensurada", "Vigente", "null", "null"];
		$array[698] = [21, "Potrerillos", 50063, 2025, "247-C-74", null, "Imperio", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[699] = [21, "Potrerillos", 50063, 2059, "58-R-75", null, "Kashba", "1051", false, 2, 1, "Rodriguez, Ana M De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[700] = [21, "Potrerillos", 50063, 683, "62665-A-55", null, "La Laurita", "1000", false, 1, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[701] = [21, "Potrerillos", 50063, 626, "437-C-52", null, "La Teretrueta", "1006", false, 1, 1, "Sosa, truelvestre", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[702] = [21, "Potrerillos", 50063, 300, "685-F-48", null, "Las Hornillas", "1000", false, 1, 5, "Minera Cordillerana Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[703] = [21, "Potrerillos", 50063, 2629, "2666-S-2004", null, "Los Cóndores", "994*1*995", true, 1, 1, "Sottafalse Martín Claudio", "null", "null,Vigente", "null", "null"];
		$array[704] = [21, "Potrerillos", 50063, 1369, "14-M-64", null, "Maria Del Rosario", "1025", false, 1, 2, "Rostrue, Amadeo A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[705] = [21, "Potrerillos", 50063, 1730, "407-R-71", null, "Maria Laura", "1051", false, 2, 1, "Rodriguez, Maria Angelica", "null", "Mensurada", "Vigente", "null", "null"];
		$array[706] = [21, "Potrerillos", 50063, 1363, "15-M-64", null, "Maria Teresa", "1025", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[707] = [21, "Potrerillos", 50063, 2034, "54-R-75", null, "Nantam", "1051", false, 2, 1, "Rodriguez, Carlos C", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[708] = [21, "Potrerillos", 50063, 811, "702-L-57", null, "Nereida", "1177", false, 2, 3, "La Elcha Minera Industrial Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[709] = [21, "Potrerillos", 50063, 1377, "257-S-65", null, "Norte", "1051", false, 2, 1, "Stocco, Maria S Gaetafalse De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[710] = [21, "Potrerillos", 50063, 2128, "57-H-79", null, "Oeste", "1051", false, 2, 1, "Hidalgo, Jose M", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[711] = [21, "Potrerillos", 50063, 1018, "988-S-60", null, "Pedernal", "1051", false, 2, 1, "Stocco, Fortunato o", "null", "Mensurada", "Vigente", "null", "null"];
		$array[712] = [21, "Potrerillos", 50063, 2048, "366-S-72", null, "Pleyades", "1051", false, 2, 1, "Gaetafalse De Stocco, Maria", "null", "Mensurada", "Vigente", "null", "null"];
		$array[713] = [21, "Potrerillos", 50063, 966, "832-S-60", null, "Pompeya", "1051", false, 2, 2, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[714] = [21, "Potrerillos", 50063, 1080, "948-S-60", null, "Pompeya 2", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[715] = [21, "Potrerillos", 50063, 1185, "721-S-61", null, "Potrerillos", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[716] = [21, "Potrerillos", 50063, 2712, "1349-V-1997", null, "Punta De Vacas", "998", true, 1, 1, "null", "null", "null,Vacante", "null", "null"];
		$array[717] = [21, "Potrerillos", 50063, 2151, "76-C-80", null, "Regreso 11", "1174", false, 1, 3, "Cuzzi, Ludvic, Stocco, Alfredo Y Ots.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[718] = [21, "Potrerillos", 50063, 2127, "56-S-79", null, "Rincon", "1051", false, 2, 1, "Stocco, Graciela Susana", "null", "Mensurada", "Vigente", "null", "null"];
		$array[719] = [21, "Potrerillos", 50063, 292, "514-T-99", null, "Rosario", "1000", false, 1, 7, "Cia Minera Ganadera Santa Fe", "null", "Mensurada", "Vigente", "null", "null"];
		$array[720] = [21, "Potrerillos", 50063, 863, "1279-L-58", null, "San Agustin", "1177", false, 2, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[721] = [21, "Potrerillos", 50063, 1709, "275-M-70", null, "50091", "1051", false, 2, 7, "Fábrega, José Eloy", "null", "Mensurada", "Vigente", "null", "null"];
		$array[722] = [21, "Potrerillos", 50063, 303, "3172-F-41", null, "San Felix", "1051", false, 2, 2, "Taranto, Jorge E. Y Gianina V.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[723] = [21, "Potrerillos", 50063, 291, "329-V-52", null, "San Jose", "1", false, 1, 5, "Santecchia, Gustavo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[724] = [21, "Potrerillos", 50063, 289, "3277-F-1939", null, "San Luis", "1051", false, 2, 2, "Fourcade, Carlos Félix", "null", "Mensurada", "Vigente", "null", "null"];
		$array[725] = [21, "Potrerillos", 50063, 288, "2507-F-1939", null, "Santa Elena", "1051", false, 2, 2, "Fourcade, Alberto Mario", "null", "Mensurada", "Vigente", "null", "null"];
		$array[726] = [21, "Potrerillos", 50063, 654, "100934-54", null, "Santa Lucia", "1051", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[727] = [21, "Potrerillos", 50063, 1100, "987-G-1960", null, "Santa Maria", "1051", false, 2, 1, "Stocco, Maria S Gaetafalse De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[728] = [21, "Potrerillos", 50063, 290, "3080-F-1939", null, "Santa Rita", "1051", false, 2, 3, "Fourcade, Carlos Félix", "null", "Mensurada", "Vigente", "null", "null"];
		$array[729] = [21, "Potrerillos", 50063, 1840, "183-Q-60", null, "truederal", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[730] = [21, "Potrerillos", 50063, 1578, "579-S-66", null, "trueete Colores", "1051", false, 2, 1, "Stocco, Maria S Gaetafalse De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[731] = [21, "Potrerillos", 50063, 2023, "248-S-74", null, "truegfalse", "1051", false, 2, 1, "Stocco, Victorio N", "null", "Mensurada", "Vigente", "null", "null"];
		$array[732] = [21, "Potrerillos", 50063, 0, "3335-G-2008", null, "Soberanía Norte", "1*995", true, 1, 1, "Geoandina S.R.L.", "null", "null,Vigente", "null", "null"];
		$array[733] = [21, "Potrerillos", 50063, 2052, "133-S-76", null, "Sol", "1051", false, 2, 1, "Paccioni De Stocco, Vilma", "null", "Mensurada", "Vigente", "null", "null"];
		$array[734] = [21, "Potrerillos", 50063, 1375, "258-S-65", null, "Sur", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[735] = [21, "Potrerillos", 50063, 582, "19-G-50", null, "TrI", "1177", false, 2, 2, "Gomez, Vicente A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[736] = [22, "San Ignacio", 50049, 317, "5157-G-1937", null, "Agua Del Zanjón", "1045", false, 2, 1, "Talcomin Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[737] = [22, "San Ignacio", 50049, 2086, "299-P-76", null, "Alejandra", "1125", false, 2, 1, "Plaza, Isabel Y Ot", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[738] = [22, "San Ignacio", 50049, 1305, "200-P-65", null, "Alfredito", "1051", false, 2, 1, "Palmero, Luis", "null", "Mensurada", "Vacante", "null", "null"];
		$array[739] = [22, "San Ignacio", 50049, 2277, "26-C-84", null, "Angela", "1", false, 1, 1, "Cafalse, Guillermo L", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[740] = [22, "San Ignacio", 50049, 314, "17-M-46", null, "Arrayan", "1128", false, 1, 5, "Palmar Mendoza Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[741] = [22, "San Ignacio", 50049, 859, "256-C-58", null, "Atlas IiI", "999", false, 1, 5, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[742] = [22, "San Ignacio", 50049, 318, "1430-S-16", null, "Carboneras Salas", "1128", false, 1, 3, "Huincan Cia Cementos Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[743] = [22, "San Ignacio", 50049, 2456, "54-A-86", null, "Carlos Ariel", "1128", false, 1, 1, "Benenati, Victorio Y Pacheco, Elisa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[744] = [22, "San Ignacio", 50049, 2044, "16-C-76", null, "Carmelita", "1125", false, 2, 1, "Cafalse, Hilda P De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[745] = [22, "San Ignacio", 50049, 321, "226-L-49", null, "Concepcion", "1", false, 1, 2, "Correas, Guillermo R", "null", "Mensurada", "Vigente", "null", "null"];
		$array[746] = [22, "San Ignacio", 50049, 1215, "460-C-63", null, "Don Alberto", "1103", false, 1, 7, "Dispirito, Raffaele", "null", "Mensurada", "Vigente", "null", "null"];
		$array[747] = [22, "San Ignacio", 50049, 928, "760-H-57", null, "Don Amable", "1051", false, 2, 1, "Lopez Migueles, Jose", "null", "Mensurada", "Vigente", "null", "null"];
		$array[748] = [22, "San Ignacio", 50049, 955, "51-C-60", null, "Don Angel", "999", false, 1, 1, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[749] = [22, "San Ignacio", 50049, 959, "266-B-58", null, "Don Facundo", "1051", false, 2, 2, "Giunta, Fernando", "null", "Mensurada", "Vigente", "null", "null"];
		$array[750] = [22, "San Ignacio", 50049, 1508, "228-C-1988", null, "Eclipse", "1125", false, 2, 2, "Cafalse, Guillermo L", "null", "Mensurada", "Vigente", "null", "null"];
		$array[751] = [22, "San Ignacio", 50049, 1955, "3366-S-2009", null, "Eclipse I", "1125", false, 2, 1, "Somina Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[752] = [22, "San Ignacio", 50049, 1328, "382-P-65", null, "El Poligofalse", "1040", false, 2, 1, "Geberovich Hfalses. Scc", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[753] = [22, "San Ignacio", 50049, 772, "2-C-57", null, "El Trampolin Luisalfel", "1174", false, 1, 78, "Ladera Sur S.A.", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[754] = [22, "San Ignacio", 50049, 2281, "17-G-83", null, "Eliana", "1051", false, 2, 1, "Geberovich Hfalses. Scc", "null", "Mensurada", "Vigente", "null", "null"];
		$array[755] = [22, "San Ignacio", 50049, 2455, "55-S-86", null, "Elizabeth", "1128", false, 1, 1, "Benenati, Victorio Y Pacheco, Elisa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[756] = [22, "San Ignacio", 50049, 534, "530-D-47", null, "Fray Luis Beltran", "1045", false, 2, 1, "Fábrega, José Eloy", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[757] = [22, "San Ignacio", 50049, 345, "306-D-45", null, "General Alvear", "1045", false, 2, 2, "Explotación Minerales Argentifalses Sam", "null", "Mensurada", "Vigente", "null", "null"];
		$array[758] = [22, "San Ignacio", 50049, 580, "854-P-1959", null, "General Balcarce", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vigente", "null", "null"];
		$array[759] = [22, "San Ignacio", 50049, 1798, "247-S-71", null, "General Guido", "1051", false, 2, 2, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[760] = [22, "San Ignacio", 50049, 1716, "434-H-70", null, "General 50049", "1051", false, 2, 2, "Rodriguez, Maria Angelica", "null", "Mensurada", "Vigente", "null", "null"];
		$array[761] = [22, "San Ignacio", 50049, 459, "305-D-45", null, "General 50056", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vacante", "null", "null"];
		$array[762] = [22, "San Ignacio", 50049, 537, "527-D-47", null, "General Madariaga", "1045", false, 2, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[763] = [22, "San Ignacio", 50049, 1715, "435-H-70", null, "General Mitre", "1051", false, 2, 2, "Rodriguez, Maria Angelica", "null", "Mensurada", "Vigente", "null", "null"];
		$array[764] = [22, "San Ignacio", 50049, 461, "304-D-45", null, "General MosconI", "1045", false, 2, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[765] = [22, "San Ignacio", 50049, 464, "2208-M-2001", null, "General Paz", "1045", false, 2, 2, "Minera Huarpe Sa", "null", "Mensurada", "Vigente", "null", "null"];
		$array[766] = [22, "San Ignacio", 50049, 460, "311-D-45", null, "General Pueyrredon", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vacante", "null", "null"];
		$array[767] = [22, "San Ignacio", 50049, 462, "313-D-45", null, "General Roca", "1045", false, 2, 2, "Explotación Minerales Argentifalses Sam", "null", "Mensurada", "Vigente", "null", "null"];
		$array[768] = [22, "San Ignacio", 50049, 469, "1061-F-1959", null, "General San Martin", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vacante", "null", "null"];
		$array[769] = [22, "San Ignacio", 50049, 463, "1060-L-1959", null, "General Sarmiento", "1045", false, 2, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[770] = [22, "San Ignacio", 50049, 2010, "14-C-76", null, "Gladys", "1125", false, 2, 1, "Cafalse, Felipe Y Ot", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[771] = [22, "San Ignacio", 50049, 1344, "199-I-65", null, "Graciela", "1051", false, 2, 1, "Ibañez Ribas, Juan", "null", "Mensurada", "Vigente", "null", "null"];
		$array[772] = [22, "San Ignacio", 50049, 2349, "48-S-86", null, "Grear", "1051", false, 2, 1, "Stocco, Maria S Gaetafalse De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[773] = [22, "San Ignacio", 50049, 319, "53-G-46", null, "Guamparito", "1045", false, 2, 2, "Fábrega, José Eloy", "null", "Mensurada", "Vacante", "null", "null"];
		$array[774] = [22, "San Ignacio", 50049, 2008, "15-C-76", null, "Guille I", "1125", false, 2, 1, "Cafalse, Isabel P De", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[775] = [22, "San Ignacio", 50049, 2346, "43-S-86", null, "Horizonte", "1051", false, 2, 1, "Stocco, Eduardo Alfredo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[776] = [22, "San Ignacio", 50049, 500, "88-C-47", null, "Independencia", "1174", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[777] = [22, "San Ignacio", 50049, 2348, "44-S-86", null, "Indigena", "1051", false, 2, 1, "Stocco, Alfredo Lorenzo", "null", "Mensurada", "Vigente", "null", "null"];
		$array[778] = [22, "San Ignacio", 50049, 954, "83-C-60", null, "Iron", "999", false, 1, 1, "Minera Petrosol Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[779] = [22, "San Ignacio", 50049, 1728, "3367-S-2009", null, "Isabel", "1125", false, 2, 1, "Somina Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[780] = [22, "San Ignacio", 50049, 333, "5194-D-42", null, "Julia", "1045", false, 2, 1, "De Francesco, Miguel A", "null", "Mensurada", "Vigente", "null", "null"];
		$array[781] = [22, "San Ignacio", 50049, 322, "928-S-17", null, "La Atala", "1128", false, 1, 3, "Huincan Cia Cementos Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[782] = [22, "San Ignacio", 50049, 324, "3661-S-16", null, "La Blanca", "1", false, 1, 5, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[783] = [22, "San Ignacio", 50049, 330, "543-O-46", null, "La Carolina", "1027", false, 1, 4, "Huincan Cia Cementos Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[784] = [22, "San Ignacio", 50049, 1692, "3328-P-2008", null, "La Cumbre", "1", false, 1, 2, "null", "null", "Mensurada", "Vacante Solic.,null", "null"];
		$array[785] = [22, "San Ignacio", 50049, 327, "150-T-1977", null, "La Florencia", "1027", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[786] = [22, "San Ignacio", 50049, 315, "3193-L-39", null, "La Generosa", "999", false, 1, 5, "Fábrega, José Eloy", "null", "Mensurada", "Vigente", "null", "null"];
		$array[787] = [22, "San Ignacio", 50049, 323, "1264-S-1958", null, "La Horqueta", "1045", false, 2, 4, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[788] = [22, "San Ignacio", 50049, 2103, "539-L-72", null, "La Poderosa", "1045", false, 2, 1, "Aguilera, Alberto L", "null", "Mensurada", "Vigente", "null", "null"];
		$array[789] = [22, "San Ignacio", 50049, 343, "444-B-44", null, "LelI", "1051", false, 2, 1, "F.Vda.De Hernandez,Maria Y Ruben", "null", "Mensurada", "Vigente", "null", "null"];
		$array[790] = [22, "San Ignacio", 50049, 853, "1032-B-58", null, "Los Mantos Preciosos", "1*1011", false, 1, 3, "Maneschi, Elías Carlos", "null", "Mensurada", "Vigente", "null", "null"];
		$array[791] = [22, "San Ignacio", 50049, 2009, "13-C-76", null, "Lucy", "1125", false, 2, 1, "Cafalse, Reynaldo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[792] = [22, "San Ignacio", 50049, 1857, "653-G-72", null, "Maria", "1040", false, 2, 2, "Gassull, Jorge Juan", "null", "Mensurada", "Vacante", "null", "null"];
		$array[793] = [22, "San Ignacio", 50049, 971, "83961-S-53", null, "Maria Elvira", "1051", false, 2, 1, "Talcomín Srl - P/ Quiebra", "null", "Mensurada", "Vigente", "null", "null"];
		$array[794] = [22, "San Ignacio", 50049, 2777, "1011-B-1997", null, "Mogote Azulado", "1*994*995", true, 1, 22, "null", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[795] = [22, "San Ignacio", 50049, 2061, "324-C-76", null, "Nancy", "1125", false, 2, 1, "Cafalse, Guillermo L", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[796] = [22, "San Ignacio", 50049, 320, "3013-G-39", null, "Perlita", "1045", false, 2, 1, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[797] = [22, "San Ignacio", 50049, 1931, "2419-M-2003", null, "Primavera", "1051", false, 2, 2, "Martinez, Angel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[798] = [22, "San Ignacio", 50049, 1505, "622-C-66", null, "San Guillermo", "1125", false, 2, 1, "Cafalse, Guillermo L", "null", "Mensurada", "Vacante", "null", "null"];
		$array[799] = [22, "San Ignacio", 50049, 1459, "447-L-66", null, "San Lorenzo", "1", false, 1, 3, "Buttini, Edgardo R,Sosa,Salinas,Lucero", "null", "Mensurada", "Vigente", "null", "null"];
		$array[800] = [22, "San Ignacio", 50049, 331, "5195-D-42", null, "San Pedro Nolasco", "1000", false, 1, 1, "Explotación Minerales Argentifalses Sam", "null", "Mensurada", "Vigente", "null", "null"];
		$array[801] = [22, "San Ignacio", 50049, 253, "3912-T-38", null, "Santa Barbara", "1128", false, 1, 7, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[802] = [22, "San Ignacio", 50049, 904, "2493-S-2003", null, "Superior", "1025", false, 1, 22, "Santiago, Sebastián Andrés", "null", "Mensurada", "Vacante", "null", "null"];
		$array[803] = [22, "San Ignacio", 50049, 1706, "367-G-70", null, "Tabafalse", "1040", false, 2, 2, "Tivafalse Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[804] = [22, "San Ignacio", 50049, 1208, "302-C-61", null, "Zeus", "1174", false, 1, 7, "Cuzi, Elio E Y Ot.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[805] = [23, "Villavicencio", 50049, 2790, "988-C-1995", null, "Agustín", "1", true, 1, 1, "Capredoni, Pedro Ignacio", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[806] = [23, "Villavicencio", 50049, 2689, "21-G-1993", null, "Alamo", "1", false, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[807] = [23, "Villavicencio", 50049, 360, "108-P-47", null, "Ana Maria", "1042", false, 2, 3, "Fábrega, José Eloy", "null", "Mensurada", "Vigente", "null", "null"];
		$array[808] = [23, "Villavicencio", 50049, 2687, "18-M-1993", null, "Araucaria", "1", false, 1, 1, "Roxburgh, Bryce", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[809] = [23, "Villavicencio", 50049, 2019, "421-G-74", null, "Astro", "1125", false, 2, 1, "Geberovich Hfalses. Scc", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[810] = [23, "Villavicencio", 50049, 2510, "320-C-92", null, "Beta 10", "994", true, 1, 1, "Aguas Dafalsene De Argentina Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[811] = [23, "Villavicencio", 50049, 2515, "322-C-92", null, "Beta 12", "994", false, 1, 1, "Jose Cartellone Const Civiles Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[812] = [23, "Villavicencio", 50049, 2498, "323-C-92", null, "Beta 13", "994", true, 1, 1, "Aguas Dafalsene De Argentina Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[813] = [23, "Villavicencio", 50049, 2507, "324-C-92", null, "Beta 14", "994", false, 1, 1, "Jose Cartellone Const Civiles Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[814] = [23, "Villavicencio", 50049, 2505, "326-C-92", null, "Beta 16", "994", false, 1, 1, "Jose Cartellone Const Civiles Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[815] = [23, "Villavicencio", 50049, 2512, "333-C-92", null, "Beta 23", "994", false, 1, 1, "Jose Cartellone Const Civiles Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[816] = [23, "Villavicencio", 50049, 2501, "317-C-92", null, "Beta 7", "994", true, 1, 1, "Aguas Dafalsene De Argentina Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[817] = [23, "Villavicencio", 50049, 1610, "556-D-66", null, "Blanca De Andacollo", "1", false, 1, 2, "Gonzalez, Osvaldo De La Cruz", "null", "Mensurada", "Vigente", "null", "null"];
		$array[818] = [23, "Villavicencio", 50049, 351, "607-P-36", null, "Bonilla", "1050", false, 2, 1, "Blanco, Roberto Manuel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[819] = [23, "Villavicencio", 50049, 356, "394-S-95", null, "BoquI", "994", false, 1, 6, "Gobierfalse De Mendoza-Dgm-Oro Del Sur", "null", "Mensurada", "Vigente", "null", "null"];
		$array[820] = [23, "Villavicencio", 50049, 2802, "7-B-1991", null, "C.Ave-Lallemant", "1027", false, 1, 2, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[821] = [23, "Villavicencio", 50049, 350, "606-P-36", null, "Carmen", "1050", false, 2, 1, "Blanco, Roberto Manuel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[822] = [23, "Villavicencio", 50049, 2693, "116-M-1993", null, "Cedro", "1 ", false, 1, 1, "Mendez, Mercedes Irene", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[823] = [23, "Villavicencio", 50049, 622, "537-C-51", null, "Cema II", "1125", false, 2, 1, "Croce, Lia Lebricon De", "null", "Mensurada", "Vigente", "null", "null"];
		$array[824] = [23, "Villavicencio", 50049, 2636, "13-E-1993", null, "Chañar", "1", false, 1, 1, "Landegger,  George", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[825] = [23, "Villavicencio", 50049, 2679, "15-C-1993", null, "Coiron", "1", false, 1, 1, "Cuomo Jorge Ricardo", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[826] = [23, "Villavicencio", 50049, 0, "3506-G-2010", null, "Don Celso", "1022", true, 1, 1, "Geoandina S.R.L.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[827] = [23, "Villavicencio", 50049, 369, "390-U-45", null, "Don Emilio", "1", false, 1, 2, "Tres Picos Samic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[828] = [23, "Villavicencio", 50049, 642, "83889-43", null, "Don Manuel", "1045", false, 2, 6, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[829] = [23, "Villavicencio", 50049, 368, "3305-R-2008", null, "Don Ricardo", "1", false, 1, 4, "Racconto, Jose Luis", "null", "Mensurada", "Vigente", "null", "null"];
		$array[830] = [23, "Villavicencio", 50049, 355, "3365-G-2009", null, "El Saltito", "1128", false, 1, 6, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[831] = [23, "Villavicencio", 50049, 2695, "118-M-1993", null, "Eucalipto", "1", false, 1, 1, "Mendez, Lidia Eugenia", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[832] = [23, "Villavicencio", 50049, 968, "781-T-59", null, "Eugenio Jose", "1045", false, 2, 1, "Cia Min El Porvenir", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[833] = [23, "Villavicencio", 50049, 2210, "65-P-84", null, "Francisco Hernan", "1125", false, 2, 1, "Perforaciones Chilecito Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[834] = [23, "Villavicencio", 50049, 2690, "22-M-1993", null, "Fresfalse", "1", false, 1, 1, "Miguelez, Héctor", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[835] = [23, "Villavicencio", 50049, 2514, "352-C-92", null, "Gama 1", "994", true, 1, 1, "Aguas Dafalsene De Argentina Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[836] = [23, "Villavicencio", 50049, 2508, "358-C-92", null, "Gama 7", "994", true, 1, 1, "Aguas Dafalsene De Argentina Sa", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[837] = [23, "Villavicencio", 50049, 2752, "146-C-1991", null, "Ingrid", "1*994", false, 1, 1, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[838] = [23, "Villavicencio", 50049, 2691, "23-M-1993", null, "Jacarandá", "1", false, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[839] = [23, "Villavicencio", 50049, 1484, "434-G-66", null, "Jaguelito", "1125", false, 2, 2, "Geberovich Hfalses. Scc", "null", "Mensurada", "Vigente", "null", "null"];
		$array[840] = [23, "Villavicencio", 50049, 2686, "17-L-1993", null, "Jarilla", "1", false, 1, 1, "López, Eduardo Andrés", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[841] = [23, "Villavicencio", 50049, 359, "4174-G-17", null, "La Dora", "1042", false, 2, 3, "Correas, Guillermo R", "null", "Mensurada", "Vigente", "null", "null"];
		$array[842] = [23, "Villavicencio", 50049, 362, "31-T-04", null, "La Mascota", "1", false, 1, 3, "Tres Picos Samic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[843] = [23, "Villavicencio", 50049, 366, "838-T-57", null, "La Potencial", "1128", false, 1, 2, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[844] = [23, "Villavicencio", 50049, 357, "383-F-1994", null, "La Union", "1006", false, 1, 4, "Martínez, Juan Roberto", "null", "Mensurada", "Vigente", "null", "null"];
		$array[845] = [23, "Villavicencio", 50049, 1487, "221-T-57", null, "La Victoria", "1006", false, 1, 2, "Cetel Minera Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[846] = [23, "Villavicencio", 50049, 2638, "3355-L-2009", null, "Las Mesas", "994", true, 1, 35, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[847] = [23, "Villavicencio", 50049, 353, "25-A-04", null, "Leopoldina", "994", false, 1, 6, "Gobierfalse De Mendoza-Dgm-Oro Del Sur", "null", "Mensurada", "Vigente", "null", "null"];
		$array[848] = [23, "Villavicencio", 50049, 0, "3368-S-2009", null, "Liber", "1", true, 1, 1, "Stiefe, Vìctor D.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[849] = [23, "Villavicencio", 50049, 2716, "106-C-1994", null, "Lorenzo II", "1", false, 1, 1, "Canet, María Isabel", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[850] = [23, "Villavicencio", 50049, 2713, "201-G-1994", null, "Lorenzo IiI", "1*995", false, 1, 1, "Gauna, Miguel v", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[851] = [23, "Villavicencio", 50049, 715, "583-P-57", null, "Los Tres Manueles", "999", false, 1, 3, "Cetel Minera Saic", "null", "Mensurada", "Vacante", "null", "null"];
		$array[852] = [23, "Villavicencio", 50049, 2484, "36-M-89", null, "Marcelito", "1045", false, 2, 1, "null", "null", "S/Mensura", "Vacante Sol.,null", "null"];
		$array[853] = [23, "Villavicencio", 50049, 479, "503-R-1946", null, "Maria Rosa", "1125", false, 2, 2, "Blanco, Roberto Manuel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[854] = [23, "Villavicencio", 50049, 499, "497-C-45", null, "Maria Teresa", "1", false, 1, 1, "Tenaglia De Blanco, Elena", "null", "Mensurada", "Vigente", "null", "null"];
		$array[855] = [23, "Villavicencio", 50049, 361, "2531-G-42", null, "Mascareña", "994", false, 1, 7, "Gobierfalse De Mendoza-Dgm-Oro Del Sur", "null", "Mensurada", "Vigente", "null", "null"];
		$array[856] = [23, "Villavicencio", 50049, 2810, "164-M-1992", null, "Mdo-E-05", "1", true, 1, 1, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[857] = [23, "Villavicencio", 50049, 2692, "114-V-1993", null, "Olmo", "1", false, 1, 1, "Fulgieri, María", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[858] = [23, "Villavicencio", 50049, 2788, "2304-C-2002", null, "Osadia", "1", true, 1, 23, "Concina, Raúl Ernesto", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[859] = [23, "Villavicencio", 50049, 2251, "25-C-1992", null, "Paramillos Sur I", "1", true, 1, 3, "Minera Del Oeste Srl", "null", "Mensurada", "Vigente", "null", "null"];
		$array[860] = [23, "Villavicencio", 50049, 358, "737-G-46", null, "ParodI", "1006", false, 1, 4, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[861] = [23, "Villavicencio", 50049, 2688, "20-B-1993", null, "Piquillín", "1", false, 1, 1, "Walton, Anthony", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[862] = [23, "Villavicencio", 50049, 644, "83891/53", null, "Pirucha", "1045", false, 2, 3, "Cetel Minera Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[863] = [23, "Villavicencio", 50049, 2801, "8-B-1991", null, "Profesor Borrello", "1027", false, 1, 2, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[864] = [23, "Villavicencio", 50049, 643, "83890-53", null, "Ramoncito", "1045", false, 2, 3, "Cetel Minera Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[865] = [23, "Villavicencio", 50049, 2696, "121-M-1993", null, "Retama", "1", false, 1, 1, "Mendez, Vicente", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[866] = [23, "Villavicencio", 50049, 2720, "69-G-1996", null, "Santa Cecilia", "994", true, 1, 8, "Billiton World Exploration Inc (SUC Arg)", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[867] = [23, "Villavicencio", 50049, 2721, "70-G-1996", null, "Santa Claudia", "994", true, 1, 13, "Billiton World Exploration Inc (SUC Arg)", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[868] = [23, "Villavicencio", 50049, 349, "301-M-50", null, "Santa Maxima", "1128", false, 1, 7, "Benenati, Jorge E", "null", "Mensurada", "Vigente", "null", "null"];
		$array[869] = [23, "Villavicencio", 50049, 394, "3364-G-2009", null, "Santa Maxima", "1128", false, 1, 7, "null", "null", "Mensurada", "Vacante Sol.,null", "null"];
		$array[870] = [23, "Villavicencio", 50049, 352, "605-P-36", null, "Sarita", "1050", false, 2, 1, "Tenaglia De Blanco, Elena", "null", "Mensurada", "Vigente", "null", "null"];
		$array[871] = [23, "Villavicencio", 50049, 2680, "16-V-1993", null, "Sauce", "1", false, 1, 1, "Reihs, Willy Von", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[872] = [23, "Villavicencio", 50049, 2719, "68-G-1996", null, "truelvina", "994", true, 1, 8, "Billiton World Exploration Inc (SUC Arg)", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[873] = [23, "Villavicencio", 50049, 364, "3160-A-39", null, "Sub California", "1", false, 1, 3, "Racconto, José Luis Y Bustos Juan C.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[874] = [23, "Villavicencio", 50049, 485, "264-B-1993", null, "Susana", "1125", false, 2, 1, "Blanco, Roberto Manuel", "null", "Mensurada", "Vigente", "null", "null"];
		$array[875] = [23, "Villavicencio", 50049, 519, "416-C-47", null, "Susy I", "1050", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[876] = [23, "Villavicencio", 50049, 517, "415-A-47", null, "Susy II", "1050", false, 2, 1, "Tenaglia De Blanco, Elena", "null", "Mensurada", "Vigente", "null", "null"];
		$array[877] = [23, "Villavicencio", 50049, 2694, "117-M-1993", null, "Tamarindo", "1", false, 1, 1, "Mirre, Sebastián Javier", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[878] = [23, "Villavicencio", 50049, 718, "584-P-57", null, "Tres Porteñas", "999", false, 1, 1, "Cetel Minera Saic", "null", "Mensurada", "Vigente", "null", "null"];
		$array[879] = [23, "Villavicencio", 50049, 2800, "297-V-1990", null, "Trinidad", "1000*995", false, 1, 1, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[880] = [23, "Villavicencio", 50049, 2666, "138-V-1991", null, "Veis", "1", false, 1, 1, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[881] = [23, "Villavicencio", 50049, 354, "388-A-95", null, "Very Well", "994", false, 1, 6, "Gobierfalse De Mendoza-Dgm-Oro Del Sur", "null", "Mensurada", "Vigente", "null", "null"];
		$array[882] = [23, "Villavicencio", 50049, 1002, "780-T-59", null, "Vicente", "1045", false, 2, 1, "Cia Min El Porvenir", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[883] = [23, "Villavicencio", 50049, 2795, "6-B-1991", null, "Victorio BenenatI", "1027", false, 1, 0, "Minera Del Oeste Srl", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[884] = [23, "Villavicencio", 50049, 0, "676-O-1996", null, "Zaifalse II", "994*995*1", true, 1, 1, "Argentina Mineral Development S.A.", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[885] = [24, "Uspallata", 50049, 2518, "9-B-91", null, "Agua De La Zorra", "1027", false, 1, 1, "Minera Del Oeste Srl", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[886] = [24, "Uspallata", 50049, 385, "410-D-63", null, "Alberta", "1050", false, 2, 2, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[887] = [24, "Uspallata", 50049, 1793, "3275-C-2007", null, "Alejo", "1", false, 1, 2, "Contreras, falseé Damián", "null", "Mensurada", "Vigente", "null", "null"];
		$array[888] = [24, "Uspallata", 50049, 1161, "825-M-57", null, "Andres", "1050*1125", false, 2, 1, "Galo A. Borlenghi Y José M. Caccavari", "null", "Mensurada", "Vigente", "null", "null"];
		$array[889] = [24, "Uspallata", 50049, 2182, "103-G-82", null, "Ariel", "1125", false, 2, 2, "Geberovich Hfalses. Scc", "null", "Mensurada", "Vigente", "null", "null"];
		$array[890] = [24, "Uspallata", 50049, 1757, "580-D-65", null, "Benito", "1050", false, 2, 1, "Demartini, Carolina A.", "null", "Mensurada", "Vigente", "null", "null"];
		$array[891] = [24, "Uspallata", 50049, 2463, "119-M-89", null, "Cerro Canario 1", "994*995", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vacante", "null", "null"];
		$array[892] = [24, "Uspallata", 50049, 2471, "264-M-91", null, "Cerro Canario 2", "994*995", false, 1, 1, "Gobierfalse De Mendoza Dgm", "null", "S/Mensura", "Vigente", "null", "null"];
		$array[893] = [24, "Uspallata", 50049, 1076, "853-B-60", null, "Chiruza", "1000", false, 1, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];
		$array[894] = [24, "Uspallata", 50049, 1210, "130-D-63", null, "Constantifalse", "1050", false, 2, 1, "null", "null", "Mensurada", "Vacante", "null", "null"];







        $array[895] = [24,"Uspallata",50049,2462,"3503-D-2010",null,"Contapiera","994",false,1,1,"Dumit truemeram, Diego Raúl","null","S/Mensura","Vacante Sol.,null","false Posee"];
        $array[896] = [24,"Uspallata",50049,382,"4468-B-38",null,"Corina","1050",false,2,4,"De Martini, Jose A","null","Mensurada","Vigente","null","null"];
        $array[897] = [24,"Uspallata",50049,2273,"66-O-84",null,"Dana","1000",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[898] = [24,"Uspallata",50049,1587,"41-M-67",null,"Don Alberto","1025",false,1,2,"Monllor, Alfredo","null","Mensurada","Vacante","null","null"];


        $array[899] = [24,"Uspallata",50049,734,"379-C-51",null,"Don Ernesto","Talco",false,2,3,"Juan M.Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[900] = [24,"Uspallata",50049,1951,"288-G-74",null,"Don Luis","Talco",false,2,3,"Geberovich Hfalses. Scc","null","Mensurada","Vigente","null","null"];

        $array[901] = [24,"Uspallata",50049,374,"2286-B-39",null,"El Coloso","1050",false,2,3,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[902] = [24,"Uspallata",50049,1485,"400-V-62",null,"El Ingeniero","1000",false,1,1,"null","null","S/Mensura","Vacante Sol.,null","null"];
        $array[903] = [24,"Uspallata",50049,377,"2957-A-39",null,"El Manto Flor","1",false,1,2,"Tres Picos Samic","null","Mensurada","Vigente","null","null"];
        $array[904] = [24,"Uspallata",50049,1489,"1870-M-1998",null,"El Santo","1000",false,1,1,"Minera Petrosol Sa","null","S/Mensura","Vigente","null","null"];
        $array[905] = [24,"Uspallata",50049,372,"2314-A-32",null,"El Tramojo","1050",false,2,3,"Talcomín Srl - P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[906] = [24,"Uspallata",50049,2756,"294-B-1992",null,"Enriqueta","1052",false,2,1,"Díaz Telli, Francisco","null","S/Mensura","Vacante","null","null"];
        $array[907] = [24,"Uspallata",50049,393,"18-R-42",null,"Flor","Talco",false,2,3,"Talcomín Srl - P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[908] = [24,"Uspallata",50049,743,"3295-D-43",null,"Florinda","1052",false,2,3,"Cia Minera Del Paramillo Sa","null","Mensurada","Vigente","null","null"];
        $array[909] = [24,"Uspallata",50049,948,"489-G-59",null,"Gaucho Cubillos","1177",false,2,2,"null","null","Mensurada","Vacante","null","null"];
        $array[910] = [24,"Uspallata",50049,386,"3883-U-1939",null,"Gobernador Cafalse","1050",false,2,3,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];

        $array[911] = [24,"Uspallata",50049,1473,"414-B-62",null,"Graciela","Talco",false,2,1,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[912] = [24,"Uspallata",50049,2755,"293-F-1992",null,"Juana","1052",false,2,1,"Díaz Telli, Francisco","null","S/Mensura","Vacante","null","null"];
        $array[913] = [24,"Uspallata",50049,2768,"115-Z-1992",null,"La Batistina","1000*995",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[914] = [24,"Uspallata",50049,383,"1125-D-39",null,"La Cueva","1050",false,2,3,"Blanco, Roberto Manuel","null","Mensurada","Vigente","null","null"];
        $array[915] = [24,"Uspallata",50049,380,"1191-C-39",null,"La Mendocina","1050",false,2,5,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[916] = [24,"Uspallata",50049,1300,"656-C-62",null,"La falsena","Talco",false,2,2,"Caccavari, Jose R.","null","Mensurada","Vigente","null","null"];
        $array[917] = [24,"Uspallata",50049,381,"756-C-1958",null,"La Salada","1050",false,2,2,"Caccavari, Juan","null","Mensurada","Vacante","null","null"];
        $array[918] = [24,"Uspallata",50049,684,"83883-53",null,"La Turca","1051",false,2,3,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[919] = [24,"Uspallata",50049,2804,"299-B-1990",null,"Las Animas" ,"1000*995",false,1,1,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[920] = [24,"Uspallata",50049,2764,"300-B-1990",null,"Las Animas II","1000*995",false,1,1,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[921] = [24,"Uspallata",50049,752,"65496-M-56",null,"Libertad","1177",false,2,2,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[922] = [24,"Uspallata",50049,1089,"939-A-59",null,"Liliana Mirtha","Talco",false,2,1,"Uspallata Minerales Samic","null","Mensurada","Vigente","null","null"];
        $array[923] = [24,"Uspallata",50049,384,"2103-B-39",null,"Los Chuecos","1050",false,2,1,"Minerales Villa Del Cerro Sa","null","Mensurada","Vigente","null","null"];
        $array[924] = [24,"Uspallata",50049,627,"443-A-51",null,"Los Once","1177",false,2,2,"Minera Cema Saicyf","null","Mensurada","Vigente","null","null"];
        $array[925] = [24,"Uspallata",50049,2683,"293-B-1990",null,"Luaner","1027",false,1,13,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[926] = [24,"Uspallata",50049,2499,"393-F-93",null,"LulI","994",false,1,1,"Ferri, Mario Pedro","null","S/Mensura","Vigente","null","null"];
        $array[927] = [24,"Uspallata",50049,376,"3159-A-39",null,"Manto Azul","1",false,1,3,"Tres Picos Samic","null","Mensurada","Vigente","null","null"];
        $array[928] = [24,"Uspallata",50049,378,"5315-G-42",null,"Manto Poroso","1",true,1,2,"Dumit truemeram, Diego Raúl","null","Mensurada","Vigente","null","null"];
        $array[929] = [24,"Uspallata",50049,899,"824-S-57",null,"Maria Alejandra","Talco",false,2,1,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[930] = [24,"Uspallata",50049,388,"531-A-43",null,"Maria Felisa","Talco",false,2,7,"Talcomín Srl - P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[931] = [24,"Uspallata",50049,375,"2152-B-35",null,"Maria Lidia","1050",false,2,3,"Talcomín Srl - P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[932] = [24,"Uspallata",50049,2595,"109-P-1992",null,"María Martha","1022",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[933] = [24,"Uspallata",50049,391,"456-B-42",null,"Maria Susana","Talco",false,2,3,"Blanco, Roberto Manuel","null","Mensurada","Vigente","null","null"];
        $array[934] = [24,"Uspallata",50049,1370,"722-B-60",null,"Mariscal","Talco",false,2,1,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[935] = [24,"Uspallata",50049,2578,"1910-M-1998",null,"Milagro","994*1",true,1,1,"Martínez, Juan Roberto Y Otros","null","S/Mensura","Vigente","null","null"];
        $array[936] = [24,"Uspallata",50049,1390,"723-Q-60",null,"Ney","Talco",false,2,1,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[937] = [24,"Uspallata",50049,2212,"61-M-1983",null,"falserma","Talco",false,2,1,"Catarifalse, Eduardo Hugo","null","Mensurada","Vigente","null","null"];
        $array[938] = [24,"Uspallata",50049,2754,"291-D-1992",null,"falserma","1052",false,2,1,"Díaz Telli, Francisco","null","S/Mensura","Vigente","null","null"];





        $array[939] = [24,"Uspallata",50049,2805,"301-S-1990",null,"Nueva II","1000*995",false,1,1,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[940] = [24,"Uspallata",50049,379,"748-T-1939",null,"Paramillos D/Uspallata","1000*995",false,1,58,"Nuclear Mendoza Se","null","Mensurada","Vigente","null","null"];
        $array[941] = [24,"Uspallata",50049,373,"107-B-36",null,"Rivadavia","1050",false,2,2,"Juan M.Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[942] = [24,"Uspallata",50049,1234,"650-C-62",null,"Salada Segunda","Talco",false,2,1,"Caccavari, Jose R.","null","Mensurada","Vigente","null","null"];
        $array[943] = [24,"Uspallata",50049,387,"2831-P-2005",null,"50091","1050",false,2,1,"Pozo, Juan","null","S/Mensura","Vigente","null","null"];
        $array[944] = [24,"Uspallata",50049,1068,"670-C-59",null,"San Felipe","Talco",false,2,3,"Lucero, Jose A","null","Mensurada","Vigente","null","null"];
        $array[945] = [24,"Uspallata",50049,1263,"668-C-61",null,"Santa Maria","1025",false,1,3,"null","null","Mensurada","Vacante","null","null"];






        $array[946] = [24,"Uspallata",50049,2389,"159-M-86",null,"Santa Teretrueta","999",false,1,3,"Billiton World Exploration Inc (SUC Arg)","null","Mensurada","Vacante","null","null"];
        $array[947] = [24,"Uspallata",50049,1090,"938-A-59",null,"truelvia","Talco",false,2,1,"Galo A. Borlenghi Y José M. Caccavari","null","Mensurada","Vigente","null","null"];
        $array[948] = [24,"Uspallata",50049,2753,"292-R-1992",null,"truelvia","1052",false,2,1,"Díaz Telli, Francisco","null","S/Mensura","Vacante","null","null"];
        $array[949] = [24,"Uspallata",50049,2803,"298-B-1990",null,"Trinidad II","1000*995",false,1,1,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[950] = [24,"Uspallata",50049,1463,"170-A-62",null,"Turena","Talco",false,2,1,"null","null","S/Mensura","Vacante Sol.,null","null"];
        $array[951] = [24,"Uspallata",50049,1418,"490-M-44",null,"Victoria","Talco",false,2,1,"Talcomín Srl - P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[952] = [25,"La Cortaderita",50049,852,"65222-C-56",null,"Agua Dulce","Talco",false,2,1,"Ciratruefalse, Angel","null","Mensurada","Vigente","null","null"];
        $array[953] = [25,"La Cortaderita",50049,401,"147-T-1943",null,"Andacollo","1",false,1,3,"null","null","Mensurada","Vacante Solic.,null","null"];
        $array[954] = [25,"La Cortaderita",50049,1458,"3124-M-2006",null,"Azul","Talco",false,2,2,"null","null","Mensurada","Vacante","null","null"];
        $array[955] = [25,"La Cortaderita",50049,407,"3210-M-2007","424-G-1895 , 499-M-1958 , 489-M-2006.","Brillante","994",false,1,4,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[956] = [25,"La Cortaderita",50049,398,"4133-M-43",null,"Carmen","994",false,1,5,"Tomás, Julián Rubén","null","Mensurada","Vigente","null","null"];
        $array[957] = [25,"La Cortaderita",50049,2490,"21-M-90",null,"Carolina","Talco",false,2,1,"Monllor, Rafael Carlos Y Otros","null","S/Mensura","Vigente","null","null"];
        $array[958] = [25,"La Cortaderita",50049,730,"101021-54",null,"Cerros San Antonio","1",false,1,2,"Cia Minera Santa Rosa","null","Mensurada","Vigente","null","null"];
        $array[959] = [25,"La Cortaderita",50049,406,"3654-U-1914",null,"Delirio","994",false,1,1,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[960] = [25,"La Cortaderita",50049,2782,"3462-E-2010",null,"Delirio 1","994",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[961] = [25,"La Cortaderita",50049,2784,"274-B-1994",null,"Delirio 11","994",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[962] = [25,"La Cortaderita",50049,2783,"3465-E-2010",null,"Delirio 4","994",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[963] = [25,"La Cortaderita",50049,2439,"87-M-87",null,"Diego","Talco",false,2,1,"Monllor, Rafael Carlos","null","S/Mensura","Vigente","null","null"];
        $array[964] = [25,"La Cortaderita",50049,1153,"820-C-58",null,"Don Pancho","999",false,1,1,"Croce, Jose V","null","S/Mensura","Vigente","null","null"];
        $array[965] = [25,"La Cortaderita",50049,1345,"359-G-62",null,"El Cacique","Talco",false,2,2,"Marquet, Valeria Jimena","null","Mensurada","Vigente","null","null"];
        $array[966] = [25,"La Cortaderita",50049,2584,"119-J-1996",null,"Franco","994",true,1,2,"Aguas Dafalsene De Argentina Sa","null","S/Mensura","Vigente","null","null"];
        $array[967] = [25,"La Cortaderita",50049,1066,"773-P-60",null,"Franklin","1",false,1,6,"Prezioso, Gregorio H","null","Mensurada","Vigente","null","null"];
        $array[968] = [25,"La Cortaderita",50049,2812,"1005-A-1995",null,"Genius II","994*995*1",true,1,13,"Minera Río De La Plata S.A.","null","S/Mensura","Vacante","null","null"];
        $array[969] = [25,"La Cortaderita",50049,400,"2619-G-40",null,"Godoy","999",false,1,2,"Blanco, Roberto Manuel","null","Mensurada","Vacante","null","null"];
        $array[970] = [25,"La Cortaderita",50049,2403,"594-M-72",null,"Jorge","Talco",false,2,2,"Monllor, Josefa Femenia De","null","Mensurada","Vigente","null","null"];
        $array[971] = [25,"La Cortaderita",50049,1898,"566-F-63",null,"Jose Luis","Talco",false,2,1,"Monllor, Rafael Carlos","null","S/Mensura","Vigente","null","null"];
        $array[972] = [25,"La Cortaderita",50049,1293,"2609-M-2004",null,"Juan XxiiI","Talco",false,2,1,"Maref S.A.","null","Mensurada","Vigente","null","null"];
        $array[973] = [25,"La Cortaderita",50049,399,"350-A-46",null,"Juanita","1000",false,1,3,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[974] = [25,"La Cortaderita",50049,2779,"3464-E-2010",null,"Juanita 1","1",false,1,1,"Empire Canar S.A.","null","S/Mensura","Vigente","null","null"];
        $array[975] = [25,"La Cortaderita",50049,2781,"261-B-1994",null,"Juanita 11","1",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[976] = [25,"La Cortaderita",50049,2780,"3463-E-2010",null,"Juanita 4","1",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[977] = [25,"La Cortaderita",50049,402,"414-O-1946",null,"La Negrita (P 1/4)","994*1000",false,1,4,"Minera Cordillerana Sa","null","Mensurada","Vigente","null","null"];
        $array[978] = [25,"La Cortaderita",50049,1457,"293-G-66",null,"La Pepita","Talco",false,2,1,"Monllor, Alfredo","null","S/Mensura","Vigente","null","null"];
        $array[979] = [25,"La Cortaderita",50049,1233,"242-C-49",null,"La Raspa","Talco",false,2,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[980] = [25,"La Cortaderita",50049,1245,"362-T-58",null,"La Segunda","999",false,1,1,"Tellechea, Manuel","null","Mensurada","Vacante","null","null"];
        $array[981] = [25,"La Cortaderita",50049,408,"5205-Q-1942",null,"La Verde","994",false,1,4,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[982] = [25,"La Cortaderita",50049,2461,"64-B-88",null,"Loma Verde","Talco",false,2,1,"Berdasco, America Fernandez De","null","S/Mensura","Vigente","null","null"];
        $array[983] = [25,"La Cortaderita",50049,1492,"228-C-1996",null,"Los Alojamientos","1051",false,2,2,"D & D S.R.L.","null","Mensurada","Vacante Sol.,null","null"];
        $array[984] = [25,"La Cortaderita",50049,1278,"743-T-58",null,"Lucia Beatriz","Talco",false,2,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[985] = [25,"La Cortaderita",50049,2445,"245-P-88",null,"Makarena","1022",false,1,4,"Compañia Minera","null","Mensurada","Vigente","null","null"];
        $array[986] = [25,"La Cortaderita",50049,2410,"98-P-88",null,"Mafalselo","1022",false,1,1,"Pozo, Miguel","null","S/Mensura","Vigente","null","null"];
        $array[987] = [25,"La Cortaderita",50049,2579,"69-P-1988",null,"Manuel","Talco",false,2,1,"null","null","S/Mensura","Vacante Solic.,null","null"];
        $array[988] = [25,"La Cortaderita",50049,1556,"306-G-67",null,"Maria Eugenia","Talco",false,2,6,"Mill Srl","null","Mensurada","Vigente","null","null"];
        $array[989] = [25,"La Cortaderita",50049,1408,"638-M-65",null,"Maria Teresa","Talco",false,2,5,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[990] = [25,"La Cortaderita",50049,1279,"363-T-63",null,"Maribel","Talco",false,2,1,"Tellechea, Manuel","null","S/Mensura","Vigente","null","null"];
        $array[991] = [25,"La Cortaderita",50049,1935,"595-L-66",null,"Marisol","Talco",false,2,3,"null","null","Mensurada","Vigente","null","null"];
        $array[992] = [25,"La Cortaderita",50049,2465,"57-M-88",null,"Marisol II","Talco",false,2,1,"Monllor, Jorge Luis","null","S/Mensura","Vigente","null","null"];
        $array[993] = [25,"La Cortaderita",50049,1530,"111-M-1988",null,"falserita","Talco",false,2,5,"Monllor, Rafael Carlos Y Otros","null","Mensurada","Vigente","null","null"];
        $array[994] = [25,"La Cortaderita",50049,412,"513-U-46",null,"Osvaldo","Talco",false,2,1,"Compañia Minera Alico","null","S/Mensura","Vigente","null","null"];
        $array[995] = [25,"La Cortaderita",50049,2163,"378-G-76",null,"Pompeya","Talco",false,2,1,"Monllor, Rafael Carlos","null","S/Mensura","Vigente","null","null"];
        $array[996] = [25,"La Cortaderita",50049,2382,"10-P-88",null,"Pozo I","Talco",false,2,1,"Pozo, Juan","null","S/Mensura","Vigente","null","null"];
        $array[997] = [25,"La Cortaderita",50049,2384,"15-P-88",null,"Pozo IiI","Talco",false,2,1,"Pozo, Gladis Mora De","null","S/Mensura","Vigente","null","null"];
        $array[998] = [25,"La Cortaderita",50049,1971,"94-M-76",null,"Rafelet","1022",false,1,1,"Monllor, Rafael Carlos Y Otros","null","S/Mensura","Vigente","null","null"];
        $array[999] = [25,"La Cortaderita",50049,404,"3245-M-2007",null,"Rotterdam","994",false,1,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1000] = [25,"La Cortaderita",50049,2080,"67-P-71",null,"San Raymundo","1",false,1,1,"Prezioso, Gregorio H","null","Mensurada","Vigente","null","null"];
        $array[1001] = [25,"La Cortaderita",50049,2187,"153-G-75",null,"Stella","Talco",false,2,1,"Monllor, Alfredo","null","S/Mensura","Vigente","null","null"];
        $array[1002] = [25,"La Cortaderita",50049,2169,"132-G-77",null,"Tilito","Talco",false,2,1,"Berdasco, Adrian Raul","null","Mensurada","Vigente","null","null"];
        $array[1003] = [25,"La Cortaderita",50049,2446,"283-P-1961",null,"Virgen De Andacollo","1051",false,2,3,"Minera Virgen De Andacollo Sa","null","Mensurada","Vigente","null","null"];
        $array[1004] = [25,"La Cortaderita",50049,2446,"246-P-88",null,"Zekiel","1022",false,1,4,"Compañia Minera","null","Mensurada","Vigente","null","null"];
        $array[1005] = [26,"Yalguaraz",50049,2612,"318-Y-1993",null,"Alberto","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1006] = [26,"Yalguaraz",50049,2614,"320-G-1993",null,"Alejandro","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1007] = [26,"Yalguaraz",50049,0,"188-G-92",null,"Alfa","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1008] = [26,"Yalguaraz",50049,2623,"384-A-1995",null,"Algarrobo I","994*995*1",true,1,15,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1009] = [26,"Yalguaraz",50049,1327,"282-R-65",null,"Alicia","1",false,1,2,"Kodera, Elise Yuri","null","Mensurada","Vigente","null","null"];
        $array[1010] = [26,"Yalguaraz",50049,2675,"905-Z-1995",null,"Alicia","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1011] = [26,"Yalguaraz",50049,2535,"301-L-92",null,"Amalia","1",false,1,1,"Leguizamon, Maria Amalia","null","S/Mensura","Vigente","null","null"];
        $array[1012] = [26,"Yalguaraz",50049,2672,"908-N-1995",null,"Ana María","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1013] = [26,"Yalguaraz",50049,2634,"203-M-1992",null,"Ana María Teresa","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1014] = [26,"Yalguaraz",50049,2480,"273-P-1991",null,"Antena 1","995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1015] = [26,"Yalguaraz",50049,2481,"274-P-1991",null,"Antena 2","995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1016] = [26,"Yalguaraz",50049,2482,"275-P-91",null,"Antena 3","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1017] = [26,"Yalguaraz",50049,2568,"1009-A-1995",null,"Aurora I","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1018] = [26,"Yalguaraz",50049,2548,"196-C-92",null,"Beta","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1019] = [26,"Yalguaraz",50049,886,"283-V-58",null,"Blanca","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1020] = [26,"Yalguaraz",50049,2411,"48-T-88",null,"Carla","1022",false,1,6,"Tellechea, Manuel Y Ots","null","Mensurada","Vacante","null","null"];
        $array[1021] = [26,"Yalguaraz",50049,2620,"327-M-1993",null,"Carlos","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1022] = [26,"Yalguaraz",50049,2715,"2240-M-2001",null,"Casa Del Cobre","1",true,1,18,"null","null","S/Mensura","Vacante","null","null"];
        $array[1023] = [26,"Yalguaraz",50049,2613,"319-F-1993",null,"Celina","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1024] = [26,"Yalguaraz",50049,419,"229-M-43",null,"Cerro Blanco","Talco",false,2,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1025] = [26,"Yalguaraz",50049,888,"285-T-58",null,"Charito","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1026] = [26,"Yalguaraz",50049,1317,"284-R-65",null,"Claudia","1",false,1,2,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1027] = [26,"Yalguaraz",50049,572,"279-M-50",null,"Corrientes","Talco",false,2,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1028] = [26,"Yalguaraz",50049,2438,"01-M-88",null,"Corrientes II","Talco",false,2,1,"Monllor, Jorge Luis","null","S/Mensura","Vigente","null","null"];
        $array[1029] = [26,"Yalguaraz",50049,2474,"267-P-91",null,"Cortaderas 1","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1030] = [26,"Yalguaraz",50049,2475,"268-P-91",null,"Cortaderas 2","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1031] = [26,"Yalguaraz",50049,2473,"266-P-91",null,"Creston Amarillo","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1032] = [26,"Yalguaraz",50049,2487,"65-T-91",null,"Dana","1022",false,1,1,"Tellechea, Manuel","null","S/Mensura","Vigente","null","null"];
        $array[1033] = [26,"Yalguaraz",50049,2531,"224-A-92",null,"Daniel","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1034] = [26,"Yalguaraz",50049,1158,"645-R-61",null,"Dedy","994",false,1,3,"null","null","Mensurada","Vacante Sol.,null","null"];



        $array[1035] = [26,"Yalguaraz",50049,2736,"3-A-1996",null,"Delfín I","994*995*1",true,1,9,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1036] = [26,"Yalguaraz",50049,2728,"4-A-1996",null,"Delfín II","994*995*1",true,1,15,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1037] = [26,"Yalguaraz",50049,2549,"197-L-92",null,"Delta","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1038] = [26,"Yalguaraz",50049,1142,"11-L-62",null,"Don Jose","Talco",false,2,1,"Cema Saicf","null","Mensurada","Vigente","null","null"];
        $array[1039] = [26,"Yalguaraz",50049,887,"279-T-58",null,"Don Nestor","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1040] = [26,"Yalguaraz",50049,1442,"31-L-66",null,"Don Zoilo","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1041] = [26,"Yalguaraz",50049,2573,"386-A-1995",null,"Dumas","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1042] = [26,"Yalguaraz",50049,2630,"172-L-1992",null,"Eduardo Andrés","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1043] = [26,"Yalguaraz",50049,2477,"270-P-1991",null,"El Dique","995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1044] = [26,"Yalguaraz",50049,2553,"4333-A-14",null,"El Sol","1",false,1,6,"null","null","Mensurada","Vacante","null","null"];
        $array[1045] = [26,"Yalguaraz",50049,2632,"176-V-1992",null,"Elisea Beatriz","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1046] = [26,"Yalguaraz",50049,2618,"325-P-1993",null,"Eloisa","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1047] = [26,"Yalguaraz",50049,2669,"906-M-1995",null,"Emilia","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1048] = [26,"Yalguaraz",50049,2546,"194-V-92",null,"Eptruelon","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1049] = [26,"Yalguaraz",50049,1318,"285-R-65",null,"Ernestina","999",false,1,3,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1050] = [26,"Yalguaraz",50049,2671,"911-G-1995",null,"Ernesto","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1051] = [26,"Yalguaraz",50049,2597,"251-A-1993",null,"Facundo","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1052] = [26,"Yalguaraz",50049,420,"230-M-43",null,"Flor De Ceibo","Talco",false,2,1,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1053] = [26,"Yalguaraz",50049,1470,"208-M-66",null,"Flor De Ceibo N° 2","Talco",false,2,1,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[1054] = [26,"Yalguaraz",50049,1590,"6-M-67",null,"Flor De Ceibo N° 4","Talco",false,2,1,"Monllor, Josefa Femenia De","null","Mensurada","Vacante","null","null"];
        $array[1055] = [26,"Yalguaraz",50049,0,"186-B-92",null,"Gamma","1",false,1,1,"Barion, Mirta Beatriz","null","Mensurada","Vigente","null","null"];
        $array[1056] = [26,"Yalguaraz",50049,2607,"308-J-1993",null,"Gastón","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1057] = [26,"Yalguaraz",50049,2617,"324-A-1993",null,"Georgina","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1058] = [26,"Yalguaraz",50049,2555,"4331-A-14",null,"Germinal","1",false,1,7,"null","null","Mensurada","Vacante","null","null"];
        $array[1059] = [26,"Yalguaraz",50049,982,"1033-B-59",null,"Gioconda","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1060] = [26,"Yalguaraz",50049,2615,"321-T-1993",null,"Gladys","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1061] = [26,"Yalguaraz",50049,417,"3290-M-43",null,"Gran Capitan","Talco",false,2,1,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1062] = [26,"Yalguaraz",50049,1330,"549-M-62",null,"Gran Capitan IiI","Talco",false,2,1,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[1063] = [26,"Yalguaraz",50049,1546,"207-M-66",null,"Gran Capitan N° 4","Talco",false,2,1,"Monllor, Josefa Femenia De","null","Mensurada","Vigente","null","null"];
        $array[1064] = [26,"Yalguaraz",50049,1315,"283-R-65",null,"Guillermito","1",false,1,2,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1065] = [26,"Yalguaraz",50049,2598,"255-D-1993",null,"Gustavo 1","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];

        
        $array[1066] = [26,"Yalguaraz",50049,2609,"312-A-1993",null,"Gustavo 2","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1067] = [26,"Yalguaraz",50049,2727,"171-M-1992",null,"Hector","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];






        $array[1068] = [26,"Yalguaraz",50049,415,"81-M-42",null,"Hercules","Talco",false,2,3,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1069] = [26,"Yalguaraz",50049,1372,"554-M-62",null,"Hercules II","Talco",false,2,1,"Monllor, Josefa Femenia De","null","Mensurada","Vigente","null","null"];
        $array[1070] = [26,"Yalguaraz",50049,1380,"431-M-65",null,"Hercules IiI","Talco",false,2,1,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[1071] = [26,"Yalguaraz",50049,1574,"545-S-66",null,"Hercules Iv","Talco",false,2,1,"truen, Maria T M De","null","Mensurada","Vigente","null","null"];
        $array[1072] = [26,"Yalguaraz",50049,1687,"335-M-68",null,"Hercules VI","Talco",false,2,1,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1073] = [26,"Yalguaraz",50049,2532,"226-P-92",null,"Horacio","1",false,1,1,"Piccinini, Horacio","null","S/Mensura","Vigente","null","null"];
        $array[1074] = [26,"Yalguaraz",50049,2608,"311-P-1993",null,"Hugo","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1075] = [26,"Yalguaraz",50049,2537,"193-M-92",null,"Iota","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1076] = [26,"Yalguaraz",50049,1163,"376-B-62",null,"Isabel","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1077] = [26,"Yalguaraz",50049,2725,"173-G-1992",null,"Jorge Luis","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1078] = [26,"Yalguaraz",50049,2603,"177-C-1992",null,"Jorge Ricardo","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1079] = [26,"Yalguaraz",50049,2670,"317-E-1993",null,"José","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1080] = [26,"Yalguaraz",50049,1349,"834-T-1960",null,"Jupiter","Talco",false,2,1,"Tellechea, Manuel","null","S/Mensura","Vacante","null","null"];
        $array[1081] = [26,"Yalguaraz",50049,0,"192-E-92",null,"Kappa","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1082] = [26,"Yalguaraz",50049,422,"3347-L-43",null,"La Berdeana","Talco",false,2,2,"Panella, Carlos Mario","null","Mensurada","Vigente","null","null"];
        $array[1083] = [26,"Yalguaraz",50049,2556,"271-F-66",null,"La Campeona","1",false,1,3,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1084] = [26,"Yalguaraz",50049,468,"384-M-46",null,"La Escondida","Talco",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1085] = [26,"Yalguaraz",50049,455,"439-L-44",null,"La Jorgelina","Talco",false,2,2,"Gevaz Minera Sa","null","Mensurada","Vigente","null","null"];
        $array[1086] = [26,"Yalguaraz",50049,2554,"4332-A-14",null,"La Tierra","1",false,1,6,"null","null","Mensurada","Vacante","null","null"];
        $array[1087] = [26,"Yalguaraz",50049,2574,"51-A-1996",null,"Ladrillo I","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1088] = [26,"Yalguaraz",50049,0,"191-M-92",null,"Lambda","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1089] = [26,"Yalguaraz",50049,2602,"316-T-1993",null,"Leonardo","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1090] = [26,"Yalguaraz",50049,2667,"910-B-1995",null,"Liliana","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1091] = [26,"Yalguaraz",50049,894,"636-L-58",null,"Lorenzo IiI","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1092] = [26,"Yalguaraz",50049,2730,"310-F-1993",null,"Luis","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1093] = [26,"Yalguaraz",50049,2377,"19-T-88",null,"Luis Manuel Dos","1022",false,1,6,"Cia Min Tellechea, Manuel Y Ots","null","Mensurada","Vacante","null","null"];
        $array[1094] = [26,"Yalguaraz",50049,2633,"201-M-1992",null,"Luis falserberto","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1095] = [26,"Yalguaraz",50049,1159,"263-R-62",null,"Luisa","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1096] = [26,"Yalguaraz",50049,1141,"218-B-62",null,"Mafalselo I","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1097] = [26,"Yalguaraz",50049,1301,"10-C-62",null,"Margarita","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1098] = [26,"Yalguaraz",50049,1329,"281-R-65",null,"Maria Cecilia","1",false,1,2,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1099] = [26,"Yalguaraz",50049,2724,"204-M-1992",null,"María Guillermina","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1100] = [26,"Yalguaraz",50049,890,"287-T-58",null,"Maria Isabel","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1101] = [26,"Yalguaraz",50049,2733,"323-O-1993",null,"María Rosa","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1102] = [26,"Yalguaraz",50049,2775,"253-C-1993",null,"Mariafalse","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1103] = [26,"Yalguaraz",50049,2522,"204-P-90",null,"Mariela","994",false,1,1,"Pereyra, Andres Miguel","null","S/Mensura","Vigente","null","null"];
        $array[1104] = [26,"Yalguaraz",50049,2536,"302-D-92",null,"Mario","1",false,1,1,"De Pablos, Mario","null","S/Mensura","Vigente","null","null"];
        $array[1105] = [26,"Yalguaraz",50049,2611,"315-F-1993",null,"Martín","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1106] = [26,"Yalguaraz",50049,1313,"223-B-65",null,"Maruja","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1107] = [26,"Yalguaraz",50049,2646,"9-A-1996",null,"Mero II","994*995*1",true,1,9,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1108] = [26,"Yalguaraz",50049,2631,"175-B-1992",null,"Mirta Beatriz","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1109] = [26,"Yalguaraz",50049,1401,"302-C-63",null,"Mirtha","Talco",false,2,1,"Croce, Lia Lebricon De","null","Mensurada","Vacante","null","null"];
        $array[1110] = [26,"Yalguaraz",50049,2476,"269-P-1991",null,"Negra","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1111] = [26,"Yalguaraz",50049,2726,"205-E-1992",null,"Nieves Esther","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1112] = [26,"Yalguaraz",50049,1311,"224-L-65",null,"falserma","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1113] = [26,"Yalguaraz",50049,2547,"195-V-92",null,"Omega","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1114] = [26,"Yalguaraz",50049,2550,"190-M-92",null,"Omicron","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1115] = [26,"Yalguaraz",50049,2599,"254-C-1993",null,"Pablo","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1116] = [26,"Yalguaraz",50049,1957,"572-T-72",null,"Paloma","Talco",false,2,1,"Minerales Argentifalses Sa","null","S/Mensura","Vigente","null","null"];
        $array[1117] = [26,"Yalguaraz",50049,2472,"265-P-91",null,"Paramillos Centro","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1118] = [26,"Yalguaraz",50049,2610,"313-M-1993",null,"Pascuala","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1119] = [26,"Yalguaraz",50049,2616,"322-T-1993",null,"Pedro","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1120] = [26,"Yalguaraz",50049,1085,"2826-C-2005",null,"Perlita","Talco",false,2,1,"null","null","Mensurada","Vacante","null","null"];
        $array[1121] = [26,"Yalguaraz",50049,2605,"228-R-1993",null,"Porladu I","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1122] = [26,"Yalguaraz",50049,2604,"227-E-1993",null,"Porladu II","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1123] = [26,"Yalguaraz",50049,0,"3180-G-2006",null,"Quebrada Del Cobre","1*1000*1002",true,1,1,"Gramage, Rolando Nestor","null","S/Mensura","Vigente","null","null"];
        $array[1124] = [26,"Yalguaraz",50049,2601,"314-G-1993",null,"Raquel","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1125] = [26,"Yalguaraz",50049,2483,"276-P-91",null,"Remota","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1126] = [26,"Yalguaraz",50049,2537,"303-A-92",null,"Ricardo","1",false,1,1,"Auriemma, Ricardo Alfredo","null","S/Mensura","Vigente","null","null"];
        $array[1127] = [26,"Yalguaraz",50049,2606,"307-A-1993",null,"Roberto","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1128] = [26,"Yalguaraz",50049,2731,"174-G-1992",null,"Roberto Mario","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1129] = [26,"Yalguaraz",50049,2533,"230-F-92",null,"Rogelio","1",false,1,1,"Falloni, Eduardo Rogelio","null","S/Mensura","Vigente","null","null"];
        $array[1130] = [26,"Yalguaraz",50049,2619,"326-P-1993",null,"Roque","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1131] = [26,"Yalguaraz",50049,2600,"309-S-1993",null,"Rosa","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1132] = [26,"Yalguaraz",50049,2665,"145-C-1991",null,"Rosana","1",false,1,1,"Minera Del Oeste Srl","null","S/Mensura","Vigente","null","null"];
        $array[1133] = [26,"Yalguaraz",50049,2732,"5-A-1996",null,"Salmón I","994*995*1",true,1,15,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1134] = [26,"Yalguaraz",50049,2734,"6-A-1996",null,"Salmón II","994*995*1",true,1,12,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1135] = [26,"Yalguaraz",50049,2478,"271-P-1991",null,"San Bartolo 1","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1136] = [26,"Yalguaraz",50049,2479,"272-P-1991",null,"San Bartolo 2","994*995",false,1,1,"Gobierfalse De Mendoza Dgm","null","S/Mensura","Vigente","null","null"];
        $array[1137] = [26,"Yalguaraz",50049,416,"789-M-1959",null,"San Jorge","1",false,1,5,"Minera San Jorge S.A.","null","Mensurada","Vigente","null","null"];
        $array[1138] = [26,"Yalguaraz",50049,1102,"9-M-62",null,"San Jorge Segunda","1",false,1,7,"Minera San Jorge S.A.","null","Mensurada","Vigente","null","null"];
        $array[1139] = [26,"Yalguaraz",50049,456,"337-L-44",null,"Santo De La Quebrada","Talco",false,2,2,"Bobillos Minerales Sa P/ Quiebra","null","Mensurada","Vigente","null","null"];
        $array[1140] = [26,"Yalguaraz",50049,"Mina","189-M-92",null,"truegma","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1141] = [26,"Yalguaraz",50049,2596,"249-A-1993",null,"truelvia","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1142] = [26,"Yalguaraz",50049,2570,"230-A-1996",null,"Softy II","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1143] = [26,"Yalguaraz",50049,2534,"300-G-92",null,"Sonia","1",false,1,1,"Gordini, Sonia Bonita","null","S/Mensura","Vigente","null","null"];
        $array[1144] = [26,"Yalguaraz",50049,2580,"1016-A-1995",null,"Spyn I","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1145] = [26,"Yalguaraz",50049,0,"2975-M-2005",null,"Surubí","994*995*1",true,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1146] = [26,"Yalguaraz",50049,2547,"187-G-92",null,"Theta","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1147] = [26,"Yalguaraz",50049,2576,"1021-A-1995",null,"Urafalse I","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1148] = [26,"Yalguaraz",50049,2581,"1022-A-1995",null,"Urafalse II","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1149] = [26,"Yalguaraz",50049,837,"281-T-58",null,"Valeria","Talco",false,2,1,"Guerrero, Enrique Darío","null","Mensurada","Vigente","null","null"];
        $array[1150] = [26,"Yalguaraz",50049,2673,"907-M-1995",null,"Varadero","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1151] = [26,"Yalguaraz",50049,2668,"909-R-1995",null,"Víctor","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1152] = [26,"Yalguaraz",50049,2735,"328-G-1993",null,"Viviana","1",false,1,1,"Minera San Jorge Sa","null","S/Mensura","Vigente","null","null"];
        $array[1153] = [26,"Yalguaraz",50049,1341,"172-L-62",null,"WallI","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1154] = [26,"Yalguaraz",50049,884,"284-C-58",null,"Walter","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1155] = [26,"Yalguaraz",50049,2621,"202-V-1992",null,"Willy Roberto","1",false,1,1,"Minera San Jorge Sa","null","Mensurada","Vigente","null","null"];
        $array[1156] = [26,"Yalguaraz",50049,418,"3291-M-43",null,"Yalguaraz","Talco",false,2,2,"Monllor, Rafael Carlos","null","Mensurada","Vigente","null","null"];
        $array[1157] = [26,"Yalguaraz",50049,1006,"608-R-61",null,"Yalguaraz N° 1","1",false,1,3,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1158] = [26,"Yalguaraz",50049,1008,"607-R-61",null,"Yalguaraz N° 2","1",false,1,2,"null","null","Mensurada","Vacante Sol.,null","null"];
        $array[1159] = [26,"Yalguaraz",50049,1477,"209-M-66",null,"Yalguaraz N° 2","Talco",false,2,1,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[1160] = [26,"Yalguaraz",50049,1479,"551-M-62",null,"Yalguaraz N° 3","Talco",false,2,1,"Monllor, Alfredo","null","Mensurada","Vigente","null","null"];
        $array[1161] = [26,"Yalguaraz",50049,1427,"30-V-66",null,"YolI","Talco",false,2,1,"Cetel Minera Saic","null","Mensurada","Vigente","null","null"];
        $array[1162] = [26,"Yalguaraz",50049,2569,"1018-A-1995",null,"Zancho II","994*995*1",true,1,1,"Argentina Mineral Development S.A.","null","S/Mensura","Vigente","null","null"];
        $array[1163] = [27,"Las Cuevas",50049,2172,"34-E-81",null,"Andacollo","1",false,1,2,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1164] = [27,"Las Cuevas",50049,1480,"282-S-70",null,"Claudia","1051",false,2,1,"Someca Sa","null","S/Mensura","Vigente","null","null"];
        $array[1165] = [27,"Las Cuevas",50049,1435,"381-S-70",null,"Claudia II","1051",false,2,1,"Santecchia Alejandro P.","null","S/Mensura","Vigente","null","null"];
        $array[1166] = [27,"Las Cuevas",50049,1423,"382-S-70",null,"Claudia IiI","1051",false,2,1,"Someca Sa","null","S/Mensura","Vigente","null","null"];
        $array[1167] = [27,"Las Cuevas",50049,1747,"383-S-70",null,"Claudia Iv","1051",false,2,1,"Someca Sa","null","S/Mensura","Vigente","null","null"];
        $array[1168] = [27,"Las Cuevas",50049,0,"68-Z-88",null,"Deseada","994",false,1,6,"Pollicifalse Antonio Y Maidana Antonio","null","Mensurada","Vigente","null","null"];
        $array[1169] = [27,"Las Cuevas",50049,1422,"279-P-76",null,"Don Emilio","1051",false,2,7,"Vial Minera Sa","null","Mensurada","Vigente","null","null"];
        $array[1170] = [27,"Las Cuevas",50049,1448,"380-S-70",null,"Don Pedro","1051",false,2,1,"Someca Sa","null","S/Mensura","Vigente","null","null"];
        $array[1171] = [27,"Las Cuevas",50049,2250,"375-C-47",null,"Eduardo","Sulfato De Sodio",false,2,3,"Aguilar, Jose Ned","null","Mensurada","Vigente","null","null"];
        $array[1172] = [27,"Las Cuevas",50049,516,"107-G-66",null,"Eduardo Cuatro","1051",false,2,1,"Guembe, Roberto","null","Mensurada","Vigente","null","null"];
        $array[1173] = [27,"Las Cuevas",50049,512,"108-S-66",null,"Eduardo Dos","1051",false,2,1,"Santos, Blas L","null","Mensurada","Vigente","null","null"];
        $array[1174] = [27,"Las Cuevas",50049,0,"137-F-66",null,"Eduardo Iv","1051",false,2,1,"Fábrega Juana","null","Mensurada","Vigente","null","null"];
        $array[1175] = [27,"Las Cuevas",50049,0,"109-A-66",null,"Eduardo Ufalse","1051",false,2,1,"Adaro, Heriberto","null","Mensurada","Vigente","null","null"];
        $array[1176] = [27,"Las Cuevas",50049,447,"85-R-81",null,"El Alacran","Tierras truelicosas",false,2,1,"Roco Víctor Hugo","null","S/Mensura","Vigente","null","null"];
        $array[1177] = [27,"Las Cuevas",50049,432,"572-V-44",null,"El Jorge","1051",false,2,1,"Vargas Galindez, Federico","null","Mensurada","Vigente","null","null"];
        $array[1178] = [27,"Las Cuevas",50049,2173,"41-P-81",null,"Esther Lidia","Talco",false,2,1,"Peñaloza, Enrique","null","S/Mensura","Vigente","null","null"];
        $array[1179] = [27,"Las Cuevas",50049,2247,"4018-W-28",null,"General San Martin","Sulfato De Sodio",false,2,3,"Aguilar, Jose Ned","null","Mensurada","Vigente","null","null"];
        $array[1180] = [27,"Las Cuevas",50049,0,"100937-54",null,"Hugo","Sales Alcalinas",false,2,2,"Fábrega, José Eloy","null","Mensurada","Vigente","null","null"];
        $array[1181] = [27,"Las Cuevas",50049,2027,"35-E-81",null,"Juditas","Talco",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1182] = [27,"Las Cuevas",50049,1449,"2387-K-2002",null,"La Campeona","1",false,1,3,"null","null","Mensurada","Vacante","null","null"];
        $array[1183] = [27,"Las Cuevas",50049,2171,"49-E-81",null,"La Chiquita","1",false,1,3,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1184] = [27,"Las Cuevas",50049,2039,"46-E-81",null,"La Negrita","Talco",false,2,3,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1185] = [27,"Las Cuevas",50049,2043,"33-B-81",null,"La Sanjuanina","Talco",false,2,2,"Baquedafalse, Antonio","null","Mensurada","Vigente","null","null"];
        $array[1186] = [27,"Las Cuevas",50049,1921,"62-R-79",null,"La Tarantula","Tierras truelicosas",false,2,4,"Roco,Ernesto Y Otro","null","Mensurada","Vigente","null","null"];
        $array[1187] = [27,"Las Cuevas",50049,2040,"48-C-81",null,"Los Azules","1",false,1,3,"null","null","Mensurada","Vacante","null","null"];
        $array[1188] = [27,"Las Cuevas",50049,2042,"51-M-81",null,"Los Tres Antonio","Baritina",false,2,2,"Martinez, Juan Roberto","null","Mensurada","Vigente","null","null"];
        $array[1189] = [27,"Las Cuevas",50049,423,"862-C-27",null,"Mantos De Cobre","1",false,1,6,"Electroquímica Mendocina S.A.","null","Mensurada","Vigente","null","null"];
        $array[1190] = [27,"Las Cuevas",50049,2248,"4128-O-19",null,"Maria Luisa","Sulfato De Sodio",false,2,1,"Intzaugarat Alfredo Y Otro","null","Mensurada","Vigente","null","null"];
        $array[1191] = [27,"Las Cuevas",50049,2249,"4129-O-19",null,"Martha","Sulfato De Sodio",false,2,1,"Aguilar, Jose Ned","null","Mensurada","Vigente","null","null"];
        $array[1192] = [27,"Las Cuevas",50049,1936,"45-E-81",null,"Mina Faustina","Baritina",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1193] = [27,"Las Cuevas",50049,2174,"114-A-83",null,"Nelly","1000",false,1,6,"Minera Aconcagua","null","Mensurada","Vigente","null","null"];
        $array[1194] = [27,"Las Cuevas",50049,584,"376-N-70",null,"Nelly Susana","1051",false,2,1,"Cia Minera Ci-Be","null","Mensurada","Vigente","null","null"];
        $array[1195] = [27,"Las Cuevas",50049,436,"296-R-47",null,"Nelly Susana II","1051",false,2,1,"Cia De Minas Ci-Be","null","S/Mensura","Vigente","null","null"];
        $array[1196] = [27,"Las Cuevas",50049,439,"295-C-47",null,"Nelly Susana IiI","1051",false,2,1,"Santecchia Alejandro P.","null","Mensurada","Vigente","null","null"];
        $array[1197] = [27,"Las Cuevas",50049,434,"299-V-49",null,"Nelly Susana Iv","1051",false,2,1,"Someca Sa","null","Mensurada","Vigente","null","null"];
        $array[1198] = [27,"Las Cuevas",50049,441,"101022-54",null,"Nucha","1052",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1199] = [27,"Las Cuevas",50049,0,"39-H-45",null,"Nueva Cardiff","Carbon",false,1,5,"Fábrega, José Eloy","null","Mensurada","Vigente","null","null"];
        $array[1200] = [27,"Las Cuevas",50049,0,"374-P-95",null,"Numero Cuatro","994",false,1,3,"Drey, Juan C Y Ot","null","Mensurada","Vigente","null","null"];
        $array[1201] = [27,"Las Cuevas",50049,440,"443-C-50",null,"Oscarcito","999",false,1,2,"Nuclear Mendoza Se","null","Mensurada","Vigente","null","null"];
        $array[1202] = [27,"Las Cuevas",50049,2175,"147-D-84",null,"Paramillos falserte I","1",false,1,2,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1203] = [27,"Las Cuevas",50049,2176,"147-D-84",null,"Paramillos falserte II","1",false,1,2,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1204] = [27,"Las Cuevas",50049,2177,"147-D-84",null,"Paramillos Sur II","1",false,1,3,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1205] = [27,"Las Cuevas",50049,2178,"147-D-84",null,"Paramillos Sur IiI","1",false,1,3,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1206] = [27,"Las Cuevas",50049,2041,"50-E-81",null,"Paulito","Talco",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vigente","null","null"];
        $array[1207] = [27,"Las Cuevas",50049,0,"110-R-72",null,"Polvorin Ufalse","Tierras truelicosas",false,2,2,"Roco, Ernesto","null","Mensurada","Vigente","null","null"];
        $array[1208] = [27,"Las Cuevas",50049,1145,"75-C-74",null,"Salagasta","1051",false,2,1,"Someca Sa","null","S/Mensura","Vigente","null","null"];
        $array[1209] = [27,"Las Cuevas",50049,1449,"68-Z-88",null,"Salvadora","994",false,1,7,"Quiroga, Carlos Enrique","null","Mensurada","Vigente","null","null"];
        $array[1210] = [27,"Las Cuevas",50049,424,"207-G-09",null,"San Antonio","1",false,1,4,"Jose Cartellone Const Civiles Sa","null","Mensurada","Vigente","null","null"];
        $array[1211] = [27,"Las Cuevas",50049,0,"1048-D-39",null,"San Eduardo","1051",false,2,7,"Fábrega, José Eloy","null","Mensurada","Vigente","null","null"];
        $array[1212] = [27,"Las Cuevas",50049,2112,"47-E-81",null,"San Martin","Talco",false,2,2,"Minera Cema Saicyf","null","Mensurada","Vigente","null","null"];
        $array[1213] = [27,"Las Cuevas",50049,658,"114-S-69",null,"Stelita","1051",false,2,6,"Marang, Luis Humberto","null","Mensurada","Vigente","null","null"];
        $array[1214] = [27,"Las Cuevas",50049,569,"301-S-66",null,"Susana","1051",false,2,1,"Sargo, Alberto","null","Mensurada","Vigente","null","null"];
        $array[1215] = [27,"Las Cuevas",50049,2181,"3445-B-40",null,"Union I","Sulfato De Sodio",false,2,1,"Quimica Minera Encon Srl","null","Mensurada","Vigente","null","null"];
        $array[1216] = [27,"Las Cuevas",50049,2204,"349-P-46",null,"Union II","Sulfato De Sodio",false,2,1,"Benito, Florentifalse","null","Mensurada","Vigente","null","null"];
        $array[1217] = [27,"Las Cuevas",50049,445,"283-P-61",null,"Virgen De Andacollo","1051",false,2,3,"Minera Virgen De Andacollo Sa","null","Mensurada","Vigente","null","null"];
        $array[1218] = [28,"El Carrizalito",50049,437,"39-P-1992",null,"Al Fin Hallada","994",false,1,6,"Pollicifalse Antonio Y Maidana Antonio","null","Mensurada","Vigente","null","null"];
        $array[1219] = [28,"El Carrizalito",50049,2697,"357-O-1993",null,"Alelí","1",false,1,1,"Olivares Graciela A.","null","S/Mensura","Vigente","null","null"];
        $array[1220] = [28,"El Carrizalito",50049,2637,"14-G-1993",null,"Algarrobo","1",false,1,1,"Schawartz, Arthur L.","null","S/Mensura","Vigente","null","null"];
        $array[1221] = [28,"El Carrizalito",50049,2773,"368-M-1993",null,"Amapola","1",false,1,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1222] = [28,"El Carrizalito",50049,2180,"34-E-1981",null,"Andacollo","1",false,1,2,"null","null","Mensurada","Vacante","null","null"];
        $array[1223] = [28,"El Carrizalito",50049,2676,"376-T-1993",null,"Azalea","1",false,1,1,"Tortoza, Claudia Del Vallle","null","S/Mensura","Vigente","null","null"];
        $array[1224] = [28,"El Carrizalito",50049,2042,"282-S-1970",null,"Claudia","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1225] = [28,"El Carrizalito",50049,2039,"382-S-1970",null,"Claudia IiI","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1226] = [28,"El Carrizalito",50049,2043,"383-S-1970",null,"Claudia Iv","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1227] = [28,"El Carrizalito",50049,2703,"369-O-1993",null,"Clavel","1",false,1,1,"Olivares Humberto N.","null","S/Mensura","Vigente","null","null"];
        $array[1228] = [28,"El Carrizalito",50049,2699,"363-G-1993",null,"Crisantemo","1",false,1,1,"Giudici Jorge E.Daniel","null","S/Mensura","Vigente","null","null"];
        $array[1229] = [28,"El Carrizalito",50049,2704,"370-S-1993",null,"Dalia","1",false,1,1,"Saez Elsa Amanda","null","S/Mensura","Vigente","null","null"];
        $array[1230] = [28,"El Carrizalito",50049,439,"68-Z-1988",null,"Deseada","994",false,1,6,"Pollicifalse Antonio Y Maidana Antonio","null","Mensurada","Vigente","null","null"];
        $array[1231] = [28,"El Carrizalito",50049,2027,"304-V-1992",null,"Don Emilio","1051",false,2,7,"Chacón De Drey, Graciela","null","Mensurada","Vigente","null","null"];
        $array[1232] = [28,"El Carrizalito",50049,2041,"380-S-1970",null,"Don Pedro","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1233] = [28,"El Carrizalito",50049,1423,"107-G-1966",null,"Eduardo Cuatro","1051",false,2,1,"null","null","Mensurada","Vacante","null","null"];
        $array[1234] = [28,"El Carrizalito",50049,1448,"137-F-1966",null,"Eduardo Iv","1051",false,2,1,"Fábrega Juana","null","Mensurada","Vacante","null","null"];
        $array[1235] = [28,"El Carrizalito",50049,1435,"109-A-1966",null,"Eduardo Ufalse","1051",false,2,1,"null","null","Mensurada","Vacante Solic.,null","null"];
        $array[1236] = [28,"El Carrizalito",50049,445,"572-V-1944",null,"El Jorge","1051",false,2,1,"null","null","Mensurada","Vacante","null","null"];
        $array[1237] = [28,"El Carrizalito",50049,2799,"358-G-1993",null,"Ernesto","1",true,1,1,"Giudici Jorge E.Daniel","null","S/Mensura","Vigente","null","null"];
        $array[1238] = [28,"El Carrizalito",50049,2181,"41-P-1981",null,"Esther Lidia","Talco",false,2,1,"Peñaloza, Enrique","null","S/Mensura","null,null","null"];
        $array[1239] = [28,"El Carrizalito",50049,2718,"570-R-1996",null,"Gabriela","994",true,1,1,"Aguas Dafalsene De Argentina Sa","null","S/Mensura","Vigente","null","null"];
        $array[1240] = [28,"El Carrizalito",50049,2701,"365-T-1993",null,"Jazmín","1",false,1,1,"Trabert David W.","null","S/Mensura","Vigente","null","null"];
        $array[1241] = [28,"El Carrizalito",50049,511,"297-E-1947",null,"Jorge II","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1242] = [28,"El Carrizalito",50049,2172,"35-E-1981",null,"Juditas","Talco",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vacante","null","null"];
        $array[1243] = [28,"El Carrizalito",50049,2179,"49-E-1981",null,"La Chiquita","1",false,1,3,"Peñaloza, Enrique","null","Mensurada","Vacante","null","null"];
        $array[1244] = [28,"El Carrizalito",50049,2173,"46-E-1981",null,"La Negrita","Talco",false,2,3,"Peñaloza, Enrique","null","Mensurada","Vacante","null","null"];
        $array[1245] = [28,"El Carrizalito",50049,2177,"33-B-1981",null,"La Sanjuanina","Talco",false,2,2,"Baquedafalse, Antonio","null","Mensurada","Vacante","null","null"];
        $array[1246] = [28,"El Carrizalito",50049,2112,"62-R-1979",null,"La Tarántula","Tierras truelicosas",false,2,4,"Roco,Ernesto Y Otro","null","Mensurada","Vigente","null","null"];
        $array[1247] = [28,"El Carrizalito",50049,2678,"378-T-1993",null,"Lirio","1",false,1,1,"Filizzola, Carlos","null","S/Mensura","Vigente","null","null"];
        $array[1248] = [28,"El Carrizalito",50049,2176,"51-M-1981",null,"Los Tres Antonios","Baritina",false,2,2,"Martínez, Juan Roberto","null","Mensurada","Vigente","null","null"];
        $array[1249] = [28,"El Carrizalito",50049,434,"862-C-1927",null,"Mantos De Cobre","1",false,1,6,"Electroquímica Mendocina S.A.","null","Mensurada","Vigente","null","null"];
        $array[1250] = [28,"El Carrizalito",50049,2776,"371-G-1993",null,"Margarita","1*994",false,1,1,"Giudici Jorge Alberto","null","S/Mensura","Vigente","null","null"];
        $array[1251] = [28,"El Carrizalito",50049,2171,"45-E-1981",null,"Mina Faustina","Baritina",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vacante","null","null"];
        $array[1252] = [28,"El Carrizalito",50049,2702,"367-E-1993",null,"Narciso","1",false,1,1,"Egües  Alejandro E.","null","S/Mensura","Vigente","null","null"];
        $array[1253] = [28,"El Carrizalito",50049,2204,"114-A-1983",null,"Nelly","1000",false,1,6,"Cía. Minera Aconcagua","null","Mensurada","Vigente","null","null"];
        $array[1254] = [28,"El Carrizalito",50049,569,"295-C-1947",null,"Nelly  Susana IiI","1051",false,2,1,"Santecchia Alejandro P.","null","Mensurada","Vigente","null","null"];
        $array[1255] = [28,"El Carrizalito",50049,512,"299-V-1949",null,"Nelly  Susana Iv","1051",false,2,1,"Someca Sa","null","Mensurada","Vigente","null","null"];
        $array[1256] = [28,"El Carrizalito",50049,1747,"376-M-1970",null,"Nelly Susana","1051",false,2,1,"null","null","Mensurada","Vacante","null","null"];
        $array[1257] = [28,"El Carrizalito",50049,516,"16-C-1978",null,"Nelly Susana II","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1258] = [28,"El Carrizalito",50049,441,"104-F-1906",null,"Nueva Cardiff","Carbón",false,1,5,"Fábrega, José Eloy","null","Mensurada","Vacante","null","null"];
        $array[1259] = [28,"El Carrizalito",50049,440,"2689-S-2004",null,"Numero Cuatro","994",false,1,3,"Sottafalse Martín Claudio","null","Mensurada","Vigente","null","null"];
        $array[1260] = [28,"El Carrizalito",50049,2700,"364-S-1993",null,"Orquídea","1",false,1,1,"Sanchez Oscar A.","null","S/Mensura","Vigente","null","null"];
        $array[1261] = [28,"El Carrizalito",50049,584,"443-C-1950",null,"Oscarcito","999",false,1,2,"Nuclear Mendoza Se","null","Mensurada","Vigente","null","null"];
        $array[1262] = [28,"El Carrizalito",50049,2247,"26-C-1992",null,"Paramillos falserte I","1",true,1,2,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1263] = [28,"El Carrizalito",50049,2248,"26-C-1992",null,"Paramillos falserte II","1",true,1,2,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1264] = [28,"El Carrizalito",50049,2249,"25-C-1992",null,"Paramillos Sur II","1",true,1,3,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1265] = [28,"El Carrizalito",50049,2250,"25-C-1992",null,"Paramillos Sur IiI","1",true,1,3,"Minera Del Oeste Srl","null","Mensurada","Vigente","null","null"];
        $array[1266] = [28,"El Carrizalito",50049,2677,"377-T-1993",null,"Patrueonaria","1",false,1,1,"Tortoza, Mario A.","null","S/Mensura","Vigente","null","null"];
        $array[1267] = [28,"El Carrizalito",50049,2175,"50-E-1981",null,"Paulito","Talco",false,2,2,"Peñaloza, Enrique","null","Mensurada","Vacante","null","null"];
        $array[1268] = [28,"El Carrizalito",50049,2807,"356-G-1993",null,"Pensamiento","1*994",false,1,1,"Gemuts, Ilmar","null","S/Mensura","Vigente","null","null"];
        $array[1269] = [28,"El Carrizalito",50049,2705,"374-T-1993",null,"Petunia","1",false,1,1,"Tortoza, Alejandro","null","S/Mensura","Vigente","null","null"];
        $array[1270] = [28,"El Carrizalito",50049,1936,"75-C-1974",null,"Salagasta","1051",false,2,1,"null","null","S/Mensura","Vacante","null","null"];
        $array[1271] = [28,"El Carrizalito",50049,438,"2844-M-2005",null,"Salvadora","994",false,1,7,"Sottafalse, María José Carolina","null","Mensurada","Vigente","null","null"];
        $array[1272] = [28,"El Carrizalito",50049,436,"207-G-2009",null,"San Antonio","1",false,1,4,"Guerrero, Enrique Darío","null","Mensurada","Vigente","null","null"];
        $array[1273] = [28,"El Carrizalito",50049,432,"1084-D-1939",null,"San Eduardo","1051",false,2,7,"Fábrega, José Eloy","null","Mensurada","Vigente","null","null"];
        $array[1274] = [28,"El Carrizalito",50049,2698,"362-O-1993",null,"Tulipán","1",false,1,1,"Olivares Betina C","null","S/Mensura","Vigente","null","null"];
        $array[1275] = [28,"El Carrizalito",50049,2806,"375-V-1993",null,"Violeta","1*994",false,1,1,"Vedia, Marìa Angèlica","null","S/Mensura","Vigente","null","null"];
        $array[1276] = [29,"San Miguel",50056,449,"3534-D-2010",null,"General San Martín","Sulfato De Sodio",false,2,3,"Domanico Eduardo A.","null","Mensurada","Vigente","null","null"];
        $array[1277] = [29,"San Miguel",50056,659,"100937-54",null,"Hugo","Sales Alcalinas",false,2,2,"Fábrega, José Eloy","null","Mensurada","Vacante","null","null"];
        $array[1278] = [29,"San Miguel",50056,451,"585-T-1940",null,"María Luisa","Sulfato De Sodio",false,2,1,"Intzaugarat Alfredo Y Otro","null","Mensurada","Vigente","null","null"];
        $array[1279] = [29,"San Miguel",50056,452,"4129-O-1919",null,"Martha","Sulfato De Sodio",false,2,1,"Díaz, Alejandro Abel","null","Mensurada","Vigente","null","null"];
        $array[1280] = [29,"San Miguel",50056,1953,"110-R-1972",null,"Polvorín Ufalse","Tierras truelicosas",false,2,2,"null","null","Mensurada","Vacante Solic,null","null"];
        $array[1281] = [29,"San Miguel",50056,447,"304-Q-1967",null,"Unión I","Sulfato De Sodio",false,2,1,"Quimica Minera Encon Srl","null","Mensurada","Vigente","null","null"];
        $array[1282] = [29,"San Miguel",50056,448,"349-P-1946",null,"Unión II","Sulfato De Sodio",false,2,1,"null","null","Mensurada","Vacante","null","null"];
        $array[1283] = [0,"null",null,2199,"85-R-1981",null,"El Alacrán","Tierras truelicosas",false,2,1,"Roco Víctor Hugo","null","null,Vigente","null","null"];
        $array[1284] = [0,"null",null, 50049,0,"3004-M-2005",null,"Hendy","994*995*1",false,0,0,"Minera Río De La Plata S.A.","null","null,null,null","false Encontrado"];
        $array[1285] = [1,"El Sosneado",50105,2856,"2547-M-2003",null,"Nueva Frontera","1*994",true,1,1,"null","null","S/Mensura","Vacante","inactiva","null"];

		//dd("hola");

		for ($i = 1; $i <= 894; $i++) {
			//$array[$i]
			//PASO 1
			if ($i == 549)
				continue;
			var_dump("voy por la vuelta: " . $i . "\n\n");

			//dd( intval($array[554][2]));

			//dd($array[$i][12]);
			$formulario_provisorio = new FormAltaProductor();
			$formulario_provisorio->razonsocial = $array[$i][11];
			$formulario_provisorio->email = $faker->email();
			$formulario_provisorio->cuit = $array[$i][12];
			$formulario_provisorio->numeroproductor = $i;
			$formulario_provisorio->tiposociedad = 'S.A.';
			$formulario_provisorio->constaciasociedad = null;
			$formulario_provisorio->inscripciondgr = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->estado = "borrador";
			$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->created_by = Auth::user()->id;
			$formulario_provisorio->provincia = 50;
			$resultado = $formulario_provisorio->save();

			//dd($resultado);
			//Paso 2 

			$formulario_provisorio->leal_calle = null;
			$formulario_provisorio->leal_numero = null;
			$formulario_provisorio->leal_telefono = null;
			$formulario_provisorio->leal_provincia = 50;
			$formulario_provisorio->leal_departamento = intval($array[$i][2]);
			$formulario_provisorio->leal_localidad = $array[$i][1];
			$formulario_provisorio->leal_cp = null;
			$formulario_provisorio->leal_otro = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_paso_dos = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();

			//paso 3 
			$formulario_provisorio->administracion_calle = null;
			$formulario_provisorio->administracion_numero = null;
			$formulario_provisorio->administracion_telefono = null;
			$formulario_provisorio->administracion_pais = null;
			$formulario_provisorio->administracion_provincia = 50;
			$formulario_provisorio->administracion_departamento = $array[$i][2];
			$formulario_provisorio->administracion_localidad = $array[$i][1];
			$formulario_provisorio->administracion_cp = null;
			$formulario_provisorio->administracion_otro = null;
			$formulario_provisorio->updated_paso_tres = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();


			//PASO 4
			if ($array[$i][9] == 1) {
				$nombre_mina = 'Mina';
				$categoria = 'primera';
			} elseif ($array[$i][9] == 2) {
				$nombre_mina = 'Mina';
				$categoria = 'segunda';
			} else {
				$nombre_mina = 'Cantera';
				$categoria = 'tercera';
			}
			$formulario_provisorio->numero_expdiente = $array[$i][4];
			$formulario_provisorio->categoria = $categoria;
			$formulario_provisorio->nombre_mina = $array[$i][6];
			$formulario_provisorio->descripcion_mina = null;
			$formulario_provisorio->distrito_minero = $array[$i][0];
			$formulario_provisorio->mina_cantera = $nombre_mina;
			$formulario_provisorio->resolucion_concesion_minera = null;
			$formulario_provisorio->titulo_contrato_posecion = null;
			$formulario_provisorio->plano_inmueble = null;
			$formulario_provisorio->titulo_contrato_posecion = null;
			$formulario_provisorio->resolucion_concesion_minera = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			//escribir minerales
			/*
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
				}*/

			//Paso 5
			$formulario_provisorio->owner = null;
			$formulario_provisorio->arrendatario = null;
			$formulario_provisorio->concesionario = null;
			$formulario_provisorio->sustancias_de_aprovechamiento_comun = 0;
			$formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion = null;
			$formulario_provisorio->otros = 0;
			$formulario_provisorio->otro_caracter_acalaracion = null;
			$formulario_provisorio->constancia_pago_canon = null;
			$formulario_provisorio->iia = null;
			$formulario_provisorio->dia = null;
			$formulario_provisorio->acciones_a_desarrollar = $array[$i][13];
			$actividad = null;
			if (isset($array[$i][15]))
				$actividad = $array[$i][15];
			$formulario_provisorio->actividad = $actividad;
			$formulario_provisorio->fecha_alta_dia = null;
			$formulario_provisorio->fecha_vencimiento_dia = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();


			//Paso 6
			$formulario_provisorio->localidad_mina_pais = null;
			$formulario_provisorio->localidad_mina_provincia = 50;
			$formulario_provisorio->localidad_mina_departamento =  $array[$i][2];
			$formulario_provisorio->localidad_mina_localidad = $array[$i][1];
			$formulario_provisorio->tipo_sistema = null;
			$formulario_provisorio->longitud = null;
			$formulario_provisorio->latitud =  null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_paso_seis = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();

			$formulario_provisorio->estado = "aprobado";
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();









			//parto el string de minerales
			$mineralesACargar = explode("*", $array[$i][7]);
			for ($y = 0; $y < count($mineralesACargar); $y++) {
				//dd(count($mineralesACargar), $mineralesACargar, $y, $mineralesACargar[$y]);
				$nuevo_min = new Minerales_Borradores();
				$nuevo_min->id_formulario = $formulario_provisorio->id;
				$nuevo_min->id_mineral = $mineralesACargar[$y];
				$nuevo_min->lugar_donde_se_encuentra = null;
				$nuevo_min->variedad = null;
				$nuevo_min->segunda_cat_mineral_explotado = null;
				$nuevo_min->mostrar_lugar_segunda_cat = null;
				$nuevo_min->mostrar_otro_mineral_segunda_cat = null;
				$nuevo_min->otro_mineral_segunda_cat = null;
				$nuevo_min->observacion = null;
				$nuevo_min->clase_text_area_presentacion = null;
				$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = null;
				$nuevo_min->texto_validacion_text_area_presentacion = null;
				$nuevo_min->presentacion_valida = null;
				$nuevo_min->evaluacion_correcto = null;
				$nuevo_min->observacion_autoridad = null;
				$nuevo_min->clase_text_area = null;
				$nuevo_min->clase_text_evaluacion_de_text_area = null;
				$nuevo_min->texto_validacion_text_area = null;
				$nuevo_min->obs_valida = null;
				$nuevo_min->lista_de_minerales_array = '';
				$nuevo_min->thumb = null;
				$nuevo_min->created_by = Auth::user()->id;
				$nuevo_min->estado = "aprobado";
				$nuevo_min->updated_by =  Auth::user()->id;

				$nuevo_min->created_at = null; //date("Y-m-d H:i:s");
				$nuevo_min->updated_at = null; //date("Y-m-d H:i:s");

				$nuevo_min->save();
			}

			/*Mail::to($email_a_mandar)->send(new AvisoFormularioAprobadoEmail(
					$formulario_provisorio->id,
					$formulario_provisorio->razon_social,
					date("Y-m-d H:i:s")
				));*/

			$id_productor_nuevo = $this->crear_registro_productor($formulario_provisorio->id);
			$id_mina_nueva = $this->crear_registro_mina_cantera($formulario_provisorio->id);
			$id_dia_iia_nueva = $this->crear_registro_dia_iia($formulario_provisorio->id);
			$id_pago_canon_nuevo = $this->crear_registro_pago_canon($formulario_provisorio->id);
			$id_mina_productor = $this->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);

			var_dump("El id del borrador es:");
			var_dump($formulario_provisorio->id);
			var_dump("El id del productor es:");
			var_dump($id_productor_nuevo);
			var_dump("El id de la mina es:");
			var_dump($id_mina_nueva);
			var_dump("El id de la id_dia_iia_nueva es:");
			var_dump($id_dia_iia_nueva);
			var_dump("El id de la id_dia_iia_nueva es:");
			var_dump($id_dia_iia_nueva);
			var_dump("El id de la id_pago_canon_nuevo es:");
			var_dump($id_pago_canon_nuevo);
			var_dump("El id de la id_mina_productor es:");
			var_dump($id_mina_productor);
			var_dump("el dpto es:" . intval($array[$i][2]));
			echo "\n\n";
		}
	}


	public function cargarCatamarca(){
		$array = [];

		$array[1] = ["3/3/1990","YMAD","YMAD",2,"Abel Peirano","994*995*Mg*1*1014","Hualfin- Dpto.Belen","Y-79/59","Salta 1127-Capital","Salta 1127- Catamarca","03833-420148","null","30-54668676-7","completa","null"];
		$array[2] = ["3/3/1990","Loma Negra C.I.A.S.A.","Dr. Roque Sala Martinez",4,"Doña Amalia","Caliza","Guallamba-Dpto. El Alto","023/77","Bouchar 680- Cap.Federal","Calle Rojas 335-Catamarca","null","null","30-50053085-1","null","loma.negra@gmail.com"];
		$array[3] = ["3/3/1990","El Cerrito S.R.L.","Angel Raul Garriga",5,"El Morro","Caliza","Esquiu- Dpto. La Paz","D-05/06","Alfonso Carrizo 93-Catamarca","Av. Virgen del Valle 327 - Catamarca","03833-427946","elcerritosrl@gmail.com","30-50456952-3","completa","null"];
		$array[4] = ["21/9/1990","Lucita Fernandez","Lucita Fernandez",10," Don Arturo","Mica-Cuarzo","La Majada- Dpto.Ancasti","F- 125/02","Rivadavia","Rivadavia","null","null","null","null","null"];
		$array[5] = ["28/12/1990","YES - CAT - Cuberes Balancini","Reyes Balancini",12,"Los Bufalos","Yeso","La Dorada-Dpto. La Paz","11/91","Catamarca 2384-B° Yapeyu- Cba.","Catamarca 2384-B° Yapeyu- Cba.","null","null","null","null","yes.cat.cuberes@gmail.com"];
		$array[6] = ["24/2/1993","Santa Rita S.R.L.","Miguel Yampa/ Dr. Gonzalez Vera",33,"Santa Rita","Rodocrosita","Capillitas- Dpto. Andalgala","14/92","Mercado Oeste S/N°- Dpto. Andalgala","null","null","null","null","null","santa.rita.srl@gmail.com"];
		$array[7] = ["20/8/2005","Soria, Julio Ariel","Soria, Julio Ariel",40,"San Benito","Aridos","Rio Miraflores - Dpto. Capayan","02S2015","General Villegas 719. Cordoba","null","15593321 - 15407789","null","null","null","julio.soria@gmail.com"];
		$array[8] = ["22/12/1993","Minera Alumbrera Ltd. ","Walter Miñaura",43,"Bajo de la Alumbrera","994*995*1*1014","Hualfin- Dpto.Belen","154/91","Av.Belgrano 485, Piso 1°, Oficina 3, Ciudad Autonoma de Buenos Aires","Prado N° 290-1° Piso- Dpto. Capital","03833-421810","null","30-66330174-4","null","minera.alumbrera@gmail.com"];
		$array[9] = ["null","Minera del Altiplano- FMC","Carlos Daniel Chavez Diaz",45,"Proyecto Fenix","Litio","S.H.Muerto-Dpto. Antof. De la Sierra","varios","Ejercito Del Norte 20 - Prov. Salta","Esquiu 591, 2° Piso -   Catamarca","03834433222/ 03874322100","null","30-64279606-9","null","minera.atiplano@gmail.com"];
		$array[10] = ["13/3/2002","Zanier, Ruben","Atilo Fabian",62,"San Antonio","Yeso","San Antonio- Dpto. La Paz","Z-025/04","Av. Italia 1500- Malagueño-Cba.","Dr. Manuel Navarro 490-La Chacarita","(Fabian) 429065-15684780","null","30-55733056-5","null","ruben.zanier@gmail.com"];
		$array[11] = ["null","Renaud, Daniel J./Cristian Rozic Echeverria","Silva, Nancy Adriana Elizabeth",64,"Los Patos- La Redonda I-Barrial.Aurelio-Don Carlos","Ulexita","S.H.Muerto-Dpto. Antof. De la Sierra","R-210/94-R-55/00-R-77/99-R-54/00-R-56/00","Gral Guemes 110-Campo Quijano-Salta","B° 144 VVNorte. C/91- Catamarca","03833- 458408/ 15623929","null","20-07638835-1","null","null"];
		$array[12] = ["1/3/2004","Arqueros, Luis Gaston","Ing. Rolando de La Fuente",69," Maktub XXIII- ","Ulexita y Boratos","S.H.Muerto-Dpto. Antof. De la Sierra","M-27/00-51 y 52/00- 248/03","Ruta Nac. 51-Km 22,5 Campo Quijano","Rivas Lara 177 B° san Fdo. Catamarca","null","null","null","null","luis.arqueros@gmail.com"];
		$array[13] = ["17/8/2005","Minerales de Recreo","Enrique Perea",86,"Las Gemelas- Yacimientos del Recreo","Yeso","Recreo- Dpto. La Paz","T-20/99- M-40/06","Avda. Roca 281. Esqu. Tablada. Piso: PA Dpto. 15 Villa Allende 5105 - Prov. Cordoba","Calle Federico Espeche Nº 1448","03832 - 15688104","null","30-68755805-8","null","minerales.de.recreo@gmail.com"];
		$array[14] = ["10/5/2006","Minera Agua Rica LLC","Dra. Maria Gabriela Uriburu Casillo",92,"Minera Agua Rica","994*1","Cerro Atajo-Dpto. Andalga","M-107/93","Chacabuco-Esquina Tucumán-Catamarca","Prado N° 290-2° Piso- Dpto. Capital","3834-751680/3835434762","maria.uriburu@yamana.com","null","null","null"];
		$array[15] = ["19/4/2007","Detoyo SA","Cristian Ricardo Balancini",102,"Molienda para empresa La Pipa SRL","Yeso","Dto. Recreo-Dpto. La Paz","null","Lituania 2532- Alto Gral Paz-Cordoba","Lituania 2532- Alto Gral Paz-Cordoba","0351-4533563","null","null","null","detoyi.sa@gmail.com"];
		$array[16] = ["19/4/2007","La Pipa S.R.L.","Eduardo Balancini",103,"Norma Ester","Yeso","Recreo- Dpto. La Paz","01/03","Achupalla 248-B° Yapeyu-Cordoba C.P. X 5004 DCF","Peru 684-Catamarca","0351-4513176/4513176","null","null","null","lapipa@gmail.com"];
		$array[17] = ["18/4/2008","Minera Petrea S.R.L.","Fernando D'Agostini",112,"Florencia- María Luz","Mica, Cuarzo y feldespato","1° Capital- 2° El Alto","M- 422/07 y M-442/07","Camilo Melet 233","Idem","458995- 15407024","null","30-70804894-8","null","minera.petrea.srl@gmail.com"];
		$array[18] = ["4/6/2008","Herrera Ricardo Adolfo","Herrera Ricardo Adolfo",117,"LOS ZARATE","PIEDRA POMES","Mesada de Zarate Dto Fiambala Dpto Tinogasta","H-39/07","Avda. Venesuela 1531","Calle Salta 636 Planta baja Catamarca","null","null","null","null","herrera.ricardo.adolfo@gmail.com"];
		$array[19] = ["24/9/2008","Quiroga, Ricardo Reyes","Quiroga, Ricardo Reyes",127,"LA VERTIENTE","Lajas","Dto. Los Mogotes-Dpto. Ancasti","Q-011/2008","La Dorada- dpto. La Paz","null","null","null","null","null","quiroga.ricardo.reyes@gmail.com"];
		$array[20] = ["4/11/2009","Horacio Catalan SRL","null",131,"Las Tunas I","Aridos (en gral)","Rio Las Cañas-Las Cañas-Dpto El Alto","C-26/2006","Ruta Prov. Nº5, Km 3½-Parque Industrial-85300-La Rioja","Junin Nº 595-San Fernando del V de Catamarca","3804662347","null","null","null","horacio.catalan.srl@gmail.com"];
		$array[21] = ["28/12/2009","FUERZA SRL","Boggio, Carlos Valentin",132,"Virginia","Yeso","La Calera- Dpto. El Alto","null","25 de Mayo Nº 885","25 de Mayo Nº 885","null","null","null","null","fuerza.srl@gmail.com"];
		$array[22] = ["17/2/2010","Elsa del Valle Araya","-",133,"Santos Roque","Lajas","Dto. Jumulao - Andalgala - Catamarca","A-015/1999","Belgrano 1607 - Dto. Malli - Dpto. Andalgala","Ayacucho 1333","03835-422861 / 15432943","null","null","null","elsa.araya@gmail.com"];
		$array[23] = ["5/5/2010","DECAVIAL S.A.I.C.A.C.","Argañaraz Arturo",134,"Yacimiento Albigasta","aridos","Rio Albigasta- Loc. De Vallecito - Dpto. El Alto - ctmca","D - 049/2009","Pellegrini 127, Frias - Santiago Del Estero","Pasaje Abel Acosta 776 - S.F.V. Catamarca","(011) 43830015/ (011) 1569409913","null","30-50487767-8","null","null"];
		$array[24] = ["1/5/2011","MAKTUB CIA. MINERA","Arqueros Gaston Luis",140,"GRUPO MINERO MEME","BORATOS","Salar del Hombre Muerto . Antof. De La Sierra","Varios","Ruta Nac. Nº 51 Km 2,5 Campo Quijano Salta. ","Rivadavia 271 Salta","03833 - 15526245","null","30-70869687-7","null","null"];
		$array[25] = ["18/1/2012","Mariano, Benedito Arce","Jose Daniel Arce",144,"La Esperanza","Lajas","Loc. La Dorada - Dpto. La Paz","008/A/2011","Loc. La Dorada - Dpto. La Paz","Loc. La Dorada - Dpto. La Paz","03833 - 15575867","null","20-06487466-8","null","null"];
		$array[26] = ["6/2/2012","SMGA S.R.L.","Elisa Achá",145,"5 de enero y 13 nietos","Aridos","Rio del valle - Rio Ongoli - capital","1143S2013 - 1203S2013","Ayacucho 198","Ayacucho 198","0383 - 4423326/4435969","null","null","null","null"];
		$array[27] = ["19/4/2012","Salado Greco Antonio Ignacio","Peralta Elsa del Valle",146,"ISACONS ","Piedra y Arena","Río del Valle-Dpto. Capital","831 - S/2012","Camino a ojo de agua Nº860","Camino a ojo de agua Nº860","3834 - 257635","matiasvrivero@hotmail.com","null","COMPLETA","null"];
		$array[28] = ["20/7/2012","BARRIONUEVO JULIO RAFAEL","ALICIA ANALIA ALBORNOZ",147,"SAN ISIDRO","ARIDOS","RIO SANTA CRUZ -  DPTO. VALLE VIEJO","436 -B/2012","AV. ENRIQUE OCAMPO S/N - VALLE VIEJO","AV. ENRIQUE OCAMPO S/N - VALLE VIEJO","154685340/154343195","null","null","COMPLETA","null"];
		$array[29] = ["9/11/2012","Municipalidad de Huillapima","Adolfo Omar Soria - Carlos Brizuela",149,"Villijan, San Pablo, Real, Pampichuela, San Francisco, San Sebastian","Aridos","Huillapima, San Pablo y Concepcion - Dpto. Capayan","03M2005/01M2005/18M2004/02M2005/20M2004/04M2005","Municipalidad de huillapima -  Dpto. Capayan","Municipalidad de huillapima -  Dpto. Capayan","0383 - 154545703","jcbrizuela01@gmail.com","null","null","null"];
		$array[30] = ["14/12/2012","ECOVIAL SRL","Rodriguez, Luis Carlos",150,"ECOVIAL SRL","Aridos","Rio La Cañada - Dpto Andalgala","1276/E/2012","Mercado Oeste N° 159 - Dpto. Andalgala","Av. Alem N° 768 - SFV de Catamarca ","null","null","30-70849074-8","null","null"];
		$array[31] = ["26/12/2012","Diaz Ramona Luisa","Espeche Ruth",151,"Leocadia","Yeso","San Antonio  - Dpto. La Paz","1143/D/2012","J Colombres S/N - San Antonio - Dpto. La Paz","Bs As N° 262 - SFV de Catamarca","0383-4349860","null","null","fue dada de baja, no bajo la disposicion ","null"];
		$array[32] = ["18/2/2013","Leschinsky Daniel","Leschinsky Daniel",152,"La Tanita","Áridos","Rio del Valle","045/D/2011, 054/D/2011, 053/D/2011","Samuel Molina N° 746 - SFV de Catamarca","Samuel Molina N° 746 - SFV de Catamarca","null","null","null","null","null"];
		$array[33] = ["18/2/2013","Verdu Vicente Ricardo","Verdu Vicente Ricardo",153,"Ralú","Áridos","Rio Bazan - Loc La Dorada - Dpto La Paz","008/V/2006","Gdor Cubas N° 560 - Recreo - Dpto. La Paz","Pje. s/nombre N° 2078 entre Junin y Ayacucho","null","null","20-06593569-5","null","null"];
		$array[34] = ["25/2/2013","Acosta Pedro Eduardo","Acosta Pedro Eduardo",154,"El Amanecer","Lajas","Los Mogotes - Dpto. Ancasti","1238A/2012","La Dorada- Dpto. La Paz","La Dorada- Dpto. La Paz","null","null","null","null","null"];
		$array[35] = ["3/7/2013","MINERA ORIGEN S.A.","Perez, José Sebastián",155,"UVITA III","Jade","Localidad de Fiambala - Dpto. Tinogasta","500/2004","Sarmiento 842 2° Piso - Catamarca","Sarmiento 842 2° Piso - Catamarca","4454650/4432226/154681164","null","30-71255689-3","COMPLETA","null"];
		$array[36] = ["26/7/2013","CAMYEN S.E.","De la Barrera David  - Patocchi Valeria",156,"Minas Capillitas","Rodocrosita","Dto. Minas Capillitas - Dpto. Andalgala","1011F1962","Vicario segura 784","Vicario segura 784","0383 - 154334799/ 4420609","null","30-71245156-0","falta sentencia Inter.","null"];
		$array[37] = ["10/2/2014","ROMERO RAMON DARIO","ROMERO RAMON DARIO",158,"MADRESITA DEL ROSARIO","Lajas","Dto. Los Mogotes-Dpto. Ancasti","988R2013","Loc. La Dorada - Dpto. La Paz","Barrio La Esperanza S/N","0383 - 154295619","null","20-27076449-6","COMPLETA","null"];
		$array[38] = ["13/2/2014","Alaniz, Jose Oscar","Alaniz, Jose Oscar",159,"El Pueblito","Aridos","Tinogasta y San Jose -  Santa Maria","709A2012 - 1274V2012","Ruta Provincial N° 33 - km 5,5 ","Av. Dr.Antonio Del Pino Esq. Ponessa S/N - Dpto 1°","0387 - 156054959","null","null","COMPLETA","null"];
		$array[39] = ["26/3/2014","BRUNELLO DIEGO GUILLERMO","SILVA URSULA YANELA",160,"BRUNELLO","Aridos","Rio del Valle - Capital","1564B2012","Los Fundadores N° 21 - La Cruz Negra - Capital","Los Fundadores N° 21 - La Cruz Negra - Capital","3834 - 921023","null","20-30768647-4","COMPLETA","null"];
		$array[40] = ["2/6/2014","ZAR STELLA DEL VALLE","SECO ZAR DIANA MARIA",161,"MADIAN","Aridos","Rio del Valle - Capital","1581Z2013","Padre Celestino Zanella N° 341 - La Chacarita - Capital","Padre Celestino Zanella N° 341 - La Chacarita - Capital","0383 - 154333366","secozardm@hotmail.com","27-12796608-2","COMPLETA","null"];
		$array[41] = ["08/08//2014","FIKINGER MARTIN RICARDO","DEL PINO GASTON DIEGO",163,"LA GENEROSA","Aridos","Rio San Pablo - Dpto. Capayan","1304F2013","Barrio 29 vv – Casa N° 13, Huillapima, Dpto. Capayan","La Pampa 1568, S.F.V Catamarca  - Capital","0383 - 154254557","gdelpinopalermo@hotmail.com","20-33438142-1","COMPLETA","null"];
		$array[42] = ["11/11/2014","GASO JOSE ARIEL","GASO JOSE ARIEL",165,"SAN NICOLAS","Aridos","Rio del Valle  -  Dpto. Capital","0013G2014","Dr. Julio Herrera N° 646 - Catamarca","Dr. Julio Herrera N° 646 - Catamarca"," ","null","20-29786912-5","COMPLETA","null"];
		$array[43] = ["17/12/2014","COMPAÑÍA MINERA ESPERANZA S.A.","Andreotti Rosales Pablo Martin",166,"CACHARI PAMPA III y IV","Arenas Silicios","Dpto. Antofagasta de la Sierra","C-185/2012","Hipolito Irigoyen Sur N° 48 -  San Juan","Maipu N° 294 - Catamarca capital","0383 - 4426957","estudiorosales294@arnet.com.ar","null","COMPLETA","null"];
		$array[44] = ["11/2/2015","GUIDO MOGUETTA EMPRESA CONSTRUCTORA","MOGUETTA GUIDO DAVID",167,"del sur, B, Yerba Buena, El Bolson, Punta del Agua, La segunda Aconquija,","Aridos","Dpto. Capital- Dpto. Capayan","G-055/2014, M-28-2019,  S-27-2020, S-26-2020, 2021-00119679, 2021-00285279","Calle José Hernandez s/n° - Sumalao, Dpto. Valle Viejo","Calle José Hernandez s/n° - Sumalao, Dpto. Valle Viejo","0383- 4441003","mooguettaconstructora@arhetbiz.com.ar","20-08042389-7","COMPLETA","null"];
		$array[45] = ["18/6/2015","FUENZALIDA JOSE ALFREDO","FUENZALIDA YANINA JORGELINA",168,"JOSECITO","ARIDOS","Dpto. Andalgala","F-27-2015","Barrio Juan Domingo Peron. Casa 16. Dpto Andalgala","Barrio Juan Domingo Peron. Casa 16. Dpto Andalgala","0383 -154901424","null","20-16127679-1","COMPLETA","null"];
		$array[46] = ["22/12/2015","MENDEZ, MATIAS RAMON","MENDEZ, MATIAS RAMON",170,"LA PRODUCTIVA","LAJA","DPTO. ANCASTI","M-1432-2013","OBISPO ESQUIU N° 942","OBISPO ESQUIU N° 942","0383-154241634","null","null","solicitud de baja de la cantera en tramite","null"];
		$array[47] = ["22/12/2015","CESPEDES MIRONES, LIDIA MIRTA","CESPEDES MIRONES, ANGELES ALEJANDRO",171,"LOS MORTEROS - CHAÑAR LAGUNA ","ARIDOS","RIO LOS MORTEROS -DPTO. EL ALTO","C-68-2014","DEAN FUNES N° 889, B° ELBERDI, PROV. DE CORDOBA","PASAJE ANESSI N° 628","-","null","null","FALTA CEDULA FIZCAL ","null"];
		$array[48] = ["30/12/2015","MINERA LAS ROCAS SRL (de Gambio Cesar O.)","Atilio Fabian",173,"LA ROSSANA (A/C de la explotacion)","Yeso","Dto. La Aguadita- Dpto. La Paz","G-18/2010","Calle Leon XIII N° 528 - Tancacha - Prov. De Cordoba"];
		$array[49] = ["7/7/2016","ACUÑA PEDRO","ACUÑA PEDRO ",174,"LA AGUADA ","ARIDOS","Dto. Huaycama - Dpto. Valle Viejo","A-09/2008","Av. Belgrano 442 - S.F.V. de Catamarca","Maipu N°305 - SFV de Catamarca","0383 -4424100","null","20-14957529-5","null","null"];
		$array[50] = ["4/10/2016","DE MARIA ROMAN MAXIMILIANO","null",175,"DON RAUL","ARIDOS","Rio Bazan- Loc. El Bañado - Dpto. La Paz","D-38-2014","CALLE PEDRO CANO Nº 960 - LOC. RECREO- DPTO. LA PAZ","PASEJE ESPECHE Nº 960 - Bº M AVELLANEDA - DPTO CAPITAL","0382-427455 - 0382-15412567","null","20-29664279-8","null","null"];
		$array[51] = ["26/10/2016-20-11-2018","HORMICAT S.A","WALTER AUGUSTO DAGOSTINI",176,"LA CURVA-HORMICAT S.A","ARIDOS","La Curva:Rio Ongoli.- Distrito 21 (cuartel I) Dpto Capital. HORMICAT S.A: Distrito 21 Cuartel I","La Curva: H-007-1994- HORMICAT S.A. H-68-2017","Ruta Nacional 38. Km 574,5","Ruta Nacional 38. Km 574,5","0383- 4431010 - 4432032 ","null","30-62051134-6","null","null"];
		$array[52] = ["13/12/2016","VILLAFAÑE LILIANA MABEL","VILLAFAÑE LILIANA MABEL",177,"LA CAÑADA","ARIDOS","Rio La Cañada - Dpto Andalgala","V - 14 - 2015","RIVADAVIA Y LAFONE QUEVEDO - ANDALGALA","B° CHOYA NORTE 160 VV, C/93, CAPITAL","03835 - 436464","null","27-25541478-5","COMPLETA","null"];
		$array[53] = ["27/3/2017","MORENA DEL VALLE MINERALS S.A.","JUAN AGUSTIN DOTTORI",178,"Pampa I, II, III, Daniel Armando, Daniel Armando II, Debbie I, Doña Carmen, Doña Amparo I y Divina Victoria","LITIO ","Salar de Carachi Pampa - Antof. De La Sierra","129/2013, 128/2013, 130/2013, 23/2016, 97/2016, 21/2016, 24/2016, 22/2016 y 25/2016","AV. ENRIQUE OCAMPO N° 2418 - SFV CATAMARCA","AV. ENRIQUE OCAMPO N° 2418 - SFV CATAMARCA","0387 - 154120802","jadottori@gmail.com","30-71538304-3","COMPLETA","null"];
		$array[54] = ["12/4/2017","DECAVIAL S.A.I.C.A.C. - ESUCO S.A. - UTE","BUSSO , JOSE MARIA - CARLA XIMENA DE LA ROSA",179,"ENSENADA SUR, ROJANO I, ROJANO II,  ROJANO III, EL PUESTO, AGUA SALADA ","ARIDOS","Rio La Cañada - Dpto Andalgala","D -150/2016 - D - 001/2017","ALSINA ADOLFO 1450 - Piso 2, Ciudad Autonoma Bs. As.","Barrio Calchaqui - Casa n° 7 - Capital","03835 - 15690738","car-xdlr@hotmail.com","30-71537888-0","COMPLETA","null"];
		$array[55] = ["17/5/2017","PARRA RODOLFO","null",180,"EL PUESTO","ARIDOS","Río Seco - Dpto. Santa María","028-P-2015","Calle Esquiu Nº 25 - Dpto. Santa María","Calle Crisanto Gomez Nº 316 - Capital","03838 - 15601796","null","20-06956154-4","COMPLETA","null"];
		$array[56] = ["13/6/2017","AGÜERO MARIA MARGARITA","MACAGNO E. MARIO",181,"LOS DIVISADEROS","ARIDOS","DPTO. CAPAYAN","138A2016","GOB. GUILLERMO CORREA Nº 443 - CAPITAL","CHACABUCO Nº 451 - CAPITAL","351-5740621","mmacagno@moniemocammisa.com.ar","30-70878353-2","COMPLETA","null"];
		$array[57] = ["14/6/2017","BRUNELLO ANNABE MERCEDES","RICARDO PREVEDELLO",182,"EL TANO","ARIDOS","Dpto. Capital","B-001-2006","Padre Esquiu 35.","Padre Esquiu 35.","Fijo: 4446089","ricardoprevellosrl@hotmail.com.ar","30-70865284-5","COMPLETA","null"];
		$array[58] = ["4/9/2017","LUNA ANGEL CESAR","null",183,"LA BIENVENIDA","LAJA","Loc. Los Mogotes - Dpto. Ancasti","L-102-2016","calle s/n - Los Mogotes","null","Cel: 3832461979","null","20-12642865-1","COMPLETA","null"];
		$array[59] = ["19/9/2017","FORNACIARI JOSE LUIS","null",184,"LA JUSTINA, LA POTOLA, LA FORTUNA y LA FORTUNA I","DIATOMEA","Carachi Pampa - Dpto. Ant. De la Sierra","F-100-2008","Republica N° 306 - S.F.V. de Catamarca","Junin Nº 169- piso 1 - Dpto. 7 - San Miguel de Tucuman","null","null","20-10017156-3","null","null"];
		$array[60] = ["10/10/2017","ITALCA CONSTRUCTORA S.R.L.","LUIS A. CATTARUZZA",185,"ITALCA","ARIDOS","RIO ONGOLI, DPTO. CAPITAL","I-149-2016","AV. RAMON RECALDE 2658","AV. RAMON RECALDE 2658","0383-154521976","LUISCATTARUZZA@HOTMAIL.COM","30-70939529-3","null","null"];
		$array[61] = ["10/11/2017","GARNOR SRL","GARCIA MARIA FERNANDA LETICIA",186,"ARIDOS ACONQUIJA","ARIDOS","LOC. ACONQUIJA, DPTO. ANDALGALA","G-082-2016","RIVADAVIA 765","RIVADAVIA 765","0383-154225569","fernandagarcialm@gmail.com","33-71514782-9","null","null"];
		$array[62] = ["6/3/2018","HERNAN DAGOSTINI ","GOMEZ VILMA VILIA",187,"FD- HD VIAL","ARIDOS","RIO DEL VALLE. DPTO CAPITAL.","104-D-2017- 61D2019","CAMILO MELET 233. SFVC.","CAMILO MELET 233. SFVC","383-154402633","vilmavgomez@hotmail.com","20-26373397-6","null","null"];
		$array[63] = ["28/6/2018","BG. CONS OBRAS Y SERVICIOS","CARLOS JORGE VERA",188,"Gran Huillapima y Gran Huillapima II","ARIDOS","DTO. HUILLAPIMA Y RIO DEL VALLE. DPTO. CAPAYAN","100-B-2017; 101-B-2017","CLORINDA O HERRERA Nº 168 - SFVC.","JOAQUIN ACUÑA Nº 759 - Bº CENTRO-DPTO. VALLE VIEJO ","3834432506 - 3834923173","null","30-69513929-9","completa","null"];
		$array[64] = ["23/8/2018","TOLESANO JULIO CESAR ","VILMA GOMEZ",189,"SACRIFICIO","ESTAÑO","Tinogasta  ","62T2017 (expte. judicial)","Mate de Luna 758 - SFVC","Florida 460","3834715830","vilmagomez12@hotmail.com","20-13643147-2","completa","null"];
		$array[65] = ["28/9/2018","Minera Agua Rica LLC","Dra. Maria Gabriela Uriburu Casillo",190,"La Teta- El Cazadero- El Ingenio","ARIDOS","SANTA MARIA","02M2006/03M2006/35M2005","Av. Libertad esq. San Martin- Dpto. Andalgalá","Prado N° 290-2° Piso- Dpto. Capital","3834751680-3835434762","maria.uriburu@yamana.com","null","null","null"];
		$array[66] = ["19/10/2018","Minera Alumbrera Ltd. ","CPN Walter Miñaura",191,"Alumbrera I- Las Blancas","Aridos","LOC. ACONQUIJA, DPTO. ANDALGALA","M-06-2001/ M- 04-2001","Av.Belgrano 485, Piso 1°, Oficina 3, Ciudad Autonoma de Buenos Aires","Prado N° 290-1° Piso- Dpto. Capital","3834421810-3834432840","walter.minaura@glencore.com.ar","30-66330174-4","completa","null"];
		$array[67] = ["16/7/2019","LIEX SA","Cambeses Florencia",192,"Proyecto Tres Quebradas","Litio","Loc. Fiambalá- Dpto. Tinogasta","41D2017","Patricias Mendocinas 1077-1° Piso-Dpto. A- Mendoza","San Martin 280. SFVC","3834436515","null","null","completa","null"];
		$array[68] = ["16/8/2019","POSCO Argentina SAU","Dr. Gerardo José Monti",193,"Canteras: A, B, C, D, G,E","Aridos","Dpto. Antofagasta de la Sierra","11P2019- 12P2019-13P2019-14P2019-16P2019-15P2019","Av. Leandro Alem N° 882- CABA","San  Martin N° 197- Dpto. Capital","3834814093","estudiopvya@arnetbiz.com.ar","30-71613922-7","completa","null"];
		$array[69] = ["16/8/2019","POSCO Argentina SAU","Dr. Gerardo José Monti",194,"Barreal 2-Luna Blanca V- Pachamama-La Primera-La Segunda-La Tercera-China-Luna Blanca IV-Rocio 1-Luna Blanca III-Beatriz IV-Nelly VI-Luna Blanca-Meme-Quiero Retruco-Truco-El Tordo- Marcos I","Litio","Dpto. Antofagasta de la Sierra","160G2002-813G2007-227G2007-289G2007-290G2007-291A2007-354G2007-812G2009-815G2009-117G2010-268G2010-269G2010-1280G2006-1430M2006-1198G2006-1197G2006-1178G2006-186G2018-","Av. Leandro Alem N° 882- CABA","San Martin N° 197- Dpto. Capital","3834814093","estudiopvya@arnetbiz.com.ar","30-71613922-7","completa","null"];
		$array[70] = ["29/8/2019","Bollecich Dardo Clemente","Miranda Emma Luciana",195,"El Barrrial","Puzolana","Dpto. Tinogasta","B-64-2018","Ministro Dulce 183. SFVC","Ministro Dulce 183. SFVC","3834-665930","emilumiranda@gmail.com","20-11079307-4","completa","null"];
		$array[71] = ["9/9/2019","Galaxy Lithium Sal de Vida SA","Dr. José Ernesto Vila Melo",196,"Cantera M","Aridos","Dpto. Antofagasta de la Sierra","G-39-2017","San Martín N° 197-SFVC","San Martín N° 197-SFVC","3834205109","estudiopvya@arnetbiz.com.ar","30-71105187-9","completa","null"];
		$array[72] = ["9/9/2019","Galaxy Lithium Sal de Vida SA","Dr. José Ernesto Vila Melo",197,"Luna Blanca- La Redonda V- Agostina- Los Patos- Don Pepe- Don Carlos- Aurelio- Rodolfo- Delia- El Tordo- Luna Blanca VI- Luna Blanca II- Centenario- Cachita-Maktub XXIII- Juan Luis- María Lucía- María Clara- María Clara I- Truco- Quiero Retruco- Meme- Sonqo-Agustín- Fidel- La Redonda IV- Barrial I- Monserrat- Monserrat I","Litio","Dpto. Antofagasta de la Sierra","1280G2006-161G2002- 168G2002-210G1994- 162G2002- 56G2000- 54G2000- 657G2009-398G2003-1178G2006- 814G2009-709G2009-261G1997- 185G2002- 27G2000- 787G2005- 788G2005- 913G2005- 914G2005- 1197G2006-1198G2006- 1430G2006- 754G2009-1279G2006-1281G2006-78G1986-77G1999-55G2000-254G2011-65G2016-","San Martín N° 197-SFVC","San Martín N° 197-SFVC","3834205109","estudiopvya@arnetbiz.com.ar","30-71105187-10","completa","null"];
		$array[73] = ["25/9/2019","Compañía Minera del NOA SA","Romano, Luis Eduardo",198,"Luis II","Litio","Dpto. Belén","22-2015","Austria 2248- 2° Piso- CABA","Rojas 667","11-61375126","null","null","null","null"];
		$array[74] = ["10/12/2019","Minera del Altiplano- FMC","Fernando Ruiz Moreno",199,"Maria","Aridos","Dpto. Antofagasta de la Sierra","M-63-2017","Real Ejercito del Norte 20","Junin esquina Prado. Planta Alta","0387-154429135","daniel.Riva@livent.com","30-64279606-9","null","null"];
		$array[75] = ["3/3/2020","Di Giorgio Osvaldo - Chahla Roberto","Guadalupe Salas",200,"Corina II","Pb-Ag","Tinogasta","197/2019","Jose Marmol 2040 - Bs As","Esquiu 434","3834-046538","Isabelsalas43@yahoo.com.ar","20-13406712-9","completa","null"];
		$array[76] = ["21/5/2020","Catamarca Mining Corp.","Odella Maglione, Nelson Ricardo",201,"Leandro","Plomo","Antofagasta de la Sierra","47C2019","Rodriguez Peña 2082-CABA","Esquiú 434","3834606217","Lensur@live.com","20-60364943-6","completa","null"];
		$array[77] = ["4/8/2020","Bravo Luis Gerardo","Bravo, Luis Gerardo",202,"Santa Catalina II","Cobre","Ancasti","127B2011","San Martin N° 840-La Cocha- Tucuman","Chacabuco N° 916-SFVC","3834-358820","lugebra@yahoo.com.ar","20-16944998-9","completa","null"];
		$array[78] = ["30/11/2020","Layus Jorge Gustavo","Tanco Pablo",203,"La Morenita","Aridos","Capayan","142-L-2016","Obrador San Martin - Ctmarca","Ruta Prov. 111 - km 7 1/2 - CBA","null","null","30-70878353-2","completa","null"];
		$array[79] = ["25/6/2021","Ollier Juan Alejandro","null",204,"Francisco","Arena","Valle Viejo","15-O-2020","B° la Cruz Negra c/n° 9 - loteo Don  Placido","B° la Cruz Negra c/n° 9 - loteo Don  Placido","null","null","null","completa","null"];
		$array[80] = ["30/8/2021","Villarroel jorge Adrian","Zarate Mariana veronica",205,"San Jorge","Arena","Capital","07-V-2014","Ortiz de Ocampo s/n B° san jorge","Ortiz de Ocampo s/n B° san jorge","3834218047","mariana16zarate@gmail.com","20-35500863-1","completa","null"];
		$array[81] = ["15/9/2021","Jais servicios mineros y construcciones civiles","Julio Jorge Jais",206,"Chañaritos","aridos","andalgala","EX2021 - 263828 - CAT - DPM#MM","Malli I S/Nº","Bº 10 de Noviembre Casa Nº 21","null","null","null","incompleta","null"];
		//$array[82] = [null, "Mitre N° 562 - Tancacha - Prov. De Cordoba","Manuel Navarro 490 - SF del V de Catamarca","0383-154684780","atiliofabian@gmail.com","30-70999517-7","null","null


	}
}
