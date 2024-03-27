@extends('layout-user')
<link rel="stylesheet" href="{{ asset('./css/post.css') }}">
@section('content')
<main id="mt-main">
    <!-- Mt Contact Banner of the Page -->
    <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
        style="background-image: url({{asset('./images/index/events.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    {{-- <h1>POST DETAIL</h1> --}}
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
                            <li><a href="{{ route('user.post') }}">Posts <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="#">Detail</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- Blog Post of the Page -->
                    <article class="blog-post style3">
                        <div class="blog-txt" style="padding-top: 10%">
                            <h2>{{ $post->name }}</h2>
                            <ul class="list-unstyled blog-nav">
                                <h4>
                                    <li><i class="fa fa-calendar"></i>  {{ $post->submission_date }}</li>
                                </h4>
                                <h4>
                                    <li><i class="fa fa-user"></i> {{ $post->nameSt }} - {{ $post->idSt}}</li>
                                </h4>
                            </ul>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="img-holder" style="max-width: 450px">
                                        <img style="width:100%" src="{{ asset($post->image) }}" alt="image description">
                                    </div>          
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-4">
                                        <p style="color: #989898;font-weight:400;" class="text-justify">{!! nl2br(e($post->description_1)) !!}</p>
                                        <p style="color: #989898;font-weight:400" class="text-justify">{!! nl2br(e($post->description_2)) !!}</p>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{ $post->link }}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </article>
                    <section class="mt-detail-sec toppadding-zero wow fadeInUp" data-wow-delay="0.4s">
                        <div class="container post">
                            <div class="row post">
                                {{-- <form method="POST" action="{{ route('toggle-like', ['postId' => $post->id]) }}">
                                    @csrf
                                    <button class="like-button" aria-label="Like post">
                                        <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path fill="none" d="M0 0H24V24H0z"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z"></path></svg>
                                        <svg class="filled" height="32" width="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H24V24H0z" fill="none"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z"></path></svg>
                                        Like
                                    </button>
                                </form> --}}
                            </div>
                        </div>
                    </section>                                       
                    <a href="{{ route('user.post') }}">
                        <i class="fa fa-arrow-left"></i> Back to List Post
                    </a> 
                    <!-- Mt Comments Section of the Page end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Mt Blog Detail of the Page end -->
</main>
@endsection
