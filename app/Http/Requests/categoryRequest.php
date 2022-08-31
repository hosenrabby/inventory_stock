<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'categoryName'=>'required|string|max:255',
            'categoryCode'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return[
            'categoryName.required'=>'Please Enter Category Name only',
            'categoryCode.required'=>'Please Enter Category Cone Number only'
        ];
    }
}
