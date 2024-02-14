@extends('layout-user')

@section('content')
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url({{asset('./images/index/1.png')}});">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>EVENT DETAIL</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Contact Banner of the Page end -->
        <!-- Mt Blog Detail of the Page -->
        <div class="mt-blog-detail fullwidth wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 header">
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('user.index') }}">Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{ route('user.event') }}">Event <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#">Detail</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Blog Post of the Page -->
                        <article class="blog-post style3">
                            <div class="img-holder">
                                <img style="width:100%" src="{{ asset($event->image) }}"
                                        alt="image description">
                                <time class="time"
                                    datetime="{{ $event->date }}"><strong>{{ $event->day }}</strong>{{ $event->month }}</time>
                            </div>
                            <div class="blog-txt">
                                <h2>{{ $event->nameEvent }}</h2>
                                @if ($isRegistered)
                                    <h4 style="color:red; font-style: italic;">You are already submit for this event.</h4>
                                @endif
                                <ul class="list-unstyled blog-nav">
                                    <h5>
                                        <li> <a href="#"><i class="fa fa-calendar"></i>  {{ $event->date->format('d/M/Y') }} </a></li>
                                    </h5>
                                    <h5>
                                        <li><a href="#">
                                            <i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($event->time_start)->format('H:i') }}
                                                - {{ \Carbon\Carbon::parse($event->time_end)->format('H:i') }}</a></li>
                                    </h5>
                                    <h5>
                                        <li> <a href="#"><i class="fa fa-map-marker"></i> {{ $event->venue }} </a>
                                        </li>
                                    </h5>
                                </ul>
                                <p style="color: #989898;font-weight:400">{!! nl2br(e($event->description_1)) !!}</p>
                                <p style="color: #989898;font-weight:400">{!! nl2br(e($event->description_2)) !!}</p>
                                <p style="color: #989898;font-weight:400">{!! nl2br(e($event->description_3)) !!}</p>
                                <p style="color: #989898;font-weight:400">{!! nl2br(e($event->description_4)) !!}</p>
                            </div>
                        </article>
                        <a href="{{ route('user.event') }}">
                            <i class="fa fa-arrow-left"></i> Back to List Event
                        </a> 
                        <!-- Mt Comments Section of the Page end -->
                        @if (Auth::check())
                            @if ($isMember)
                                <div class="mt-comments-section fullwidth">
                                    <!-- Mt Leave Comments of the Page -->
                                    @if (!$isRegistered)
                                        <h2>TO REGISTER FOR THE EVENT, PLEASE CLICK THE BUTTON BELOW</h2>
                                    @endif
                                    <div class="mt-leave-comment" style="display: flex">
                                        @if (!$isRegistered || !$isEventStarted)
                                            <form action="{{ route('one.event.register', ['event' => $event->id]) }}"
                                                method="POST" class="comment-form">
                                                @csrf
                                                <fieldset>
                                                    <input type="hidden" name="idSt" id ="idSt"
                                                        value="{{ session('idSt') }}">
                                                    <button type="submit" class="form-btn">Register</button>
                                                </fieldset>
                                            </form>
                                            <form action="{{ route('one.event.cannot-join', ['event' => $event->id]) }}"
                                                method="POST" class="comment-form reject">
                                                @csrf
                                                <fieldset>
                                                    <input type="hidden" name="idSt" id ="idSt"
                                                        value="{{ session('idSt') }}">
                                                    <button id="yourButtonId" class="form-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal5" data-whatever="@mdo">Cannot
                                                        join</button>
                                                </fieldset>
                                            </form>
                                        @endif
                                    </div>
                                    <!-- Mt Leave Comments of the Page end -->
                                </div>
                            @endif
                            @if ($isEventStarted)
                                <article class="mt-author-box fullwidth">
                                    {{-- <div class="author-img">
                                        <a href="#"><img src="http://placehold.it/145x145" alt="image description"></a>
                                    </div> --}}
                                    <div class="author-txt">
                                        <h3><a href="#">NOTE FOR THE ACTIVITY</a></h3>
                                        <p>{!! nl2br(e($event->comments)) !!}</p>
                                    </div>
                                </article>
                            @endif
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Mt Blog Detail of the Page end -->
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('yourButtonId').addEventListener('click', function(e) {
                e.preventDefault();
                // Sử dụng SweetAlert để hiển thị cửa sổ xác nhận
                Swal.fire({
                    title: 'Confirmation',
                    text: 'Would you like to confirm that you cannot participate in this event?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, I confirm',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        popup: 'custom-swal-popup',
                    },
                }).then((result) => {
                    // Nếu người dùng đồng ý, gửi form đi
                    if (result.isConfirmed) {
                        document.querySelector('.comment-form.reject').submit();
                    }
                });
            });
        });
    </script>
    <style>
        .custom-swal-popup {
            width: 40vw;
            font-size: 1vw;
        }
    </style>
@endsection
