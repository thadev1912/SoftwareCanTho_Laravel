<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phongban extends Model
{
    protected $table="phongban";
    protected $filltable=[
        'id',
        'ma_pb',
        'ten_pb',

    ];
    use HasFactory;
   public function phongban()
     {
        return $this->hasMany(Nhanvien::class,'ma_pb','ma_pb');
     }
}
