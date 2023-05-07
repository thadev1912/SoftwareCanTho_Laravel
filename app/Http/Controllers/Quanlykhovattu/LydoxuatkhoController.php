<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlykhovattu\LydoxuatkhoRequest;
use App\Models\Quanlykhovattu\Lydo_xuat;
use Brian2694\Toastr\Facades\Toastr;
class LydoxuatkhoController extends Controller
{
    public function lydoxuatkho()
    {
        $lydoxuatkho=Lydo_xuat::paginate(10);
        return view('quanlykhovattu.danhmuc.lydoxuatkho.lydoxuatkho',compact('lydoxuatkho'));
        //dd($lydonhapkho);

    }
    public function them_lydoxuatkho()
    {
        return view('quanlykhovattu.danhmuc.lydoxuatkho.them_lydoxuatkho');
    }
    public function luu_lydoxuatkho(LydoxuatkhoRequest $request)
    {
        Lydo_xuat::create([
            'lydo'=>$request->txt_lydo_xuatkho,
        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydoxuatkho');
    }
    public function sua_lydoxuatkho($id)
    {
        $lydoxuatkho=Lydo_xuat::find($id);
        return view('quanlykhovattu.danhmuc.lydoxuatkho.sua_lydoxuatkho',compact('lydoxuatkho'));
    }
    public function capnhat_lydoxuatkho(LydoxuatkhoRequest $request,$id)
    {
        Lydo_xuat::find($id)->update([
            'lydo'=>$request->txt_lydo_xuatkho,
        ]);
        Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydoxuatkho');
    
    }
    public function xoa_lydoxuatkho($id)
    {
        Lydo_xuat::find($id)->delete();
        Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
        return redirect()->route('lydoxuatkho');
    }
}

