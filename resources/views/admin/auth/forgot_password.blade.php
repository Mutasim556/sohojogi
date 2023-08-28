@extends('layouts.auth')
@section('title')
    Sohojogi - Forgot Password
@endsection
@section('auth_content')
<div>
    {{-- <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo2.png" alt="looginpage"></a></div> --}}
    <div class="login-main"> 

        <form class="theme-form" id="forget_password_form" method="post">
            @csrf
            <h4 class="text-center">Forget your Password?</h4>
            <p class="text-center">Enter your email to send reset code</p>
            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="text" name="email" placeholder="Email" autocomplete="off">
                </div>
                <span class="text-danger" id="forget_email_error"></span>
               
            </div>
            
            <div class="form-group mt-3">
                <button class="btn btn-info btn-square form-control" id="forget_password_button" type="submit">Send reset code &nbsp;&nbsp;<i class="fa fa-send"></i></button>
            </div>
            <div class="form-group text-right">
                <a href="{{ url('/') }}">Want to login?</a>
            </div>
        
        {{-- <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p> --}}
        </form>
    </div>
</div>
@endsection
@section('auth_js')
<script src="{{ asset('public/admin/custom/forgot_password.js')}}"></script>
@endsection