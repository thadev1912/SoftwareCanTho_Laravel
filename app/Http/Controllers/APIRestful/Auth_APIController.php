<?php

namespace App\Http\Controllers\APIRestful;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApiRestful\CreatePostFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use App\Models\APIRestful\Post;
use App\Models\PhanQuyen\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
class Auth_APIController extends Controller
{
    public function check_api(Request $request)
    {
     if(Auth::attempt(
       [
           'name'=>$request->username,
           'password'=>$request->pass,
           
       ]))
       {
         $user=Auth::guard()->user();
         $info= User::where('name',$request->username)->first();
         //Auth::login($info);       
         $token =  $user->createToken('MyApp')-> accessToken;       
         //$request->headers->set('X-Authorization',$token);
         return response()->json([
            'user'=>$info,
            'token'=>$token,
            'messeage'=>'Đăng nhập thành công!!!',
            'status'=>200,
         ]);
       }
       else
       {
         return response()->json([
          
           'messeage'=>'Đăng nhập thất bại!!!',
           'status'=>404,
        ]);
       }
       }
       public function check_token()
       {
         $user=Auth::guard('api')->user();
        // dd($user);
         if(Auth::guard('api')->check())
         {
         
         return response()->json([
               'user'=>$user,          
                'messeage'=>'Kết nối dữ liệu thành công!!!',
                'status'=>200,
                             ]);
          }
       else
       {
         return response()->json([
           //'user'=>$user,
          
           'messeage'=>'Chưa có token !!!',
           'status'=>505,
        ]);
       }
          
 
       }
       public function thoat_api() {
        if( Auth::guard('api')->check())
        {
        $user=Auth::guard('api')->user();
        $user->tokens()->delete();
        $token=null;
        return response()->json([
          'token'=>$token,         
          'messeage'=>'Xoá token thành công !!!',
          'status'=>200,

       ]);
      }
      else
      {
        return response()->json([
          //'user'=>$user,
         
          'messeage'=>'Bạn chưa đăng nhập !!!',
          'status'=>404,
       ]);
      }
    }
}
