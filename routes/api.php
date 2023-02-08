<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ecommerce\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* 
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
*/

Route::controller(ProductController::class)->group(function () {
    // https://tutiendaonline.com/api/products => Así se debe consumir desde el front
    Route::get('/products', 'getProducts');
    Route::get('/products/categories', 'getCategoryList');
    Route::get('/products/brands', 'getBandList');
    Route::get('/products/colors', 'getColorList');
    /* Filter product by one*/
    Route::get('/products/brand/{brand}', 'get_by_brand');
    Route::get('/products/category/{category_id}', 'get_by_category');
    Route::get('/products/color/{color}', 'get_by_color');
    Route::get('/products/category/{category_id}/brand/{brand}/color/{color}', 'get_by_category_brand_color');
    Route::get('/products/category/{category_id}/brand/{brand}', 'get_by_category_brand');
    Route::get('/products/category/{category_id}/color/{color}', 'get_by_category_color');
    Route::get('/products/brand/{brand}/color/{color}', 'get_by_brand_color');
});

Route::controller(SessionController::class)->group(function () {
    //These routes have authenticate verification on Controller
    Route::get('/preloader', 'loader')->name('preloader');
    Route::get('/login', 'index')->name('login');
    Route::post('/validating', 'auth')->name('login.validate');
    Route::get('signup', 'register')->name('register.form');
    Route::post('/logout', 'logout')->name('logout');
});
