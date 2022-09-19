<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplierPaymentList;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class supplierpaymentreport extends Controller
{
   public function index(){
     $supplier= supplierPaymentList::all();
     $balance=DB::table('supplier_payment_lists')->sum('supplierCarrentBalance');
     return view('admin.supplierPaymentReport.index', compact('supplier', 'balance'));
   }
}
