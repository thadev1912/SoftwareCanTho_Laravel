<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use App\Models\Quanlykhovattu\Kho;
use App\Models\quanlybanhang\Thukho;
use App\Models\Quanlykhovattu\Nhacungcap;
use App\Models\Quanlykhovattu\Vattu;
use App\Models\Quanlykhovattu\Lydo_nhap;
use App\Models\Quanlykhovattu\Donvitinh;
use App\Models\Quanlykhovattu\Invoice_nhap;
use App\Models\Quanlykhovattu\Phieunhapkho;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
class NhapkhoController extends Controller
{
    public function nhapkho()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $kho=Kho::get();
        $lydo=Lydo_nhap::get();
        $dvt=Donvitinh::get();
        $nhacc=Nhacungcap::get();
        $vattu=Vattu::get();
        $latest = invoice_nhap::latest()->first();

        if (! $latest) {
                          $invoice_number='PNK0001';          
                      }    
        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);    
        $invoice_number= 'PNK' . sprintf('%04d', $string+1);         
        return view('quanlykhovattu.chucnang.nhapkho.nhapkho',compact('kho','lydo','dvt','nhacc','vattu','invoice_number'));
    }
    public function ds_phieunhap()
    {
    //$data= phieunhapkho::get();
      $data=  DB::table('phieunhapkho_banhang')
        ->leftjoin('kho_banhang','phieunhapkho_banhang.id_kho','=','kho_banhang.ma_kho')
        ->leftjoin('nhacc_banhang','phieunhapkho_banhang.id_nhacc','=','nhacc_banhang.ma_nhacc')
        ->leftjoin('lydo_nhaphang','phieunhapkho_banhang.id_lydo','=','lydo_nhaphang.id')
        ->select('phieunhapkho_banhang.id','phieunhapkho_banhang.ma_phieu','phieunhapkho_banhang.ngaynhap','phieunhapkho_banhang.id_nhanvien',
        'kho_banhang.ten_kho','nhacc_banhang.ten_nhacc','lydo_nhaphang.lydo')
        ->paginate(10);
    //dd($data);
 return view('quanlykhovattu.chucnang.nhapkho.danhsach_phieunhap',compact('data'));
    }
    public function chitiet_phieunhap($id)
              {
                $data=phieunhapkho::find($id);
              // dd($data);
                $kho=Kho::get();             
                $lydo=Lydo_nhap::get();
                $nhacc=Nhacungcap::get();
                $dvt=Donvitinh::get();
                $vattu=Vattu::get();
                $thukho = DB::table('phieunhapkho_banhang')
                ->select(DB::raw('id_nhanvien'))   
                ->groupBy('id_nhanvien')
                ->get(); 
                //dd($thukho);
                return view('quanlykhovattu.chucnang.nhapkho.chitiet_phieunhap',compact('data',
                'vattu','kho','lydo','nhacc','dvt','thukho'));
              }
}
