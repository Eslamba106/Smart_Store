@extends('layouts.navbar')

@section('content')


@section('content')

<div class="section group" >
    @foreach ($products as $item)
            <div style="width:200px ; height:250px" class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <h2>{{ $item->name }} </h2>
                <a href=""><img src="/product_image/{{ $item->image }}" alt="" /></a>
                
                {{-- <div class="button"><span><a href="preview-3.html" class="details">Details</a></span></div> --}}
            </div>
            @endforeach
</div>
<a href="{{ route('category.create') }}" >
    <button class="btn mb-2 col-md-12" style="background-color: #602D8D ; color:white">Add Department</button>
</a>
@endsection

@endsection