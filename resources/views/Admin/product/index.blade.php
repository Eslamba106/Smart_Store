<x-back-office.dashboard-layout title="{{ __('dashboard/product/product.products') }}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/product/product.products') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/product/product.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard/product/product.products') }}</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    

<a href="{{ route('admin.products.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >{{ __('dashboard/product/product.add_product') }}</button>
</a>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
    <x-form.input name="name" placeholder="{{ __('dashboard/product/product.product_name') }}" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>{{ __('dashboard/product/product.image') }}</th>
            <th>{{ __('dashboard/product/product.code') }}</th>
            <th>{{ __('dashboard/product/product.name') }}</th>
            <th>{{ __('dashboard/product/product.price') }}</th>
            <th>{{ __('dashboard/product/product.discount') }}</th>
            <th>{{ __('dashboard/product/product.description') }}</th>
            <th>{{ __('dashboard/product/product.quantity') }}</th>
            <th>{{ __('dashboard/product/product.category') }}</th>
            <th>{{ __('dashboard/product/product.brand') }}</th>
            <th>{{ __('dashboard/product/product.created_at') }}</th>
            <th colspan="2">{{ __('dashboard/product/product.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($categories->count()) --}}
        @forelse ($products as $product)
            <tr>
                <td><img src="{{ $product->image_url }}" height="50" alt=""></td>
                {{-- <td><img src="{{ asset('product_images/'.$product->image) }}" height="50" alt=""></td> --}}
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price  }}</td>
                <td>{{ $product->discount_price  }}</td>
                <td>{{ $product->description  }}</td>
                <td>{{ $product->quantity ?? 0  }}</td>
                <td>{{ $product->category->name  }}</td>
                <td>{{ $product->brand->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="btn btn-sm btn-outline-success">{{ __('dashboard/product/product.edit') }}</a>
                </td>
                <td>
                    <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('dashboard/product/product.delete') }}</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">{{ __('dashboard/product/product.defined') }}</td>
            </tr>
        @endforelse
        {{-- @else

        @endif --}}
    </tbody>
</table>

{{-- {{ $products->withQueryString()->appends(['search' => 1])->links() }} --}}
</x-back-office.dashboard-layout>








{{-- @extends('layouts.navbar')


@section('content2')

<div class="section group">
    @foreach ($products as $item)
            <div class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <h2>{{ $item->id }} </h2>
                <a href="" ><img style="width:150px" src="/product_image/{{ $item->image }}" alt="" /></a>
                {{-- <p>{{ $item->description }}</p> 
                <p>Price: ${{ $item->price }}</p>
                <p>Discount Price : ${{ $item->discount_price }}</p>
                {{-- <p>{{ $item->brand->name }}</p> 
                <div class="button"><span><a href="{{ route('products.show' , $item->id) }}" class="details" onclick="conf(en)">Details</a></span></div>
            </div>

            @endforeach
</div>
@if (auth()->user()->type == 'admin')
    <a href="{{ route('products.create') }}" >
        <button class="btn mb-2 col-md-12" style="background-color: #602D8D ; color:white">Add Product</button>
    </a>    
@endif

@endsection --}}