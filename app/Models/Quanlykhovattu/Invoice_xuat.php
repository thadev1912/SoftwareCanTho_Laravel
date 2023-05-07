<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_xuat extends Model
{
    use HasFactory;
    protected $table='_invoice_xuat';
    protected $fillable=([
        'id',
        'invoice_number',
    ]);
}
