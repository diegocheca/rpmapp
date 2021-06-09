<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use Illuminate\Support\Facades\Validator;



class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Productos::all();
        //$data = Productos::orderBy('id', 'desc')->paginate(2);
        //var_dump($data);die();
        return Inertia::render('Productos/List', ['data' => $data]);


  


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Productos/Form');
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
        Validator::make($request->all(), [
            'id_reinscripcion' => ['required'],
            'nombre_mineral' => ['required'],
            'variedad' => ['required'],
            'produccion' => ['required'],
            'unidades' => ['required'],
            'precio_venta' => ['required'],
            'created_by' => ['required'],
            'estado' => ['required'],

        ])->validate();
  
        Productos::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Producto Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $producto)
    {
        //
        return Inertia::render('Productos/EditForm', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $producto)
    {
        //
       /* Validator::make($request->all(), [
            'id_reinscripcion' => ['required'],
            'nombre_mineral' => ['required'],
            'variedad' => ['required'],
            'produccion' => ['required'],
            'unidades' => ['required'],
            'precio_venta' => ['required'],
            'created_by' => ['required'],
            'estado' => ['required'],

        ])->validate();
  
        if ($request->has('id')) {
            Productos::find($request->input('id'))->update($request->all());
           // return Redirect::route('reinscripciones.index');
        }*/
        $producto->update($request->all());
        return Redirect::route('productos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $producto)
    {
        //
        $producto->delete();
        return Redirect::route('productos.index');
    }
}
