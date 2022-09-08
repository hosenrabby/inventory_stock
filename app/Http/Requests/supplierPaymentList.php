<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierPaymentList extends FormRequest
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

            'supplierID'=>'Bail|required|numeric',
            'supplierEmail'=>'Bail|required|email',
            'supplierContact'=>'Bail|required|numeric',
            'paymentDate'=>'Bail|required|date',
            'transactionMethod'=>'Bail|required|string',
            'paymentAmount'=>'Bail|required|numeric',
            'note'=>'Bail|required|string',

        ];
    }
}
