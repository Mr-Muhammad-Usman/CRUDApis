<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImageModel;

class ProductModel extends Model
{
    use HasFactory;
    protected $table="products";
    public function productImage(){
        return $this->hasOne(ProductImageModel::class,'product_id','id');
    }
}
