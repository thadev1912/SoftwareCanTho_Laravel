<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Helper\ExcelImport;
use Illuminate\Support\Facades\DB;
use App\Models\Quanlynhansu\Chamcong;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
class ChamcongController extends Controller
{
    
    public function getform(){
        return view('quanlynhansu.chucnang.getform');
    }
    public function dulieu_chamcong(Request $request)
      {    
             $query = $request->all();
             $timkiem_ten=$request->timkiem_ten;
             $timkiem_ngay=$request->timkiem_ngay;
             if($query)
             {
            $result= DB::table('dulieuchamcong')
            -> join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv')
            ->join('phongban','dulieuchamcong.ma_pb','=','phongban.ma_pb')    
            ->join('chucvu','dulieuchamcong.ma_cv','=','chucvu.ma_cv')
            ->select('dulieuchamcong.*','nhanvien.*','phongban.ten_pb','chucvu.ten_cv');                            
            if(isset($timkiem_ten))  
            $result=$result->where('dulieuchamcong.ma_nv','like',"%".$timkiem_ten."%")
            ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem_ten."%");           
            if(isset($timkiem_ngay))             
             $result=$result->where('dulieuchamcong.ngay_chamcong','=',$timkiem_ngay);
             if(isset($timkiem_ten)&&($timkiem_ngay))
              $result=$result->where('dulieuchamcong.ma_nv','like',"%".$timkiem_ten."%")
            ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem_ten."%") 
            ->where('dulieuchamcong.ngay_chamcong','=',$timkiem_ngay);

