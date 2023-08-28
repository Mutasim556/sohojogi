@extends('layouts.admin')
@section('title')
    Home
@endsection


@section('content')
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Default</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Default</li>
          </ol>
        </div>
      </div>
    </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default">
        <div class="row">
        <div class="col-xxl-6 col-xl-5 col-lg-6 dash-45 box-col-40 mx-auto" >
            <div class="card profile-greeting" style="padding-bottom: 100px">               
            <div class="card-body">
                <div class="d-sm-flex d-block justify-content-between">
                <div class="flex-grow-1"> 
                    <div class="weather d-flex">
                    <h2 class="f-w-400"> <span>28<sup><i class="fa fa-circle-o f-10"></i></sup>C </span></h2>
                    <div class="span sun-bg"><i class="icofont icofont-sun font-primary"></i></div>
                    </div><span class="font-primary f-w-700">Sunny Day</span>
                    <p>Beautiful Sunny Day Walk</p>
                </div>
                <div class="badge-group">
                    <div class="badge badge-light-primary f-12"><i class="fa fa-clock-o"></i><span id="txt"></span></div>
                </div>
                </div>
                <div class="greeting-user"> 
                <div class="profile-vector">
                    <ul class="dots-images">
                    <li class="dot-small bg-info dot-1"></li>
                    <li class="dot-medium bg-primary dot-2"></li>
                    <li class="dot-medium bg-info dot-3"></li>
                    <li class="semi-medium bg-primary dot-4"></li>
                    <li class="dot-small bg-info dot-5"></li>
                    <li class="dot-big bg-info dot-6"></li>
                    <li class="dot-small bg-primary dot-7"></li>
                    <li class="semi-medium bg-primary dot-8"></li>
                    <li class="dot-big bg-info dot-9"></li>
                    </ul>
                    {{-- <img class="img-fluid" src="{{ asset('public/admin/assets/images/dashboard/default/profile.png') }}" alt=""> --}}
                    <ul class="vector-image"> 
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon1.png') }}" alt=""></li>
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon3.png') }}" alt=""></li>
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon4.png') }}" alt=""></li>
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon5.png') }}" alt=""></li>
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon6.png') }}" alt=""></li>
                    <li> <img src="{{ asset('public/admin/assets/images/dashboard/default/ribbon7.png') }}" alt=""></li>
                    </ul>
                </div>
                <h4><a href="user-profile.html"><span>Welcome </span> {{ Auth::user()->name }}  </a><span class="right-circle"><i class="fa fa-check-circle font-primary f-14 middle"></i></span></h4>
                {{-- <div><span class="badge badge-primary">Your 5</span><span class="font-primary f-12 middle f-w-500 ms-2"> Task Is Pending</span></div> --}}
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
@endsection
@section('js')
@if (Session::get('admin_login_success'))
    <script>
        var notify = $.notify('<i class="icofont icofont-checked"></i><strong>Hello {{ Auth::user()->name }} !</strong> ', {
            type: 'dark',
            allow_dismiss: true,
            showProgressbar: true,
            // spacing:10,
            timer: 2000,
            placement:{
                from:'bottom',
                align:'right'
            },
            animate:{
                enter:'animated fadeInUp',
                exit:'animated fadeOutDown'
            },
            
            delay: 1000,
        });
        setTimeout(function() {
            notify.update('progress', 50);
            notify.update('type', 'primary');
            notify.update('message', '<i class="icofont icofont-flora-flower"></i> <strong> Wlcome to Sohojogi</strong>');
        }, 2000);

    </script>
@endif
@endsection