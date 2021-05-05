<?php

namespace App\Http\Controllers;

use App\Models\Productors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
class ProductorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productors = Productors::all();
        return Inertia::render('Productors/List', ['productors' => $productors]);
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
        //
        $request->validate(
            [
                'cuit',
                'razonsocial' => 'required',
                'numeroproductor' => 'required',
                'email'=> 'required',
                'domicilio_prod'=> 'required',
                'tiposociedad'=> 'required',
                'inscripciondgr'=> 'required',
                'constaciasociedad'=> 'required',
                'leal_calle'=> 'required',
                'leal_numero'=> 'required',
                'leal_telefono'=> 'required'
                /*'leal_pais',
                'leal_provincia',
                'leal_departamento',
                'leal_localidad',
                'leal_cp',
                'leal_otro',
                'administracion_calle',
                'administracion_numero',
                'administracion_telefono',
                'administracion_pais',
                'administracion_provincia',
                'administracion_departamento',
                'administracion_localidad',
                'administracion_cp',
                'administracion_otro',
                'numero_expdiente',
                'categoria',
                'nombre_mina',
                'descripcion_mina',
                'distrito_minero',
                'mina_cantera',
                'plano_inmueble',
                'minerales_variedad',
                'owner',
                'arrendatario',
                'concesionario',
                'otros',
                'titulo_contrato_posecion',
                'resolucion_concesion_minera',
                'constancia_pago_canon',
                'iia',
                'dia',
                'acciones_a_desarrollar',
                'actividad',
                'fecha_alta_dia',
                'fecha_vencimiento_dia',
                'localidad_mina_pais',
                'localidad_mina_provincia',
                'localidad_mina_departamento',
                'localidad_mina_localidad',
                'tipo_sistema',
                'longitud',
                'latitud',
                'created_by',
                'estado'*/
                    ]
        );

        Product::create($request->all());

        return Redirect::route('productors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productors  $productors
     * @return \Illuminate\Http\Response
     */
    public function show(Productors $productors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productors  $productors
     * @return \Illuminate\Http\Response
     */
    public function edit(Productors $productor)
    {
       /* var_dump($productors);
        die();*/
        //$pro
        return Inertia::render('Productors/EditForm', ['productor' => $productor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productors  $productors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productors $productors)
    {
        //
        $productors->update($request->all());
        return Redirect::route('productors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productors  $productors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productors $productor)
    {
        //
        //var_dump($productors->delete());die();
        $productor->delete();
        return Redirect::route('productors.index');
    }
}
