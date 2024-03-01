@extends('layouts.navbar')

{{-- @section('content') --}}


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

@endsection