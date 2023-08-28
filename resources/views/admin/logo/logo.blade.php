@extends('layouts.admin')
@section('title')
    Logo
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/admin/croppie/croppie.css')}}" />
<link href="{{ asset('public/admin/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Logo</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Admin Section</li>
            <li class="breadcrumb-item">Logo</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="div-header mt-3">
                    <h4 class="card-title text-center">Application Content Manger</h4>
                    <h4 class="card-title text-right mr-3"></h4>
                </div>
                <div class="card-body">
                    <form class="theme-form" id="web_content_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="from-group col-md-4 mt-2">
                                <label for="" class="labelcolor"><strong>Content For</strong></label>
                                <select name="content_for" id="content_for" class="form-control">
                                    <option value="" selected disabled>Please Select</option>
                                    <option value="admin">Admin</option>
                                    {{-- <option value="spark">Spark It</option> --}}
                                </select>
                            </div>
                            <div class="from-group col-md-4 mt-2">
                                <label for="" class="labelcolor"><strong>Select Position</strong></label>
                                <select name="position" id="position" class="form-control">
                                    <option value="" selected disabled>Please Select Content For First</option>
                                </select>
                            </div>
                            <div class="from-group col-md-4 mt-2">
                                <label for="" class="labelcolor"><strong>Select Type</strong></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected disabled>Please Select Position First</option>
                                </select>
                            </div>
                            <div class="from-group col-md-12 mt-2" id="upload_type">
                                
                            </div>
                            <div class="from-group col-md-12 mt-2 d-none" id="upload_image">
                                <label class="labelcolor" for="">Upload Image</label>
                                <input class="form-control" type="file" id="images" name="image">
                            </div>
                            <div class="col-md-4 text-center mt-3 d-none" id="upload-demo-div"><div id="upload-demo"></div></div>
                            <div class="from-group col-md-12 mt-3">
                                <button class="btn btn-success btn-square" style="float: right" id="web_content_buuton" type="submit" >ADD INFORMATION</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card pb-4">
                <div class="div-header mt-3">
                    <h4 class="card-title text-center">Application Content View</h4>
                    <h4 class="card-title text-right mr-3"></h4>
                </div>
                <div class="card-body px-4 mb-4">
                    <form action="" class="theme-form" id="content_search_form"  method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <label for="">For</label>
                                <select name="content_for_serach" class="form-control" id="content_for_serach" data-toggle="select2">
                                    <option value="">Please Select</option>
                                    <option value="admin">Admin</option>
                                    {{-- <option value="spark">Spark It</option> --}}
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="">Position</label>
                                <select name="position_serach" class="form-control" id="position_serach" data-toggle="select2">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <label for="">Type</label>
                                <select name="type_serach" class="form-control" id="type_serach" data-toggle="select2">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button type="submit" class="btn btn-info btn-square form-control" id="content_search_button" style="margin-top:28px; ">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body px-4 mt-4" id="search_result" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" >
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th style="color:white">For</th>
                                    <th style="color:white">Position</th>
                                    <th style="color:white">Type</th>
                                    <th style="color:white">Content</th>
                                    <th style="color:white">Status</th>
                                    <th style="color:white">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="table_data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('public/admin/assets/js/sweet-alert/sweetalert2.js')}}"></script>
<script src="{{ asset('public/admin/switchery/switchery.min.js')}}"></script>
<script src="{{ asset('public/admin/croppie/croppie.js')}}"></script>
<script src="{{ asset('public/admin/custom/logo.js')}}"></script>
@endsection