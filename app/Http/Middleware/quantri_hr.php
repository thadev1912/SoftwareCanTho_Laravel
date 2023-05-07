<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Closure;
use Illuminate\Http\Request;

class quantri_hr
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()&&(Auth::user()->permision==2))
        {
         return $next($request);
        }
        return redirect()->route('dangnhap')->with('thongbao','Bạn không có quyền truy cập vào trang này');
    }
}
