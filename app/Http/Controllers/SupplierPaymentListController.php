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

        $spl= supplierPaymentList::all();
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
        // $input= $request->all();
        $supID = $request->supID;
        $supplierName = $request->supplierName;
        $paymentDate = $request->paymentDate;
        $transactionMethod = $request->transactionMethod;
        $paymentAmount = $request->paymentAmount;
        $note = $request->note;

        $findSupp = Supplier::find($supID);
        $paymListInsert = [
            'supplierID' => $supID,
            'supplierName' => $supplierName,
            'paymentDate' => $paymentDate,
            'transactionMethod' => $transactionMethod,
            'note' => $note,
            'supplierPrevBalance' => $findSupp->supplierCarrentBalance,
            'paymentAmount' => $paymentAmount,
            'supplierCarrentBalance' => $findSupp->supplierCarrentBalance - $paymentAmount,
        ];
        $dataInsert = supplierPaymentList::create($paymListInsert);

        if ($dataInsert) {
            $findSupplier = Supplier::find($supID);
            $supBlncUpdate = $findSupplier->supplierCarrentBalance - $paymentAmount;
            $UpdateBlnc = [
                'supplierCarrentBalance' => $supBlncUpdate
            ];
            $findSupplier->update($UpdateBlnc);
        }
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
