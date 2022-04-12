<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Exception;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.edit')->only('edit', 'update');
        $this->middleware('can:admin.categorias.create')->only('create', 'store');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }

    public function index()
    {
        $categorias = Category::all();
        return  Inertia::render('Admin/Categorias/index', ['categorias' => $categorias]);
    }

    public function create()
    {
        return  Inertia::render('Admin/Categorias/create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name',
            'description',
        ]);
        $nom = strtolower($request->name);
        $categorias = Category::create(['name' => $nom, 'description' => $request->description]);

        return Redirect::route('admin.categorias.index', $categorias);
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $categoria)
    {
        return  Inertia::render('Admin/Categorias/edit', ['categoria' => $categoria]);
    }

    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'name',
            'description'
        ]);
        $categoria->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return Redirect::route('admin.categorias.index')->with('info', 'El permisos se actualizó con éxito');
    }

    public function destroy($id)
    {
        // $categoria->delete();
        // return Redirect::route('admin.categorias.index')->with('info', 'El permisos se se eliminó con éxito');
        try {
            $rol = Category::find($id)->delete();
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
