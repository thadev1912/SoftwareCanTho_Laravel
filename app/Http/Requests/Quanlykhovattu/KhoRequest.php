<?php

namespace App\Http\Requests\Quanlykhovattu;

use Illuminate\Foundation\Http\FormRequest;

class KhoRequest extends FormRequest
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
            'txt_ma_kho'=>'required',
            'txt_ten_kho'=>'required',
            'txt_dia_chi'=>'required',
            'txt_so_dien_thoai'=>'required',
            'txt_ghi_chu'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'txt_ma_kho.required'=>'Mã kho không được để trống!!!',
            'txt_ten_kho.required'=>'Tên kho không được để trống!!!',   
            'txt_dia_chi.required'=>'Địa chỉ không được để trống!!!',
            'txt_so_dien_thoai.required'=>'Tên số điện thoại không được để trống!!!', 
            'txt_ghi_chu.required'=>'Tên ghi chú không được để trống!!!',           
            
        ];
    }
}
