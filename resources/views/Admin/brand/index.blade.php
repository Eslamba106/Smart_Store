<x-back-office.dashboard-layout title="{{ __('dashboard/brand/brand.brands') }}">
    <x-slot:breadcrumb>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/brand/brand.brands') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/brand/brand.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('dashboard/brand/brand.brands') }}</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>


    <a href="{{ route('admin.brands.create') }}">
        <button class="btn ml-5 mb-2 btn-dark">{{ __('dashboard/brand/brand.add_brand') }}</button>
    </a>
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
        <x-form.input name="name" placeholder="{{ __('dashboard/brand/brand.brand_name') }}" class="mx-2 input-group-sm" :value="request('name')" />
        <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('dashboard/brand/brand.code') }}</th>
                <th>{{ __('dashboard/brand/brand.name') }}</th>
                <th>{{ __('dashboard/brand/brand.main_brand') }}</th>
                {{-- <th>Status</th> --}}
                <th>{{ __('dashboard/brand/brand.created_at') }}</th>
                <th colspan="2">{{ __('dashboard/brand/brand.operations') }}</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if ($categories->count()) --}}
            @forelse ($brands as $brand)
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
                            class="btn btn-sm btn-outline-success">{{ __('dashboard/brand/brand.edit') }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.brands.show', $brand->id) }}"
                            class="btn btn-sm btn-outline-info">{{ __('dashboard/brand/brand.show') }}</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.brands.delete', $brand->id) }}" method="post">
                            @csrf
                            {{-- Form Method Spoofing --}}
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('dashboard/brand/brand.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">{{ __('dashboard/brand/brand.defined') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>

    {{ $brands->withQueryString()->appends(['search' => 1])->links() }}
    {{-- <span style="font-size:20px">Brand Name :</span><h1 style="color: #602D8D">{{ $brand->name }}</h1><hr> --}}

    {{-- <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand Name :</th>
        <th scope="col">Main Department :</th> --}}
    {{-- @if (auth()->user()->type == 'admin') --}}
    {{-- <th scope="col">Actions :</th>
            <th scope="col">Actions :</th>             --}}
    {{-- @endif --}}
    {{-- 
        <th scope="col">Products :</th>
      </tr>
    </thead>
    <tbody>
       @for ($i = 0; $i < count($brands); $i++)     

      <tr>
        <th>{{ $i+1}} </th>
        <td>{{ $brands[$i]->name }}</td>
        <td>@if ($brands[$i]->parent_id == 0)
          {{ 'Main' }} 
          @else
          {{ $brands[$i]->parent->name }}
          @endif --}}
    {{-- @if (auth()->user()->type == 'admin') --}}
    {{-- <td><a href="{{ route('brand.edit' , $brands[$i]->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a></td> --}}
    {{-- <td><a href="{{ route('brand.delete' , $brands[$i]->id) }}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" onclick="conf(event)">Delete</a></td>               --}}
    {{-- @endif --}}

    {{-- <td><a href="{{ route('brand.show' , $brands[$i]->id) }}" class="btn btn-warning btn-lg active" role="button" aria-pressed="true">Products</a></td>
        
      </tr>

      @endfor
    </tbody>
  </table> --}}
    {{-- @if (auth()->user()->type == 'admin') --}}
    {{-- <a href="{{ route('brand.create') }}" style="background-color: #602D8D ; color:white" class="btn mb-2 btn-lg active center " role="button" aria-pressed="true">Add Brand</a> --}}

    {{-- @endif --}}
    {{-- @if (auth()->user()->type == 'admin')
  <a href="{{ route('brand.create') }}" style="background-color: #602D8D ; color:white" class="btn mb-2 btn-lg active center " role="button" aria-pressed="true">Add Brand</a>
      
  @endif --}}

</x-back-office.dashboard-layout>
