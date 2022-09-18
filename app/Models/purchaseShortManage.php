<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseShortManage extends Model
{
    use HasFactory;
    protected $table = 'purchase_short_manages';
    protected $primarykey = 'id';
    protected $fillable = [
        'pID',
        'invNumber',
        'supplierName',
        'purchaseDate',
    ];
}
