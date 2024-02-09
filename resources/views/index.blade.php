@extends('layout-user')

@section('content')
    <!-- main container of all the page elements -->
    <!-- Main of the Page -->
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url({{asset('./images/index/1.png')}});">
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
                            <p>Tại BookClub Greenwich, chúng tớ là điểm giao lưu văn hóa, nơi thắt chặt những tâm hồn đam mê văn hóa đọc. Nơi đây không chỉ là một câu lạc bộ đọc sách, mà chúng tớ tự hào là một gia đình, nơi mọi người được mời gọi để chia sẻ suy nghĩ, thảo luận và khám phá thế giới thông qua từng trang sách. Đồng thời, chúng tớ còn tạo ra những sự kiện tuyệt vời, giới thiệu những nghệ sĩ và người nổi tiếng, những người truyền cảm hứng và chữa lành tâm hồn. Ngoài ra, tiêu chí của Câu lạc bộ Sách chính là tạo ra không gian để phát triển văn hóa đọc bằng những người có cùng sự đam mê đối với sách - phát triển về trí tuệ con người. Hãy trở thành một phần của gia đình chúng tớ, nơi mà chúng ta cùng nhau cùng nhau tìm hiểu và chia sẻ niềm đam mê với văn hóa và nghệ thuật.
                            </p>
                            <h2>Join Us: Let's Explore the World of Books Together</h2>
                            <p>Bạn là người yêu sách? Bạn muốn tham gia vào một cộng đồng năng động và chia sẻ những niềm đam mê với những người khác? Hãy đến với BookClub Greenwich Việt Nam tại Cần Thơ! Chúng tôi mong muốn chào đón bạn để cùng nhau khám phá thế giới tuyệt vời của sách và văn hóa.</p>
                        </div>
                        <div class="mt-follow-holder">
                            <span class="title">Follow Us</span>
                            <!-- Social Network of the Page -->
                            <ul class="list-unstyled social-network">
                                <li><a href="https://www.instagram.com/bookclubcantho?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=100063655476786" target="_blank"><i class="fa fa-facebook"></i></a></li>
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
                                .fadeInLeft .img-holder img{
                                    max-width: 280px;
                                }
                            </style>
                            <!-- col of the Page -->
                            <div class="col wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img-holder">
                                    <a href="#">
                                        <img src="{{ asset('./images/leaders/leader.jpg')}}" alt="Nguyễn Huỳnh Ngọc Thi">
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
                                        <img src="{{asset('./images/leaders/viceleader.jpg')}}" alt="Nguyễn Thị Tú Trinh">
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
                                        <img src="{{asset('./images/leaders/treasurer.jpg')}}" alt="La Xuân Uyên">
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
                        <img src="{{asset('./images/index/HAHA.png')}}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{asset('./images/index/HAHA 1.png')}}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{asset('./images/index/HAHA 2.png')}}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{asset('./images/index/HAHA 3.png')}}" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="{{asset('./images/index/Tri_lieu_cam_xuc (1).png')}}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{asset('./images/index/Tri_lieu_cam_xuc (4).png')}}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{asset('./images/index/Tri_lieu_cam_xuc (3).png')}}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{asset('./images/index/Tri_lieu_cam_xuc (2).png')}}" alt="image description">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="img-holder">
                        <img src="{{asset('./images/index/loi_noi_doi (1).png')}}" alt="image description">
                    </div>
                    <div class="img-holder">
                        <div class="coll1">
                            <img src="{{asset('./images/index/loi_noi_doi (2).png')}}" alt="image description">
                        </div>
                        <div class="coll2">
                            <img src="{{asset('./images/index/loi_noi_doi (3).png')}}" alt="image description">
                        </div>
                        <div class="coll3">
                            <img src="{{asset('./images/index/loi_noi_doi (4).png')}}" alt="image description">
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Work Slider of the Page end -->
        </section>
        <!-- Mt Workspace Section of the Page -->
    </main><!-- Main of the Page end -->
@endsection
