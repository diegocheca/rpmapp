<?php

namespace App\Http\Controllers;

use App\Models\FormAltaProductor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidarEmailProductorPrimeraVez;
use App\Mail\AvisoFormularioPresentadoEmail;

use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;

use App\Models\EmailsAConfirmar;
use App\Models\Productors;
use App\Models\MinaCantera;

use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\Minerales;

use App\Models\Minerales_Borradores;

use \PDF;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\UploadedFile;

class FormAltaProductorController extends Controller
{

		protected $tipo_productor;
        protected $cuit;
        protected $cuit_correcto;
        protected $obs_cuit;
        protected $razonsocial;
        protected $razon_social_correcto;
        protected $obs_razon_social;
        protected $numeroproductor;
        protected $numeroproductor_correcto;
        protected $obs_numeroproductor;
        protected $email;
        protected $email_correcto;
        protected $obs_email;
        protected $tiposociedad;
        protected $tiposociedad_correcto;
        protected $obs_tiposociedad;
        protected $inscripciondgr;
        protected $inscripciondgr_correcto;
        protected $obs_inscripciondgr;
        protected $constaciasociedad;
        protected $constaciasociedad_correcto;
        protected $obs_constaciasociedad;
        protected $paso_1_progreso;
        protected $paso_1_aprobado;
        protected $paso_1_reprobado;
        protected $leal_calle;
        protected $leal_numero;
        protected $leal_telefono;
        protected $leal_pais;
        protected $leal_provincia;
        protected $leal_departamento;
        protected $leal_localidad;
        protected $leal_cp;
        protected $leal_otro;
        protected $administracion_calle;
        protected $administracion_numero;
        protected $administracion_telefono;
        protected $administracion_pais;
        protected $administracion_provincia;
        protected $administracion_departamento;
        protected $administracion_localidad;
        protected $administracion_cp;
        protected $administracion_otro;
        protected $numero_expdiente;
        protected $categoria;
        protected $nombre_mina;
        protected $descripcion_mina;
        protected $distrito_minero;
        protected $mina_cantera;
        protected $plano_inmueble;
        protected $minerales_variedad;
        protected $owner;
        protected $arrendatario;
        protected $concesionario;
        protected $otros;
        protected $titulo_contrato_posecion;
        protected $resolucion_concesion_minera;
        protected $constancia_pago_canon;
        protected $iia;
        protected $dia;
        protected $acciones_a_desarrollar;
        protected $actividad;
        protected $fecha_alta_dia;
        protected $fecha_vencimiento_dia;
        protected $localidad_mina_pais;
        protected $localidad_mina_provincia;
        protected $localidad_mina_departamento;
        protected $localidad_mina_localidad;
        protected $tipo_sistema;
        protected $longitud;
        protected $latitud;
        protected $created_by;
        protected $estado;
        protected $tipo_tramite;
        protected $updated_by;
        protected $updated_paso_uno;
        protected $updated_paso_dos;
        protected $leal_calle_correcto;
        protected $obs_leal_calle;
        protected $leal_numero_correcto;
        protected $obs_leal_numero;
        protected $leal_telefono_correcto;
        protected $obs_leal_telefono;
        protected $leal_provincia_correcto;
        protected $obs_leal_provincia;
        protected $leal_departamento_correcto;
        protected $obs_leal_departamento;
        protected $leal_localidad_correcto;
        protected $obs_leal_localidad;
        protected $leal_cp_correcto;
        protected $obs_leal_cp;
        protected $leal_otro_correcto;
        protected $obs_leal_otro;
        protected $paso_2_progreso;
        protected $paso_2_aprobado;
        protected $paso_2_reprobado;
        protected $administracion_calle_correcto;
        protected $obs_administracion_calle;
        protected $administracion_numero_correcto;
        protected $obs_administracion_numero;
        protected $administracion_telefono_correcto;
        protected $obs_administracion_telefono;
        protected $administracion_provincia_correcto;
        protected $obs_administracion_provincia;
        protected $administracion_departamento_correcto;
        protected $obs_administracion_departamento;
        protected $administracion_localidad_correcto;
        protected $obs_administracion_localidad;
        protected $administracion_cp_correcto;
        protected $obs_administracion_cp;
        protected $administracion_otro_correcto;
        protected $obs_administracion_otro;
        protected $paso_3_progreso;
        protected $paso_3_aprobado;
        protected $paso_3_reprobado;
        protected $numero_expdiente_correcto;
        protected $obs_numero_expdiente;
        protected $categoria_correcto;
        protected $obs_categoria;
        protected $nombre_mina_correcto;
        protected $obs_nombre_mina;
        protected $descripcion_mina_correcto;
        protected $obs_descripcion_mina;
        protected $obs_distrito_minero;
        protected $distrito_minero_correcto;
        protected $mina_cantera_correcto;
        protected $obs_mina_cantera;
        protected $plano_inmueble_correcto;
        protected $obs_plano_inmueble;
        protected $obs_resolucion_concesion_minera;
        protected $resolucion_concesion_minera_correcto;
        protected $titulo_contrato_posecion_correcto;
        protected $obs_titulo_contrato_posecion;
        protected $paso_4_progreso;
        protected $paso_4_aprobado;
        protected $paso_4_reprobado;
        protected $updated_paso_cuatro;
        protected $updated_paso_tres;
        protected $otro_caracter_acalaracion;
        protected $concesion_minera_acalracion;
        protected $owner_correcto;
        protected $obs_owner;
        protected $arrendatario_correcto;
        protected $obs_arrendatario;
        protected $concesionario_correcto;
        protected $obs_concesionario;
        protected $otros_correcto;
        protected $obs_otros;
        protected $sustancias_de_aprovechamiento_comun_correcto;
        protected $obs_sustancias_de_aprovechamiento_comun_correcto;

