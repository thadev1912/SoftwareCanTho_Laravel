<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Kho;
use DB;
class PhieuchuyenkhoController extends Controller
{
    public function phieuchuyenkho()
    {
        $kho=DB::table('kho_banhang')
        ->leftjoin('phieunhapkho_banhang','kho_banhang.ma_kho','=','phieunhapkho_banhang.id_kho')
        ->join('chi')
        ->get();
        dd($kho);
    }
}
