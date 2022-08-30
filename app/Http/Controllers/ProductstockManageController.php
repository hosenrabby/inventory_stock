<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stockManagment;
use App\Models\productstockManage;

class ProductstockManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = productstockManage::all();
        return view('admin.productManage.index' , compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productManage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        productstockManage::create($data);
        return redirect('authorized/product-stock');
        // stockManagment::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function show(productstockManage $productstockManage)
    {
        // return view('admin.productManage.productStockEdit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findData = productstockManage::find($id);
        $selectedData = productstockManage::all();
        return view('admin.productManage.productStockEdit' , compact('findData','selectedData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $findDat = productstockManage::find($id);
        $upData = $request->all();
        $findDat->update($upData);
        return redirect('authorized/product-stock');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        productstockManage::destroy($id);
        return back();
    }
}
