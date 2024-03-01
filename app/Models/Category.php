<?php

namespace App\Models;

// use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory ;


    protected $fillable = ['id' , 'name' , 'image' , 'parent_id'];
    protected $table    = 'categories';

    public function product(){
        return $this->hasMany(Product::class , 'category_id');
    }
    public function parent(){
        return $this->belongsTo(Category::class , 'parent_id');
    }
    public function child(){
        return $this->hasMany(Category::class , 'parent_id');
    }
    public function scopeFilter(Builder $builder , $filters){

        $builder->when($filters['name'] ?? false , function($builder , $value){
            $builder->where('categories.name','like','%'.$value.'%');
        });
    }
}
