@extends('layouts.admin')
@section('title')
    All Admin
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/datatable-extension.css') }}">
<link href="{{ asset('public/admin/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/sweetalert2.min.css')}}">
@endsection

@section('content')
<!-- Start add admin modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create Admin</h5>
          {{-- <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <i class="fa fa-close"></i>
          </button> --}}
          <button class="btn btn-sm btn-danger py-1 px-2" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" ></i></button>
          
        </div>
        <div class="modal-body">
            <form class="theme-form" action="" id="add_admin_form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for=""><strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                        <label for=""><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" class="form-control" name="password" >
                    </div>
                </div>
                <div class="modal-footer p-0 py-4">
                    <button type="button" class="btn btn-secondary btn-square mx-3" data-bs-dismiss="modal" id="modal_close">Close</button>
                    <button type="submit" class="btn btn-primary btn-square" id="add_admin_button" data-bs-backdrop="static" data-bs-keyboard="false">Create Admin</button>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>
{{-- End add admin modal --}}

<!-- Start edit admin modal -->
<div class="modal fade" id="exampleModalLongEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Admin</h5>
          <button class="btn btn-sm btn-danger py-1 px-2" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" ></i></button>
        </div>
        <div class="modal-body">
            <form class="theme-form" action="" id="edit_admin_form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for=""><strong>Name</strong></label>
                        <input type="text" class="form-control" name="name" id="edit_name">
                        <input type="hidden" class="form-control" name="admin_id" id="admin_id">
                        <input type="hidden" class="form-control" id="trid">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                        <label for=""><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" id="edit_email">
                    </div>
                </div>
                <div class="modal-footer p-0 py-4">
                    <button type="button" class="btn btn-secondary btn-square" data-bs-dismiss="modal" id="edit_modal_close">Close</button>
                    <button type="submit" class="btn btn-primary btn-square" id="edit_admin_button" data-bs-backdrop="static" data-bs-keyboard="false">Update Admin</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
{{-- End edit admin modal --}}
<div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6">
          <h3>Admins</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Admins</li>
            <li class="breadcrumb-item active">All Admin</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                  <h4 class="text-center">Admin Lists</h4>
                </div>
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <button style="float: right" class="btn btn-info btn-square" data-bs-toggle="modal" data-bs-target="#exampleModalLong" style="cursor:pointer">Create Admin</button>
                        </div>
                    </div>
                </div>
                <form class="form theme-form" action="" id="search_admin_form" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-1">
                            <label for="">Admin Name</label>
                            <input type="text" class="form-control" name="admin_name">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-1">
                            <label for="">Admin Email</label>
                            <input type="text" class="form-control" name="admin_email">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="mb-1">
                            <label for="">Admin Role</label>
                            <input type="text" class="form-control" name="admin_role">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-4 col-sm-12" style="line-height: 100px">
                        <div class="mb-1">
                            <button class="btn btn-primary btn-square form-control" id="search_admin_button" type="submit">Search <i class="icofont icofont-job-search"></i></button>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 col-sm-12">
                        <button class="btn btn-danger btn-square" id="reset_button" type="button">Reset <i class="fa fa-refresh" aria-hidden="true"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
                <input type="hidden" id="my_id" value="{{ Auth::user()->id }}">
                <div class="card-body ibox-body d-none ">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('public/admin/assets/js/sweet-alert/sweetalert2.js')}}"></script>

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
{{-- <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/custom.js') }}"></script> --}}
<script src="{{ asset('public/admin/switchery/switchery.min.js')}}"></script>
<script src="{{ asset('public/admin/custom/all_admin.js')}}"></script>
<script>
    $('#reset_button').click(function(){
        $('#search_admin_form').trigger('reset');
        $('.ibox-body').addClass(' d-none');
    })
</script>
@endsection