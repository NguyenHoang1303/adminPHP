<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'minPrice' => 'numeric|min:1',
            'maxPrice' => 'numeric',
        ];
    }
    public function messages()
    {
        return [
            'minPrice.numeric'=>"Price must be numeric",
            'minPrice.min'=>"price is more than 1",
            'maxPrice.required'=>"Price must be numeric",

        ];
    }
}
