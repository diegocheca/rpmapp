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

use \PDF;

use Illuminate\Support\Facades\Storage;

class FormAltaProductorController extends Controller
{
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
		return Inertia::render('Productors/Form');
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
		//dd($borradores);
		return Inertia::render('Productors/EditForm', ['productor' => $borradores]);
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
		//return response()->json("todo bien");
		/*
		Prueba
		var_dump(
			$request->cuit_correcto,
			$request->obs_cuit,
			$request->razon_social_correcto,
			$request->obs_razon_social,
			$request->numeroproductor_correcto,
			$request->obs_numeroproductor,
			$request->email_correcto,
			$request->obs_email,
			$request->tiposociedad_correcto,

			$request->obs_tiposociedad,
			$request->inscripciondgr_correcto,
			$request->obs_inscripciondgr,
			$request->constaciasociedad_correcto,
			$request->obs_constaciasociedad,
			$request->valor_de_progreso,
			$request->valor_de_aprobado,
			$request->valor_de_reprobado
		);
		return response()->json("todo bien");
		die();
		*/

		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$formulario_provisorio = FormAltaProductor::select('id','razonsocial','cuit','numeroproductor','tiposociedad',	'email','inscripciondgr','constaciasociedad',
        'cuit_correcto',
        'obs_cuit',
        'razon_social_correcto',
        'obs_razon_social',
        'numeroproductor_correcto',
        'obs_numeroproductor',
        'email_correcto',
        'obs_email',
        'tiposociedad_correcto',
        'obs_tiposociedad',
        'inscripciondgr_correcto',
        'obs_inscripciondgr',
        'constaciasociedad_correcto',
        'obs_constaciasociedad',
        'paso_1_progreso',
        'paso_1_aprobado',
        'paso_1_reprobado'
    )
		->where('id', '=',$request->id)->first();
		//arreglo las variables
		if($request->cuit_correcto == 'nada')
			$request->cuit_correcto = null;

		if($request->razon_social_correcto == 'nada')
			$request->razon_social_correcto = null;

		if($request->numeroproductor_correcto == 'nada')
			$request->numeroproductor_correcto = null;

		if($request->email_correcto == 'nada')
			$request->email_correcto = null;

		if($request->tiposociedad_correcto == 'nada')
			$request->tiposociedad_correcto = null;

		if($request->inscripciondgr_correcto == 'nada')
			$request->inscripciondgr_correcto = null;

		if($request->constaciasociedad_correcto == 'nada')
			$request->constaciasociedad_correcto = null;

		if($formulario_provisorio != null)
		{
			//lo encontre y actualizo
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
			$formulario_provisorio->updated_by = Auth::user()->id;
			$formulario_provisorio->save();
			return response()->json("se actualizaron los datos correctamente");

		}
		else
		{
			return response()->json("formulario no encontrado");
		}
	}

	public function correccion_guardar_paso_dos(Request $request)
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


	public function correccion_guardar_paso_tres(Request $request)
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


	public function correccion_guardar_paso_cuatro(Request $request)
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

	public function correccion_guardar_paso_cinco(Request $request)
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



	
	
}
