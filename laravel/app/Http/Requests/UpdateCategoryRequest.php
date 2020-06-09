<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'title.required' => 'A title is required',
            'description.required' => 'A description is required',
            'description.min' => 'Length of description should be more than 10 characters'

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
            'title' => ['required', 'min:2', 'max:150',
                Rule::unique('categories')->ignore(request()->route()->parameter('category')->id)
            ],

            //    'required|min:2|max:150|unique:categories',
            'description' => 'required|min:10'
        ];
    }
}
