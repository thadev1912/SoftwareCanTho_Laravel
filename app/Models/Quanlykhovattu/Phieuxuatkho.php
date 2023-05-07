<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieuxuatkho extends Model
{
    use HasFactory;
    protected $table='phieuxuatkho';
    protected $fillable=[
        'id',
        'ma_phieu',
        'ngay_xuat',
        'id_thukho',
        'id_nhanvien',
        'id_lydo',
    ];
}
