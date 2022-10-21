<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'string'
            ],
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'brand' => [
                'required',
                'string',
                'max:255'
            ],
            'Small_description' => [
                'nullable',
                'string'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'nullable',
                'integer'
            ],
            'quantity' => [
                'nullable',
                'integer'
            ],
            'trending' => [
                'nullable',
            ],
            'status' => [
                'nullable',
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],

            'image' => [
                'nullable',
                // 'mimes:jpg,jpeg,png'
            ],
        ];
    }
}
