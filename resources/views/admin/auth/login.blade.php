@extends('layouts.auth')
@section('title')
    Sohojogi - Admin Login
@endsection
@section('auth_content')
<div>
    {{-- <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo2.png" alt="looginpage"></a></div> --}}
    <div class="login-main"> 

        <form class="theme-form" action="{{ route('admin_login') }}" method="post">
            @csrf
            <h4 class="text-center">Sign in to account</h4>
            <p class="text-center">Enter your email & password to login</p>
            @if (Session::get('error_login'))
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Invalid email  or password !</strong>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('status'))
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Your accout has been suspended . Please contact with your admin</strong>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('delete'))
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Your accout has been deleted . Please contact with your admin</strong>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control" type="text" name="email"  placeholder="Email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="col-form-label">Password</label>
                <div class="form-input position-relative">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    <div class="show-hide"><span class="show"></span></div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-0 mt-3">
                <a class="mt-4" href="{{ route('admin_forgot_password') }}">Forgot password?</a>
                <div class="text-end mt-3">
                <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
            </div>
        
        {{-- <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p> --}}
        </form>
    </div>
</div>
@endsection