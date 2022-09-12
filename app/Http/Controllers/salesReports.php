<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\SalesProduct;

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
        $custoName = customer::all();
        $sTerm = $request->custoID;
        $dateFrom = Carbon::parse($request->start_date)->format('Y-m-d');
        $dateTo = Carbon::parse($request->end_date)->format('Y-m-d');

        $searchData = SalesProduct::where('customerID' , $sTerm)
                ->whereBetween('purchaseDate' , [$dateFrom, $dateTo])
                ->get();
                return view('admin.salesReports.index' , compact('searchData','custoName'));
                // return $searchData;
    }
}
