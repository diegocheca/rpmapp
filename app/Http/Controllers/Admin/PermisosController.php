<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Admin\Category;
use Exception;

class PermisosController extends Controller
{
    function __construct()
    {
        $this->middleware('can:admin.permisos.index')->only('index');
        $this->middleware('can:admin.permisos.edit')->only('edit', 'update');
        $this->middleware('can:admin.permisos.create')->only('create', 'store');
        $this->middleware('can:admin.permisos.destroy')->only('destroy');
    }
    public function index()
    {
        $permisos = Permission::all();
        return  Inertia::render('Admin/Permisos/index', ['permisos' => $permisos]);
    }

    public function create()
    {
        $categories = Category::all('id', 'name');
        // echo $categories;

        return  Inertia::render('Admin/Permisos/create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $cateReq = $request->category_id;
        $fun = strtolower($request->M_name);
        $nom = '';
        if ($cateReq == 2) {
            if ($fun === 'ninguno') {
                $nom = $request->name;
                // dd($cat . '.' . $request->name);
            } else {
                $nom = $request->name . '.' . $fun;
                // dd($cat . '.' . $request->name . '.' . $fun);
            }
        } else {
            $cat = Category::find($request->category_id);
            $cat = strtolower($cat->name);
            // $fun = strtolower($request->M_name);
            // $nom = '';
            if ($fun === 'ninguno') {
                $nom = $cat . '.' . $request->name;
                // dd($cat . '.' . $request->name);
            } else {
                $nom = $cat . '.' . $request->name . '.' . $fun;
                // dd($cat . '.' . $request->name . '.' . $fun);
            }
        }
        // dd($nom);
        $request->validate([
            'name',
            'description',
        ]);
        $permisos = Permission::create(['guard_name' => 'web', 'name' => $nom, 'description' => $request->description, 'category_id' => $request->category_id])->assignRole('Administrador');

        return Redirect::route('admin.permisos.index', $permisos);
    }

    public function show($id)
    {
        //
    }

    public function edit(Permission $permiso)
    {
        $metodos = array('ninguno', 'index', 'create', 'store', 'show', 'edit', 'update', 'destroy');
        // var_export($metodos);
        $cat_id = $permiso->category_id;
        // dd($cat_id);

        $nom = explode('.', $permiso->name);
        if ($cat_id == 2) {
            $nombre = $nom[0];
            $met = $nom[1];
            $cat = $cat_id;
        } else {
            if (sizeof($nom) == 3) {
                $nombre = $nom[1];
                $met = $nom[2];
                $categories = Category::all('id', 'name');
                $cat = Category::where('name', $nom[0])->get();
                $cat = $cat[0]->id;
                // echo $nom[1];
                // echo $nom[2];
            } else {
                $nombre = $nom[0];
                $categories = Category::all('id', 'name');
                $cat = Category::where('name', $nom[0])->get();
                $cat = $cat[0]->id;
                $met = $nom[1];
            }
        }
        if (!in_array($met, $metodos, true)) {
            $nombre = $nombre . '.' . $met;
            $met = 'ninguno';
        }

        return  Inertia::render('Admin/Permisos/edit', ['name' => $nombre, 'permisos' => $permiso, 'metodo' => $met, 'categoria' => $cat, 'categories' => $categories]);
    }

    public function update(Request $request, Permission $permiso)
    {
        $request->validate([
            'name',
            'description'
        ]);

        $cat = Category::find($request->category_id);
        $cat = strtolower($cat->name);
        $fun = strtolower($request->M_name);
        $nom = '';
        if ($fun === 'ninguno') {
            $nom = $cat . '.' . $request->name;
            // dd($cat . '.' . $request->name);
        } else {
            $nom = $cat . '.' . $request->name . '.' . $fun;
            // dd($cat . '.' . $request->name . '.' . $fun);
        }
        $permiso->update([
            // 'name' => $request->name,
            // 'description' => $request->description,
            // 'guard_name' => 'web', 
            'name' => $nom,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return Redirect::route('admin.permisos.index', $permiso)->with('info', 'El permisos se actualizó con éxito');
    }

    public function destroy($id)
    {
        // $permiso->delete();
        // return Redirect::route('admin.permisos.index')->with('info', 'El permisos se se eliminó con éxito');
        try {
            $rol = Permission::find($id)->delete();
            return response()->json([
                'status' => 'ok',
                'msg' => 'se elimino correctamente',
                'id_eliminado' => $id
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => $e,
            ], 500);
        }
    }
}
