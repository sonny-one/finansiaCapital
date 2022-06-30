<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EjecutivoController;




Route::get('/', [PropiedadesController::class, 'index'])->name('inicio.index');
Route::get('/inicio', [PropiedadesController::class, 'create'])->name('inicio.contacto');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin-asinar', [AdminController::class, 'asignaVendedor'])->name('admin.asignaVendedor');
Route::post('/solicitud-visita', [AdminController::class, 'guardar'])->name('admin.solicitud');
Route::get('/ejecutivo', [EjecutivoController::class, 'index'])->name('ejecutivo.index');
Route::get('/login', [SessionsController::class, 'create'])->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');
Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
