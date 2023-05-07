<?php

namespace App\Http\Controllers\Quanlykhovattu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Invoice_nhap;
class Invoice_nhapController extends Controller
{
    function invoice()
    {
        $latest = invoice::latest()->first();

        if (! $latest) {
            $invoice_number='PNK0001';
            invoice::insert([
               'invoice_number'=>$invoice_number,

            ]);
            return $invoice_number;

            
        }
    
        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);
    
        $invoice_number= 'PNK' . sprintf('%04d', $string+1);
        Invoice::insert([
            'invoice_number'=>$invoice_number,

         ]);
         return $invoice_number;
    }
}
