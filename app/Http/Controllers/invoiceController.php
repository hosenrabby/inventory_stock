<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\salesProduct as RequestsSalesProduct;
use App\Models\company_details;
use App\Models\customer;
use App\Models\productstockManage;
use App\Models\purchaseManage;
use App\Models\SalesProduct;

class invoiceController extends Controller
{

    public function salesInv($invoice_id)
    {
        $showData=DB::table('sales_products')
        ->leftJoin('customers', 'sales_products.customerID', '=', 'customers.id')->where('invoice_id', $invoice_id)->limit(1)
        ->get();
        $product=DB::table('sales_products')
        ->leftJoin('productstock_manages', 'sales_products.productID', '=', 'productstock_manages.id')->where('invoice_id', $invoice_id)
        ->get();
        $companyData=company_details::find(1);
        $salesData1=SalesProduct::where('invoice_id', $invoice_id)->limit(1)->get();
        $salesData=SalesProduct::where('productID', $invoice_id)->get();

        // dd($product);
        return view('admin.salesReports.salesInvoice', compact('companyData', 'showData', 'salesData1','salesData', 'product'));
    }

}
