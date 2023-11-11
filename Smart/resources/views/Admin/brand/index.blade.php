@extends('layouts.navbar')


@section('content2')


{{-- <span style="font-size:20px">Brand Name :</span><h1 style="color: #602D8D">{{ $brand->name }}</h1><hr> --}}

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand Name :</th>
        <th scope="col">Main Department :</th>
        @if (auth()->user()->type == 'admin')
            <th scope="col">Actions :</th>
            <th scope="col">Actions :</th>            
        @endif

        <th scope="col">Products :</th>
      </tr>
    </thead>
    <tbody>
       @for ($i =0 ; $i < count($brands) ; $i++)     

      <tr>
        <th>{{ $i+1}} </th>
        <td>{{ $brands[$i]->name }}</td>
        <td>@if ($brands[$i]->parent_id == 0)
          {{ 'Main' }} 
          @else
          {{ $brands[$i]->parent->name }}
          @endif
          @if (auth()->user()->type == 'admin')
            <td><a href="{{ route('brand.edit' , $brands[$i]->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a></td>
            <td><a href="{{ route('brand.delete' , $brands[$i]->id) }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" onclick="conf(event)">Delete</a></td>              
          @endif

        <td><a href="{{ route('brand.show' , $brands[$i]->id) }}" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Products</a></td>
        
      </tr>

      @endfor
    </tbody>
  </table>
  @if (auth()->user()->type == 'admin')
  <a href="{{ route('brand.create') }}" style="background-color: #602D8D ; color:white" class="btn mb-2 btn-lg active center " role="button" aria-pressed="true">Add Brand</a>
      
  @endif

@endsection