<?php

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
*/

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('/users/show/{user}', [AdminController::class, 'showUser'])->name('admin.users.show');
Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::post('/users/{user}', [AdminController::class, 'storeUser'])->name('admin.users.store');
Route::delete('/users/delete/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');