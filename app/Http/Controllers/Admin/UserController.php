<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Spatie\Permission\Models\Role;

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
        $this->middleware('can:admin.users.edit')->only('edit','update');
        $this->middleware('can:admin.users.create')->only('create','store');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }
    public function index()
    {   
        $users = User::with('roles')->orderBy('id')->get();
        // $all_roles_in_database = Role::all()->pluck('id','name');
        // $all_users_with_all_their_roles = User::with('roles')->get('id');
        // echo $all_users_with_all_their_roles;
        // $value = $users->get('name');
        // echo $value;
        return  Inertia::render('Users/listarUsers', ['usuarios' => $users]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {

        $user->hasRole(Role::all());
        // echo $user;
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
        return  Inertia::render('Users/UserEditar', ['usuario' => $user, 'roles' => $rolesAll, 'rolesUser' => $rolesUserId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        // echo $user;
        // echo collect($request->get('checkedroles'));
        // $user->update($request->all());

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($request->get('checkedroles')) {
            $user->roles()->sync($request->get('checkedroles'));
        }
        return Redirect::route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('admin.users.index')->with('info', 'El rol se se eliminó con éxito');
    }
}
