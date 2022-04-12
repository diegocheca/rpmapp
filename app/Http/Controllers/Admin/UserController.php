<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CountriesController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::with(['roles', 'provincia'])->orderBy('id')->get();
        //  echo $users;
        return  Inertia::render('Users/listarUsers', ['usuarios' => $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $provincias = CountriesController::getProvinces();
        // echo $provincias;
        $user->hasRole(Role::all());
        $roles = Role::all();
        // echo $roles;
        $rolesAll = [];
        $rolee = [];
        $arrayRolAll = [];
        $rolesUserId = [];
        for ($i = 0; $i < sizeof($roles); $i++) {
            $rol = $roles[$i];
            $rolee = array(
                'id' => $rol->id,
                'name' => $rol->name,
                'value' => false,
            );
            $userRol = $user->roles;
            for ($j = 0; $j < sizeof($userRol); $j++) {
                $key =  $userRol[$j];
                if ($key->id == $rol->id) {
                    $rolee = array(
                        'id' => $rol->id,
                        'name' => $rol->name,
                        'value' => true,
                    );
                    array_push($rolesUserId, $key->id);
                }
            }
            $arrayRolAll = collect($rolee);
            // echo $arrayRolAll;
            array_push($rolesAll, $arrayRolAll);
        };
        $rolesUserId = collect($rolesUserId);
        $rolesAll = (collect($rolesAll));
        // echo $rolesUserId;

        // $rol = [
        //     ['id' => 1, 'name' => 'rol 1', 'value' => true],
        //     ['id' => 2, 'name' => 'rol 2', 'value' => false],
        // ];
        // array_push($rol, ['id' => 3, 'name' => 'rol 3', 'value' => false]);
        // dd(collect($rol)->toJson());
        // $rolesP = (collect($rol)); //->toJson());
        // $user->hasExactRoles(Role::all()->pluck('id','name'));
        // $usuario = $user->getRoleNames(); // Returns a collection
        // echo $rolesP;
        return  Inertia::render('Users/UserEditar', ['usuario' => $user, 'roles' => $rolesAll, 'rolesUser' => $rolesUserId, 'provincias' => $provincias]);
    }

    public function update(Request $request, User $user)
    {
        $nameProvincia = CountriesController::getProvince($request->idProv);
        $nameProvincia = $nameProvincia->label;
        // dd($nameProvincia);
        // echo collect($request->get('checkedroles'));
        // $user->update($request->all());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'id_provincia' => $request->idProv,
            'provincia' => $nameProvincia,
        ]);

        if ($request->get('checkedroles')) {
            $user->roles()->sync($request->get('checkedroles'));
        }
        return Redirect::route('admin.users.index');
    }

    public function destroy($id)
    {
        // dd($user);
        try {
            $usuario = User::find($id)->delete();
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
