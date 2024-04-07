<x-back-office.dashboard-layout title="{{ __('dashboard/category/create.add_category') }}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/category/create.add_new_category') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/category/create.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.categories.index') }}">{{ __('dashboard/category/create.categories') }}</a></li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row product adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">{{ __('dashboard/category/create.add_category') }}</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.categories.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/create.name') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/create.main_category') }}</label>
                                        <select name="parent_id" id="validationCustom01" class="form-control">
                                            <option value=""> </option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/category/create.image') }}</label>
                                        <input class="form-control dropify"
                                            data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}"
                                            id="validationCustom01" type="file" name="image">
                                    </div>

                                    {{-- </div> --}}


                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">{{ __('dashboard/category/create.save') }}</button>
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
