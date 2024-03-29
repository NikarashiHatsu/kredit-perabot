<?php

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/product/{product:slug}', [\App\Http\Controllers\IndexController::class, 'show'])->name('show');
Route::get('/search', [\App\Http\Controllers\IndexController::class, 'search'])->name('search');
Route::get('/category/{category}', [\App\Http\Controllers\IndexController::class, 'category'])->name('category');
Route::resource('checkout', \App\Http\Controllers\CheckoutController::class)->only(['store', 'index']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    // Route::get('/', function() {
    //     if (auth()->user()->role === "user") {
    //         return view('dashboard.index_user');
    //     }

    //     return view('dashboard.index');
    // })->name('index');
    Route::view('/', 'dashboard.index_user')->name('index');

    // Master Data
    Route::resource('category', \App\Http\Controllers\CategoryController::class)->except('show');
    Route::resource('subcategory', \App\Http\Controllers\SubcategoryController::class)->except('show');
    Route::resource('product', \App\Http\Controllers\ProductController::class)->except('show');
    Route::resource('cart', \App\Http\Controllers\CartController::class)->only('store', 'update', 'destroy');
    Route::resource('creditor', \App\Http\Controllers\UserController::class)->except('show')->parameters([
        'creditor' => 'user',
    ]);

    // User Data
    Route::resource('admin', \App\Http\Controllers\AdminController::class)->except('show')->parameters([
        'admin' => 'user',
    ]);

    // Transaksi
    Route::resource('order', \App\Http\Controllers\OrderController::class)->only(['index', 'show', 'edit', 'update'])->parameters([
        'order' => 'checkout',
    ]);
    Route::resource('my-order', \App\Http\Controllers\MyOrderController::class)->only(['index', 'show', 'store'])->parameters([
        'my-order' => 'checkout',
    ]);

    // Statistics

    // Settings
    Route::resource('setting', \App\Http\Controllers\SettingController::class)->only(['index', 'update'])->parameters([
        'setting' => 'user',
    ]);
    Route::resource('application-setting', \App\Http\Controllers\ApplicationSettingController::class)->only(['index', 'update']);
});

require __DIR__.'/auth.php';
