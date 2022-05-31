<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerAddressController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;
use App\Models\CustomerAddress;
use App\Services\BookLookup\BookLookup;
use Illuminate\Support\Facades\Auth;
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
Route::get('/search', [BookController::class, 'search'])->name('search');

// Books
Route::group(['middleware' => 'auth'], function(){
    Route::resource('books', BookController::class)->only(['create', 'store', 'destroy']);
    Route::get('/books/create/step1', [BookController::class, 'createStepOne'])->name('books.create.step1');
    Route::post('/books/create/step1', [BookController::class, 'storeStepOne'])->name('books.store.step1');
    Route::delete('/books', [BookController::class, 'destroySaved'])->name('books.destroySaved');

    
    // Dashboard
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/', [DashboardController::class, 'store'])->name('dashboard.store');

        // Addresses
        Route::resource('addresses', CustomerAddressController::class);

    });
});

Route::resource('books', BookController::class)->only(['show']);

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{book}', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');


// Payments
Route::post('/pay', [PaymentController::class, 'store'])->name('payments.store');

// Dashboard
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
    Route::view('/', 'admin.index');
});