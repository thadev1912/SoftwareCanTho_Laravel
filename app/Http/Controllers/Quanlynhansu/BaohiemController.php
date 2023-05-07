<?php
namespace App\Http\Controllers\Quanlynhansu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlynhansu\BaohiemRequest;
use App\Models\Quanlynhansu\Baohiem;
use App\Models\Quanlynhansu\Nhanvien;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class BaohiemController extends Controller
{
    public function baohiem()
     {
        $baohiem=DB::table('baohiem')
        ->join('nhanvien','baohiem.ma_nv','=','nhanvien.ma_nv')
        ->select('baohiem.*','nhanvien.hoten_nv')
        ->paginate(10);
        //dd($baohiem);
        return view('quanlynhansu.danhmuc.baohiem.baohiem',compact('baohiem'));
     }
     public function them_bhxh()
      {
        $nhanvien=nhanvien::get();
        $loaibhxh = DB::table('baohiem')
              ->select(DB::raw('loai_bhxh'))   
              ->groupBy('loai_bhxh')
              ->get();
              $noicap = DB::table('baohiem')
              ->select(DB::raw('noicap'))   
              ->groupBy('noicap')
              ->get();
              $noikham = DB::table('baohiem')
              ->select(DB::raw('noikham'))   
              ->groupBy('noikham')
              ->get();
              //dd($noikham); 
        $baohiem=DB::table('baohiem')       
        ->select('ma_nv')
        ->get();        
         $array_bh = [];
      foreach($baohiem as $item)
      {
           array_push($array_bh,$item->ma_nv);
      }
              $select_nv=array();
              foreach($nhanvien as $nv)
              {
                //dd($hd->ma_nv);
                     if(!in_array($nv->ma_nv,$array_bh))
                     {
                          
                          array_push($select_nv,$nv);
                        
                     }           
                     
              }
              //dd($select_nv);
              
        return view('quanlynhansu.danhmuc.baohiem.them_bhxh',compact('nhanvien','loaibhxh','noicap','select_nv','noikham'));
      }
      public function luu_bhxh(BaohiemRequest $request)
       {
       
        //dd($request->all());
        DB::table('baohiem')->insert([
              'ma_bhxh'=>$request->txt_ma_bhxh,
              'ma_nv'=>$request->txt_ma_nv,
              'loai_bhxh'=>$request->txt_loai_bhxh,
              'ngaycap'=>$request->txt_ngaycap,
              'ngayhethan'=>$request->txt_ngayhethan,
              'noicap'=>$request->txt_noicap,
              'noikham'=>$request->txt_noikham,
              'tiendong_bhxh'=>$request->tiendong_bhxh,
         
        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
        return redirect()->route('baohiem');
       }
       public function sua_bhxh($id)
         {
            $nhanvien=nhanvien::get();
            $loaibhxh = DB::table('baohiem')
                  ->select(DB::raw('loai_bhxh'))   
                  ->groupBy('loai_bhxh')
                  ->get();
                  $noicap = DB::table('baohiem')
                  ->select(DB::raw('noicap'))   
                  ->groupBy('noicap')
                  ->get();
                  $noikham = DB::table('baohiem')
                  ->select(DB::raw('noikham'))   
                  ->groupBy('noikham')
                  ->get(); 
                  
            $data=DB::table('baohiem')->where('id',$id)->first();
            //dd($data);
           
            return view('quanlynhansu.danhmuc.baohiem.sua_bhxh',compact('data','nhanvien','loaibhxh','noicap','noikham'));
            
            
         }
         public function capnhat_bhxh($id,Request $request)
         {
            //dd($request->all());
                DB::table('baohiem')->where('id',$id)->update([
                    'ma_bhxh'=>$request->txt_ma_bhxh,
                    'ma_nv'=>$request->txt_ma_nv,
                    'loai_bhxh'=>$request->txt_loai_bhxh,
                    'ngaycap'=>$request->txt_ngaycap,
                    'ngayhethan'=>$request->txt_ngayhethan,
                    'noicap'=>$request->txt_noicap,
                    'noikham'=>$request->txt_noikham,

                ]);
                Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
              return redirect()->route('baohiem');
         }
         public function xoa_bhxh($id)
            {
                DB::table('baohiem')->where('id',$id)->delete();
                Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                return redirect()->route('baohiem');
            }
            public function chitiet_bhxh($ma_nv)
             {
              $data=DB::table('baohiem')
              ->join('nhanvien','baohiem.ma_nv','=','nhanvien.ma_nv')
              ->where('baohiem.ma_nv',$ma_nv)->first();
              return view('quanlynhansu.chucnang.chitiet_bhxh',compact('data'));
             }
             public function baocao()
             {  
               
                  $pdf= \App::make('dompdf.wrapper');
                  $pdf->loadHTML($this->content_baocao());
                  $pdf->setPaper('A4','landscape'); // in theo chiều ngang khổ A4  
                  return $pdf->stream();
             }
             public function content_baocao()
             {
              $data=DB::table('baohiem')->get();               
                 //dd($data);
                  $output='';
                  $output.='<style>
                  body{
                       font-family: DejaVu Sans;
                  }
                  table,td,table,th
                  {
                      border: 1px solid black;
                  }
                  </style>
                  <h1 style="text-align: center"> DANH SÁCH BẢO HIỂM</h1>
                  <a href="../baohiem/baohiem"> Quay Lại</a>
                  <table class="table table-bordered ">
                  <tr>
                      <th>STT </th>
                      <th>Mã BHXH</th>
                      <th>Mã Nhân Viên</th>
                      <th>Loại BHXH</th>
                      <th>Ngày Cấp</th>
                      <th>Ngày Hết Hạn</th>
                      <th>Nơi Cấp</th>
                      <th>Số Tiền Đóng BHXH</th>
                      
                  </tr>';  
                  foreach ($data as $key=> $dt)
                  {       
                       $output.='
                  <tr>
                      <td>'.++$key.'</td>
                      <td>'.$dt->ma_bhxh.'</td>
                      <td>'.$dt->ma_nv.'</td>
                      <td>'.$dt->loai_bhxh.'</td>
                      <td>'.$dt->ngaycap.'</td>
                      <td>'.$dt->ngayhethan.'</td>
                      <td>'.$dt->noicap.'</td>
                      <td>'.$dt->tiendong_bhxh.'</td>
                  </tr>';
                  }
              
                  $output.='
                 
              </table>';
             
                 return $output;
                  
             }
             
}