             $result=$result->paginate(10);
             //dd($result); 
             } 
             else
             {
                $result=  DB::table('dulieuchamcong')
                -> join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv')
                ->join('phongban','dulieuchamcong.ma_pb','=','phongban.ma_pb')    
                ->join('chucvu','dulieuchamcong.ma_cv','=','chucvu.ma_cv')             
                ->select('dulieuchamcong.*','nhanvien.*','phongban.ten_pb','chucvu.ten_cv')          
                ->paginate(10); 
                //dd($result);          
            }
            return view('quanlynhansu.chucnang.dulieuchamcong',compact('result','query'));    
             }
             
           
             
          
   public function import(Request $request){
        if($request->file('file'))
        {
            $import =  Excel::import(new ExcelImport, request()->file('file'));
          
            $msg_success = "Chèn Excel vào CSDL thành công! ";
            $msg_danger = "Lỗi kết nôi!!! ";
            if ($import) {
                return redirect()->route('dulieu_chamcong')->with('success', strtoupper($msg_success));
            }else{
               return redirect('/')->with('danger', strtoupper($msg_danger));
            }
        }
        else{
            $msge = "please choose your file! ";
            return redirect('/')->with('choose_file', strtoupper($msge));
        }
    }
  
         public function bangluong()
          {
                  $data= DB::table('dulieuchamcong')
                  ->join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv') 
                  ->join('phongban','dulieuchamcong.ma_pb','=','phongban.ma_pb')  
                  ->join('hopdong','dulieuchamcong.ma_nv','=','hopdong.ma_nv')                           
                  ->select('dulieuchamcong.ma_nv','hoten_nv','ten_pb','heso_luong','phu_cap',DB::raw('sum(  (((gio_ra - gio_vao)*0.60)*0.60)/3600-1.0)/8 as total'))
                  ->groupBy('ma_nv','hoten_nv','ten_pb','heso_luong','phu_cap')
                  ->paginate(50);
                  //dd($data);
                   return view('quanlynhansu.chucnang.bangluong',compact('data'));
          }
          public function chitiet_bangluong($code)
          {
              $data_nv=DB::table('nhanvien')
              ->join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
              ->join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')                        
              ->select('nhanvien.ma_nv','nhanvien.anhdaidien','nhanvien.hoten_nv','phongban.ten_pb','chucvu.ten_cv')             
              ->where('nhanvien.ma_nv',$code)
              ->first();
               //dd($data_nv);
               $data_cc=DB::table('nhanvien')
               ->join('dulieuchamcong','nhanvien.ma_nv','=','dulieuchamcong.ma_nv') 
               ->select('dulieuchamcong.ma_nv',DB::raw('sum(  (((gio_ra - gio_vao)*0.60)*0.60)/3600-1.0)/8 as total')) 
               ->groupBy('ma_nv')
               ->where('nhanvien.ma_nv',$code)
               ->first();
               //dd($data_cc);
               $data_hd=DB::table('hopdong')
               ->join('nhanvien','nhanvien.ma_nv','=','hopdong.ma_nv')
               ->select('hopdong.heso_luong','hopdong.phu_cap',)
               ->where('nhanvien.ma_nv',$code)
               ->first();
               $data_pn=DB::table('phepnam')
               ->join('nhanvien','phepnam.ma_nv','=','nhanvien.ma_nv')
               ->select('phepnam.*')
               ->where('nhanvien.ma_nv',$code)
               ->first();
               $data_bh=DB::table('baohiem')
               ->join('nhanvien','nhanvien.ma_nv','=','baohiem.ma_nv')
               ->select('baohiem.tiendong_bhxh')
               ->where('nhanvien.ma_nv',$code)
               ->first();
               $data_kt=DB::table('khenthuong')
               ->join('nhanvien','nhanvien.ma_nv','=','khenthuong.ma_nv')
               ->select('khenthuong.sotien')
               ->where('nhanvien.ma_nv',$code)
               ->first();
               
               $data_kl=DB::table('kyluat')
               ->join('nhanvien','nhanvien.ma_nv','=','kyluat.ma_nv')
               ->select('kyluat.sotien')
               ->where('nhanvien.ma_nv',$code)
               ->first();              
              return view('quanlynhansu.chucnang.chitiet_bangluong',compact('data_nv','data_cc','data_hd','data_pn','data_bh','data_kt','data_kl'));
              

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
                $data=  DB::table('dulieuchamcong')
                -> join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv')               
                ->select('dulieuchamcong.*','nhanvien.*')          
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
                 <h1 style="text-align: center"> THỐNG KÊ BẢNG CHẤM CÔNG</h1>
                 <a href="../dulieuchamcong/dulieuchamcong"> Quay Lại</a>
                 <table class="table table-bordered ">
                 <tr>
                     <th>STT </th>
                     <th>Mã Nhân Viên</th>
                     <th>Tên Nhân Viên</th>
                     <th>Chức Vụ</th>
                     <th>Phòng Ban</th>
                     <th>Ngày Chấm Công</th>
                     <th>Giờ Vào </th>
                     <th>Giờ Ra</th>
                     <th>Số Công</th>
                     
                 </tr>';  
                 foreach ($data as $key=> $dt)
                 {       
                      $output.='
                 <tr>
                     <td>'.++$key.'</td>
                     <td>'.$dt->ma_nv.'</td>
                     <td>'.$dt->hoten_nv.'</td>
                     <td>'.$dt->ma_cv.'</td>
                     <td>'.$dt->ma_pb.'</td>
                     <td>'.$dt->ngay_chamcong.'</td>
                     <td>'.Carbon::parse($dt->gio_vao)->format('H:i:A').'</td>
                     <td>'.Carbon::parse($dt->gio_ra)->format('H:i:A').'</td>
                     <td>'.(Carbon::parse($dt->gio_ra)->diffInHours(Carbon::parse($dt->gio_vao))-1.0)/8 .'</td>
                 </tr>';
                 }
             
                 $output.='
                
             </table>';
            
                return $output;
                 
            }
            public function baocao_bangluong()
            {
              
                 $pdf= \App::make('dompdf.wrapper');
                 $pdf->loadHTML($this->content_baocaobangluong());
                 $pdf->setPaper('A4','landscape'); // in theo chiều ngang khổ A4  
                 return $pdf->stream();
            }
            public function content_baocaobangluong()
            {
                $data= DB::table('dulieuchamcong')
                  ->join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv') 
                  ->join('phongban','dulieuchamcong.ma_pb','=','phongban.ma_pb')  
                  ->join('hopdong','dulieuchamcong.ma_nv','=','hopdong.ma_nv')                           
                  ->select('dulieuchamcong.ma_nv','hoten_nv','ten_pb','heso_luong','phu_cap',DB::raw('sum(  (((gio_ra - gio_vao)*0.60)*0.60)/3600-1.0)/8 as total'))
                  ->groupBy('ma_nv','hoten_nv','ten_pb','heso_luong','phu_cap')
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
                 <h1 style="text-align: center"> THỐNG KÊ BẢNG LƯƠNG</h1>
                 <a href="../dulieuchamcong/bangluong"> Quay Lại</a>
                 <table class="table table-bordered ">
                 <tr>
                     <th>STT </th>
                     <th>Mã Nhân Viên</th>
                     <th>Tên Nhân Viên</th>                   
                     <th>Phòng Ban</th>
                     <th>Hệ Số Lương</th>
                     <th>Phụ Cấp</th>
                     <th>Tổng Lương</th>
                     <th>Thực Lãnh</th>
                    
                 </tr>';  
                 foreach ($data as $key=> $dt)
                 {       
                      $output.='
                 <tr>
                     <td>'.++$key.'</td>
                     <td>'.$dt->ma_nv.'</td>
                     <td>'.$dt->hoten_nv.'</td>                    
                     <td>'.$dt->ten_pb.'</td>
                     <td>'.$dt->heso_luong.'</td>
                     <td>'.$dt->phu_cap.'</td>
                     <td>'.(number_format(floor($dt->heso_luong/26*$dt->total),0,',')).'</td>
                     <td>'.number_format($total=floor($dt->heso_luong/26*$dt->total) +$dt->phu_cap).'</td>
                   
                 </tr>';
                 }
             
                 $output.='
                
             </table>';
            
                return $output;
                 
            }
      
      
}
