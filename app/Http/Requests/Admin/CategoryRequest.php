<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name_ar' => 'required|unique:categories,name->ar,'. $this->category->id,
                'name_en' => 'required|unique:categories,name->en,'. $this->category->id,
                'slug_ar' => 'required|unique:categories,slug->ar,'. $this->category->id,
                'slug_en' => 'required|unique:categories,slug->en,'. $this->category->id,
                'status'  => 'boolean'
            ];
        else
            return [
                'name_ar' => 'required|unique:categories,name->ar',
                'name_en' => 'required|unique:categories,name->en',
                'slug_ar' => 'required|unique:categories,slug->ar',
                'slug_en' => 'required|unique:categories,slug->en',
                'status'  => 'boolean'
            ];
    }
}