<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\FormAltaProductor;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use Auth;

use App\Models\Productor;
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
        /*$data = Productos::all();
        //$data = Productos::orderBy('id', 'desc')->paginate(2);
        //var_dump($data);die();
        return Inertia::render('Productos/List', ['productos' => $data]);
        */
        
        /*
        Producto 32
        reincripciones 225
        productor 1762
        user 158
        provincia 70
         */


                            
        if (Auth::user()->hasRole('Administrador') || Auth::user()->hasRole('Autoridad')) {
            return Inertia::render('Productos/List', [
                'productos' => DB::table('users')
                            ->join('productores', 'users.id', '=', 'productores.usuario_creador')
                            ->join('reinscripciones', 'reinscripciones.id_productor', '=', 'productores.id')
                            ->join('productos', 'reinscripciones.id', '=', 'productos.id_reinscripcion')
                            ->join('mineral', 'mineral.id', '=', 'productos.nombre_mineral')
                            ->select('productos.*', "mineral.name", "productores.razonsocial")
                            ->where('users.id_provincia', '=', Auth::user()->id_provincia)
                            ->orderBy('productos.id', 'DESC')
                            ->paginate(5)
                        ]);
                    }
        else { // productor
            $mi_productor_id = Productor::select('*')->where("usuario_creador","=", Auth::user()->id)->first();
            return Inertia::render('Productos/List', [
                'productos' => DB::table('productos')
                    ->join('reinscripciones', 'reinscripciones.id', '=', 'productos.id_reinscripcion')
                    ->select('productos.*')
                    ->where('reinscripciones.id_productor', '=', $mi_productor_id->id)
                    ->orderBy('productos.id', 'DESC')
                    ->paginate(5)
            ]);
        }
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
