<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productManageRequest extends FormRequest
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
            'productName'=>'Bail|required|string|max:255',
            'prodCode'=>'Bail|required|numeric',
            'catagoryID'=>'Bail|required|numeric',
            'subcatagoryID'=>'Bail|required|numeric',
            'prodRate'=>'Bail|required|numeric',
            'stockBalance'=>'Bail|required|numeric'

        ];
    }
}
