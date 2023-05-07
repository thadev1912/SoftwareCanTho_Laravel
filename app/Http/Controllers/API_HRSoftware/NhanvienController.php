<?php

namespace App\Http\Controllers\API_HRSoftware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Nhanvien;
use App\Models\Quanlynhansu\Hopdong;
use App\Models\Quanlynhansu\Phongban;
use App\Models\Quanlynhansu\Baohiem;
use App\Models\Quanlynhansu\Chucvu;
use App\Http\Requests\API_HRSoftware\NhanvienRequest;
use DB;
class nhanvienController extends Controller
{
    public function index()
    {
        try{
           $nhanvien=DB::table('nhanvien')->paginate(20); 
           $trinhdo = DB::table('nhanvien')
           ->select(DB::raw('trinhdo_nv'))   
           ->groupBy('trinhdo_nv')
           ->get();  
           $trangthai = DB::table('nhanvien')
           ->select(DB::raw('trangthai_nv'))   
           ->groupBy('trangthai_nv')
           ->get();  
           $chucvu=DB::table('chucvu')           
           ->get();
           $phongban=DB::table('phongban')           
           ->get();
          
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'], 500);
        }        
       
        return (['nhanvien'=>$nhanvien,'trinhdo'=>$trinhdo,'trangthai'=>$trangthai,'phongban'=>$phongban,'chucvu'=>$chucvu]);
    }
    public function store(NhanvienRequest $request)
    {       
       try{
        //dd($request->all());
       $nhanvien=  DB::table('nhanvien')->insert([
        'ma_nv'=>$request->txt_ma_nv,
        'hoten_nv'=>$request->txt_hoten_nv,
        'diachi_nv'=>$request->txt_diachi_nv,
        'gioitinh_nv'=>$request->txt_gioitinh_nv,
        'sdt_nv'=>$request->txt_sdt_nv ,
        'anhdaidien'=>$request->txt_gioitinh_nv,
        'ma_pb'=>$request->txt_ma_pb,
        'ma_cv'=>$request->txt_ma_cv,
         'trinhdo_nv'=>$request->txt_trinhdo_nv,
        'chuyennganh_nv'=>$request->txt_chuyennganh_nv,
        'trangthai_nv'=>$request->txt_trangthai_nv,
        'ngaysinh_nv'=>$request->txt_ngaysinh_nv,
        'cccd_nv'=>$request->txt_cccd_nv,
         ]);    
       
    }
       catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       
      
       if($nhanvien)
       {
        return response()->json([
            'data'=>$nhanvien,
            'status'=>200,
            'messege'=>'Save data completed!'
           ]);
       }
    }
    public function edit($id)
   {
    try{
     $nhanvien= nhanvien::findorFail($id);
     
    }
    catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       if($nhanvien)
       {
        return response()->json([
            'data'=>$nhanvien,
            'status'=>200,
            'messege'=>'Get data completed!'
           ]);
          }
   }    
   public function update(NhanvienRequest $request,$id)
    {
        try{
            $nhanvien=  DB::table('nhanvien')->where('id',$id)->update([
                'ma_nv'=>$request->txt_ma_nv,
                'hoten_nv'=>$request->txt_hoten_nv,
                'diachi_nv'=>$request->txt_diachi_nv,
                'gioitinh_nv'=>$request->txt_gioitinh_nv,
                'sdt_nv'=>$request->txt_sdt_nv ,
                'anhdaidien'=>$request->txt_gioitinh_nv,
                'ma_pb'=>$request->txt_ma_pb,
                'ma_cv'=>$request->txt_ma_cv,
                 'trinhdo_nv'=>$request->txt_trinhdo_nv,
                'chuyennganh_nv'=>$request->txt_chuyennganh_nv,
                'trangthai_nv'=>$request->txt_trangthai_nv,
                'ngaysinh_nv'=>$request->txt_ngaysinh_nv,
                'cccd_nv'=>$request->txt_cccd_nv,
             ]); 
            
               
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($nhanvien)
       {
        return response()->json([
            'data'=>$nhanvien,
            'status'=>200,
            'messege'=>'Update data completed!'
           ]);
          }
    } 
    public function destroy($id)
    {
        try{
         $nhanvien=DB::table('nhanvien')->where('id',$id)->delete();
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($nhanvien)
        {
         return response()->json([
            
             'status'=>200,
             'messege'=>'Delete data completed!'
            ]);
           }
    }
    public function listNhanvien(Request $req)
    {
        
        //dd($search);
        try
        {         
           
                $listNhanvien=DB::table('nhanvien')
                ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
                ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
                ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv') 
                ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.tinhtrang')  
                 
                ->paginate(10);
            
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($listNhanvien)
        {
         return response()->json([
            'data'=>$listNhanvien,
             'status'=>200,
             'messege'=>'Get data completed!'
            ]);
           }
      
    }
    public function searchNhanvien(Request $req)
    {
        try{
            $search=$req->get('search');  
           
            //dd($search);     
            $searchNhanvien=DB::table('nhanvien')
            ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
            ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv')
            ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv') 
            ->select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.tinhtrang')  
            ->where('nhanvien.hoten_nv','like',"%".$search."%")->get();  
            if($searchNhanvien) 
            return response()->json([
                'data'=>$searchNhanvien,
                 'status'=>200,
                 'search'=>$search,
                 'messege'=>'Search data completed!'
                ]);        
        
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
           
    }
    public function detailNhanvien($id)
    {
        try
        {
            $detailNhanvien= DB::table('nhanvien')           
            ->   join('hopdong','nhanvien.ma_nv','=','hopdong.ma_nv')
             ->   join('baohiem','nhanvien.ma_nv','=','baohiem.ma_nv')
             ->   join('phongban','nhanvien.ma_pb','=','phongban.ma_pb')
             ->   join('chucvu','nhanvien.ma_cv','=','chucvu.ma_cv') 
             ->   select('nhanvien.*','phongban.ten_pb','chucvu.ten_cv','hopdong.ma_hd','hopdong.ngayvao',
                   'hopdong.tinhtrang','hopdong.loai_hd','baohiem.ma_bhxh','baohiem.loai_bhxh')           
            ->   where('nhanvien.id',$id) ->first();           
            //dd($detailNhanvien);
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }

        if($detailNhanvien)
        {
         return response()->json([
            'data'=>$detailNhanvien,
             'status'=>200,
             'messege'=>'Get data completed!'
            ]);
           }
    }


    
}
