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

    public function index($invoice_id)
    {
        // $showData=DB::table('sales_products');
        // ->leftJoin('productstock_manages', 'sales_products.productID', '=', 'productstock_manages.id')
        // ->leftJoin('customers', 'sales_products.customerID', '=', 'customers.id')
        // ->get();
        $showData=customer::select('id', 'customerName', 'customerEmail', 'customerPhone', 'customerAddress', 'customerBalance');
        $companyData=company_details::select('id', 'companyName', 'companyEmail', 'phone', 'address', 'logo');
        $invoiceDate=SalesProduct::find($invoice_id);
        $dd=SalesProduct::where('invoice_id', $invoice_id)->get();
        // dd($dd);
        return view('admin.salesReports.salesInvoice', compact('showData', 'companyData', 'invoiceDate', 'dd'));
    }

}
