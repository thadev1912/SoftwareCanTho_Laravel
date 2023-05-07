<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quanlynhansu\ChucvuRequest;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Chucvu;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class ChucvuController extends Controller
{
    public function chucvu()
        {
            $chucvu=DB::table('chucvu')->paginate(5);        
            return view('quanlynhansu.danhmuc.chucvu.chucvu',compact('chucvu'));
            
        }
    public function them_cv()
         {
             return view('quanlynhansu.danhmuc.chucvu.them_cv');
         }
         public function luu_cv(ChucvuRequest $request)
          {
            DB::table('chucvu')->insert(
                [
                    'ma_cv'=>$request->txt_ma_cv,
                    'ten_cv'=>$request->txt_ten_cv,
                ]
                );
                Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
                return redirect()->route('chucvu');
          }
          public function sua_cv($id)
            {
              $data=  DB::table('chucvu')->where('id',$id)->first();
                return view('quanlynhansu.danhmuc.chucvu.sua_cv',compact('data'));
            }
            public function capnhat_cv($id,Request $request)
             {
                DB::table('chucvu')->where('id',$id)->update(
                    [
                        'ma_cv'=>$request->txt_ma_cv,
                        'ten_cv'=>$request->txt_ten_cv,

                    ]);
                    Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
                    return redirect()->route('chucvu');
             }
             public function xoa_cv($id)
               {
                     DB::table('chucvu')->where('id',$id)->delete();
                     Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                     return redirect()->route('chucvu');
                      
               }

}

