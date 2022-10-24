<?php

namespace App\Http\Controllers;

use App\Models\Pagocanonmina;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;

use Auth;


use App\Models\MinaCantera;
use App\Models\Productores;

use App\Models\iia_dia;
use Illuminate\Support\Facades\Storage;
use App\Models\Minerales_Borradores;
use App\Models\FormAltaProductor;
use App\Models\FormAltaProductorCatamarca;
use App\Models\User;


class PagocanonminaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$pagos = Pagocanonmina::all();
        if (Auth::user()->hasRole('Administrador')) {
            return Inertia::render('Pagos/List', [
                'pagos' => DB::table('pagocanonmina')
                            ->join('productor_mina', 'pagocanonmina.id_prod_min', '=', 'productor_mina.id')
                            ->join('mina_cantera', 'productor_mina.id_mina', '=', 'mina_cantera.id')
                            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'mina_cantera.id_formulario')
                            ->select('pagocanonmina.*')
                            ->whereNull('pagocanonmina.deleted_at')
                            ->orderBy('id', 'DESC')
                            ->paginate(5)
            ]);
        }
        if (Auth::user()->hasRole('Autoridad')) {
            return Inertia::render('Pagos/List', [
                'pagos' => DB::table('pagocanonmina')
                            ->join('productor_mina', 'pagocanonmina.id_prod_min', '=', 'productor_mina.id')
                            ->join('mina_cantera', 'productor_mina.id_mina', '=', 'mina_cantera.id')
                            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'mina_cantera.id_formulario')
                            ->select('pagocanonmina.*')
                            ->where('form_alta_productores.provincia', '=', Auth::user()->id_provincia)
                            ->whereNull('pagocanonmina.deleted_at')
                            ->orderBy('id', 'DESC')
                            ->paginate(5)
            ]);
        }
        else { // productor
                return Inertia::render('Pagos/List', [
                    'pagos' => DB::table('pagocanonmina')
                                ->join('form_alta_productores', 'pagocanonmina.id_formulario', '=', 'form_alta_productores.id')
                                ->select('pagocanonmina.*')
                                ->where('form_alta_productores.created_by', '=', Auth::user()->id)
                                ->whereNull('pagocanonmina.deleted_at')
                                ->orderBy('id', 'DESC')

                                ->paginate(5)
                ]);
    
        }


        //return Inertia::render('Pagos/List', ['pagos' => $pagos]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productores =  DB::table('productor_mina')
                        ->join('productores', 'productores.id', '=', 'productor_mina.id_productor')
                        ->join('mina_cantera', 'mina_cantera.id', '=', 'productor_mina.id_mina')
                        ->select('productor_mina.id','mina_cantera.nombre','productores.razonsocial',)
                        ->orderBy('productor_mina.id', 'DESC')
                        ->get();

        return Inertia::render('Pagos/Form', [
            'productores' => $productores,
        ]);

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $request->created_by=Auth::user()->id;

        $result = Pagocanonmina::create($request->all());
        //dd($result);
        return Redirect::route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagocanonmina  $pagocanonmina
     * @return \Illuminate\Http\Response
     */
    public function show($id_pago)
    {
        $productores =  DB::table('productor_mina')
        ->join('productores', 'productores.id', '=', 'productor_mina.id_productor')
        ->join('mina_cantera', 'mina_cantera.id', '=', 'productor_mina.id_mina')
        ->select('productor_mina.id','mina_cantera.nombre','productores.razonsocial',)
        ->orderBy('productor_mina.id', 'DESC')
        ->get();

        $pago = Pagocanonmina::find($id_pago);
          return Inertia::render('Pagos/EditForm', ['pago' => $pago,'productores' => $productores,'accion' => "show"]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagocanonmina  $pagocanonmina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productores =  DB::table('productor_mina')
        ->join('productores', 'productores.id', '=', 'productor_mina.id_productor')
        ->join('mina_cantera', 'mina_cantera.id', '=', 'productor_mina.id_mina')
        ->select('productor_mina.id','mina_cantera.nombre','productores.razonsocial',)
        ->orderBy('productor_mina.id', 'DESC')
        ->get();

        $pago = Pagocanonmina::find($id);
          return Inertia::render('Pagos/EditForm', ['pago' => $pago,'productores' => $productores,'accion' => "edit"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagocanonmina  $pagocanonmina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagocanonmina $pagocanonmina)
    {
        //
        $pagocanonmina->update($request->all());
        return Redirect::route('pagos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagocanonmina  $pagocanonmina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pago)
    {
        //
        $pago = Pagocanonmina::find($id_pago);
        $pago->delete();
         //$pagocanonmina->delete();
        return Redirect::route('pagos.index');
    }








    public function pasar_num_a_boolean($objeto)
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

            "boton_actualizar_mina" => false,

            "observacion" => true,
            "cargo_empresa" => true,
            "presentador_nombre" => true,
            "presentador_dni" => true,
            "created_by" => true,
            "estado" => true,


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
			"paso_uno" => false,


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
			"paso_dos" => false,



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
			"paso_tres" => false,

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
			"contancias_canon" => true,
			"constancias_canon_correccion" => true,
			"dia" => false,
			"dia_correccion" => false,
			"iia" => false,
			"iia_correccion" => false,
			"acciones" => false,
			"acciones_correccion" => false,
			"actividades" => false,
			"actividades_correccion" => false,
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


            "observacion" => false,
            "cargo_empresa" => false,
            "presentador_nombre" => false,
            "presentador_dni" => false,
            "created_by" => false,
            //"estado" => true,

            "boton_actualizar_mina" => true,


			"estado" => false,

			"boton_actualizar" => false,

			"alerta_puede_editar" => false,
		];

		if ($pagina == 'editar') {
			if (Auth::user()->hasRole('Productor')) {
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
					$mostrar["boton_guardar_uno"] = false;
					$mostrar["paso_uno"] = false;


					$mostrar["legal_calle_correccion"] = false;
					$mostrar["legal_calle_num_correccion"] = false;
					$mostrar["legal_telefono_correccion"] = false;
					$mostrar["legal_prov_correccion"] = false;
					$mostrar["legal_dpto_correccion"] = false;
					$mostrar["legal_localidad_correccion"] = false;
					$mostrar["legal_cod_pos_correccion"] = false;
					$mostrar["legal_otro_correccion"] = false;
					$mostrar["boton_guardar_dos"] = false;
					$mostrar["paso_dos"] = false;

					$mostrar["administracion_correccion"] = false;
					$mostrar["administracion_calle_num_correccion"] = false;
					$mostrar["administracion_telefono_correccion"] = false;
					$mostrar["administracion_prov_correccion"] = false;
					$mostrar["administracion_dpto_correccion"] = false;
					$mostrar["administracion_localidad_correccion"] = false;
					$mostrar["administracion_cod_pos_correccion"] = false;
					$mostrar["administracion_otro_correccion"] = false;
					$mostrar["boton_guardar_tres"] = false;
					$mostrar["paso_tres"] = false;

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
					$mostrar["boton_guardar_seis"] = false;
					$mostrar["paso_seis"] = false;

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
						$mostrar["paso_catamarca"] = false;
						$mostrar["boton_catamarca"] = false;
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
						$mostrar["paso_mendoza"] = false;
						$mostrar["boton_mendoza"] = false;
					}
			} elseif (Auth::user()->hasRole('Autoridad') || Auth::user()->hasRole('Administrador')) {

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
			}
		} 
		$a_devolver = [];
		$a_devolver['disables'] = $disables;
		$a_devolver['mostrar'] = $mostrar;
		return $a_devolver;
	}

}
