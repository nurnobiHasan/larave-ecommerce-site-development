<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";
    protected $guarded=["id"];
    use HasFactory;
    public function subcategory(){
        return $this->hasOne(SubCategory::class,"category_id","id");
    }
    public function products(){
        return $this->HasOne(Product::class,"category_id","id");
    }
}
