<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded=["id"];
    protected $table="sub_categories";
    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    use HasFactory;
}
