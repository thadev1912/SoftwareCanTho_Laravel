<?php

namespace App\Models\Quanlybanhang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{ 
    protected $table='giohang';
    protected $filltable=
    [
        'id',
        'anh_sp',
        'ten_sp',
        'gia_sp',
        'soluong_sp',
        'thanhtien_sp',
        'tonggiatien_sp',
        'tongsl_sp',
    ];
    use HasFactory;
    
}
