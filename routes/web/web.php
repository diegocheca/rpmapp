<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\FormAltaProductorController;
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

Route::get('/', function () {
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
//     Route::get('provincias', 'ReinscripcionController@getCountries')
//         ->middleware(['auth:sanctum', 'verified']);

// });

Route::group(['prefix' => 'paises'], function () {
    // Route::get('paises', 'CountriesController@getCountries')
    // ->middleware(['auth:sanctum', 'verified']);
    Route::get('provincias', [CountriesController::class, "getDepartment"])
        ->middleware(['auth:sanctum', 'verified']);
    Route::get('departamentos/{id}', [CountriesController::class, "getDepartment"])
        ->middleware(['auth:sanctum', 'verified']);
    Route::get('localidades/{id}', [CountriesController::class, "getLocation"])
        ->middleware(['auth:sanctum', 'verified']);
});


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {
    return Inertia::render('Users/Index', [
        'users' => User::all()
    ]);
})->name('users.index');

Route::resource('formulario-alta', FormAltaProductorController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('products', ProductController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::resource('users', UsersController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::get('/formularios', [FormAltaProductorController::class, "mostrar_formulario"])->name('abrir-formulario');

//direcciones de formularios

Route::get('/validar_email_productor/{codigo}', [HomeController::class, "valdiar_email_de_productor"])->name('valdiar-email-de-productor');

Route::get('/datos/traer_provincias', [FormAltaProductorController::class, "traer_provincias_json"])->name('traer-provincias');
Route::post('/datos/traer_departamentos', [FormAltaProductorController::class, "traer_departamentos_json"])->name('traer-departamentos');
Route::post('/datos/traer_localidades', [FormAltaProductorController::class, "traer_localidades_json"])->name('traer-localidades');
Route::post('/datos/traer_minerales', [FormAltaProductorController::class, "traer_minerales_json"])->name('traer-minerales');
Route::post('/formularios/auto_guardado_uno', [FormAltaProductorController::class, "guardar_paso_uno"])->name('guardar-paso-uno');
Route::post('/formularios/auto_guardado_dos', [FormAltaProductorController::class, "guardar_paso_dos"])->name('guardar-paso-dos');
Route::post('/formularios/auto_guardado_tres', [FormAltaProductorController::class, "guardar_paso_tres"])->name('guardar-paso-tres');
Route::post('/formularios/auto_guardado_cuatro', [FormAltaProductorController::class, "guardar_paso_cuatro"])->name('guardar-paso-cuatro');
Route::post('/formularios/auto_guardado_cinco', [FormAltaProductorController::class, "guardar_paso_cinco"])->name('guardar-paso-cinco');
Route::post('/formularios/auto_guardado_seis', [FormAltaProductorController::class, "guardar_paso_seis"])->name('guardar-paso-seis');

Route::post('/formularios/buscar_datos_formulario', [FormAltaProductorController::class, "buscar_datos_formulario_por_email"])->name('guardar-paso-dossss');

Route::post('/formularios/auto_guardado_reinscripcion', [ReinscripcionController::class, "guardar_reinscripcion"])->name('auto-guardado-reinscripcion');

Route::post('/formularios/validar_email_formulario', [FormAltaProductorController::class, "validar_email_productor"])->name('validar-email-formulario');
Route::post('/formularios/validar_cuit_reinscripcion', [FormAltaProductorController::class, "validar_cuit_prod_reinscripcion"])->name('validar-cuit-prod-reinscripcion');
Route::post('/formularios/validar_mina_para_prod', [FormAltaProductorController::class, "validar_mina_prod_reinscripcion"])->name('validar-mina-prod-reinscripcion');

Route::get('/gracias_confirmacion/{codigo}', [FormAltaProductorController::class, "validar_email_desde_email"])->name('validar-email-desde-email');

//evaluacion de formularios presentados

Route::post('/formularios/evaluacion_auto_guardado_uno', [FormAltaProductorController::class, "correccion_guardar_paso_uno"])->name('correccion_guardar-paso-uno');
Route::post('/formularios/evaluacion_auto_guardado_dos', [FormAltaProductorController::class, "correccion_guardar_paso_dos"])->name('correccion_guardar-paso-dos');
Route::post('/formularios/evaluacion_auto_guardado_tres', [FormAltaProductorController::class, "correccion_guardar_paso_tres"])->name('correccion_guardar-paso-tres');
Route::post('/formularios/evaluacion_auto_guardado_cuatro', [FormAltaProductorController::class, "correccion_guardar_paso_cuatro"])->name('correccion_guardar-paso-cuatro');
Route::post('/formularios/evaluacion_auto_guardado_cinco', [FormAltaProductorController::class, "correccion_guardar_paso_cinco"])->name('correccion_guardar-paso-cinco');
Route::post('/formularios/evaluacion_auto_guardado_seis', [FormAltaProductorController::class, "correccion_guardar_paso_seis"])->name('correccion_guardar-paso-seis');
Route::post('/formularios/evaluacion_auto_guardado_todo', [FormAltaProductorController::class, "correccion_guardar_paso_todo"])->name('correccion_guardar-paso-todo');
Route::post('/formularios/guardar_lista_minerales', [FormAltaProductorController::class, "guardar_lista_minerales"])->name('guardar-lista-minerales');

//Route::get('/formularios/preg_email_validado/{email}', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');
Route::post('/formularios/preg_email_validado/', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');

Route::get('/formularios/comprobar_email_productor/{codigo}', [FormAltaProductorController::class, "confirmando_email_productor"])->name('confirmando-email-productor');

Route::get('/home', [HomeController::class, "index"])->name('pagina-web');
Route::get('contact', [ContactController::class, "contact"]);
Route::post('contact', [ContactController::class, "contactPost"])->name('contact.store');

Route::get('/thank_you', [HomeController::class, "thanks"])->name('thanks');

Route::post('/recibiendo_pdf', [FormAltaProductorController::class, "recibo"])->name('recibo-pdf');

Route::get('/formularios/descargar_formulario/{id}', [FormAltaProductorController::class, "descargar_formulario"])->name('descargar-formulario');
Route::post('/formularios/buscar_id_form/', [FormAltaProductorController::class, "buscador_de_id"])->name('buscador-de-id');
Route::get('/probando_pdf/', [FormAltaProductorController::class, "ejemplo_pdf_prueba"])->name('probando-pdf');
Route::get('/probando_pdf_re/', [FormAltaProductorController::class, "ejemplo_pdf_prueba_reinscripcion"])->name('probando-pdf');
Route::get('/probando_form/', [FormAltaProductorController::class, "pdf_sin_pdf"])->name('ejemplo-pdf');

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

