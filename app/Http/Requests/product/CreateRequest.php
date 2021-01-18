<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|unique:products,name|max:255',
            'details' => 'required|min:10',
            'price' => 'required|max:255|min:1',
            // 'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name.required'),
            'name.unique' => __('messages.name.unique'),
            'details.required' => __('messages.details.required'),
            'price.required' => __('messages.price.required'),
            // 'image' => __('messages.image.required'),
        ];
    }
}
