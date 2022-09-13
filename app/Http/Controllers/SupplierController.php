<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\supplierRequest;
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
        $input= $request->all();

        Supplier::create($input);
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
        // $supData = Supplier::where('id', $id)->get('supplierCarrentBalance');
        // $supData = strval($supData);
        // $supData = intval($supData);
        // dd($supData);
        // if ($supData == 0) {
            Supplier::destroy($id);
        // }
        // else {return back()->with('warning', 'Supplier Info Cant Delete Supplier Balnce exist');}
        return redirect('authorized/supplier')->with('warning', 'Supplier delete successfully.');
        // return $supData;
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
