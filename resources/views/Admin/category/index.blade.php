<x-back-office.dashboard-layout title="الاقسام">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الاقسام</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الاقسام</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
    

<a href="{{ route('admin.categories.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >اضافة قسم</button>
</a>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="name" placeholder="اسم القسم" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>الكود</th>
            <th>الاسم</th>
            <th>القسم الرئيسي</th>
            {{-- <th>Status</th> --}}
            <th>اضيف في</th>
            <th colspan="2">العمليات</th>
        </tr>
    </thead>
    <tbody>
        {{-- @if ($categories->count()) --}}
        @forelse ($categories as $category)
            <tr>
                <td><img src="{{ asset('category_images/'.$category->image) }}" height="50" alt=""></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_name ?? "Main" }}</td>
                {{-- <td>{{ $category->status }}</td> --}}
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="btn btn-sm btn-outline-success">تعديل</a>
                </td>
                <td>
                    <form action="{{ route('admin.categories.delete', $category->id) }}" method="post">
                        @csrf
                        {{-- Form Method Spoofing --}}
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No Categories Defined.</td>
            </tr>
        @endforelse
        {{-- @else

        @endif --}}
    </tbody>
</table>

{{ $categories->withQueryString()->appends(['search' => 1])->links() }}
</x-back-office.dashboard-layout>