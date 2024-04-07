<x-back-office.dashboard-layout title="البراندات">
    <x-slot:breadcrumb>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">البراندات</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active">البراندات</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>


    {{-- <a href="{{ route('admin.brands.create') }}">
        <button class="btn ml-5 mb-2 btn-dark">اضافة براند</button>
    </a> --}}
    {{-- <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.input name="name" placeholder="اسم البراند" class="mx-2 input-group-sm" :value="request('name')" />
        <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
    </form> --}}
    <table class="table">
        <thead>
            <tr>
                <th>الكود</th>
                <th>الاسم</th>
                <th>البراند الرئيسي</th>
                {{-- <th>Status</th> --}}
                <th>اضيف في</th>
                <th colspan="2">العمليات</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if ($categories->count()) --}}
            {{-- @forelse ($brands as $brand) --}}
                <tr>
                    {{-- <td><img src="{{ $brand->image_url }}" height="50" alt=""></td> --}}
                    {{-- <td><img src="{{ asset('brand_images/'.$brand->image) }}" height="50" alt=""></td> --}}
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->parent->name ?? 'Main' }}</td>
                    {{-- <td>{{ $brand->status }}</td> --}}
                    <td>{{ $brand->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.brands.edit', $brand->id) }}"
                            class="btn btn-sm btn-outline-success">تعديل</a>
                    </td>
                    {{-- <td>
                        <a href="{{ route('admin.brands.show', $brand->id) }}"
                            class="btn btn-sm btn-outline-info">عرض</a>
                    </td> --}}
                    <td>
                        <form action="{{ route('admin.brands.delete', $brand->id) }}" method="post">
                            @csrf
                            {{-- Form Method Spoofing --}}
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            {{-- @empty
                <tr>
                    <td colspan="8">No Brands Defined.</td>
                </tr> --}}
            {{-- @endforelse --}}
            {{-- @else

        @endif --}}
        </tbody>
    </table>

    {{-- {{ $brands->withQueryString()->appends(['search' => 1])->links() }} --}}
</x-back-office.dashboard-layout>







{{-- @extends('layouts.navbar')

@section('content')


@section('content2')

<div class="section group" >
    @foreach ($products as $item)
            <div style="width:200px ; height:250px" class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <h2>{{ $item->name }} </h2>
                <a href=""><img src="/product_image/{{ $item->image }}" alt="" /></a>
                
                <div class="button"><span><a href="{{ route('products.show' , $item->id) }}" class="details">Details</a></span></div>
            </div>
            @endforeach
</div>
<br>
<br>
<br>
@if (auth()->user()->type == 'admin')
    <a href="{{ route('products.create') }}" >
        <button class="btn mb-2 col-md-12" style="background-color: #602D8D ; color:white">Add Product</button>
    </a>
@endif

@endsection --}}