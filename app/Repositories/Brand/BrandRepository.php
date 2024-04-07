<?php

namespace App\Repositories\Brand;

use App\Models\Brand;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Storage;


class BrandRepository implements BrandRepositoryModel
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function getBrands()
    {
        $request = request();
        return Brand::paginate(); //with('parent')->
        // return Brand::filter($request->query()); //with('parent')->
    }
    public function add($brand)
    {
        $item = Brand::where('id', $brand->id)->first();
        if ($item) {
            $data = $brand->except('id');
            $data['parent_id'] = $brand->parent_id ?? 0;
            $data['name'] = $brand->name;
            $item->update($data);
            return $brand;
        } else {
            $data = $brand->except('id');
            $data['parent_id'] = $brand->parent_id ?? 0;
            // dd($data);
            $brand = Brand::create($data);
            return $brand;
        }

    }
    public function delete($id)
    {
        $category = Brand::findOrFail($id);
        $category->delete();
    }


}
