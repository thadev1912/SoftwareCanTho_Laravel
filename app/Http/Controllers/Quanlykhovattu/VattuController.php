<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlykhovattu\VattuRequest;
use App\Models\Quanlykhovattu\Vattu;
use Brian2694\Toastr\Facades\Toastr;
class VattuController extends Controller
{
    public function vattukho()
     {
        $vattu=vattu::paginate(10);
        //dd($vattu);
        return view('quanlykhovattu.danhmuc.vattu.vattu',compact('vattu'));

     } 
     public function them_vattukho()
     {
      return view('quanlykhovattu.danhmuc.vattu.them_vattu');
     }
     public function luu_vattukho(VattuRequest $request)
     {
    
            vattu::create([
            'ma_vattu'=>$request->txt_ma_vattu,
            'ten_vattu'=>$request->txt_ten_vattu,
            'dvt_vattu'=>$request->txt_dvt_vattu,
         ]);
         Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
         return redirect()->route('vattukho');
     }
     public function sua_vattukho($id)
     {
      $vattu=vattu::find($id);
      return view('quanlykhovattu.danhmuc.vattu.sua_vattu',compact('vattu'));
     }
     public function capnhat_vattukho(VattuRequest $request,$id)
     {
    
            vattu::find($id)->update([
            'ma_vattu'=>$request->txt_ma_vattu,
            'ten_vattu'=>$request->txt_ten_vattu,
            'dvt_vattu'=>$request->txt_dvt_vattu,
         ]);
         Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
         return redirect()->route('vattukho');
     }
     public function xoa_vattukho($id)
     {
      vattu::find($id)->delete();
      Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
      return redirect()->route('vattukho',$id);
     }


}
