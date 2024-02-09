@extends('layout-user')

@section('content')

<main id="mt-main">
				<!-- Mt Contact Banner of the Page -->
				<section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url({{asset('./images/index/1.png')}});">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 text-center">
								<h1>LIST OF EVENT</h1>
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
										<li><a href="{{ route('user.event') }}">Event</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="row">
							@foreach ($events as $event)
								<div class="col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
									<!-- Blog Post of the Page -->
										<article class="blog-post detail">
											<div class="img-holder">
												<a href="{{route('user.event-detail', ['id' => $event->id])}}"><img style="width:100%" src="{{ asset($event->image) }}" alt="image description"></a>
											</div>
											<time class="time" datetime="{{ $event->date }}"><strong>{{ $event->day }}</strong>{{ $event->month }}</time>
											<div class="blog-txt">
												<h2><a href="{{route('user.event-detail', ['id' => $event->id])}}">{{$event->nameEvent}}</a></h2>
												<ul class="list-unstyled blog-nav">
													<li> <i class="fa fa-clock-o"></i>{{$event->date->format('d-M-Y')}}</li>
													<li> <i class="fa fa-map-marker"></i>{{$event->venue}}</li>
													{{-- <li> <a href="#"><i class="fa fa-comment"></i>2 Comments</a></li> --}}
												</ul>
												{{-- <p>Fusce mattis nunc lacus, vulputate facilisis dui efficitur ut. Vestibulum sit amet metus euismod, condimentum lectus id, ultrices sem. Morbi in erat malesuada, sollicitudin <br>massa at, tristique nisl. Maecenas id eros scelerisque, vulputate tortor quis, efficitur arcu</p> --}}
												<a href="{{route('user.event-detail', ['id' => $event->id])}}" class="btn-more">Read More</a>
											</div>
										</article>			
									<!-- Blog Post of the Page end -->
									<!-- Btn Holder of the Page -->
									{{-- <div class="btn-holder">
										<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i> PREVIOUS</a>
										<a href="#" class="btn-next">NEXT <i class="fa fa-angle-right"></i></a>
									</div> --}}
									<!-- Btn Holder of the Page end -->
								</div>
							@endforeach	
						</div>
					</div>
				</div>
				<!-- Mt Blog Detail of the Page end -->
				</main>

@endsection