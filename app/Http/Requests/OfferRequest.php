<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name' => 'required|unique:offers|max:255',
            'price' => 'required|max:255|min:1',
            'details' => 'required|min:10',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name.required'),
            'name.unique' => __('messages.name.unique'),
            'price.required' => __('messages.price.required'),
            'details.required' => __('messages.details.required'),

        ];
    }
}
