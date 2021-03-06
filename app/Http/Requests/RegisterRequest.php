<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => '邮箱格式错误',
            'email.unique' => '邮箱已经存在',
            'name.min' => '用户名不能少于4位',
            'name.unique' => '用户名已经存在',
            'email.required' => '缺少邮箱字段',
            'name.required' => '缺少用户名字段',
            'password.min' => '密码不能少于6位',
            'password.required' => '缺少密码字段'
        ];
    }
}
