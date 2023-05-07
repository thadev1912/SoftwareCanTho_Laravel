<?php

namespace App\Http\Requests\Quanlykhovattu;

use Illuminate\Foundation\Http\FormRequest;

class LydonhapkhoRequest extends FormRequest
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
            'txt_lydo_nhapkho'=>'required',
          
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_lydo_nhapkho.required'=>'Lý do nhập kho không được để trống!!!',
          
            
            
        ];
    }
}
