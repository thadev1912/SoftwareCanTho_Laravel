<?php

namespace App\Http\Controllers\APIRestful;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Connect_APIController extends Controller
{ 
    public function post_api()
     {
        return view('api.post_api');
     }
   public function free_api()
   {
      return view('api.free_api');
   }
   public function nhanvien_api()
   {
      return view('api.nhanvien_api');
   }
   public function bangchamcong_api()
   {
      return view('api.bangchamcong_api');
   }
}
