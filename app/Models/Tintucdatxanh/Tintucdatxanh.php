<?php

namespace App\Models\Tintucdatxanh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintucdatxanh extends Model
{
    use HasFactory;
    protected $table='tintucdatxanh';
    protected $fillable=[
        'tieude_tintuc',
        'noidung_tintuc',
        'anhdaidien_tintuc',
        'danhmuc_tintuc',
    ];
}
