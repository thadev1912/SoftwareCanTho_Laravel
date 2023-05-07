<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlynhansu\NhanvienRequest;
use App\Models\Quanlynhansu\Nhanvien;
use App\Models\Quanlynhansu\PhongBan;
use App\Models\Quanlynhansu\Chucvu;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Brian2694\Toastr\Facades\Toastr;
class NhanvienController extends Controller

{
    //list danh sách nhân viên
    public function nhanvien()
    {
      
      
       $nhanvien=DB::table('nhanvien')
       ->join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
       ->join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
       ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv')
       ->paginate(10);
        //dd($nhanvien);
       $phongban=phongban::get();   
         return view('quanlynhansu.danhmuc.nhanvien.nhanvien',compact('nhanvien','phongban'));
   }
  
   public function timkiem(Request $request)
   {    
        $timkiem=$request->timkiem;
        $timkiem_pb=$request->timkiem_pb;
        
        if(isset($timkiem)){
        $nhanvien=DB::table('nhanvien')
        ->where('hoten_nv','like',"%".$timkiem."%")->paginate(5);
        }
        if(isset($timkiem_pb))
        {
          $nhanvien=DB::table('nhanvien')->where('ma_pb','like',"%".$timkiem_pb."%")->paginate(5);
        }
       // dd($nhanvien);
        return view('quanlynhansu.danhmuc.nhanvien.nhanvien',compact('nhanvien'));
   }
   //thêm nhân viên mới
   public function them_nv()
    {
          $chucvu=Chucvu::get();
          $phongban=phongban::get(); 
          $trinhdo = DB::table('nhanvien')
          ->select(DB::raw('trinhdo_nv'))   
          ->groupBy('trinhdo_nv')
          ->get();  
          $trangthai = DB::table('nhanvien')
          ->select(DB::raw('trangthai_nv'))   
          ->groupBy('trangthai_nv')
          ->get();
          $gioitinh = DB::table('nhanvien')
          ->select(DB::raw('gioitinh_nv'))   
          ->groupBy('gioitinh_nv')
          ->get();
           return view('quanlynhansu.danhmuc.nhanvien.them_nv',compact('phongban','chucvu','trangthai','gioitinh','trinhdo')); // ok
    }
   //luu nhân viên mới
    public function luu_nv(NhanvienRequest $request)
      {
        //dd($request->all());
         $sv=new nhanvien;
         $sv->ma_nv=$request->txt_ma_nv;
         $sv->hoten_nv=$request->txt_hoten_nv;
         $sv->diachi_nv=$request->txt_diachi_nv;
         $sv->gioitinh_nv=$request->txt_gioitinh_nv;
         $sv->sdt_nv=$request->txt_sdt_nv;
         if($request->has('image'))
         {
             $hinh=$request->image;            
             $getname=$hinh->getClientoriginalName(); 
             $hinh->move(public_path('anhdaidien'),$getname); 
             
         }
         else
         {
          $getname='avatar.png';
         }
      
         $sv->anhdaidien=$getname;        
        
         $sv->ma_cv=$request->txt_ma_cv;
         $sv->ma_pb=$request->txt_ma_pb;
         $sv->trinhdo_nv=$request->txt_trinhdo_nv;
         $sv->chuyennganh_nv=$request->txt_chuyennganh_nv;
         $sv->trangthai_nv=$request->txt_trangthai_nv;
         $sv->ngaysinh_nv=$request->txt_ngaysinh_nv;
         $sv->cccd_nv=$request->txt_cccd_nv;
         $sv->save();
         Toastr::success('Thêm nhân viên thành công!!!','Thông Báo');
         return redirect()->route('nhanvien');

      }
       //sua nhân viên
        public function sua_nv($id)
         {
           $chucvu=Chucvu::get();
           $phongban=phongban::get();
           $trinhdo = DB::table('nhanvien')
           ->select(DB::raw('trinhdo_nv'))   
           ->groupBy('trinhdo_nv')
           ->get();   
           $gioitinh = DB::table('nhanvien')
           ->select(DB::raw('gioitinh_nv'))   
           ->groupBy('gioitinh_nv')
           ->get();
           $trangthai = DB::table('nhanvien')
           ->select(DB::raw('trangthai_nv'))   
           ->groupBy('trangthai_nv')
           ->get();
           $chuyennganh = DB::table('nhanvien')
           ->select(DB::raw('chuyennganh_nv'))   
           ->groupBy('chuyennganh_nv')
           ->get();
              $data = DB::table('nhanvien')->where('id', $id)->first();
             //dd($data);
              return view('quanlynhansu.danhmuc.nhanvien.sua_nhanvien', compact('data','chucvu','phongban','gioitinh','trinhdo','trangthai','chuyennganh')); 
         }
         public function capnhat_nv($id,Request $request)

