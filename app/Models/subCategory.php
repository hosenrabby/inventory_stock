<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $primaryKey='id';
    protected $fillable=[
        'category_id',
        'subCategoryName',
        'subCategoryCode'
    ];
    public function category(){
        return $this->belongsTo(category::class);
    }
}
