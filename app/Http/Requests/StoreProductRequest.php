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
            'price' => 'required|numeric',
            'discount_percent' => 'required|numeric',
            'amount' => 'required|numeric',
            'images' => 'required',
            'images.*' =>'image|mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute không ngăn hơn 5 kí tự',
            'numeric' => ':attribute phải là số',
            'image' =>':attribute phải có kiểu :jpg, png, jpeg, gif',
            'max' => 'dung lượng của :attribute quá  lớn'
        ];
    }

    public function attributes(){

        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá bán',
            'discount_percent' => 'Phân trăm giảm giá',
            'amount' => 'số lượng',
            'images' => 'ảnh',

        ];
    }
}
