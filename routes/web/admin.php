<?php

use App\Http\Controllers\Admin\AltaFormularioController;
use Illuminate\Support\Facades\Route;

/************* ROLES *************/

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermisosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductoresController;

// EDITAR ROLES Y PERMISOS
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::resource('users', UserController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('users');

    Route::resource('roles', RoleController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('roles');

    Route::resource('permisos', PermisosController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('permisos');

    Route::resource('categorias', CategoryController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('categorias');
    
    Route::resource('altaProductor', AltaFormularioController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('altaProductor');
        
    Route::get('/excel_productores', [ProductoresController::class, 'importView'])->middleware(['auth:sanctum', 'verified'])->name('vistaImport');

    Route::post('/import-excel', [ProductoresController::class, 'import'])->middleware(['auth:sanctum', 'verified'])->name('import');
});
