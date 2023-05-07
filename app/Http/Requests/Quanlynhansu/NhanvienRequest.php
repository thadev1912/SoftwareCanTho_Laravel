<?php

namespace App\Http\Requests\Quanlynhansu;

use Illuminate\Foundation\Http\FormRequest;

class NhanvienRequest extends FormRequest
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
            'txt_ma_nv'=>'required|unique:nhanvien,ma_nv',
            'txt_hoten_nv'=>'required',
            'txt_sdt_nv'=>'required',
            'txt_diachi_nv'=>'required',
            'txt_gioitinh_nv'=>'required',
            'txt_ma_pb'=>'required',
            'txt_ma_cv'=>'required',
            'txt_trinhdo_nv'=>'required',
            'txt_chuyennganh_nv'=>'required',
            'txt_trangthai_nv'=>'required',
            'txt_ngaysinh_nv'=>'required',
            'txt_cccd_nv'=>'required|numeric',
        ];

    }
    public function messages()
    {
        return [
            'txt_ma_nv.required'=>'Mã nhân viên không được để trống!!!',
            'txt_ma_nv.unique'=>'Mã nhân viên đã tồn tại!!!',
            'txt_hoten_nv.required'=>'Mã nhân viên không được để trống!!!',
            'txt_sdt_nv.required'=>'Số điện thoại không được để trống!!!',
            'txt_sdt_nv.integer'=>'Số điện thoại phải là dạng số!!!',
            'txt_sdt_nv.min'=>'Số điện thoại phải nhập tối thiểu 10 ký tự!!!',
            'txt_diachi_nv.required'=>'Địa chỉ nhân viên không được bỏ trống!!!',
            'txt_gioitinh_nv.required'=>'Giới tính nhân viên không được bỏ trống!!!',
            'txt_ma_pb.required'=>'Mã Phòng ban không được bỏ trống!!!',
            'txt_ma_cv.required'=>'Mã Chức Vụ không được bỏ trống!!!',
            'txt_trinhdo_nv.required'=>'Trình độ nhân viên không được bỏ trống!!!',
            'txt_chuyennganh_nv.required'=>'Chuyên ngành nhân viên không được bỏ trống!!!',
            'txt_trangthai_nv.required'=>'Trạng thái nhân viên không được bỏ trống!!!',
            'txt_ngaysinh_nv.required'=>'Ngày sinh nhân viên không được bỏ trống!!!',
            'txt_cccd_nv.required'=>'Công cước công dân không được bỏ trống!!!',
            'txt_cccd_nv.numeric'=>'Công cước công dân phải nhập ở dạng số!!!',
        ];
    }

}
