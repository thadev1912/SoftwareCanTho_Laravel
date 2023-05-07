<?php

namespace App\Http\Controllers\PhanQuyen;
use App\Http\Controllers\Controller;
use App\Models\PhanQuyen\Role;
use App\Models\PhanQuyen\Role_Permission;
use App\Models\PhanQuyen\User_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Brian2694\Toastr\Facades\Toastr;
class RoleController extends Controller
{
    public function role()
    {
       $data=Role_Permission::all(); 
      
       return view('phanquyen.role',compact('data'));
    }
    public function add_role(Request $request)
     {
         $permission=[]; 
         $routes=Route::getRoutes();  
     
      foreach($routes as $route)
      {
          array_push($permission,$route->getName());
      }
    //dd(json_encode($permission));     
       return view('phanquyen.add_role',compact('permission'));
       
     }
     public function timkiem_route()
     {
      $routes=Route::getRoutes();  
      dd($routes);
     }
     public function luu_role(Request $request)
      { 
       
        //dd($request->all());
       $info=$request->ten_quyen;       
       $routes=json_encode($request->route);    
       Role_Permission::create([
            'role_name'=>$request->ten_quyen,
            'permissions'=>$routes,
        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
       return redirect()->route('role');
      }
      public function chitiet_role($id)
        {
           $data=Role_Permission::find($id);          
             $permission=[];
             $results=json_decode($data->permissions);
             
             foreach($results as $result)
                {
                  if(!in_array($result,$permission))
                     {
                      array_push($permission,$result);
                     }
                    // dd($permission);
                }
                return view('phanquyen.chitiet_role',compact('permission','data'));
        }
        public function chinhsua_role($id)
        {
          $data=Role_Permission::find($id);  
          $all_route=[]; 
          $routes=Route::getRoutes(); 
      
       foreach($routes as $route)
       {
           array_push($all_route,$route->getName());
       }  
         
          $permission=[];         
          $results=json_decode($data->permissions);  
               
          foreach($results as $result)
             {
               if(!in_array($result,$permission))
                  {
                   array_push($permission,$result);
                  }
                  
             }
             return view('phanquyen.chinhsua_role',compact('all_route','permission','data'));
        }
        public function capnhat_role(Request $request,$id)
             {
              
                $tenquyen=$request->ten_quyen;
                $routes=json_encode($request->route);  
                Role_Permission::find($id)->update([
                'role_name'=>$tenquyen,
                'permissions'=>$routes,
                ]);
                Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
                return redirect()->route('role');
             }
      public function xoa_role($id)
        {
          Role_Permission::find($id)->delete();
          User_Role::where('role_name',$id)->delete();
          Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
          return redirect()->route('role');
        }
     
     
}
