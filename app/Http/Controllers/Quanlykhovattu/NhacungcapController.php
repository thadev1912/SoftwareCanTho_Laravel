<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlykhovattu\NhacungcapRequest;
use App\Models\Quanlykhovattu\Nhacungcap;
use Brian2694\Toastr\Facades\Toastr;
class NhacungcapController extends Controller
{
    public function nhacungcap()
     {
        $nhacungcap=nhacungcap::paginate(10);
        return view('quanlykhovattu.danhmuc.nhacungcap.nhacungcap',compact('nhacungcap'));
        //dd($nhaccungcap);

     } 
     public function them_nhacungcap()
     {
      return view('quanlykhovattu.danhmuc.nhacungcap.them_nhacungcap');
     }
     public function luu_nhacungcap(NhacungcapRequest $request)
     {
      //dd($request->all());
      nhacungcap::create([
         'ma_nhacc'=>$request->txt_ma_nhacc,
         'ten_nhacc'=>$request->txt_ten_nhacc,
         'diachi_nhacc'=>$request->txt_diachi_nhacc,         
      ]);
      Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
      return redirect()->route('nhacungcap');
     }
     public function sua_nhacungcap($id)
     {
      $nhacungcap=nhacungcap::find($id);
      return view('quanlykhovattu.danhmuc.nhacungcap.sua_nhacungcap',compact('nhacungcap'));
     }
     public function capnhat_nhacungcap(NhacungcapRequest $request,$id)
     {
      nhacungcap::find($id)->update([
         'ma_nhacc'=>$request->txt_ma_nhacc,
         'ten_nhacc'=>$request->txt_ten_nhacc,
         'diachi_nhacc'=>$request->txt_diachi_nhacc,         
      ]);
      Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
      return redirect()->route('nhacungcap');
    }
    public function xoa_nhacungcap($id)
      {
         nhacungcap::find($id)->delete();
         Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
         return redirect()->route('nhacungcap');
      }
        
}
