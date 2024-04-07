<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'products' ;
    protected $fillable = ['id' , 'name' , 'image' , 'description' , 'price' , 'discount_price' , 'category_id' , 'brand_id'] ;
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
}
