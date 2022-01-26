<?php

namespace App\Http\Requests\Admin;

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
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'slug_ar' => 'required|unique:products,slug->ar',
                    'slug_en' => 'required|unique:products,slug->en',
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'price' => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'status' => 'boolean',
                    'category_id' => 'required',
                    'subcategory_id' => 'nullable',
                    'child_id' => 'nullable',
                    'subchild_id' => 'nullable',
                    'feature' => 'required|mimes:jpg,jpeg,png,gif|max:3000',
                    'images' => 'required',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:3000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name_ar' => 'required|max:255',
                    'name_en' => 'required|max:255',
                    'slug_ar' => 'required|unique:products,slug->ar,'. $this->product->id,
                    'slug_en' => 'required|unique:products,slug->en,'. $this->product->id,
                    'description_ar' => 'required',
                    'description_en' => 'required',
                    'price' => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'status' => 'boolean',
                    'category_id' => 'required',
                    'subcategory_id' => 'nullable',
                    'child_id' => 'nullable',
                    'subchild_id' => 'nullable',
                    'feature' => 'nullable|mimes:jpg,jpeg,png,gif|max:3000',
                    'images' => 'nullable',
                    'images.*' => 'mimes:jpg,jpeg,png,gif|max:3000',
                ];
            }
            default: break;
        }
    }
}