<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\productstockManage;
use Illuminate\Http\Request;

class stockLedgerReport extends Controller
{
    public function index() {
        $stock=productstockManage::all();
        return view('admin.stockLedgerReport.index', compact('stock'));
    }

    public function show($id)
    {
        $stock=productstockManage::where('id', $id)->select('id', 'productName', 'prodCode', 'prodRate', 'stockBalance')->get();
        return response()->json($stock, 200);
    }
}
