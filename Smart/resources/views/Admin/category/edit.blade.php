@extends('layouts.navbar')


@section('content')
<div class="page-body" >  
    {{-- Add Product --}}
    <div class="container-fluid" > 
        <div class="row product adding">
            <div class="col-xl-12">
                <div class="card">


                        <div class="card-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Dapartment</h5>
                        </div>

                        <div class="card-body">
                        <div class="digital-add needs-validation">
                        <form action="{{ route('category.update' , $query->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                                
                            @endif
                                        <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Name</label>
                                                <input class="form-control" id="validationCustom01" type="text" name="name" value="{{ $query->name }}">
                                            </div>
            
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Main Department</label>
                                                <select name="parent_id" id="validationCustom01" class="form-control" >
                                                    
                                                    @if ($query->parent_id == 0)
                                                    <option value="{{ $query->parent_id }}">Main</option>
                                                    @else
                                                    <option value="{{ $query->parent_id }}">{{ $query->child->name }}</option>
                                                    @endif

                                                    @foreach ($categories as $item)
                                                        @if ($item->id == $query->id  || $item->id == $query->parent_id )
                                                            @continue
                                                        @else
                                                            
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                              
                                            <div class="form-group mb-0">
                                                <label for="validationCustom01" class="mb-1">Image</label>
                                                <input class="form-control dropify" data-default-file="{{ asset('category_images/'.$query->image) }}" id="validationCustom01" type="file" name="image">
                                            </div>
                    
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