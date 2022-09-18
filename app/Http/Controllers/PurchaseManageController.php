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
        $data = DB::table('purchase_manage')
                ->leftJoin('productstock_manages' , 'purchase_manage.productID','=','productstock_manages.id')->get([
                    'purchase_manage.*' ,
                    'productstock_manages.productName',]);
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
        $catagoryName = $request->catagoryName;
        $subCatagoryName = $request->subCatagoryName;
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
                'catagoryName' => $catagoryName,
                'subCatagoryName' => $subCatagoryName,
                'supplierID' => $supplierID,
                'supplierName' => $supplierName,
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
        return back()->with('warning', 'Invoice delete successfully.');
    }
}
