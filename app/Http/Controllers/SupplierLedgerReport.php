<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierLedgerReport extends Controller
{
    public function index()
    {
        $supplier=Supplier::all();

        return view('admin.supplierLedgerReport.index', compact('supplier'));
    }
    public function show($id)
    {
        $suplier=Supplier::where('id', $id)->select('id', 'supplierName', 'supplierEmail', 'supplierPhone', 'supplierCarrentBalance')->get();
        return response()->json($suplier, 200);
    }
}
