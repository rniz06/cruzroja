<?php

//use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\GuardiaController;
use App\Http\Controllers\MovilController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
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
    | Modulo Moviles
    |--------------------------------------------------------------------------
    */
    Route::controller(MovilController::class)->group(function () {
        Route::get('moviles', 'index')->name('moviles.index');
        Route::get('moviles/create', 'create')->name('moviles.create');
        Route::post('moviles/store', 'store')->name('moviles.store');
        Route::get('moviles/{movil}', 'show')->name('moviles.show');
        Route::get('moviles/{movil}/edit', 'edit')->name('moviles.edit');
        Route::put('moviles/{movil}', 'update')->name('moviles.update');
        Route::delete('moviles/{movil}', 'destroy')->name('moviles.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Movimientos
    |--------------------------------------------------------------------------
    */
    Route::controller(MovimientoController::class)->group(function () {
        Route::get('movimientos', 'index')->name('movimientos.index');
        Route::get('movimientos/create', 'create')->name('movimientos.create');
        Route::post('movimientos/store', 'store')->name('movimientos.store');
        Route::get('movimientos/{movimiento}', 'show')->name('movimientos.show');
        Route::get('movimientos/{movimiento}/edit', 'edit')->name('movimientos.edit');
        Route::put('movimientos/{movimiento}', 'update')->name('movimientos.update');
        Route::delete('movimientos/{movimiento}', 'destroy')->name('movimientos.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Modulo Guardias
    |--------------------------------------------------------------------------
    */
    Route::controller(GuardiaController::class)->group(function () {
        Route::get('guardias', 'index')->name('guardias.index');
        Route::get('guardias/create', 'create')->name('guardias.create');
        Route::post('guardias/store', 'store')->name('guardias.store');
        Route::get('guardias/{guardia}', 'show')->name('guardias.show');
        Route::get('guardias/{guardia}/edit', 'edit')->name('guardias.edit');
        Route::put('guardias/{guardia}', 'update')->name('guardias.update');
        Route::delete('guardias/{guardia}', 'destroy')->name('guardias.destroy');
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
        Route::get('usuarios/{usuario}', 'show')->name('usuarios.show');
        Route::get('usuarios/{usuario}/edit', 'edit')->name('usuarios.edit');
        Route::put('usuarios/{usuario}', 'update')->name('usuarios.update');
        Route::delete('usuarios/{usuario}', 'destroy')->name('usuarios.destroy');
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
