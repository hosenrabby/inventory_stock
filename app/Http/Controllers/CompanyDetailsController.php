<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_details;
use App\Http\Controllers\Controller;
use App\Http\Requests\companyStoreRequest;

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
    public function store(companyStoreRequest $request)
    {
        $companyName = $request->companyName;
        $companyEmail = $request->companyEmail;
        $_token = $request->_token;
        $address = $request->address;
        $phone = $request->phone;
        $img = $request->file('logo');
        $img_name= hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
        $img_url='upload/'.$img_name;
        $img->move(public_path('upload'),$img_name);

       company_details::insert([
            'companyName'=>$companyName,
            'companyEmail'=>$companyEmail,
            '_token'=>$_token,
            'address'=>$address,
            'phone'=>$phone,
            'img_url'=>$img_url,
       ]);
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
    public function update(companyStoreRequest $request,  $id)
    {
        $company = company_details::find($id);
        $image_path1=public_path().'/'.$company->img_url;
        $companyName = $request->companyName;
        $companyEmail = $request->companyEmail;
        $_token = $request->_token;
        $address = $request->address;
        $phone = $request->phone;
        $img = $request->file('logo');
        $img_name= hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
        $img_url='upload/'.$img_name;
        $img->move(public_path('upload'),$img_name);
       $input=([
            'companyName'=>$companyName,
            'companyEmail'=>$companyEmail,
            '_token'=>$_token,
            'address'=>$address,
            'phone'=>$phone,
            'logo'=>$img_url,
       ]);
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

    // public function image_upload($request, $company_id){
    //     if($request->hasFile('image')){
    //         //photo location
    //         $photo_location='pulic/uploads/';
    //         $uploaded_photo=$request->file('image');
    //         $photo_name=$company_id.'.'.$uploaded_photo->getClientOriginalExtension();
    //         $new_photo_location=$photo_location.$photo_name;
    //         Image::make($uploaded_photo)->resize(100,100)->save(base_path($new_photo_location));

    //         //update the company image field
    //         $company=company_details::find($company_id);
    //         $company->update([
    //             'image'=>$photo_name
    //         ]);

    //     }else{
    //         return back();
    //     }
    // }
}
