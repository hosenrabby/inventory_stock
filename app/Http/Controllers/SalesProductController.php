<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Models\stockManagment;
use App\Models\productstockManage;
use Illuminate\Support\Facades\DB;
use App\Models\purchaseShortManage;
use App\Http\Controllers\Controller;
use App\Http\Requests\customerpaymentList;
use App\Http\Requests\salesProduct as RequestsSalesProduct;
use App\Models\customerpaymentList as ModelsCustomerpaymentList;
use App\Models\salsShortMang;

class SalesProductController extends Controller
{

    public function index()
    {
        // $showData=DB::table('sales_products')
        // ->leftJoin('productstock_manages', 'sales_products.productID', '=', 'productstock_manages.id')
        // ->get();
        $showData = salsShortMang::all();
        return view('admin.salesProduct.index', compact('showData'));
    }

    public function selData($id){
        $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate','stockBalance')->get();
        return response()->json($prodData, 200);
    }

    public function selData2($id){
        $maxid = SalesProduct::select(DB::raw('MAX(invoice_id) AS invoice_id'))->get();
        return response()->json($maxid, 200);
    }

    public function productCode($pCode){
        $code = productstockManage::where('prodCode', $pCode)->get();
        return response()->json($code , 200);
    }

    public function create()
    {
        $customer=customer::all();
        $productName=productstockManage::all();
        return view('admin.salesProduct.create', compact('customer', 'productName'));
    }


    public function store(RequestsSalesProduct $request)
    {
        // dd($request->all());
        $customer_id = $request->customer_id;
        $invoice_id = $request->invoice_id;
        $invNumber = $request->invNumber;
        $customerName = $request->customerName;
        $purchaseDate = $request->purchaseDate;
        $productID = $request->productID;
        $prodCode = $request->prodCode;
        $prodQty = $request->prodQty;
        $prodRate = $request->prodRate;
        $totalPrice = $request->totalPrice;
        $transactionMethod = $request->transactionMethod;
        $grandTotal = $request->grandTotal;
        $paidAmount = $request->paidAmount;
        $duesAmount = $request->duesAmount;
        $note = $request->note;

        for ($i=0; $i <count($productID) ; $i++) {
            $daraInsert =[
                'invoice_id' => $invoice_id,
                'invNumber' => $invNumber,
                'customerID' => $customer_id,
                'customerName' => $customerName,
                'purchaseDate' => $purchaseDate,
                'productID' => $productID[$i],
                'prodCode' => $prodCode[$i],
                'prodQty' => $prodQty[$i],
                'prodRate' => $prodRate[$i],
                'totalPrice' => $totalPrice[$i],
                'grandTotal' => $grandTotal,
                'paidAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
                'note' => $note,
            ];
            $inserted = SalesProduct::create($daraInsert);
        }

        $shortData = [
            'invoice_id' => $invoice_id,
            'invNumber' => $invNumber,
            'customerName' => $customerName,
            'purchaseDate' => $purchaseDate,
        ];
        $shortDataInsert = salsShortMang::create($shortData);

        if ($shortDataInsert) {
            $findCust = customer::find($customer_id);
            $custPamntData = [
                'invoice_id' => $invoice_id,
                'invNumber' => $invNumber,
                'customerID' => $customer_id,
                'customerName' => $customerName,
                'paymentDate' => $purchaseDate,
                'transactionMethod' => $transactionMethod,
                'custoPrevBalance' => $findCust->customerCurrentBalance,
                'paymentAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
                'custoCarrentBalance' => $findCust->customerCurrentBalance + $duesAmount,
                'note' => $note,
            ];
            ModelsCustomerpaymentList::create($custPamntData);
        }

        if ($inserted) {
            //Customer Stock Update
            $findCustomer = customer::find($customer_id);
            $custoBlncUpdate = $findCustomer->customerCurrentBalance + $duesAmount;
            $UpdateBlnc = [
                'customerCurrentBalance' => $custoBlncUpdate
            ];
            $findCustomer->update($UpdateBlnc);
            //Customer Stock Update End
            //Product Stock Update
            for ($i=0; $i <count($productID) ; $i++) {
                $findProd = productstockManage::find($productID[$i]);
                $prodStockUpdate = $findProd->stockBalance - $prodQty[$i];
                $updateStock = [
                    'stockBalance' => $prodStockUpdate
                ];

                $findProd->update($updateStock);
            }
            //Product Stock Update end
        }
        return redirect('authorized/salesproduct')->with('success' , 'Sales Data and Related Stocks Updated');
    }


    public function show($id)
    {
        $productName=productstockManage::where('id', $id)->select('id', 'prodCode', 'prodRate')->get();
        return response()->json($productName, 200);
    }
    // public function showinvoice($invoice_id){
    //     return view('admin.salesReports.salesInvoice');
    // }

    public function edit(SalesProduct $salesProduct)
    {
        //
    }


    public function update(Request $request, SalesProduct $salesProduct)
    {
        //
    }

    public function destroy($iID)
    {
        SalesProduct::where('invoice_id',$iID)->delete();
        salsShortMang::where('invoice_id',$iID)->delete();
        return back()->with('warning', 'Sales Invoice deleted successfully.');
    }
}
