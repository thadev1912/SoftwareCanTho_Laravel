<?php

namespace App\Http\Requests\Quanlykhovattu;

use Illuminate\Foundation\Http\FormRequest;

class NhacungcapRequest extends FormRequest
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
            'txt_ma_nhacc'=>'required',
            'txt_ten_nhacc'=>'required',
            'txt_diachi_nhacc'=>'required',
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_ma_nhacc.required'=>'Mã nhà cung cấp không được để trống!!!',
            'txt_ten_nhacc.required'=>'Tên nhà cung cấp không được để trống!!!',   
            'txt_diachi_nhacc.required'=>'Địa chỉ nhà cung cấp không được để trống!!!',
            
            
        ];
    }
}
