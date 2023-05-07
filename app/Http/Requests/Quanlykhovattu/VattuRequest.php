<?php

namespace App\Http\Requests\Quanlykhovattu;

use Illuminate\Foundation\Http\FormRequest;

class VattuRequest extends FormRequest
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
            'txt_ma_vattu'=>'required',
            'txt_ten_vattu'=>'required',
            'txt_dvt_vattu'=>'required',
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_ma_vattu.required'=>'Mã vật tư không được để trống!!!',
            'txt_ten_vattu.required'=>'Tên vật tư không được để trống!!!',   
            'txt_dvt_vattu.required'=>'Đơn vị vật tư không được để trống!!!',
            
            
        ];
    }
}
