<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Product Controller
Route::get('/order', [OrderController::class, 'index'])->name('order.index');

Route::middleware(['auth'])->group(function() {

    Route::middleware(['roleCheck'])->group(function() {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
});

require __DIR__.'/auth.php';
