<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Invoice_Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Phieunhapkho;
use App\Models\Quanlykhovattu\Vattu;
use App\Models\Quanlykhovattu\Invoice_nhap;
use App\Models\Quanlykhovattu\Chitietnhapkho;
use App\Models\Quanlykhovattu\Kho;
use App\Models\Quanlykhovattu\Thukho;
use App\Models\Quanlykhovattu\Nhacungcap;
use Brian2694\Toastr\Facades\Toastr;
use DB;
class PhieunhapkhoController extends Controller
{
    public function phieunhapkho()
    {
    $data= phieunhapkho::get();
    //dd($data);
    }
   
    public function them_phieunhapkho(Request $res)
    {
        // dd($res->all());
         
         phieunhapkho::create([
            'ma_phieu'=>$res->txt_maphieu,
            'ngaynhap'=> $res->txt_ngaynhap,
            'id_nhacc'=>$res->txt_nhacc,
            'id_nhanvien'=>$res->txt_nhanvien,
            'id_kho'=>$res->txt_kho,
            'id_lydo'=>$res->txt_lydo,
         ]);
                    Invoice_nhap::insert([
                       'invoice_number'=>$res->txt_maphieu,
                  ]);
                  Toastr::success('Thêm phiếu nhập thành công!!!','Thông Báo');  
         return redirect()->route('nhapkho')->with('thongbao','Đã thêm thành công');
    }
    public function capnhat_phieunhapkho(Request $res,$id )
    {
      //dd($res->all());
      phieunhapkho::find($id)->update([
        'ma_phieu'=>$res->txt_maphieu,
        'ngaynhap'=> $res->txt_ngaynhap,
        'id_nhacc'=>$res->txt_nhacc,
        'id_nhanvien'=>$res->txt_nhanvien,
        'id_kho'=>$res->txt_kho,
        'id_lydo'=>$res->txt_lydo,
     ]);
     Toastr::success('Đã cập nhật phiếu thành công!!!','Thông Báo');
     return redirect()->route('chitiet_phieunhap',$id);
    }
    public function ajax_dsvattu($id)
    {
        
       $data= DB::table('vattu_banhang')
        ->join('Chitietnhapkho_banhang','vattu_banhang.ma_vattu','=','Chitietnhapkho_banhang.id_vattu')          
        ->where('id_phieunhap',$id)
        ->get();
        
        //dd($data);
        if($data)
          {
            return response()->json([
                'data'=>$data,
                'status'=>200,
                'messege'=>'Lấy dữ liệu thành công'
            ]);
          }
          else{
            return response()->json([
                'data'=>null,
                'status'=>404,
                'messege'=>'Kết nối lỗi'
            ]);
          }
              }
              public function luu_vattu(Request $request)
              {
                   

                $data=Chitietnhapkho::create([
                    'id_phieunhap'=> $request->ma_phieu,     
                    'id_vattu'=> $request->ma_vattu,                   
                    'sl_vattu'=> $request->soluong,
                    
                  
                  ]);
                  if($data)
                  {
                    return response()->json([
                    'data'=>$data,
                    'status'=>true,
                    'messege'=>'Thêm dữ liệu thành công!!!',      
                    ]);
                  }
                  else
                  {
                    return response()->json([
                      'status' => false,
                      'msg' =>'Vui lòng kiểm tra lại',        
                      ]);
                  }
              }
              public function sua_vattu($id)
              {
                $data= DB::table('vattu_banhang')
                ->join('Chitietnhapkho_banhang','vattu_banhang.ma_vattu','=','Chitietnhapkho_banhang.id_vattu')          
                ->where('Chitietnhapkho_banhang.id',$id)->first();
                
               
              // dd($data);
                   if($data)
                   {
                     return response()->json([
                     'data'=>$data,
                     'status'=>true,
                     'messege'=>'Lấy dữ liệu thành công!!!',      
                     ]);
                   }
                   else
                   {
                     return response()->json([
                       'status' => false,
                       'msg' =>'Vui lòng kiểm tra lại',        
                       ]);
                   }
                  
                  }
                  public function capnhat_vattu(Request $request,$id)
                  {
                    $data=Chitietnhapkho::find($id)->update([
                      'id_phieunhap'=> $request->ma_phieu,     
                      'id_vattu'=> $request->ma_vattu,                   
                      'sl_vattu'=> $request->soluong,
                     
                    
                    ]);
                    if($data)
                    {
                      return response()->json([
                      'data'=>$data,
                      'status'=>true,
                      'messege'=>'Cập nhật dữ liệu thành công!!!',      
                      ]);
                    }
                    else
                    {
                      return response()->json([
                        'status' => false,
                        'msg' =>'Vui lòng kiểm tra lại',        
                        ]);
                    }
                  }
              public function xoa_vattu($id)
              {
                   $data=Chitietnhapkho::where('id',$id)->delete();
                   if($data)
                   {
                     return response()->json([
                     'data'=>$data,
                     'status'=>true,
                     'messege'=>'Đã xóa dữ liệu thành công!!!',      
                     ]);
                   }
                   else
                   {
                     return response()->json([
                       'status' => false,
                       'msg' =>'Vui lòng kiểm tra lại',        
                       ]);
                   }
              }
            
             

}
