<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\auth\authRequest;
use App\Http\Requests\admin\auth\resetPasswordrequest;
use App\Mail\admin\forgetPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class authController extends Controller
{
    //login
    public function Login(authRequest $data){
        if(Auth::attempt($data->only('email','password'))){
            return redirect()->route('home')->with('admin_login_success',1);
        }else{
           return redirect()->back()->with('error_login','1')->withInput($data->all());
        }
    }

    //logout
    public function Logout(){
        Auth::logout();
        return redirect('/')->with('admin_logout_success',1);
    }    
    
    //forgot password
    public function ForgotPasswordForm(){
        return view('admin.auth.forgot_password');
    }

    public function ForgotPasswordMail(Request $data){
        $data->validate([
            'email' => 'required|email|exists:users,email|max:50',
        ]);
        $random = rand(100000,999999);
        $mail=Mail::to($data->email)->send(new forgetPasswordMail($random));

        $check = DB::table('password_reset_tokens')->where('email',$data->email)->first();
        if($check){
            $insert = DB::table('password_reset_tokens')->where('email',$data->email)->update([
                'token' => $random,
                'created_at'=>Carbon::now(),
            ]);
        }else{
            $insert = DB::table('password_reset_tokens')->updateOrInsert([
                'email' => $data->email,
                'token' => $random,
                'created_at'=>Carbon::now(),
            ]);
        }
        

        if($mail&&$insert){
            return $insert;
        }else{
            return response()->json([
                'message'=>'Something went worng.Please try again after sometimes'
            ],422);
        }
    }

    //reset password 
    public function ResetPasswordForm(){
        return view('admin.auth.reset_password');
    }

    public function ResetPassword(resetPasswordrequest $data){
        $check  = DB::table('password_reset_tokens')->where('email',$data->email)->where('token',$data->code)->first();
        if($check){
            User::where('email',$data->email)->update([
                'password'=>Hash::make($data->new_password),
                'updated_at'=>Carbon::now(),
            ]);
            return[
                'ok'=>1,
            ];
        }else{
            return [
                'ok'=>0,
            ];
        }
    }
}
