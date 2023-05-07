<?php

namespace App\Http\Controllers\API_HRSoftware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlynhansu\PhongBan;
//use App\Http\Requests\Quanlynhansu\PhongbanRequest;
use App\Http\Requests\API_HRSoftware\PhongbanRequest;
use DB;
use Validator;
class PhongbanController extends Controller
{
    public function index()
    {
        try{
           $phongban=DB::table('phongban')->paginate(20); 
          
        }
        catch (\Exception $e)
        {
            return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'], 500);
        }        
       
        return $phongban;
    }
    public function store(PhongbanRequest $request)
    {       
       try{
        //dd($request->all());
       $phongban=  DB::table('phongban')->insert([
            'ma_pb'=>$request->ma_pb,
            'ten_pb'=>$request->ten_pb,
         ]);    
       
    }
       catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       
      
       if($phongban)
       {
        return response()->json([
            'data'=>$phongban,
            'status'=>200,
            'messege'=>'Save data completed!'
           ]);
       }
    }
   public function edit($id)
   {
    try{
     $phongban= phongban::findorFail($id);
     
    }
    catch(\Exception $e)
       {
        return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
       }
       if($phongban)
       {
        return response()->json([
            'data'=>$phongban,
            'status'=>200,
            'messege'=>'Get data completed!'
           ]);
          }
   }    
    public function update(PhongbanRequest $request,$id)
    {
        try{
            $phongban=  DB::table('phongban')->where('id',$id)->update([
                'ma_pb'=>$request->ma_pb,
                'ten_pb'=>$request->ten_pb,
             ]);   
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($phongban)
       {
        return response()->json([
            'data'=>$phongban,
            'status'=>200,
            'messege'=>'Update data completed!'
           ]);
          }
    } 
    public function destroy($id)
    {
        try{
         $phongban=DB::table('phongban')->where('id',$id)->delete();
        }
        catch(\Exception $e)
        {
         return response()->json(['error' => $e->getMessage(),'messege'=>'Error connect Database on server'],500);
        }
        if($phongban)
        {
         return response()->json([
            
             'status'=>200,
             'messege'=>'Delete data completed!'
            ]);
           }
    }
    
}



 //Manual setup validate
        //dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'ma_pb'=>'required',
        //     'ten_pb'=>'required',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['messege'=>'Lối kết nối server'],422);
        // }