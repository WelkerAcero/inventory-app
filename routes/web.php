<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\KardexController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::controller(SessionController::class)->group(function () {
    //These routes have authenticate verification on Controller
    Route::get('/preloader', 'loader')->name('preloader');
    Route::get('/login', 'index')->name('login');
    Route::post('/validating', 'auth')->name('login.validate');
    Route::get('signup', 'register')->name('register.form');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/country/{id}/departments', [SupplierController::class, 'jsFormEvent']);

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard.index');
        Route::get('/', 'index')->name('dashboard.index');
    });

    Route::controller(SupplierController::class)->group(function () {
        Route::get('supplier', 'index')->name('supplier.index');
        Route::get('supplier/create', 'create')->name('supplier.create');
        Route::post('supplier', 'store')->name('supplier.store');

        Route::get('supplier/{id}/department/{dep_id}/edit', 'edit')->name('supplier.edit');
        Route::put('supplier/{data}', 'update')->name('supplier.update');
        Route::delete('supplier/{id}', 'destroy')->name('supplier.destroy');

        /*         Route::resource('supplier', SupplierController::class, [
            'names' => 'supplier',
            'parameters' => ['blog', 'post']
        ]); */
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category.index');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category', 'store')->name('category.store');

        Route::get('category/{id}/edit', 'edit')->name('category.edit');
        Route::put('category/{data}', 'update')->name('category.update');
        Route::delete('category/{id}', 'destroy')->name('category.destroy');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('product.index');
        Route::get('product/create', 'create')->name('product.create');
        Route::get('product/{id}/bycategory', 'productByCategory')->name('product.showByCategory');

        Route::post('product', 'store')->name('product.store');
        Route::get('product/{id}/edit', 'edit')->name('product.edit');
        Route::put('product/{data}', 'update')->name('product.update');
        Route::delete('product/{id}/delete', 'destroy')->name('product.destroy');
    });

    Route::controller(PurchaseController::class)->group(function () {
        Route::get('purchase', 'index')->name('purchase.index');
        Route::get('purchase/create', 'create')->name('purchase.create');
    });

    Route::controller(KardexController::class)->group(function () {
        Route::get('kardex', 'index')->name('kardex.index');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('customer', 'index')->name('customer.index');
        Route::get('customer/create', 'create')->name('customer.create');
        Route::post('customer', 'store')->name('customer.store');

        Route::get('customer/{id}/edit', 'edit')->name('customer.edit');
        Route::put('customer/{id}', 'update')->name('customer.update');
        Route::delete('customer/{id}', 'destroy')->name('customer.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        /*
        Route::get('customer/create', 'create')->name('customer.create');
        Route::post('customer', 'store')->name('customer.store');

        Route::get('customer/{id}/edit', 'edit')->name('customer.edit');
        Route::put('customer/{id}', 'update')->name('customer.update');
        Route::delete('customer/{id}', 'destroy')->name('customer.destroy'); 
        */
    });
});
