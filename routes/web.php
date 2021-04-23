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
*

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
*/





use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\FormAltaProductorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;




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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', function () {

    return Inertia::render('Users/Index',[
        'users' => User::all()
    ]);
})->name('users.index');

Route::resource('formulario-alta', FormAltaProductorController::class)
    ->middleware(['auth:sanctum', 'verified']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('products', ProductController::class)
    ->middleware(['auth:sanctum', 'verified']);




Route::get('/formularios', [FormAltaProductorController::class, "mostrar_formulario"])->name('abrir-formulario');


//direcciones de formularios 
//Route::get('/formularios', 'Calendario@formularios');


Route::post('/formularios/auto_guardado_uno', [FormAltaProductorController::class, "guardar_paso_uno"])->name('guardar-paso-uno');
Route::post('/formularios/auto_guardado_dos', [FormAltaProductorController::class, "guardar_paso_dos"])->name('guardar-paso-dos');
Route::post('/formularios/auto_guardado_tres', [FormAltaProductorController::class, "guardar_paso_tres"])->name('guardar-paso-tres');
Route::post('/formularios/auto_guardado_cuatro', [FormAltaProductorController::class, "guardar_paso_cuatro"])->name('guardar-paso-cuatro');
Route::post('/formularios/auto_guardado_cinco', [FormAltaProductorController::class, "guardar_paso_cinco"])->name('guardar-paso-cinco');
Route::post('/formularios/auto_guardado_seis', [FormAltaProductorController::class, "guardar_paso_seis"])->name('guardar-paso-seis');

Route::post('/formularios/buscar_datos_formulario', [FormAltaProductorController::class, "buscar_datos_formulario_por_email"])->name('guardar-paso-dossss');


Route::post('/formularios/validar_email_formulario', [FormAltaProductorController::class, "validar_email_productor"])->name('validar-email-formulario');

Route::get('/gracias_confirmacion/{codigo}', [FormAltaProductorController::class, "validar_email_desde_email"])->name('validar-email-desde-email');


//Route::get('/formularios/preg_email_validado/{email}', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');
Route::post('/formularios/preg_email_validado/', [FormAltaProductorController::class, "preguntar_email_confirmado"])->name('preguntar-email-confirmado');

Route::get('/formularios/comprobar_email_productor/{codigo}', [FormAltaProductorController::class, "confirmando_email_productor"])->name('confirmando-email-productor');


Route::get('/home', [HomeController::class, "index"])->name('pagina-web');
Route::get('contact', [ContactController::class, "contact"]);
Route::post('contact', [ContactController::class, "contactPost"])->name('contact.store');

Route::get('/thank_you', [HomeController::class, "thanks"])->name('thanks');

Route::post('/recibiendo_pdf', [FormAltaProductorController::class, "recibo"])->name('recibo-pdf');

//Route::get('/formularios', 'Calendario@formularios');
Route::get('/formularios/datos', 'Calendario@datos');

Route::get('/formularios/prueba', 'Calendario@prueba');
Route::get('/formularios/pdf/{id_for}', 'Calendario@descargar_formulario');

Route::get('/formularios/imprimir_ejemplo', 'Calendario@ejemplo_imprimir_formulario');
Route::get('/formularios/ver_formulario_a_imprimir', 'Calendario@ver_ejemplo_imprimir_formulario');
Route::get('/formularios/ver_formulario_a_imprimir_id/{id_for}', 'Calendario@ver_ejemplo_imprimir_formulario_id');

Route::get('/formularios/descargar_pdf_id/{id_for}', 'Calendario@descarga_automatica_pdf');



Route::get('/formularios/guardar_puerto', 'Calendario@prueba_puertos');


Route::post('/formularios/guardar_persona', 'Calendario@guardar_persona');



//Route::get('generate-pdf', 'Calendario@pdfview')->name('generate-pdf');


Route::get('/formularios/descargar_formulario/{id}', [FormAltaProductorController::class, "descargar_formulario"])->name('descargar-formulario');
Route::post('/formularios/buscar_id_form/', [FormAltaProductorController::class, "buscador_de_id"])->name('buscador-de-id');
Route::get('/probando_pdf/', [FormAltaProductorController::class, "ejemplo_pdf_prueba"])->name('probando-pdf');
Route::post('/formularios/avisar_formulario_completo/', [FormAltaProductorController::class, "formulario_listo"])->name('formulario-listo');

Route::get('nwizard', 'Calendario@nwizard');
