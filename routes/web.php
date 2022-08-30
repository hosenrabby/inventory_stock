<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductstockManageController;
use App\Http\Controllers\SupplierController;

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
    Route::resource('product-stock', ProductstockManageController::class);
    Route::resource('supplier', SupplierController::class);
});
