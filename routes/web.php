<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'home'])->name('front.home');


// Dashboard Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/logout', '\App\Http\Controllers\Dashboard\UserController@logout')->name('admin.logout');


    Route::get('/', '\App\Http\Controllers\Dashboard\HomeController@index')->name('admin.home');

    Route::controller(\App\Http\Controllers\Dashboard\ProductController::class)->group(function () {
        Route::get('products', 'index')->name('admin.products.index');
        Route::post('products/store', 'store')->name('admin.products.store');
        Route::get('products/create', 'create')->name('admin.products.create');
        Route::put('products/{id}', 'update')->name('admin.products.update');
        Route::delete('products/destroy/{id}', 'destroy')->name('admin.products.destroy');
        Route::get('products/edit/{id}', 'edit')->name('admin.products.edit');
        Route::get('loadProducts', 'loadajax')->name('admin.products.ajax');

    });

    Route::controller(\App\Http\Controllers\Dashboard\CategoryController::class)->group(function(){
        Route::get('category', 'index')->name('admin.category.index');
        Route::post('category/store', 'store')->name('admin.category.store');
        Route::get('category/create', 'create')->name('admin.category.create');
        Route::put('category/{id}', 'update')->name('admin.category.update');
        Route::delete('category/destroy/{id}', 'destroy')->name('admin.category.destroy');
        Route::get('category/edit/{id}', 'edit')->name('admin.category.edit');
        Route::get('loadMain-category', 'loadajax')->name('admin.category.ajax');

    });

});
