@extends('layouts.front.header')

@section('content')
    <div class="wrap">

        <div class="main">
            <div class="content">
                {{-- <div class="register_account"> --}}
                    <h3>Register New Account</h3>
                    <form action="{{ route('admin.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Admin.auth._form')
                        {{-- <div class="search">
                            <div><button type="submit" class="grey">Create Account</button></div>
                        </div> --}}
                        <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp;
                                Conditions</a>.</p>
                        <div class="clear"></div>
                    </form>
                {{-- </div> --}}
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
@endsection
