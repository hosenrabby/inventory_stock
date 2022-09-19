<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salsShortMang extends Model
{
    use HasFactory;
    protected $table = 'sals_short_mangs';
    protected $primarykey = 'id';
    protected $fillable = [
        'invoice_id',
        'invNumber',
        'customerName',
        'purchaseDate',
    ];
}
