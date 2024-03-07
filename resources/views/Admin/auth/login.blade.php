@include('layouts.dashboard.header')

<div class="login-box">
    @if ($errors->has('loginError'))
    <div class="alert alert-danger">
        {{ $errors->first('loginError') }}
    </div>
@endif
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">تسجيل الدخول</p>

            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <x-form.input name="email" placeholder="username or email" />
                    {{-- <input type="text" name="email" class="form-control" placeholder="username or email"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="input-group mb-3">
                    <x-form.input type="password" name="password" placeholder="Password" />
                    {{-- <input type="password" name="password" class="form-control" placeholder="Password"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>

@include('layouts.dashboard.footer')
