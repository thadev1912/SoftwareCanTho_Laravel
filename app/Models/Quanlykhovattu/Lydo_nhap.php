<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lydo_nhap extends Model
{
    use HasFactory;
    protected $table='lydo_nhaphang';
    protected $fillable =[
        'id',
       'lydo',
    ];
}
