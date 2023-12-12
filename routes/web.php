<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Consultas;
use App\Http\Controllers\Desparasitaciones;
use App\Http\Controllers\Vacunas;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/nuevo', [AuthController::class, 'nuevoUsuario']);


Route::prefix('clientes')->group(function(){
    Route::get('/', [Clientes::class, 'index'])->name('clientes-index');
    Route::get('/create', [Clientes::class, 'create'])->name('clientes-create');
    Route::get('/edit/{id}', [Clientes::class, 'edit'])->name('clientes-edit');
    Route::post('/store', [Clientes::class, 'store'])->name('clientes-store');
    Route::put('/update/{id}', [Clientes::class, 'update'])->name('clientes-update');
    Route::post('/destroy/{id}', [Clientes::class, 'destroy'])->name('clientes-destroy');
    Route::get('/expediente/{id}', [Clientes::class, 'expediente'])->name('clientes-expediente');

});

Route::prefix('consultas')->group(function(){
    Route::get('/', [Consultas::class, 'index'])->name('consultas-index');
    Route::get('/create', [Consultas::class, 'create'])->name('consultas-create');
    Route::get('/edit/{id}', [Consultas::class, 'edit'])->name('consultas-edit');
    Route::post('/store', [Consultas::class, 'store'])->name('consultas-store');
    Route::put('/update/{id}', [Consultas::class, 'update'])->name('consultas-update');
    Route::post('/destroy/{id}', [Consultas::class, 'destroy'])->name('consultas-destroy');
});

Route::prefix('desparasitaciones')->group(function(){
    Route::get('/', [Desparasitaciones::class, 'index'])->name('desparasitaciones-index');
    Route::get('/create', [Desparasitaciones::class, 'create'])->name('desparasitaciones-create');
    Route::get('/edit/{id}', [Desparasitaciones::class, 'edit'])->name('desparasitaciones-edit');
    Route::post('/store', [Desparasitaciones::class, 'store'])->name('desparasitaciones-store');
    Route::put('/update/{id}', [Desparasitaciones::class, 'update'])->name('desparasitaciones-update');
    Route::post('/destroy/{id}', [Desparasitaciones::class, 'destroy'])->name('desparasitaciones-destroy');
});

Route::prefix('vacunas')->group(function(){
    Route::get('/', [Vacunas::class, 'index'])->name('vacunas-index');
    Route::get('/create', [Vacunas::class, 'create'])->name('vacunas-create');
    Route::get('/edit/{id}', [Vacunas::class, 'edit'])->name('vacunas-edit');
    Route::post('/store', [Vacunas::class, 'store'])->name('vacunas-store');
    Route::put('/update/{id}', [Vacunas::class, 'update'])->name('vacunas-update');
    Route::post('/destroy/{id}', [Vacunas::class, 'destroy'])->name('vacunas-destroy');
});