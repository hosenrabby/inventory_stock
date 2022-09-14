<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesProduct extends Model
{
    use HasFactory;
    protected $table = 'sales_products';
    protected $primarykey = 'id';
    protected $fillable = [
        'invoice_id',
        'invNumber',
        'customerID',
        'customerName',
        'purchaseDate',
        'purchaseDate',
        'productID',
        'prodCode',
        'prodQty',
        'prodRate',
        'prodRate',
        'totalPrice',
        'grandTotal',
        'paidAmount',
        'duesAmount',
    ];
}
