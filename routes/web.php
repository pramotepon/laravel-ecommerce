<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayConfirmController;
use App\Models\Cart;
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

Route::middleware(['auth'])->group(function() {

    Route::middleware(['roleCheck'])->group(function() {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/add_product', [ProductController::class, 'addProduct'])->name('admin.product.add');
        Route::post('/product_store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/product/view/{product}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/product/delete/{product}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    });

    // Cart Controller
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/add_cart/{product}', [CartController::class, 'addCart'])->name('cart.add');
    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/check_out', [CartController::class, 'checkOut'])->name('cart.checkout');
    Route::delete('/cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    // Product Controller
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');

    // PayConfirm Controller
    Route::get('/pay_confirm', [PayConfirmController::class, 'index'])->name('payConfirm.index');
});

require __DIR__.'/auth.php';
