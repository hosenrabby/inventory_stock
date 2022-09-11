<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\supplierPaymentList;
use App\Http\Controllers\Controller;
use App\Http\Requests\supplierPaymentList as RequestsSupplierPaymentList;
use App\Models\Supplier;

class SupplierPaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $spl=DB::table('supplier_payment_lists')
        ->leftJoin('suppliers', 'suppliers.id', '=', 'supplier_payment_lists.supplierID')->get([
            'supplier_payment_lists.*',
            'suppliers.supplierName',
        ]);
        return view('admin.supplierPaymentList.index' , compact('spl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spl=Supplier::get(['id', 'supplierName']);
        return view('admin.supplierPaymentList.create', compact('spl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsSupplierPaymentList $request)
    {
        $input= $request->all();

        supplierPaymentList::create($input);
        return redirect('authorized/supplierPaymentList')->with('success', 'Supplier Payment create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::where('id', $id)->select('id', 'supplierEmail','supplierPhone')->get();
        return response()->json($supplier, 200);
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
