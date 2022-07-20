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

Route::view('/', 'index')->name('index');
Route::view('/product/{slug}', 'show')->name('show');
Route::view('/search', 'search')->name('search');
Route::view('/category/{category}', 'search')->name('category');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function() {
    Route::view('/', 'dashboard.index')->name('index');
    Route::resource('category', \App\Http\Controllers\CategoryController::class)->except('show');
    Route::resource('subcategory', \App\Http\Controllers\SubcategoryController::class)->except('show');
    Route::resource('product', \App\Http\Controllers\ProductController::class)->except('show');
});

require __DIR__.'/auth.php';
