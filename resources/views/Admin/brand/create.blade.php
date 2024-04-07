<x-back-office.dashboard-layout title="{{ __('dashboard/brand/create.add_brand') }}">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">{{ __('dashboard/brand/create.add_new_brand') }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('dashboard/brand/create.home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ route('admin.brands.index') }}">{{ __('dashboard/brand/create.brands') }}</a></li>
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
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">{{ __('dashboard/brand/create.add_brand') }}</h5>
                        </div>

                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('admin.brands.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                                    @endif
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/brand/create.brand_name') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="name"
                                            value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">{{ __('dashboard/brand/create.main_brand') }}</label>
                                        <select name="parent_id" id="validationCustom01" class="form-control">
                                            <option value=""> </option>
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="form-group mb-0">
                                        <label for="validationCustom01" class="mb-1">الصورة</label>
                                        <input class="form-control dropify"
                                            data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}"
                                            id="validationCustom01" type="file" name="image">
                                    </div> --}}

                                    {{-- </div> --}}


                                    <div class="modal-footer">
                                        <button class="btn" style="background-color: #602D8D ; color:white"
                                            type="submit">{{ __('dashboard/brand/create.save') }}</button>
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


{{-- @extends('layouts.navbar')


@section('content2')
<div class="page-body" >  
    
    <div class="container-fluid" > 
        <div class="row product adding">
            <div class="col-xl-12">
                <div class="card">


                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Brand</h5>
                        </div>

                        <div class="card-body">
                        <div class="digital-add needs-validation">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                
                            @endif
                                        <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Name</label>
                                                <input class="form-control" id="validationCustom01" type="text" name="name" value="">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Main Company</label>
                                                <select name="parent_id" id="validationCustom01" class="form-control" >
                                                    <option value=""></option>
                                                    @foreach ($mainbrand as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                
                                <div class="modal-footer">
                                    <button class="btn" style="background-color: #602D8D ; color:white" type="submit">Add</button>
                                </div>
                            
                           
                        </form>
                        @if(Session::has('message'))
                        <script>
                            swal("Message" , "{{ Session::get('message') }}" , 'success' , {
                                button: true ,
                                button:"ok",
                                timer:3000,
                                dangerMode: true
                            })
                        </script>
                    @endif
                        </div>
                    </div>
                </div>
            </div>  
         </div>  
    </div>  

</div>
@endsection --}}