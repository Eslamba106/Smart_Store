<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['id' , 'name' , 'parent_id'];
    protected $table = 'brands' ;
    public function product(){
        return $this->hasMany(Product::class , 'brand_id');
    }
    public function parent(){
        return $this->hasMany(Brand::class , 'parent_id');
    }
    public function child(){
        return $this->belongsTo(Brand::class , 'parent_id');
    }

}
