<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<meta name="author" content="Amine Akhouad">
	<meta name="description" content="AKAD is a creative and modern template for digital agencies">

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/flexslider.css')}}">
	<link rel="stylesheet" href="{{ asset('css/animsition.min.css')}}">
	<link rel="stylesheet" href="{{ asset('css/animate.css')}}">
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body class="animsition">
	<header class="main-header">
		<div class="container">
			<div class="logo">
				<a href="/home"><img src="{{ asset('img/logo.png')}}" alt="logo"></a>
			</div>

			<div class="menu">
				<nav class="desktop-nav">
					<ul class="first-level">
						<li><a href="{{ route('home') }}" class="animsition-link">Home</a></li>
						<li><a href="{{ route('profile', Auth::id()) }}" class="animsition-link">profile</a></li>
						<li><a href="{{ route('servises') }}" class="animsition-link">services</a></li>
						<li><a href="{{ route('topost') }}" class="animsition-link">to post</a></li>
						{{-- @if (Auth::user()?->role == 'admin')
							<li><a href="{{ route('admin')}} " class="animsition-link">admin</a></li>
						@endif --}}
						@if (Auth::check())
							<li><a href="{{ route('logout')}} " class="animsition-link">logout</a></li>
						@else
							<li><a href="{{ route('login')}} " class="animsition-link">sign in</a></li>
						@endif
					</ul>
				</nav>

				<nav class="mobile-nav"></nav>
				<div class="menu-icon">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</header>

    @yield('content')

	<section class="green-section wow fadeInUp" style="padding:50px 0">
		<div class="container">
			<div class="col-md-6 col-sm-12">
				<div class="row">
					<span class="white-text montserrat-text uppercase" style="font-size:30px;display:block;">
						you think we're cool? let's work together
					</span>
					<a href="#" class="btn white" style="margin-top:30px"><span>get in touch</span></a>
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<div class="row">
					<div class="white-section" style="padding:20px">
						<span class="montserrat-text uppercase" style="font-size:24px">stay informed with our newsletter</span>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<form action="#" method="post">
							<div class="input_1">
								<input type="text" name="email">
								<span>your email</span>
							</div>
							<button type="submit" class="btn green" style="margin-top:20px"><span>send</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.flexslider.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/smoothScroll.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.animsition.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/wow.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/main.js')}}"></script>

	<script type="text/javascript" charset="utf-8">
		$(window).load(function() {
			new WOW().init();

			$('.site-hero').flexslider({
				animation: "fade",
				directionNav: false,
				controlNav: false, 
				keyboardNav: true,
				slideToStart: 0,
				animationLoop: true,
				pauseOnHover: false,
				slideshowSpeed: 4000, 
			});

			var $container = $('.portfolio_container');
			$container.isotope({
				filter: '*',
			});
		 
			$('.portfolio_filter a').click(function(){
				$('.portfolio_filter .active').removeClass('active');
				$(this).addClass('active');
		 
				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 500,
						animationEngine : "jquery"
					}
				});
				return false;
			}); 
		});
	</script>
</body>
</html>