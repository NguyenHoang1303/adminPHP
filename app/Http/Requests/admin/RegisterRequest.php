<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'password' => 'required|min:6',
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:11',
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>"Password cannot be blank",
            'fullname.required'=>"Fullname cannot be blank",
            'email.required'=>"Email cannot be blank",
            'phone.required'=>"Phone cannot be blank",
        ];
    }
}
