<?php

namespace App\Models;

// use App\Models\Product;
use Illuminate\Validation\Rule;
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
    public static function rules($id = 0){
        return [
            'name'=> [
                'required',
                'string',
                'max:255',
                'min:3',
                Rule::unique('categories' , 'name')->ignore($id),
                // function($attribute , $value , $fails){
                //     if(strtolower($value) == 'laravel'){
                //         $fails('This name is forbidden');
                //     }
                // }    
            ],
            'parent_id' => [
                'nullable' , 'integer' , 'exists:categories,id'
            ],
            'image' => 'required|image|max:1028576|dimensions:min_width=100,min_height=100',
            'status' => 'in:active,archived',
        ];
    }
}
