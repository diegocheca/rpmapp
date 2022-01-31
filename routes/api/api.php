<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\FormAltaProductorController;
use App\Http\Controllers\ReinscripcionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| JWT de usuario Administrador - email: admin@admin.com - password: password
|--------------------------------------------------------------------------
	bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTY1MzU0MSwibmJmIjoxNjMxNjUzNTQxLCJqdGkiOiIzNHA0U1JSMGRCazFTWm00Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-QWEx5YYjsfjBeIgI9LSdoXapADydx49qMKOXCfJd5M
|--------------------------------------------------------------------------
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });


// Route::post('registro', [AutenticarController::class, 'registro']);
// Route::post('acceso', [AutenticarController::class, 'acceso']);
// Route::group(['middleware' => ['auth:sanctum']], function () {
// 	Route::post('cerrarsesion', [AutenticarController::class, 'cerrarSesion']);
// 	Route::get('/lista_productores/', [FormAltaProductorController::class, "lista_productores_api"])->name('lista-productores');
// });


// Route::post('login', [AuthController::class,'authenticate']);

Route::group([
	// 'middleware' => ['jwt.verify'],
	'prefix' => 'auth',
], function () {
	Route::post('login', 'App\Http\Controllers\AuthController@authenticate');
	Route::post('logout', 'App\Http\Controllers\AuthController@logout');
	Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
	Route::post('me', 'App\Http\Controllers\AuthController@me');
	Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::group(['prefix' => 'visor', 'middleware' => ['jwt.verify']], function () {
	// Route::get('CantProductors', 'App\Http\Controllers\VisorController@CantProductors');
    Route::post('setDatosCantidades','App\Http\Controllers\VisorController@setDatos');
});

// Route::get('/numero_reinscripciones_nuevas', [ReinscripcionController::class, "numero_reinsripiones_nuevas"])->middleware(['jwt.verify'])->name('numero-reinsripiones-nuevas');
Route::get('/datos/traer_provincias', [FormAltaProductorController::class, "traer_provincias_json"])->middleware(['jwt.verify'])->name('traer-provincias');
Route::apiResource('formaltaprod1', 'App\Http\Controllers\FormAltaProdPaso1Controller');
