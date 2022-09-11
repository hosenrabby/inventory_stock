<?php

namespace App\Http\Controllers;

use App\Http\Requests\purchaseManage as RequestsPurchaseManage;
use App\Models\category;
use App\Models\Supplier;
use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Models\purchaseManage;
use App\Models\productstockManage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PurchaseManageController extends Controller
{
    public function index()
    {
        $data = purchaseManage::all();
        return view('admin.purchaseManage.index' , compact('data'));
    }

    public function dataRetrive($id)
    {
        $prodData = productstockManage::where('id','=' , $id)->select('prodCode','prodRate')->get();
        return response()->json($prodData, 200);
    }

    public function dataRetrive2($id)
    {
        $maxid = purchaseManage::select(DB::raw('MAX(pid) AS pid'))->get();
        return response()->json($maxid, 200);
    }

    public function create()
    {
        $product = productstockManage::all();
        $catagory = category::all();
        $subCatagory = subCategory::all();
        $supplier = Supplier::all();

        return view('admin.purchaseManage.create', compact('product','catagory','subCatagory','supplier'));
    }

    public function store(RequestsPurchaseManage $request)
    {
        $pid = $request->pid;
        $invNumber = $request->invNumber;
        $supplierID = $request->supplierID;
        $catagoryID = $request->catagoryID;
        $subCatagoryID = $request->subCatagoryID;
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
                'pid' => $pid,
                'productID' => $productID[$i],
                'prodCode' => $prodCode[$i],
                'invNumber' => $invNumber,
                'purchaseDate' => $purchaseDate,
                'catagoryID' => $catagoryID,
                'subCatagoryID' => $subCatagoryID,
                'supplierID' => $supplierID,
                'prodQty' => $prodQty[$i],
                'prodRate' => $prodRate[$i],
                'totalPrice' => $totalPrice[$i],
                'grandTotal' => $grandTotal,
                'paidAmount' => $paidAmount,
                'duesAmount' => $duesAmount,
            ];
            $inserted = purchaseManage::create($daraInsert);
        }
        if ($inserted) {
            //Supplier Stock Update
            $findSupplier = Supplier::find($supplierID);
            $supBlncUpdate = $duesAmount + $findSupplier->supplierCarrentBalance;
            $UpdateBlnc = [
                'supplierCarrentBalance' => $supBlncUpdate
            ];
            $findSupplier->update($UpdateBlnc);
            //Supplier Stock Update End
            //Product Stock Update
            for ($i=0; $i <count($productID) ; $i++) {
                $findProd = productstockManage::find($productID[$i]);
                $prodStockUpdate = $prodQty[$i] + $findProd->stockBalance;
                $updateStock = [
                    'stockBalance' => $prodStockUpdate
                ];

                $findProd->update($updateStock);
            }
            //Product Stock Update end
        }
        return redirect('authorized/purchase-manage')->with('success' , 'Purchase Data and Related Stocks Updated');
    }
}
