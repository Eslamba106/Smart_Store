<?php

namespace App\Models;

// use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


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
