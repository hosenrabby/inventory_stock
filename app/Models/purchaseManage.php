<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseManage extends Model
{
    use HasFactory;
    protected $table = 'purchase_manage';
    protected $primarykey = 'id';
    protected $fillable = [
        'pid',
        'productID',
        'prodCode',
        'invNumber',
        'purchaseDate',
        'catagoryID',
        'subCatagoryID',
        'supplierID',
        'prodQty',
        'prodRate',
        'totalPrice',
        'grandTotal',
        'paidAmount',
        'duesAmount',
    ];
}
