<?php

namespace App\Http\Controllers;

use App\Models\Productores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productores = Productores::all();
        return Inertia::render('Productores/List', ['productores' => $productores, 'alertType'=>'success']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Productores/Form');
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
        Productores::create($request->all());
        return Redirect::route('productores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productores  $productores
     * @return \Illuminate\Http\Response
     */
    public function show(Productores $productores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productores  $productores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productor = Productores::find($id);
        //dd($productorMina);
        return Inertia::render('Productores/EditForm', ['productor' => $productor]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productores  $productores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productores $productores)
    {
        //
        $productores->update($request->all());
        return Redirect::route('productores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productores  $productores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_a_buscar)
    {
        //
        if ( ($id_a_buscar != null) && (is_numeric($id_a_buscar)))
        {
            Productores::find($id_a_buscar)->delete();
            return Redirect::route('productores.index');
        }
        return false;

    }
}
