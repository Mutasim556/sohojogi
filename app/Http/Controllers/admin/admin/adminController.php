<?php

namespace App\Http\Controllers\admin\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\insertAdminRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function AllAdmins(){
        return view('admin.admin.all_admin');
    }
    //create admin
    public function InsertAdmin(insertAdminRequest $data){
        $create = User::create([
            'name'=>$data->name,
            'email'=>$data->email,
            'role'=>1,
            'password'=>Hash::make($data->password),
        ]);
        

        if($create){
            return response()->json([
                'success' => 1,
            ],200);
        }else{
            return response()->json([
                'message'=>'Something went wrong',
            ],422);
        }

    }
    //serach admin
    public function SearchAdmin(Request $data){
        $users = User::where('role',1)->where('delete_user',0);

        if($data->admin_name){
            $users = $users->where('name','LIKE',"%".$data->admin_name."%");
        }
        if($data->admin_email){
            $users = $users->where('email','LIKE',"%".$data->admin_email."%");
        }

        $users = $users->orderBy('id','DESC')->get();
        return [
            'users'=>$users,
        ];
    }

    //update admin status

    public function UpdateAdminStatus(Request $data){
        $user = User::where('id',$data->id)->select('status')->first();
        if($user->status=='Active'){
            User::where('id',$data->id)->update([
                'status' => 'Inactive'
            ]);
            $user = User::where('id',$data->id)->select('id','status')->first();
            return $user;
        }else{
            User::where('id',$data->id)->update([
                'status' => 'Active'
            ]);
            $user = User::where('id',$data->id)->select('id','status')->first();
            return $user;
        }
       
    }

    //get admin data
    public function GetAdminInfo(Request $data){
        $user = User::where('id',$data->id)->first();
        return $user;
    }

    //update admin data
    public function UpdateAdmin(Request $data){
        $data->validate([
            'name'=>'required|max:70',
            'email'=>'required|email|max:50|unique:users,email,'.$data->admin_id,
        ]);

        $update = User::where('id',$data->admin_id)->update([
            'name'=>$data->name,
            'email'=>$data->email,
            'updated_at'=>Carbon::now(),
        ]);

        if($update){
            $user = User::where('id',$data->admin_id)->first();
            return $user;
        }else{
            return response()->json([
                'message'=>'Something went wrong',
            ],422);
        }
    }

    public function DeleteAdmin(){
        User::where('id',request()->id)->update([
            'delete_user'=>1,
            'updated_at'=>Carbon::now(),
        ]);
        return [
            'message'=>1,
        ];
    }

}
