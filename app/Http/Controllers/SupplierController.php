<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\supplierRequest;
use App\Models\supplierPaymentList;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input=Supplier::all();
        return view('admin.supplier.index' , compact('input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(supplierRequest $request)
    {
        // $input= $request->all();
        $supplierName = $request->supplierName;
        $supplierEmail = $request->supplierEmail;
        $supplierPhone = $request->supplierPhone;
        $supplierAddress = $request->supplierAddress;
        $note = $request->note;
        $supplierPrevBalance = $request->supplierPrevBalance;
        $supplierCarrentBalance = $request->supplierCarrentBalance;

        $supplier = [
            'supplierName' => $supplierName,
            'supplierEmail' => $supplierEmail,
            'supplierPhone' => $supplierPhone,
            'supplierAddress' => $supplierAddress,
            'note' => $note,
            'supplierPrevBalance' => $supplierPrevBalance,
            'supplierCarrentBalance' => $supplierCarrentBalance,
        ];
        Supplier::create($supplier);
        // Supplier::create($input);
        $supPayment = [
            'supplierName' => $supplierName,
            'paymentDate' => date('d-m-Y'),
            'note' => $note,
            'supplierPrevBalance' => $supplierPrevBalance,
            'supplierCarrentBalance' => $supplierCarrentBalance,
        ];
        supplierPaymentList::create($supPayment);
        return redirect('authorized/supplier')->with('success', 'Supplier create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input = Supplier::find($id);
        return view('admin.supplier.edit')->with('supplier',$input);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $supplier = Supplier::find($id);
        $input = $request->all();
        $supplier->update($input);
        return redirect('authorized/supplier')->with('info', 'Supplier update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supData = Supplier::find($id);
        $supBlnc = $supData->supplierCarrentBalance;
        if ($supBlnc === '0.00') {
            Supplier::destroy($id);
            return back()->with('warning', 'Supplier delete successfully.');
        }
        else {
            return back()->with('warning', 'Supplier Info Cant Delete Supplier Balnce exist');
        }
    }


    // public function supplierAjex()
    // {
    //     $supplier = Supplier::select('supplierName')->where('supplierName','0')->get();
    //     $data =[];

    //     foreach ($supplier as $item){
    //         $data[] = $item['supplierName'];
    //     }
    //     return $data;

    // }
}
