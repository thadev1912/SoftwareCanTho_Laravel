<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lydo_xuat extends Model
{
    use HasFactory;
   
    protected $table='lydo_xuat';
    protected $fillable =[
        'id',
       'lydo',
    ];
}
