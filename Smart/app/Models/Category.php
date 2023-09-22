<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;


    protected $fillable = ['id' , 'name' , 'image' , 'parent_id'];
    protected $table    = 'categories';

    public function product(){
        return $this->hasMany(Product::class , 'category_id');
    }
    public function child(){
        return $this->belongsTo(Category::class , 'parent_id');
    }
    public function parent(){
        return $this->hasMany(Category::class , 'parent_id');
    }
}
