<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quanlynhansu\HopdongRequest;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Phongban;
use App\Models\Quanlynhansu\Nhanvien;
use App\Models\Quanlynhansu\Hopdong;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
class HopdongController extends Controller
{
    public function hopdong()
     {
          $hopdong=DB::table('hopdong')
          ->join('nhanvien','nhanvien.ma_nv','=','hopdong.ma_nv')
          ->select('hopdong.*','nhanvien.hoten_nv')
          ->paginate(10);
        //dd($hopdong);
          return view('quanlynhansu.danhmuc.hopdong.hopdong',compact('hopdong'))->with('i',(request()->input('page',1)-1)*10);
          
     }
     public function them_hd()
      {
       $nhanvien=nhanvien::get();
       $tinhtrang = DB::table('hopdong')
              ->select(DB::raw('tinhtrang'))   
              ->groupBy('tinhtrang')
              ->get();
              $loaihd = DB::table('hopdong')
              ->select(DB::raw('loai_hd'))   
              ->groupBy('loai_hd')
              ->get();
        //dd($nhanvien);
     
        $hopdong=DB::table('hopdong')       
        ->select('ma_nv')
        ->get();        
         $array_hd = [];
foreach($hopdong as $item)
{
     array_push($array_hd,$item->ma_nv);
}
        $select_nv=array();
        foreach($nhanvien as $nv)
        {
          //dd($hd->ma_nv);
               if(!in_array($nv->ma_nv,$array_hd))
               {
                    
                    array_push($select_nv,$nv);
                  
               }            
               
        }
         //dd($select_nv);
         
        return view('quanlynhansu.danhmuc.hopdong.them_hd',compact('nhanvien','tinhtrang','loaihd','select_nv'));
      }
      public function luu_hd(HopdongRequest $request)
       {
       
         DB::table('hopdong')
         ->join('nhanvien','hopdong.ma_nv','=','nhanvien.ma_nv')
         ->insert([
         'ma_hd'=>$request->txt_ma_hd,
         'ma_nv'=>$request->txt_ma_nv,     
         'tinhtrang'=>$request->txt_tinhtrang,
         'loai_hd'=>$request->txt_loai_hd,    
         'heso_luong'=>$request->txt_heso_luong,
         'ngayvao'=>$request->txt_ngayvao,
         'phu_cap'=>'500000',

        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
             return redirect()->route('hopdong');
       }
       public function sua_hd($ma_nv)
         {
          $nhanvien=nhanvien::get();
          $tinhtrang = DB::table('hopdong')
                 ->select(DB::raw('tinhtrang'))   
                 ->groupBy('tinhtrang')
                 ->get();
                 $loaihd = DB::table('hopdong')
                 ->select(DB::raw('loai_hd'))   
                 ->groupBy('loai_hd')
                 ->get();
           $data= DB::table('hopdong')
           ->join('nhanvien','hopdong.ma_nv','=','nhanvien.ma_nv')
           ->where('hopdong.ma_nv',$ma_nv)->first();
           //dd($data);
           $hopdong=DB::table('hopdong')       
           ->select('ma_nv')
           ->get();        
            $array_hd = [];
   foreach($hopdong as $item)
   {
        array_push($array_hd,$item->ma_nv);
   }
           $select_nv=array();
           foreach($nhanvien as $nv)
           {
             //dd($hd->ma_nv);
                  if(!in_array($nv->ma_nv,$array_hd))
                  {
                       
                       array_push($select_nv,$nv);
                     
                  }            
                  
           }
           return view('quanlynhansu.danhmuc.hopdong.sua_hd',compact('data','nhanvien','tinhtrang','loaihd','select_nv'));
         }
         public function capnhat_hd($ma_nv,Request $request)
          {
          $data=DB::table('hopdong')->where('ma_nv',$ma_nv)->update([
                     'ma_hd'=>$request->txt_ma_hd,
                     'ma_nv'=>$request->txt_ma_nv,
                    'tinhtrang'=>$request->txt_tinhtrang,
                    'loai_hd'=>$request->txt_loai_hd,                  
                     'heso_luong'=>$request->txt_heso_luong,
                     'ngayvao'=>$request->txt_ngayvao,
                 
            ]);
            Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
            return redirect()->route('hopdong');
          }
          public function xoa_hd($ma_nv)
          {
                   DB::table('hopdong')->where('hopdong.ma_nv',$ma_nv)->delete();
                   Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                   return redirect()->route('hopdong');
          }
          public function chitiet_hopdong($ma_nv)
          {
           $data=DB::table('hopdong')
           ->join('nhanvien','hopdong.ma_nv','=','nhanvien.ma_nv')
           ->where('hopdong.ma_nv',$ma_nv)->first();
           return view('quanlynhansu.chucnang.chitiet_hopdong',compact('data'));
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
            $data=DB::table('hopdong')
            ->join('nhanvien','nhanvien.ma_nv','=','hopdong.ma_nv')
            ->get();
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
               <h1 style="text-align: center"> DANH SÁCH HỢP ĐỒNG</h1>
               <a href="../hopdong/hopdong"> Quay Lại</a>
               <table class="table table-bordered ">
               <tr>
                    <th>STT</th>
                   <th>Mã Hợp Đồng </th>
                   <th>Mã Nhân Viên </th>
                   <th>Tên Nhân Viên</th>
                   <th>Giới Tính</th>
                   <th>Số Điện Thoại</th>
                   <th> Hệ Số Lương</th>
                   <th>Ngày Vào</th>
                   <th>Loại Hợp Đồng</th>
                   <th>Phụ Cấp</th>
                   <th>Tình Trạng</th>                 
               </tr>';  
               foreach ($data as $key=> $dt)
               {       
                    $output.='
               <tr>
                   <td>'.++$key.'</td>
                   <td>'.$dt->ma_hd.'</td>
                   <td>'.$dt->ma_nv.'</td>
                   <td>'.$dt->hoten_nv.'</td>
                   <td>'.$dt->gioitinh_nv.'</td>
                   <td>'.$dt->sdt_nv.'</td>
                   <td>'.$dt->heso_luong.'</td>
                   <td>'.$dt->ngayvao.'</td>
                   <td>'.$dt->loai_hd.'</td>
                   <td>'.$dt->phu_cap.'</td>
                   <td>'.$dt->tinhtrang.'</td>
               </tr>';
               }
           
               $output.='
               </table>';
              
              return $output;
               
          }
          }
