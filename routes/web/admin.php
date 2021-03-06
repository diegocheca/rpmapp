<?php

use App\Http\Controllers\Admin\AltaFormularioController;
use Illuminate\Support\Facades\Route;

/************* ROLES *************/

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermisosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\PermissionController;

// EDITAR ROLES Y PERMISOS
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::resource('users', UserController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('users');

    Route::delete('/eliminar_usuario/{id}', [UserController::class, "destroy"])->name('eliminar-usuario');

    Route::resource('roles', RoleController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('roles');
    Route::delete('/eliminar_rol/{id}', [RoleController::class, "destroy"])->name('eliminar-rol');

    Route::resource('permisos', PermisosController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('permisos');
    Route::delete('/eliminar_permiso/{id}', [PermisosController::class, "destroy"])->name('eliminar-permiso');




    Route::resource('permisos_nuevos', PermissionController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('permisos_nuevos');
    Route::get('/get_permisos_form_nuevo/{rol}/{estado}/{accion}/{pagina}/{provincia}/{formulario}', [PermissionController::class, 'get_permisos_form'])->middleware(['auth:sanctum', 'verified'])->name('get_permisos_form_nuevo');
    Route::post('/update_permisos_form_nuevo', [PermissionController::class, 'update_permisos_form'])->middleware(['auth:sanctum', 'verified'])->name('update_permisos_form_nuevo');
        

    Route::resource('categorias', CategoryController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('categorias');
    
    Route::resource('altaProductor', AltaFormularioController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('altaProductor');
    Route::post('/get_permisos_form', [AltaFormularioController::class, 'get_permisos_form'])->middleware(['auth:sanctum', 'verified'])->name('get_permisos_form');
        

        
    Route::delete('/eliminar_categorias/{id}', [CategoryController::class, "destroy"])->name('eliminar-categorias');

    Route::get('/excel_productores', [ProductoresController::class, 'importView'])->middleware(['auth:sanctum', 'verified'])->name('vistaImport');

    Route::post('/import-excel', [ProductoresController::class, 'import'])->middleware(['auth:sanctum', 'verified'])->name('import');
});
