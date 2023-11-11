@extends('layouts.navbar')


@section('content2')

<div class="section group">
    @foreach ($products as $item)
            <div class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <h2>{{ $item->id }} </h2>
                <a href="" ><img style="width:150px" src="/product_image/{{ $item->image }}" alt="" /></a>
                {{-- <p>{{ $item->description }}</p> --}}
                <p>Price: ${{ $item->price }}</p>
                <p>Discount Price : ${{ $item->discount_price }}</p>
                {{-- <p>{{ $item->brand->name }}</p> --}}
                <div class="button"><span><a href="{{ route('products.show' , $item->id) }}" class="details" onclick="conf(en)">Details</a></span></div>
            </div>

            @endforeach
</div>
@if (auth()->user()->type == 'admin')
    <a href="{{ route('products.create') }}" >
        <button class="btn mb-2 col-md-12" style="background-color: #602D8D ; color:white">Add Product</button>
    </a>    
@endif

@endsection