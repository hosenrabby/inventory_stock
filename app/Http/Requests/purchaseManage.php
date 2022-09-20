<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class purchaseManage extends FormRequest
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
            'supplierName'=>'Bail|required|string',
            'purchaseDate'=>'Bail|required|date',
            'productID'=>'Bail|required',
            'prodCode'=>'Bail|required',
            'prodQty'=>'Bail|required',
            'paidAmount'=>'Bail|required',
        ];
    }
}
