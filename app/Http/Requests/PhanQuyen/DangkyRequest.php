<?php

namespace App\Http\Requests\PhanQuyen;

use Illuminate\Foundation\Http\FormRequest;

class DangkyRequest extends FormRequest
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
            'username'=>'required|min:8|unique:users,name',
            'hoten'=>'required|min:10|unique:users,hoten',
            'email'=>'required|unique:users,email',
            'sdt'=>'required|numeric',
            'diachi'=>'required|min:15',
            'pass'=>'required|min:6',
           
           
            
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Tài khoản không được để trống!!!',
            'username.min'=>'Tài khoản ít nhất 8 ký tự!!!',
            'username.unique'=>' Tên Tài khoản đã tồn tại trên hệ thống!!!',
            'hoten.required'=>'Họ tên không được để trống!!!',  
            'hoten.min'=>'Họ tên ít nhất 10 ký tự!!!',             
            'hoten.unique'=>'Họ tên đã tồn tại trên hệ thống!!!',   
            'email.required'=>'Email không được để trống!!!',
            'email.unique'=>'Email đã tồn tại trên hệ thống!!!',
            'sdt.required'=>'Số điện thoại không được để trống!!!', 
            'sdt.numeric'=>'Số điện thoại phải là dạng số!!!',   
            'diachi.required'=>'Địa chỉ không được để trống!!!',
            'diachi.min'=>'Địa chỉ ít nhất 15 ký tự!!!',
            'pass.required'=>'Mật khẩu không được để trống!!!',   
            'pass.min'=>'Mật khẩu ít nhất 6 ký tự!!!',   
            
            
        ];
    }
}
