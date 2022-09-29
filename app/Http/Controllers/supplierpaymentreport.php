<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplierPaymentList;
use App\Http\Controllers\Controller;
use App\Models\company_details;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class supplierpaymentreport extends Controller
{
//    public function index(){
//      $supplier= supplierPaymentList::all();
//      $balance=DB::table('supplier_payment_lists')->sum('supplierCarrentBalance');
//      return view('admin.supplierPaymentReport.index', compact('supplier', 'balance'));
//    }
   public function index(){
     $supplier= Supplier::all();
     return view('admin.supplierPaymentReport.index', compact('supplier'));
   }

   public function suppMaxID(){
    $maxid = Supplier::select(DB::raw('MAX(id) AS id'))->get();
    return response()->json($maxid, 200);
   }

   public function SuppData($id){
    $supplierData = supplierPaymentList::where('supplierID' , $id)->get();
    return response()->json($supplierData , 200);
   }

   public function SuppLedgerData($id){
    $company = company_details::find(1);
    $supplier = Supplier::find($id);
    $supplierData = supplierPaymentList::where('supplierID' , $id)->get();
    $supPaymentBlnc = supplierPaymentList::where('supplierID' , $id)->sum('paymentAmount');
    return view('admin.supplierPaymentReport.supDataPrint',
    compact('supplierData' , 'company' , 'supplier' , 'supPaymentBlnc'));
   }
}
