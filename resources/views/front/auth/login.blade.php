@extends('layouts.front.header')

@section('content')
    <div class="wrap">

        <div class="main">
            <div class="content">
                {{-- <div class="login_panel"> --}}
                    <h3>Existing Customers</h3>
                    <p>Sign in with the form below.</p>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">

                            <x-form.input  name="email" placeholder="enter your email or user name" label="Enter Your Email" />
                        </div>
                        <div class="form-group">

                            <x-form.input type="password" name="password" placeholder="enter your password" label="Enter Your Password" />
                        </div>
                        <div class="form-group">

                            {{-- <div></div><div class="buttons"> --}}
                                <button type="submit"  class="btn btn-dark mx-2">Sign In</button>
                            {{-- </div> --}}
                            {{-- <div class="buttons"> --}}
                                {{-- <div href="{{ route('register-page') }}"><button class="grey">Register</button></div> --}}
                                <a href="{{ route('admin.register-page') }}" class="btn btn-dark">Register</a>

                            {{-- </div> --}}
                        </div>
                        {{-- <input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Username';}">
                        <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Password';}"> --}}
                    </form>
                    <p class="note">If you forgot your passoword just enter your email and click <a
                            href="#">here</a></p>
                    {{-- <div class="buttons">
                        <div><button class="grey">Sign In</button></div>
                    </div> --}}
                    {{-- <div class="buttons">
                        <a href="{{ route('register-page') }}"><button class="grey">Register</button></a>
                    </div> --}}
                {{-- </div> --}}

                <div class="clear"></div>
            </div>
        </div>
    </div>


    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
@endsection
