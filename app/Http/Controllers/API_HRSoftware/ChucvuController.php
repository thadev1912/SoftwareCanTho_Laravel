<?php

namespace App\Http\Controllers\API_HRSoftware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\Chucvu;
use App\Http\Requests\API_HRSoftware\ChucvuRequest;
use DB;
class ChucvuController extends Controller
{
    public function index()
    {
        try{
           $chucvu=DB::table('chucvu')->paginate(20); 
          
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'], 500);
        }        
       
        return $chucvu;
    }
    public function store(ChucvuRequest $request)
    {       
       try{
        //dd($request->all());
       $chucvu=  DB::table('chucvu')->insert([
            'ma_cv'=>$request->ma_cv,
            'ten_cv'=>$request->ten_cv,
         ]);    
       
    }
       catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       
      
       if($chucvu)
       {
        return response()->json([
            'data'=>$chucvu,
            'status'=>200,
            'messege'=>'Save data completed!'
           ]);
       }
    }
    public function edit($id)
   {
    try{
     $chucvu= chucvu::findorFail($id);
     
    }
    catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       if($chucvu)
       {
        return response()->json([
            'data'=>$chucvu,
            'status'=>200,
            'messege'=>'Get data completed!'
           ]);
          }
   }    
   public function update(ChucvuRequest $request,$id)
    {
        try{
            $chucvu=  DB::table('chucvu')->where('id',$id)->update([
                'ma_cv'=>$request->ma_cv,
                'ten_cv'=>$request->ten_cv,
             ]);   
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($chucvu)
       {
        return response()->json([
            'data'=>$chucvu,
            'status'=>200,
            'messege'=>'Update data completed!'
           ]);
          }
    } 
    public function destroy($id)
    {
        try{
         $chucvu=DB::table('chucvu')->where('id',$id)->delete();
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($chucvu)
        {
         return response()->json([
            
             'status'=>200,
             'messege'=>'Delete data completed!'
            ]);
           }
    }
}
