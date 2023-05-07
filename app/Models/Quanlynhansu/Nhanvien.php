<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;
    protected $table='nhanvien';
    protected $fillable= [
              'id',
               'ma_nv',                
               'hoten_nv',            
               'diachi_nv',
               'gioitinh_nv',
               'anhdaidien',
               'ma_pb',
               'ma_cv',
               'sdt_nv',                
               'trinhdo_nv',
               'chuyennganh_nv',
               'trangthai_nv', 
               'ngaysinh_nv',
               'cccd_nv',  
    ];
    public function info()
    {
        return $this->hasOne(Email::class,'ma_email','ma_email'); //parameter số 1 là khóa ngoại liên kết bên ngoài của table user
                                                                  //paramater số 2 là trường để so với table chính cần so sánh
    }
    public function hopdong()
    {
        return $this->hasOne(hopdong::class,'ma_nv','ma_nv'); //parameter số 1 là khóa ngoại liên kết bên ngoài của table user
                                                                  //paramater số 2 là trường để so với table chính cần so sánh
    }
   public function belongto()
     {
        return $this->belongsToMany(Phongban::class,'ma_pb','ma_pb');
     }
}
