<?php
namespace App\Http\Controllers\PhanQuyen;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Quanlybanhang\CartController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\PhanQuyen\DangkyRequest;
use App\Models\PhanQuyen\User;
use App\Models\PhanQuyen\Post;
use App\Models\PhanQuyen\Role;
use App\Models\PhanQuyen\User_Role;
use App\Models\PhanQuyen\Role_Permission;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class AdminController extends Controller
{
  private $get;
  protected $redirectTo;
  public function __construct(CartController $cart)
    {
        $this->get=$cart;
    }
  
    
    public function dangnhap()
      {
        
        return view('phanquyen.dangnhap');
      }
      public function dangky()
      {
        return view('phanquyen.dangky');
      }
    public function xulydangky(DangkyRequest $request)
     {
       $user=new User;
       $user->name=$request->username;
       $user->hoten=$request->hoten;
       $user->sdt=$request->sdt;
       $user->diachi=$request->diachi;
       $user->email=$request->email;
       $user->password=bcrypt($request->pass);    
       $user->avatar='avatar.png';     
       $user->save();
      
       //dd($user); 
       Toastr::success('Đã Đăng Ký thành công!!!','Thông Báo');      
       return redirect()->route('dangnhap');
     }
     public function xulydangnhap(Request $request)
      {      
        $remember_token = $request->has('remember_me') ? true : false;  
                
        if(Auth::attempt(
            [
                'name'=>$request->username,
                'password'=>$request->pass,
                
            ],$remember_token))
            
               
                {   
                    //xử lý session_count
                    $name=Auth::user()->name;               
                    $giohang= DB::table('product')
                    ->join('giohang','product.id','=','giohang.ma_sp')
                    ->select('giohang.ma_sp')
                    ->where('ma_user',$name)
                    ->get();  
                    $this->get->count_gh($request,$giohang);                 
                    Toastr::success('Đăng nhập thành công!!!','Thông Báo');
                    return redirect()->route('gioithieu'); 
                    
                    
               }
                
               return redirect()->route('dangnhap')->with('thongbao','Tài khoản và mật khẩu chưa đúng!!!');   
            }
                 

     
            
            public function login_api(Request $request)
            {

              if(Auth::attempt(
                [
                  'name'=>$request->username,
                  'password'=>$request->pass,
                    
                ])) 
                 {           
                   $user=Auth::guard('api')->user();                                             
                   $token = $user->createToken('hr')->accessToken;                 
                    return response()->json([                    
                     'user'=>$user,                   
                     'token'=>$token,
                     'status'=>200,
                     'message'=>'Đăng nhập thành công!!!',
                    ]);
                 }
                 else
                 {
                  return response()->json([
                   
                     'status'=>404,
                     'message'=>'Đăng nhập thất bại!!!',

                    ]);
                 }
            }
            public function detail()
             {
              if(Auth::guard('api')->check())
               {
                $info=Auth::guard('api')->user(); 
               }
             
             
        //cách return đúng kiểu json:
        if($info)
        {
                return response()->json([
                'data'=>$info,
                 'status'=>200,
                 'messege'=>'thành công',
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
        public function thoat(Request $request)
           {
             Auth::logout();
             $request->session()->forget('session_count'); 
             Toastr::success('Đăng xuất thành công!!!','Thông Báo');
             return redirect()->route('gioithieu');

           }    
          public function list_user()
           {
               $data=User::paginate(10); 
               //dd($data);           
               return view('phanquyen.list_user',compact('data'));
           }

       public function add_user_role($id)
            {
              $info=User::where('id',$id)->first();
              $data=User_Role::where('name',$id)
              ->join('permission_role','role_user.role_name','=','permission_role.id')
              ->get();              
              //dd($data);    
              return view('phanquyen.add_user_role',compact('data','info'));
            }
       public function luu_user_role(Request $request)
            {
                           
              //dd($request->all());
              //load dữ liệu của id_user    
               $name=$request->txt_taikhoan; 
               $result1=User::where('name',$name)->first();
               $id_user=$result1->id;
               //load dữ liệu của id_user  
                $checkbox=$request->input('txt_checkbox');
                $result2=Role_Permission::where('role_name',$checkbox)->first();
                $id_role=$result2->id;              
                
             // $roles=json_encode($request->role);
               User_Role::create([
                          'name'=>$id_user,
                          'role_name'=>$id_role,
    
                               ]);
    
            }  
            public function them_quyen($id)
             {
              $data=Role_Permission::all();
              //dd($data);   
              $info=User::find($id);
                         
              $get_checked=$info->getPermissions->pluck('role_name')->toArray(); //quét các checkbox đã chọn trong user đó
              //dd($get_checked);
               return view('phanquyen.themquyen',compact('data','get_checked','info'));
             } 
             public function capnhat_quyen(Request $request,$id)
             {
              $user_id=$id;
           
            
              if(is_array($request->role))
              {
                User_Role::where('name',$id)->delete();
                    foreach($request->role as $rs)
                        {
                            User_Role::create([
                            'name'=>$id,
                            'role_name'=>$rs,
                          ]);
                        }
              
               }
               Toastr::success('Cập nhật quyền thành công!!!','Thông Báo');
                return redirect()->route('add_user_role',$id);
             }  
             public function xoa_user($id)
             {
             User::find($id)->delete();
             Toastr::success('Xóa user thành công!!!','Thông Báo');
             return redirect()->route('list_user',$id);
             }
          

}
