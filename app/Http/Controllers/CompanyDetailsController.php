<?php

namespace App\Http\Controllers;

use App\Models\company_details;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input=company_details::all();
        return view('admin.companyDetails.index' , compact('input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companyDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input= $request->all();

        company_details::create($input);
        return redirect('authorized/company')->with('flash_message','company');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function show(company_details $company_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input = company_details::find($id);
        return view('admin.companyDetails.edit' , compact('input'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $company = company_details::find($id);
        $input = $request->all();
        $company->update($input);
        return redirect('authorized/company')->with('flash_message', 'company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company_details  $company_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(company_details $company_details)
    {
        //
    }
}
