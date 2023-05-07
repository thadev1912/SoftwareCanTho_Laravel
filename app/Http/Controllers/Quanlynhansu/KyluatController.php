<?php

namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlynhansu\KyluatRequest;
use App\Models\Quanlynhansu\Kyluat;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class KyluatController extends Controller
{
     public function kyluat()
       {
       $kyluat=DB::table('kyluat')
       ->join('nhanvien','kyluat.ma_nv','=','nhanvien.ma_nv')
       ->paginate(5);
       return view('quanlynhansu.danhmuc.kyluat.kyluat',compact('kyluat'));
          
       }
       public function them_kl()
       {

        return view('quanlynhansu.danhmuc.kyluat.them_kl');
       }
       public function luu_kl(KyluatRequest $request)
       {
           
                    $kt=new Kyluat;
                    $kt->ma_nv =$request->txt_ma_nv;
                    $kt->sotien =$request->txt_sotien;
                    $kt->ngay_kyluat =$request->txt_ngay_kyluat;
                    $kt->lydo =$request->txt_lydo;
                   
                    $kt->save();
                    Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
                    return redirect()->route('kyluat');
          
       }
        public function sua_kl($ma_nv)
          {
            $data= DB::table('kyluat')->where('ma_nv',$ma_nv)->first();
           // dd($data);
            return view('quanlynhansu.danhmuc.kyluat.sua_kl',compact('data'));
          }
          public function capnhat_kl($id,KyluatRequest $request)
            {
                DB::table('kyluat')-> where('id',$id)->update(
                    [
                     'ma_nv'=>$request->txt_ma_nv,
                     'sotien'=>$request->txt_sotien,
                     'ngay_kyluat'=>$request->txt_ngay_kyluat,
                     'lydo'=>$request->txt_lydo,
           
                    ]);
                    Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
                    return redirect()->route('kyluat');
            }
            public function xoa_kl($ma_nv)
                 {
                    DB::table('kyluat')->where('ma_nv',$ma_nv)->delete();
                    Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                    return redirect()->route('kyluat');

                 }

}
