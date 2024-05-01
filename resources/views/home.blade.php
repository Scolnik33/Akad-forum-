@extends('layout')

@section('title')Главная страница@endsection

@section('content')
	<div style="display: none">
		{{ $category = 'popular' }}
	</div>
	<div class="site-hero">
		<ul class="slides">
			@if(session()->has('success'))
				<p class="alert alert-success">{{ session()->get('success') }}</p>
			@endif
			<li>
				<div><span class="small-title uppercase montserrat-text">we're</span></div>
				<div class="big-title uppercase montserrat-text">freedom of speech</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
			</li>
			<li>
				<div><span class="small-title uppercase montserrat-text">we do</span></div>
				<div class="big-title uppercase montserrat-text">creative stuff</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</li>
		</ul>
	</div>

	<div class="container">
		<div class="agency">
			<div class="col-md-5 col-sm-12">
				<div class="row">
					<img src="{{ asset('img/agency.jpg')}}" alt="image">
				</div>
			</div>
			<div class="col-md-offset-1 col-md-6 col-sm-12">
				<div class="row">
					<div class="section-title">
						<span>history of us</span>
					</div>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor nisi ut aliquip ex ea commodo
						consequat. in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. 
					</p>
					<a href="#" class="btn green" style="float:right;margin-top:30px"><span>read more</span></a>
				</div>
			</div>
		</div>
	</div>

	<section class="services">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span>why choose us</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<div class="col-md-7 col-sm-12 services-left wow fadeInUp">
				<div class="row" style="margin-bottom:50px">
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<i class="icon ion-ios-infinite-outline"></i>
							<span class="montserrat-text uppercase service-title">freedom of speech</span>
							<ul>
								<li>branding</li>
								<li>design &amp; copywriting</li>
								<li>concept development</li>
								<li>user experience</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<i class="icon ion-ios-shuffle"></i>
							<span class="montserrat-text uppercase service-title">safety</span>
							<ul>
								<li>branding</li>
								<li>design &amp; copywriting</li>
								<li>concept development</li>
								<li>user experience</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<i class="icon ion-ios-cart-outline"></i>
							<span class="montserrat-text uppercase service-title">clear interface</span>
							<ul>
								<li>branding</li>
								<li>design &amp; copywriting</li>
								<li>concept development</li>
								<li>user experience</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="row">
							<i class="icon ion-ios-settings"></i>
							<span class="montserrat-text uppercase service-title">huge community</span>
							<ul>
								<li>branding</li>
								<li>design &amp; copywriting</li>
								<li>concept development</li>
								<li>user experience</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-5 col-sm-12 services-right wow fadeInUp" data-wow-delay=".1s">
				<div class="row">
					<img src="{{ asset('img/serv.jpg')}}" alt="image">
				</div>
			</div>

		</div>
	</section>

	<section class="portfolio">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span>our the best akads</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="row categories-grid wow fadeInLeft">
					<span class="montserrat-text uppercase">choose category</span>

					<nav class="categories">
						<form action="/home" method="get">
							<ul class="portfolio_filter">
								<div style="display: none">
									@if(!empty($_SERVER['QUERY_STRING']))
										{{ $querystring = explode('=', $_SERVER['QUERY_STRING'])[1] }}
										{{ $category = explode('&', $querystring)[0] }}
									@endif
								</div>
								<li><a href="" class="filter @if($category == 'popular') active @endif" data-filter="*">popular</a></li>
								<li><a href="" class="filter @if($category == 'latest') active @endif" data-filter="*">latest</a></li>
								<li><a href="" class="filter @if($category == 'oldest') active @endif" data-filter="*">oldest</a></li>
							</ul>
							<input type="text" class="invisible invisible_input" name="category" id="category">
							<button type="submit" class="invisible invisible_btn"></button>
						</form>
					</nav>
				</div>
			</div>

			<div class="col-md-9">
				<div class="row portfolio_container">
					@foreach($posts as $item)
						<div class="col-md-4 post">
							<a href="{{ route('single', $item['id']) }}" class="portfolio_item work-grid wow fadeInUp">
								@if ($item['image'])
									<img src="{{ asset('storage/' . $item['image']) }}" alt="image" style="width: 255px; height: 146px">
								@else
									<img src="{{ asset('img/work-1.jpg')}}" alt="image" style="width: 255px; height: 146px">
								@endif
								<div class="portfolio_item_hover">
									<div class="item_info">
										<span style="margin-bottom: 10px">{{ Str::limit($item['name'], 20) }}</span>
										<em>{{ Str::limit($item['text'], 30) }}</em>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				</div>
				{{ $posts->links() }}
			</div>
		</div>
	</section>
	<script src="{{ asset('js/filter.js') }}"></script>
@endsection
