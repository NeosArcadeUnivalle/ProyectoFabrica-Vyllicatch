<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoAuthController;

Route::resource('personas',App\Http\Controllers\PersonaController::class);
Route::resource('empleados',App\Http\Controllers\EmpleadoController::class);
Route::resource('clientes',App\Http\Controllers\ClienteController::class);

Route::resource('tiposladrillos',App\Http\Controllers\TipoLadrilloController::class);
Route::resource('productos',App\Http\Controllers\ProductoController::class);

Route::resource('tiposdemateriaprima',App\Http\Controllers\TipoMateriaPrimaController::class);
Route::resource('materiaprima',App\Http\Controllers\MateriaPrimaController::class);
Route::resource('proveedores',App\Http\Controllers\ProveedorController::class);

// Rutas de autenticación para empleados
Route::get('empleado/login', [EmpleadoAuthController::class, 'showLoginForm'])->name('empleado.login.form');
Route::post('empleado/login', [EmpleadoAuthController::class, 'login'])->name('empleado.login');
Route::post('empleado/logout', [EmpleadoAuthController::class, 'logout'])->name('empleado.logout');

Route::get('/', function () {
    return view('main.index');  // Apunta a la vista 'resources/views/main/index.blade.php'
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
