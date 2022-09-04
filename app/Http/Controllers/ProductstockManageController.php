<?php

namespace App\Http\Controllers;

use App\Http\Requests\productManageRequest;
use App\Models\category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Models\productstockManage;
use Illuminate\Support\Facades\DB;

class ProductstockManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = DB::table('productstock_manages')
        ->leftJoin('categories' , 'productstock_manages.catagoryID','=','categories.id')
        ->leftJoin('sub_categories' , 'productstock_manages.subCatagoryID','=','sub_categories.id')->get([
            'productstock_manages.*' ,
            'categories.categoryName',
            'sub_categories.subCategoryName',
        ]);
        $find = productstockManage::all();

        return view('admin.productManage.index' , compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagory = category::all();
        $subcatagory = subCategory::all();
        return view('admin.productManage.create' , compact('catagory','subcatagory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productManageRequest $request)
    {
        $data = $request->all();
        // dd($data);
        productstockManage::create($data);
        return redirect('authorized/product-stock')->with('success', 'Product create successfully.');;
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
        $catagory =  DB::table('productstock_manages')
        ->leftJoin('categories' , 'productstock_manages.catagoryID','=','categories.id')->get();
        $subcatagory = DB::table('productstock_manages')
        ->leftJoin('sub_categories' , 'productstock_manages.catagoryID','=','sub_categories.id')->get();;
        return view('admin.productManage.productStockEdit' , compact('findData','catagory','subcatagory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function update(productManageRequest $request,$id)
    {
        $findDat = productstockManage::find($id);
        $upData = $request->all();
        $findDat->update($upData);
        return redirect('authorized/product-stock')->with('info', 'Product update successfully.');
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
        return back()->with('warning', 'Product delete successfully.') ;
    }
}
