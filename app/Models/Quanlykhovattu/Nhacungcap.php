<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    use HasFactory;
    protected $table='Nhacc_banhang';
    protected $fillable =[
        'id',
        'ma_nhacc',
        'ten_nhacc',
        'diachi_nhacc',
       
    ];
}
