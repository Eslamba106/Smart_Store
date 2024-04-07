<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Repositories\Brand\BrandRepositoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;

class BrandController extends Controller
{
    public $brand ;
    public $products ;
    public function __construct(BrandRepositoryModel $brand)
    {
        $this->brand = $brand ; 
        // $this->products = $products ; 
    }
    // public function __construct(Brand $brand , Product $products)
    // {
    //     $this->brand = $brand ; 
    //     $this->products = $products ; 
    // }
    public function index()
    {

        $query = $this->brand->getBrands();
        // dd($query)
        return view('Admin.brand.index')->with('brands' , $query);
    }


    public function create()
    {
        $query = $this->brand->getBrands();
        // $mainbrand = $this->brand->where('parent_id' ,0)->get();
        // $brands = Brand::get();
        return view('Admin.brand.create')->with('brands' , $query);
        // return view('Admin.brand.create')->with('mainbrand' , $mainbrand)->with('brands' , $brands);
    }


    public function show($id)
    {
        $brand = Brand::where('id' , $id)->first();
        $products =  $brand->product ;
        // dd($brands->product);
        return view('Admin.brand.show' , compact(['products' , 'brand']));
    }

    public function store(BrandStoreRequest $request)
    {
        $this->brand->add($request);
        // dd($request);

        // $brands = new Brand();
        // $brands->name = $request->name;
        // $brands->parent_id = $request->parent_id ?? 0 ;
        // $brands->save();
        // return redirect()->route('brand.index');
        return back()->with('message' , 'successfully added');

    }


    public function edit($id)
    {
        $parents = Brand::where('id', '<>', $id)
        ->where(function ($query) use ($id) {

            $query->whereNull('parent_id')
                ->orWhere('parent_id', '<>', $id);
        })->pluck('name', 'id');
        $query = Brand::get()->where('id' , $id)->first();
        $queries = $this->brand->getBrands() ;
        return view('Admin.brand.edit' , compact(['query' , 'parents', 'queries'])); //->with('query' , $query)->with('queries' , $queries) ;
    }

    public function update(Request $request ,$id)
    {
        $this->brand->add($request);
        return redirect()->route('admin.brands');

    }

    // public function delete(Brand $brand)
    // {
    //     //
    // }
    public function delete($id)
    {
        $brand = $this->brand->delete($id);
 
        return redirect()->route('admin.brands') ;
    }

}
