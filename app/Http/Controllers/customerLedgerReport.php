<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class customerLedgerReport extends Controller
{
    public function index()
    {
        $customer=customer::all();
        return view('admin.customerLedgerReport.index', compact('customer'));
    }

    public function show($id){
        $customer=customer::where('id', $id)->select('id', 'customerName', 'customerEmail', 'customerPhone', 'customerBalance')->get();
        return response()->json($customer, 200);
    }
}
