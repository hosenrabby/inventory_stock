<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Models\stockManagment;
use App\Models\productstockManage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesProductController extends Controller
{

    public function index()
    {
        $showData=SalesProduct::all();
        return view('admin.salesProduct.index', compact('showData'));
    }

    public function selData($id){
        $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate')->get();
        return response()->json($prodData, 200);
    }

    public function selData2($id){
        $maxid = SalesProduct::select(DB::raw('MAX(invoice_id) AS invoice_id'))->get();
        return response()->json($maxid, 200);
    }

    public function create()
    {
        $customer=customer::all();

        $productName=productstockManage::all();

        return view('admin.salesProduct.create', compact('customer', 'productName'));
    }


    public function store(Request $request)
    {
        // $input=$request->all();
        // SalesProduct::create($input);
        // return redirect('authorized/salesproduct');
    }


    public function show($id)
    {
        $productName=productstockManage::where('id', $id)->select('id', 'prodCode', 'prodRate')->get();
        return response()->json($productName, 200);
    }


    public function edit(SalesProduct $salesProduct)
    {
        //
    }


    public function update(Request $request, SalesProduct $salesProduct)
    {
        //
    }

    public function destroy(SalesProduct $salesProduct)
    {
        //
    }
}
