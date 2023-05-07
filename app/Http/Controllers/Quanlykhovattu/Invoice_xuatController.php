<?php

namespace App\Http\Controllers\Quanlykhovattu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanlykhovattu\Invoice_xuat;
class Invoice_xuatController extends Controller
{
    function invoice_xuat()
    {
        $latest = invoice_xuat::latest()->first();

        if (! $latest) {
            $invoice_number='PXK0001';
            invoice_xuat::insert([
               'invoice_number'=>$invoice_number,

            ]);
            return $invoice_number;

            
        }
    
        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);
    
        $invoice_number= 'PXK' . sprintf('%04d', $string+1);
        invoice_xuat::insert([
            'invoice_number'=>$invoice_number,

         ]);
         return $invoice_number;
    }
}
