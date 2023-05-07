<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chucvu extends Model
{
    protected $table='chucvu';
    protected $filltable=
    [
        'id',
        'ma_cv',
        'ten_cv',
    ];
    use HasFactory;
}
