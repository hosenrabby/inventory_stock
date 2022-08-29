<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productstockManage extends Model
{
    use HasFactory;
    protected $table = 'productstock_manages';
    protected $primarykey = 'id';
    protected $fillable = [
        'prodName',
        'prodCode',
        'purchaseDate',
        'recieveDate',
        'prodType',
        'prodQty',
        'prodPrice',
        'totalPrice',
        'paidAmmount',
        'duesAmmount',
        'suplierID',
        'catagoryID',
    ];
}
