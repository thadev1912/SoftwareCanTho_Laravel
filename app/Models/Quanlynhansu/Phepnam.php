<?php


namespace App\Models\Quanlynhansu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phepnam extends Model
{
    use HasFactory;
    protected $table='phepnam';
    protected $fillable=
    [
        'id',
        'ma_nv',
        'ngay_batdau',        
        'phepnam_dadung',
        'ngay_ketthuc',
      
    ];
    use HasFactory;
}
