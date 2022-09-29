<?php

namespace App\Http\Controllers;

use App\Http\Requests\purchaseManage as RequestsPurchaseManage;
use App\Models\category;
use App\Models\Supplier;
use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Models\purchaseManage;
use App\Models\productstockManage;
use App\Models\purchaseShortManage;
use App\Models\supplierPaymentList;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PurchaseManageController extends Controller
{
    public function index()
    {
        // $data = DB::table('purchase_manage')
        //         ->leftJoin('productstock_manages' , 'purchase_manage.productID','=','productstock_manages.id')->get([
        //             'purchase_manage.*' ,
        //             'productstock_manages.productName',]);
        $data = purchaseShortManage::all();
        return view('admin.purchaseManage.index' , compact('data'));
    }

    public function ProdData($id)
    {
        $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate')->get();
        return response()->json($prodData, 200);
    }

    public function maxID($id)
    {
        $maxid = purchaseManage::select(DB::raw('MAX(pid) AS pid'))->get();
        return response()->json($maxid, 200);
    }
    public function prodCode($pCode)
    {
        $code = productstockManage::where('prodCode', $pCode)->get();
        return response()->json($code , 200);
    }

    public function create()
    {
        $product = productstockManage::all();
        $catagory = category::all();
        $supplier = Supplier::all();

        return view('admin.purchaseManage.create', compact('product','catagory','supplier'));
    }

    public function store(RequestsPurchaseManage $request)
    {
        // dd($request->all());
        $supplierID = $request->supplierID;
        $pid = $request->pid;
        $invNumber = $request->invNumber;
        $supplierName = $request->supplierName;
        $purchaseDate = $request->purchaseDate;
        $productID = $request->productID;
        $prodCode = $request->prodCode;
        $prodQty = $request->prodQty;
        $prodRate = $request->prodRate;
        $totalPrice = $request->totalPrice;
        $grandTotal = $request->grandTotal;
        $paidAmount = $request->paidAmount;
        $duesAmount = $request->duesAmount;
        $transection = $request->transactionMethod;
        $note = $request->note;

        for ($i=0; $i <count($productID) ; $i++) {
            $dataInsert =[
                'pid' => $pid,
                'productID' => $productID[$i],
                'prodCode' => $prodCode[$i],
                'invNumber' => $invNumber,
                'purchaseDate' => $purchaseDate,
                'supplierID' => $supplierID,
                'supplierName' => $supplierName,
                'prodQty' => $prodQty[$i],
                'prodRate' => $prodRate[$i],
                'totalPrice' => $totalPrice[$i],
                'grandTotal' => $grandTotal,
                'paidAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
                'note' => $note,
            ];
            $inserted = purchaseManage::create($dataInsert);

        }
        $shortData = [
            'pID' => $pid,
            'invNumber' => $invNumber,
            'supplierName' => $supplierName,
            'purchaseDate' => $purchaseDate,
        ];
        $shortDataInsert = purchaseShortManage::create($shortData);

        if ($shortDataInsert) {
            $findSupp = Supplier::find($supplierID);
            $supPamntData = [
                'pID' => $pid,
                'invNumber' => $invNumber,
                'supplierID' => $supplierID,
                'supplierName' => $supplierName,
                'paymentDate' => $purchaseDate,
                'transactionMethod' => $transection,
                'supplierPrevBalance' => $findSupp->supplierCarrentBalance,
                'paymentAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
                'supplierCarrentBalance' => $findSupp->supplierCarrentBalance + $duesAmount,
                'note' => $note,
            ];
            // return $supPamntData;
            supplierPaymentList::create($supPamntData);
        }

        if ($inserted) {
            //Supplier Stock Update
            $findSupplier = Supplier::find($supplierID);
            $supBlncUpdate = $duesAmount + $findSupplier->supplierCarrentBalance;
            $UpdateBlnc = [
                'supplierCarrentBalance' => $supBlncUpdate
            ];
            $findSupplier->update($UpdateBlnc);
            // //Supplier Stock Update End
            // //Product Stock Update
            for ($i=0; $i <count($productID) ; $i++) {
                $findProd = productstockManage::find($productID[$i]);
                $prodStockUpdate = $prodQty[$i] + $findProd->stockBalance;
                $updateStock = [
                    'stockBalance' => $prodStockUpdate
                ];
                // print_r($updateStock) ;
                $findProd->update($updateStock);
            }
            //Product Stock Update end
        }
        return redirect('authorized/purchase-manage')->with('success' , 'Purchase Data and Related Stocks Updated');
    }

    public function destroy($pid)
    {
        purchaseManage::where('pid',$pid)->delete();
        purchaseShortManage::where('pid',$pid)->delete();
        return back()->with('warning', 'Invoice delete successfully.');
    }
}
