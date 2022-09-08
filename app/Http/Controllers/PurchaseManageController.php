<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        //
    }
}
