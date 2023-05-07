<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donvitinh extends Model
{
    use HasFactory;
    protected $table='donvitinh';
    protected $fillable =[
        'id',
       'donvitinh',
    ];
}
