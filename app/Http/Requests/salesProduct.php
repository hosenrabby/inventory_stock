<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class salesProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'invNumber'=>'Bail|required|string',
             'customerID'=>'Bail|required|numeric',
             'purchaseDate'=>'Bail|required|date',
            'productID'=>'Bail|required|',
            'prodQty'=>'Bail|required',
            'grandTotal'=>'Bail|required|numeric',
            'paidAmount'=>'Bail|required|numeric',


        ];
    }
}
