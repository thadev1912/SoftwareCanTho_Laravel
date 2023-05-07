<?php

namespace App\Http\Requests\Quanlynhansu;

use Illuminate\Foundation\Http\FormRequest;

class PhepnamRequest extends FormRequest
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
            'txt_ma_nv'=>'required',
            'txt_hoten_nv'=>'required',
            'txt_ngay_batdau'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'txt_ma_nv.required'=>'Mã hợp đồng không được để trống!!!',
            'txt_hoten_nv.required'=>'Mã nhân viên không được để trống!!!',
            'txt_ngay_batdau.required'=>'Ngày bắt đầu không được để trống!!!',
          
            
        ];
    }
}
