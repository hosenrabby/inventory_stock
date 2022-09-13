<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\productstockManage;
use App\Models\purchaseManage;
use App\Models\SalesProduct;
use App\Models\stockManagment;
use App\Models\Supplier;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $customer=customer::count();
        $supplier=Supplier::count();
        $totalsales=SalesProduct::count();
        $totalitemstock=productstockManage::count();
        $purchasableProduct=purchaseManage::count();



        return view('admin.index')->with([
            'customer'=>$customer,
            'supplier'=>$supplier,
            'totalsales'=>$totalsales,
            'totalitemstock'=>$totalitemstock,
            'purchasableProduct'=>$purchasableProduct,
        ]);


    }

}
