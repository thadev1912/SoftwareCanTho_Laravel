<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vattu extends Model
{
    use HasFactory;
    protected $table='Vattu_banhang';
    protected $fillable =[
        'id',
        'ma_vattu',
        'ten_vattu',
        'dvt_vattu',
        'soluong',
       

    ];
}
