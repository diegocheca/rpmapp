<?php

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

    Route::delete('/eliminar_usuario/{id}', [UserController::class, "destroy"])->name('eliminar-usuario');

    Route::resource('roles', RoleController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('roles');
    Route::delete('/eliminar_rol/{id}', [RoleController::class, "destroy"])->name('eliminar-rol');

    Route::resource('permisos', PermisosController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('permisos');
    Route::delete('/eliminar_permiso/{id}', [PermisosController::class, "destroy"])->name('eliminar-permiso');


    Route::resource('categorias', CategoryController::class)
        ->middleware(['auth:sanctum', 'verified'])
        ->names('categorias');
    Route::delete('/eliminar_categorias/{id}', [CategoryController::class, "destroy"])->name('eliminar-categorias');

    Route::get('/excel_productores', [ProductoresController::class, 'importView'])->middleware(['auth:sanctum', 'verified'])->name('vistaImport');

    Route::post('/import-excel', [ProductoresController::class, 'import'])->middleware(['auth:sanctum', 'verified'])->name('import');
});
