<x-back-office.dashboard-layout title="المنتجات">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">المنتجات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">المنتجات</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    

<a href="{{ route('admin.products.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >اضافة منتج</button>
</a>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="name" placeholder="اسم المنتج" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>الكود</th>
            <th>الاسم</th>
            <th>المنتج الرئيسي</th>
            {{-- <th>Status</th> --}}
            <th>اضيف في</th>
            <th colspan="2">العمليات</th>
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
                <td>{{ $product->parent_name ?? "Main" }}</td>
                {{-- <td>{{ $product->status }}</td> --}}
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="btn btn-sm btn-outline-success">تعديل</a>
                </td>
                <td>
                    <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No Products Defined.</td>
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