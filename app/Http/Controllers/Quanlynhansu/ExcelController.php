<?php
namespace App\Http\Controllers\Quanlynhansu;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
class ExcelController extends Controller
{
     public function import_excel(){
        return view('excel.import_excel');
    }
   public function import(Request $request){
        if($request->file('file')){
            $import =  Excel::import(new UsersImport, request()->file('file'));
            $msg_success = "Data Uploaded Succesfully! ";
            $msg_danger = "Data Uploaded failed! ";
            if ($import) {
                return redirect('/')->with('success', strtoupper($msg_success));
            }else{
               return redirect('/')->with('danger', strtoupper($msg_danger));
            }
        }
        else{
            $msge = "please choose your file! ";
            return redirect('/')->with('choose_file', strtoupper($msge));
        }
    }


}
