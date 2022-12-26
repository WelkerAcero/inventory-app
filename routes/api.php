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
    Route::get('/products', 'index');
    /*     Route::get('product/create', 'create')->name('product.create');
    Route::get('product/{id}/bycategory', 'productByCategory')->name('product.showByCategory');

    Route::post('product', 'store')->name('product.store');
    Route::get('product/{id}/edit', 'edit')->name('product.edit');
    Route::put('product/{data}', 'update')->name('product.update');
    Route::delete('product/{id}/delete', 'destroy')->name('product.destroy'); */
});
