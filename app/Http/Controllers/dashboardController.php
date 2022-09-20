<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Supplier;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Models\purchaseManage;
use App\Models\stockManagment;
use Illuminate\Support\Carbon;
use App\Models\productstockManage;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function index()
    {
        $customer=customer::count();
        $supplier=Supplier::count();
        $totalsales=SalesProduct::count();
        $totalitemstock=productstockManage::count();
        $purchasableProduct=purchaseManage::count();
        $invoice=SalesProduct::count();

        $todaysales=SalesProduct::whereDate('purchaseDate', Carbon::today())->get();
        $today=count($todaysales);

        $monthlysales=SalesProduct::whereMonth('purchaseDate', Carbon::now()->month)->get();
        $month=count($monthlysales);



        return view('admin.index')->with([
            'customer'=>$customer,
            'supplier'=>$supplier,
            'totalsales'=>$totalsales,
            'totalitemstock'=>$totalitemstock,
            'purchasableProduct'=>$purchasableProduct,
            'invoice'=>$invoice,
            'todaysales'=>$today,
            'monthlysales'=>$month,
        ]);


    }
    public function todaysalseReport(){
        $todaysalseReport=SalesProduct::whereDate('purchaseDate', Carbon::today())->get();
        return view('admin.todayandmonthlysummarize.todaysalseReport',compact('todaysalseReport'));

    }
    public function monthlysalseReport(){
        $monthlysalseReport=SalesProduct::whereMonth('purchaseDate', Carbon::now()->month)
        ->get();
        return view('admin.todayandmonthlysummarize.monthlysalseReport',compact('monthlysalseReport'));

    }

}
