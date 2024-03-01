@extends('layouts.dashboard.dashboard')
@section('title')
    الاقسام
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الاقسام</li>
@endsection

@section('page_name')
الاقسام
@endsection
@section('content')
<a href="{{ route('admin.category.create') }}" >
    <button class="btn ml-5 mb-2 btn-dark" >اضافة قسم</button>
</a>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="name" placeholder="اسم القسم" class="mx-2 input-group-sm" :value="request('name')"/>
    <button class="btn btn-dark mx-2"><i class="fas fa-search"></i></button>
</form>
{{-- <div class="section group" >
    @foreach ($category as $item)
            <div style="width:200px ; height:250px" class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <a href=""><img  src="/category_images/{{ $item->image }}" alt="" /></a>
                
                <div class="button"><span><a href="{{ route('category.show' , $item->id) }}" class="details">Details</a></span></div>
            </div>
            @endforeach
</div> --}}
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
                    <a href="{{ route('admin.category.edit', $category->id) }}"
                        class="btn btn-sm btn-outline-success">تعديل</a>
                </td>
                <td>
                    <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
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

{{-- {{ $categories->links() }} --}}
{{ $categories->withQueryString()->appends(['search' => 1])->links() }}
@endsection