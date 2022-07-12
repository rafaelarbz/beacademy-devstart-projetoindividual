<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('home');
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

