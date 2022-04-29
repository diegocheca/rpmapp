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
use App\Http\Controllers\Logs;
use Auth;
use Illuminate\Support\Arr;

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
        $user->hasRole(Role::all());
        $roles = Role::all();
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
            array_push($rolesAll, $arrayRolAll);
        };
        $rolesUserId = collect($rolesUserId);
        $rolesAll = (collect($rolesAll));
        return  Inertia::render('Users/UserEditar', ['usuario' => $user, 'roles' => $rolesAll, 'rolesUser' => $rolesUserId, 'provincias' => $provincias]);
    }

    public function update(Request $request, User $user)
    {
        try {
            $userLog = Auth::user()->name;
            $userActualizado = $user->name;
            $nameProvincia = CountriesController::getProvince($request->idProv);
            $nameProvincia = $nameProvincia->label;

            # Datos Actualizados
            $datosUpdate = array(
                'name' => $request->name,
                'email' => $request->email,
                'id_provincia' => $request->idProv,
                'provincia' => $nameProvincia,
            );
            $roleAct = $request->get('checkedroles');

            # Datos Anteriores
            $datosAnteriores = array(
                'name' => $user->name,
                'email' => $user->email,
                'id_provincia' => $user->id_provincia,
                'provincia' => $user->provincia,
            );
            // dd($datosUpdate, $datosAnteriores);
            $roleAnt = Arr::where($request->get('roles'), function ($value, $key) {
                if ($value['value'] == true) {
                    return $value['id'];
                }
            });

            # Datos Actualizados
            Logs::info('El usuario ' . $userLog . ', realizó la modificación en el  Usuario: ' . $userActualizado . '. Datos Modificados: ' . json_encode($datosUpdate) . '. Roles: ' . json_encode($roleAct),'rpm');

            # Datos Anteriores
            Logs::info('Datos Anteriores: ' . json_encode($datosAnteriores) . '. Roles: ' . json_encode($roleAnt),'rpm');
            
            Logs::info('Datos Anteriores: ' . json_encode($datosAnteriores) . '. Roles: ' . json_encode($roleAnt));


            $user->update($datosUpdate);
            if ($roleAct) {
                $user->roles()->sync($request->get('checkedroles'));
            }
            return Redirect::route('admin.users.index');
        } catch (Exception $e) {
            Logs::error($e,'rpm');
            return Redirect::route('admin.users.index');
        }
    }

    public function destroy($id)
    {
        // dd(User::find($id)->name);
        try {
            $user = Auth::user()->name;
            $userEliminado = User::find($id)->name;
            $usuario = User::find($id)->delete();

            Logs::info('El usuario ' . $user . ', elimino al Usuario: ' . $userEliminado . '.-','rpm');

            // dd($usuario);
            return response()->json([
                'status' => 'ok',
                'msg' => 'se elimino correctamente',
                'id_eliminado' => $id
            ], 200);
        } catch (Exception $e) {
            Logs::error($e,'rpm');
            return response()->json([
                'status' => 'error',
                'msg' => $e,
            ], 500);
        }
    }
}
