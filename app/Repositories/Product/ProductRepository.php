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
    public function add($product)
    {
        $item = Product::where('id', $product->id)->first();
        if ($item) {
            $data = $product->except('image');
            $old_image = $item->image;
            $data['category_id'] = $product->category_id;
            $data['brand_id'] = $product->brand_id;

            if ($product->hasFile('image')) {
                // $data['image'] = uploadImage($category, 'category_images');
                $file = $product->file('image');
                $path = $file->store('product_images', [
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



            return $product;
        } else {
            $data = $product->except('image');
            $data['category_id'] = $product->category_id ;
            $data['brand_id'] = $product->brand_id ;
            if ($product->hasFile('image')) {
                $data['image'] = uploadImage($product, 'product_images');
            }
            $product = Product::create($data);
            return $product;
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
