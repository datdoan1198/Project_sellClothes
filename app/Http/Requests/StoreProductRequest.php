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

        ];
    }
    public function messages(){
        return [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute không ngăn hơn 5 kí tự',
            'numeric' => ':attribute phải là số'
            
        ];
    }

    public function attributes(){

        return [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá bán',
            'discount_percent' => 'Phân trăm giảm giá',
            'amount' => 'số lượng',

        ];
    }
}
