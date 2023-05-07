<?php

namespace App\Http\Requests\PhanQuyen;

use Illuminate\Foundation\Http\FormRequest;

class DangnhapRequest extends FormRequest
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
            'username'=>'required',
            'pass'=>'required',
           
           
            
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Tài khoản không được để trống!!!',
            'pass.required'=>'Mật khẩu không được để trống!!!',   
           
            
            
        ];
    }
}
