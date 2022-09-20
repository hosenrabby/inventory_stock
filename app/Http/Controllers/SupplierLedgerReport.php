<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SupplierLedgerReport extends Controller
{
    public function index(){
        $input=Supplier::all();
        $balance=DB::table('suppliers')->sum('supplierCarrentBalance');
        return view('admin.supplierLedgerReport.index', compact('input', 'balance'));
    }

    public function SupplierLedgerReport(){
        $supplier=Supplier::all();
        $balance=DB::table('suppliers')->sum('supplierCarrentBalance');
        return view('admin.supplierLedgerReport.supplierInvoice', compact('supplier', 'balance'));
    }
}
