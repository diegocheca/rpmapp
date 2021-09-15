<?php
/*
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\formWebController\SolicitudesController;
use App\Http\Controllers\formWebController\TipoDocumentoController;
use App\Http\Controllers\formWebController\EstadoTerrenoController;
use App\Http\Controllers\formWebController\MineralController;
use App\Http\Controllers\formWebController\EstadoSolicitudController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('solicitudes', SolicitudesController::class) 
    ->middleware(['auth:sanctum', 'verified']);

//  Route::post('solicitudes/create', [SolicitudesController::class,'postSolicitudes']) //va a postSolicitudes
//        ->middleware(['auth:sanctum', 'verified']);

Route::post('solicitudes/solicitudesDatos', [SolicitudesController::class,'postSolicitudes']) //procesa datos solicitud exploracion
  ->middleware(['auth:sanctum', 'verified']);

Route::get('tipo_documento', [TipoDocumentoController::class, "getTipoDocumento"])
        ->middleware(['auth:sanctum', 'verified']);

Route::get('mineral', [MineralController::class, "getMineral"])
        ->middleware(['auth:sanctum', 'verified']);

Route::get('estado_terreno', [EstadoTerrenoController::class, "getEstadoTerreno"])
        ->middleware(['auth:sanctum', 'verified']);

Route::get('estado_solicitud', [EstadoSolicitudController::class, "getEstadoSolicitud"])
        ->middleware(['auth:sanctum', 'verified']);

Route::middleware(['auth:sanctum', 'verified'])
        ->get('/solicitudes.descubrimiento',[SolicitudesController::class,"crear_descu"])//create para solicitud descubrimiento
        ->name('descubrimiento'); 

Route::post('solicitudes/solicitudesProcesa', [SolicitudesController::class,'postSolicitudes'])//procesa datos solicitud descubrimiento
        ->middleware(['auth:sanctum', 'verified']);

