<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thukho extends Model
{
    use HasFactory;
    protected $table='Nhanvien_banhang';
    protected $fillable =[
        'id',
        'ma_nhanvien',
        'ten_nhanvien',
        'tinhtrang',
    ];
}
