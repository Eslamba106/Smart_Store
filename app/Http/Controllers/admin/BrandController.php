<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;

class BrandController extends Controller
{
    public $brand ;
    public $products ;
    public function __construct(Brand $brand , Product $products)
    {
        $this->brand = $brand ; 
        $this->products = $products ; 
    }
    public function index()
    {

        $query = $this->brand->get();
        return view('Admin.brand.index')->with('brands' , $query);
    }


    public function create()
    {
        $mainbrand = $this->brand->where('parent_id' ,0)->get();
        $brands = Brand::get();
        return view('Admin.brand.create')->with('mainbrand' , $mainbrand)->with('brands' , $brands);
    }


    public function show($id)
    {
        $brands = $this->brand->where('id' , $id)->first();
        $products =  $brands->product ;
     
        return view('Admin.brand.show')->with('products' ,$products);
    }

    public function store(BrandStoreRequest $request)
    {

        $brands = new Brand();
        $brands->name = $request->name;
        $brands->parent_id = $request->parent_id ?? 0 ;
        $brands->save();
        // return redirect()->route('brand.index');
        return back()->with('message' , 'successfully added');

    }


    public function edit($id)
    {
        $query = Brand::get()->where('id' , $id)->first();
        $queries = $this->brand->get() ;
        return view('Admin.brand.edit')->with('query' , $query)->with('queries' , $queries) ;
    }

    public function update(Request $request ,$id)
    {
        $newbrand = $this->brand->where('id' , $id)->firstOrFail();
        $newbrand->name = $request->name ;
        $newbrand->parent_id = $request->parent_id ?? 0 ;
        $newbrand->save();
        return redirect()->route('brand.index');

    }

    public function destroy(Brand $brand)
    {
        //
    }
    public function delete($id)
    {
        $branddd = $this->brand->where('id' , $id)->first();
        $branddd->parent()->delete();
        $branddd->product()->delete();
        $branddd->delete();
        return redirect()->route('brand.index') ;
    }

}
