<?php

namespace App\Http\Controllers\Quanlybanhang;

use App\Http\Controllers\Controller;
use App\Models\Quanlybanhang\Chamsockhachhang;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlybanhang\ChamsockhachhangRequest;
use Monolog\Handler\ElasticSearchHandler;
use Validator;
use Brian2694\Toastr\Facades\Toastr;
class ChamsockhachhangController extends Controller
{
    public function thongtin_khachhang()
    {
        $data=Chamsockhachhang::paginate(5);
        //dd($data);
        return view('quanlybanhang.danhmuc.chamsockhachhang.dsthongtin_khachhang',compact('data'));
    }
    public function luuthongtin_khachhang(ChamsockhachhangRequest $request)
    {
        
         $data=   Chamsockhachhang::create([
            'hoten_kh'=>$request->txt_hoten_kh,
            'noidung_kh'=>$request->txt_noidung_kh,
            'sdt_kh'=>$request->txt_sdt_kh,
            'diachi_kh'=>$request->txt_diachi_kh,            
        ]);
          if($data)
          {
            return response()->json([
                'data'=>$data,
                'status'=>200,
                'messegge'=>'Lưu dữ liệu thành công!!!'
            ]);
          }
          else
          {
            return response()->json([
                'data'=>$data,
                'status'=>404,
                'messegge'=>'Vui lòng kiểm tra lại!!!'
            ]);
          }
               
    }
    public function chitiet_thongtin($id)
    {
        $data=Chamsockhachhang::find($id)->first();
        //dd($data);
        return view('quanlybanhang.danhmuc.chamsockhachhang.chitiet_thongtin',compact('data'));
    }
    public function xoa_thongtin($id)
    { 
        Chamsockhachhang::find($id)->delete();
        //dd($data);
        Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
       return redirect()->route('thongtin_khachhang');
    }
        
    
}
