@extends('layouts.dashboard.dashboard')
@extends('layouts.dashboard.dashboard')
@section('title')
    انشاء قسم
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">انشاء قسم</li>
@endsection

@section('page_name')
    انشاء قسم
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row product adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">انشاء قسم</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">اسم القسم</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">القسم الرئيسي</label>
                                        <select name="parent_id" id="validationCustom01" class="form-control">
                                            <option value=""> </option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">الصورة</label>
                                        <input class="form-control dropify"
                                            data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}"
                                            id="validationCustom01" type="file" name="image">
                                    </div>

                                    {{-- </div> --}}


                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">حفظ</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
