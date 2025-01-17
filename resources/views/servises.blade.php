@extends('layout')

@section('title')Сервис@endsection()

@section('content')
	<div class="site-hero_2">
		<div class="page-title">
			<div class="big-title montserrat-text uppercase">our services</div>
			<div class="small-title montserrat-text uppercase">home / services</div>
		</div>
	</div>

	<section>
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span>what we do</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 wow fadeInUp">
					<p style="margin-bottom:30px">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur.
					</p>
					<div class="col-md-6">
						<div class="row">
							<ul class="list">
								<li>Stunning on all screens</li>
								<li>Easy to customize</li>
								<li>Make a difference</li>
								<li>Imagine and create</li>
								<li>Unlimited possibilities</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<ul class="list">
								<li>Remarkable style</li>
								<li>Captivating presentations</li>
								<li>Make a difference</li>
								<li>Make a difference</li>
								<li>Imagine and create</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-6 wow fadeInUp" data-wow-delay=".1s">
					<img src="{{ asset('img/img1.jpg')}}" alt="img" style="width:100%">
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp">
					<div class="benefits_1_single">
						<i class="icon ion-ios-pulse"></i>
						<div class="title montserrat-text uppercase">keep pulse going</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt.
						</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".1s">
					<div class="benefits_1_single">
						<i class="icon ion-ios-infinite-outline"></i>
						<div class="title montserrat-text uppercase">unlimited options</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt.
						</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".2s">
					<div class="benefits_1_single">
						<i class="icon ion-ios-lightbulb-outline"></i>
						<div class="title montserrat-text uppercase">great ideas</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt.
						</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".3s">
					<div class="benefits_1_single">
						<i class="icon ion-ios-settings"></i>
						<div class="title montserrat-text uppercase">awesome support</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pricing_plans">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<span>pricing plans</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
					<div class="pricing_plan">
						<div class="plan_title montserrat-text uppercase">basic</div>
						<div class="plan_price montserrat-text uppercase">$35.99 monthly</div>
						<ul class="list">
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetuer adipiscing elit</li>
							<li>Sed diam nonummy</li>
							<li>Nibh euismod tincidunt</li>
							<li>Ut laoreet dolore</li>
							<li>Magna aliquam erat volutpat</li>
						</ul>
						<a href="" class="btn green"><span>get started</span></a>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".1s">
					<div class="pricing_plan">
						<div class="plan_title montserrat-text uppercase">advanced</div>
						<div class="plan_price montserrat-text uppercase">$55.99 monthly</div>
						<ul class="list">
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetuer adipiscing elit</li>
							<li>Sed diam nonummy</li>
							<li>Nibh euismod tincidunt</li>
							<li>Ut laoreet dolore</li>
							<li>Magna aliquam erat volutpat</li>
						</ul>
						<a href="" class="btn green"><span>get started</span></a>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay=".2s">
					<div class="pricing_plan">
						<div class="plan_title montserrat-text uppercase">smart</div>
						<div class="plan_price montserrat-text uppercase">$75.99 monthly</div>
						<ul class="list">
							<li>Lorem ipsum dolor sit amet</li>
							<li>Consectetuer adipiscing elit</li>
							<li>Sed diam nonummy</li>
							<li>Nibh euismod tincidunt</li>
							<li>Ut laoreet dolore</li>
							<li>Magna aliquam erat volutpat</li>
						</ul>
						<a href="" class="btn green"><span>get started</span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection