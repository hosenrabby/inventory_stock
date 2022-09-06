<?php
use App\Models\purchaseManage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\customerLedgerReport;
use App\Http\Controllers\SupplierLedgerReport;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SalesProductController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\PurchaseManageController;
use App\Http\Controllers\PurchaseManageController2;
use App\Http\Controllers\ProductstockManageController;

/*
|--------------------------------------------------------------------------
| Web Routes for application
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
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::resource('product-stock', ProductstockManageController::class);
    // Route::get('purchase-manage', [PurchaseManageController::class , 'index']);
    // Route::get('purchase-from', [PurchaseManageController::class , 'create']);
    // Route::get('purchase-data', [PurchaseManageController::class , 'dataRetrive']);
    Route::resource('purchase-manage', PurchaseManageController2::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('company', CompanyDetailsController::class);
    Route::resource('salesproduct', SalesProductController::class);
    Route::resource('supplierLedgerReport', SupplierLedgerReport::class);
    Route::resource('customerLedgerReport', customerLedgerReport::class);
});
