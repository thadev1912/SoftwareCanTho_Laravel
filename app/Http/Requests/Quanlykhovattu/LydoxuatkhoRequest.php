<?php

namespace App\Http\Requests\Quanlykhovattu;

use Illuminate\Foundation\Http\FormRequest;

class LydoxuatkhoRequest extends FormRequest
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
            'txt_lydo_xuatkho'=>'required',
          
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_lydo_xuatkho.required'=>'Lý do xuất kho không được để trống!!!',
          
            
            
        ];
    }
}
