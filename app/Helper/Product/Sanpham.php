<?php

namespace App\Helper\Product;
use Illuminate\Http\Request;
use App\Models\Quanlybanhang\Product;
use App\Models\Quanlybanhang\Giohang;

class Sanpham implements SanphamInterface
{
    public function findAll()
    {
        return Product::get();
    }

    public function find($id)
    {
        return Product::find($id);
    }
    public function findAll_gh()
    {
        return Giohang::get();
    }
    
    public function find_gh($id)
    {
        return Giohang::find($id);
    }
    public function find_duan_cantho()
    {
      return Product::where('danhmuc','DỰ ÁN CẦN THƠ')->get();
    }
    public function find_duan_haugiang()
    {
      return Product::where('danhmuc','DỰ ÁN HẬU GIANG')->get();
    }
    public function find_duan_soctrang()
    {
      return Product::where('danhmuc','DỰ ÁN SÓC TRĂNG')->get();
    }
    public function timkiem_sanpham($search)
    {      
      return Product::where('name', 'like','%'.$search.'%')->get();
    }
    public function chitiet_sanpham($id)
    {
      return Product::where('id', $id)->first();
    }
    

}