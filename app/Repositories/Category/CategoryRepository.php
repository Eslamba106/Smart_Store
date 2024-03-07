<?php 

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryModel
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function get()
    {
        $request = request();
        return Category::filter($request->query())->paginate();
    }
    public function add($category)
    {
        $item = Category::where('id' , $category->id)->first();
        if($item){
        
        }
        else{
            $data = $category->except('image');
            $data['parent_id'] = $category->parent_id ?? 0;
            if($category->hasFile('image')){
                $data['image'] = uploadImage($category , 'Categories_images');
            }
            $category = Category::create($data);
            return $category ;
        }
        // $request->merge([
        //     'slug' => Str::slug($request->post('name')),
        // ]);

        // $data = $request->except('image');
        // $data['image'] = uploadImage($request , 'Categories_images');


        // $category = Category::create($data);
        // $slug = Str::slug($request->name , '-');
        // $path = uniqid().'-'.$slug.'.'.$request->image->extension() ;
        // $request->image->move(public_path('category_images') , $path);
        // $query = Category::create([

        // ]);

        // $query = new Category();
        // $query->name = $request->name ;
        // $query->parent_id =$request->parent_id ?? 0 ;
        // $query->image =$path;
        // $query->save();
        // return redirect()->route('category.index')->with('categories' , $query);
        // return redirect()->route('category.index')->with('message' , 'successfully added');
    }
}