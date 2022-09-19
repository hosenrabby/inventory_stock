<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class customerLedgerReport extends Controller
{
    public function index(){
        $customer=customer::all();
        $balance=DB::table('customers')->sum('customerBalance');

        return view('admin.customerLdgerReport.index', compact('customer', 'balance'));

    }
    public function customerLedgerReport(){
        $customer=customer::all();
        $balance=DB::table('customers')->sum('customerBalance');

        return view('admin.customerLdgerReport.customerInvoice', compact('customer', 'balance'));
    }
}
