<?php

namespace App\Http\Controllers\APIRestful;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRestful\CreatePostFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Models\APIRestful\Post;
use App\Models\PhanQuyen\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;



class PostAPIController extends Controller
{
     
   public function index()
     {
               $data=Post::all(); 
      
        if($data)
        {
                return response()->json([
                'data'=>$data,
                 'status'=>200,
                 'messege'=>'thành công',
                ]);
                }
        else
        {
                return response()->json([
                 'data'=>null,   
                 'stats'=>404,
                 'messege'=>'Kết nối thất bại',
                ]);
        }
     }
     public function store(CreatePostFormRequest $request)
     {
      $data=Post::create([        
        'title_post'=>$request->title_post,
        'content_post'=>$request->content_post,
        'danhmuc_post'=>$request->danhmuc_post,
        'bien_tap'=>$request->bien_tap,
      ]);
      //dd($data);
      if($data)
      {
        return response()->json([
        'data'=>$data,
        'status'=>true,
        'messege'=>'Thêm bài viết thành công!!!',      
        ]);
      }
      else
      {
        return response()->json([
          'status' => false,
          'msg' =>'Vui lòng kiểm tra lại',        
          ]);
      }
      }
    
     public function edit($id)
      {
        $data=Post::find($id);
        if($data)
        {
                return response()->json([
                'data'=>$data,
                 'status'=>200,
                 'messege'=>'Cập nhật thông tin thành công!!!',
                ]);
                }
        else
        {
                return response()->json([
                 'data'=>null,   
                 'stats'=>404,
                 'messege'=>'kết nối lỗi rồi đó',
                ]);
        }

      }
    
      public function update(Request $request,$id)
       {
        $data=Post::find($id)->update([            
            'title_post'=>$request->title_post,
            'content_post'=>$request->content_post,
            'danhmuc_post'=>$request->danhmuc_post,
            'bien_tap'=>$request->bien_tap,
          ]);
 
          if($data)
          {
              return response()->json([
              'data'=>$data,
              'status'=>200,
              'messege'=>'Đã cập nhật dữ liệu thành công!!!',
              ]);
          }
          else
         {
            return response()->json([
                'data'=>null,
                'status'=>400,
                'messege'=>'Vui lòng kiểm tra lại!!!',
                ]);
         }
       }
       public function destroy($id)
        {
           $data=Post::find($id)->delete();
           if($data)
              {
                return response()->json([
                    'data'=>$data,
                    'status'=>200,
                    'messege'=>'Đã xóa thông tin thành công!!!',
                ]);
              }
            else
            {
                return response()->json([
                    'data'=>$data,
                    'status'=>404,
                    'messege'=>'Vui lòng kiểm tra lại!!!',
                ]);
            }
        }
    
}
