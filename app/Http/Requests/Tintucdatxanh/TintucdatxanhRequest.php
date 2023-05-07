<?php

namespace App\Http\Requests\Tintucdatxanh;

use Illuminate\Foundation\Http\FormRequest;

class TintucdatxanhRequest extends FormRequest
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
            'txt_tieude_tintuc'=>'required',
            'txt_danhmuc_tintuc'=>'required',
            'txt_noidung_tintuc'=>'required',
           
            
        ];
    }
    public function messages()
    {
        return [
            'txt_tieude_tintuc.required'=>'Tiêu đề tin tức không được để trống!!!',
            'txt_danhmuc_tintuc.required'=>'Danh mục tin tức không được để trống!!!',   
            'txt_noidung_tintuc.required'=>'Nội dung tin tức không được để trống!!!',
            
            
        ];
    }
}
