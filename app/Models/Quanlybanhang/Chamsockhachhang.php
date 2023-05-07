<?php

namespace App\Models\Quanlybanhang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamsockhachhang extends Model
{
    use HasFactory;
    protected $table='chamsockhachhang';
    protected $fillable=([
        'hoten_kh',
        'noidung_kh',
        'sdt_kh',
        'diachi_kh',
    ]);
}
