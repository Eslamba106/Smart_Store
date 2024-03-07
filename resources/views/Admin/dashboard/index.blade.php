{{-- @extends('layouts.dashboard.dashboard')
@section('title')
الرئيسية
@endsection
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الرئيسية</li>
@endsection

@section('page_name')
الرئيسية
@endsection --}}

<x-back-office.dashboard-layout title="الرئيسية">
    <x-slot:breadcrumb >
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">الرئيسية</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- @section('breadcrumb') --}}
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الرئيسية</li>
                            {{-- @show --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </x-slot:breadcrumb>
</x-back-office.dashboard-layout>