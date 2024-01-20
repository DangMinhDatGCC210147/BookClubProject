@extends('layout-user')

@section('content')
    <!-- main container of all the page elements -->
    <!-- Main of the Page -->
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url(http://placehold.it/1920x205);">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>BOOK CLUB HOMEPAGE</h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="">home</a></li>
                                {{-- <li>About Us</li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt">
                            <h2>WHO WE ARE?</h2>
                            <p>Morbi in erat malesuada, sollicitudin massa at, tristique nisl. Maecenas id eros
                                scelerisque, vulputate tortor quis, efficitur arcu sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Umco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit sse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                <strong>Vestibulum sit amet metus euismod, condimentum lectus id, ultricessem.</strong>
                            </p>
                            <p>Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet
                                metus euismod, condimentum lectus id, ultrices sem. Morbi in erat malesuada,
                                sollicitudin massa at, </p>
                        </div>
                        <div class="mt-follow-holder">
                            <span class="title">Follow Us</span>
                            <!-- Social Network of the Page -->
                            <ul class="list-unstyled social-network">
                                <li><a href="https://www.instagram.com/bookclubcantho?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100063655476786"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li> --}}
                            </ul>
                            <!-- Social Network of the Page end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Team Section of the Page -->
        <section class="mt-team-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>OUR LEADERS</h3>
                        <div class="holder">
                            <style>
                                .fadeInLeft .img-holder img{
                                    max-width: 280px;
                                }
                            </style>
                            <!-- col of the Page -->
                            <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img-holder">
                                    <a href="#">
                                        <img src="{{ asset('images/index/DSCF2577.jpg')}}" alt="Nguyễn Huỳnh Ngọc Thi">
                                        {{-- <ul class="list-unstyled social-icon">
                                            <li><i class="fa fa-twitter"></i></li>
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                        </ul> --}}
                                    </a>
                                </div>
                                <div class="mt-txt">
                                    <h4><a href="#">NGUYỄN HUỲNH NGỌC THI</a></h4>
                                    <span class="sub-title">LEADER</span>
                                </div>
                            </div>
                            <!-- col of the Page end -->
                            <!-- col of the Page -->
                            <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img-holder">
                                    <a href="#">
                                        <img src="http://placehold.it/280x290" alt="Nguyễn Thị Tú Trinh">
                                        {{-- <ul class="list-unstyled social-icon">
                                            <li><i class="fa fa-twitter"></i></li>
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                        </ul> --}}
                                    </a>
                                </div>
                                <div class="mt-txt">
                                    <h4><a href="#">Nguyễn Thị Tú Trinh</a></h4>
                                    <span class="sub-title">VICE LEADER</span>
                                </div>
                            </div>
                            <!-- col of the Page end -->
                            <!-- col of the Page -->
                            <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img-holder">
                                    <a href="#">
                                        <img src="http://placehold.it/280x290" alt="La Xuân Uyên">
                                    </a>
                                </div>
                                <div class="mt-txt">
                                    <h4><a href="#">La Xuân Uyên</a></h4>
                                    <span class="sub-title">Treasurer</span>
                                </div>
                            </div>
                            <!-- col of the Page end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt About Section of the Page -->
        <!-- Mt Workspace Section of the Page -->
        <section class="mt-workspace-sec wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>OUR MEMORIES</h2>
                    </div>
                </div>
            </div>
            <!-- Work Slider of the Page -->
            <ul class="list-unstyled work-slider">
                <li>
                    <div class="img-holder">
                        <img src="http://placehold.it/545x545" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="http://placehold.it/245x310" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="http://placehold.it/385x310" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="http://placehold.it/640x220" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="http://placehold.it/545x545" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="http://placehold.it/245x310" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="http://placehold.it/385x310" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="http://placehold.it/640x220" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="http://placehold.it/545x545" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="http://placehold.it/245x310" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="http://placehold.it/385x310" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="http://placehold.it/640x220" alt="image description">
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Work Slider of the Page end -->
        </section>
        <!-- Mt Workspace Section of the Page -->
    </main><!-- Main of the Page end -->
@endsection
