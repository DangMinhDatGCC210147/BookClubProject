@extends('layout-user')
<link rel="stylesheet" href="{{ asset('./css/index.css') }}">
<link rel="stylesheet" href="{{ asset('./css/style.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
@section('content')
    <!-- main container of all the page elements -->
    <!-- Main of the Page -->
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url({{ asset('./images/index/home1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1></h1>
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                {{-- <li><a href="">home</a></li> --}}
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
                            <h2>A LITTLE ABOUT GREENWICH VIETNAM</h2>
                            <p>
                                Greenwich Vietnam is an international cooperation program between the University of
                                Greenwich - United Kingdom and FPT University, established since 2009 and attracting a large
                                number of students from 12 different countries around the world. The program's curriculum,
                                faculty, and infrastructure are evaluated and recognized for quality by experts from the
                                University of Greenwich, United Kingdom.
                            </p>
                            <h2>WHO WE ARE?</h2>
                            <p>The Book Club at Greenwich Vietnam - Can Tho campus was established on April 6. The club's
                                motto is "It's about Books, but not just about books." Here, members share a common interest
                                in literary culture, but that doesn't mean the Book Club revolves solely around books. We
                                also create an environment to strive together, play together, and learn together for our
                                future endeavors.
                            </p>
                            <h2>Join Us: Let's Explore the World of Books Together</h2>
                            <p>Are you a book lover? Do you want to join a dynamic community and share your passion with
                                others? Come to the BookClub at Greenwich Vietnam in Can Tho! We look forward to welcoming
                                you to explore the wonderful world of books and culture together.</p>
                        </div>
                        <div class="txt">
                            <h2>OUR MILESTONES</h2>
                            <section class="timeline-carousel milestones">
                                <div class="timeline-carousel__item-wrapper" data-js="timeline-carousel">
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/spring2023.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <span class="year">2023</span>
                                            <!-- <span class="month">June 28</span> -->
                                            <p>The Best Club - Spring 2023 Semester</p>
                                        </div>
                                    </div>
                                    <!--/Timeline item--><!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/spring2022.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <span class="year">2022</span>
                                            <!-- <span class="month">June 28</span> -->
                                            <p>The Best Club - Spring 2022 Semester</p>
                                        </div>
                                    </div>
                                    <!--/Timeline item-->
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/speedup2022.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <div class="pointer"></div>
                                            <!-- <span class="month">June 28</span> -->
                                            <p>The First Prize of Speed Up 2022 - In this event, the Book Club joined the Media Club and ESC, creating the event "Workshop: Create your collage art" held on June 15, 2022</p>
                                        </div>
                                    </div>
                                    <!--/Timeline item-->
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/spring2021.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <span class="year">2021</span>
                                            <!-- <span class="month">January 2</span> -->
                                            <p>The Best Club - Spring 2021 Semester</p>
                                        </div>
                                    </div>
                                    <!--/Timeline item-->
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/fall2021.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <div class="pointer"></div>
                                            <!-- <span class="month">June 28</span> -->
                                            <p>The Best Club - Fall 2021 Semester</p>
                                        </div>
                                    </div>
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/summer2021.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <div class="pointer"></div>
                                            <!-- <span class="month">June 28</span> -->
                                            <p>The Best Club - Summer 2021 Semester</p>
                                        </div>
                                    </div>
                                    <!--Timeline item-->
                                    <div class="timeline-carousel__item">
                                        <div class="timeline-carousel__image">
                                            <div class="media-wrapper media-wrapper--overlay"
                                                style="background: url({{ asset('./images/awards/summer2020.jpg') }}) center center; background-size:cover;">
                                            </div>
                                        </div>
                                        <div class="timeline-carousel__item-inner">
                                            <span class="year">2020</span>
                                            <!-- <span class="month">January 2</span> -->
                                            <p>The Best Club - Summer 2020 Semester</p>
                                        </div>
                                    </div>
                                    <!--/Timeline item-->
                                </div>
                            </section>
                        </div>

                        <div class="txt impressive-number">
                            <h2>IMPRESSIVE NUMBER</h2>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-6 col-md-3">
                                        <div class="counter">
                                            <div class="icons"><i class="fa fa-star fa-2x"></i></div>
                                            <h2 class="timer count-title count-number" data-to="6" data-speed="3000">
                                            </h2>
                                            <h3 class="count-text ">Best club awards of the semester</h3>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-3">
                                        <div class="counter">
                                            <div class="icons"><i class="fa fa-heart fa-2x"></i></div>
                                            <h2 class="timer count-title count-number" data-to="1000" data-speed="3000">
                                            </h2>
                                            <h3 class="count-text ">Followers</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-follow-holder">
                            <span class="title">Follow Us</span>
                            <!-- Social Network of the Page -->
                            <ul class="list-unstyled social-network">
                                <li><a href="https://www.instagram.com/bookclubcantho?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                        target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100063655476786" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
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
                                .fadeInLeft .img-holder img {
                                    max-width: 280px;
                                }
                            </style>
                            <!-- col of the Page -->
                            <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img-holder">
                                        <img src="{{ asset('./images/leaders/leader.jpg') }}" alt="Nguyễn Huỳnh Ngọc Thi">
                                        {{-- <ul class="list-unstyled social-icon">
                                            <li><i class="fa fa-twitter"></i></li>
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                        </ul> --}}
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
                                        <img src="{{ asset('./images/leaders/viceleader.jpg') }}" alt="Nguyễn Thị Tú Trinh">
                                        {{-- <ul class="list-unstyled social-icon">
                                            <li><i class="fa fa-twitter"></i></li>
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                        </ul> --}}
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
                                        <img src="{{ asset('./images/leaders/treasurer.jpg') }}" alt="La Xuân Uyên">
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
                        <img src="{{ asset('./images/index/HAHA.png') }}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{ asset('./images/index/HAHA 1.png') }}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{ asset('./images/index/HAHA 2.png') }}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{ asset('./images/index/HAHA 3.png') }}" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="{{ asset('./images/index/Tri_lieu_cam_xuc (1).png') }}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{ asset('./images/index/Tri_lieu_cam_xuc (4).png') }}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{ asset('./images/index/Tri_lieu_cam_xuc (3).png') }}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{ asset('./images/index/Tri_lieu_cam_xuc (2).png') }}" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="{{ asset('./images/index/loi_noi_doi (1).png') }}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{ asset('./images/index/loi_noi_doi (2).png') }}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{ asset('./images/index/loi_noi_doi (3).png') }}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{ asset('./images/index/loi_noi_doi (4).png') }}" alt="image description">
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Work Slider of the Page end -->
        </section>
        <!-- Mt Workspace Section of the Page -->
    </main><!-- Main of the Page end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="{{ asset('./js/index.js') }}"></script>
@endsection
