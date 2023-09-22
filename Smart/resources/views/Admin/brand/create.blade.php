@extends('layouts.navbar')


@section('content')
<div class="page-body" >  
    {{-- Add Product --}}
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
                                                        {{-- <option value="">{{ $brand->child->name}}</option> --}}
                                                </select>
                                            </div>
                                              
                                            {{-- <div class="form-group mb-0">
                                                <label for="validationCustom01" class="mb-1">Logo</label>
                                                <input class="form-control dropify" data-default-file="{{ asset('appfavicon/64e0a5a0576e919-08-2023.png') }}" id="validationCustom01" type="file" name="image_path">
                                            </div> --}}
                    
                                        </div>
                                    
                                
                                <div class="modal-footer">
                                    <button class="btn" style="background-color: #602D8D ; color:white" type="submit">Add</button>
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