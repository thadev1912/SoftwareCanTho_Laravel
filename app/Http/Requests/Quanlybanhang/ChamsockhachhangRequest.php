<?php

namespace App\Http\Requests\Quanlybanhang;

use Illuminate\Foundation\Http\FormRequest;

class ChamsockhachhangRequest extends FormRequest
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
           'txt_hoten_kh'=>'required|max:100',
           'txt_noidung_kh'=>'required|max:100',
           'txt_sdt_kh'=>'required|max:100',
           'txt_diachi_kh'=>'required|max:100',
        ];
    }
    public function messages()
       {
        return [        
         'txt_hoten_kh.required'=>'Họ tên khách hàng không được bỏ trống',
         'txt_noidung_kh.required'=>'Nội dung không được bỏ trống',
         'txt_sdt_kh.required'=>'Số điện thoại không được bỏ trống',
         'txt_diachi_kh.required'=>'Địa chỉ không được bỏ trống',
        ];
       }
}
