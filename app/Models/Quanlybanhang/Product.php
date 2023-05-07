<?php

namespace App\Models\Quanlybanhang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $table='product';
    protected $fillable=
    [
        'id',
        'name',
        'price',
        'image',
        'chitiet_image1',
        'chitiet_image2',
        'chitiet_image3',
        'chitiet_image4',
         'danhmuc',
         'hot_sales',
         'noidung_sp',
         'views'

    ];
    use HasFactory;
}
