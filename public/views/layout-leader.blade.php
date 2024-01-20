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
                    <div class="header-logo col-auto">
                        <a href="{{ route('leaders.index')}}">
                            <img src="{{ asset('./assets/images/logo/logo.png') }}" alt="">
                            <img src="{{ asset('./assets/images/logo/logo-light.png') }}" class="logo-light" alt="">
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
                                            <img src="#">
                                            <span class="status"></span>
                                            <span class="name"></span>
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
                        {{-- <li><a href="widgets.html"><i class="ti-palette"></i> <span>Widgets</span></a></li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Basic Elements</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="elements-alerts.html"><span>Alerts</span></a></li>
                                <li><a href="elements-accordions.html"><span>Accordions</span></a></li>
                                <li><a href="elements-avatar.html"><span>Avatar</span></a></li>
                                <li><a href="elements-badge.html"><span>Badge</span></a></li>
                                <li><a href="elements-buttons.html"><span>Buttons</span></a></li>
                                <li><a href="elements-carousel.html"><span>Carousel</span></a></li>
                                <li><a href="elements-dropdown.html"><span>Dropdown</span></a></li>
                                <li><a href="elements-list-group.html"><span>List Group</span></a></li>
                                <li><a href="elements-media.html"><span>Media</span></a></li>
                                <li><a href="elements-modal.html"><span>Modal</span></a></li>
                                <li><a href="elements-pagination.html"><span>Pagination</span></a></li>
                                <li><a href="elements-progress.html"><span>Progress Bar</span></a></li>
                                <li><a href="elements-spinners.html"><span>Spinners</span></a></li>
                                <li><a href="elements-tabs.html"><span>Tabs</span></a></li>
                                <li><a href="elements-tooltip.html"><span>Tooltip</span></a></li>
                                <li><a href="elements-typography.html"><span>Typography</span></a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="has-sub-menu"><a href="#"><i class="ti-crown"></i> <span>Advance Elements</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="elements-clipboard.html"><span>Clipboard</span></a></li>
                                <li><a href="elements-fullcalendar.html"><span>Full Calendar</span></a></li>
                                <li><a href="elements-media-player.html"><span>Media Player</span></a></li>
                                <li><a href="elements-sortable.html"><span>Sortable (Drag&Drop)</span></a></li>
                                <li><a href="elements-toastr.html"><span>Toastr</span></a></li>
                                <li><a href="elements-rating.html"><span>Rating</span></a></li>
                                <li><a href="elements-sweetalert.html"><span>Sweet Alert</span></a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="has-sub-menu"><a href="#"><i class="ti-stamp"></i> <span>Icons</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="icons-cryptocurrency.html"><span>Cryptocurrency</span></a></li>
                                <li><a href="icons-fontawesome.html"><span>Font Awesome</span></a></li>
                                <li><a href="icons-material.html"><span>Material Icon</span></a></li>
                                <li><a href="icons-themify.html"><span>Themify Icon</span></a></li>
                            </ul>
                        </li> --}}
                        <li class="has-sub-menu"><a href="#"><i class="ti-notepad"></i> <span>Forms</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('members.create')}}"><span>Member</span></a></li>
                                <li><a href="{{ route('events.create')}}"><span>Event</span></a></li>
                                <li><a href="{{ route('attendances.create')}}"><span>Attendace</span></a></li>
                                {{-- <li><a href="{{ route('total-funds.create')}}"><span>Total Fund</span></a></li> --}}
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-layout"></i> <span>Table</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('members.index')}}"><span>Members</span></a></li>
                                <li><a href="{{ route('events.index')}}"><span>Events</span></a></li>
                                <li><a href="{{ route('events.list')}}"><span>List Register Event</span></a></li>
                                <li><a href="{{ route('attendances.index')}}"><span>List Attedance</span></a></li>
                                <li><a href="{{ route('funds.index') }}"><span>Pay Fund</span></a></li>
                                {{-- <li><a href="{{ route('total-funds.index')}}"><span>Total Fund</span></a></li> --}}
                                <li><a href="{{ route('submit-paying.index')}}"><span>List Student Submit Fund</span></a></li>
                            </ul>
                        </li>
                        {{-- <li class="has-sub-menu"><a href="#"><i class="ti-pie-chart"></i> <span>Charts</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="chart-chartjs.html"><span>ChartJs</span></a></li>
                                <li><a href="chart-echarts.html"><span>Echarts</span></a></li>
                                <li><a href="chart-google.html"><span>Google Chart</span></a></li>
                                <li><a href="chart-morris.html"><span>Morris  Chart</span></a></li>
                                <li><a href="chart-sparkline.html"><span>Sparkline  Chart</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-map"></i> <span>Maps</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="map-vector.html"><span>Vector Map</span></a></li>
                                <li><a href="map-google.html"><span>Google Map</span></a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="has-sub-menu"><a href="#"><i class="ti-shopping-cart"></i> <span>E-commerce</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="add-product.html"><span>Add Product</span></a></li>
                                <li><a href="edit-product.html"><span>Edit Product</span></a></li>
                                <li><a href="invoice-list.html"><span>Invoice List</span></a></li>
                                <li><a href="invoice-details.html"><span>Invoice Details</span></a></li>
                                <li><a href="order-list.html"><span>Order List</span></a></li>
                                <li><a href="order-details.html"><span>Order Details</span></a></li>
                                <li><a href="manage-products.html"><span>Manage Products</span></a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="has-sub-menu"><a href="#"><i class="ti-gift"></i> <span>Apps</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="chat.html"><span>Chat</span></a></li>
                                <li><a href="mail.html"><span>Mail</span></a></li>
                                <li><a href="single-mail.html"><span>Single Mail</span></a></li>
                                <li><a href="todo-list.html"><span>Todo List</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-lock"></i> <span>Authentication</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="login.html"><span>login</span></a></li>
                                <li><a href="register.html"><span>register</span></a></li>
                                <li><a href="author-profile.html"><span>Profile</span></a></li>
                            </ul>
                        </li> --}}
                        <li class="has-sub-menu"><a href="#"><i class="ti-layers"></i> <span>Pages</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{ route('user.index')}}"><span>User page</span></a></li>
                                {{-- <li><a href="timeline.html"><span>Timeline</span></a></li> --}}
                                {{-- <li><a href="pricing.html"><span>Pricing</span></a></li>
                                <li><a href="error-1.html"><span>error-1</span></a></li>
                                <li><a href="error-2.html"><span>error-2</span></a></li> --}}
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
                    <p class="text-body-light">2024 &copy; <a href="#">uogbookclub</a></p>
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