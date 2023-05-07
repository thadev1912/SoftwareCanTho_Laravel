<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyluat extends Model
{
   
    use HasFactory;
    protected $table='kyluat';
    protected $filltable=
    [
           'id',
           'ma_nv',
           'sotien',
           'ngay_kyluat',
           'lydo',
    ];
}