	public function __construct(
			$id,
			$tipo_productor,
			$cuit,
			$cuit_correcto,
			$obs_cuit,
			$razonsocial,
			$razon_social_correcto,
			$obs_razon_social,
			$numeroproductor,
			$numeroproductor_correcto,
			$obs_numeroproductor,
			$email,
			$email_correcto,
			$obs_email,
			$tiposociedad,
			$tiposociedad_correcto,
			$obs_tiposociedad,
			$inscripciondgr,
			$inscripciondgr_correcto,
			$obs_inscripciondgr,
			$constaciasociedad,
			$constaciasociedad_correcto,
			$obs_constaciasociedad,
			$paso_1_progreso,
			$paso_1_aprobado,
			$paso_1_reprobado,
			$leal_calle,
			$leal_numero,
			$leal_telefono,
			$leal_pais,
			$leal_provincia,
			$leal_departamento,
			$leal_localidad,
			$leal_cp,
			$leal_otro,
			$administracion_calle,
			$administracion_numero,
			$administracion_telefono,
			$administracion_pais,
			$administracion_provincia,
			$administracion_departamento,
			$administracion_localidad,
			$administracion_cp,
			$administracion_otro,
			$numero_expdiente,
			$categoria,
			$nombre_mina,
			$descripcion_mina,
			$distrito_minero,
			$mina_cantera,
			$plano_inmueble,
			$minerales_variedad,
			$owner,
			$arrendatario,
			$concesionario,
			$otros,
			$titulo_contrato_posecion,
			$resolucion_concesion_minera,
			$constancia_pago_canon,
			$iia,
			$dia,
			$acciones_a_desarrollar,
			$actividad,
			$fecha_alta_dia,
			$fecha_vencimiento_dia,
			$localidad_mina_pais,
			$localidad_mina_provincia,
			$localidad_mina_departamento,
			$localidad_mina_localidad,
			$tipo_sistema,
			$longitud,
			$latitud,
			$created_by,
			$estado,
			$tipo_tramite,
			$updated_by,
			$updated_paso_uno,
			$updated_paso_dos,
			$leal_calle_correcto,
			$obs_leal_calle,
			$leal_numero_correcto,
			$obs_leal_numero,
			$leal_telefono_correcto,
			$obs_leal_telefono,
			$leal_provincia_correcto,
			$obs_leal_provincia,
			$leal_departamento_correcto,
			$obs_leal_departamento,
			$leal_localidad_correcto,
			$obs_leal_localidad,
			$leal_cp_correcto,
			$obs_leal_cp,
			$leal_otro_correcto,
			$obs_leal_otro,
			$paso_2_progreso,
			$paso_2_aprobado,
			$paso_2_reprobado,
			$administracion_calle_correcto,
			$obs_administracion_calle,
			$administracion_numero_correcto,
			$obs_administracion_numero,
			$administracion_telefono_correcto,
			$obs_administracion_telefono,
			$administracion_provincia_correcto,
			$obs_administracion_provincia,
			$administracion_departamento_correcto,
			$obs_administracion_departamento,
			$administracion_localidad_correcto,
			$obs_administracion_localidad,
			$administracion_cp_correcto,
			$obs_administracion_cp,
			$administracion_otro_correcto,
			$obs_administracion_otro,
			$paso_3_progreso,
			$paso_3_aprobado,
			$paso_3_reprobado,
			$numero_expdiente_correcto,
			$obs_numero_expdiente,
			$categoria_correcto,
			$obs_categoria,
			$nombre_mina_correcto,
			$obs_nombre_mina,
			$descripcion_mina_correcto,
			$obs_descripcion_mina,
			$obs_distrito_minero,
			$distrito_minero_correcto,
			$mina_cantera_correcto,
			$obs_mina_cantera,
			$plano_inmueble_correcto,
			$obs_plano_inmueble,
			$obs_resolucion_concesion_minera,
			$resolucion_concesion_minera_correcto,
			$titulo_contrato_posecion_correcto,
			$obs_titulo_contrato_posecion,
			$paso_4_progreso,
			$paso_4_aprobado,
			$paso_4_reprobado,
			$updated_paso_cuatro,
			$updated_paso_tres,
			$otro_caracter_acalaracion,
			$concesion_minera_acalracion,
			$owner_correcto,
			$obs_owner,
			$arrendatario_correcto,
			$obs_arrendatario,
			$concesionario_correcto,
			$obs_concesionario,
			$otros_correcto,
			$obs_otros,
			$sustancias_de_aprovechamiento_comun_correcto,
			$obs_sustancias_de_aprovechamiento_comun_correcto
	)
    {
		if($id == null)
		{
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
			$this->sustancias_de_aprovechamiento_comun_correcto = null;
			$this->obs_sustancias_de_aprovechamiento_comun_correcto = null;


		}
		else{
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
		//
		$borradores = FormAltaProductor::all();
		//var_dump($formularios);die();
		return Inertia::render('Productors/List', ['borradores' => $borradores]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$productor = new FormAltaProductor(
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			null,
			33,
			null,
			null,

		);
		var_dump($productor);die();
		//$minerales_asociados = Minerales_Borradores::select('*')->where('id_formulario', '=',$id)->get();
		$minerales_asociados = Minerales_Borradores::all();
		
        //var_dump($productor);die();*/
		return Inertia::render('Productors/Form',['productor' => $productor, 'lista_minerales_cargados' => $minerales_asociados]);
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
	public function show(FormAltaProductor $formAltaProductor)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\FormAltaProductor  $formAltaProductor
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//dd($id);
		$borradores = FormAltaProductor::find($id);
		$minerales_asociados = Minerales_Borradores::select('*')->where('id_formulario', '=',$id)->get();
		

		//dd($borradores->categoria);die();


		if(is_null($borradores->razon_social_correcto)) 
			$borradores->razon_social_correcto = 'nada';
		elseif(intval($borradores->razon_social_correcto) == 1) 
			$borradores->razon_social_correcto = true;
		else $borradores->razon_social_correcto = false;



		if(is_null($borradores->email_correcto)) 
			$borradores->email_correcto = 'nada';
		elseif(intval($borradores->email_correcto) == 1) 
			$borradores->email_correcto = true;
		else $borradores->email_correcto = false;


		if(is_null($borradores->cuit_correcto)) 
			$borradores->cuit_correcto = 'nada';
		elseif(intval($borradores->cuit_correcto) == 1) 
			$borradores->cuit_correcto = true;
		else $borradores->cuit_correcto = false;


		if(is_null($borradores->numeroproductor_correcto)) 
			$borradores->numeroproductor_correcto = 'nada';
		elseif(intval($borradores->numeroproductor_correcto) == 1) 
			$borradores->numeroproductor_correcto = true;
		else $borradores->numeroproductor_correcto = false;


		if(is_null($borradores->tiposociedad_correcto)) 
			$borradores->tiposociedad_correcto = 'nada';
		elseif(intval($borradores->tiposociedad_correcto) == 1) 
			$borradores->tiposociedad_correcto = true;
		else $borradores->tiposociedad_correcto = false;


		if(is_null($borradores->inscripciondgr_correcto)) 
			$borradores->inscripciondgr_correcto = 'nada';
		elseif(intval($borradores->inscripciondgr_correcto) == 1) 
			$borradores->inscripciondgr_correcto = true;
		else $borradores->inscripciondgr_correcto = false;


		if(is_null($borradores->constanciasociedad_correcto)) 
			$borradores->constanciasociedad_correcto = 'nada';
		elseif(intval($borradores->constanciasociedad_correcto) == 1) 
			$borradores->constanciasociedad_correcto = true;
		else $borradores->constanciasociedad_correcto = false;





		if(is_null($borradores->owner_correcto)) 
			$borradores->owner_correcto = 'nada';
		elseif(intval($borradores->owner_correcto) == 1) 
			$borradores->owner_correcto = true;
		else $borradores->owner_correcto = false;

		if(is_null($borradores->arrendatario_correcto)) 
			$borradores->arrendatario_correcto = 'nada';
		elseif(intval($borradores->arrendatario_correcto) == 1) 
			$borradores->arrendatario_correcto = true;
		else $borradores->arrendatario_correcto = false;

		if(is_null($borradores->concesionario_correcto)) 
			$borradores->concesionario_correcto = 'nada';
		elseif(intval($borradores->concesionario_correcto) == 1) 
			$borradores->concesionario_correcto = true;
		else $borradores->concesionario_correcto = false;

		if(is_null($borradores->otros_correcto)) 
			$borradores->otros_correcto = 'nada';
		elseif(intval($borradores->otros_correcto) == 1) 
			$borradores->otros_correcto = true;
		else $borradores->otros_correcto = false;

		if(is_null($borradores->susteancias_de_aprovechamiento_comun_correcto)) 
			$borradores->susteancias_de_aprovechamiento_comun_correcto = 'nada';
		elseif(intval($borradores->susteancias_de_aprovechamiento_comun_correcto) == 1) 
			$borradores->susteancias_de_aprovechamiento_comun_correcto = true;
		else $borradores->susteancias_de_aprovechamiento_comun_correcto = false;


		//dd($minerales_asociados);

		return Inertia::render('Productors/EditForm', ['productor' => $borradores, 'lista_minerales_cargados' => $minerales_asociados]);
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
	public function destroy(FormAltaProductor $formAltaProductor)
	{
		//
		$formAltaProductor->delete();
		return FormAltaProductor::route('formulario-alta.index');
	}
	
	public function mostrar_formulario()
	{
		//var_dump(Storage::url('files_formularios/ochamplin@gmail.com/uH41Q62Dg3UogcroIQmvybBLNKRocjJZOxE4SGrA.pdf'));die();
		$characters_numeros = '1234567890';
			$charactersLength_numeros = strlen($characters_numeros);
		

		$randomString_numeros = '';
			for ($i = 0; $i <8; $i++) {
				$randomString_numeros .= $characters_numeros[rand(0, $charactersLength_numeros - 1)];
			}

		$faker = Faker::create();
		$nombre = $faker->firstNameFemale;
		$apellido = $faker->lastName;
		$cuit = '20-'.$randomString_numeros.'-7';
		$telefono = $faker->tollFreePhoneNumber;
		$email = $faker->email;
		$domicilio = $faker->streetAddress;

		return view("wizard.prueba_wizard")
		->with('nombre',$nombre)
		->with('apellido',$apellido)
		->with('cuit',$cuit)
		->with('telefono',$telefono)
		->with('email',$email)
		->with('domicilio',$domicilio)

		;
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
		if($email != null)
		{
			return response()->json($email);
		}
		else
		{
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
		if($email != null)
		{
			return response()->json($email);
		}
		else
		{
			return response()->json("mal");
		}


	}

	
	public function formulario_listo(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$request->email)->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
			//modifico la path de los archivos
			$formulario_provisorio->estado = "presentado";
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();

			//aviso por emial al productor
			Mail::to($formulario_provisorio->email)->send(new AvisoFormularioPresentadoEmail(
				$request->email,
				$formulario_provisorio->razonsocial,
				date("d/m/Y H:i:s")
			));
			return response()->json('todo bien');

		}
		else return response()->json("email incorrecto");


	}

	public function buscar_datos_formulario_por_email(Request $request)
	{
		//var_dump($request->email);die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$request->email)->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
			//modifico la path de los archivos
			if($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr =  str_replace("public","storage",$formulario_provisorio->inscripciondgr);
			if($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad =  str_replace("public","storage",$formulario_provisorio->constaciasociedad);
			if($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble =  str_replace("public","storage",$formulario_provisorio->plano_inmueble);
			if($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion =  str_replace("public","storage",$formulario_provisorio->titulo_contrato_posecion);
			if($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera	 =  str_replace("public","storage",$formulario_provisorio->resolucion_concesion_minera);
			if($formulario_provisorio->constancia_pago_canon	 != null)
				$formulario_provisorio->constancia_pago_canon	 =  str_replace("public","storage",$formulario_provisorio->constancia_pago_canon);
			if($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia	 =  str_replace("public","storage",$formulario_provisorio->iia);
			if($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia	 =  str_replace("public","storage",$formulario_provisorio->dia);
			if($formulario_provisorio->fecha_alta_dia	 != null)
				$formulario_provisorio->fecha_alta_dia	 = date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia) ); 
			if($formulario_provisorio->fecha_vencimiento_dia	 != null)
				$formulario_provisorio->fecha_vencimiento_dia	 = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia) ); 
			return response()->json($formulario_provisorio);

		}
		else return response()->json("no esta");


	}

	
	public function guardar_paso_uno(Request $request)
	{
		//var_dump($request->email);

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id','razonsocial','cuit','numeroproductor','tiposociedad',	'email','inscripciondgr','constaciasociedad')
		->where('email', '=',$request->email)->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
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
					//$formulario_nuevo->inscripciondgr = $request->inscricion_dgr;
					//$formulario_nuevo->constaciasociedad = $request->constancia_sociedad;
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
					));*/
					return response()->json("mande un email de mentira");
				}

			}
			else
			{
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}

	public function guardar_paso_dos(Request $request)
	{
		//var_dump($request->email);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id', 'leal_calle','leal_numero','leal_telefono','leal_pais','leal_provincia','leal_departamento','leal_localidad','leal_cp','leal_otro', 'email')
		->where('email', '=',$request->email)
		->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
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
					));*/
					return response()->json("mande un email de mentira");
				}

			}
			else
			{
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}

	
	public function guardar_paso_tres(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id','administracion_calle','administracion_numero','administracion_telefono','administracion_pais','administracion_provincia','administracion_departamento','administracion_localidad','administracion_cp','administracion_otro', 'email')
		->where('email', '=',$request->email)
		->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
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
			return response()->json(1);//"se actualizaron los datos correctamente"
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
					return response()->json(2);//"se creo el formulario y se guardo correctamente"
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
					));*/
					return response()->json(3);//"mande un email de mentira"
				}

			}
			else
			{
				return response()->json(4);//"formulario no encontrado ni tampoco email"
			}
		}
	}


	public function guardar_paso_cuatro(Request $request)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id','numero_expdiente','distrito_minero','categoria','nombre_mina','descripcion_mina','mina_cantera','plano_inmueble','minerales_variedad', 'email')
		->where('email', '=',$request->email)
		->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
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
					));*/
					return response()->json("mande un email de mentira");
				}

			}
			else
			{
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
		$formulario_provisorio = FormAltaProductor::select('id','localidad_mina_pais','localidad_mina_provincia','localidad_mina_departamento','localidad_mina_localidad','tipo_sistema','longitud','latitud', 'email')
		->where('email', '=',$request->email)
		->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
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
					));*/
					return response()->json("mande un email de mentira");
				}

			}
			else
			{
				return response()->json("formulario no encontrado ni tampoco email");
			}
		}
	}



	public function preguntar_email_confirmado(Request $request)
	{
		//var_dump($request->email);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$email = EmailsAConfirmar::select('*')->where('email', '=', $request->email)->first();
		if($email->confirmed_at == null)
		{
			return response()->json("sin confirmar");
		}
		else
		{
			return response()->json("ya confirmado");
		}
	}
	public function confirmando_email_productor($codigo_buscado)
	{
		$email = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo_buscado)->first();
		if($email != null)
		{
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$email->confirmed_at = date("Y-m-d H:i:s");
			$email->codigo = null;
			return response()->json("confirmado exitosamente");
		}
		else
		{
			return response()->json("email no encontrado");
		}
	}
	public function validar_email_desde_email($codigo)
	{
		//var_dump("expression");die();
		$email = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo)->first();
		if($email != null)
		{
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$email->confirmed_at = date("Y-m-d H:i:s");
			$email->codigo = null;
			return view("confirmation.index");
		}
		else
		{
			return view("confirmation.codigo_incorrecto");
		}
	}

	public function lista_productores_api(){

		return FormAltaProductor::all();
	}


	public function recibo(Request $request)
    {
        //busco si el email tiene cargado un registro
        $formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$request->email)
		->first();
        if($formulario_provisorio != null)
        {
        	//significa que tengo un registro ya guardado en el bd
        	//guardo el archivo en el storage
        	$contents = file_get_contents($request->archivo->path());
        	$resultado = Storage::put('public/files_formularios'.'/'.$request->email, $request->archivo);
        	if($request->nombre_archivo == 'inscripcion_dgr')
        	{
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->inscripciondgr = $resultado;
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'constancia_sociedad') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->constaciasociedad = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'plano_inmueble') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->plano_inmueble = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'contrato') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->titulo_contrato_posecion = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'concesion') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->resolucion_concesion_minera	 = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'canon') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->constancia_pago_canon	 = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'iia') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->iia	 = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	elseif ($request->nombre_archivo == 'dia') {
        		// guardo el nombre del archivo en el registro provisorio
        		$formulario_provisorio->dia	 = $resultado;
				
        		$formulario_provisorio->save();
        	}
        	
        	$resultado =  str_replace("public","storage",$resultado);
        	return response()->json($resultado);

        }
        else 
        	return response()->json("sin email");
    }

    public function buscador_de_id(Request $request){
		$formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$request->email)->first();
		if($formulario_provisorio != null)
	        return response()->json($formulario_provisorio->id);
        else response()->json(false);
    }
    public function descargar_formulario($id){
    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::find($id);
		if($formulario_provisorio != null)
		{
			//modifico la path de los archivos
			if($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia) ); 
			if($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia) ); 
	    	$data = [
	            'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
	            'date_generado' => date('d/m/Y'),
	            //1
	            'razon_social' =>  $formulario_provisorio->razon_social,
				'ciut' =>  $formulario_provisorio->cuit,
	            'numeroproductor' => $formulario_provisorio->numeroproductor,
	            'tiposociedad' => $formulario_provisorio->tiposociedad,
	            'email' => $formulario_provisorio->email,
				'inscripciondgr' => $formulario_provisorio->inscripciondgr ,
				'constaciasociedad' => $formulario_provisorio->constaciasociedad ,

				//2
				'leal_calle' => $formulario_provisorio->leal_calle ,
				'leal_numero' => $formulario_provisorio->leal_numero ,
				'leal_telefono' => $formulario_provisorio->leal_telefono ,
				'leal_pais' => $formulario_provisorio->leal_pais ,
				'leal_provincia' => $formulario_provisorio->leal_provincia ,
				'leal_departamento' => $formulario_provisorio->leal_departamento ,
				'leal_localidad' => $formulario_provisorio->leal_localidad ,
				'leal_cp' => $formulario_provisorio->leal_cp ,
				'leal_otro' => $formulario_provisorio->leal_otro ,

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
				'mina_cantera' =>$formulario_provisorio->mina_cantera,
				'numero_expdiente' =>$formulario_provisorio->numero_expdiente,
				'distrito_minero' =>$formulario_provisorio->distrito_minero,
				'descripcion_mina' =>$formulario_provisorio->descripcion_mina,
				'nombre_mina' =>$formulario_provisorio->nombre_mina,
				'categoria' =>$formulario_provisorio->categoria,
				'minerales_variedad' =>$formulario_provisorio->minerales_variedad,

				//5
				'owner' =>$formulario_provisorio->owner,
				'arrendatario' =>$formulario_provisorio->arrendatario,
				'concesionario' =>$formulario_provisorio->concesionario,
				'otros' =>$formulario_provisorio->otros,
				'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
				'actividad' =>$formulario_provisorio->actividad,
				'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
				'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

				//6

				'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
				'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
				'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
				'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
				'tipo_sistema' => $formulario_provisorio->tipo_sistema,
				'latitud' => $formulario_provisorio->latitud,
				'longitud' => $formulario_provisorio->longitud,

				//7
				'updated_at' => $formulario_provisorio->updated_at ,
	        ];
	        $pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);
	        return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
        }
        else response()->json(false);
    }

    
    public function ejemplo_pdf_prueba(){
    	$email  = "ochamplin@gmail.com";

    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$email)->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
			//modifico la path de los archivos
			if($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia) ); 
			if($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia) ); 
    	$data = [
            'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
            'date_generado' => date('d/m/Y'),
            //1
            'razon_social' =>  $formulario_provisorio->razon_social,
			'ciut' =>  $formulario_provisorio->cuit,
            'numeroproductor' => $formulario_provisorio->numeroproductor,
            'tiposociedad' => $formulario_provisorio->tiposociedad,
            'email' => $formulario_provisorio->email,
			'inscripciondgr' => $formulario_provisorio->inscripciondgr ,
			'constaciasociedad' => $formulario_provisorio->constaciasociedad ,

			//2
			'leal_calle' => $formulario_provisorio->leal_calle ,
			'leal_numero' => $formulario_provisorio->leal_numero ,
			'leal_telefono' => $formulario_provisorio->leal_telefono ,
			'leal_pais' => $formulario_provisorio->leal_pais ,
			'leal_provincia' => $formulario_provisorio->leal_provincia ,
			'leal_departamento' => $formulario_provisorio->leal_departamento ,
			'leal_localidad' => $formulario_provisorio->leal_localidad ,
			'leal_cp' => $formulario_provisorio->leal_cp ,
			'leal_otro' => $formulario_provisorio->leal_otro ,

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
			'mina_cantera' =>$formulario_provisorio->mina_cantera,
			'numero_expdiente' =>$formulario_provisorio->numero_expdiente,
			'distrito_minero' =>$formulario_provisorio->distrito_minero,
			'descripcion_mina' =>$formulario_provisorio->descripcion_mina,
			'nombre_mina' =>$formulario_provisorio->nombre_mina,
			'categoria' =>$formulario_provisorio->categoria,
			'minerales_variedad' =>$formulario_provisorio->minerales_variedad,

			//5
			'owner' =>$formulario_provisorio->owner,
			'arrendatario' =>$formulario_provisorio->arrendatario,
			'concesionario' =>$formulario_provisorio->concesionario,
			'otros' =>$formulario_provisorio->otros,
			'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			'actividad' =>$formulario_provisorio->actividad,
			'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			//6

			'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			'latitud' => $formulario_provisorio->latitud,
			'longitud' => $formulario_provisorio->longitud,

			//7
			'updated_at' => $formulario_provisorio->updated_at ,
        ];
          
        $pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);
    
        //return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
        return $pdf->stream('formulario_.pdf');
        }
        else response()->json("error en el email");
    }
    
    public function ejemplo_pdf_prueba_reinscripcion(){
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
			'leal_calle' => "Sargento cabral este" ,
			'leal_numero' => 184 ,
			'leal_telefono' => 1919815656 ,
			'leal_departamento' => "Chimbas" ,
			'leal_localidad' => "Chimbas City" ,
			'leal_cp' => 5236 ,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' =>18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' =>'zona 4'

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
    public function pdf_sin_pdf(){
    	$email  = "ochamplin@gmail.com";

    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('*')
		->where('email', '=',$email)->first();
		//var_dump($formulario_provisorio->id);
		if($formulario_provisorio != null)
		{
			//modifico la path de los archivos
			if($formulario_provisorio->inscripciondgr != null)
				$formulario_provisorio->inscripciondgr = "si posee";
			if($formulario_provisorio->constaciasociedad != null)
				$formulario_provisorio->constaciasociedad = "si posee";
			if($formulario_provisorio->plano_inmueble != null)
				$formulario_provisorio->plano_inmueble = "si posee";
			if($formulario_provisorio->titulo_contrato_posecion != null)
				$formulario_provisorio->titulo_contrato_posecion = "si posee";
			if($formulario_provisorio->resolucion_concesion_minera	 != null)
				$formulario_provisorio->resolucion_concesion_minera = "si posee";
			if($formulario_provisorio->constancia_pago_canon != null)
				$formulario_provisorio->constancia_pago_canon = "si posee";
			if($formulario_provisorio->iia	 != null)
				$formulario_provisorio->iia = "si posee";
			if($formulario_provisorio->dia	 != null)
				$formulario_provisorio->dia = "si posee";
			if($formulario_provisorio->fecha_alta_dia != null)
				$formulario_provisorio->fecha_alta_dia	= date("Y-m-d", strtotime($formulario_provisorio->fecha_alta_dia) ); 
			if($formulario_provisorio->fecha_vencimiento_dia != null)
				$formulario_provisorio->fecha_vencimiento_dia = date("Y-m-d", strtotime($formulario_provisorio->fecha_vencimiento_dia) ); 
    	$data = [
            'title' => 'SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94',
            'date_generado' => date('d/m/Y'),
            //1
            'razon_social' =>  $formulario_provisorio->razon_social,
			'ciut' =>  $formulario_provisorio->cuit,
            'numeroproductor' => $formulario_provisorio->numeroproductor,
            'tiposociedad' => $formulario_provisorio->tiposociedad,
            'email' => $formulario_provisorio->email,
			'inscripciondgr' => $formulario_provisorio->inscripciondgr ,
			'constaciasociedad' => $formulario_provisorio->constaciasociedad ,

			//2
			'leal_calle' => $formulario_provisorio->leal_calle ,
			'leal_numero' => $formulario_provisorio->leal_numero ,
			'leal_telefono' => $formulario_provisorio->leal_telefono ,
			'leal_pais' => $formulario_provisorio->leal_pais ,
			'leal_provincia' => $formulario_provisorio->leal_provincia ,
			'leal_departamento' => $formulario_provisorio->leal_departamento ,
			'leal_localidad' => $formulario_provisorio->leal_localidad ,
			'leal_cp' => $formulario_provisorio->leal_cp ,
			'leal_otro' => $formulario_provisorio->leal_otro ,

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
			'mina_cantera' =>$formulario_provisorio->mina_cantera,
			'numero_expdiente' =>$formulario_provisorio->numero_expdiente,
			'distrito_minero' =>$formulario_provisorio->distrito_minero,
			'descripcion_mina' =>$formulario_provisorio->descripcion_mina,
			'nombre_mina' =>$formulario_provisorio->nombre_mina,
			'categoria' =>$formulario_provisorio->categoria,
			'minerales_variedad' =>$formulario_provisorio->minerales_variedad,

			//5
			'owner' =>$formulario_provisorio->owner,
			'arrendatario' =>$formulario_provisorio->arrendatario,
			'concesionario' =>$formulario_provisorio->concesionario,
			'otros' =>$formulario_provisorio->otros,
			'acciones_a_desarrollar' =>$formulario_provisorio->acciones_a_desarrollar,
			'actividad' =>$formulario_provisorio->actividad,
			'fecha_alta_dia' =>$formulario_provisorio->fecha_alta_dia,
			'fecha_vencimiento_dia' =>$formulario_provisorio->fecha_vencimiento_dia,

			//6

			'localidad_mina_pais' => $formulario_provisorio->localidad_mina_pais,
			'localidad_mina_provincia' => $formulario_provisorio->localidad_mina_provincia,
			'localidad_mina_departamento' => $formulario_provisorio->localidad_mina_departamento,
			'localidad_mina_localidad' => $formulario_provisorio->localidad_mina_localidad,
			'tipo_sistema' => $formulario_provisorio->tipo_sistema,
			'latitud' => $formulario_provisorio->latitud,
			'longitud' => $formulario_provisorio->longitud,

			//7
			'updated_at' => $formulario_provisorio->updated_at ,
        ];
          
        //$pdf = PDF::loadView('pdfs.formulario_inscripcion_productor', $data);
    
        //return $pdf->download('formulario_'.$formulario_provisorio->id.'.pdf');
        //return $pdf->stream('formulario_.pdf');
        return view("pdfs.formulario_inscripcion_productor", compact('data'));
        }
        else response()->json("error en el email");
    }




    //evaluacion de formularios
    public function correccion_guardar_paso_uno(Request $request)
	{
		//var_dump("el id:".$request->id."   - el  cuit es:".$request->cuit);die();
		date_default_timezone_set('America/Argentina/Buenos_Aires');
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
		->where('id', '=',$request->id)
		->first();
		//arreglo las variables
		//var_dump($request->razon_social_correcto);
		//var_dump(is_bool($request->razon_social_correcto));
		if(is_bool($request->razon_social_correcto))
			if($request->razon_social_correcto == true)
				$request->razon_social_correcto = 1;
			else $request->razon_social_correcto = 0;
		else//($request->razon_social_correcto == 'nada')
			$request->razon_social_correcto = null;
		
		if(is_bool($request->cuit_correcto))
			if($request->cuit_correcto == true)
				$request->cuit_correcto = 1;
			else $request->cuit_correcto = 0;
		else//($request->cuit_correcto == 'nada')
			$request->cuit_correcto = null;



		if(is_bool($request->numeroproductor_correcto))
			if($request->numeroproductor_correcto == true)
				$request->numeroproductor_correcto = 1;
			else $request->numeroproductor_correcto = 0;
		else//($request->numeroproductor_correcto == 'nada')
			$request->numeroproductor_correcto = null;

		

		if(is_bool($request->email_correcto))
			if($request->email_correcto == true)
				$request->email_correcto = 1;
			else $request->email_correcto = 0;
		else//($request->email_correcto == 'nada')
			$request->email_correcto = null;



		if(is_bool($request->tiposociedad_correcto))
			if($request->tiposociedad_correcto == true)
				$request->tiposociedad_correcto = 1;
			else $request->tiposociedad_correcto = 0;
		else//($request->tiposociedad_correcto == 'nada')
			$request->tiposociedad_correcto = null;



		if(is_bool($request->inscripciondgr_correcto))
			if($request->inscripciondgr_correcto == true)
				$request->inscripciondgr_correcto = 1;
			else $request->inscripciondgr_correcto = 0;
		else//($request->inscripciondgr_correcto == 'nada')
			$request->inscripciondgr_correcto = null;


		if(is_bool($request->constaciasociedad_correcto))
			if($request->constaciasociedad_correcto == true)
				$request->constaciasociedad_correcto = 1;
			else $request->constaciasociedad_correcto = 0;
		else//($request->constaciasociedad_correcto == 'nada')
			$request->constaciasociedad_correcto = null;

		
		if($formulario_provisorio != null)
		{
			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			if(false){ // soy autoridad minera
				//var_dump("voy a meter:");
				//var_dump($request->razon_social_correcto);die();
				$formulario_provisorio->razon_social_correcto = $request->razon_social_correcto;
				$formulario_provisorio->obs_razon_social = $request->obs_razon_social;
	
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
				return response()->json("se actualizaron los datos correctamente");
			}
			else{//soy productor
				$formulario_provisorio->razonsocial = $request->razon_social;
				$formulario_provisorio->email = $request->email;
				$formulario_provisorio->cuit= $request->cuit;
				$formulario_provisorio->numeroproductor = $request->numeroproductor;
				$formulario_provisorio->tiposociedad = $request->tiposociedad;
				//$formulario_provisorio->inscripciondgro = $request->inscripciondgr_correcto;
				//$formulario_provisorio->constaciasociedad_correcto = $request->constaciasociedad_correcto;
				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
				$formulario_provisorio->updated_by = Auth::user()->id;

				$formulario_provisorio->save();
				return response()->json("se actualizaron los datos correctamente, siendo un productor");
			}
		}
		else
		{
			return response()->json("formulario no encontrado");
		}
	}

	public function correccion_guardar_paso_dos(Request $request)
	{
		/*var_dump(
			$request->leal_calle, 
			$request->nombre_calle_legal_valido, 
			$request->nombre_calle_legal_correcto, 
			$request->obs_nombre_calle_legal, 
			$request->obs_nombre_calle_legal_valido, 

			$request->leal_numero, 
			$request->leal_numero_valido, 
			$request->leal_numero_correcto, 
			$request->obs_leal_numero, 
			$request->obs_leal_numero_valido, 

			$request->leal_telefono, 
			$request->leal_telefono_valido, 
			$request->leal_telefono_correcto, 
			$request->obs_leal_telefono, 
			$request->obs_leal_telefono_valido, 

			$request->leal_provincia, 
			$request->leal_provincia_valido, 
			$request->leal_provincia_correcto, 
			$request->obs_leal_provincia, 
			$request->obs_leal_provincia_valido, 

			$request->leal_departamento, 
			$request->leal_departamento_valido, 
			$request->leal_departamento_correcto, 
			$request->obs_leal_departamento, 
			$request->obs_leal_departamento_valido,


			$request->valor_de_progreso, 
			$request->valor_de_aprobado, 
			$request->valor_de_reprobado, 

		);
		//return response()->json("todo bien");
		die();*/

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

			'updated_at')
		->where('id', '=',$request->id)->first();
		if($formulario_provisorio != null)
		{
			if(true){ // soy autoridad minera

				if($request->leal_calle_correcto == 'nada')
					$request->leal_calle_correcto = null;

				if($request->leal_numero_correcto == 'nada')
					$request->leal_numero_correcto = null;

				if($request->numeroproductor_correcto == 'nada')
					$request->numeroproductor_correcto = null;

				if($request->leal_telefono_correcto == 'nada')
					$request->leal_telefono_correcto = null;

				if($request->leal_provincia_correcto == 'nada')
					$request->leal_provincia_correcto = null;

				if($request->leal_departamento_correcto == 'nada')
					$request->leal_departamento_correcto = null;

				if($request->leal_localidad_correcto == 'nada')
					$request->leal_localidad_correcto = null;

				if($request->leal_cp_correcto == 'nada')
					$request->leal_cp_correcto = null;

				if($request->leal_otro_correcto == 'nada')
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
				return response()->json("grgdgdf se actualizaron los datos correctamente");
			}
			else{//soy productor
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
				return response()->json("se actualizaron los datos codsadsadsarrectamente, siendo un productor");
			}
			
		}
		else
		{
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

			'updated_at')
		->where('id', '=',$request->id)->first();
		//var_dump($formulario_provisorio->id);
		
			
		if($formulario_provisorio != null)
		{
			if(true){ // soy autoridad minera

				if($request->administracion_calle_correcto == 'nada')
					$request->administracion_calle_correcto = null;

				if($request->leal_numero_correcto == 'nada')
					$request->leal_numero_correcto = null;

				if($request->numeroproductor_correcto == 'nada')
					$request->numeroproductor_correcto = null;

				if($request->leal_telefono_correcto == 'nada')
					$request->leal_telefono_correcto = null;

				if($request->leal_provincia_correcto == 'nada')
					$request->leal_provincia_correcto = null;

				if($request->leal_departamento_correcto == 'nada')
					$request->leal_departamento_correcto = null;

				if($request->leal_localidad_correcto == 'nada')
					$request->leal_localidad_correcto = null;

				if($request->leal_cp_correcto == 'nada')
					$request->leal_cp_correcto = null;

				if($request->leal_otro_correcto == 'nada')
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
				return response()->json("grgdgdf se actualizaron los datos correctamente");
			}
			else{//soy productor
					//lo encontre y actualizo
				$formulario_provisorio->tipo_productor = $request->tipo_productor;
				$formulario_provisorio->razonsocial = $request->razon_social;
				$formulario_provisorio->cuit = $request->cuit;
				$formulario_provisorio->numeroproductor = $request->num_productor;
				$formulario_provisorio->tiposociedad = $request->tipo_sociedad;
				$formulario_provisorio->email = $request->email;
				// $formulario_provisorio->domicilio_prod = $request->streetName;
				$formulario_provisorio->inscripciondgr = $request->inscricion_dgr;
				$formulario_provisorio->constaciasociedad = $request->constancia_sociedad;
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
		// var_dump(
		// 	$request->lista_minerales, 
			
		// 	$request->valor_de_progreso, 
		// 	$request->valor_de_aprobado, 
		// 	$request->valor_de_reprobado, 

		// );
		// die();
		//return response()->json("todo bien");

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
		->where('id', '=',$request->id)->first();
		//var_dump($formulario_provisorio->id);
		//'lista_minerales',

		
		if(is_bool($request->numero_expdiente_correcto))
			if($request->numero_expdiente_correcto == true)
				$request->numero_expdiente_correcto = 1;
			else $request->numero_expdiente_correcto = 0;
		else//($request->numero_expdiente_correcto == 'nada')
			$request->numero_expdiente_correcto = null;


		if(is_bool($request->categoria_correcto))
			if($request->categoria_correcto == true)
				$request->categoria_correcto = 1;
			else $request->categoria_correcto = 0;
		else//($request->categoria_correcto == 'nada')
			$request->categoria_correcto = null;

		if(is_bool($request->numeroproductor_correcto))
			if($request->numeroproductor_correcto == true)
				$request->numeroproductor_correcto = 1;
			else $request->numeroproductor_correcto = 0;
		else//($request->numeroproductor_correcto == 'nada')
			$request->numeroproductor_correcto = null;


		if(is_bool($request->nombre_mina_correcto))
			if($request->nombre_mina_correcto == true)
				$request->nombre_mina_correcto = 1;
			else $request->nombre_mina_correcto = 0;
		else//($request->nombre_mina_correcto == 'nada')
			$request->nombre_mina_correcto = null;


		if(is_bool($request->descripcion_mina_correcto))
			if($request->descripcion_mina_correcto == true)
				$request->descripcion_mina_correcto = 1;
			else $request->descripcion_mina_correcto = 0;
		else//($request->descripcion_mina_correcto == 'nada')
			$request->descripcion_mina_correcto = null;


		if(is_bool($request->distrito_minero_correcto))
			if($request->distrito_minero_correcto == true)
				$request->distrito_minero_correcto = 1;
			else $request->distrito_minero_correcto = 0;
		else//($request->distrito_minero_correcto == 'nada')
			$request->distrito_minero_correcto = null;


		if(is_bool($request->mina_cantera_correcto))
			if($request->mina_cantera_correcto == true)
				$request->mina_cantera_correcto = 1;
			else $request->mina_cantera_correcto = 0;
		else//($request->mina_cantera_correcto == 'nada')
			$request->mina_cantera_correcto = null;


		if(is_bool($request->plano_inmueble_correcto))
			if($request->plano_inmueble_correcto == true)
				$request->plano_inmueble_correcto = 1;
			else $request->plano_inmueble_correcto = 0;
		else//($request->plano_inmueble_correcto == 'nada')
			$request->plano_inmueble_correcto = null;


		if(is_bool($request->resolucion_concesion_minera_correcto))
			if($request->resolucion_concesion_minera_correcto == true)
				$request->resolucion_concesion_minera_correcto = 1;
			else $request->resolucion_concesion_minera_correcto = 0;
		else//($request->resolucion_concesion_minera_correcto == 'nada')
			$request->resolucion_concesion_minera_correcto = null;

		if(is_bool($request->titulo_contrato_posecion_correcto))
			if($request->titulo_contrato_posecion_correcto == true)
				$request->titulo_contrato_posecion_correcto = 1;
			else $request->titulo_contrato_posecion_correcto = 0;
		else//($request->titulo_contrato_posecion_correcto == 'nada')
			$request->titulo_contrato_posecion_correcto = null;
		//dd($request->obs_numero_expdiente);
		//die();
		//var_dump($request->lista_minerales[1]['evaluacion_correcto']);die();
		if($formulario_provisorio != null)
		{
			//lo encontre y actualizo
			//pregunto si soy autoridad minera o si soy productor
			if(false){ // soy autoridad minera
				$formulario_provisorio->numero_expdiente_correcto = $request->numero_expdiente_correcto;
				$formulario_provisorio->obs_numero_expdiente = $request->obs_numero_expdiente;
	
				$formulario_provisorio->categoria_correcto = $request->categoria_correcto;
				$formulario_provisorio->obs_categoria = $request->obs_categoria;
	
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
				foreach ($request->lista_minerales as $mineral) {
					//primero tengo que buscar el registro que voy a actualizar

					$nuevo_min = Minerales_Borradores::select('*')
					->where('id_formulario','=',$request->id)
					->where('id_mineral','=',$mineral['id_mineral'])
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

					if($nuevo_min != null){// encontre el mineral a actualizar
						//solo voy a modifciar los campos que puede escribir la autoridad
						//modifico el valor para guardarlo en pgadmin
						if(is_bool($mineral['evaluacion_correcto']))
							if($mineral['evaluacion_correcto'] == true)
							$nuevo_min->evaluacion_correcto = 1;
							else $nuevo_min->evaluacion_correcto = 0;
						else//($request->resolucion_concesion_minera_correcto == 'nada')
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
					}
					else continue; // no encuntre el mineral que me esta pasando
				}
				return response()->json("se actualizaron los datos correctamente");
			}
			else{//soy productor
				//lo encontre y actualizo
				var_dump("entre como productor");
				//dd($request->categoria);die();
				$formulario_provisorio->numero_expdiente = $request->numero_expdiente;
				$formulario_provisorio->categoria = $request->categoria;
				$formulario_provisorio->nombre_mina = $request->nombre_mina;
				$formulario_provisorio->descripcion_mina = $request->descripcion_mina;

				$formulario_provisorio->distrito_minero = $request->distrito_minero;
				$formulario_provisorio->mina_cantera = $request->mina_cantera;
				//$formulario_provisorio->plano_inmueble = $request->plano_inmueble;
				//$formulario_provisorio->resolucion_concesion_minera = $request->resolucion_concesion_minera;

				//$formulario_provisorio->titulo_contrato_posecion = $request->titulo_contrato_posecion;
				//$formulario_provisorio->resolucion_concesion_minera = $request->resolucion_concesion_minera;

				$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
				$formulario_provisorio->save();

				//antes de guardar los minerales voy re visar si ya hay minerales. si los hay , los voy a borrar
				//y luego voy a meter los nuevos minerales
				$resultado = Minerales_Borradores::where('id_formulario', '=', $request->id)->delete();
				//var_dump($resultado);
				
				$i = 0;
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
					$nuevo_min->lista_de_minerales_array = null;
					$nuevo_min->thumb = $mineral['thumb'];
					$nuevo_min->created_by = Auth::user()->id;
					$nuevo_min->estado = "en proceso";
					$nuevo_min->updated_by =  Auth::user()->id;

					$nuevo_min->created_at =  null;
					$nuevo_min->updated_at =  null;

					$nuevo_min->save();
				}
				return response()->json("se actualizaron los datos correctamente");
			}
		}
		else{
			return response()->json("formulario no encontrado");
		}
	}

	public function correccion_guardar_paso_cinco(Request $request)
	{
		var_dump(
			/*$request->owner, 
			$request->owner_correcto, 
			$request->obs_owner, 
			$request->obs_owner_valido, */

			/*$request->arrendatario, 
			$request->arrendatario_correcto, 
			$request->obs_arrendatario, 
			$request->obs_arrendatario_valido, */

			/*$request->concesionario, 
			$request->concesionario_correcto, 
			$request->obs_concesionario, 
			$request->obs_concesionario_valido, */

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
			

			$request->valor_de_progreso, 
			$request->valor_de_aprobado, 
			$request->valor_de_reprobado, 

		);
		die();
		return response()->json("todo bien");
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


	public function correccion_guardar_paso_seis(Request $request)
	{
		/*var_dump(
			$request->razon_social, 
			$request->razon_social_valido, 
			$request->razon_social_correcto, 
			$request->obs_razon_social, 
			$request->obs_razon_social_valido, 

			$request->email, 
			$request->email_valido, 
			$request->email_correcto, 
			$request->obs_email, 
			$request->obs_email_valido, 

			$request->cuit, 
			$request->cuit_valido, 
			$request->cuit_correcto, 
			$request->obs_cuit, 
			$request->obs_cuit_valido, 

			$request->numeroproductor, 
			$request->numeroproductor_valido, 
			$request->numeroproductor_correcto, 
			$request->obs_numeroproductor, 
			$request->obs_numeroproductor_valido, 

			$request->tiposociedad, 
			$request->tiposociedad_valido, 
			$request->tiposociedad_correcto, 
			$request->obs_tiposociedad, 
			$request->obs_tiposociedad_valido,


			$request->inscripciondgr, 
			$request->inscripciondgr_valido, 
			$request->inscripciondgr_correcto, 
			$request->obs_inscripciondgr, 
			$request->obs_inscripciondgr_valido,


			$request->constaciasociedad, 
			$request->constaciasociedad_valido, 
			$request->constaciasociedad_correcto, 
			$request->obs_constaciasociedad, 
			$request->obs_constaciasociedad_valido,


			$request->valor_de_progreso, 
			$request->valor_de_aprobado, 
			$request->valor_de_reprobado, 

		);*/
		return response()->json("todo bien");
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

	public function correccion_guardar_paso_todo(Request $request)
	{
		/*var_dump(
			$request->razon_social, 
			$request->razon_social_valido, 
			$request->razon_social_correcto, 
			$request->obs_razon_social, 
			$request->obs_razon_social_valido, 

			$request->email, 
			$request->email_valido, 
			$request->email_correcto, 
			$request->obs_email, 
			$request->obs_email_valido, 

			$request->cuit, 
			$request->cuit_valido, 
			$request->cuit_correcto, 
			$request->obs_cuit, 
			$request->obs_cuit_valido, 

			$request->numeroproductor, 
			$request->numeroproductor_valido, 
			$request->numeroproductor_correcto, 
			$request->obs_numeroproductor, 
			$request->obs_numeroproductor_valido, 

			$request->tiposociedad, 
			$request->tiposociedad_valido, 
			$request->tiposociedad_correcto, 
			$request->obs_tiposociedad, 
			$request->obs_tiposociedad_valido,


			$request->inscripciondgr, 
			$request->inscripciondgr_valido, 
			$request->inscripciondgr_correcto, 
			$request->obs_inscripciondgr, 
			$request->obs_inscripciondgr_valido,


			$request->constaciasociedad, 
			$request->constaciasociedad_valido, 
			$request->constaciasociedad_correcto, 
			$request->obs_constaciasociedad, 
			$request->obs_constaciasociedad_valido,


			$request->valor_de_progreso, 
			$request->valor_de_aprobado, 
			$request->valor_de_reprobado, 

		);*/
		return response()->json("todo bien");
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

	public function traer_provincias_json(){
		$lista_de_provincias = Provincias::select('id', 'nombre')->get();
		return response()->json($lista_de_provincias);
	}
	public function traer_departamentos_json(Request $request){
		//dd($request->id_prov);
		$departamentos = Departamentos::select('id', 'nombre')->where('provincia_id','=', $request->id_prov)->get();
		return response()->json($departamentos);

	}
	public function traer_localidades_json(Request $request){
		//dd($request->id_prov);
		$departamentos = Departamentos::select('id', 'nombre')->where('provincia_id','=', $request->id_prov)->get();
		return response()->json($departamentos);

	}
	
	public function traer_minerales_json(Request $request){
		//dd($request->id_manifestacion);
		$minerales = Minerales::select('id', 'name', 'categoria')->where('categoria','=', $request->categoria_buscando)->get();
		return response()->json($minerales);

	}


	public function pdf_para_comerciantes(){
    	$email  = "ochamplin@gmail.com";
    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
    	$data = [
            'date_generado' => date('d/m/Y'),
            //1
            'razon_social' =>  "Barrick de San juan",
            'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este" ,
			'leal_numero' => 184 ,
			'leal_telefono' => 1919815656 ,
			'leal_departamento' => "Chimbas" ,
			'leal_localidad' => "Chimbas City" ,
			'leal_cp' => 5236 ,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' =>18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' =>'zona 4'

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

	public function pdf_para_industrial(){
    	$email  = "ochamplin@gmail.com";
    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
    	$data = [
            'date_generado' => date('d/m/Y'),
            //1
            'razon_social' =>  "Barrick de San juan",
            'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este" ,
			'leal_numero' => 184 ,
			'leal_telefono' => 1919815656 ,
			'leal_departamento' => "Chimbas" ,
			'leal_localidad' => "Chimbas City" ,
			'leal_cp' => 5236 ,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' =>18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' =>'zona 4'

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
	
	public function pdf_para_transito(){
    	$email  = "ochamplin@gmail.com";
    	date_default_timezone_set('America/Argentina/Buenos_Aires');
		//habria q buscar en la bd los datos a poner dentro del pdf
    	$data = [
            'date_generado' => date('d/m/Y'),
            //1
            'razon_social' =>  "Barrick de San juan",
            'numeroproductor' => 1198981,
			//2
			'leal_calle' => "Sargento cabral este" ,
			'leal_numero' => 184 ,
			'leal_telefono' => 1919815656 ,
			'leal_departamento' => "Chimbas" ,
			'leal_localidad' => "Chimbas City" ,
			'leal_cp' => 5236 ,

			// //4
			'nombre_mina' => "la mina de Oro",
			'numero_expdiente' =>18118,
			'localidad_mina_departamento' => "Sarmiento",
			'distrito_minero' => 4894,
			'localidad_mina_localidad' => "san juan",

			'zona_mina_provincia' =>'zona 4'

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
