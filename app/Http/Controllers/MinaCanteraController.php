<?php

namespace App\Http\Controllers;

use App\Models\MinaCantera;
use Illuminate\Http\Request;

use App\Models\iia_dia;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MinaCanteraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Inertia::render('Minas/List', 
        [
            'minas' => DB::table('mina_cantera')
            ->join('form_alta_productores', 'form_alta_productores.id', '=', 'mina_cantera.id_formulario')
            ->join('users', 'users.id', '=', 'form_alta_productores.created_by')
            ->join('productores', 'productores.id_formulario', '=', 'form_alta_productores.id')
            ->select('mina_cantera.*','productores.razonsocial','productores.id as id_prod','users.profile_photo_path')
            ->orderBy('id', 'DESC')
            ->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MinaCantera  $minaCantera
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MinaCantera  $minaCantera
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MinaCantera  $minaCantera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MinaCantera  $minaCantera
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
