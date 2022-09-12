<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\purchaseManage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class purchaseLedgerReports extends Controller
{
    public function index() {

        return view('admin.purchaseReports.index');

    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('purchase_manage')
       ->leftJoin('productstock_manages' , 'purchase_manage.productID','=','productstock_manages.id')
         ->whereBetween('purchaseDate', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('purchase_manage')->orderBy('date', 'desc')->get();
      }
      echo json_encode($data);
     }
    }
}
