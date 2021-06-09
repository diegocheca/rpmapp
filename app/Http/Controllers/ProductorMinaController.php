<?php

namespace App\Http\Controllers;


use App\Models\ProductorMina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductorMinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productorminas = ProductorMina::all();
        return Inertia::render('ProductorMina/List', ['productores_y_minas' => $productorminas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('ProductorMina/Form');
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
        /*dd($request->id_mina);
        $request->validate([
                'id_mina',
                'id_productor',
                'id_destino',
                'id_dia',
                'id_personal',
                'mercado_provincia',
                'mercado_provincias',
                'mercado_exportacion',
                'num_expediente_SIGETRAMI',
                'constancia_otros',
                'resol_concecion_minera',
                'fecha_preinscripcion',
                'fecha_renovacion',
                'primera_inscripcion',
                'caracter',
                'constancia_posecion',
                'id_producido'
        ]);*/
        ProductorMina::create($request->all());
        return Redirect::route('productores_minas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function show(ProductorMina $productorMina)
    {
        //
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productorMina = ProductorMina::find($id);
        return Inertia::render('ProductorMina/EditForm', ['productorMina' => $productorMina]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductorMina $productorMina)
    {
        //
        $productorMina->update($request->all());
        return Redirect::route('productores_minas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductorMina  $productorMina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_a_buscar)
    {
        //
        //var_dump($id);die();
        
        if ( ($id_a_buscar != null) && (is_numeric($id_a_buscar)))
        {
            ProductorMina::find($id_a_buscar)->delete();
            return Redirect::route('productores_minas.index');
        }
        return false;

    }
}
