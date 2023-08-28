<?php

use App\Http\Controllers\admin\admin\adminController;
use App\Http\Controllers\admin\adminProfileController;
use App\Http\Controllers\admin\auth\authController;
use App\Http\Controllers\admin\logo\LogoController;
use App\Http\Controllers\doctor\doctorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.auth.login');
})->name('login');


Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('status_check');


//admin section 

//admin authentication
Route::controller(authController::class)->group(function(){
    Route::post('admin-login','Login')->name('admin_login');
    Route::get('admin-logout','Logout')->name('admin_logout');

    //forgot password
    Route::get('admin-forget-password','ForgotPasswordForm')->name('admin_forgot_password');
    Route::post('admin-forget-password','ForgotPasswordMail')->name('admin_forgot_password');

    //reset password
    Route::get('admin-reset-password','ResetPasswordForm')->name('admin_reset_password');
    Route::post('admin-reset-password','ResetPassword')->name('admin_reset_password');
});
//admin crud
Route::middleware('auth','status_check')->group(function(){
    //all admins
    Route::controller(adminController::class)->group(function(){
        Route::get('all-admins','AllAdmins')->name('all_admins');
        Route::post('insert-admin','InsertAdmin');
        Route::post('search-admin','SearchAdmin');
        Route::get('update-admin-status/{id}','UpdateAdminStatus');
        Route::get('get-admin-info/{id}','GetAdminInfo');
        Route::post('update-admin','UpdateAdmin');
        Route::get('delete-admin/{id}','DeleteAdmin');
    });

    //admin profile
    Route::controller(adminProfileController::class)->group(function(){
        Route::get('admin-profile','AdminProfile')->name('admin_profile');
        Route::post('update-basic-info','UpdateBasicInfo')->name('update_basic_info');
        Route::post('update-password','UpdatePassword')->name('update_password');
    });

    //doctors
    Route::controller(doctorController::class)->group(function(){
        Route::get('all-doctors','AllDoctors')->name('all_doctors');
        Route::get('doctor-other-option','DoctorOtherOption');
        Route::post('/doctor-speciality','DoctorSpeciality');
        Route::get('get-doctor-speciality','GetDoctorSpeciality');
        Route::get('doctor-speciality-update/{id}','DoctorSpecialityUpdate');
        Route::get('doctor-speciality-delete/{id}','DoctorSpecialityDelete');
        Route::post('doctor-chamber','DoctorChamber');
        Route::post('get-doctor-chamber','GetDoctorChamber');
    });

    //logo
    Route::controller(LogoController::class)->group(function(){
        Route::get('logo','GetLogo')->name('logo');
        Route::post('upload-logo','UploadLogo')->name('upload_logo');
        Route::post('search-logo','SearchLogo')->name('search_logo');
        Route::get('/logo-status-change/{id}','LogoStatusChange');
        Route::get('/delete-logo/{id}','DeleteLogo');
    
    });

});
