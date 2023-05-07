<?php

namespace App\Http\Requests\Quanlynhansu;

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
            'txt_ma_bhxh'=>'required|unique:baohiem,ma_bhxh',
            'txt_ma_nv'   =>'required',
            'txt_loai_bhxh'=>'required',
            'txt_ngaycap'  =>'required',
            'txt_ngayhethan'=>'required',
            'txt_noicap'=>'required',
            'tiendong_bhxh'=>'required',
            'txt_noikham'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
           
            'txt_ma_bhxh.required' =>'Mã bảo hiểm xã hội không được để trống',
            'txt_ma_bhxh.unique' =>'Mã bảo hiểm xã hội đã tồn tại',
            'txt_ma_nv.required' =>'Mã nhân viên không được để trống',
            'txt_loai_bhxh.required' =>'Mã nhân viên không được để trống',
            'txt_ngaycap.required' =>'Ngày cấp không được để trống',
            'txt_ngayhethan.required' =>'Ngày hết hạn không được để trống',
            'txt_noicap.required' =>'Nơi cấp không được để trống',
            'txt_noikham.required' =>'Nơi kham chữa bệnh không được để trống',
            'tiendong_bhxh.required' =>'Tiền đóng bhxh không được để trống',
            
        ];
    }
}
