@extends('layout-user')
<link rel="stylesheet" href="{{ asset('./css/post.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    h4{
        font-size: 15px !important;
    }
</style>
@section('content')
    <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s"
            style="background-image: url({{ asset('./images/index/events.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1></h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mt Contact Banner of the Page end -->
        <!-- Mt Blog Detail of the Page -->
        <div class="mt-blog-detail fullwidth">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 header wow fadeInUp" data-wow-delay="0.4s">
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('user.index') }}">Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{ route('user.post') }}">Post</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row justify-content-center">
                    {{-- @if ($events->isEmpty())
							<div style="text-align: center; margin-top: 20px; text-transform:uppercase" >
								<h3 style="font-family: Arial, sans-serif; color: #261683;">There are no upcoming events at the moment.</h3>
							</div>						
						@else --}}
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <figure class="snip1518">
                                <div class="image"><img src="{{ asset($post->image) }}" width="400"
                                        alt="{{ $post->name }}" /></div>
                                <figcaption>
                                    <h3>{{ $loop->iteration }}. {{ $post->name }}</h3>
                                    <h4> {{ $post->idSt }} - {{ $post->nameSt}}</h4>
                                    <footer>
                                        <div class="date">{{ $post->submission_date }}</div>
                                        <div class="icons">
                                            <div class="love"><i class="ion-heart"></i>115</div>
                                        </div>
                                    </footer>
                                </figcaption>
                                <a href="{{route('user.post-detail', ['id' => $post->id])}}"></a>
                            </figure>
                        </div>
                    @endforeach
                    
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        <!-- Mt Blog Detail of the Page end -->
    </main>
    <script>
        $(".hover").mouseleave(
            function() {
                $(this).removeClass("hover");
            }
        );
    </script>
@endsection
