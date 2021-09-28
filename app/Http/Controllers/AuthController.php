<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

// class AuthController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth:api', ['except' => ['login', 'register']]);
//     }

//     public function login()
//     {
//         $credentials = request(['email', 'password']);

//         if (!$token = auth()->attempt($credentials)) {
//             return response()->json(['error' => 'Unauthorized'], 401);
//         }

//         return $this->respondWithToken($token);
//     }

//     public function me()
//     {
//         return response()->json(auth()->user());
//     }

//     public function logout()
//     {
//         auth()->logout();

//         return response()->json(['message' => 'Successfully logged out']);
//     }

//     public function refresh()
//     {
//         return $this->respondWithToken(auth()->refresh());
//     }

//     protected function respondWithToken($token)
//     {
//         return response()->json([
//             'access_token' => $token,
//             'token_type' => 'bearer',
//             'expires_in' => auth()->factory()->getTTL() * 60
//         ]);
//     }
//     public function register(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|string|email|max:100|unique:users',
//             'password' => 'required|string|min:6',
//             // 'password'=> 'required|string|min:6|confirmed'
//         ]);
//         if ($validator->fails()) {
//             return response()->json($validator->errors()->toJson(), 400);
//         }
//         $user = User::create(array_merge(
//             $validator->validate(),
//             ['password' => bcrypt($request->password)]
//         ));
//         return response()->json([
//             'message' => '¡Usuario registrado exitosamente!',
//             'user' => $user
//         ], 201);
//     }
// }


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['authenticate', 'register']]);
        // $this->middleware('jwt.verify')->except('authenticate');
        // $this->middleware('jwt.verify')->only('register');
    }

    public function authenticate(Request $request)
    {
        $credential = request(['email', 'password']);
        // dd($credential['email']);
        $validator = Validator::make($credential, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!$validator->fails()) {
            if ($credential['email'] == 'administrador@gmail.com') {
                $token = JWTAuth::attempt($credential);
            } else {
                JWTAuth::factory()->setTTL(60);
                $token = JWTAuth::attempt($credential);
            }
            try {
                if (!$token) {
                    return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
                }
            } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['status' => false, 'error' => $e->getMessage(), 'message' => 'Invalid credentials'], 401);
            }
            return response()->json([
                'status' => true,
                'token_type' => 'bearer',
                'token' => $token,
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
                'message' => 'Credencial Válida'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    // public function register(Request $request)
    // {
    //     return response()->json([
    //         'message' => $request->get('user'),
    //     ]);
    // }

    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (!$token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->respondWithToken($token);
    // }

    public function me()
    {
        // dd(JWTAuth::user());
        return response()->json(auth()->user());
    }

    // public function logout()
    // {
    //     dd(auth());
    //     auth()->logout();
    //     return response()->json(['message' => 'Successfully logged out']);
    // }

    public function logout(Request $request)
    {

        $token = $request->header('Authorization');

        try {
            JWTAuth::parseToken()->invalidate($token);

            return response()->json([
                'error'   => false,
                'message' => 'Successfully logged out',
                // 'message' => trans( 'auth.logged_out' )
            ]);
        } catch (TokenExpiredException $exception) {
            return response()->json([
                'error'   => true,
                'message' => trans('auth.token.expired')

            ], 401);
        } catch (TokenInvalidException $exception) {
            return response()->json([
                'error'   => true,
                'message' => trans('auth.token.invalid')
            ], 401);
        } catch (JWTException $exception) {
            return response()->json([
                'error'   => true,
                'message' => trans('auth.token.missing')
            ], 500);
        }
    }

    public function refresh()
    {
        // dd($this);
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            // 'password'=> 'required|string|min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password)]
        ));
        return response()->json([
            'message' => '¡Usuario registrado exitosamente!',
            'user' => $user
        ], 201);
    }
}
