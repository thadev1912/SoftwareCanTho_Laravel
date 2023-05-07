<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopdong extends Model
{
    protected $table='hopdong';
    protected $fillable=[
        'id',
         'ma_nv',
        'ma_hd',
        'ma_cv',
        'ma_pb',
        'heso_luong',
        'ngayvao',
        'phu_cap',
    ];
    use HasFactory;
    public function get_nhanvien()
    {
       return $this->hasOne(Nhanvien::class,'ma_nv','ma_nv');
    }
}
