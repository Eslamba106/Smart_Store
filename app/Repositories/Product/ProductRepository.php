<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductRepository implements ProductRepositoryModel
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function getProducts()
    {
        $request = request();
        return Product::filter($request->query()); //with('parent')->
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
