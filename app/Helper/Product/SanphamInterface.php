<?php

namespace App\Helper\Product;
use Illuminate\Http\Request;
interface SanphamInterface
{
    public function findAll();
    
    public function find($id);
   
    public function findAll_gh();
    public function find_gh($id);
    public function find_duan_cantho();
    public function find_duan_haugiang();
    public function find_duan_soctrang();
    public function timkiem_sanpham($search);
    public function chitiet_sanpham($id);
}