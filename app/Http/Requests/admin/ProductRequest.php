<?php

namespace App\Http\Requests\admin;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ProductRequest extends FormRequest
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
            'price' => 'required|numeric|min:0|not_in:0',
            'detail' => 'required',
            'status' => 'required',
            'categoryId' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"Username cannot be blank",
            'description.required'=>"Password cannot be blank",
            'thumbnail.required'=>"Thumbnail cannot be blank",
            'categoryId.required'=>"Category cannot be blank",
            'detail.required'=>"Detail cannot be blank",
            'status.required'=>"Status cannot be blank",
            'price.numeric'=>"Ticket must be number",
            'price.min'=>"Ticket must be more than 0",
            'price.not_in'=>"Ticket must be more than 0",
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $name = $this->get('name');
            if($name == 'heroin'){
                $validator->errors()->add('name', 'Tao không chơi với heroin.');
            }
//            if(DB::table('products')->where('name',$name)->exists()){
//                $validator->errors()->add('name', 'Name duplicate, please enter another name.');
//            }
        });
    }
}
