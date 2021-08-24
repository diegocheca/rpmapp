<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin\Category;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
    }

    public function index()
    {
        // $roles = Role::all();
        $roles = Role::with('permissions')->orderBy('id')->get();
        return  Inertia::render('Admin/Roles/index', ['roles' => $roles]);
    }

    public function create()
    {
        $permisos = Permission::all();
        $categories = Category::all('id', 'name');

        return  Inertia::render('Admin/Roles/create', ['permisos' => $permisos, 'categorias' => $categories]);
    }

    public function store(Request $request)
    {
        // dd ($request);
        $request->validate([
            'name'
        ]);
        // $role = Role::create($request->all());
        $role = Role::create(['guard_name' => 'web', 'name' => $request->name]);
        // $role->permissions()->sync($request->checkedpermisos);

        if ($request->get('checkedpermisos')) {
            $role->permissions()->sync($request->get('checkedpermisos'));
        }
        return Redirect::route('admin.roles.index', $role)->with('info', 'El rol se creó con éxito');
    }

    public function show(Role $role)
    {
        return  Inertia::render('Admin/Roles/show');
    }

    public function edit(Role $role)
    {
        $role->hasAllPermissions(Permission::all());
        $categories = Category::all('id', 'name');
        // $categories = Category::with('permissions')->get();
        // dd ($role);
        // echo $categories;
        $permisos = Permission::all();
        // echo $permisos;
        $permisosAll = [];
        $permisoo = [];
        $arrayPerAll = [];
        $permisosRoles = [];
        for ($i = 0; $i < sizeof($permisos); $i++) {
            $per = $permisos[$i];
            $permisoo = array(
                'id' => $per->id,
                'name' => $per->name,
                'description' => $per->description,
                'category_id' => $per->category_id,
                'value' => false,
            );
            $rolPerm = $role->permissions;
            for ($j = 0; $j < sizeof($rolPerm); $j++) {
                $key =  $rolPerm[$j];
                if ($key->id == $per->id) {
                    $permisoo = array(
                        'id' => $per->id,
                        'name' => $per->name,
                        'description' => $per->description,
                        'category_id' => $per->category_id,
                        'value' => true,
                    );
                    array_push($permisosRoles, $key->id);
                }
            }
            $arrayPerAll = collect($permisoo);
            // echo $arrayPerAll;
            array_push($permisosAll, $arrayPerAll);
        };
        $permisosRoles = collect($permisosRoles);
        $permisosAll = (collect($permisosAll));
        // echo $permisosRoles;
        return  Inertia::render('Admin/Roles/edit', ['roles' => $role, 'permisos' => $permisosAll, 'permisosRoles' => $permisosRoles, 'categorias' => $categories]); //pasar informacion del Rol
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'
        ]);
        $role->update([
            'name' => $request->name,
            // 'guard_name' => 'web',
        ]);
        if ($request->get('checkedpermisos')) {
            $role->permissions()->sync($request->get('checkedpermisos'));
        }
        return Redirect::route('admin.roles.index', $role)->with('info', 'El rol se actualizó con éxito');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return Redirect::route('admin.roles.index')->with('info', 'El rol se se eliminó con éxito');
    }
}
