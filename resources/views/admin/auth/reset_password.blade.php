@extends('layouts.auth')
@section('title')
    Sohojogi - Reset Password
@endsection
@section('auth_content')
<div>
    {{-- <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo2.png" alt="looginpage"></a></div> --}}
    <div class="login-main"> 

        <form class="theme-form" id="reset_password_form" method="post">
            @csrf
            <h4 class="text-center">Reset your Password</h4>
            
            <div class="form-group mt-4">
                <div class="input-group-icon right">
                    <input class="form-control" type="text" name="email" placeholder="Enter Your Email" autocomplete="off">
                </div>
                <span class="text-danger" id="reset_email_error"></span>
               
            </div>

            <div class="form-group">
                <div class="input-group-icon right">
                    <input class="form-control" type="text" name="code" placeholder="Enter 6 Digit Code" autocomplete="off">
                </div>
                <span class="text-danger" id="reset_code_error"></span>
               
            </div>

            <div class="form-group">
                <div class="form-input position-relative">
                    <input class="form-control" type="password" id="new_password" name="new_password" placeholder="New Password" autocomplete="off">
                    <div class="show-hide"><i onclick="password_status('new_password','#new_password_eye')" id="new_password_eye" class="fa fa-eye-slash"></i></div>
                </div>
                <span class="text-danger" id="new_password_error"></span>
                
            </div>
            <div class="form-group">
                <div class="form-input position-relative">
                    <input class="form-control" type="password" id="retype_new_password" name="retype_new_password" placeholder="Re-type New Password" autocomplete="off">
                    <div class="show-hide"><i onclick="password_status('retype_new_password','#retype_new_password_eye')" id="retype_new_password_eye" class="fa fa-eye-slash"></i></div>
                </div>
                
                <span class="text-danger" id="retype_new_password_error"></span>
               
            </div>
            
            <div class="form-group">
                <button class="btn btn-info btn-square form-control" id="reset_password_button" type="submit" style="cursor: pointer">Reset Password</button>
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