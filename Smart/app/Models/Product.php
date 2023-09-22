<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['id' , 'name' , 'image' , 'description' , 'price' , 'discount_price' , 'category_id' , 'brand_id'] ;
    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }
}
