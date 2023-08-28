@extends('layouts.admin')
@section('title')
    Others Option
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/datatable-extension.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/sweetalert2.min.css')}}">
<link href="{{ asset('public/admin/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Other Options</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="user"></i></a></li>
            <li class="breadcrumb-item">Doctor Section</li>
            <li class="breadcrumb-item">Others</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-5">
            <div class="card">
              <div class="card-header pb-0">
                <h4>Doctor Speciality</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs border-tab nav-danger" id="info-tab" role="tablist">
                  <li class="nav-item"><a class="nav-link active" id="add-doctor-speciality" data-bs-toggle="tab" href="#doctor-speciality" role="tab" aria-controls="doctor-speciality" aria-selected="true"><i class="fa fa-hospital-o"></i>Add Speciality</a></li>
                  <li class="nav-item"><a class="nav-link" id="view-doctor-speciality" data-bs-toggle="tab" href="#view-speciality" role="tab" aria-controls="view-speciality" aria-selected="false"><i class="fa fa-h-square"></i>View Speciality</a></li>
                </ul>
                <div class="tab-content" id="info-tabContent">
                  <div class="tab-pane fade show active" id="doctor-speciality" role="tabpanel" aria-labelledby="add-doctor-speciality">
                    <p class="mb-0">
                        <form class="theme-form" action="" method="POST" id="speciality_insert_form">
                            @csrf
                            <div class="row">
                              <div class="form-group col-xl-12">
                                <label for="">Enter Speciality</label>
                                <input type="text" class="form-control" name="speciality">
                                <span id="speciality_error" class="text-danger"></span>
                              </div>
                              <div class="form-group" style="text-align: right;float:right">
                                  <button id="speciality_insert_button" type="submit" class="btn btn-danger btn-square">Add</button>
                              </div>
                            </div>
                        </form>
                    </p>
                  </div>
                  <div class="tab-pane fade" id="view-speciality" role="tabpanel" aria-labelledby="view-doctor-speciality">
                    <div class="table-responsive theme-scrollbar" id="speciality_table">
                       
                      </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-7">
          <div class="card">
            <div class="card-header pb-0">
              <h4>Chamber</h4>
            </div>
            <div class="card-body">
              <ul class="nav nav-tabs border-tab nav-danger" id="info-tab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="add-chamber" data-bs-toggle="tab" href="#achamber" role="tab" aria-controls="achamber" aria-selected="true"><i class="fa fa-hospital-o"></i>Add Chamber</a></li>
                <li class="nav-item"><a class="nav-link" id="view-chamber" data-bs-toggle="tab" href="#vchamber" role="tab" aria-controls="vchamber" aria-selected="false"><i class="fa fa-h-square"></i>View Chamber</a></li>
              </ul>
              <div class="tab-content" id="info-tabContent">
                <div class="tab-pane fade show active" id="achamber" role="tabpanel" aria-labelledby="add-chamber">
                  <p class="mb-0">
                      <form class="theme-form" action="" method="POST" id="chamber_insert_form">
                          @csrf
                          <div class="row">
                            <div class="form-group col-xl-8">
                              <label for="">Chamber Name</label>
                              <input type="text" class="form-control" name="chamber_name">
                              <span id="chamber_name_error" class="text-danger"></span>
                            </div>
                            <div class="form-group col-xl-4">
                              <label for="">Chamber Phone</label>
                              <input type="text" class="form-control" name="chamber_phone">
                              <span id="chamber_phone_error" class="text-danger"></span>
                            </div>
                            <div class="form-group col-xl-12">
                              <label for="">Chamber Address</label>
                              <textarea rows="5" class="form-control" name="chamber_address"></textarea>
                              <span id="chamber_address_error" class="text-danger"></span>
                            </div>
                            <div class="form-group col-xl-12" style="text-align: right;float:right">
                              <button id="chamber_insert_button" type="submit" class="btn btn-danger btn-square " >Add</button>
                          </div>
                          </div>
                      </form>
                  </p>
                </div>
                
                <div class="tab-pane fade" id="vchamber" role="tabpanel" aria-labelledby="view-chamber">
                  <p class="mb-0">
                    <form class="theme-form" action="" method="POST" id="chamber_chamber_form">
                        @csrf
                        <div class="row">
                          <div class="form-group col-xl-8">
                            <label for="">Chamber Name</label>
                            <input type="text" class="form-control" name="chamber_name">
                            <span id="chamber_name_error" class="text-danger"></span>
                          </div>
                          <div class="form-group col-xl-4">
                            <label for="">Chamber Phone</label>
                            <input type="text" class="form-control" name="chamber_phone">
                            <span id="chamber_phone_error" class="text-danger"></span>
                          </div>
                          <div class="form-group col-xl-12">
                            <label for="">Chamber Address</label>
                            <input type="text" class="form-control" name="chamber_address">
                            <span id="chamber_address_error" class="text-danger"></span>
                          </div>
                          <div class="form-group col-xl-12" style="text-align: right;float:right">
                            <button id="reset_button" type="button" class="btn btn-danger btn-square ">Reset</button>
                            <button id="chamber_search_button" type="submit" class="btn btn-success btn-square " >Search</button>
                          </div>
                          {{-- <div class="form-group col-xl-12" style="text-align: left;float:left">
                            <button id="reset_button" type="buuton" class="btn btn-danger btn-square " >Reset</button>
                          </div> --}}
                        </div>
                    </form>
                  </p>
                  <div id="chamber_table" class="">

                  </div>
                </div>
                
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('public/admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('public/admin/switchery/switchery.min.js')}}"></script>
<script src="{{ asset('public/admin/assets/js/sweet-alert/sweetalert2.js')}}"></script>
<script src="{{ asset('public/admin/custom/doctor_other_option.js')}}"></script>
<script>
  $('#reset_button').click(function(){
      $('#chamber_chamber_form').trigger('reset');
      $('#chamber_table').addClass(' d-none');
  })
</script>

@endsection