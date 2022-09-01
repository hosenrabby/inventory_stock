<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseManage extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $table = 'purchase_manage';
    protected $primarykey = 'id';
    protected $fillable = [
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
        'paidAmount',
        'duesAmount',
    ];
}
