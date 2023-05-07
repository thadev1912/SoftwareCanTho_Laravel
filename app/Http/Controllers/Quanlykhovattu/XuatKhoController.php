<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Quanlynhansu\Nhanvien;
use App\Models\Quanlykhovattu\Vattu;
use App\Models\Quanlykhovattu\Lydo_xuat;
use App\Models\Quanlykhovattu\Donvitinh;
use App\Models\Quanlykhovattu\Invoice_xuat;
use App\Models\Quanlykhovattu\Phieuxuatkho;
use DB;
class XuatKhoController extends Controller
{
    public function xuatkho()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien=nhanvien::get();
         $lydo=Lydo_xuat::get();
         $dvt=Donvitinh::get();        
         $vattu=Vattu::get();
        $latest = invoice_xuat::latest()->first();

        if (! $latest) {
                          $invoice_number='PXK0001';          
                      }    
        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);    
        $invoice_number= 'PXK' . sprintf('%04d', $string+1);         
        return view('Quanlykhovattu.chucnang.xuatkho.xuatkho',compact('dvt','vattu','lydo','nhanvien','invoice_number'));
    }
    public function ds_phieuxuat()
    {

$data=DB::table('phieuxuatkho')
->join('nhanvien','nhanvien.ma_nv','=','phieuxuatkho.id_nhanvien')
->join('lydo_xuat','lydo_xuat.id','=','phieuxuatkho.id_lydo')
->select('phieuxuatkho.id','phieuxuatkho.ma_phieu','phieuxuatkho.ngay_xuat','phieuxuatkho.id_thukho','nhanvien.hoten_nv','nhanvien.ma_pb','lydo_xuat.lydo')
->paginate(10);
//dd($data);
 return view('quanlykhovattu.chucnang.xuatkho.danhsach_phieuxuat',compact('data'));
    }
    public function chitiet_phieuxuat($id)
    {
  
      $data=DB::table('nhanvien')
      ->join('phieuxuatkho','nhanvien.ma_nv','=','phieuxuatkho.id_nhanvien')
      ->where('phieuxuatkho.id',$id)
      ->first();     
      $nhanvien=nhanvien::get();  
      $lydo=Lydo_xuat::get();  
      $dvt=Donvitinh::get();
      $vattu=Vattu::get();
      $thukho = DB::table('phieuxuatkho')
                ->select(DB::raw('id_thukho'))   
                ->groupBy('id_thukho')
                ->get(); 
      return view('quanlykhovattu.chucnang.xuatkho.chitiet_phieuxuat',compact('data',
      'dvt','vattu','lydo','nhanvien','thukho'));
    }
}
