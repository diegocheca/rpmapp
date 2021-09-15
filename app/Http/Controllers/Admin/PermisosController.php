<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    function __construct()
    {
        $this->middleware('can:admin.permisos.index')->only('index');
        $this->middleware('can:admin.permisos.edit')->only('edit','update');
        $this->middleware('can:admin.permisos.create')->only('create','store');
        $this->middleware('can:admin.permisos.destroy')->only('destroy');
    }
    public function index()
    {
        $permisos = Permission::all();
        return  Inertia::render('Admin/Permisos/index', ['permisos' => $permisos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  Inertia::render('Admin/Permisos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name',
            'description'
        ]);
        $permisos = Permission::create(['guard_name' => 'web', 'name' => $request->name, 'description' => $request->description]);

        return Redirect::route('admin.permisos.index', $permisos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permiso)
    {
        // echo $permiso;
        return  Inertia::render('Admin/Permisos/edit', ['permisos' => $permiso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permiso)
    {
        $request->validate([
            'name',
            'description'
        ]);
        $permiso->update([
            'name' => $request->name,
            'description' => $request->description,
            // 'guard_name' => 'web',
        ]);
        return Redirect::route('admin.permisos.index',$permiso)->with('info', 'El permisos se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return Redirect::route('admin.permisos.index')->with('info', 'El permisos se se eliminó con éxito');
    }
}
