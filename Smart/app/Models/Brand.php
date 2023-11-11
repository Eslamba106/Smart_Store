<?php

namespace App\Models;

// use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory ;

    protected $fillable = ['id' , 'name' , 'parent_id'];
    protected $table = 'brands' ;
    public function product(){
        return $this->hasMany(Product::class , 'brand_id');
    }
    public function child(){
        return $this->hasMany(Brand::class , 'parent_id');
    }
    public function parent(){
        return $this->belongsTo(Brand::class , 'parent_id');
    }

}
                                                                                                                            