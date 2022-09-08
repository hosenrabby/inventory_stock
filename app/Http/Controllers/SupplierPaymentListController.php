<?php

namespace App\Http\Controllers;

use App\Models\supplierPaymentList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierPaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input=supplierPaymentList::all();
        return view('admin.supplierPaymentList.index' , compact('input'));
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
     * @param  \App\Models\supplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function show(supplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function edit(supplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplierPaymentList $supplierPaymentList)
    {
        //
    }
}
