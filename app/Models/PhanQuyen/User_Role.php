<?php

namespace App\Models\PhanQuyen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    use HasFactory;
    protected $table='role_user';
    protected $fillable=([
         'name',
         'role_name',

                      ]);
  public function get_role()
     {
           return $this->hasOne(Role_Permission::class,'id','role_name');
     }
               
}
