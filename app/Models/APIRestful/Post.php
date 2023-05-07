<?php

namespace App\Models\APIRestful;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{  protected $table='post';
    protected $fillable=
    ([
        'id',        
        'title_post',
        'content_post',
        'danhmuc_post',
        'bien_tap',
    
    ]);
    use HasFactory;
}
