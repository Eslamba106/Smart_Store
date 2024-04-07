<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CategoryRepository implements CategoryRepositoryModel
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function getCategories()
    {
        $request = request();
        return Category::filter($request->query()); //with('parent')->
    }
    public function add($category)
    {
        $item = Category::where('id', $category->id)->first();
        if ($item) {
            // dd($item->image);
            $data = $category->except('image');
            $old_image = $item->image;
            $data['parent_id'] = $category->parent_id ?? 0;

            if ($category->hasFile('image')) {
                // $data['image'] = uploadImage($category, 'category_images');
                $file = $category->file('image');
                $path = $file->store('category_images', [
                    'disk' => 'public',
                ]);
                $data['image'] = $path;
            }
            // $new_image = $this->uploadImage($request);
            // if ($new_image) {
            //     $data['image'] = $new_image;
            // }

            $item->update($data);

            if ($old_image && isset($data['image'])) {
                Storage::disk('public')->delete($old_image);
            }



            return $category;
        } else {
            $data = $category->except('image');
            $data['parent_id'] = $category->parent_id ?? 0;
            if ($category->hasFile('image')) {
                $data['image'] = uploadImage($category, 'category_images');
            }
            $category = Category::create($data);
            return $category;
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
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        // Category::where('id' , $id)->delete();
        // Category::destroy($id);
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        };

        // return redirect()->route('categories.index')->with('success', 'Category Deleted!');
    }


}
