<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Vattu;
use App\Models\Quanlykhovattu\Chitietnhapkho;
use App\Models\Quanlykhovattu\Chitietxuat;
use App\Models\Quanlykhovattu\Chitietxuatkho;
use DB;
class XuatnhaptonController extends Controller
{
    public function xuatnhapton()
    {
        $nhap = DB::table('Chitietnhapkho_banhang')        
        ->groupBy('id_vattu')
        ->selectRaw('SUM(sl_vattu) AS tongnhap, id_vattu');
        $xuat = DB::table('Chitietxuatkho')
        ->groupBy('id_vattu')
        ->selectRaw('SUM(sl_vattu) AS tongxuat, id_vattu');
       $data= DB::table('vattu_banhang AS vt')       
        ->leftJoin(DB::raw("({$nhap->toSql()}) AS nhap"), 'nhap.id_vattu', '=', 'vt.ma_vattu')
        ->leftJoin(DB::raw("({$xuat->toSql()}) AS xuat"), 'xuat.id_vattu', '=', 'vt.ma_vattu')
        ->groupBy('vt.ma_vattu','vt.ten_vattu','vt.dvt_vattu', 'nhap.id_vattu', 'xuat.id_vattu','nhap.tongnhap','xuat.tongxuat')
        ->selectRaw('vt.ma_vattu AS "ma_vattu", 
                  vt.ten_vattu AS "ten_vattu",
                  vt.dvt_vattu AS "dvt_vattu", 
                  COALESCE(nhap.tongnhap, 0) AS "tongnhap", 
                  COALESCE(xuat.tongxuat, 0) AS "tongxuat"')
        ->paginate(10);
        //dd($data);
        return view('quanlykhovattu.chucnang.xuatnhapton.xuatnhapton',compact('data'));
    }
    public function chitiet_vtnhap($id)
    {
        
        $data=DB::table('Chitietnhapkho_banhang')
        ->join('phieunhapkho_banhang','Chitietnhapkho_banhang.id_phieunhap','=','phieunhapkho_banhang.ma_phieu')
        ->where('id_vattu',$id)
        ->paginate(5);
         //dd($data);
         return view('quanlykhovattu.chucnang.xuatnhapton.chitiet_vtnhap',compact('data'));

    }
    public function chitiet_vtxuat($id)
    {
        //  $data=chitietxuatkho::where('id_vattu',$id)->paginate(5);   
        $data=DB::table('Chitietxuatkho')
        ->join('phieuxuatkho','Chitietxuatkho.id_phieuxuat','=','phieuxuatkho.ma_phieu')
        ->where('id_vattu',$id)
        ->paginate(5);    
         //dd($data);
         return view('quanlykhovattu.chucnang.xuatnhapton.chitiet_vtxuat',compact('data'));

    }
    public function select_vattu(Request $request)
    {
      $get=$request->get('id');                        
            
      $nhap = DB::table('Chitietnhapkho_banhang')        
      ->groupBy('id_vattu')
      ->selectRaw('SUM(sl_vattu) AS tongnhap, id_vattu');
      $xuat = DB::table('Chitietxuatkho')
      ->groupBy('id_vattu')
      ->selectRaw('SUM(sl_vattu) AS tongxuat, id_vattu');
     $data= DB::table('vattu_banhang AS vt')
     ->where('ma_vattu',$get)
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
      if($data)
      {
       return response()->json([
          'data'=>$data,
          'status'=>200,
          'messege'=>'Nhận dữ liệu thành công!!!',
        ]);
      }
      else
      {
       return response()->json([
          'data'=>null,
          'status'=>404,
          'messege'=>'Kêt nối bị lỗi!!!',
        ]);
      }

    }
  
   
   
}
