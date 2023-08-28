<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tivo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Tivo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon">
    <title>Sohojogi - @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/vector-map.css')}}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/custom.css')}}">
    <link id="color" rel="stylesheet" href="{{ asset('public/admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/assets/css/responsive.css')}}">
    @yield('css')
  </head>
  <body onload="startTime()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            <div class="logo-header-main"><a href="index.html"><img class="img-fluid for-light img-100" src="{{ asset('public/admin/assets/images/logo/logo2.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('public/admin/assets/images/logo/logo.png') }}" alt=""></a></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
            <div class="left-menu-header">
              <ul class="app-list">
                <li class="onhover-dropdown">
                  <div class="app-menu"> <i data-feather="folder-plus"></i></div>
                  <ul class="onhover-show-div left-dropdown">
                    <li> <a href="file-manager.html">File Manager</a></li>
                    <li> <a href="kanban.html"> Kanban board</a></li>
                    <li> <a href="social-app.html"> Social App</a></li>
                    <li> <a href="bookmark.html"> Bookmark</a></li>
                  </ul>
                </li>
              </ul>
              
            </div>
          </div>
          <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
              <li> 
                <div class="right-header ps-0">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text mobile-search"><i class="fa fa-search"></i></span></div>
                    <input class="form-control" type="text" placeholder="Search Here........">
                  </div>
                </div>
              </li>
              <li class="serchinput">
                <div class="serchbox"><i data-feather="search"></i></div>
                <div class="form-group search-form">
                  <input type="text" placeholder="Search here...">
                </div>
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li><i data-feather="bell">            </i>
                    <h6 class="f-18 mb-0">Notitications</h6>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0"><i data-feather="truck"></i></div>
                      <div class="flex-grow-1">
                        <p><a href="order-history.html">Delivery processing </a><span class="pull-right">6 hr</span></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0"><i data-feather="shopping-cart"></i></div>
                      <div class="flex-grow-1">
                        <p><a href="cart.html">Order Complete</a><span class="pull-right">3 hr</span></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0"><i data-feather="file-text"></i></div>
                      <div class="flex-grow-1">
                        <p><a href="invoice-template.html">Tickets Generated</a><span class="pull-right">1 hr</span></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0"><i data-feather="send"></i></div>
                      <div class="flex-grow-1">
                        <p><a href="email_inbox.html">Delivery Complete</a><span class="pull-right">45 min</span></p>
                      </div>
                    </div>
                  </li>
                  <li><a class="btn btn-primary" href="javascript:void(0)">Check all notification</a></li>
                </ul>
              </li>
              <li class="onhover-dropdown">
                <div class="message"><i data-feather="message-square"></i></div>
                <ul class="message-dropdown onhover-show-div">
                  <li><i data-feather="message-square">            </i>
                    <h6 class="f-18 mb-0">Messages</h6>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/3.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Emay Walter</a></h5>
                        <p>Do you want to go see movie?</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/6.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Jason Borne</a></h5>
                        <p>Thank you for rating us.</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/10.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Sarah Loren</a></h5>
                        <p>What`s the project report update?</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li><a class="btn btn-primary" href="email_inbox.html">Check Messages</a></li>
                </ul>
              </li>
              <li class="maximize"><a href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
              
              <li class="profile-nav onhover-dropdown">
                <div class="account-user"><i data-feather="user"></i></div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="#"><i class="icofont icofont-contacts text-dark"></i> <span>&nbsp;ID {{ Auth::user()->id+100000 }}</span></a></li>
                  {{-- <li><a href="email_inbox.html"><i data-feather="mail" ></i><span>Inboxes</span></a></li> --}}
                  <li><a href="{{ route('admin_profile') }}"><i class="icofont icofont-businessman text-dark"></i> <span>&nbsp;My Profile</span></a></li>
                  <li><a href="{{ route('admin_logout') }}"><i data-feather="log-in"> </i><span>Log Out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper">
              <a href="index.html">
                @php
                $logo = DB::table('logos')->where('logo_delete',0)->where('logo_for','Admin')->where('logo_position','admin_top')->where('logo_status','Active')->first();
                @endphp
                @if ($logo)
                  @if($logo->logo_type=='text')
                      <span>
                          {{ $logo->logo_image }}
                      </span>
                      @else
                          <img src="{{ asset($logo->logo_image) }}" alt="">
                      @endif
                  @else    
                @endif
              </a>
              <div class="back-btn"><i data-feather="grid"></i></div>
              <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="sidebar-list">
                    
                    <a class="sidebar-link sidebar-title link-nav" href="admin-home"><i data-feather="home"> </i><span>Home </span></a>
                  </li>
                  {{-- <li class="pin-title sidebar-list">
                    <h6>Admin Section</h6>
                  </li> --}}
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i data-feather="users"></i><span >Admin Section</span></a>
                    <ul class="sidebar-submenu">
                      <li><a  href="all-admins">All Admin</a></li>
                      <li><a  href="logo">Logo</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)"><i  class="fa fa-user-md text-white" style="margin-right:20px;padding:2px 0px 2px 4px"></i><span >Doctor Section</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="">All Doctors</a></li>
                      <li><a href="">Pending request</a></li>
                      <li><a href="doctor-other-option">Others</a></li>
                    </ul>
                  </li>
                  
                  
                  
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          @yield('content')
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 p-0 footer-left">
                <p class="mb-0">
                  @php
                  $logo = DB::table('logos')->where('logo_delete',0)->where('logo_for','Admin')->where('logo_position','admin_bottom')->where('logo_status','Active')->first();
                  @endphp
                  Copyright © {{ date('Y') }} 
                  @if ($logo && $logo->logo_type=='text')
                      all site reserved by {{ $logo->logo_image }}
                  @elseif($logo && $logo->logo_type=='image')
                  <img src="{{ asset($logo->logo_image) }}" height="60px" width="200px" alt="">
                  @endif
                </p>
              </div>
              {{-- <div class="col-md-6 p-0 footer-right">
                <p class="mb-0 text-uppercase"><button class="btn btn-dark btn-square py-0 px-2  text-uppercase" data-bs-trigger="hover" data-container="body" data-bs-toggle="popover" data-bs-placement="top" title="MD Mutasim Naib Sumit" data-bs-content="Software Eng. at Incepta Pharmaceutical , mutasimnaibsumit0@gmail.com , 01724698392">Designed & Developed By MD. Mutasim Naib Sumit</button></p>
              </div> --}}
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('public/admin/assets/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('public/admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('public/admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('public/admin/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('public/admin/assets/js/config.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/chartist/chartist.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/prism/prism.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-au-mill.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-in-mill.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/dashboard/default.js')}}"></script>
    {{-- <script src="{{ asset('public/admin/assets/js/notify/index.js')}}"></script> --}}
    <script src="{{ asset('public/admin/assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{ asset('public/admin/assets/js/popover-custom.js')}}"></script>
    @yield('js')
    <!-- Template js-->
    <script src="{{ asset('public/admin/assets/js/script.js')}}"></script>
    {{-- <script src="{{ asset('public/admin/assets/js/theme-customizer/customizer.js')}}">  </script> --}}
    <!-- login js-->
  </body>
</html>