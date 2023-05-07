<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietxuatkho extends Model
{
    use HasFactory;
    protected $table='Chitietxuatkho';
    protected $fillable =[
        'id',
        'id_phieuxuat',
        'id_vattu',
        'sl_vattu',
          
      ];
     
}
