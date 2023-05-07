<?php

namespace App\Http\Controllers\API_HRSoftware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Baohiem;
use App\Http\Requests\API_HRSoftware\BaohiemRequest;
use DB;
class BaohiemController extends Controller
{
    public function index()
    {
        try{
           $baohiem=DB::table('baohiem')->paginate(10);
           $loai_bhxh = DB::table('baohiem')
           ->select(DB::raw('loai_bhxh'))   
           ->groupBy('loai_bhxh')
           ->get(); 
           $noikham = DB::table('baohiem')
           ->select(DB::raw('noikham'))   
           ->groupBy('noikham')
           ->get(); 
           $noicap = DB::table('baohiem')
           ->select(DB::raw('noicap'))   
           ->groupBy('noicap')
           ->get(); 
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'], 500);
        }        
       
        return (['baohiem'=>$baohiem,'noikham'=>$noikham,'noicap'=>$noicap,'loai_bhxh'=>$loai_bhxh]);
    }
    public function store(BaohiemRequest $request)
    {       
       try{
        //dd($request->all());
       $baohiem=  DB::table('baohiem')->insert([
        'ma_bhxh'=>$request->ma_bhxh,
        'ma_nv'=>$request->ma_nv,
        'loai_bhxh'=>$request->loai_bhxh,
        'ngaycap'=>$request->ngaycap,
        'ngayhethan'=>$request->ngayhethan,
        'noicap'=>$request->noicap,
        'noikham'=>$request->noikham,
        'tiendong_bhxh'=>$request->tiendong_bhxh,
         ]);    
       
    }
       catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       
      
       if($baohiem)
       {
        return response()->json([
            'data'=>$baohiem,
            'status'=>200,
            'messege'=>'Save data completed!'
           ]);
       }
    }
    public function edit($id)
   {
    try{
     $baohiem= baohiem::findorFail($id);
     
    }
    catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       if($baohiem)
       {
        return response()->json([
            'data'=>$baohiem,
            'status'=>200,
            'messege'=>'Get data completed!'
           ]);
          }
   }    
   public function update(BaohiemRequest $request,$id)
    {
        try{
        $baohiem=  DB::table('baohiem')->where('id',$id)->update([
        'ma_bhxh'=>$request->ma_bhxh,
        'ma_nv'=>$request->ma_nv,
        'loai_bhxh'=>$request->loai_bhxh,
        'ngaycap'=>$request->ngaycap,
        'ngayhethan'=>$request->ngayhethan,
        'noicap'=>$request->noicap,
        'noikham'=>$request->noikham,
        'tiendong_bhxh'=>$request->tiendong_bhxh,
             ]);   
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($baohiem)
       {
        return response()->json([
            'data'=>$baohiem,
            'status'=>200,
            'messege'=>'Update data completed!'
           ]);
          }
    } 
    public function destroy($id)
    {
        try{
         $baohiem=DB::table('baohiem')->where('id',$id)->delete();
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($baohiem)
        {
         return response()->json([
            
             'status'=>200,
             'messege'=>'Delete data completed!'
            ]);
           }
    }
}
