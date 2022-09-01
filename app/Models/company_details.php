<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_details extends Model
{
    protected $table ='company_details';
    protected $primarykey='id';
    protected $fillable=[
        'companyName',
        'companyEmail',
        'phone',
        'address',
        'logo',

    ];
}
