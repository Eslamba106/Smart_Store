<x-back-office.dashboard-layout title="{{ __('dashboard/product/edit.edit_product') . $product->name}}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/product/edit.edit_product') .  $product->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/product/product.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard/product/edit.edit') }}</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>


{{-- @extends('layouts.front.navbar')

@section('content2') --}}
<div class="page-body" >  

{{-- Add Product --}}
    <div class="container-fluid" > 
        <div class="row product adding">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('dashboard/product/edit.edit') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <form action="{{ route('admin.products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    
                                @endif


                                <div class="form-group">
                                    <label for="validationCustom05">{{ __('dashboard/product/edit.category') }}</label>
                                    <select name="category_id" value="{{ $product->category->name}}" id="validationCustom05" class="form-control" >
                                        <option value="{{ $product->category->id}}" > {{ $product->category->name}}</option>   
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
                                        {{ __('dashboard/product/edit.brand') }}
                                    </label>
                                    <select name="brand_id" id="validationCustom05" class="form-control">
                                        <option value="{{ $product->brand->id }}" >{{ $product->brand->name }}</option>
                                        @foreach ($brands as $brand)

                                            @if ($brand->id == $product->brand->id)
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
                                    <label for="validationCustom05" class="col-form-label pt-0">{{ __('dashboard/product/edit.image') }}</label>
                                    <input type="file" value="{{ asset('product_images/'.$product->image) }}" name="image" id="validationCustom05" class="form-control dropify" data-default-file="{{ asset('product_images/'.$product->image) }}" >
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        {{ __('dashboard/product/edit.name') }}
                                    </label>
                                    <input type="text" name="name" id="validationCustom05" class="form-control" value="{{ $product->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">{{ __('dashboard/product/edit.description') }}</label>
                                    <textarea class="form-control" rows="5"  name="description" value="">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        {{ __('dashboard/product/edit.price') }}
                                    </label>
                                    <input type="text" name="price" id="validationCustom05" class="form-control" value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom05" class="col-form-label pt-0">
                                        {{ __('dashboard/product/edit.total') }}
                                    </label>
                                    <input type="text" name="discount_price" id="validationCustom05" class="form-control" value="{{ $product->discount_price }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="dddd" id="validationCustom05" class="form-control w-25" style="background-color: #602D8D ; color:white"  value="{{ __('dashboard/product/edit.save') }}">
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
</x-back-office.dashboard-layout>