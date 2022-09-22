<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customerName'=>'Bail|required|string|max:255',
            'customerEmail'=>'Bail|required|email|max:255',
            'customerPhone'=>'Bail|required|min:14|numeric',
            'customerAddress'=>'Bail|required|max:300',
            'customerCurrentBalance'=>'Bail|required|numeric'
        ];
    }
}
