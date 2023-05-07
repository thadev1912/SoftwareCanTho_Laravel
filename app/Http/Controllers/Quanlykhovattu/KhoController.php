<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlykhovattu\KhoRequest;
use App\Models\Quanlykhovattu\Kho;
use Brian2694\Toastr\Facades\Toastr;
class KhoController extends Controller
{
    public function kho()
     {
        $kho=kho::paginate(10);
        return view('quanlykhovattu.danhmuc.kho.kho',compact('kho'));
        //dd($data);

     }
     public function them_kho()
     {
      return view('quanlykhovattu.danhmuc.kho.them_kho');
     } 
     public function luu_kho(KhoRequest $request)
     {
      kho::create([
         'ma_kho'=>$request->txt_ma_kho,
         'ten_kho'=>$request->txt_ten_kho,
         'dia_chi'=>$request->txt_dia_chi,
         'so_dien_thoai'=>$request->txt_so_dien_thoai,
         'ghi_chu'=>$request->txt_ghi_chu,
      ]);
      Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
      return redirect()->route('kho');
     }
     public function sua_kho($id)
     {
      $kho=kho::find($id);
      return view('quanlykhovattu.danhmuc.kho.sua_kho',compact('kho'));
     }
     public function capnhat_kho(KhoRequest $request,$id)
     {
      kho::find($id)->update([
         'ma_kho'=>$request->txt_ma_kho,
         'ten_kho'=>$request->txt_ten_kho,
         'dia_chi'=>$request->txt_dia_chi,
         'so_dien_thoai'=>$request->txt_so_dien_thoai,
         'ghi_chu'=>$request->txt_ghi_chu,
      ]);
      Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
      return redirect()->route('kho');
     }
     public function xoa_kho($id)
     {
      kho::find($id)->delete();
      Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
      return redirect()->route('kho');
     }
}
