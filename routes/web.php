<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductstockManageController;
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

Route::get('/', function () {
    return view('admin.index');
});

Route::group(['prefix' => 'authorized'] , function(){
<<<<<<< HEAD
    Route::resource('product-stock', ProductstockManageController::class);
=======
    Route::get('product-stock', [ProductstockManageController::class, 'index'])->name('product-stock');
    Route::resource('category', CategoryController::class);
>>>>>>> e506d56e3d48a1577f8e26a08eba66d8b1b3461e
});
