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
        'productName',
        'prodCode',
        'catagoryID',
        'subcatagoryID',
        'prodRate',
        'stockBalance',
    ];
}
