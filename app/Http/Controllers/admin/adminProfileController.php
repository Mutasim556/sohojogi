<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminBasicInfoUpdate;
use App\Http\Requests\admin\UpdatePassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminProfileController extends Controller
{
    public function AdminProfile(){
        $profile_info = User::where('id',Auth::user()->id)->first();
        return view('admin.admin_profile',compact('profile_info'));
    }

    public function UpdateBasicInfo(AdminBasicInfoUpdate $data){
        $update = User::where('id',Auth::user()->id)->update([
            'name' => $data->user_name,
            'email' => $data->user_email,
            'updated_at' => Carbon::now(),
        ]);

        if($update){
            return [
                'message' => 1,
            ];
        }else{
            return [
                'message' => 0,
            ];
        }
    }
    public function UpdatePassword(UpdatePassword $data){
        
        $user = User::find(Auth::user()->id);
        // return $data->new_password;
        if(Hash::check($data->old_password,$user->password)){
            $update = User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($data->new_password),
                'updated_at' => Carbon::now(),
            ]);
            return response()->json(['message'=>1]);
        }else{
            return response()->json(['message'=>'Invalid user password'],422);
        }
    }
}
