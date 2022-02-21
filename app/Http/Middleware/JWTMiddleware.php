<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status'=>false,'message'=>'Token expired'],401);
            }else {
                if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json(['status'=>false,'message'=>'Invalid Token'],401);
                }else {
                    return response()->json(['status'=>false,'message'=>'Token is required'],400);
                }
            }
        }
        // return $next($request->merge(['user'=>compact('user')]));
        return $next($request->merge(['user'=>$user]));
    }
}
