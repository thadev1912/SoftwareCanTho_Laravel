<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
    protected $table='Kho_banhang';
    protected $fillable =[
        'id',
        'ma_kho',
        'ten_kho',
        'dia_chi',
        'so_dien_thoai',
        'ghi_chu',

    ];
}
