<?php

namespace App\Helper;

use App\Models\Quanlynhansu\Chamcong;
use Carbon\Carbon;
use App\Models\Quanlynhansu\Dulieuchamcong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class ExcelImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         $data=[
            'ma_nv'=>$row[0],
            'ma_pb'=>$row[3],  
            'ma_cv'=>$row[4],           
           //'ngay_chamcong'=>Carbon::parse('$row[5]')->format('Y-m-d'),
            'ngay_chamcong'=>$row[5],
         // 'ngay_chamcong'=> Carbon::createFromFormat('m/d/Y', $row[5]),
       //  'ngay_chamcong' => Carbon::createFromFormat('m/d/Y', $row[5])->format('Y-m-d'),
           'ngay_chamcong' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[5]),
           'gio_vao' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
           'gio_ra' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
           // 'gio_chamcong'=>$row[6],
         ];
        //dd($data);
         Chamcong::create($data);  //lấy từ model
        }
        public function startRow(): int
        {
            return 3;
        }
        // return new Excel([
        //     //
        // ]);
    }

