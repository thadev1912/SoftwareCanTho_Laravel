<?php

namespace App\Models\PhanQuyen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{   protected $table='roles';
    protected $fillable=
    [
        'id',
        'role_name',
    ];
    use HasFactory;
    public function permissions()
     {
        return $this->belongsToMany(Permission::class);
     }
}
