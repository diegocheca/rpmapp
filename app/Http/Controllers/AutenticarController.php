<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Http\Requests\AccesoRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AutenticarController extends Controller
{
    //
    public function registro(RegistroRequest $request)
    {
    	$user = new User();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->account_id = $request->account_id;
    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->owner = $request->owner;
    	
    	$user->save();

    	return response()->json([
    		'res'=>true,
    		'msg'=> 'Usuario Registrado Correctamente'
    	], 200);
    }
    public function acceso(AccesoRequest $request)
    {
    	$user = User::where('email', $request->email)->first();

		if (! $user || ! Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				'msg' => ['Las credenciales son incorrectas.'],
			]);
		}

		$token = $user->createToken($request->email)->plainTextToken;

		return response()->json([
			'res'=> true,
			'token' => $token
		],200);

    }
    public function cerrarSesion(Request $request)
    {
    	// Revoke the token that was used to authenticate the current request...
		$request->user()->currentAccessToken()->delete();
		return response()->json([
			'res'=> true,
			'msg' => 'El token se ha eliminado Correctamente'
		],200);

    }


}
