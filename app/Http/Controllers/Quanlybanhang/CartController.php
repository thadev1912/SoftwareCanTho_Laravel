<?php

namespace App\Http\Controllers\Quanlybanhang;
use App\Http\Controllers\Controller;
use App\Helper\Product\SanphamInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quanlybanhang\Donhang;
use App\Models\Quanlybanhang\Giohang;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $sp;
   
    public function __construct(SanphamInterface $sanpham)
    {
        $this->sp = $sanpham;
    }
 

    public function giohang(Request $request)
    {
        if(Auth::check())
        {
        $user=Auth::user()->name;        
       $request->session()->forget('cart');      
       $giohang= DB::table('product')
       ->join('giohang','product.id','=','giohang.ma_sp')
       ->select('giohang.ma_sp')
       ->where('ma_user',$user)
       ->get(); 
       $this->count_gh($request,$giohang);
       
       
           
          
       foreach($giohang as $item)
             {  
                if(!$request->session()->has('cart'))
                {
                    $cart = array();
                  array_push($cart, [
                      'product' => $this->sp->find($item->ma_sp),
                      'quantity' => 1,
                   ]);
                    $request->session()->put('cart', $cart);
                }
                else
                {   
                     $cart = $request->session()->get('cart');
                     $index = $this->exists($item->ma_sp, $cart);
                            if ($index == -1) {
                                               array_push($cart, [
                                               'product' => $this->sp->find($item->ma_sp),
                                               'quantity' => 1
                                                      ]);
                                              } 
                             else
                                             {
                                                $cart[$index]['quantity']++;
                                             }
                              $request->session()->put('cart',$cart);

                              
            
                     }
                    }
                     $data = [
                        'cart' => $request->session()->get('cart')
                    ];
                                        
        //dd($data);
        return view('quanlybanhang.chucnang.giohang')->with($data);
                }
                else
                {
                    Toastr::warning('Vui lòng kiểm tra đăng nhập!!!','Thông Báo');
                    return redirect()->route('check_login');
                }                       
        
    }
    public function count_gh(Request $request,$data)
    {
  
        $count=$data->count();
        if(isset($count))        
        {
        $request->session()->put('session_count',$count);
       
        }
    }

    public function buy($id, Request $request)
    {    
        if(Auth::check())
        { 
        $user=Auth::user()->name;        
        $data=new giohang;
        $data->ma_sp=$id;
        $data->ma_user=Auth::user()->name;           
        $data->save();
        $giohang= DB::table('product')
        ->join('giohang','product.id','=','giohang.ma_sp')
        ->select('giohang.ma_sp')
        ->where('ma_user',$user)
        ->get();
        $this->count_gh($request,$giohang) ;

        
        Toastr::success('Sản phẩm đã thêm vào giỏ hàng!!!','Thông Báo');
        return redirect()->route('shop');
        }
        else
        {
            Toastr::warning('Vui lòng đăng nhập để sử dụng mua hàng!!!','Thông Báo');
            return redirect()->route('shop');
        }
    }
    

    public function remove($id, Request $request)
    {
       
        giohang::where('ma_sp',$id)->delete();
        Toastr::success('Xóa giỏ hàng thành công!!!','Thông Báo');
        return redirect()->route('giohang');
    }

    public function update(Request $request)
    {   
        $user=Auth::user()->name;
        $quantities = $request->input('quantity');
        $cart = $request->session()->get('cart');
       
        
           for ($i = 0; $i < count($cart); $i++)   //count đếm phần tử mạng            
              {
                      $cart[$i]['quantity'] = $quantities[$i];// mỗi phần tử mạng trong quantites tương ứng số lượng sản phẩm hiện tại đang nhập                       
                      
                      
                      if($cart[$i]['quantity']>0)
                      {
                        $row=($cart[$i]['product']->id);        
                        giohang::where('ma_sp',$row)->delete();    
                                        
                        $qty=$quantities[$i];
                        //dd($row);
                        $j=0;
                        while($j<$qty)
                        {                        
                         $data=new giohang;
                         $data->ma_sp=$row;  
                         $data->ma_user=Auth::user()->name;                       
                         $data->save();
                         $j++;                       
                            
                        // $request->session()->put('cart', $cart);// chền lần lượt theo dòng $i                         
                      }
                    }
                                       
                       else
                      {
                         $row=($cart[$i]['product']->id);
                         giohang::where('ma_sp',$row)
                         ->where('ma_user',$user)
                         ->delete();                  
                      }
                }     
                Toastr::success('Cập nhật giỏ hàng thành công!!!','Thông Báo');              
              return redirect()->route('giohang');
    }
     public function payment(Request $request)
     {
        if($request->session()->has('cart'))
         {
            $cart=$request->session()->get('cart');          
         }
         else
         {
            echo "Danh sách rỗng";
         }
        return view('quanlybanhang.chucnang.thanhtoan',compact('cart'));
     }
     public function chotdeal(Request $request)
     {
       
       
        if(Auth::check())
      
        {       
            $user=Auth::user()->name;
            $hoten=Auth::user()->hoten;
            $date=Carbon::today()->toDateString();
           
            $ma_dh='DHL_'.strtoupper(Auth::user()->name).'_'.$date;// tạo hóa đơn
            
            $sdt=Auth::user()->sdt;
            $diachi=Auth::user()->diachi;    
              if($request->thanhtoan=='cash')
                    {                    
                    $cart=$request->session()->get('cart');
                    //dd($cart);
                         foreach($cart as $item)
                            {                                  
                                          $gh=new donhang;
                                          $gh->ma_dh=$ma_dh;
                                          $gh->ma_user=$user; 
                                          $gh->hoten_user=$hoten; 
                                          $gh->sdt_user=$sdt;   
                                          $gh->diachi_user=$diachi;
                                          $gh->anh_sp=$item['product']->image;                                                               
                                          $gh->ten_sp=$item['product']->name;
                                          $gh->gia=$item['product']->price;
                                          $gh->sl=$item['quantity'];                                                                        
                                          $gh->save();
                                          giohang::where('ma_sp',$item['product']->id)
                                          ->where('ma_user',$user)
                                          ->delete();
                                  
                            }
                            $request->session()->forget('session_count'); 
                            Toastr::success('Đặt hàng thành công!!!','Thông Báo');      
                        return redirect()->route('shop');
                    }
              else
                    { 
                        Toastr::warning('Kiểm tra lại phương thức thanh toán!!!','Thông Báo');
                        return redirect()->route('giohang');
                    }         
        }
        else
        {
            Toastr::warning('Vui lòng đăng nhập!!!','Thông Báo');
            return redirect()->route('check_login');
        }
    
    }
    private function exists($id, $cart)
    {
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product']->id == $id) {
                return $i;
            }
        }
        return -1;
    }
    public function donhang()
    {
        if(Auth::check())
        {
        $user=Auth::user()->name;
        $donhang=DB::table('donhang')
        ->where('ma_user',$user)
        ->get();
       
        return view('quanlybanhang.chucnang.donhang',compact('donhang'));
        }
        else
        { 
            Toastr::warning('Vui lòng đăng nhập!!!','Thông Báo');
            return redirect()->route('check_login');
        }
    }
    public function check_login()
    {
        return view('quanlybanhang.chucnang.check_login');
    }
   
   
}