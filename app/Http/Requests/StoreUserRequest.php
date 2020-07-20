<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
           'name' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:5',
           'phone' => 'required|min:10|max:13',
           'address' => 'required',
           'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'email' => ':attribute phải đúng định dạng',
            'min' => ':attribute nhỏ quá',
            'max' => ':attribute không được lớn hơn 13 số',
            'numeric' => ':attribute chỉ được chứa số',
            'image'  => ':attribute phải có kiểu :jpg, png, jpeg, gif',
        ];
    }
    public function attributes()
    {
        return[
            'name' => 'Tên người dùng',
            'email' => 'Email',
            'password' => 'Mật Khẩu',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'image' => 'Ảnh địa diện',

        ];
    }
}
