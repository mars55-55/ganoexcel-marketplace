<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\distribuidor\CategoriaController;
use App\Http\Controllers\distribuidor\ProductoController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EstadisticasController;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\ReviewController;

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

Route::middleware(['auth', 'role:distribuidor'])->prefix('distribuidor')->name('distribuidor.')->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
    Route::post('/compras', [CompraController::class, 'store'])->name('compras.store');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cotizacion', [CartController::class, 'solicitarCotizacion'])->name('cotizacion.store');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/productos/{producto}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // CRUD de productos
    Route::resource('productos', AdminProductoController::class);

    // CRUD de categorías
    Route::resource('categorias', AdminCategoriaController::class);

    // CRUD de usuarios
    Route::resource('usuarios', UserController::class);

    // Estadísticas de ventas
    Route::get('estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');

    // Gestión de promociones
    Route::resource('promociones', PromocionController::class);
});

require __DIR__.'/auth.php';
