<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Auth;
//use Illuminate\Auth as Auth;
use App\Http\Controllers\FormAltaProductorController;
use App\Http\Controllers\FormAltaProductorCatamarcaController;
use App\Http\Controllers\FormAltaProductorMendozaController;
use App\Http\Controllers\FormAltaProductorTucumanController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductorsController;
use App\Http\Controllers\PagocanonminaController;

use App\Http\Controllers\ReinscripcionController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\IiadiaController;
use App\Http\Controllers\ProductorMinaController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\formWebController\MineralesController;
use App\Http\Controllers\BandejaEntradaEmailsController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Mendoza\PresentacionAltaProdMendozaController;
use App\Http\Controllers\SanJuan\PresentacionAltaProdSanJuanController;


use App\Http\Controllers\Mendoza\ComprobanteProductorMendozaController;
use App\Http\Controllers\Jujuy\JujuyController;

use App\Console\Commands\JobEnvioCommand;
// use Auth;

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



Route::get('/', [HomeController::class, "index"]);
Route::get('/home', [HomeController::class, "index"]);


Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::resource('productors', ProductorsController::class)
    ->middleware(['auth:sanctum', 'verified']);

// REINSCRIPCIONES

// Route::group(['prefix' => 'reinscripciones'], function () {
Route::get('reinscripciones/revision/{id}', [ReinscripcionController::class, "revision"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.revision');
Route::put('reinscripciones/saveRevision/{id}', [ReinscripcionController::class, "saveRevision"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.saveRevision');
Route::put('reinscripciones/updateRevision/{id}', [ReinscripcionController::class, "updateRevision"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.updateRevision');
Route::resource('reinscripciones', ReinscripcionController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::post('reinscripciones/upload', [ReinscripcionController::class, "upload"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.upload');
Route::delete('reinscripciones/destroy/{id}', [ReinscripcionController::class, "destroy"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.destroy');
Route::get('reinscripciones/productores', [ReinscripcionController::class, "productores"])
    ->middleware(['auth:sanctum', 'verified'])->name('reinscripciones.productores');

Route::get('productores/getProductorMina/{id}', [ProductoresController::class, "getProductorMina"])
    ->middleware(['auth:sanctum', 'verified'])->name('productores.getProductorMina');
Route::get('numeroProductor', [ProductoresController::class, 'getNumeroProductor'])
    ->middleware(['auth:sanctum', 'verified'])->name('numeroProductor');

Route::get('minerales/getMinerals', [MineralesController::class, "getMinerals"])
    ->middleware(['auth:sanctum', 'verified'])->name('minerales.getMinerals');
Route::get('minerales/getMineral/{id}', [MineralesController::class, "getMineral"])
    ->middleware(['auth:sanctum', 'verified'])->name('minerales.getMineral');
//     Route::get('provincias', 'ReinscripcionController@getCountries')
//         ->middleware(['auth:sanctum', 'verified']);

// });

// Route::group(['prefix' => 'paises'], function () {
//     // Route::get('paises', 'CountriesController@getCountries')
//     // ->middleware(['auth:sanctum', 'verified']);
//     Route::get('provincias', [CountriesController::class, "getDepartment"])
//         ->middleware(['auth:sanctum', 'verified']);
//     Route::get('departamentos/{id}', [CountriesController::class, "getDepartment"])
//         ->middleware(['auth:sanctum', 'verified']);
//     Route::get('localidades/{id}', [CountriesController::class, "getLocation"])
//         ->middleware(['auth:sanctum', 'verified']);
// });


Route::resource('productos', ProductosController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('iiadias', IiadiaController::class)
    ->middleware(['auth:sanctum', 'verified']);
Route::post('/guardando_dia_iia', [IiadiaController::class, "recibo"])->name('recibo-dia-iia');

Route::resource('pagos', PagocanonminaController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('productores_minas', ProductorMinaController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('productores', ProductoresController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::middleware(['auth:sanctum', 'verified'])->get('/comprobante_inicio/{id}', function ($id) {
    // admin
    // productor
    $mi_rol = '';
    if (Auth::user()->hasRole('Autoridad'))
        $mi_rol = 'admin';
    if (Auth::user()->hasRole('Administrador'))
        $mi_rol = 'admin';
    if (Auth::user()->hasRole('Productor'))
        $mi_rol = 'productor';
    if (Auth::user()->id_provincia == 50) {
        return redirect()->route('comprobante_inicio_mendoza', [$id]);
    } elseif (Auth::user()->id_provincia == 70) { //san juan
        return redirect()->route('comprobante_inicio_sanjuan', [$id]);
    } else {
        return redirect()->route('comprobante_inicio_sanjuan', [$id]);
    }
})->name('comprobante_inicio');


Route::get('/inicio_tramite_pdf_mdz/{id}', PresentacionAltaProdMendozaController::class)->name('comprobante_inicio_mendoza');
Route::get('/inicio_tramite_pdf_sj/{id}', PresentacionAltaProdSanJuanController::class)->name('comprobante_inicio_sanjuan');


/******************* COMPROBANTE DE PRODUCTOR ********************/
Route::middleware(['auth:sanctum', 'verified'])->get('/comprobante_productor_aprobado/{id}', function ($id) {
    $mi_rol = '';
    if (Auth::user()->hasRole('Autoridad'))
        $mi_rol = 'admin';
    if (Auth::user()->hasRole('Administrador'))
        $mi_rol = 'admin';
    if (Auth::user()->hasRole('Productor'))
        $mi_rol = 'productor';
    if (Auth::user()->id_provincia == 50) {
        return redirect()->route('comprobante_prod_apro_mendoza', [$id]);
    } elseif (Auth::user()->id_provincia == 70) { //san juan
        return redirect()->route('comprobante_inicio_sanjuan', [$id]);
    } else {
        return redirect()->route('comprobante_inicio_sanjuan', [$id]);
    }
})->name('formulario-alta-pdf');
Route::get('/comprobante_prod_mendz_aprobado/{id}', ComprobanteProductorMendozaController::class)->name('comprobante_prod_apro_mendoza');





Route::get('dashboard', [HomeController::class, "dashboard"])
    ->middleware(['auth:sanctum', 'verified'])->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard1', function () {
    return Inertia::render('Dashboard1');
})->name('dashboard1');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return Inertia::render('Users/Index', [
        'users' => User::all()
    ]);
})->name('users.index');

Route::get('reportes', [ChartsController::class, "reportes"])
    ->middleware(['auth:sanctum', 'verified'])->name('reportes');


Route::resource('formulario-alta', FormAltaProductorController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('products', ProductController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('users', UsersController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::get('/formularios', [FormAltaProductorController::class, "mostrar_formulario"])->name('abrir-formulario');

//direcciones de formularios

Route::get('/validar_email_productor/{codigo}', [HomeController::class, "valdiar_email_de_productor"])->name('valdiar-email-de-productor');

Route::get('/numero_reinscripciones_nuevas', [ReinscripcionController::class, "numero_reinsripiones_nuevas"])->name('numero-reinsripiones-nuevas');

Route::get('/datos/traer_provincias', [FormAltaProductorController::class, "traer_provincias_json"])->name('traer-provincias');
Route::get('/datos/provincia/{id}', [FormAltaProductorController::class, "provincia_id"])->name('provincia');
Route::post('/datos/traer_departamentos', [FormAltaProductorController::class, "traer_departamentos_json"])->name('traer-departamentos');
Route::post('/datos/traer_localidades', [FormAltaProductorController::class, "traer_localidades_json"])->name('traer-localidades');
Route::post('/datos/traer_minerales', [FormAltaProductorController::class, "traer_minerales_json"])->name('traer-minerales');
Route::post('/formularios/auto_guardado_uno', [FormAltaProductorController::class, "guardar_paso_uno"])->name('guardar-paso-uno');
Route::post('/formularios/auto_guardado_dos', [FormAltaProductorController::class, "guardar_paso_dos"])->name('guardar-paso-dos');
Route::post('/formularios/auto_guardado_tres', [FormAltaProductorController::class, "guardar_paso_tres"])->name('guardar-paso-tres');
Route::post('/formularios/auto_guardado_cuatro', [FormAltaProductorController::class, "guardar_paso_cuatro"])->name('guardar-paso-cuatro');
Route::post('/formularios/auto_guardado_cinco', [FormAltaProductorController::class, "guardar_paso_cinco"])->name('guardar-paso-cinco');
Route::post('/formularios/auto_guardado_seis', [FormAltaProductorController::class, "guardar_paso_seis"])->name('guardar-paso-seis');

Route::post('/formularios/presentar_borrador', [FormAltaProductorController::class, "presentar_borrador"])->name('presentar-borrador');

Route::post('/formularios/buscar_datos_formulario', [FormAltaProductorController::class, "buscar_datos_formulario_por_email"])->name('guardar-paso-dossss');

Route::post('/formularios/auto_guardado_reinscripcion', [ReinscripcionController::class, "guardar_reinscripcion"])->name('auto-guardado-reinscripcion');

Route::post('/formularios/validar_email_formulario', [FormAltaProductorController::class, "validar_email_productor"])->name('validar-email-formulario');
Route::post('/formularios/validar_cuit_reinscripcion', [FormAltaProductorController::class, "validar_cuit_prod_reinscripcion"])->name('validar-cuit-prod-reinscripcion');
Route::post('/formularios/validar_mina_para_prod', [FormAltaProductorController::class, "validar_mina_prod_reinscripcion"])->name('validar-mina-prod-reinscripcion');

Route::get('/gracias_confirmacion/{codigo}', [FormAltaProductorController::class, "validar_email_desde_email"])->name('validar-email-desde-email');


Route::get('/formularios/prueba_aprobado/{id}', [FormAltaProductorController::class, "test_aprobado_email"])->name('test-aprobado-email');

Route::delete('formularios/eliminar_formulario/{id}', [FormAltaProductorController::class, "destroy"])->name('eliminar-formulario');
Route::get('productores/mostrar_datos/{id}', [ProductoresController::class, "mostrar_datos"])->name('datos-productor');


//evaluacion de formularios presentados


Route::post('/formularios/evaluacion_auto_guardado_uno', [FormAltaProductorController::class, "correccion_guardar_paso_uno"])->name('correccion_guardar-paso-uno');
Route::post('/formularios/evaluacion_auto_guardado_dos', [FormAltaProductorController::class, "correccion_guardar_paso_dos"])->name('correccion_guardar-paso-dos');
Route::post('/formularios/evaluacion_auto_guardado_tres', [FormAltaProductorController::class, "correccion_guardar_paso_tres"])->name('correccion_guardar-paso-tres');
Route::post('/formularios/evaluacion_auto_guardado_cuatro', [FormAltaProductorController::class, "correccion_guardar_paso_cuatro"])->name('correccion_guardar-paso-cuatro');
Route::post('/formularios/evaluacion_auto_guardado_cinco', [FormAltaProductorController::class, "correccion_guardar_paso_cinco"])->name('correccion_guardar-paso-cinco');
Route::post('/formularios/evaluacion_auto_guardado_seis', [FormAltaProductorController::class, "correccion_guardar_paso_seis"])->name('correccion_guardar-paso-seis');


#CATAMARCA
Route::post('/formularios/evaluacion_auto_guardado_catamarcas', [FormAltaProductorController::class, "correccion_guardar_paso_catamarca"])->name('correccion_guardar-paso-catamarca');
Route::get('/formularios/traer_datos_pagina_catamarca/{id}', [FormAltaProductorCatamarcaController::class, "traer_datos_pagina_catamarca"])->name('traer-datos-pagina-catamarca');
Route::get('/formularios/traer_permisos_pagina_catamarca/{id}/{accion}', [FormAltaProductorCatamarcaController::class, "traer_permisos_pagina_catamarca"])->name('traer-permisos-pagina-catamarca');

#MENDOZA
Route::post('/formularios/evaluacion_auto_guardado_mendoza', [FormAltaProductorMendozaController::class, "correccion_guardar_paso_mendoza"])->name('correccion_guardar-paso-mendoza');
Route::get('/formularios/traer_datos_pagina_mendoza/{id}', [FormAltaProductorMendozaController::class, "traer_datos_pagina_mendoza"])->name('traer-datos-pagina-mendoza');
Route::get('/formularios/traer_permisos_pagina_mendoza/{id}/{accion}', [FormAltaProductorMendozaController::class, "traer_permisos_pagina_mendoza"])->name('traer-permisos-pagina-mendoza');

#TUCUMAN
Route::post('/formularios/evaluacion_auto_guardado_tucuman', [FormAltaProductorTucumanController::class, "correccion_guardar_paso_tucuman"])->name('correccion_guardar-paso-tucuman');
Route::get('/formularios/traer_datos_pagina_tucuman/{id}', [FormAltaProductorTucumanController::class, "traer_datos_pagina_tucuman"])->name('traer-datos-pagina-tucuman');
Route::get('/formularios/traer_permisos_pagina_tucuman/{id}/{accion}', [FormAltaProductorTucumanController::class, "traer_permisos_pagina_tucuman"])->name('traer-permisos-pagina-tucuman');

Route::post('/formularios/evaluacion_auto_guardado_todo', [FormAltaProductorController::class, "correccion_guardar_paso_todo"])->name('correccion_guardar-paso-todo');
Route::post('/formularios/guardar_lista_minerales', [FormAltaProductorController::class, "guardar_lista_minerales"])->name('guardar-lista-minerales');

//Route::get('/formularios/preg_email_validado/{email}', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');
Route::post('/formularios/preg_email_validado/', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');

Route::get('/formularios/comprobar_email_productor/{codigo}', [FormAltaProductorController::class, "confirmando_email_productor"])->name('confirmando-email-productor');

Route::get('contact', [ContactController::class, "contact"]);
Route::post('contact', [ContactController::class, "contactPost"])->name('contact.store');

Route::get('/thank_you', [HomeController::class, "thanks"])->name('thanks');

Route::post('/recibiendo_pdf', [FormAltaProductorController::class, "recibo"])->name('recibo-pdf');

Route::get('/formularios/descargar_formulario/{id}', [FormAltaProductorController::class, "descargar_formulario"])->name('descargar-formulario');
Route::post('/formularios/buscar_id_form/', [FormAltaProductorController::class, "buscador_de_id"])->name('buscador-de-id');
Route::get('/probando_pdf/', [FormAltaProductorController::class, "ejemplo_pdf_prueba"])->name('probando-pdf');
Route::get('/probando_pdf_re/', [FormAltaProductorController::class, "ejemplo_pdf_prueba_reinscripcion"])->name('probando-pdf');
Route::get('/probando_form/', [FormAltaProductorController::class, "pdf_sin_pdf"])->name('ejemplo-pdf');
//Route::get('/formulario-alta-pdf/{id}', [FormAltaProductorController::class, "formulario_alta_pdf"])->name('formulario-alta-pdf');


Route::get('/comprobante-presentacion-pdf/{id}', [FormAltaProductorController::class, "comprobante_tramite_pdf"])->name('comprobante-presentacion-pdf');

Route::get('/probando_super_guardado/{id}', [FormAltaProductorController::class, "probando_super_guardado"])->name('probando-super-guardado');


//


//COMERCIANTE
Route::get('/probando_form_comerciante/', [FormAltaProductorController::class, "pdf_para_comerciantes"])->name('pdf-para-comerciantes');

//INDUSTRIAL
Route::get('/probando_form_industrial/', [FormAltaProductorController::class, "pdf_para_industrial"])->name('pdf-para-industrial');

//TRANSITO
Route::get('/autorizacion_transito/', [FormAltaProductorController::class, "pdf_para_transito"])->name('pdf-para-transito');

Route::get('/impresiones/reinscripcion/{id}', [ReinscripcionController::class, "generar_pdf_reinscripcion"])->name('generar-pdf-reinscripcion');

Route::post('/formularios/avisar_formulario_completo/', [FormAltaProductorController::class, "formulario_listo"])->name('formulario-listo');

Route::group(['prefix' => 'paises'], function () {
    // Route::get('paises', 'CountriesController@getCountries')
    // ->middleware(['auth:sanctum', 'verified']);
    Route::get('provincias', [CountriesController::class, "getProvinces"])
        ->middleware(['auth:sanctum', 'verified']);
    Route::get('departamentos/{id}', [CountriesController::class, "getDepartment"])
        ->middleware(['auth:sanctum', 'verified']);
    Route::get('localidades/{id}', [CountriesController::class, "getLocation"])
        ->middleware(['auth:sanctum', 'verified']);
});




//DASHBOARD

Route::get('/dashboard/numproductores', [DashboardController::class, "numProductores"])->name('numProductores');
Route::get('/dashboard/numproductorespendientes', [DashboardController::class, "numProductoresPendientes"])->name('numProductoresPendientes');
Route::get('/dashboard/numproductoresborradores', [DashboardController::class, "numProductoresBorradores"])->name('numProductoresBorradores');


Route::get('/probandodtpos', [HomeController::class, "mostrar_datos_por_dtpo"])->name('mostrar_datos_por_dtpo');

Route::get('/permisos_nuevos', [HomeController::class, "mostrar_permisos"])->name('mostrar_permisos');

Route::get('/test_provied', [HomeController::class, "test_provied"])->name('test_provied');



Route::get('/cargandoexcelmdz', [FormAltaProductorController::class, "cargandoexcelmdz"])->name('cargandoexcelmdz');
Route::get('/cargarCatamarca', [FormAltaProductorController::class, "cargarCatamarca"])->name('cargarCatamarca');




//REPORTES
Route::get('/datos_minerales_todas_cat', [ChartsController::class, "minerales_todas_categorias"])->name('datos-minerales-todas-cat');

// BANDEJA DE ENTRADAS EMAILS
// Route::resource('/inbox', BandejaEntradaEmailsController::class)->middleware(['auth:sanctum', 'verified']);
Route::group(['prefix' => 'inbox'], function () {
    Route::get('', [BandejaEntradaEmailsController::class, "index"])->middleware(['auth:sanctum', 'verified'])->name('inbox');
    Route::get('{id}', [BandejaEntradaEmailsController::class, "indexId"])->middleware(['auth:sanctum', 'verified'])->name('inbox.id');
    Route::post('store', [BandejaEntradaEmailsController::class, "store"])->middleware(['auth:sanctum', 'verified']);
    Route::get('show/{id}', [BandejaEntradaEmailsController::class, "show"])->middleware(['auth:sanctum', 'verified']);
});
// DATOS PARA EL DASHBOARD
Route::get('/porcentaje_ventas', [JobEnvioCommand::class, "porcVentas"])->name('porcentaje_ventas');

// VER LOGS
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('role:Administrador');


Route::group(['middleware' => ['auth:sanctum', 'verified']],function(){
    // Jujuy
    Route::get('apiJujuy', [JujuyController::class, 'index'])->name('apiJujuy');
    Route::get('consultarDatos', [JujuyController::class, 'simula_datos']);
    Route::post('enviarDatos', [JujuyController::class, 'datos_enviados']);
});
