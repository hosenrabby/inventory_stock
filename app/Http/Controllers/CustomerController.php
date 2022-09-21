<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\customerpaymentList;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=customer::all();
        return view('admin.Customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customerName = $request->customerName;
        $customerEmail = $request->customerEmail;
        $customerPhone = $request->customerPhone;
        $customerAddress = $request->customerAddress;
        $note = $request->note;
        $custoPrevBalance = $request->custoPrevBalance;
        $customerCurrentBalance = $request->customerCurrentBalance;

        $customer = [
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'customerAddress' => $customerAddress,
            'note' => $note,
            'custoPrevBalance' => $custoPrevBalance,
            'customerCurrentBalance' => $customerCurrentBalance,
        ];
        customer::create($customer);
        $custoPayment = [
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerContact' => $customerPhone,
            'paymentDate' => date('d-m-Y'),
            'note' => $note,
            'custoPrevBalance' => $custoPrevBalance,
            'custoCarrentBalance' => $customerCurrentBalance,
        ];
        customerpaymentList::create($custoPayment);
        return redirect('authorized/customer')->with('success', 'Customer Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);
        return view('admin.Customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request,  $id)
    {
        $customer = customer::find($id);
        $input = $request->all();
        $customer->update($input);
        return redirect('authorized/customer')->with('info', "Customer Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cusData = customer::find($id);
        $cusBlnc = $cusData->customerBalance;
        if ($cusBlnc === '0.00') {
            customer::destroy($id);
            return back()->with('warning', 'Customer delete successfully.');
        }
        else {
            return back()->with('warning', 'Customer Info Cant Delete Customer Balnce exist');
        }

        // customer::destroy($id);
        // return redirect('authorized/customer')->with('warning', 'customer deleted successfully!');
    }
}
