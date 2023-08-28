<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\chamberRequest;
use App\Models\Doctor;
use App\Models\Doctor\Chamber;
use App\Models\doctor_speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class doctorController extends Controller
{
    public function AllDoctors(){
        return view('doctor.all_doctors');
    }

    public function DoctorOtherOption(){
        return view('admin.doctor.doctor_other_option');
    }

    //speciality
    public function DoctorSpeciality(Request $data){
        $data->validate([
            'speciality'=>'required|unique:doctor_specialities,speciality|max:300',
        ]);

        $create = doctor_speciality::create([
            'speciality'=>$data->speciality,
        ]);

        return $create;
    }

    public function GetDoctorSpeciality(){
        $specialities = doctor_speciality::where('speciality_delete',0)->get();
        return $specialities;
    }

    public function DoctorSpecialityUpdate(Request $data){
        $speciality = doctor_speciality::where('speciality_id',$data->id)->select('speciality_status')->first();
        if($speciality->speciality_status=='Active'){
            doctor_speciality::where('speciality_id',$data->id)->update([
                'speciality_status' => 'Inactive'
            ]);
            $speciality = doctor_speciality::where('speciality_id',$data->id)->select('speciality_id','speciality_status')->first();
            return $speciality;
        }else{
            doctor_speciality::where('speciality_id',$data->id)->update([
                'speciality_status' => 'Active'
            ]);
            $speciality = doctor_speciality::where('speciality_id',$data->id)->select('speciality_id','speciality_status')->first();
            return $speciality;
        }
    }

    public function DoctorSpecialityDelete(Request $data){
       
        doctor_speciality::where('speciality_id',$data->id)->update([
            'speciality_delete' => 1,
        ]);
        return 1;
        
    }


    public function DoctorChamber(chamberRequest $data){
        $create = Chamber::create([
            'chamber_name' => $data->chamber_name,
            'chamber_phone' => $data->chamber_phone,
            'chamber_address' => $data->chamber_address,
            'chamber_created_by' => Auth::user()->id,
            'chamber_updated_by' => Auth::user()->id,
        ]);
        return $create;
    }

    public function GetDoctorChamber(Request $data){
        $chambers = Chamber::where('chamber_delete',0);

        if($data->chamber_name){
            $chambers = $chambers->where('chamber_name','LIKE','%'.$data->chamber_name."%");
        }
        if($data->chamber_phone){
            $chambers = $chambers->where('chamber_phone','LIKE','%'.$data->chamber_phone."%");
        }
        if($data->chamber_address){
            $chambers = $chambers->where('chamber_address','LIKE','%'.$data->chamber_address."%");
        }

        $chambers =$chambers->get();

        return $chambers;
    }

    
}
