<?php

namespace App\Http\Requests\Quanlynhansu;

use Illuminate\Foundation\Http\FormRequest;

class KyluatRequest extends FormRequest
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
            'txt_sotien'=>'required|integer',
            'txt_ngay_kyluat'=>'required',
            'txt_lydo'=>'required',

        ];
    }
    public function messages()
    {
        return [
                     'txt_ma_nv.required'=>'Mã nhân viên không được để trống!!!',
                    'txt_sotien.required'=>'Số tiền không được để trống!!!',
                    'txt_sotien.integer'=>'Số tiền phải là dạng ký tự số!!!',
                    'txt_ngay_kyluat.required'=>'Ngày kỷ luật không được để trống!!!',                   
                    'txt_lydo.required'=>'Lý do không được để trống!!!',
        ];
    }
}
