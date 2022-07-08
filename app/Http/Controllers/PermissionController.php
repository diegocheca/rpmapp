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

    public function buscar_permisos_formulario($prov,$accion,$formulario,$pagina){
        if($prov == 0){
            $prov = Auth::user()->id_provincia;
        }
        //ver de donde saco el estado
        $estado = 0;
        $permisos_a_pasar = -1;
		// 1 Administrator - 2 user - 3 Autoridad -4 Productor
		if(Auth::user()->hasRole('Administrador'))
			$permisos_a_pasar = 1;
		elseif(Auth::user()->hasRole('Autoridad'))
			$permisos_a_pasar = 3;
		elseif(Auth::user()->hasRole('Productor'))
			$permisos_a_pasar = 4;
		if($permisos_a_pasar == -1){
			return var_dump("error en sesion");
		}
        $resultado = Permission::dame_permisos($prov ,$permisos_a_pasar, $formulario, $accion , $estado, $pagina);
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
