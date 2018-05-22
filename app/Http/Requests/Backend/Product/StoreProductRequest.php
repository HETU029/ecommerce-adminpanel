<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|max:191',
            'content'        => 'required',
            'price'          => 'required',
            'image'          => 'required',
            'category_name'  =>  'required|integer',
    
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert Product Title',
            'name.max'      => 'Product Title may not be greater than 191 characters.',
        ];
    }
}
