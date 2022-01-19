<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => "required|email|unique:users,email,{$this->user->id}",
                'username' => "required|min:8|max:16|unique:users,username,{$this->user->id}",
                'password' => 'required|same:confirm-password',
                'Status'  => 'required',
                'roles_name' => 'required',
                'image' => 'image:mimes,png,jepg,jpg'
            ];
        else
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => "required|email|unique:users,email",
                'username' => "required|min:8|max:16|unique:users,username",
                'password' => 'required|same:confirm-password',
                'Status'  => 'required',
                'roles_name' => 'required',
                'image' => 'image:mimes,png,jepg,jpg'
            ];
    }
}
