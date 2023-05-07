<?php

namespace App\Models\Quanlykhovattu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_nhap extends Model
{
    use HasFactory;
    protected $table='invoice';
    protected $fillable=([
        'id',
        'invoice_number',
    ]);
}
