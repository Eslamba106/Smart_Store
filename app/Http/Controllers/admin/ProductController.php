<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Brand\BrandRepositoryModel;
use App\Repositories\Product\ProductRepositoryModel;
use App\Repositories\Category\CategoryRepositoryModel;

class ProductController extends Controller
{
    public $products ;
    public $category ;
    public $brand ;
    // public function __construct(Product $products , Category $category , Brand $brand)
    // {
    //     $this->products = $products ;
    //     $this->category = $category ;
    //     $this->brand = $brand ;
    // }
    public function __construct(ProductRepositoryModel $products ,CategoryRepositoryModel $category ,BrandRepositoryModel $brand ){
        $this->products = $products;
        $this->category = $category ;
        $this->brand = $brand ;
    }

    public function index()
    {

        $categories = $this->category->getCategories()->get() ;
        $products = $this->products->getProducts()->get() ;
        // dd($categories->get());
        return view('Admin.product.index' , compact(['categories' , 'products'])); //->with('categories' , $categories)->with('products' , $products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = $this->brand->getBrands() ;
        $categories = $this->category->getCategories()->get();
        $products = $this->products->getProducts();
        return view('Admin.product.create' , compact(['brands' , 'products' , 'categories']));//->with('products' , $products)->with('categories' , $categories)->with('brands' , $brands);
    }

    public function store(Request $request)
    {
        // dd($request);p
        $this->products->add($request);
        // $slug = Str::slug($request->name , '-');
        // $path = uniqid().'-'.$slug.'.'.$request->image->extension();

        // $request->image->move(public_path('product_image' ), $path);
        // $product = new Product();
        // $product->id = $request->id ;
        // $product->name = $request->name ;
        // $product->price = $request->price ;
        // $product->discount_price = $request->discount_price ;
        // $product->description = $request->description ;
        // $product->category_id = $request->category_id ;
        // $product->brand_id = $request->brand_id ;
        // $product->image = $path ;
        // $product->save();
        return redirect()->route('admin.products.index');
    }

    public function show($request)
    {
        $categories = $this->category->getCategories();
        $item = Product::where('id' , $request)->first() ;
        return view('Admin.product.show' , compact('item'))->with('categories' , $categories);
    }


    public function edit($id)
    {
        $product = Product::where('id' , $id)->first();
        $categories = $this->category->getCategories();
        $brands = $this->brand->getBrands();
        return view('Admin.product.edit' , compact(['product' , 'categories' , 'brands']));
        //->with('products' , $newproduct)
        //->with('categories' , $categories)->with('newbrands' , $newbrands );
    }


    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->name , '-');
        $path = uniqid().'-'.$slug.'.'.$request->image->extension();
        $request->image->move(public_path('product_image') , $path);

        $newproduct = $this->products->where('id' , $id)->first();
        $newproduct->name = $request->name ;
        $newproduct->description = $request->description ;
        $newproduct->price = $request->price ;
        $newproduct->discount_price = $request->discount_price ;
        $newproduct->image = $path ;
        $newproduct->category_id = $request->category_id ;
        $newproduct->brand_id = $request->brand_id ;
        $newproduct->save();
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        return $id ;
    }
    public function delete($id)
    {
        $this->products->where('id' , $id)->first()->delete();
        return redirect()->route('products.index');
    }


}
