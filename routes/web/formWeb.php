<?php
use Illuminate\Support\Facades\Route;
/************* FORMULARIOS WEB *************/

//use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\formWebController\SolicitudesController;
use App\Http\Controllers\formWebController\TipoDocumentoController;

//FORMULARIOS WEB
// Route::group(['prefix' => 'solicitudes'], function () {
Route::resource('solicitudes', SolicitudesController::class)
    ->middleware(['auth:sanctum', 'verified'])
    ->names('solicitudes');

Route::post('solicitudes/solicitudesDatos', [SolicitudesController::class, 'postSolicitudes'])
    ->middleware(['auth:sanctum', 'verified']);
// Route::get('prueba', 'SolicitudesController@prueba')
//     ->middleware(['auth:sanctum', 'verified']);

// Route::get('/prueba', [SolicitudesController::class, "prueba"])->name('solicitudes.joanna');
Route::get('/prueba', [SolicitudesController::class, "prueba"])->name('prueba');

// });
Route::get('/menu', [SolicitudesController::class, "menu"])->name('menu');

Route::get('tipo_documento', [TipoDocumentoController::class, "getTipoDocumento"])
    ->middleware(['auth:sanctum', 'verified']);
