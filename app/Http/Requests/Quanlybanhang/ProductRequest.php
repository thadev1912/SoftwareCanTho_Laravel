<?php

namespace App\Http\Requests\Quanlybanhang;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'txt_name'=>'required',
            'txt_price'=>'required',
            'txt_danhmuc'=>'required',
            'txt_hot_sales'=>'required',
            'txt_noidung_sp'=>'required',

          
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_name.required'=>'Tên sản phẩm không được để trống!!!',
            'txt_price.required'=>'Giá sản phẩm không được để trống!!!',
            'txt_danhmuc.required'=>'Danh mục sản phẩm không được để trống!!!',
            'txt_hot_sales.required'=>'Sản phẩm bán chạy không được để trống!!!',
            'txt_noidung_sp.required'=>'Miêu tả sản phẩm không được để trống!!!',
          
            
            
        ];
    }
}
