<?php

use App\Http\Controllers\TodayReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\salesReports;
use App\Http\Controllers\todaysalseReport;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\stockLedgerReport;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\customerLedgerReport;
use App\Http\Controllers\SupplierLedgerReport;
use App\Http\Controllers\purchaseLedgerReports;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\supplierpaymentreport;
use App\Http\Controllers\SalesProductController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\PurchaseManageController;
use App\Http\Controllers\PurchaseManageController2;
use App\Http\Controllers\ProductstockManageController;
use App\Http\Controllers\CustomerpaymentListController;
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


Route::get('/', [LoginController::class, 'loginPage']);
Route::group(['prefix' => 'authorized'] , function(){
    Route::get('login', [LoginController::class, 'loginPage'])->name('authorized.loginpage');
    Route::post('login', [LoginController::class, 'login'])->name('authorized.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('authorized.logout');

    Route::middleware(['auth'])->group(function () {
        Route::view('admin-dashboard', 'admin.index')->name('admin-dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        Route::resource('product-stock', ProductstockManageController::class);

        Route::get('purchase-manage', [PurchaseManageController::class , 'index']);
        Route::get('purchase-form', [PurchaseManageController::class , 'create']);
        Route::post('purchase-form-insert', [PurchaseManageController::class , 'store']);
        Route::get('purchase-data/{id}', [PurchaseManageController::class , 'ProdData']);
        Route::get('purchase-data1/{id}', [PurchaseManageController::class , 'maxID']);
        Route::get('purchase-data2/{id}', [PurchaseManageController::class , 'prodCode']);
        Route::get('purchase-delete/{pid}', [PurchaseManageController::class , 'destroy']);

        Route::get('salesproduct', [SalesProductController::class , 'index']);
        Route::get('salesproduct-form', [SalesProductController::class , 'create']);
        Route::post('sales-form-insert', [SalesProductController::class , 'store']);
        Route::get('salesproduct-data/{id}', [SalesProductController::class , 'selData']);
        Route::get('salesproduct-data2/{id}', [SalesProductController::class , 'selData2']);
        Route::get('salesproduct-data3/{id}', [SalesProductController::class , 'productCode']);
        Route::get('salesproduct-inv-del/{id}', [SalesProductController::class , 'destroy']);


        Route::get('salesinvoice/{invoice_id}', [invoiceController::class, 'salesInv']);
        Route::get('purchaseinvoice/{invoice_id}', [invoiceController::class, 'purchaseInv']);


        Route::resource('supplier', SupplierController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('company', CompanyDetailsController::class);

        Route::get('supplierLedgerReport', [SupplierLedgerReport::class, 'index']);
        Route::get('supplierInoices', [SupplierLedgerReport::class, 'SupplierLedgerReport']);
        Route::get('customerLedgerReport', [customerLedgerReport::class, 'index']);
        Route::get('customerInoices', [customerLedgerReport::class, 'customerLedgerReport']);
        Route::get('purchaseReports', [purchaseLedgerReports::class, 'index']);
        Route::post('purchaseReports', [purchaseLedgerReports::class, 'fetch_data'])->name('purchaseReports');;
        Route::get('stockLedgerReport', [stockLedgerReport::class, 'index']);
        Route::get('category-product-search/{id}', [stockLedgerReport::class, 'category']);
        Route::get('subcategory-product-search/{id}', [stockLedgerReport::class, 'subcategory']);
        Route::get('subcategorydata-product-search/{id}', [stockLedgerReport::class, 'subcategorydata']);
        Route::get('stockLedgerInvoice', [stockLedgerReport::class, 'stockPrint']);


        Route::get('salesReports', [salesReports::class , 'index']);
        Route::post('salesReports-search', [salesReports::class , 'searchData']);

        Route::get('supplierpaymentreport', [supplierpaymentreport::class, 'index']);
        Route::get('customerpaymentreport', [customerpaymentreport::class, 'index']);

        Route::resource('supplierPaymentList',SupplierPaymentListController::class);
        Route::resource('customerPaymentList',CustomerpaymentListController::class);
        Route::get('admin-dashboard',[DashboardController::class,'index'])->name('admin-dashboard');
        Route::get('TodayReport',[TodayReport::class, 'index']);
        Route::get('todaysalseReport',[DashboardController::class,'todaysalseReport']);
        Route::get('monthlysalseReport',[DashboardController::class,'monthlysalseReport']);

     });
 });
