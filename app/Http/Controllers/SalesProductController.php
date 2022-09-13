<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use App\Models\stockManagment;
use App\Models\productstockManage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\salesProduct as RequestsSalesProduct;

class SalesProductController extends Controller
{

    public function index()
    {
        $showData=DB::table('sales_products')
        ->leftJoin('productstock_manages', 'sales_products.productID', '=', 'productstock_manages.id')
        ->leftJoin('customers', 'sales_products.customerID', '=', 'customers.id')
        ->get();
        return view('admin.salesProduct.index', compact('showData'));
    }

    public function selData($id){
        $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate')->get();
        return response()->json($prodData, 200);
    }

    public function selData2($id){
        $maxid = SalesProduct::select(DB::raw('MAX(invoice_id) AS invoice_id'))->get();
        return response()->json($maxid, 200);
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
        $invoice_id = $request->invoice_id;
        $invNumber = $request->invNumber;
        $customerID = $request->customerID;
        $purchaseDate = $request->purchaseDate;
        $productID = $request->productID;
        $prodCode = $request->prodCode;
        $prodQty = $request->prodQty;
        $prodRate = $request->prodRate;
        $totalPrice = $request->totalPrice;
        $grandTotal = $request->grandTotal;
        $paidAmount = $request->paidAmount;
        $duesAmount = $request->duesAmount;

        for ($i=0; $i <count($productID) ; $i++) {
            $daraInsert =[
                'invoice_id' => $invoice_id,
                'invNumber' => $invNumber,
                'customerID' => $customerID,
                'purchaseDate' => $purchaseDate,
                'productID' => $productID[$i],
                'prodCode' => $prodCode[$i],
                'prodQty' => $prodQty[$i],
                'prodRate' => $prodRate[$i],
                'totalPrice' => $totalPrice[$i],
                'grandTotal' => $grandTotal,
                'paidAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
            ];
            $inserted = SalesProduct::create($daraInsert);
        }
        if ($inserted) {
            //Customer Stock Update
            $findCustomer = customer::find($customerID);
            $custoBlncUpdate = $duesAmount + $findCustomer->customerBalance;
            $UpdateBlnc = [
                'customerBalance' => $custoBlncUpdate
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

    public function destroy(SalesProduct $salesProduct)
    {
        //
    }
}
