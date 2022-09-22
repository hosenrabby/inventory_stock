<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class supplierRequest extends FormRequest
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
            'supplierName'=>'Bail|required|string',
            'supplierEmail'=>'Bail|required|email',
            'supplierPhone'=>'Bail|required|numeric',
            'supplierAddress'=>'Bail|required',
            'supplierPrevBalance'=>'Bail|required|numeric',
            'supplierCarrentBalance'=>'Bail|required|numeric',
        ];
    }


}
