<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'products' ;
    protected $fillable = ['id' , 'name' , 'image' , 'quantity' , 'description' , 'price' , 'discount_price' , 'category_id' , 'brand_id'] ;
    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class , 'brand_id');
    }

    public function scopeFilter(Builder $builder , $filters){

        $builder->when($filters['name'] ?? false , function($builder , $value){
            $builder->where('brands.name','like','%'.$value.'%');
        });
    }
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return "https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return asset('storage/' . $this->image);
    }
}
