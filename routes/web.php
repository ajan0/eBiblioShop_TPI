<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\NewPasswordController;
use App\Http\Controllers\auth\PasswordResetLinkController;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\VerifyEmailController;
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

// Auth
Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('forgot-password');
Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('reset-password');
Route::get('/verify-email', [VerifyEmailController::class, 'index'])->name('verify-email');
