<?php

namespace App\Models\Quanlybanhang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table='donhang';
    protected $filltable=
    [
        'id',
        'ma_user',
        'hoten_user',
        'sdt_user',
        'diachi_user',
        'ten_sp',
        'gia',
        'sl',
    ];
    use HasFactory;
}
