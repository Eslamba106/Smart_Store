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


    <a href="{{ route('admin.brands.create') }}">
        <button class="btn ml-5 mb-2 btn-dark">اضافة براند</button>
    </a>
    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        <x-form.input name="name" placeholder="اسم البراند" class="mx-2 input-group-sm" :value="request('name')" />
        <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
    </form>
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
                            class="btn btn-sm btn-outline-success">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.brands.delete', $brand->id) }}" method="post">
                            @csrf
                            {{-- Form Method Spoofing --}}
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No Brands Defined.</td>
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
