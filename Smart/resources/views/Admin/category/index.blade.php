@extends('layouts.navbar')


@section('content2')

<div class="section group" >
    @foreach ($category as $item)
            <div style="width:200px ; height:250px" class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <a href=""><img  src="/category_images/{{ $item->image }}" alt="" /></a>
                
                <div class="button"><span><a href="{{ route('category.show' , $item->id) }}" class="details">Details</a></span></div>
            </div>
            @endforeach
</div>
@if (auth()->user()->type == 'admin')
    <a href="{{ route('category.create') }}" >
    <button class="btn mb-2 col-md-12" style="background-color: #602D8D ; color:white">Add Department</button>
    </a>
@endif

@endsection