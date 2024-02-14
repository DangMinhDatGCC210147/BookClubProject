<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Leader - Book Club</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('./assets/images/favicon.ico') }}">
<!-- Nếu bạn sử dụng CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css">
    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/bootstrap.min.css') }}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/vendor/cryptocurrency-icons.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/plugins/plugins.css') }}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/helper.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{ asset('./assets/css/style-primary.css') }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

</head>

<body class="skin-dark">

    <div class="main-wrapper">


        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto main-logo">
                        <a href="{{ route('leaders.index')}}">
                            <img src="{{asset('./images/logo/logoOf.png')}}" alt="Logo">
                            <img src="{{asset('./images/logo/logoOf.png')}}" class="logo-light" alt="Logo">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    <!--Header Search-->
                                    <div class="col-auto">

                                        <div class="header-search">

                                            {{-- <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button> --}}

                                            {{-- <div class="header-search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="Search Here">
                                                    <button><i class="zmdi zmdi-search"></i></button>
                                                </form>
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div> --}}

                                        </div>
                                    </div>

                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="{{asset('./../../assets/images/avatar/Asset1.png')}}">
                                            <span class="status"></span>
                                            {{-- <span class="name"></span> --}}
                                        </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a>{{ Auth::user()->name }}</a></h5>
                                                <a class="mail">{{ Auth::user()->email }}</a>
                                            </div>
                                            <div class="body">
                                                {{-- <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-account"></i>Profile</a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-email-open"></i>Inbox</a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-wallpaper"></i>Activity</a></li>
                                                </ul> --}}
                                                <ul>
                                                    {{-- <li><a href="#"><i class="zmdi zmdi-settings"></i>Setting</a></li> --}}
                                                    <li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            <i class="zmdi zmdi-lock-open"></i> Sign out
                                                        </a>
                                                    </li>                                                                                                   
                                                </ul>
                                                {{-- <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-paypal"></i>Payment</a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-google-pages"></i>Invoice</a></li>
                                                </ul> --}}
                                            </div>
                                        </div>

                                    </li>

                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li><a href="{{route('leaders.index')}}"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-notepad"></i> <span>Forms</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('members.create')}}"><span>Member</span></a></li>
                                <li><a href="{{ route('events.create')}}"><span>Event</span></a></li>
                                <li><a href="{{ route('attendances.create')}}"><span>Attendance</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-layout"></i> <span>Table</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('members.index')}}"><span>Members</span></a></li>
                                <li><a href="{{ route('events.index')}}"><span>Events</span></a></li>
                                <li><a href="{{ route('events.list')}}"><span>List Register Event</span></a></li>
                                <li><a href="{{ route('attendances.index')}}"><span>List Attedance</span></a></li>
                                <li><a href="{{ route('funds.index') }}"><span>Pay Fund</span></a></li>
                                <li><a href="{{ route('submit-paying.index')}}"><span>List Student Submit Fund</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-layers"></i> <span>Pages</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('user.index')}}"><span>User page</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->
        @yield('content')
        <!-- Footer Section Start -->
        <div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">2024 &copy; <a href="#">BookClub</a></p>
                </div>

            </div>
        </div><!-- Footer Section End -->

    </div>

    <!-- JS
============================================ -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    @include('sweetalert::alert')
    <!-- Global Vendor, plugins & Activation JS -->
    <script src="{{ asset('./assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('./assets/js/vendor/bootstrap.min.js') }}"></script>
    <!--Plugins JS-->
    <script src="{{ asset('./assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/tippy4.min.js') }}"></script>
    <!--Main JS-->
    <script src="{{ asset('./assets/js/main.js') }}"></script>

    <!-- Plugins & Activation JS For Only This Page -->

    <!--Moment-->
    <script src="{{ asset('./assets/js/plugins/moment/moment.min.js') }}"></script>

    <!--Daterange Picker-->
    <script src="{{ asset('./assets/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/daterangepicker/daterangepicker.active.js') }}"></script>

    <!--Echarts-->
    <script src="{{ asset('./assets/js/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/chartjs/chartjs.active.js') }}"></script>

    <!--VMap-->
    <script src="{{ asset('./assets/js/plugins/vmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/vmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/vmap/maps/samples/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/vmap/vmap.active.js') }}"></script>
    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ asset('./assets/js/plugins/footable/footable.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/footable/footable.active.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/datatables/datatables.active.js') }}"></script>
    {{-- Form --}}
    <script src="{{ asset('./assets/js/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/select2/select2.active.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('./assets/js/plugins/dropify/dropify.active.js') }}"></script>

</body>

</html>