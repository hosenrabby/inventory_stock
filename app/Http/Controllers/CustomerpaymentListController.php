<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\customerpaymentList;
use App\Http\Controllers\Controller;
use App\Http\Requests\customerpaymentList as RequestsCustomerpaymentList;
use App\Models\customer;

class CustomerpaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $spl=DB::table('customerpayment_lists')
        ->leftJoin('customers', 'customers.id', '=', 'customerpayment_lists.customerID')->get([
            'customerpayment_lists.*',
            'customers.customerName',
        ]);
        return view('admin.customerPaymentList.index' , compact('spl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $customer=customer::all();

        $spl=customer::get(['id', 'customerName']);
        return view('admin.customerPaymentList.create', compact('spl'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsCustomerpaymentList $request)
    {
        $input= $request->all();

        customerpaymentList::create($input);
        return redirect('authorized/customerPaymentList')->with('success', 'Customer Payment create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customerpaymentList  $customerpaymentList
     * @return \Illuminate\Http\Response
     */
    public function show(customerpaymentList $customerpaymentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customerpaymentList  $customerpaymentList
     * @return \Illuminate\Http\Response
     */
    public function edit(customerpaymentList $customerpaymentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customerpaymentList  $customerpaymentList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customerpaymentList $customerpaymentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customerpaymentList  $customerpaymentList
     * @return \Illuminate\Http\Response
     */
    public function destroy(customerpaymentList $customerpaymentList)
    {
        //
    }
}