          {
            
            if($request->has('image'))
         {
             $hinh=$request->image;
             //$dinhdang_anh=$request->image->extension(); // lây định dạng của file ảnh
             //$getname=time().'_'.'avatar.'.$dinhdang_anh;// lấy tên file theo tùy chỉnh
             $getname=$hinh->getClientoriginalName(); //lấy tên của file ảnh
             $hinh->move(public_path('anhdaidien'),$getname); // lưu vào file pulic_đường dẫn+ tên file ảnh             
         }
         else
         {
          $getname=$request->hinhdaidien;
         }
         //dd($getname);
              DB::table('nhanvien')->where('id',$id)->update(
            [
                    'ma_nv'=>$request->txt_ma_nv,
                    'hoten_nv'=>$request->txt_hoten_nv,
                    'diachi_nv'=>$request->txt_diachi_nv,
                    'gioitinh_nv'=>$request->txt_gioitinh_nv,
                    'sdt_nv'=>$request->txt_sdt_nv,
                    'anhdaidien'=>$getname,
                    'ma_pb'=>$request->txt_ma_pb,
                    'ma_cv'=>$request->txt_ma_cv,
                     'trinhdo_nv'=>$request->txt_trinhdo_nv,
                    'chuyennganh_nv'=>$request->txt_chuyennganh_nv,
                    'trangthai_nv'=>$request->txt_trangthai_nv,
                    'ngaysinh_nv'=>$request->txt_ngaysinh_nv,
                    'cccd_nv'=>$request->txt_cccd_nv,
                   // 'ma_email'=>'1',

            ]);
            
            Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');           
            return redirect()->route('nhanvien');
           
          }
           public function xoa_nv($id)
            {
                DB::table('nhanvien')->where('id',$id)->delete();
                Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
                return redirect()->route('nhanvien');
            }
             
