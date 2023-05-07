<?php

namespace App\Http\Controllers\Tintucdatxanh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tintucdatxanh\TintucdatxanhRequest;
use App\Models\Tintucdatxanh\Tintucdatxanh;
use App\Models\Quanlybanhang\Product;
use DB;
use Brian2694\Toastr\Facades\Toastr;
class TintucdatxanhController extends Controller
{
    public function quanly_tintuc()
    {
        $data=tintucdatxanh::paginate(10);
        return view('tintucdatxanh.quanly_tintuc',compact('data'));
    }
    public function themmoi_tintuc()
    {
        return view('tintucdatxanh.themmoi_tintuc');
    }
   public function luu_tintuc(TintucdatxanhRequest $request)
   {
    //dd($request->all());
    if($request->has('txt_anhdaidien_tintuc'))
    {
        $hinh=$request->txt_anhdaidien_tintuc;        
        $getname=$hinh->getClientoriginalName(); //lấy tên của file ảnh
        $hinh->move(public_path('images'),$getname); // lưu vào file pulic_đường dẫn+ tên file ảnh
        
    }
    else
    {
     $getname='avatar.jpg';
    }
    tintucdatxanh::create([
     'tieude_tintuc'=>$request->txt_tieude_tintuc,
     'noidung_tintuc'=>$request->txt_noidung_tintuc,
     'anhdaidien_tintuc'=>$getname,
     'danhmuc_tintuc'=>$request->txt_danhmuc_tintuc,

    ]);
    Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
    return redirect()->route('quanly_tintuc');
   }
   public function sua_tintuc($id)
   {
    $data=tintucdatxanh::find($id);
    $danhmuc=DB::table('tintucdatxanh')
    ->select(DB::raw('danhmuc_tintuc'))   
    ->groupBy('danhmuc_tintuc')
    ->get();
    //dd($data);
    return view('tintucdatxanh.sua_tintuc',compact('data','danhmuc'));
   }
   public function capnhat_tintuc($id,TintucdatxanhRequest $request)
   {
   
    if($request->has('hinh'))
    {
      
        $hinh=$request->hinh;        
        $getname=$hinh->getClientoriginalName(); //lấy tên của file ảnh
        $hinh->move(public_path('images'),$getname); // lưu vào file pulic_đường dẫn+ tên file ảnh
        
    }
    else
    {
     $getname=$request->txt_anhdaidien_tintuc;        
    }
    //dd($getname);
    //dd($request->all());
    tintucdatxanh::find($id)->update([
     'tieude_tintuc'=>$request->txt_tieude_tintuc,
     'noidung_tintuc'=>$request->txt_noidung_tintuc,
     'anhdaidien_tintuc'=>$getname,
     'danhmuc_tintuc'=>$request->txt_danhmuc_tintuc,
    ]);
    Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
    return redirect()->route('quanly_tintuc');
   }
   public function xoa_tintuc($id)
   {
    tintucdatxanh::find($id)->delete();
    Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
    return redirect()->route('quanly_tintuc');
   }
    public function tintucdatxanh()
    {
         $tintucthitruong=tintucdatxanh::where('danhmuc_tintuc','Tin Tức Thị Trường')->get();        
         $vanhoadatxanh=tintucdatxanh::where('danhmuc_tintuc','Văn Hóa Đất Xanh')->get();        
         $hot_sales=Product::where('hot_sales',1)->get();           
        return view('tintucdatxanh.tintucdatxanh',compact('tintucthitruong','vanhoadatxanh','hot_sales'));
    }
    public function chitiet_tintuc($id)
    {
        $data=tintucdatxanh::find($id);
        //dd($data);
        return view('tintucdatxanh.chitiet_tintuc',compact('data'));
    }
}
