<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');

    route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
    route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');
    route::put('/users/{user}/interests', [UserController::class, 'updateInterests'])->name('users.updateInterests');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});