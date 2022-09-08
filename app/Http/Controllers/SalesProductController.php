<?php

namespace App\Http\Controllers;

use App\Models\SalesProduct;
use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\productstockManage;
use App\Models\stockManagment;
use Illuminate\Http\Request;

class SalesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData=SalesProduct::all();
        return view('admin.salesProduct.index', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer=customer::all();

        $productName=productstockManage::all();

        return view('admin.salesProduct.create', compact('customer', 'productName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        SalesProduct::create($input);
        return redirect('authorized/salesproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesProduct  $salesProduct
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productName=productstockManage::where('id', $id)->select('id', 'prodCode', 'prodRate')->get();
        return response()->json($productName, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesProduct  $salesProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesProduct $salesProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalesProduct  $salesProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesProduct $salesProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesProduct  $salesProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesProduct $salesProduct)
    {
        //
    }
}
