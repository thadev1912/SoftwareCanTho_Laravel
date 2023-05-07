<?php

namespace App\Http\Controllers\APIRestful;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Dulieuchamcong;
use DB;
class BangchamcongAPIController extends Controller
{
    public function bangchamcong(Request $request)
    {    
          
           
              $result=  DB::table('dulieuchamcong')
              -> join('nhanvien','dulieuchamcong.ma_nv','=','nhanvien.ma_nv')               
              ->select('dulieuchamcong.*','nhanvien.*')          
              ->paginate(10);
              //dd($result);
              if($result)
              {
             return response()->json([
              'data'=>$result,
              'status'=>200,
              'messege'=>'Lấy dữ liệu thành công!!!'
             
             ]);
            }
             else
             {
              return response()->json([
              'data'=>'$result',
              'status'=>404,
              'messege'=>'Vui lòng kiểm tra lại!!!'
             
             ]);
              
             }
          
          
         
           }
}
