<x-back-office.dashboard-layout title="{{ __('dashboard/category/category.categories') }}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/category/category.categories') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/category/category.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard/category/category.categories') }}</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    

<a href="{{ route('admin.categories.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >{{ __('dashboard/category/category.add_category') }}</button>
    {{-- <button class="btn ml-5 mb-2 btn-dark" >{{ __('dashboard/category/category.add_category') }}</button> --}}
</a>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between m-2">
    <x-form.input name="name" placeholder="{{ __('dashboard/category/category.name') }}" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>{{ __('dashboard/category/category.image') }}</th>
            <th>{{ __('dashboard/category/category.code') }}</th>
            <th>{{ __('dashboard/category/category.name') }}</th>
            <th>{{ __('dashboard/category/category.main_category') }}</th>
            {{-- <th>Status</th> --}}
            <th>{{ __('dashboard/category/category.created_at') }}</th>
            <th colspan="2">{{ __('dashboard/category/category.operation') }}</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($categories->count()) --}}
        @forelse ($categories as $category)
            <tr>
                <td><img src="{{ $category->image_url }}" height="50" alt=""></td>
                {{-- <td><img src="{{ asset('category_images/'.$category->image) }}" height="50" alt=""></td> --}}
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_name ?? "Main" }}</td>
                {{-- <td>{{ $category->status }}</td> --}}
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="btn btn-sm btn-outline-success">{{ __('dashboard/category/category.edit') }}</a>
                </td>
                <td>
                    <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('dashboard/category/category.delete') }}</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">{{ __('dashboard/category/category.defined') }}</td>
            </tr>
        @endforelse
        {{-- @else

        @endif --}}
    </tbody>
</table>

{{ $categories->withQueryString()->appends(['search' => 1])->links() }}
</x-back-office.dashboard-layout>