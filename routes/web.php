<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\customerLedgerReport;
use App\Http\Controllers\purchaseLedgerReports;
use App\Http\Controllers\PurchaseManageController;
use App\Http\Controllers\SalesProductController;
use App\Http\Controllers\salesReports;
use App\Http\Controllers\stockLedgerReport;
use App\Http\Controllers\SupplierLedgerReport;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\CustomerpaymentListController;
use App\Http\Controllers\PurchaseManageController2;
use App\Http\Controllers\ProductstockManageController;
use App\Http\Controllers\SupplierPaymentListController;

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

    Route::get('purchase-manage', [PurchaseManageController::class , 'index']);
    Route::get('purchase-form', [PurchaseManageController::class , 'create']);
    Route::post('purchase-form-insert', [PurchaseManageController::class , 'store']);
    Route::get('purchase-data/{id}', [PurchaseManageController::class , 'dataRetrive']);
    Route::get('purchase-data2/{id}', [PurchaseManageController::class , 'dataRetrive2']);

    Route::get('salesproduct', [SalesProductController::class , 'index']);
    Route::get('salesproduct-form', [SalesProductController::class , 'create']);
    Route::get('salesproduct-data/{id}', [SalesProductController::class , 'selData']);
    Route::get('salesproduct-data2/{id}', [SalesProductController::class , 'selData2']);

    Route::resource('supplier', SupplierController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('company', CompanyDetailsController::class);
    Route::resource('supplierLedgerReport', SupplierLedgerReport::class);
    Route::resource('customerLedgerReport', customerLedgerReport::class);
    Route::resource('purchaseReports', purchaseLedgerReports::class);
    Route::resource('stockLedgerReport', stockLedgerReport::class);
    Route::resource('salesReports', salesReports::class);
    Route::resource('supplierPaymentList',SupplierPaymentListController::class);
    Route::resource('customerPaymentList',CustomerpaymentListController::class);

    // Route::get('supplier',[SupplierController::class, 'supplierAjex']);
});
