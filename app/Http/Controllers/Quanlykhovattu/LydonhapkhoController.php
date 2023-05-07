<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlykhovattu\LydonhapkhoRequest;
use App\Models\Quanlykhovattu\Lydo_nhap;
use Brian2694\Toastr\Facades\Toastr;
class LydonhapkhoController extends Controller
{
    public function lydonhapkho()
    {
        $lydonhapkho=Lydo_nhap::paginate(10);
        return view('quanlykhovattu.danhmuc.lydonhapkho.lydonhapkho',compact('lydonhapkho'));
        //dd($lydonhapkho);

    }
    public function them_lydonhapkho()
    {
        return view('quanlykhovattu.danhmuc.lydonhapkho.them_lydonhapkho');
    }
    public function luu_lydonhapkho(LydonhapkhoRequest $request)
    {
        Lydo_nhap::create([
            'lydo'=>$request->txt_lydo_nhapkho,
        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydonhapkho');
    }
    public function sua_lydonhapkho($id)
    {
        $lydonhapkho=Lydo_nhap::find($id);
        return view('quanlykhovattu.danhmuc.lydonhapkho.sua_lydonhapkho',compact('lydonhapkho'));
    }
    public function capnhat_lydonhapkho(LydonhapkhoRequest $request,$id)
    {
        Lydo_nhap::find($id)->update([
            'lydo'=>$request->txt_lydo_nhapkho,
        ]);
        Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydonhapkho');
    
    }
    public function xoa_lydonhapkho($id)
    {
        Lydo_nhap::find($id)->delete();
        Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydonhapkho');
    }
}
