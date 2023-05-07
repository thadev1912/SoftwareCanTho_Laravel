<?php

namespace App\Http\Requests\Quanlynhansu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class HopdongRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'txt_ma_hd'=>'required|unique:hopdong,ma_hd',
            'txt_ma_nv'=>'required',
            'txt_tinhtrang'=>'required',
            'txt_heso_luong'=>'required',
            'txt_loai_hd'=>'required',
            'txt_ngayvao'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'txt_ma_hd.required'=>'Mã hợp đồng không được để trống!!!',
            'txt_ma_hd.unique'=>'Mã hợp đồng đã tồn tại!!!',
            'txt_ma_nv.required'=>'Mã nhân viên không được để trống!!!',
            'txt_tinhtrang.required'=>'Tình trạng nhân viên không được để trống!!!',
            'txt_heso_luong.required'=>'Hệ số lương không được để trống!!!',
            'txt_loai_hd.required'=>'Loại hợp đồng không được để trống!!!',
            'txt_ngayvao.required'=>'Ngày vào không được để trống!!!',           
        ];
    }
}
