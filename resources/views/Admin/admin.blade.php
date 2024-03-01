@extends('layouts.navbar')

@section('content2')

<a href="{{ route('category.create') }}">
<button class="btn mb-2" style="background-color: #602D8D ; color:white">Add Department</button>
</a>
<a href="{{ route('products.create') }}">
<button class="btn mb-2" style="background-color: #602D8D ; color:white">Add Product</button>
</a>
<a href="{{ route('brand.create') }}">
<button class="btn mb-2" style="background-color: #602D8D ; color:white">Add Brand</button>
</a>


@endsection










