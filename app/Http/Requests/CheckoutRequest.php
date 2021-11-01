<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'ship_name' => 'required',
            'ship_phone' => 'required',
            'ship_email' => 'required|email',
            'ship_address' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ship_name.required'=>"Name cannot be blank",
            'ship_phone.required'=>"Phone cannot be blank",
            'ship_email.required'=>"Email cannot be blank",
            'ship_address.required'=>"Address cannot be blank",
        ];
    }
}
