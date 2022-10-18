<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded="['id']";
    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,"subcategory_id","id");
    }
    public function cart(){
        return $this->hasOne(Cart::class,"product_id","id");
    }
    use HasFactory;
}
