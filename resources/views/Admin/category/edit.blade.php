<x-back-office.dashboard-layout title="{{ __('dashboard/category/edit.edit_category') .' '.$query->name }} ">

    <x-slot:breadcrumb>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/category/edit.edit_category') .' '.$query->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/category/edit.home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a
                                    href="{{ route('admin.categories.index') }}">{{ __('dashboard/category/edit.category') }}</a></li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>


    <div class="page-body">
        {{-- Add Product --}}
        <div class="container-fluid">
            <div class="row product adding">
                <div class="col-xl-12">
                    <div class="card">


                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">{{ __('dashboard/category/edit.editCategory') }}</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.categories.update', $query->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/edit.name') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name" value="{{ $query->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/edit.main_category') }}</label>
                                        <x-form.select name="parent_id" :options="$parents"  />
                                        {{-- <select name="parent_id" id="validationCustom01" class="form-control">

                                            @if ($query->parent_id == 0)
                                                <option value="{{ $query->parent_id }}">رئيسي</option>
                                            @else
                                                <option value="{{ $query->parent_id }}">{{ $query->parent->name }}
                                                </option>
                                            @endif

                                            @foreach ($categories as $item)
                                                @if ($item->id == $query->id || $item->id == $query->parent_id)
                                                    @continue
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select> --}}
                                    </div>

                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/edit.image') }}</label>
                                        <input class="form-control dropify"
                                            {{-- data-default-file="{{ asset('category_images/' . $query->image) }}" --}}
                                            id="validationCustom01" type="file" name="image">
                                    </div>

                                    {{-- </div> --}}


                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">{{ __('dashboard/category/edit.edit') }}</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-back-office.dashboard-layout>
