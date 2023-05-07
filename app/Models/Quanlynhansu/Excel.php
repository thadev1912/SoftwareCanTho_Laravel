<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{   
    use HasFactory;
    protected $table='excel';
    protected $fillable=
    [
        'id',
        'name', 
        'email',
         'age',


    ];
   
}
