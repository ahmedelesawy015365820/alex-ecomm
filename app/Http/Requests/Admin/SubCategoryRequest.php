<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
        if($this->method() == 'PUT' || $this->method() == 'PATCH')
            return [
                'name_ar' => 'required|unique:categories,name->ar,'. $this->subCategory->id,
                'name_en' => 'required|unique:categories,name->en,'. $this->subCategory->id,
                'slug_ar' => 'required|unique:categories,slug->ar,'. $this->subCategory->id,
                'slug_en' => 'required|unique:categories,slug->en,'. $this->subCategory->id,
                'category_id' => 'nullable',
                'subcategory_id' => 'nullable',
                'child_id' => 'nullable',
                'subchild_id' => 'nullable',
                'status'  => 'boolean'
            ];
        else
            return [
                'name_ar' => 'required|unique:categories,name->ar',
                'name_en' => 'required|unique:categories,name->en',
                'slug_ar' => 'required|unique:categories,slug->ar',
                'slug_en' => 'required|unique:categories,slug->en',
                'category_id' => 'required|integer',
                'subcategory_id' => 'nullable',
                'child_id' => 'nullable',
                'subchild_id' => 'nullable',
                'status'  => 'boolean'
            ];
    }
}