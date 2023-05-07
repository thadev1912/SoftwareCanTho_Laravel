<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;
use App\Exceptions\Handler;
use Illuminate\Http\Request;
use Exception;
class auth_api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (!Auth::guard($guard)->check()) {
              //  return redirect()->route('dangnhap')->with('thongbao','Bạn không có quyền truy cập vào trang này');
           // throw new Exception("Bạn chưa có quyền truy cập", 403);          
           return response()->json([                      
            'messege'=>'Chưa có quyền truy cập vui lòng kiểm tra lại token !!!',
            'status'=>404,
         ]);
            
            
            }
        }
       
        return $next($request);
    }
}
