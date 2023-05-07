<?php

namespace App\Models\APIRestful;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mypost extends Model
{
    protected $table='mypost';
    protected $fillable=
    [
        'id_baiviet',
        'tieude_baiviet',
        'noidung_baiviet',
        'danhmuc_baiviet',
    ];
    use HasFactory;
}
