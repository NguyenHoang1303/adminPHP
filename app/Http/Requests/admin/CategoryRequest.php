<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Username cannot be blank",
            'description.required'=>"Password cannot be blank",
            'thumbnail.required'=>"Thumbnail cannot be blank",
        ];
    }
}
