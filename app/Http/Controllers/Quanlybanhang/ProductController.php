<?php

namespace App\Http\Controllers\Quanlybanhang;
use App\Http\Controllers\Controller;
use App\Helper\Product\SanphamInterface;
use App\Models\Quanlybanhang\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Quanlybanhang\ProductRequest;
use DB;
use Brian2694\Toastr\Facades\Toastr;
class ProductController extends Controller
{
    protected $sp;

    public function __construct(SanphamInterface $sanpham)
    {
        $this->sp = $sanpham;
    }

    public function sanpham()
    {
        $data = [
            'products' => $this->sp->findAll(),
            'canthos'=>$this->sp->find_duan_cantho(),
            'haugiangs'=>$this->sp->find_duan_haugiang(),
            'soctrangs'=>$this->sp->find_duan_soctrang(),
        ];
    //dd($data);
        return view('quanlybanhang.danhmuc.sanphambanhang.sanpham')->with($data);
    }
    public function quanlysanpham()
    {
        $sanpham=Product::paginate(10);
        return view('quanlybanhang.danhmuc.sanphambanhang.quanlysanpham',compact('sanpham'));
        //dd($data);
    }
    public function them_sanpham()
    {
        $danhmuc = DB::table('product')
        ->select(DB::raw('danhmuc'))   
        ->groupBy('danhmuc')
        ->get();
        //dd($danhmuc);
        return view('quanlybanhang.danhmuc.sanphambanhang.them_sanpham',compact('danhmuc'));
    }
    public function luu_sanpham(ProductRequest $request)
    {
        //dd($request->all());
      $hinh=$request->has('image');
      $hinh1=$request->has('txt_image1');
      $hinh2=$request->has('txt_image2');
      $hinh3=$request->has('txt_image3');
      $hinh4=$request->has('txt_image4');
        if($hinh)
        {
            $hinh=$request->image;            
            $getname=$hinh->getClientoriginalName(); 
            $hinh->move(public_path('cart/img/products'),$getname); 
        }       
        if($hinh1)
        {
            $hinh1=$request->txt_image1;            
            $getname1=$hinh1->getClientoriginalName(); 
            $hinh1->move(public_path('cart/img/products'),$getname1);
        }       
        if($hinh2)
        {
            $hinh2=$request->txt_image2;            
            $getname2=$hinh2->getClientoriginalName(); 
            $hinh2->move(public_path('cart/img/products'),$getname2); 
        }       
        if($hinh3)
        {
            $hinh3=$request->txt_image3;            
            $getname3=$hinh3->getClientoriginalName(); 
            $hinh3->move(public_path('cart/img/products'),$getname3); 
        }       
        if($hinh4)
        {
            $hinh4=$request->txt_image4;            
            $getname4=$hinh4->getClientoriginalName(); 
            $hinh4->move(public_path('cart/img/products'),$getname4); 
        }
        else
        {
            $name_other='blank_avatar.png';
        }
        //dd($getname);
        Product::create([
        'name'=>$request->txt_name,
        'price'=>$request->txt_price,     
        'danhmuc'=>$request->txt_danhmuc,
        'hot_sales'=>$request->txt_hot_sales,
        'noidung_sp'=>$request->txt_noidung_sp,
        'image'=>$hinh?$getname:$name_other,        
        'chitiet_image1'=>$hinh1?$getname1:$name_other,
        'chitiet_image2'=>$hinh2?$getname2:$name_other,
        'chitiet_image3'=>$hinh3?$getname3:$name_other,
        'chitiet_image4'=>$hinh4?$getname4:$name_other,
        ]);
        Toastr::success('Thêm mới thông tin thành công!!!','Thông Báo');
        return redirect()->route('quanlysanpham');
    }
    public function sua_sanpham($id)
    { 
        //code hot_sales
        $hot = DB::table('product')
        ->where('id',$id)
        ->select(DB::raw('hot_sales'))   
        ->groupBy('hot_sales')
        ->first();
        //code danh muc
        $danhmuc = DB::table('product')
        
        ->select(DB::raw('danhmuc'))   
        ->groupBy('danhmuc')
        ->get();
        $sanpham=Product::find($id);
        return view('quanlybanhang.danhmuc.sanphambanhang.sua_sanpham',compact('sanpham','hot','danhmuc'));
    }
    public function capnhat_sanpham(ProductRequest $request,$id)
    {
     //dd($request->all());
      $hinh=$request->has('image');
      $hinh1=$request->has('txt_image1');
      $hinh2=$request->has('txt_image2');
      $hinh3=$request->has('txt_image3');
      $hinh4=$request->has('txt_image4');
        if($hinh)
        {
            $hinh=$request->image;            
            $getname=$hinh->getClientoriginalName(); 
            $hinh->move(public_path('cart/img/products'),$getname); 
        }   
        else
        {
            $getname=$request->txt_image;
        }    
        if($hinh1)
        {
            $hinh1=$request->txt_image1;            
            $getname1=$hinh1->getClientoriginalName(); 
            $hinh1->move(public_path('cart/img/products'),$getname1); 
        } 
        else
        {
            $getname1=$request->txt_chitiet_image1;
        }         
        if($hinh2)
        {
            $hinh2=$request->txt_image2;            
            $getname2=$hinh2->getClientoriginalName(); 
            $hinh2->move(public_path('cart/img/products'),$getname2); 
        } 
        else
        {
            $getname2=$request->txt_chitiet_image2;
        }         
        if($hinh3)
        {
            $hinh3=$request->txt_image3;            
            $getname3=$hinh3->getClientoriginalName(); 
            $hinh3->move(public_path('cart/img/products'),$getname3); 
        }   
        else
        {
            $getname3=$request->txt_chitiet_image3;
        }       
        if($hinh4)
        {
            $hinh4=$request->txt_image4;            
            $getname4=$hinh4->getClientoriginalName(); 
            $hinh4->move(public_path('cart/img/products'),$getname4); 
        }
        else
        {
            $getname4=$request->txt_chitiet_image4;
        }
        Product::find($id)->update([
            'name'=>$request->txt_name,
            'price'=>$request->txt_price,     
            'danhmuc'=>$request->txt_danhmuc,
            'hot_sales'=>$request->txt_hot_sales,
            'noidung_sp'=>$request->txt_noidung_sp,
            'image'=>$getname,        
            'chitiet_image1'=>$getname1, 
            'chitiet_image2'=>$getname2, 
            'chitiet_image3'=>$getname3, 
            'chitiet_image4'=>$getname4, 
            ]);
            Toastr::success('Cập nhật thông tin thành công!!!','Thông Báo');
            return redirect()->route('quanlysanpham');
    }
    public function xoa_sanpham($id)
    {
        Product::find($id)->delete();
        Toastr::success('Xóa thông tin thành công!!!','Thông Báo');
        return redirect()->route('quanlysanpham');
    }
    public function timkiem_sanpham(Request $res)
     {
        $search=$res->get('search');
        //dd($search);
        $data = [
            'timkiem' => $this->sp->timkiem_sanpham($search),
           
        ];      
        if($data)
        {
      return response()->json([
        'data'=>$data,
        'status'=>200,
        'messeage'=>"Lấy dữ liệu thành công!!!"
      ]);



     }
     else
     {
             return response()->json([
            'data'=>null,
            'status'=>400,
            'messeage'=>"Lỗi!!!"
          ]);
     }
     }
     public function chitiet_sanpham($id)
     {
        
        $data= $this->sp->chitiet_sanpham($id) ;
       //dd($data);
        return view('quanlybanhang.chucnang.chitietsanpham',compact('data'));
           
        
     }
}