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

    Route::get('/users/{id}/cart', [OrderController::class, 'index'])->name('cart.index')->middleware('auth');
    Route::post('/add/{id}', [OrderController::class, 'add'])->name('cart.add')->middleware('auth');
    Route::post('/buy/{id}', [OrderController::class, 'buy'])->name('cart.buy')->middleware('auth');
    Route::delete('/cart/{id}', [OrderController::class, 'destroy'])->name('cart.destroy')->middleware('auth');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');

});

Route::middleware(['auth','admin'])->group(function (){

    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('admin');
    Route::post('/product', [ProductController::class, 'store'])->name('products.store')->middleware('admin');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('admin');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('admin');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('admin');

});