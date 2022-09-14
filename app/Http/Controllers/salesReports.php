<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\customer;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class salesReports extends Controller
{
    public function index()
    {
        $searchData = [];
        $custoName = customer::all();
        return view('admin.salesReports.index' , compact('custoName'))->with('searchData' , $searchData);
    }

    public function searchData(Request $request)
    {

        $dateFrom = Carbon::parse($request->start_date)->format('Y-m-d');
        $dateTo = Carbon::parse($request->end_date)->format('Y-m-d');

        $searchData = DB::table('sales_products')
                    ->leftJoin('customers' , 'sales_products.customerID','=','customers.id')
                    ->leftJoin('productstock_manages' , 'sales_products.productID','=','productstock_manages.id')
                    ->get([
                        'sales_products.*' ,
                        'customers.customerName',
                        'productstock_manages.productName',
                    ]);
                return view('admin.salesReports.index' , compact('searchData'));
    }
}
