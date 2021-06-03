<?php

namespace App\Http\Controllers;

use App\Models\Reinscripciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ReinscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reinscripciones = Reinscripciones::all();
        return Inertia::render('Reinscripciones/List', ['reinscripciones' => $reinscripciones]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Reinscripciones/Form');
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

        dd($request->id_mina);
        $request->validate([
                'id_mina',
                'id_productor',
                'fecha_vto',
                'prospeccion',
                'exploracion',
                'explotacion',
                'desarrollo',
                'cantidad_productos',
                'porcentaje_venta_provincia',
                'porcentaje_venta_otras_provincias',
                'porcentaje_exportado',
                'personal_perm_profesional',
                'personal_perm_operarios',
                'personal_perm_administrativos',
                'personal_perm_otros',
                'personal_trans_profesional',
                'personal_trans_operarios',
                'personal_trans_administrativos',
                'personal_trans_otros',
                'nombre',
                'dni',
                'cargo',
                'created_by',
                'estado',
        ]);
        Reinscripciones::create($request->all());

        return Redirect::route('reinscripciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Reinscripciones $reinscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reinscripciones $reinscripcion)
    {
        //
        return Inertia::render('Reinscripciones/EditForm', ['reinscripcion' => $reinscripcion]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reinscripciones $reinscripcion)
    {
        //
        $reinscripcion->update($request->all());
        return Redirect::route('reinscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reinscripciones  $reinscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reinscripciones $reinscripcion)
    {
        //
        var_dump($reinscripcion);die();
        
        //$resultado = $reinscripcion->delete();
        return Redirect::route('reinscripciones.index');
    }
}
