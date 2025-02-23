<?php

//use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Auth::routes();
Auth::routes([
    'register' => false, // Desactivar route Register...
    'reset' => false, // Desactivar route Reset Password...
    'verify' => false, // Desactivar route Email Verification...
]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Modulo Voluntarios
    |--------------------------------------------------------------------------
    */
    Route::controller(VoluntarioController::class)->group(function () {
        Route::get('voluntarios', 'index')->name('voluntarios.index');
        Route::get('voluntarios/create', 'create')->name('voluntarios.create');
        Route::post('voluntarios/store', 'store')->name('voluntarios.store');
        Route::get('voluntarios/{voluntario}', 'show')->name('voluntarios.show');
        Route::get('voluntarios/{voluntario}/edit', 'edit')->name('voluntarios.edit');
        Route::put('voluntarios/{voluntario}', 'update')->name('voluntarios.update');
        Route::delete('voluntarios/{voluntario}', 'destroy')->name('voluntarios.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Conductores
    |--------------------------------------------------------------------------
    */
    Route::controller(ConductorController::class)->group(function () {
        Route::get('conductores', 'index')->name('conductores.index');
        Route::get('conductores/create', 'create')->name('conductores.create');
        Route::post('conductores/store', 'store')->name('conductores.store');
        // Route::get('conductores/{conductor}', 'show')->name('conductores.show');
        Route::get('conductores/{conductor}/edit', 'edit')->name('conductores.edit');
        Route::put('conductores/{conductor}', 'update')->name('conductores.update');
        Route::delete('conductores/{conductor}', 'destroy')->name('conductores.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Usuario
    |--------------------------------------------------------------------------
    */
    Route::controller(UsuarioController::class)->group(function () {
        Route::get('usuarios', 'index')->name('usuarios.index');
        Route::get('usuarios/create', 'create')->name('usuarios.create');
        Route::post('usuarios/store', 'store')->name('usuarios.store');
        Route::get('usuarios/{user}', 'show')->name('usuarios.show');
        Route::get('usuarios/{user}/edit', 'edit')->name('usuarios.edit');
        Route::put('usuarios/{user}', 'update')->name('usuarios.update');
        Route::delete('usuarios/{user}', 'destroy')->name('usuarios.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Roles
    |--------------------------------------------------------------------------
    */
    Route::controller(RoleController::class)->group(function () {
        Route::get('roles', 'index')->name('roles.index');
        Route::get('roles/create', 'create')->name('roles.create');
        Route::post('roles/store', 'store')->name('roles.store');
        Route::get('roles/{role}', 'show')->name('roles.show');
        Route::get('roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('roles/{role}', 'update')->name('roles.update');
        Route::delete('roles/{role}', 'destroy')->name('roles.destroy');
    });
});
