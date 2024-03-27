<!DOCTYPE html>
<html lang="en">

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BookClub | Official Website</title>
    <!-- include the site stylesheet -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('./images/logo/logoOf.png') }}">
    <link
        href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700'
        rel='stylesheet' type='text/css'>
    <!-- include the site stylesheet -->
    {{-- <link rel="stylesheet" href="./css/bootstrap.css"> --}}
    <link rel="stylesheet" href="{{ asset('./css/bootstrap.css') }}">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('./css/animate.css') }}">
    <!-- include the site stylesheet -->
    {{-- <link rel="stylesheet" href="./css/icon-fonts.css"> --}}
    <link rel="stylesheet" href="{{ asset('./css/icon-fonts.css') }}">

    <!-- include the site stylesheet -->
    {{-- <link rel="stylesheet" href="./css/main.css"> --}}
    <link rel="stylesheet" href="{{ asset('./css/main.css') }}">
    <!-- include the site stylesheet -->
    {{-- <link rel="stylesheet" href="./css/responsive.css"> --}}
    <link rel="stylesheet" href="{{ asset('./css/responsive.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.min.css">

</head>

<body>
    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!-- Page Loader -->
        <div id="pre-loader" class="loader-container">
            <div class="loader">
                {{-- <img src="./images/svg/rings.svg" alt="loader"> --}}
                {{-- <img src="{{asset('./images/svg/rings.svg')}}" alt="loader"> --}}
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <style>
                .loader {
                    position: relative;
                    width: 33px;
                    height: 33px;
                    perspective: 67px;
                }

                .loader div {
                    width: 100%;
                    height: 100%;
                    background: #2f3545;
                    position: absolute;
                    left: 50%;
                    transform-origin: left;
                    animation: loader 2s infinite;
                }

                .loader div:nth-child(1) {
                    animation-delay: 0.15s;
                }

                .loader div:nth-child(2) {
                    animation-delay: 0.3s;
                }

                .loader div:nth-child(3) {
                    animation-delay: 0.45s;
                }

                .loader div:nth-child(4) {
                    animation-delay: 0.6s;
                }

                .loader div:nth-child(5) {
                    animation-delay: 0.75s;
                }

                @keyframes loader {
                    0% {
                        transform: rotateY(0deg);
                    }

                    50%,
                    80% {
                        transform: rotateY(-180deg);
                    }

                    90%,
                    100% {
                        opacity: 0;
                        transform: rotateY(-180deg);
                    }
                }
            </style>
        </div>
        <!-- W1 start here -->
        <div class="w1">
            <!-- mt header style4 start here -->
            <header id="mt-header" class="style4">
                <!-- mt bottom bar start here -->
                <div class="mt-bottom-bar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- mt logo start here -->
                                <div class="mt-logo main-logo">
                                    <a href="{{ route('user.index') }}">
                                        <img src="{{ asset('./images/logo/logo.png') }}" alt="Book CLub">
                                    </a>
                                </div>        
                                <!-- mt icon list start here -->
                                <div class="mt-logo"><h4 style="padding-left: 4vw; font-size: 100%">Welcome,<Strong> {{ isset(Auth::user()->name) ? Auth::user()->name : "Guest" }} </Strong></h4></div>
                                <ul class="mt-icon-list">
                                    <li class="hidden-lg hidden-md">
                                        <a href="#" class="bar-opener mobile-toggle">
                                            <span class="bar"></span>
                                            <span class="bar small"></span>
                                            <span class="bar"></span>
                                        </a>
                                    </li>
                                    {{-- <li><a href="#" class="icon-magnifier"></a></li> --}}
                                </ul><!-- mt icon list end here -->
                                <!-- navigation start here -->
                                <nav id="nav">
                                    <ul>
                                        {{-- <li><h4>{{ session('idSt') }}</h4></li> --}}
                                        <li><a class="" href="{{ route('user.index') }}">HOME</a></li>
                                        <li class=""><a href="{{ route('user.post') }}">POST</a></li>
                                        <li>
                                            <a class="" href="{{ route('user.event') }}">EVENT</a>
                                        </li>
                                        @auth
                                            @if(Auth::user()->member || Auth::user()->role == 0 || Auth::user()->role == 2)
                                                <li>
                                                    <a class="" href="{{ route('funds.user.index') }}">Pay Fund</a>
                                                </li>
                                            @endif
                                            @if(Auth::user()->role == 0 || Auth::user()->role == 2)
                                                <li>
                                                    <a class="" href="{{ route('leaders.index') }}">LEADER</a>
                                                </li>
                                            @endif
                                        @endauth
                                        <li style="font-weight:bold">
                                            @if (Auth::check())
                                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                            <a href="#"onclick="document.getElementById('logout-form').submit()">Logout</a>
                                            @else
                                            <a href="{{route('login')}}">Login</a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                                <!-- mt icon list end here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mt bottom bar end here -->
                <span class="mt-side-over"></span>
            </header><!-- mt header style4 end here -->
            {{-- <!-- mt side menu start here -->
        <div class="mt-side-menu">
            <!-- mt holder start here -->
            <div class="mt-holder">
                <a href="#" class="side-close"><span></span><span></span></a>
                <strong class="mt-side-title">MY ACCOUNT</strong>
                <!-- mt side widget start here -->
                <div class="mt-side-widget">
                    <header>
                        <span class="mt-side-subtitle">SIGN IN</span>
                        <p>Welcome back! Sign in to Your Account</p>
                    </header>
                    <form action="#">
                        <fieldset>
                            <input type="text" placeholder="Username or email address" class="input">
                            <input type="password" placeholder="Password" class="input">
                            <div class="box">
                                <span class="left"><input class="checkbox" type="checkbox" id="check1"><label for="check1">Remember Me</label></span>
                                <a href="#" class="help">Help?</a>
                            </div>
                            <button type="submit" class="btn-type1">Login</button>
                        </fieldset>
                    </form>
                </div>
                <!-- mt side widget end here -->
                <div class="or-divider"><span class="txt">or</span></div>
                <!-- mt side widget start here -->
                <div class="mt-side-widget">
                    <header>
                        <span class="mt-side-subtitle">CREATE NEW ACCOUNT</span>
                        <p>Create your very own account</p>
                    </header>
                    <form action="#">
                        <fieldset>
                            <input type="text" placeholder="Username or email address" class="input">
                            <button type="submit" class="btn-type1">Register</button>
                        </fieldset>
                    </form>
                </div>
                <!-- mt side widget end here -->
            </div>
            <!-- mt holder end here -->
        </div><!-- mt side menu end here --> --}}
            <!-- mt search popup start here -->
            {{-- <div class="mt-search-popup">
            <div class="mt-holder">
                <a href="#" class="search-close"><span></span><span></span></a>
                <div class="mt-frame">
                    <form action="#">
                        <fieldset>
                            <input type="text" placeholder="Search...">
                            <span class="icon-microphone"></span>
                            <button class="icon-magnifier" type="submit"></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- mt search popup end here --> --}}
            @yield('content')
            <!-- footer of the Page -->
            <footer id="mt-footer" class="style1 wow fadeInUp" data-wow-delay="0.4s">
                <!-- Footer Holder of the Page -->
                <div class="footer-holder dark">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 mt-paddingbottomsm">
                                <!-- F Widget About of the Page -->
                                <div class="f-widget-about main-logo">
                                    <div class="logo">
                                        <a href="{{ route('user.index')}}"><img src=" {{ asset('./images/logo/logo.png') }}" alt="Logo Image"></a>
                                    </div>
                                    <p>Chúng tớ tạo ra những sự kiện tuyệt vời, giới thiệu những nghệ sĩ và người nổi tiếng, những người truyền cảm hứng và chữa lành tâm hồn. Ngoài ra, tiêu chí của Câu lạc bộ Sách chính là tạo ra không gian để phát triển văn hóa đọc bằng những người có cùng sự đam mê đối với sách - phát triển về trí tuệ con người. </p>
                                    <!-- Social Network of the Page -->
                                    <ul class="list-unstyled social-network">
                                        <li><a href="https://www.instagram.com/bookclubcantho?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://www.facebook.com/profile.php?id=100063655476786"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <!-- Social Network of the Page end -->
                                </div>
                                <!-- F Widget About of the Page end -->
                            </div>
                            {{-- <div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomsm">
                                <div class="f-widget-news">
                                    <h3 class="f-widget-heading">Twitter</h3>
                                    <div class="news-articles">
                                        <div class="news-column">
                                            <i class="fa fa-twitter"></i>
                                            <div class="txt-box">
                                                <p>Laboris nisi ut <a href="#">#schön</a> aliquip econse-
                                                    <br>quat. <a href="#">https://t.co/vreNJ9nEDt</a></p>
                                            </div>
                                        </div>
                                        <div class="news-column">
                                            <i class="fa fa-twitter"></i>
                                            <div class="txt-box">
                                                <p>Ficia deserunt mollit anim id est labo- <br>rum. incididunt ut labore
                                                    et dolore <br><a href="#">https://t.co/vreNJ9nEDt</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomxs">
                                <!-- Footer Tabs of the Page -->
                                <div class="f-widget-tabs">
                                    <h3 class="f-widget-heading">Product Tags</h3>
                                    <ul class="list-unstyled tabs">
                                        <li><a href="#">Sofas</a></li>
                                        <li><a href="#">Armchairs</a></li>
                                        <li><a href="#">Living</a></li>
                                        <li><a href="#">Bedroom</a></li>
                                        <li><a href="#">Lighting</a></li>
                                        <li><a href="#">Tables</a></li>
                                        <li><a href="#">Pouf</a></li>
                                        <li><a href="#">Wood</a></li>
                                        <li><a href="#">Office</a></li>
                                        <li><a href="#">Outdoor</a></li>
                                        <li><a href="#">Kitchen</a></li>
                                        <li><a href="#">Stools</a></li>
                                        <li><a href="#">Footstools</a></li>
                                        <li><a href="#">Desks</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Tabs of the Page -->
                            </div> --}}
                            <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                                <!-- F Widget About of the Page -->
                                <div class="f-widget-about">
                                    <h3 class="f-widget-heading">Information</h3>
                                    <ul class="list-unstyled address-list align-right">
                                        <li><i class="fa fa-map-marker"></i>
                                            <address>160, 30/4 Street, Ninh Kieu <br>Can Tho</address>
                                        </li>
                                        <li><i class="fa fa-phone"></i><a href="tel:0846460018">0846460018</a></li>
                                        <li>
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:bookclubct19@gmail.com">bookclubct19@gmail.com</a>
                                                |
                                            <a href="mailto:ThiNHNGDC210099@fpt.edu.vn">ThiNHNGDC210099@fpt.edu.vn</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- F Widget About of the Page end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Holder of the Page end -->
                <!-- Footer Area of the Page -->
                <div class="footer-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <p>© <a href="{{ route('user.index')}}">BookClub</a> - All rights Reserved</p>
                            </div>
                            {{-- <div class="col-xs-12 col-sm-6 text-right">
                                <div class="bank-card">
                                    <img src="{{ asset('./images/bank-card.png') }}" alt="bank-card">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Footer Area of the Page end -->
            </footer><!-- footer of the Page end -->
        </div><!-- W1 end here -->
        <span id="back-top" class="fa fa-arrow-up"></span>
    </div>
    <!-- include jQuery -->
    {{-- <script src="./js/jquery.js"></script> --}}
    <script src="{{ asset('./js/jquery.js') }}"></script>
    <script src="{{ asset('./js/app.js') }}"></script>
    <!-- include jQuery -->
    {{-- <script src="./js/plugins.js"></script> --}}
    <script src="{{ asset('./js/plugins.js') }}"></script>
    <!-- include jQuery -->
    {{-- <script src="./js/jquery.main.js"></script> --}}
    <script src="{{ asset('./js/jquery.main.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</body>

</html>
