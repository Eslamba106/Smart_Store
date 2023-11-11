@extends('layouts.navbar')

@section('content2')
<div class="page-body" >  

{{-- Add Product --}}
    <div class="container-fluid" > 
        <div class="row product adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('products.update' , $products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    
                                @endif


                                <div class="form-group">
                                    <label for="validationCustom05">Department</label>
                                    <select name="category_id" value="{{ $products->category->name}}" id="validationCustom05" class="form-control" >
                                        <option value="{{ $products->category->id}}" > {{ $products->category->name}}</option>   
                                        @foreach ($categories as $category)
                                            @if ( $category->id == $products->category->id)
                                                @continue
                                            @endif
                                            @if ($category->parent_id == 0)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                    <option value="{{ $category->id }}">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $category->name }}
                                                    </option>
                                            @endif
                                        @endforeach                                 
                                    </select>
                                </div>
                                

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Product Brand
                                    </label>
                                    <select name="brand_id" id="validationCustom05" class="form-control">
                                        <option value="{{ $products->brand->id }}" >{{ $products->brand->name }}</option>
                                        @foreach ($newbrands as $brand)

                                            @if ($brand->id == $products->brand->id)
                                                @continue
                                            @endif
                                            @if ($brand->parent_id == 0)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @else
                                                   <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endif
                                        @endforeach                                 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">Product Image</label>
                                    <input type="file" value="{{ asset('product_image/'.$products->image) }}" name="image" id="validationCustom05" class="form-control dropify" data-default-file="{{ asset('product_image/'.$products->image) }}" >
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Product Name
                                         
                                    </label>
                                    <input type="text" name="name" id="validationCustom05" class="form-control" value="{{ $products->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">Product Description</label>
                                    <textarea class="form-control" rows="5"  name="description" value="">{{ $products->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Price
                                    </label>
                                    <input type="text" name="price" id="validationCustom05" class="form-control" value="{{ $products->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                           Discount Price
                                    </label>
                                    <input type="text" name="discount_price" id="validationCustom05" class="form-control" value="{{ $products->discount_price }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="dddd" id="validationCustom05" class="form-control w-25" style="background-color: #602D8D ; color:white"  value="Submit">
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection