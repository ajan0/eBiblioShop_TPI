<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\NewPasswordController;
use App\Http\Controllers\auth\PasswordResetLinkController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\VerifyEmailController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Books
Route::group(['middleware' => 'auth'], function(){
    Route::resource('books', BookController::class)->only(['create', 'store', 'destroy']);
    Route::get('/books/create/step1', [BookController::class, 'createStepOne'])->name('books.create.step1');
    Route::post('/books/create/step1', [BookController::class, 'storeStepOne'])->name('books.store.step1');
    Route::delete('/books', [BookController::class, 'destroySaved'])->name('books.destroySaved');
});

Route::resource('books', BookController::class)->only(['show']);

// Cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/{book}', [CartController::class, 'store'])->name('cart.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

// Dashboard
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::view('/', 'admin.index');
});