<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\distribuidor\CategoriaController;
use App\Http\Controllers\distribuidor\ProductoController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('distribuidor')->name('distribuidor.')->group(function () {
    Route::resource('productos', \App\Http\Controllers\distribuidor\ProductoController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/add/{producto}', [CarritoController::class, 'add'])->name('carrito.add');
    Route::post('/carrito/update/{id}', [CarritoController::class, 'update'])->name('carrito.update');
    Route::post('/carrito/remove/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
    Route::post('/carrito/clear', [CarritoController::class, 'clear'])->name('carrito.clear');
});


require __DIR__.'/auth.php';
