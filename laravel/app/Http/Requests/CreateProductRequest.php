<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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

    public function messages()
    {
        return [
            'SKU.required' => 'SKU is required',
            'SKU.unique' => 'Product SKU should be unique',
            'SKU.max' => 'SKU should be less than 25',
            'name.required' => 'Product name is required',
            'name.unique' => 'Product name should be unique',
            'small_description.required' => 'This description is required',
            'small_description.min' => 'Max length of small description should be less than 200 characters',
            'price.required' => 'Price is required',
            'thumbnail' => 'Thumbnail is required'

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'SKU' => 'required|min:1|max:25|unique:products',
            'name' => 'required|min:2|max:150|unique:products',
            'small_description' => 'required|min:10|max:200',
            'thumbnail' => 'required|image',
            'product_images.*' => 'image'
        ];
    }
}
