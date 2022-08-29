<?php

namespace App\Http\Controllers;

use App\Models\productstockManage;
use Illuminate\Http\Request;

class ProductstockManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productManage.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function show(productstockManage $productstockManage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function edit(productstockManage $productstockManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productstockManage $productstockManage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productstockManage  $productstockManage
     * @return \Illuminate\Http\Response
     */
    public function destroy(productstockManage $productstockManage)
    {
        //
    }
}
