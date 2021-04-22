<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'purchase_at' => 'required|date|before:tomorrow',
            'delivery_days' => 'required',
            'amount' => 'required',
            'products'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'purchase_at' => 'purchase date is required and needs to be before tomorrow',
            'delivery_days' => 'delivery days are required',
            'amount' => 'amount is required',
            'products'=>'products is required',
        ];
    }
}
