<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryModel;

class CategoryController extends Controller
{

    public $category ;
    public function __construct(CategoryRepositoryModel $category)
    {
        $this->category = $category;
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $categories = $this->category->get()->paginate(4);
        return view('Admin.category.index' , compact('categories'));
    }


    public function create()
    {
        $query = $this->category->get()->get();
        return view('Admin.category.create')->with('categories' , $query);
    }


    public function store(CategoryRequest $request){
        $this->category->add($request);
        return redirect()->route('admin.categories.index')->with('message' , 'successfully added');
    }
    public function edit($id)
    {
        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {

                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            })->pluck('name', 'id');
        try {
            $query = Category::findOrFail($id);
        } catch (\Exception $e) {
            return ('Record Not Fond');
        }
    return view('Admin.category.edit', compact(['parents', 'query']));
}
    // public function edit($id)
    // {
    //     $parents = Category::where('id', '<>', $id)
    //         ->where(function ($query) use ($id) {

    //             $query->whereNull('parent_id')
    //                 ->orWhere('parent_id', '<>', $id);
    //         })->pluck('name','id');
    //     try {
    //         $query = Category::findOrFail($id);
    //     } catch (\Exception $e) {
    //         return redirect()->route('dashboard.categories.index')->with('info', 'Record Not Fond');
    //     }
    //     return view('Admin.category.edit', compact(['parents', 'query']));
    // }
    //     public function edit($id)
    // {
    //     $categories = $this->category->get();
    //     $query = $categories->where('id' , $id)->first() ;
    //     // dd($categories);
    //     return view('Admin.category.edit')->with('query' , $query)->with('categories' , $categories);
    // }
    // public function store(Request $request)
    // {
    //     $slug = Str::slug($request->name , '-');
    //     $path = uniqid().'-'.$slug.'.'.$request->image->extension() ;
    //     $request->image->move(public_path('category_images') , $path);
    //     $query = new Category();
    //     $query->name = $request->name ;
    //     $query->parent_id =$request->parent_id ?? 0 ;
    //     $query->image =$path;
    //     $query->save();
    //     return redirect()->route('category.index')->with('categories' , $query);
    //     // return redirect()->route('category.index')->with('message' , 'successfully added');
    // }


    // public function show($id)
    // {

    //     $categories = $this->category->where('id' , $id)->first();
    //     // return $categories->name ;
    //     return view('Admin.category.show')->with('categories' , $categories) ;
    // }




    public function update(Request $request, $id)
    {
        // dd($request);
        $category = Category::find($id);
        $this->category->add($request);
        return redirect()->route('admin.categories.index')->with('message' , 'successfully added');
        // return $category;
        // $slug = Str::slug($request->name , '-') ;
        // $path = uniqid().'-'.$slug.'.'.$request->image->extension() ;
        // $request->image->move(public_path('category_images'), $path);

        // $newcategory = $this->category->where('id' , $id)->firstOrFail();
        // $newcategory->name = $request->name ;
        // $newcategory->parent_id = $request->parent_id ;
        // $newcategory->image = $path ;
        // $newcategory->save();
        // return $newcategory ;
    }


    // public function destroy(Category $category)
    // {
    //     //
    // }
    public function delete($id)
    {
        // $category = $this->category->where('id' , $id)->first();
        $this->category->delete($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted!');
    }
}
