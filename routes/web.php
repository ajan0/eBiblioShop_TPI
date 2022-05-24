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
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// Cart
Route::get('/cart', [CartController::class, 'index']);

// Auth
Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('reset-password');
Route::get('/verify-email', [VerifyEmailController::class, 'index'])->name('verify-email');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard');

// Dashboard
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::view('/', 'admin.index');
});