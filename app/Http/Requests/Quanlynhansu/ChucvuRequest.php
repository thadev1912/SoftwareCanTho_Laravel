<?php

namespace App\Http\Requests\Quanlynhansu;

use Illuminate\Foundation\Http\FormRequest;

class ChucvuRequest extends FormRequest
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
            'txt_ma_cv'=>'required',
            'txt_ten_cv'=>'required',
            
        ];
    }
    public function messages()
    {
        return [
            'txt_ma_cv.required'=>'Mã phong ban không được để trống!!!',
            'txt_ten_cv.required'=>'Tên phong ban không được để trống!!!',           
            
        ];
    }
}
