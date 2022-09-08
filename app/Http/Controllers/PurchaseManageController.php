<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\productstockManage;
use App\Models\purchaseManage;
use App\Models\subCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = purchaseManage::all();
        return view('admin.purchaseManage.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $product = productstockManage::all();
        $catagory = category::all();
        $subCatagory = subCategory::all();
        $supplier = Supplier::all();


        return view('admin.purchaseManage.create', compact('product','catagory','subCatagory','supplier'));
    }

    // public function dataRetrive($id)
    // {
    //     $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate')->get();
    //     return response()->json($prodData, 200);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\purchaseManage  $purchaseManage
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\purchaseManage  $purchaseManage
     * @return \Illuminate\Http\Response
     */
    public function edit(purchaseManage $purchaseManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\purchaseManage  $purchaseManage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchaseManage $purchaseManage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\purchaseManage  $purchaseManage
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchaseManage $purchaseManage)
    {
        //
    }
}
