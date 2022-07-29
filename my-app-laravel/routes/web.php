<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function (){

    Route::get('/users/cart', [OrderController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [OrderController::class, 'add'])->name('cart.add');
    Route::put('/buy/{id}', [OrderController::class, 'buy'])->name('cart.buy');
    Route::delete('/cart/{id}', [OrderController::class, 'destroy'])->name('cart.destroy');
    Route::get('/purchases', [OrderController::class, 'buyIndex'])->name('cart.purchases');
    Route::put('/add-quantity/{id}', [OrderController::class, 'addQuantity'])->name('cart.addQuantity');
    Route::put('/remove-quantity/{id}', [OrderController::class, 'removeQuantity'])->name('cart.removeQuantity');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

});

Route::middleware(['auth','admin'])->group(function (){

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

});