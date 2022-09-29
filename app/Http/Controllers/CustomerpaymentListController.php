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
        $spl= customerpaymentList::all();
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
        // $input= $request->all();
        // $dataInsert = customerpaymentList::create($input);

        $cusID = $request->cusID;
        $customerName = $request->customerName;
        $paymentDate = $request->paymentDate;
        $transactionMethod = $request->transactionMethod;
        $paymentAmount = $request->paymentAmount;
        $note = $request->note;

        $findCust = customer::find($cusID);
        $paymListInsert = [
            'customerID' => $cusID,
            'customerName' => $customerName,
            'paymentDate' => $paymentDate,
            'transactionMethod' => $transactionMethod,
            'note' => $note,
            'custoPrevBalance' => $findCust->custoPrevBalance,
            'paymentAmount' => $paymentAmount,
            'custoCarrentBalance' => $findCust->customerCurrentBalance - $paymentAmount,
        ];
        $dataInsert = customerpaymentList::create($paymListInsert);


        // $paidBlnc = $request->paymentAmount;
        if ($dataInsert) {
            $findCustomer = customer::find($cusID);
            $custoBlncUpdate = $findCustomer->customerCurrentBalance - $paymentAmount;
            $UpdateBlnc = [
                'customerCurrentBalance' => $custoBlncUpdate
            ];
            $findCustomer->update($UpdateBlnc);
        }
        return redirect('authorized/customerPaymentList')->with('success', 'Customer Payment create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customerpaymentList  $customerpaymentList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerr=customer::where('id', $id)->select('id', 'customerEmail','customerPhone')->get();
        return response()->json($customerr, 200);
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
