<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Invoice_Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Phieuxuatkho;
use App\Models\Quanlykhovattu\Vattu;
use App\Models\Quanlykhovattu\Invoice_xuat;
use App\Models\Quanlykhovattu\Chitietxuatkho;
use App\Models\Quanlykhovattu\Kho;
use App\Models\Quanlykhovattu\Lydo_xuat;
use App\Models\Quanlykhovattu\Thukho;
use App\Models\Quanlykhovattu\Nhacungcap;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Svg\Tag\Rect;

class PhieuxuatkhoController extends Controller
{
    public function phieuxuatkho()
    {
    $data= phieuxuatkho::get();
    dd($data);
    }
   
    public function them_phieuxuatkho(Request $res)
    {
         //dd($res->all());
         
         phieuxuatkho::create([
            'ma_phieu'=>$res->txt_maphieu,
            'ngay_xuat'=> $res->txt_ngayxuat,  
            'id_thukho'=> $res->txt_thukho,           
            'id_nhanvien'=>$res->txt_nhanvien,           
            'id_lydo'=>$res->txt_lydo,
         ]);
                    invoice_xuat::insert([
                       'invoice_number'=>$res->txt_maphieu,
                  ]);  
                  Toastr::success('Thêm phiếu xuất kho thành công!!!','Thông Báo');
         return redirect()->route('xuatkho');
    }
    public function capnhat_phieuxuatkho(Request $res,$id)
    {
          //dd($res->all());
                 phieuxuatkho::find($id)->update([
            'ma_phieu'=>$res->txt_maphieu,
            'ngay_xuat'=> $res->txt_ngayxuat,  
            'id_thukho'=> $res->txt_thukho,           
            'id_nhanvien'=>$res->txt_nhanvien,           
            'id_lydo'=>$res->txt_lydo,
         ]);
                   
         Toastr::success('Cập nhật phiếu xuất kho thành công!!!','Thông Báo');     
         return redirect()->route('chitiet_phieuxuat',$id);
    }
    public function chitiet_phieuxuat($id)
              {
                $data=phieuxuatkho::find($id);
              // dd($data);
                $kho=Kho_banhang::get();
                $lydo=Lydo_xuat::get();
                $nhacc=Nhacungcap::get();
                $dvt=Donvitinh::get();
                $vattu=Vattu::get();
                
                return view('quanlykhovattu.chucnang.chitiet_phieuxuat',compact('data',
                'vattu','kho','lydo','nhacc','dvt'));
              }
              public function ajax_dsvtxuat($id)
              {
                  
                 $data= DB::table('vattu_banhang')
                  ->join('Chitietxuatkho','vattu_banhang.ma_vattu','=','Chitietxuatkho.id_vattu')          
                  ->where('id_phieuxuat',$id)
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
                        public function luu_vtxuat(Request $request)
                        {
                     
                          $data=Chitietxuatkho::create([
                              'id_phieuxuat'=> $request->ma_phieu,     
                              'id_vattu'=> $request->ma_vattu,                   
                              'sl_vattu'=> $request->soluong,                              
                             
                            ]);
                            if($data)
                            {
                              return response()->json([
                              'data'=>$data,
                              'status'=>true,
                              'messege'=>'Thêm dữ liệu thành công rồi cha nội_ vãi!!!',      
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
                        public function sua_vtxuat($id)
                        {
                          $data= DB::table('vattu_banhang')
                          ->join('Chitietxuatkho','vattu_banhang.ma_vattu','=','Chitietxuatkho.id_vattu')          
                          ->where('Chitietxuatkho.id',$id)->first();
                          //dd($data);
                          //lấy số lượng tồn
                          $nhap = DB::table('Chitietnhapkho_banhang')        
                          ->groupBy('id_vattu')
                          ->selectRaw('SUM(sl_vattu) AS tongnhap, id_vattu');
                          $xuat = DB::table('Chitietxuatkho')
                          ->groupBy('id_vattu')
                          ->selectRaw('SUM(sl_vattu) AS tongxuat, id_vattu');
                         $sl_ton= DB::table('vattu_banhang AS vt')
                         ->where('ma_vattu',$data->ma_vattu)
                          ->leftJoin(DB::raw("({$nhap->toSql()}) AS nhap"), 'nhap.id_vattu', '=', 'vt.ma_vattu')
                          ->leftJoin(DB::raw("({$xuat->toSql()}) AS xuat"), 'xuat.id_vattu', '=', 'vt.ma_vattu')
                          ->groupBy('vt.ma_vattu','vt.ten_vattu','vt.dvt_vattu', 'nhap.id_vattu', 'xuat.id_vattu','nhap.tongnhap','xuat.tongxuat')
                          ->selectRaw('vt.ma_vattu AS "ma_vattu", 
                                    vt.ten_vattu AS "ten_vattu",
                                    vt.dvt_vattu AS "dvt_vattu", 
                                    COALESCE(nhap.tongnhap, 0) AS "tongnhap", 
                                    COALESCE(xuat.tongxuat, 0) AS "tongxuat",
                                    COALESCE(nhap.tongnhap, 0)-COALESCE(xuat.tongxuat, 0) as "tonkho"',)
                          ->first();                     
                        //dd($sl_ton);
                             if($data)
                             {
                               return response()->json([
                               'data'=>$data,
                               'sl_ton'=>$sl_ton,
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
                            public function capnhat_vtxuat(Request $request,$id)
                            {
                              $data=Chitietxuatkho::find($id)->update([
                                'id_phieuxuat'=> $request->ma_phieu,     
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
                        public function xoa_vtxuat($id)
                        {
                             $data=Chitietxuatkho::where('id',$id)->delete();
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
