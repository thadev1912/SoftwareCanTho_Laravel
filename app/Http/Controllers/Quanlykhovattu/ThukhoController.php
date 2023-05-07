<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Thukho;
class ThukhoController extends Controller
{
    public function thukho()
    {
       $data=thukho::get();
       dd($data);

    } 
}
