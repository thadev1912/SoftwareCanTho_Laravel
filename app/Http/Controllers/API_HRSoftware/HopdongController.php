<?php


namespace App\Http\Controllers\API_HRSoftware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Hopdong;
use App\Http\Requests\API_HRSoftware\HopdongRequest;
use DB;
class HopdongController extends Controller
{
    public function index()
    {
        try{
           $hopdong=DB::table('hopdong')->paginate(10); 
           $loaihd = DB::table('hopdong')
           ->select(DB::raw('loai_hd'))   
           ->groupBy('loai_hd')
           ->get();
           $tinhtrang = DB::table('hopdong')
           ->select(DB::raw('tinhtrang'))   
           ->groupBy('tinhtrang')
           ->get();
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'], 500);
        }        
       
        return (['hopdong'=>$hopdong,'loaihd'=>$loaihd,'tinhtrang'=>$tinhtrang]);
    }
    public function store(HopdongRequest $request)
    {       
       try{
        //dd($request->all());
       
       $hopdong=  DB::table('hopdong')->insert([
        'ma_hd'=>$request->txt_ma_hd,
         'ma_nv'=>$request->txt_ma_nv,     
         'tinhtrang'=>$request->txt_tinhtrang,
         'loai_hd'=>$request->txt_loai_hd,    
         'heso_luong'=>$request->txt_heso_luong,
         'ngayvao'=>$request->txt_ngayvao,
         'phu_cap'=>$request->txt_phucap,

         ]);    
       
    }
       catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       
      
       if($hopdong)
       {
        return response()->json([
            'data'=>$hopdong,
            'status'=>200,
            'messege'=>'Save data completed!'
           ]);
       }
    }
    public function edit($id)
   {
    try{
     $hopdong= hopdong::findorFail($id);
     
    }
    catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       if($hopdong)
       {
        return response()->json([
            'data'=>$hopdong,
            'status'=>200,
            'messege'=>'Get data completed!'
           ]);
          }
   }    
   public function update(HopdongRequest $request,$id)
    {
        try{
        $hopdong=  DB::table('hopdong')->where('id',$id)->update([
            'ma_hd'=>$request->txt_ma_hd,
            'ma_nv'=>$request->txt_ma_nv,     
            'tinhtrang'=>$request->txt_tinhtrang,
            'loai_hd'=>$request->txt_loai_hd,    
            'heso_luong'=>$request->txt_heso_luong,
            'ngayvao'=>$request->txt_ngayvao,
            'phu_cap'=>'500000',
   
             ]);   
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($hopdong)
       {
        return response()->json([
            'data'=>$hopdong,
            'status'=>200,
            'messege'=>'Update data completed!'
           ]);
          }
    } 
    public function destroy($id)
    {
        try{
         $hopdong=DB::table('hopdong')->where('id',$id)->delete();
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($hopdong)
        {
         return response()->json([
            
             'status'=>200,
             'messege'=>'Delete data completed!'
            ]);
           }
    }
}
