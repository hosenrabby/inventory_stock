<?php

namespace App\Http\Controllers;

use App\Models\subCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\subCategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $subcategory=DB::table('sub_categories')
        ->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id')->get([
            'sub_categories.*',
            'categories.categoryName',
        ]);

        return view('admin.subCategory.index', compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories=category::get(['id', 'categoryName']);
        return view('admin.subCategory.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(subCategoryRequest $request)
    {
        $input=$request->all();
        subCategory::create($input);
        return redirect('authorized/subcategory')->with('success', 'Sub Category create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findData = subCategory::find($id);
        $selectedData = category::all();
        return view('admin.subCategory.edit', compact('findData', 'selectedData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(subCategoryRequest $request, $id)
    {
        $subcategory=subCategory::find($id);
        $input=$request->all();
        $subcategory->update($input);
        return redirect('authorized/subcategory')->with('info', 'Sub Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=subCategory::find($id)->delete();
        return redirect('authorized/subcategory')->with('warning', 'Sub Category delete successfully.');
    }
}
