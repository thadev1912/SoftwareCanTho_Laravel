<?php

namespace App\Http\Controllers\APIRestful;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Quanlynhansu\Nhanvien;
class NhanvienAPIController extends Controller
{
    public function get(){
        $data=nhanvien::get();
        if($data)
        {
        return response()->json([
         'data'=>$data,
         'status'=>200,
         'messege'=>'Lấy dữ liệu thành công!!!',
        ]);
        }
        else
        {
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Bạn chưa có quyền truy cập api này!!!!',
               ]);
        }

    }
    public function create(Request $request)
    {
        $data=nhanvien::create([
            'ma_nv'=>$request->txt_ma_nv,
            'hoten_nv'=>$request->txt_hoten_nv,
            'diachi_nv'=>$request->txt_diachi_nv,
            'gioitinh_nv'=>$request->txt_gioitinh_nv,
            'sdt_nv'=>$request->txt_sdt_nv,
            'anhdaidien'=>'avatar.png',
             'ma_email'=>'1',
             'ma_pb'=>$request->txt_ma_cv,
             'ma_cv'=>$request->txt_ma_pb,
        ]);
        if($data)
        {
        return response()->json([
         'data'=>$data,
         'status'=>200,
         'messege'=>'Thêm dữ liệu thành công!!!',
        ]);
        }
        else
        {
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Bạn chưa có quyền truy cập api này!!!!',
               ]);
        }

    }
    public function update(Request $request,$id)
    {
        $data=nhanvien::find('id',$id)->update([
            'ma_nv'=>$request->txt_ma_nv,
            'hoten_nv'=>$request->txt_hoten_nv,
            'diachi_nv'=>$request->txt_diachi_nv,
            'gioitinh_nv'=>$request->txt_gioitinh_nv,
            'sdt_nv'=>$request->txt_sdt_nv,
            'anhdaidien'=>'avatar.png',
             'ma_email'=>'1',
             'ma_pb'=>$request->txt_ma_cv,
             'ma_cv'=>$request->txt_ma_pb,
        ]);
        if($data)
        {
        return response()->json([
         'data'=>$data,
         'status'=>200,
         'messege'=>'Thêm dữ liệu thành công!!!',
        ]);
        }
        else
        {
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Bạn chưa có quyền truy cập api này!!!!',
               ]);
        }

    }
    public function edit($id)
    {
        $data=nhanvien::find($id);       
       // dd($data);
        if($data)
        {
        return response()->json([
         'data'=>$data,
         'status'=>200,
         'messege'=>'Lấy dữ liệu thành công!!!',
        ]);
        }
        else
        {
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Bạn chưa có quyền truy cập api này!!!!',
               ]);
        }

    }
    public function delete($id)
    {
        $data= nhanvien::find($id)->delete();
        //dd($data);
        if($data)
        {
        return response()->json([
         'data'=>$data,
         'status'=>200,
         'messege'=>'Xóa dữ liệu thành công!!!',
        ]);
        }
        else
        {
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Bạn chưa có quyền truy cập api này nha!!!!',
               ]);
        }


    }
}
