<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif',
        ];
    }
    public function messages(){

        return[
            'required' => ':attribute không được để trống',
            'image' => ':attribute phải đúng định dạng:jpg,png,jpeg, gif'
            
        ];
    }
    public function attributes(){
        return[
            'name' => 'Tên danh mục',  
            'avatar' => 'Ảnh đại diện',     
        ];

    }
}
