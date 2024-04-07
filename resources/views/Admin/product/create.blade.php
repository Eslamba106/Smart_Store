<x-back-office.dashboard-layout title="انشاء منتج">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اضافة منتج جديد</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.products.index') }}">المنتجات</a></li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row product adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">انشاء منتج</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">اسم المنتج</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">القسم</label>
                                        <select name="parent_id" id="validationCustom01" class="form-control">
                                            <option value=""> </option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">البراند</label>
                                        <select name="parent_id" id="validationCustom01" class="form-control">
                                            <option value=""> </option>
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">الوصف</label>
                                        <x-form.input name="description" type="text" placeholder="desc" id="validationCustom01" />
                             
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">السعر</label>
                                        <x-form.input name="price" type="text" id="validationCustom01" placeholder="price" />
                                        {{-- <input class="form-control dropify"
                                            data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}"
                                            id="validationCustom01" type="file" name="image"> --}}
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">الصورة</label>
                                        <input class="form-control dropify"
                                            data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}"
                                            id="validationCustom01" type="file" name="image">
                                    </div>

                                    {{-- </div> --}}


                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">حفظ</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-back-office.dashboard-layout>



{{-- @extends('layouts.navbar')

@section('content2')
<div class="page-body" >  
    
    

{{-- Add Product
    <div class="container-fluid" > 
        <div class="row product adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT')
                                @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    
                                @endif


                                <div class="form-group">
                                    <label for="validationCustom05">Department</label>
                                    <select name="product_id" id="validationCustom05" class="form-control" required>
                                        <option value="" > Department </option>   
                                        @foreach ($products as $product)
                                            @if ($product->parent_id == 0)
                                                
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @else
                                                    <option value="{{ $product->id }}">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $product->name }}
                                                    </option>
                                            @endif
                                        @endforeach                                 
                                    </select>
                                    {{-- <select name="product_id" id="validationCustom05" class="form-control" required>
                                        <option value="" >product</option>   
                                        {{-- @foreach ($products as $product)
                                        @if ($product->parent_id == 0)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option> 
                                            @foreach ($product->child as $child)
                                                <option value="{{ $child->id }}">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $child->name }}
                                                </option>
                                            @endforeach
                                        @endforeach                                 
                                    </select> 
                                    {{-- @foreach ($products as $product)
                                    @if ($product->parent_id == 0)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @foreach ($product->child as $child)
                                        <option value="{{ $child->id }}">
                                            &nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;{{ $child->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    {{-- @else
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        
                                    @endforeach
                                    {{-- </select> 
                                </div>
                                

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Product Brand
                                         
                                    </label>
                                    <select name="brand_id" id="validationCustom05" class="form-control" required>
                                        {{-- <option value="" >Brand</option> 

                                        @foreach ($brands as $brand)
                                            {{-- <option value="{{ $brand->id }}">{{ $brand->name }}</option> 
                                        
                                        
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
                                    <input type="file" name="image" id="validationCustom05" class="form-control dropify" data-default-file="" >

                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Product Name
                                         
                                    </label>
                                    <input type="text" name="name" id="validationCustom05" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">Product Description</label>
                                    <textarea class="form-control" rows="5"  name="description" value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        Price
                                    </label>
                                    <input type="text" name="price" id="validationCustom05" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                           Discount Price
                                    </label>
                                    <input type="text" name="discount_price" id="validationCustom05" class="form-control" value="">
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
</div>]]
@endsection --}}