             public function pdf_nhanvien(Request $request)
   {
        $items= DB::table('nhanvien')
        ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
              ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
              ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
              ->   select('nhanvien.*','chucvu.ten_cv','phongban.ten_pb')
              ->paginate(10);

         view()->share('items',$items);
       
          $pdf = PDF::loadView('nhanvien.pdf_nhanvien');
        
          return $pdf->stream();
     }
     public function thongke_nhanvien(Request $request)
             {
              $phongban=phongban::get();
              $chucvu=chucvu::get();             
              //hàm groupby theo nhóm giới tính
              $gioitinh = DB::table('nhanvien')
              ->select(DB::raw('gioitinh_nv'))   
              ->groupBy('gioitinh_nv')
              ->get();   
             $tinhtrang=DB::table('hopdong')
             ->select(DB::raw('tinhtrang'))   
             ->groupBy('tinhtrang')
             ->get();              
              $timkiem=$request->tk_maten;                           
              $tk_pb=$request->tk_phongban;
              $tk_cv=$request->tk_chucvu;   
              $tk_gt=$request->tk_gioitinh; 
              $tk_tt=$request->tk_tinhtrang; 
                      
              // Theo Mã và Họ Tên
              if((isset($timkiem))&&(empty($tk_pb))&&(empty($tk_cv))&&(empty($tk_gt)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                 ->where('nhanvien.ma_nv','like',"%".$timkiem."%")
                  ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem."%")->paginate(10);
                
                  }
            
                   // Theo Phòng Ban 
                  if((empty($timkiem))&&(isset($tk_pb))&&(empty($tk_cv))&&(empty($tk_gt)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                   ->where('nhanvien.ma_pb','like',"%".$tk_pb."%")->paginate(10);
                  }
                  // Theo Chức Vụ 
                  if((empty($timkiem))&&(empty($tk_pb))&&(isset($tk_cv))&&(empty($tk_gt)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                   ->where('nhanvien.ma_cv','like',"%".$tk_cv."%")->paginate(10);
                  // dd($result);
                  }
                  //Theo Giới Tính
                  if((isset($tk_gt))&&(empty($timkiem))&&(empty($tk_pb))&&(empty($tk_cv)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                   ->where('nhanvien.gioitinh_nv','like',"%".$tk_gt."%")->paginate(10);
                  // dd($result);
                  }
                 
                     //Theo Tình Trạng Hoạt Động
                     if((isset($tk_tt))&&(empty($timkiem))&&(empty($tk_pb))&&(empty($tk_cv))&&(empty($tk_gt)))
                     {
                     $result=DB::table('nhanvien')
                     ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                     ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                     ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv') 
                     ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.tinhtrang')               
                     ->where('hopdong.tinhtrang','like',"%".$tk_tt."%")                     
                     ->paginate(10);
                     // dd($result);
                     }
                      //Theo Mã và Họ Tên và Phòng Ban
                  if((isset($timkiem))&&(isset($tk_pb))&&(empty($tk_cv))&&(empty($tk_gt))&&(empty($tk_tt)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                  ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.tinhtrang') 
                  ->where('nhanvien.ma_nv','like',"%".$timkiem."%")
                  ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem."%")
                   ->where('nhanvien.ma_pb','like',"%".$tk_pb."%")->paginate(10);
                   //dd($result);
                  }
                  //Theo Mã +Họ Tên và Phòng Ban và Chức Vụ
                  if((isset($timkiem))&&(isset($tk_pb))&&(isset($tk_cv))&&(empty($tk_gt))&&(empty($tk_tt)))
                  {
                  $result=DB::table('nhanvien')
                  ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                  ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                  ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                  ->where('nhanvien.ma_nv','like',"%".$timkiem."%")
                  ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem."%")
                   ->where('nhanvien.ma_pb','like',"%".$tk_pb."%")
                   ->where('nhanvien.ma_cv','like',"%".$tk_cv."%")->paginate(10);
                   //dd($result);
                  }
                        //Theo Mã +Họ Tên và Phòng Ban && Chức Vụ && gioitinh 
                   if((isset($timkiem))&&(isset($tk_pb))&&(isset($tk_cv))&&(isset($tk_gt))&&(empty($tk_tt)))
                    {
                    $result=DB::table('nhanvien')
                    ->join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                    ->join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                    ->join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                    ->where('nhanvien.ma_nv','like',"%".$timkiem."%")
                    ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem."%")
                    ->where('nhanvien.ma_pb','like',"%".$tk_pb."%")
                    ->where('nhanvien.ma_cv','like',"%".$tk_cv."%")
                    ->where('nhanvien.gioitinh_nv','like',"%".$tk_gt."%")
                    ->where('hopdong.tinhtrang','like',"%".$tk_tt."%")
                    ->paginate(10);
                         //dd($result);
                        }
                  // Theo Cả Họ Tên,Phòng Ban, Chức Vụ, Giới Tính,Trạng Thái
                   if((isset($timkiem))&&(isset($tk_pb))&&(isset($tk_cv))&&(isset($tk_gt))&&(isset($tk_tt)))
                   {
                   $result=DB::table('nhanvien')
                   ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                   ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                   ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
                   ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.tinhtrang') 
                   ->where('nhanvien.ma_nv','like',"%".$timkiem."%")
                  ->orwhere('nhanvien.hoten_nv','like',"%".$timkiem."%")
                  ->where('nhanvien.ma_cv','like',"%".$tk_cv."%")
                  ->where('nhanvien.gioitinh_nv','like',"%".$tk_gt."%")
                  ->where('nhanvien.ma_pb','like',"%".$tk_pb."%")
                  ->where('hopdong.tinhtrang','like',"%".$tk_tt."%")->paginate(10);                
                 
                  }
                  // Tất Cả Đều Trống 
                  elseif((empty($timkiem))&&(empty($tk_pb))&&(empty($tk_cv))&&(empty($tk_gt ))&&(empty($tk_tt)))
                  {
              $result= DB::table('nhanvien')
              ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
              ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
              ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
              ->   select('nhanvien.*','hopdong.tinhtrang','chucvu.ten_cv','phongban.ten_pb')
              ->paginate(10);
            }
                //dd($result);
                  
               return view('quanlynhansu.chucnang.thongkenhanvien',compact('result','phongban','chucvu','gioitinh','tinhtrang'));  
                
             }
           
            
             public function chitiet_nhanvien($id)
             {
              $data= DB::table('nhanvien')
           
              ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
              ->   join('baohiem','nhanvien.ma_nv','=','baohiem.ma_nv')
              ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
              ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv') 
              ->   select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.ma_hd','hopdong.ngayvao',
                    'hopdong.tinhtrang','hopdong.loai_hd','baohiem.ma_bhxh','baohiem.loai_bhxh')           
              ->   where('nhanvien.ma_nv',$id) ->first();
           
             $result=DB::table('khenthuong')->where('nhanvien.ma_nv',$id)
             ->   join('nhanvien','khenthuong.ma_nv','=','nhanvien.ma_nv')             
             ->first();
             $info=DB::table('kyluat')->where('nhanvien.ma_nv',$id)
             ->   join('nhanvien','kyluat.ma_nv','=','nhanvien.ma_nv')         
             ->first(); 
              $phepnam=DB::table('phepnam')->where('nhanvien.ma_nv',$id)
              ->   join('nhanvien','phepnam.ma_nv','=','nhanvien.ma_nv')
              ->first();
               return view('quanlynhansu.chucnang.chitiet_nhanvien',compact('data','result','info','phepnam'));  
           
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
          $data= DB::table('nhanvien')
          ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
          ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
          ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
          ->   select('nhanvien.*','chucvu.ten_cv','phongban.ten_pb')
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
          <h1 style="text-align: center"> DANH SÁCH NHÂN VIÊN</h1>
          <a href="../hopdong/hopdong"> Quay Lại</a>
          <table class="table table-bordered ">
          <tr>
              <th>MSNV </th>
              <th>Tên Nhân Viên</th>
              <th>Phòng Ban</th>
              <th>Chức Vụ</th>
              <th>Phòng Ban</th>
              <th>Giới Tính</th>
              <th>Số Điện Thoại</th>
              <th>Trạng Thái</th>
          </tr>';  
          foreach ($data as $key=> $dt)
          {       
               $output.='
          <tr>
              <td>'.++$key.'</td>
              <td>'.$dt->ma_nv.'</td>
              <td>'.$dt->hoten_nv.'</td>
              <td>'.$dt->ten_cv.'</td>
              <td>'.$dt->ten_pb.'</td>
              <td>'.$dt->gioitinh_nv.'</td>
              <td>'.$dt->sdt_nv.'</td>
          </tr>';
          }
      
          $output.='
         
      </table>';
     
         return $output;
          
     }
  
}
