<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customerpaymentList;
use App\Http\Controllers\Controller;
use App\Models\company_details;

class customerpaymentreport extends Controller
{
    public function index(){
        $customer= customer::all();
        return view('admin.customerPaymentReports.index', compact('customer'));
    }

    public function custoMaxID(){
        $maxid = customer::select(DB::raw('MAX(id) AS id'))->get();
        return response()->json($maxid, 200);
    }

    public function custoData($id){
        $customerData = customerpaymentList::where('customerID' , $id)->get();
        return response()->json($customerData , 200);
    }

    public function SuppLedgerData($id){
        $company = company_details::find(1);
        $customer = customer::find($id);
        $customerData = customerpaymentList::where('customerID' , $id)->get();
        $custoPaymentBlnc = customerpaymentList::where('customerID' , $id)->sum('paymentAmount');
        return view('admin.customerPaymentReports.custoDataPrint',
        compact('customerData' , 'company' , 'customer' , 'custoPaymentBlnc'));
       }
}
