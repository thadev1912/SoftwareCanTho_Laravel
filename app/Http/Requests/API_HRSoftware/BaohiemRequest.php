<?php

namespace App\Http\Requests\API_HRSoftware;

use Illuminate\Foundation\Http\FormRequest;

class BaohiemRequest extends FormRequest
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
            'ma_bhxh'=>'required',
            'ma_nv'   =>'required',
            'loai_bhxh'=>'required',
            'ngaycap'  =>'required',
            'ngayhethan'=>'required',
            'noicap'=>'required',
            'tiendong_bhxh'=>'required',
            'noikham'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
           
            'ma_bhxh.required' =>'Mã bảo hiểm xã hội không được để trống',           
            'ma_nv.required' =>'Mã nhân viên không được để trống',
            'loai_bhxh.required' =>'Mã loại bhxh không được để trống',
            'ngaycap.required' =>'Ngày cấp không được để trống',
            'ngayhethan.required' =>'Ngày hết hạn không được để trống',
            'noicap.required' =>'Nơi cấp không được để trống',
            'noikham.required' =>'Nơi kham chữa bệnh không được để trống',
            'tiendong_bhxh.required' =>'Tiền đóng bhxh không được để trống',
            
        ];
    }
}
