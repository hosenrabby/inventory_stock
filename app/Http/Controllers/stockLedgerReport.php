<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\productstockManage;
use App\Models\purchaseManage;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class stockLedgerReport extends Controller
{
    public function index() {
        $stock=category::all();
        $data=subCategory::all();
        $product=productstockManage::all();
        // $subcategory=subCategory::where('category_id')->get();
        // dd($product);
        return view('admin.stockLedgerReport.index', compact('stock', 'product', 'data'));
    }

    public function category($id)
    {
        $stock=productstockManage::where('catagoryID', $id)->select('id', 'productName', 'prodCode', 'prodRate', 'stockBalance')->get();
        return response()->json($stock, 200);
    }

    public function subcategory($catID){
        $subcategory=subCategory::where('category_id', $catID)->get();
        // dd($subcategory);
        return response()->json($subcategory, 200);
    }

    public function subcategorydata($id){
        $data=productstockManage::where('subCatagoryID', $id)->select('id', 'productName', 'prodCode', 'prodRate', 'stockBalance')->get();
        return response()->json($data, 200);
    }

    public function stockPrint(){
        $product=productstockManage::all();

        return view('admin.Invoices.stockInvoice', compact('product'));
    }

    public function stockPrintCat($id){
        $product=productstockManage::where('catagoryID' , $id)->get();
        return view('admin.Invoices.stockInvoice', compact('product'));
    }

    public function stockPrintSubcat($id){
        $product=productstockManage::where('subCatagoryID' , $id)->get();
        return view('admin.Invoices.stockInvoice', compact('product'));
    }
}
