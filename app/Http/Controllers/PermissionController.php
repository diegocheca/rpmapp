<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\EmailsAConfirmar;
use App\Http\Controllers\ChartsController;
use App\Models\Provincias;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/PermisosNuevos/permisos');
        //
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
    public function get_permisos_form($rol,$estado,$accion, $pagina, $provincia,$formulario){
        $resultado = Permission::query_permissions_all_page($provincia ,$rol, $formulario, $accion , $estado, $pagina);
        //dd($resultado); 
        if(!empty($resultado )) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Permisos encontrados.',
                'permisos' => json_encode($resultado[0])
            ], 201);
        }
        else {
            return response()->json([
                'status' => 'error',
                'msg' => 'Permisos no encontrados.',
                'permisos' => false
            ], 201);
        }

    }
    public function update_permisos_form(Request $request) {
        //$resultado = Permission::query_permissions_all_page($provincia ,$rol, $formulario, $accion , $estado, $pagina);
        $row_to_update = Permission::update_query_permissions_all_page($request->provincia ,$request->rol, $request->formulario, $request->accion , $request->estado, $request->pagina, $request->permisos, $request->id);
        if($row_to_update){
            return response()->json([
                'status' => 'success',
                'msg' => 'Permisos encontrados.',
                'permisos' => true
            ], 201);
        }
        else {
            return response()->json([
                'status' => 'error',
                'msg' => 'Permisos No guardados.',
                'permisos' => false
            ], 201);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StorePermissionRequest $request)
    public function store(Request $request)
    {
        dd("en el store");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
