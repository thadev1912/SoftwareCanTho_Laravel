<?php

namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baohiem extends Model
{ 
    protected $table='baohiem';
    protected $filltable=[
                'id',
                'ma_bhxh',
                'loai_bhxh',
                'ngaycap',
                'ngayhethan',
                'noicap',
                'tiendong_bhxh',


    ];
    use HasFactory;
}
