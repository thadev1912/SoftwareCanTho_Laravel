<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quanlynhansu\KhenthuongRequest;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Khenthuong;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class KhenthuongController extends Controller
{
     public function khenthuong()
       {
       $khenthuong=DB::table('khenthuong')
       ->join('nhanvien','khenthuong.ma_nv','=','nhanvien.ma_nv')
       ->paginate(5);
       return view('quanlynhansu.danhmuc.khenthuong.khenthuong',compact('khenthuong'));
          
       }
       public function them_kt()
       {

        return view('quanlynhansu.danhmuc.khenthuong.them_kt');
       }
       public function luu_kt(KhenthuongRequest $request)
       {
               
                    $kt=new Khenthuong;
                    $kt->ma_nv =$request->txt_ma_nv;
                    $kt->sotien =$request->txt_sotien;
                    $kt->ngay_khenthuong =$request->txt_ngay_khenthuong;
                    $kt->lydo =$request->txt_lydo;
                    $kt->save();
                    Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
                    return redirect()->route('khenthuong');
          
       }
        public function sua_kt($id)
          {
            $data= DB::table('khenthuong')->where('id',$id)->first();
           // dd($data);
            return view('quanlynhansu.danhmuc.khenthuong.sua_kt',compact('data'));
          }
          public function capnhat_kt($id,KhenthuongRequest $request)
            {
                DB::table('khenthuong')-> where('id',$id)->update(
                    [
                     'ma_nv'=>$request->txt_ma_nv,
                     'sotien'=>$request->txt_sotien,
                     'ngay_khenthuong'=>$request->txt_ngay_khenthuong,
                     'lydo'=>$request->txt_lydo,
           
                    ]);
                    Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
                    return redirect()->route('khenthuong');
            }
            public function xoa_kt($id)
                 {
                    DB::table('khenthuong')->where('id',$id)->delete();
                    Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                    return redirect()->route('khenthuong');

                 }

}
