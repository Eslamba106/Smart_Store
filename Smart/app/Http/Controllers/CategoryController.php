<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public $category ;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $category = Category::all();
        return view('Admin.category.index' , compact('category'));
    }


    public function create()
    {
        
        $query = $this->category->all();
        return view('Admin.category.create')->with('categories' , $query);
    }


    public function store(Request $request)
    {
        $slug = Str::slug($request->name , '-');
        $path = uniqid().'-'.$slug.'.'.$request->image->extension() ;
        $request->image->move(public_path('category_images') , $path);
        $query = new Category();
        $query->name = $request->name ;
        $query->parent_id =$request->parent_id ?? 0 ;
        $query->image =$path;
        $query->save();
        return redirect()->route('category.index')->with('categories' , $query);
    }


    public function show($id)
    {

        $categories = $this->category->where('id' , $id)->first();
        // return $categories->name ;
        return view('Admin.category.show')->with('categories' , $categories) ;
    }

    public function edit($id)
    {
        $categories = $this->category->all();
        $query = $this->category->where('id' , $id)->first() ;
        return view('Admin.category.edit')->with('query' , $query)->with('categories' , $categories);
    }


    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->name , '-') ;
        $path = uniqid().'-'.$slug.'.'.$request->image->extension() ;
        $request->image->move(public_path('category_images'), $path);

        $newcategory = $this->category->where('id' , $id)->firstOrFail();
        $newcategory->name = $request->name ;
        $newcategory->parent_id = $request->parent_id ;
        $newcategory->image = $path ;
        $newcategory->save();
        return $newcategory ;
    }


    public function destroy(Category $category)
    {
        //
    }
    public function delete($id)
    {
        $this->category->where('id' , $id)->first()->delete();
        return redirect()->route('category.index');
    }
}
