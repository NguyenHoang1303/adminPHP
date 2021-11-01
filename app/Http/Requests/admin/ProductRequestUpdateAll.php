<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequestUpdateAll extends FormRequest
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
            'price' => 'required|numeric|min:0|not_in:0',
            'status' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>"Category cannot be blank",
            'status.required'=>"Status cannot be blank",
            'price.numeric'=>"Ticket must be number",
            'price.min'=>"Ticket must be more than 0",
            'price.not_in'=>"Ticket must be more than 0",
        ];
    }

}
