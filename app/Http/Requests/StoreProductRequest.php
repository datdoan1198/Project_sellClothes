<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'origin_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'amount' => 'required|numeric',
            'avatar' =>'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'images' => 'required',
            'images.*' =>'image|mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute không ngăn hơn 5 kí tự',
            'numeric' => ':attribute phải là số',
            'image' => ':attribute phải có kiểu :jpg, png, jpeg, gif',
            'max' => 'dung lượng của :attribute quá  lớn'
        ];
    }

    public function attributes()
    {
            return[
                'name' => 'Tên sản phẩm',
                'origin_price' => 'Giá bán gốc',
                'sale_price' => 'giá bán',
                'amount' => 'số lượng',
                'images' => 'ảnh',
                'avatar' => 'ảnh đại diện',
            ];
    }
}
