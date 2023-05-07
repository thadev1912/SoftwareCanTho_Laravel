<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quanlynhansu\PhepnamRequest;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Phepnam;
use App\Models\Quanlynhansu\Nhanvien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use Brian2694\Toastr\Facades\Toastr;
class PhepnamController extends Controller
{
    public function phepnam(Request $request) 
    {
        $phepnam= DB::table('phepnam')
        ->join('nhanvien','phepnam.ma_nv','=','nhanvien.ma_nv')
        ->select('phepnam.*','nhanvien.hoten_nv')
        ->paginate(10);
         
        return view('quanlynhansu.danhmuc.phepnam.phepnam',compact('phepnam'));
    }
    public function them_pn()
    {
        $nhanvien=DB::table('nhanvien')        
        ->get();
        //dd($nhanvien);
        $phepnam=DB::table('phepnam')       
        ->select('ma_nv')
        ->get();        
         $array_pn = [];
      foreach($phepnam as $item)
      {
           array_push($array_pn,$item->ma_nv);
      }
              $select_nv=array();
              foreach($nhanvien as $nv)
              {
                //dd($nv->ma_nv);
                     if(!in_array($nv->ma_nv,$array_pn))
                     {
                          
                          array_push($select_nv,$nv);
                        
                     }           
                     
              }
              //dd($select_nv);
      return view('quanlynhansu.danhmuc.phepnam.them_pn',compact('select_nv'));
    }

    public function ajax(Request $request)
     {
       $info=$request->get('get_nv'); 
       $layds=DB::table('nhanvien')
       ->join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
        ->select('nhanvien.*','hopdong.ngayvao','hopdong.ngay_nghiviec')
       ->where('nhanvien.ma_nv',$info)->first();
        //dd($layds);
        return json_encode($layds);
    
     }
      public function luu_pn(PhepnamRequest $request)
       {
       // dd($request->all());
            DB::table('phepnam')->insert([
             'ma_nv'=>$request->txt_ma_nv,            
             'ngay_batdau'=>$request->txt_ngay_batdau,
             'phepnam_dadung'=>$request->txt_phepnam_dadung,
             'ngay_ketthuc'=>$request->txt_ngay_ketthuc,

            ]);
            Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
            return redirect()->route('phepnam');
       }
       public function sua_pn($id)
          {
                      
           $data= DB::table('phepnam')->where('id',$id)->first();
            return view('quanlynhansu.danhmuc.phepnam.sua_pn',compact('data'));
          } 
          public function capnhat_pn($id,Request $request)
          {
               DB::table('phepnam')-> where('id',$id)->update([
                'ma_nv'=>$request->txt_ma_nv,            
                'ngay_batdau'=>$request->txt_ngay_batdau,
                'phepnam_dadung'=>$request->txt_phepnam_dadung,
                'ngay_ketthuc'=>$request->txt_ngay_ketthuc,
   
               ]);
               Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
               return redirect()->route('phepnam');
          }
          public function xoa_pn($id)
            {
                DB::table('phepnam')->where('id',$id)->delete();
                Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                return redirect()->route('phepnam');  
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
              $data =DB::table('phepnam')
        ->join('nhanvien','phepnam.ma_nv','=','nhanvien.ma_nv')
        ->select('phepnam.*','nhanvien.hoten_nv')
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
                 <h1 style="text-align: center"> THỐNG KÊ PHÉP NĂM</h1>
                 <a href="../phepnam/phepnam"> Quay Lại</a>
                 <table class="table table-bordered ">
                 <tr>
                     <th>STT </th>
                     <th>Mã Nhân Viên</th>
                     <th>Tên Nhân Viên</th>
                     <th>Ngày Nhận Việc</th>
                     <th>Tổng Phép Năm</th>
                     <th>Phép Đã Dùng</th>
                     <th>Phép Tồn</th>
                     <th>Ngày Nghỉ Việc</th>
                     
                 </tr>';  
                 foreach ($data as $key=> $dt)
                 {       
                      $output.='
                 <tr>
                     <td>'.++$key.'</td>
                     <td>'.$dt->ma_nv.'</td>
                     <td>'.$dt->hoten_nv.'</td>
                     <td>'.$dt->ngay_batdau.'</td>
                     <td>'.floor(Carbon::parse($dt->ngay_ketthuc)->diffInDays(Carbon::parse($dt->ngay_batdau))/30).'</td>
                     <td>'.$dt->phepnam_dadung.'</td>
                     <td>'.floor(Carbon::parse($dt->ngay_ketthuc)->diffInDays(Carbon::parse($dt->ngay_batdau))/30)-$dt->phepnam_dadung.'</td>
                     <td>'.$dt->ngay_ketthuc.'</td>
                 </tr>';
                 }
             
                 $output.='
                
             </table>';
            
                return $output;
                 
            }
    }
        
    ?>   
       
     



















